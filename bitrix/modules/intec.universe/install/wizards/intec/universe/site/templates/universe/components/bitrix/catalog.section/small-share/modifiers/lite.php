<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\StringHelper;

/**
 * @var array $arResult
 * @var array $arParams
 * @var string $sPriceFrom
 */

$arElements = ArrayHelper::getValue($arResult, 'ELEMENTS');
$bUseCommonCurrency = ArrayHelper::getValue($arParams, 'USE_COMMON_CURRENCY') == 'Y';
$sCurrency = ArrayHelper::getValue($arParams, 'CURRENCY');
$sPriceCode = ArrayHelper::getValue($arParams, 'PRICE_CODE');

/** Url корзины */
$sBasketUrl = ArrayHelper::getValue($arParams, 'PROPERTY_BASKET_URL');
$sBasketUrl = StringHelper::replaceMacros($sBasketUrl, ['SITE_DIR' => SITE_DIR]);
$arResult['BASKET_URL'] = $sBasketUrl;

/** Создание массива стартшопа */
$arProducts = [];

if (!empty($arElements)) {
    $dbProducts = CStartShopCatalogProduct::GetList(
        array(),
        array('ID' => $arElements),
        array(),
        array(),
        $bUseCommonCurrency && !empty($sCurrency) ? $sCurrency : false,
        $sPriceCode
    );

    while ($arProduct = $dbProducts->GetNext()) {
        $arProducts[$arProduct['ID']] = $arProduct;
    }
    unset($dbProducts);
}

/** Реструктурирование массива для шаблона */
foreach ($arResult['ITEMS'] as $sKey => $arItem) {
    $sItemID = ArrayHelper::getValue($arItem, 'ID');
    $arProduct = ArrayHelper::getValue($arProducts, $sItemID);

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

    if (!empty($arProducts)) {
        /** Обработка цен и корзины */
        $arPrice = ArrayHelper::getValue($arProduct, ['STARTSHOP', 'PRICES', 'MINIMAL']);
        $bCanBuy = ArrayHelper::getValue($arProduct, ['STARTSHOP', 'AVAILABLE']);
        $bOffers = !empty(ArrayHelper::getValue($arProduct, ['STARTSHOP', 'OFFERS']));

        if ($bOffers) {
            $bCanBuy = false;
            $arMinPrice = null;
            $arOffers = ArrayHelper::getValue($arProduct, ['STARTSHOP', 'OFFERS']);

            foreach ($arOffers as $arOffer) {
                $bCanBuyOffer = ArrayHelper::getValue($arOffer, ['STARTSHOP', 'AVAILABLE']);

                if ($bCanBuyOffer) {
                    $bCanBuy = true;
                }

                $arNewPrice = ArrayHelper::getValue($arOffer, ['STARTSHOP', 'PRICES', 'MINIMAL']);

                if ($arMinPrice === null || $arMinPrice['VALUE'] > $arNewPrice['VALUE']) {
                    $arMinPrice = $arNewPrice;
                }
            }

            $arMinPrice['PRINT_VALUE'] = $sPriceFrom.$arMinPrice['PRINT_VALUE'];

            /** Минимальная цена предложений по типу старшей редакции */
            $arPrice = [
                'VALUE' => $arMinPrice['VALUE'],
                'CURRENCY' => $arMinPrice['CURRENCY'],
                'PRINT_VALUE' => $arMinPrice['PRINT_VALUE'],
                'TYPE' => $arMinPrice['TYPE'],
                'PRINT_DISCOUNT_VALUE' => $arMinPrice['PRINT_VALUE'],
                'DISCOUNT_VALUE' => $arMinPrice['VALUE'],
                'CAN_BUY' => $bCanBuy ? 'Y' : 'N'
            ];
            unset($arOffers);

            $arResult['ITEMS'][$sKey]['MIN_PRICE'] = $arPrice;
            $arResult['ITEMS'][$sKey]['OFFERS'] = [
                'HAVE_OFFERS' => true
            ];
        } else {
            /** Создание массива мин. цены по типу старшей редакции */
            $arPrice = [
                'VALUE' => $arPrice['VALUE'],
                'CURRENCY' => $arPrice['CURRENCY'],
                'PRINT_VALUE' => $arPrice['PRINT_VALUE'],
                'TYPE' => $arPrice['TYPE'],
                'PRINT_DISCOUNT_VALUE' => $arPrice['PRINT_VALUE'],
                'DISCOUNT_VALUE' => $arPrice['VALUE'],
                'CAN_BUY' => $bCanBuy ? 'Y' : 'N'
            ];

            $arResult['ITEMS'][$sKey]['MIN_PRICE'] = $arPrice;
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
}