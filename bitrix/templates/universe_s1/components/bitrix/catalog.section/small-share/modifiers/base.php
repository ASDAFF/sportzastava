<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\StringHelper;

/**
 * @var array $arParams
 * @var array $arResult
 * @var string $sPriceFrom
 */

/** Url корзины */
$sBasketUrl = ArrayHelper::getValue($arParams, 'PROPERTY_BASKET_URL');
$sBasketUrl = StringHelper::replaceMacros($sBasketUrl, ['SITE_DIR' => SITE_DIR]);
$arResult['BASKET_URL'] = $sBasketUrl;

/** Структурирование массива */
foreach ($arResult['ITEMS'] as $sKey => $arItem) {

    /**  add form ORDER_PRODUCT */
    if ($arParams['USE_BASKET'] != 'Y') {

        if (!empty($arParams['ORDER_PRODUCT_WEB_FORM'])) {
            $arItem['FORM_ORDER'] = [
                'id' => $arParams['ORDER_PRODUCT_WEB_FORM'],
                'template' => '.default',
                'parameters' => [
                    'AJAX_OPTION_ADDITIONAL' => $arItem['ID'].'SHARE_FORM_ORDER_PRODUCT',
                    'CONSENT_URL' => $arParams['CONSENT_URL']
                ],
                'settings' => [
                    'title' => GetMessage('DEFAULT_BUTTON_ORDER_PRODUCT')
                ],
                'fields' => []
            ];

            if (!empty($arParams['PROPERTY_FORM_ORDER_PRODUCT']))
                $arItem['FORM_ORDER']['fields'][$arParams['PROPERTY_FORM_ORDER_PRODUCT']] = $arItem['NAME'];
        }
    }

    $arResult['ITEMS'][$sKey] = $arItem;

    /** Обработка цен */
    if (!empty($arItem['OFFERS'])) {
        $arMinPrice = null;

        foreach ($arItem['OFFERS'] as $arOffer) {
            $arNewPrice = ArrayHelper::getValue($arOffer, 'MIN_PRICE');

            if ($arMinPrice === null || $arMinPrice['DISCOUNT_VALUE'] > $arNewPrice['DISCOUNT_VALUE']) {
                $arMinPrice = $arNewPrice;
            }
        }

        $arMinPrice['DISCOUNT_PRINT_VALUE'] = $sPriceFrom.$arMinPrice['DISCOUNT_PRINT_VALUE'];
        $arMinPrice['PRINT_VALUE'] = $sPriceFrom.$arMinPrice['PRINT_VALUE'];

        $arResult['ITEMS'][$sKey]['MIN_PRICE'] = $arMinPrice;
    }

    /** Получение данных раздела каталога товара */
    $sSection = ArrayHelper::getValue($arItem, 'IBLOCK_SECTION_ID');
    $sSectionData = [
        'NAME' => null,
        'SECTION_URL' => null
    ];

    $rsSection = CIBlockSection::GetByID($sSection);

    if ($arSection = $rsSection->GetNext()) {
        $sSectionData['NAME'] = $arSection['NAME'];
        $sSectionData['SECTION_URL'] = $arSection['SECTION_PAGE_URL'];
    }
    unset($rsSection, $arSection);

    $arResult['ITEMS'][$sKey]['SECTION_DATA'] = $sSectionData;
}