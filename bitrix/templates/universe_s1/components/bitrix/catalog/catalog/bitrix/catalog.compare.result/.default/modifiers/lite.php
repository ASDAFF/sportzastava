<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use Bitrix\Main\Loader;

/**
 * @var array $arResult
 * @var array $arParams
 * @var array $arElementID
 */

if (!empty($arElementID)) {
    if (!Loader::IncludeModule('iblock'))
        return;

    /** Получение данных о разделе товара */
    $dbGroups = CIBlockElement::GetElementGroups(
        $arElementID,
        true,
        array('NAME', 'SECTION_PAGE_URL')
    );

    $arSection = [];

    while($arGroup = $dbGroups->GetNext())
        $arSection[$arGroup['ID']] = $arGroup;
    unset($dbGroups);

    /** Получение массива стартшопа */
    $bUseCommonCurrency = ArrayHelper::getValue($arParams, 'USE_COMMON_CURRENCY') == 'Y';
    $sCurrency = ArrayHelper::getValue($arParams, 'CURRENCY');
    $sPriceCode = ArrayHelper::getValue($arParams, 'PRICE_CODE');

    $arProducts = [];
    $dbProducts = CStartShopCatalogProduct::GetList(
        array(),
        array('ID' => $arElementID),
        array(),
        array(),
        $bUseCommonCurrency && !empty($sCurrency) ? $sCurrency : false,
        $sPriceCode
    );

    while ($arProduct = $dbProducts->GetNext())
        $arProducts[$arProduct['ID']] = $arProduct;
    unset($dbProducts);

    /** Структурирование массива */
    foreach ($arResult["ITEMS"] as $sKey => $arItem) {
        /** Информация о разделе товара */
        $arResult["ITEMS"][$sKey]['SECTION'] = $arSection[$arItem['IBLOCK_SECTION_ID']];

        $arPrice = ArrayHelper::getValue($arProducts, [$arItem['ID'], 'STARTSHOP', 'PRICES', 'MINIMAL']);
        $arMinPrice = [
            'VALUE' => $arPrice['VALUE'],
            'CURRENCY' => $arPrice['CURRENCY'],
            'PRINT_VALUE' => $arPrice['PRINT_VALUE'],
            'TYPE' => $arPrice['TYPE'],
            'PRINT_DISCOUNT_VALUE' => $arPrice['PRINT_VALUE'],
            'DISCOUNT_VALUE' => $arPrice['VALUE'],
            'DISCOUNT_DIFF' => 0,
            'DISCOUNT_DIFF_PERCENT' => 0
        ];

        $arResult['ITEMS'][$sKey]['MIN_PRICE'] = $arMinPrice;
    }
    unset($arProducts, $arSection);
}