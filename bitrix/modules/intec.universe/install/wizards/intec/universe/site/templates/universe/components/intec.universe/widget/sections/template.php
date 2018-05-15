<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

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
    "bitrix:news.list",
    "",
    Array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "NEWS_COUNT" => $arParams["ITEMS_LIMIT"],
        "DISPLAY_TITLE" => $arParams["DISPLAY_TITLE"],
        "TITLE" => $arParams["TITLE"],
        "ALIGHT_HEADER" => $arParams["ALIGHT_HEADER"],
        "DISPLAY_DESCRIPTION" => $arParams["DISPLAY_DESCRIPTION"],
        "DESCRIPTION" => $arParams["DESCRIPTION"],
        'ALIGHT_DESCRIPTION' => $arParams['ALIGHT_DESCRIPTION'],
        "DESKTOP_TEMPLATE" => $arParams["DESKTOP_TEMPLATE"],
        "MOBILE_TEMPLATE" => $arParams["MOBILE_TEMPLATE"],
        "COUNT_IN_ROW" => $arParams["COUNT_IN_ROW"],
        "MAIN_ELEMENT" => $arParams["MAIN_ELEMENT"],
        "PROPERTY_CODE" => array(
            $arParams["PROPERTY_LINK"],
            $arParams["PROPERTY_TARGET"],
            $arParams["PROPERTY_SIZE"],
            $arParams['PROPERTY_STICKER'],
            $arParams['PROPERTY_SHOW_STICKER']
        ),

        "PROPERTY_LINK" => $arParams["PROPERTY_LINK"],
        "PROPERTY_TARGET" => $arParams["PROPERTY_TARGET"],
        "PROPERTY_SIZE" => $arParams["PROPERTY_SIZE"],
        'PROPERTY_STICKER' => $arParams['PROPERTY_STICKER'],
        'PROPERTY_SHOW_STICKER' => $arParams['PROPERTY_SHOW_STICKER'],

        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_FIRST_VIDEO" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array("",""),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_PROPERTY" => "",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => $arParams["SORT_BY1"],
        "SORT_BY2" => $arParams["SORT_BY2"],
        "SORT_ORDER1" => $arParams["SORT_ORDER1"],
        "SORT_ORDER2" => $arParams["SORT_ORDER2"],
        "STRICT_SECTION_CHECK" => "N"
    ),$component
);?>