<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\JavaScript;
use intec\core\helpers\ArrayHelper;

/**
 * @var $APPLICATION
 * @var array $arResult
 * @var array $arParams
 */

if (empty($arParams['OFFERS_PROPERTIES_MODE']) || !in_array($arParams['OFFERS_PROPERTIES_MODE'], ['COLOR', 'TEXT', 'COLOR_TEXT'])) {
    $arParams['OFFERS_PROPERTIES_MODE'] = 'COLOR_TEXT';
}

$showPreviewDescription = false;
if (!empty($arParams['DISPLAY_PREVIEW_TEXT_MODE']) && isset($arResult['PREVIEW_TEXT']) && strlen($arResult['PREVIEW_TEXT']) > 0) {
    switch ($arParams['DISPLAY_PREVIEW_TEXT_MODE']) {
        case 'E':
            if (!isset($arResult['DETAIL_TEXT']) || strlen($arResult['DETAIL_TEXT']) < 1)
                $showPreviewDescription = true;
            break;
        case 'S':
            $showPreviewDescription = true;
            break;
    }
}

// Product characteristics
$characteristics = array();
foreach ($arResult['DISPLAY_PROPERTIES'] as $key => $property) {
    if (empty($property['VALUE']))
        continue;

    $characteristics[$key] = $property;
}

// Product videos
$videoLinks = array();
if (!empty($arResult['PROPERTIES'][$arParams['PROPERTY_VIDEO']]['VALUE'])
    && !empty($arParams['VIDEO_IBLOCK_ID'])
    && !empty($arParams['VIDEO_IBLOCK_PROPERTY']))
{
    $videos = CIBlockElement::GetList(array(), array(
        'ID' => $arResult['PROPERTIES'][$arParams['PROPERTY_VIDEO']]['VALUE'],
        'IBLOCK_ID' => $arParams['VIDEO_IBLOCK_ID']
    ));
    while ($CIBElement = $videos->GetNextElement()) {
        $elementProperties = $CIBElement->GetProperties(false, array('CODE' => 'LINK'));
        if (empty($elementProperties[$arParams['VIDEO_IBLOCK_PROPERTY']]['VALUE'])) {
            continue;
        }
        $videoLinks[] = $elementProperties[$arParams['VIDEO_IBLOCK_PROPERTY']]['VALUE'];
    }
    unset($videos);
}

// Documents
$documentsList = array();
if (!empty($arResult['PROPERTIES'][$arParams['PROPERTY_DOCUMENTS']]['VALUE'])) {
    foreach ($arResult['PROPERTIES'][$arParams['PROPERTY_DOCUMENTS']]['VALUE'] as $fileId) {
        if (!is_numeric($fileId))
            continue;

        $file = CFile::GetFileArray($fileId);
        if ($file) {
            $file['FILE_SIZE_KB'] = round($file['FILE_SIZE'] / 1024, 2);
            $documentsList[] = $file;
        }
    }
}

$hasTab = array(
    'description' => !empty($arResult['DETAIL_TEXT']),
    'characteristics' => !empty($characteristics),
    'documents' => !empty($arResult['PROPERTIES'][$arParams['PROPERTY_DOCUMENTS']]['VALUE']),
    'video' => !empty($videoLinks),
    'reviews' => !empty($arParams['REVIEWS_IBLOCK'])
);
$activeTab = '';
foreach ($hasTab as $key => $val) {
    if ($val) {
        $activeTab = $key;
        break;
    }
}

// Product brand
$brand = false;
if ($arParams['BRAND_USE'] == 'Y' && !empty($arResult['PROPERTIES'][$arParams['PROPERTY_BRAND']]['VALUE'])) {
    $brands = CIBlockElement::GetByID($arResult['PROPERTIES'][$arParams['PROPERTY_BRAND']]['VALUE']);
    $brand = $brands->GetNext();
    unset($brands);
}

$isNew = ArrayHelper::getValue($arResult, ['PROPERTIES', $arParams['PROPERTY_IS_NEW'], 'VALUE']) ? true : false;
$isPopular = ArrayHelper::getValue($arResult, ['PROPERTIES', $arParams['PROPERTY_IS_POPULAR'], 'VALUE']) ? true : false;
$isRecommendation = ArrayHelper::getValue($arResult, ['PROPERTIES', $arParams['PROPERTY_IS_RECOMMENDATION'], 'VALUE']) ? true : false;

// -------------------- For main_image --------------------
$strTitle = !empty($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"])
    ? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
    : $arResult['NAME'];

$strAlt = !empty($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"])
    ? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
    : $arResult['NAME'];

$morePhotoList = array();
foreach ($arResult['MORE_PHOTO'] as $photo) {
    $morePhotoList[] = $photo['SRC'];
}
if (!empty($arResult['PROPERTIES'][$arParams['PROPERTY_MORE_PHOTO']]['VALUE'])) {
    foreach ($arResult['PROPERTIES'][$arParams['PROPERTY_MORE_PHOTO']]['VALUE'] as $fileId) {
        if (is_numeric($fileId)) {
            $morePhotoList[] = CFile::GetPath($fileId);
        }
    }
}

reset($arResult['MORE_PHOTO']);
$arFirstPhoto = current($arResult['MORE_PHOTO']);
// -------------------- /main_image --------------------


// -------------------- For price_block --------------------
$arItemIDs = array(
    'ID' => $strMainID,
    'PICT' => $strMainID.'_pict',
    'DISCOUNT_PICT_ID' => $strMainID.'_dsc_pict',
    'STICKER_ID' => $strMainID.'_sticker',
    'BIG_SLIDER_ID' => $strMainID.'_big_slider',
    'BIG_IMG_CONT_ID' => $strMainID.'_bigimg_cont',
    'SLIDER_CONT_ID' => $strMainID.'_slider_cont',
    'SLIDER_LIST' => $strMainID.'_slider_list',
    'SLIDER_LEFT' => $strMainID.'_slider_left',
    'SLIDER_RIGHT' => $strMainID.'_slider_right',
    'OLD_PRICE' => $strMainID.'_old_price',
    'PRICE' => $strMainID.'_price',
    'DISCOUNT_PRICE' => $strMainID.'_price_discount',
    'SLIDER_CONT_OF_ID' => $strMainID.'_slider_cont_',
    'SLIDER_LIST_OF_ID' => $strMainID.'_slider_list_',
    'SLIDER_LEFT_OF_ID' => $strMainID.'_slider_left_',
    'SLIDER_RIGHT_OF_ID' => $strMainID.'_slider_right_',
    'QUANTITY' => $strMainID.'_quantity',
    'QUANTITY_DOWN' => $strMainID.'_quant_down',
    'QUANTITY_UP' => $strMainID.'_quant_up',
    'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
    'QUANTITY_LIMIT' => $strMainID.'_quant_limit',
    'BASIS_PRICE' => $strMainID.'_basis_price',
    'BUY_LINK' => $strMainID.'_buy_link',
    'ADD_BASKET_LINK' => $strMainID.'_add_basket_link',
    'BASKET_ACTIONS' => $strMainID.'_basket_actions',
    'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
    'COMPARE_LINK' => $strMainID.'_compare_link',
    'PROP' => $strMainID.'_prop_',
    'PROP_DIV' => $strMainID.'_skudiv',
    'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
    'OFFER_GROUP' => $strMainID.'_set_group_',
    'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
    'SUBSCRIBE_LINK' => $strMainID.'_subscribe',
);

$minPrice = isset($arResult['RATIO_PRICE']) ? $arResult['RATIO_PRICE'] : $arResult['MIN_PRICE'];
$currentOffer = [];

if (!empty($arResult['OFFERS'])) {
    $canBuy = $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['CAN_BUY'];

    foreach ($arResult['OFFERS'] as $k => $offer) {
        if ($k == 0 || $offer['MIN_PRICE']['VALUE'] < $minPrice['VALUE']) {
            $minPrice = $offer['MIN_PRICE'];
            $currentOffer = $offer;
        }
    }

    $arJSParams = array(
        'CONFIG' => array(
            'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
            'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] == 'Y',
            'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] == 'Y',
            'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'] == 'Y',
            'SHOW_SKU_PROPS' => $arResult['SHOW_OFFERS_PROPS'],
            'OFFER_GROUP' => $arResult['OFFER_GROUP'],
            'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE']
        ),
        'PRODUCT_TYPE' => $arResult['CATALOG_TYPE'],
        'VISUAL' => array(
            'ID' => $arItemIDs['ID'],
            'CURRENT_PATH' => $this->GetFolder(),
            'ONE_CLICK_BUY' => $arItemIDs['ONE_CLICK_BUY'],
        ),
        'DEFAULT_PICTURE' => array(
            'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
            'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
        ),
        'PRODUCT' => array(
            'ID' => $arResult['ID'],
            'NAME' => $arResult['~NAME']
        ),
        'BASKET' => array(
            'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
            'BASKET_URL' => $arParams['BASKET_URL'],
            'SKU_PROPS' => $arResult['OFFERS_PROP_CODES']
        ),
        'OFFERS' => $arResult['JS_OFFERS'],
        'OFFER_SELECTED' => $arResult['OFFERS_SELECTED'],
        'PROPERTIES' => $arResult['SKU_PROPS']
    );

} else {
    $currentOffer = $arResult;
    $canBuy = $arResult['CAN_BUY'];
}

$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showSubscribeBtn = $arResult['CATALOG_SUBSCRIBE'] == 'Y';
// -------------------- /price_block --------------------