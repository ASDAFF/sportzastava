<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Iblock;
use Bitrix\Main\Loader;
use Bitrix\Main\Context;
use intec\core\helpers\ArrayHelper;

/**
 * @var CBitrixComponentTemplate $this
 * @var array $arParams
 * @var array $arResult
 */

$minPrice = null;
$currentOffer = null;
$arResult['DISPLAY_DELAY'] = true;
$arResult['FAST_ORDER_COMPONENT'] = '';
$arResult['SHOW_SLIDER'] = true;

if (Loader::includeModule('catalog')) {
    require_once('modifiers/base.php');
} else if (Loader::includeModule('intec.startshop')) {
    require_once('modifiers/lite.php');
}


// Offers properties mode
$offersPropertiesMode = ArrayHelper::getValue($arParams, 'OFFERS_PROPERTIES_MODE');
$arParams['OFFERS_PROPERTIES_MODE'] = ArrayHelper::fromRange(['COLOR_TEXT', 'COLOR', 'TEXT'], $offersPropertiesMode, true);
unset($offersPropertiesMode);

// Show preview description
$arResult['DESCRIPTION_SHOW'] = $arParams['DESCRIPTION_SHOW'] === 'Y' && !empty($arResult['PREVIEW_TEXT']);

// Product characteristics
$characteristics = array();
foreach ($arResult['DISPLAY_PROPERTIES'] as $key => $property) {
    if (empty($property['VALUE']))
        continue;

    if (is_array($property['VALUE']))
        $property['VALUE'] = implode(', ', $property['VALUE']);

    $characteristics[$key] = $property;
}

// Product videos
$videoIds = ArrayHelper::getValue($arResult, ['PROPERTIES', $arParams['PROPERTY_VIDEO'], 'VALUE']);
$videoLinks = array();
if (!empty($videoIds)
    && !empty($arParams['VIDEO_IBLOCK_ID'])
    && !empty($arParams['VIDEO_IBLOCK_PROPERTY']))
{
    $videos = CIBlockElement::GetList(array(), array(
        'ID' => $videoIds,
        'IBLOCK_ID' => $arParams['VIDEO_IBLOCK_ID']
    ));
    while ($CIBElement = $videos->GetNextElement()) {
        $element = $CIBElement->GetFields();
        $element['PROPERTIES'] = $CIBElement->GetProperties(false, array('CODE' => $arParams['VIDEO_IBLOCK_PROPERTY']));
        $link = ArrayHelper::getValue($element, ['PROPERTIES', $arParams['VIDEO_IBLOCK_PROPERTY'], 'VALUE']);
        if (!empty($link)) {
            $videoLinks[] = [
                'ID' => $element['ID'],
                'NAME' => $element['NAME'],
                'URL' => $link
            ];
        }
    }
    unset($videos);
}

// Documents
$documents = array();
if (!empty($arResult['PROPERTIES'][$arParams['PROPERTY_DOCUMENTS']]['VALUE'])) {
    foreach ($arResult['PROPERTIES'][$arParams['PROPERTY_DOCUMENTS']]['VALUE'] as $fileId) {
        if (!is_numeric($fileId))
            continue;

        $file = CFile::GetFileArray($fileId);
        if ($file) {
            $file['FILE_SIZE_KB'] = round($file['FILE_SIZE'] / 1024, 2);
            $documents[] = $file;
        }
    }
}

// Product brand
$brandId = ArrayHelper::getValue($arResult, ['PROPERTIES', $arParams['PROPERTY_BRAND'], 'VALUE']);
$brand = false;
if ($arParams['BRAND_USE'] == 'Y' && $brandId) {
    $brand = CIBlockElement::GetByID($brandId)->GetNext();
    $brandPic = !empty($brand['PREVIEW_PICTURE']) ? $brand['PREVIEW_PICTURE'] : (!empty($brand ['DETAIL_PICTURE'] ? $brand ['DETAIL_PICTURE'] : false));
    if ($brandPic) {
        $picture = CFile::ResizeImageGet(
            $brandPic,
            array(
                'width' => 200,
                'height' => 60
            ),
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT
        );
        $brand['SRC'] = $picture['src'];
    }
    unset($picture);
}

// Photos
$morePhotoList = array();

if (!empty($arResult['DETAIL_PICTURE'])) {
    $morePhotoList[] = $arResult['DETAIL_PICTURE'];
} else if (!empty($arResult['PREVIEW_PICTURE'])) {
    $morePhotoList[] = $arResult['PREVIEW_PICTURE'];
}

foreach ($arResult['MORE_PHOTO'] as $photo) {
    $morePhotoList[] = array_merge($photo, ['SRC' => $photo['SRC']]);
}
$morePhotoIds = ArrayHelper::getValue($arResult, ['PROPERTIES', $arParams['PROPERTY_MORE_PHOTO'], 'VALUE']);
$rsMorePhoto = CFile::GetList([], ['@ID' => $morePhotoIds]);
while ($row = $rsMorePhoto->GetNext()) {
    $photoSrc = CFile::GetFileSRC($row);
    if ($photoSrc)
        $morePhotoList[] = array_merge($row, ['SRC' => $photoSrc]);
}
unset($rsMorePhoto, $row);
reset($morePhotoList);
$arFirstPhoto = current($morePhotoList);


// Price block
$arResult['MIN_PRICE'] = ArrayHelper::getValue($arResult, 'RATIO_PRICE', $arResult['MIN_PRICE']);

if (!empty($arResult['OFFERS'])) {
    $arResult['CAN_BUY'] = $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['CAN_BUY'];
}


$arResult['PRODUCT_DATA'] = [
    'CHARACTERISTICS' => $characteristics,
    'VIDEO_LINKS' => $videoLinks,
    'DOCUMENTS' => $documents,
    'BRAND' => $brand,
    'MORE_PHOTO' => $morePhotoList,
    'FIRST_PHOTO' => $arFirstPhoto
];


if (empty($currentOffer)) {
    $arResult['CURRENT_OFFER'] = $arResult;
}


//add form 'ORDER_PRODUCT'
if ($arParams['USE_BASKET'] != 'Y') {

    if (!empty($arParams['ORDER_PRODUCT_WEB_FORM'])) {
        $arResult['FORM_ORDER'] = [
            'id' => $arParams['ORDER_PRODUCT_WEB_FORM'],
            'template' => '.default',
            'parameters' => [
                'AJAX_OPTION_ADDITIONAL' => $arResult['ID'].'_FORM_ORDER_PRODUCT',
                'CONSENT_URL' => $arParams['CONSENT_URL']
            ],
            'settings' => [
                'title' => GetMessage('DEFAULT_BUTTON_ORDER_PRODUCT')
            ],
            'fields' => []
        ];

        if (!empty($arParams['PROPERTY_FORM_ORDER_PRODUCT']))
            $arResult['FORM_ORDER']['fields'][$arParams['PROPERTY_FORM_ORDER_PRODUCT']] = $arResult['NAME'];
    }
}