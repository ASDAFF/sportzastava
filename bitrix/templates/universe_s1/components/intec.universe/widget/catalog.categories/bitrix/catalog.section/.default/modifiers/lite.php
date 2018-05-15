<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;

/**
 * @var array $arParams
 * @var array $arResult
 * @var array $arSections
 */

if (!Loader::includeModule('intec.startshop'))
    return;


$arParams['DISPLAY_DISCOUNT'] = 'N';


$arItemsIDs = $arResult['ELEMENTS'];
if (!empty($arItemsIDs)) {
    $arProducts = array();
    $dbProducts = CStartShopCatalogProduct::GetList(
        array(),
        array('ID' => $arItemsIDs),
        array(),
        array(),
        ($arParams['USE_COMMON_CURRENCY'] == 'Y' && !empty($arParams['CURRENCY']) ? $arParams['CURRENCY'] : false),
        $arParams['PRICE_CODE']
    );

    while ($row = $dbProducts->GetNext()) {
        $arProducts[$row['ID']] = $row;
    }
}

while ($row = $rsIBlockSections->GetNext()) {
    $arIBlockSections[$row['ID']] = $row;
}

foreach ($arResult['ITEMS'] as $sKey => &$arItem) {
    $iIBlockSectionId = ArrayHelper::getValue($arItem, 'IBLOCK_SECTION_ID');
    $arItem['IBLOCK_SECTION'] = null;

    $arItem['CAN_BUY'] = false;
    $arItem['HAS_OFFERS'] = false;

    $arItem['BASKET'] = array(
        'IN' => !empty($oBasketItem) && !$oBasketItem->isDelay(),
        'DELAY' => !empty($oBasketItem) && $oBasketItem->isDelay(),
    );

    if (!empty($iIBlockSectionId) && ArrayHelper::keyExists($iIBlockSectionId, $arIBlockSections))
        $arItem['IBLOCK_SECTION'] = ArrayHelper::getValue($arIBlockSections, $iIBlockSectionId);

    $sId = ArrayHelper::getValue($arItem, ['PROPERTIES', $sPropertySection, 'VALUE_XML_ID']);
    $sValue = ArrayHelper::getValue($arItem, ['PROPERTIES', $sPropertySection, 'VALUE']);

    if (!empty($arProducts[$arItem['ID']])) {
        $arResult['ITEMS'][$sKey]['STARTSHOP'] = $arProducts[$arItem['ID']]['STARTSHOP'];
    }

    /** add form 'ORDER_PRODUCT' */
    if ($arParams['USE_BASKET'] != 'Y') {

        if (!empty($arParams['ORDER_PRODUCT_WEB_FORM'])) {
            $arItem['FORM_ORDER'] = [
                'id' => $arParams['ORDER_PRODUCT_WEB_FORM'],
                'template' => '.default',
                'parameters' => [
                    'AJAX_OPTION_ADDITIONAL' => $arItem['ID'].'CATEGORIES_FORM_ORDER_PRODUCT',
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

    //
    $arItem['CAN_BUY'] = ArrayHelper::getValue($arItem, ['STARTSHOP', 'AVAILABLE']) == 1 ? true : false;
    $arItem['HAS_OFFERS'] = $hasOffers = !empty(ArrayHelper::getValue($arItem, ['STARTSHOP', 'OFFERS'])) ? true : false;

    if ($hasOffers) {
        $shopOffers = ArrayHelper::getValue($arItem, ['STARTSHOP', 'OFFERS']);
        $shopOfferPrice = null;
        $shopOfferPriceMin = null;

        foreach ($shopOffers as $elementOffer) {
            $shopOfferPrice = ArrayHelper::getValue($elementOffer, ['STARTSHOP', 'PRICES', 'MINIMAL']);
            if ($shopOfferPriceMin === null || $shopOfferPrice < $shopOfferPriceMin) {
                $shopOfferPriceMin = $shopOfferPrice;
            }
            $buyOffer = ArrayHelper::getValue($elementOffer, ['STARTSHOP', 'AVAILABLE']) == 1;
            if ($buyOffer)
                $arItem['CAN_BUY'] = true;
        }
        $arItem['PRICE'] = $shopOfferPriceMin;
    } else {
        $arItem['PRICE'] = ArrayHelper::getValue($arItem, ['STARTSHOP', 'PRICES', 'MINIMAL']);
    }

    $arItem['PRICE']['DISCOUNT_PRICE'] = ArrayHelper::getValue($arItem, ['PRICE', 'VALUE']);
    $arItem['PRICE']['PRINT_DISCOUNT_VALUE'] = ArrayHelper::getValue($arItem, ['PRICE', 'PRINT_VALUE']);
    $arItem['PRICE']['DISCOUNT_DIFF'] = $arItem['PRICE']['DISCOUNT_DIFF_PERCENT'] = 0;

    if (!empty($sId) && !empty($sValue)) {
        if (!ArrayHelper::keyExists($sId, $arSections))
            $arSections[$sId] = array(
                'NAME' => $sValue,
                'CODE' => $sId,
                'ITEMS' => array()
            );

        $arSections[$sId]['ITEMS'][] = $arItem;
    }
}