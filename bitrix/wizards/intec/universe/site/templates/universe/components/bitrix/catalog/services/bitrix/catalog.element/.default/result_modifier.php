<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * @var array $arParams
 */

$arDefaultParams = array(
    'ELEMENT_CAPTION_DESCRIPTION' => GetMessage('SERVICE_HEADER_DESCRIPTION_CAPTION'),
    'ELEMENT_CAPTION_SPECIALIST' => GetMessage('SRVICE_CAPTION_SPECIALIST'),
    'ELEMENT_CAPTION_DOCUMENTS' => GetMessage('SRVICE_CAPTION_DOCUMENTS'),
    'ELEMENT_CAPTION_CHARACTERISTICS' => GetMessage('SRVICE_CAPTION_CHARACTERISTICS'),
    'ELEMENT_CAPTION_GALERY' => GetMessage('SRVICE_CAPTION_GALLERY'),
    'ELEMENT_CAPTION_PROJECTS' => GetMessage('SRVICE_CAPTION_PROJECTS'),
    'ELEMENT_CAPTION_REVIEWS' => GetMessage('SRVICE_CAPTION_REVIEWS'),
    'ELEMENT_CAPTION_SERVICES' => GetMessage('SRVICE_CAPTION_SERVICES'),
    'ELEMENT_CAPTION_VIDEO' => GetMessage('SRVICE_CAPTION_VIDEO'),
    'ELEMENT_CAPTION_HOW_WE_WORK' => GetMessage('SRVICE_CAPTION_HOW_WE_WORK'),
    'ELEMENT_CAPTION_OUR_ADVANTAGES' => GetMessage('SRVICE_CAPTION_OUR_ADVANTAGES'),
    'ELEMENT_CAPTION_OUR_CLIENTS' => GetMessage('SRVICE_CAPTION_OUR_CLIENTS'),
    'ELEMENT_CAPTION_CONTACTS' => GetMessage('SRVICE_CAPTION_CONTACTS')
);

$arParams = array_merge($arDefaultParams, $arParams);

$arData = array();

/** Price */
$arData['PRICE'] = array();
$arData['PRICE']['SHOW'] = false;
$arData['PRICE']['VALUE'] = 0;
$arData['PRICE']['FORMATTED'] = 0;

if (!empty($arResult['PROPERTIES'][$arParams["NAME_PROP_PRICE"]]['VALUE'])) {
    $arData['PRICE']['SHOW'] = true;
    $arData['PRICE']['VALUE'] = $arResult['PROPERTIES'][$arParams["NAME_PROP_PRICE"]]['VALUE'];
    $arData['PRICE']['FORMATTED'] = GetMessage('SERVICE_HEADER_PRICE_FROM').' '.
        $arResult['PROPERTIES'][$arParams["NAME_PROP_PRICE"]]['VALUE'].' '.
        GetMessage('SERVICE_HEADER_PRICE_CURRENCY');
}

/** Preview text */
$arData['PREVIEW_TEXT'] = array();
$arData['PREVIEW_TEXT']['SHOW'] = true;
$arData['PREVIEW_TEXT']['VALUE'] = $arResult['PREVIEW_TEXT'];

/** Detail text */
$arData['DETAIL_TEXT'] = array();
$arData['DETAIL_TEXT']['SHOW'] = true;
$arData['DETAIL_TEXT']['VALUE'] = $arResult['DETAIL_TEXT'];

/** Banner image */
$arData['IMAGE'] = array();
$arData['IMAGE']['SHOW'] = false;
$arData['IMAGE']['PATH'] = "";

if (!empty($arResult['DETAIL_PICTURE'])) {
    $arData['IMAGE']['SHOW'] = true;
    $arData['IMAGE']['PATH'] = CFile::ResizeImageGet(
        $arResult['DETAIL_PICTURE'],
        array('width' => 1280, 'height' => 600),
        BX_RESIZE_IMAGE_PROPORTIONAL_ALT
    );
    $arData['IMAGE']['PATH'] = $arData['IMAGE']['PATH']['src'];
} else if (!empty($arResult['PREVIEW_PICTURE'])) {
    $arData['IMAGE']['SHOW'] = true;
    $arData['IMAGE']['PATH'] = CFile::ResizeImageGet(
        $arResult['PREVIEW_PICTURE'],
        array('width' => 1280, 'height' => 800),
        BX_RESIZE_IMAGE_PROPORTIONAL_ALT
    );
    $arData['IMAGE']['PATH'] = $arData['IMAGE']['PATH']['src'];
}

/** Specialist */
$arData['SPECIALIST'] = array();
$arData['SPECIALIST']['SHOW'] = false;
$arData['SPECIALIST']['VALUE'] = null;

if (!empty($arResult['PROPERTIES']['SPECIALIST']['VALUE'])) {
    $dbSpecialist = CIBlockElement::GetByID($arResult['PROPERTIES']['SPECIALIST']['VALUE']);

    if ($arSpecialist = $dbSpecialist->Fetch()) {
        $arData['SPECIALIST']['SHOW'] = true;
        $arData['SPECIALIST']['VALUE'] = $arSpecialist['ID'];
    }

    unset($arSpecialist, $dbSpecialist);
}

$arData['SPECIALIST']['ELEMENT'] = $arData['SPECIALIST']['SHOW'] && !empty($arResult['PROPERTIES']['SPECIALIST_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['SPECIALIST_ELEMENT']['VALUE_XML_ID'] : null;


/** Characteristics */
$arData['CHARACTERISTICS'] = array();
$arData['CHARACTERISTICS']['SHOW'] = !empty($arResult['PROPERTIES']['CHARACTERISTICS']['VALUE']) ? true : false;
$arData['CHARACTERISTICS']['VALUE'] = $arResult['PROPERTIES']['CHARACTERISTICS']['VALUE'];
$arData['CHARACTERISTICS']['ELEMENT'] = $arData['CHARACTERISTICS']['SHOW'] && !empty($arResult['PROPERTIES']['CHARACTERISTICS_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['CHARACTERISTICS_ELEMENT']['VALUE_XML_ID'] : null;

if (!empty($arResult['PROPERTIES']['CONTACT']['VALUE'])) {
    $dbContact = CIBlockElement::GetByID($arResult['PROPERTIES']['CONTACT']['VALUE']);

    if ($arContact = $dbContact->Fetch()) {
        $arData['CONTACT']['SHOW'] = true;
        $arData['CONTACT']['VALUE'] = $arContact['ID'];
    }

    unset($arContact, $dbContact);
}

/** Gallery */
$arData['GALLERY'] = array();
$arData['GALLERY']['SHOW'] = !empty($arResult['PROPERTIES'][$arParams["NAME_PROP_GALLERY"]]['VALUE']) ? true : false;
$arData['GALLERY']['VALUE'] = $arResult['PROPERTIES'][$arParams["NAME_PROP_GALLERY"]]['VALUE'];
$arData['GALLERY']['ELEMENT'] = $arData['GALLERY']['SHOW'] && !empty($arResult['PROPERTIES']['GALLERY_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['GALLERY_ELEMENT']['VALUE_XML_ID'] : null;

/** Projects */
$arData['PROJECTS'] = array();
$arData['PROJECTS']['SHOW'] = !empty($arResult['PROPERTIES'][$arParams["NAME_PROP_PROJECTS"]]['VALUE']) ? true : false;
$arData['PROJECTS']['VALUE'] = $arResult['PROPERTIES'][$arParams["NAME_PROP_PROJECTS"]]['VALUE'];
$arData['PROJECTS']['ELEMENT'] = $arData['PROJECTS']['SHOW'] && !empty($arResult['PROPERTIES']['PROJECTS_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['PROJECTS_ELEMENT']['VALUE_XML_ID'] : null;

/** Reviews */
$arData['REVIEWS'] = array();
$arData['REVIEWS']['SHOW'] = !empty($arResult['PROPERTIES'][$arParams["NAME_PROP_REVIEWS"]]['VALUE']) ? true : false;
$arData['REVIEWS']['VALUE'] = $arResult['PROPERTIES'][$arParams["NAME_PROP_REVIEWS"]]['VALUE'];
$arData['REVIEWS']['ELEMENT'] = $arData['REVIEWS']['SHOW'] && !empty($arResult['PROPERTIES']['REVIEWS_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['REVIEWS_ELEMENT']['VALUE_XML_ID'] : null;

/** Related services */
$arData['SERVICES'] = array();
$arData['SERVICES']['SHOW'] = !empty($arResult['PROPERTIES'][$arParams["NAME_PROP_SERVICES"]]['VALUE']) ? true : false;
$arData['SERVICES']['VALUE'] = $arResult['PROPERTIES'][$arParams["NAME_PROP_SERVICES"]]['VALUE'];
$arData['SERVICES']['ELEMENT'] = $arData['SERVICES']['SHOW'] && !empty($arResult['PROPERTIES']['SERVICES_ELEMENT']['VALUE_XML_ID']) ? $arResult['PROPERTIES']['SERVICES_ELEMENT']['VALUE_XML_ID'] : null;

/** Video */
$arData['VIDEO'] = array();
$arData['VIDEO']['SHOW'] = !empty($arResult['PROPERTIES'][$arParams["NAME_PROP_VIDEO"]]['VALUE']) ? true : false;
$arData['VIDEO']['VALUE'] = $arResult['PROPERTIES'][$arParams["NAME_PROP_VIDEO"]]['VALUE'];

/** Related catalog elements */
$sFieldCode = $arParams['NAME_PROP_PRODUCTS'];
$arData['PRODUCTS'] = array();
$arData['PRODUCTS']['SHOW'] = !empty($arResult['PROPERTIES'][$sFieldCode]['VALUE']) ? true : false;
$arData['PRODUCTS']['VALUE'] = $arResult['PROPERTIES'][$sFieldCode]['VALUE'];

$arResult['DATA'] = $arData;