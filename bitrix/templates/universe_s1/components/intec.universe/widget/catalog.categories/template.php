<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 */

$this->setFrameMode(true);

if (!CModule::IncludeModule('intec.core'))
    return;


$APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "",
    array(
        'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'SECTION_ID' => null,
        'SECTION_CODE' => null,
        'FILTER_NAME' => $arParams['FILTER_NAME'],
        'INCLUDE_SUBSECTIONS' => 'Y',
        'SHOW_ALL_WO_SECTION' => 'Y',
        'HIDE_NOT_AVAILABLE' => 'N',
        'HIDE_NOT_AVAILABLE_OFFERS' => 'N',
        'ELEMENT_SORT_FIELD' => 'SORT',
        'ELEMENT_SORT_ORDER' => 'ASC',
        'ELEMENT_SORT_FIELD2' => 'ID',
        'ELEMENT_SORT_ORDER2' => 'DESC',
        'OFFERS_SORT_FIELD' => 'SORT',
        'OFFERS_SORT_ORDER' => 'ASC',
        'OFFERS_SORT_FIELD2' => 'ID',
        'OFFERS_SORT_ORDER2' => 'DESC',
        'PAGE_ELEMENT_COUNT' => $arParams['ITEMS_LIMIT'],
        'PROPERTY_CODE' => array(
            $arParams['PROPERTY_SECTION']
        ),
        'PROPERTY_LABEL_NEW' => $arParams['PROPERTY_LABEL_NEW'],
        'PROPERTY_LABEL_RECOMMEND' => $arParams['PROPERTY_LABEL_RECOMMEND'],
        'PROPERTY_LABEL_HIT' => $arParams['PROPERTY_LABEL_HIT'],
        'PROPERTY_SECTION' => $arParams['PROPERTY_SECTION'],
        'DISPLAY_DISCOUNT' => $arParams['DISPLAY_DISCOUNT'],
        'OFFERS_FIELD_CODE' => array(),
        'OFFERS_PROPERTY_CODE' => array(),
        'OFFERS_LIMIT' => 0,
        'SECTION_URL' => $arParams['SECTION_URL'],
        'DETAIL_URL' => $arParams['DETAIL_URL'],
        'SECTION_ID_VARIABLE' => null,
        'SEF_MODE' => 'N',
        'AJAX_MODE' => 'N',
        'CACHE_TYPE' => $arParams['CACHE_TYPE'],
        'CACHE_TIME' => $arParams['CACHE_TIME'],
        'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
        'SET_TITLE' => 'N',
        'SET_BROWSER_TITLE' => 'N',
        'SET_META_KEYWORDS' => 'N',
        'SET_META_DESCRIPTION' => 'N',
        'SET_LAST_MODIFIED' => 'N',
        'USE_MAIN_ELEMENT_SECTION' => 'N',
        'ADD_SECTIONS_CHAIN' => 'N',
        'CACHE_FILTER' => 'N',
        'ACTION_VARIABLE' => null,
        'PRODUCT_ID_VARIABLE' => null,
        'PRICE_CODE' => $arParams['PRICE_CODE'],
        'USE_PRICE_COUNT' => 'N',
        'SHOW_PRICE_COUNT' => '1',
        'PRICE_VAT_INCLUDE' => 'Y',
        'CONVERT_CURRENCY' => 'N',
        'BASKET_URL' => $arParams['BASKET_URL'],
        'USE_PRODUCT_QUANTITY' => 'N',
        'PRODUCT_QUANTITY_VARIABLE' => null,
        'ADD_PROPERTIES_TO_BASKET' => 'N',
        'PRODUCT_PROPS_VARIABLE' => null,
        'PARTIAL_PRODUCT_PROPERTIES' => 'N',
        'PRODUCT_PROPERTIES' => array(),
        'OFFERS_CART_PROPERTIES' => array(),
        'DISPLAY_COMPARE' => 'N',
        'DISPLAY_TOP_PAGER' => 'N',
        'DISPLAY_BOTTOM_PAGER' => 'N',
        'PAGER_SHOW_ALWAYS' => 'N',
        'PAGER_SHOW_ALL' => 'N',
        'PAGER_BASE_LINK_ENABLE' => 'N',
        'SET_STATUS_404' => 'N',
        'SHOW_404' => 'N',
        'COMPATIBLE_MODE' => 'Y',
        'DISABLE_INIT_JS_IN_COMPONENT' => 'N',
        'VIEW_DESKTOP' => $arParams['VIEW_DESKTOP'],
        'VIEW_MOBILE' => $arParams['VIEW_MOBILE'],
        'DISPLAY_TITLE' => $arParams["DISPLAY_TITLE"],
        "TITLE_ALIGN" => $arParams["TITLE_ALIGN"],
        "TITLE" => $arParams["TITLE"],
        "DISPLAY_DESCRIPTION" => $arParams["SHOW_DESCRIPTION"],
        "DESCRIPTION" => $arParams["DESCRIPTION"],
        'DESCRIPTION_ALIGN' => $arParams['DESCRIPTION_ALIGN'],
        "COUNT_ELEMENT_IN_ROW" => $arParams["COUNT_ELEMENT_IN_ROW"],
        'ORDER_PRODUCT_WEB_FORM' => $arParams['ORDER_PRODUCT_WEB_FORM'],
        'PROPERTY_FORM_ORDER_PRODUCT' => $arParams['PROPERTY_FORM_ORDER_PRODUCT'],
        'USE_BASKET' => $arParams['USE_BASKET'],
        'CONSENT_URL' => $arParams['CONSENT_URL']
    ),
    $component
);