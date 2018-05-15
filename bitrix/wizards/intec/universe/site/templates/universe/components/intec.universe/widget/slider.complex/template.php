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
    "slider.complex",
    array(
        "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "NEWS_COUNT" => $arParams['SLIDER_COUNT'],
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "NAME",
        "SORT_ORDER2" => "ASC",
        "PROPERTY_CODE" => array(
            $arParams['SLIDER_PROPERTY_TITLE'],
            $arParams['SLIDER_PROPERTY_TITLE_COLOR'],
            $arParams['SLIDER_PROPERTY_DESCRIPTION'],
            $arParams['SLIDER_PROPERTY_DESCRIPTION_COLOR'],
            $arParams['SLIDER_PROPERTY_LINK'],
            $arParams['SLIDER_PROPERTY_BLANK'],
            $arParams['SLIDER_PROPERTY_BUTTON_SHOW'],
            $arParams['SLIDER_PROPERTY_BUTTON_TEXT'],
            $arParams['SLIDER_PROPERTY_BUTTON_TEXT_COLOR'],
            $arParams['SLIDER_PROPERTY_BUTTON_COLOR'],
            $arParams['SLIDER_PROPERTY_TEXT_POSITION'],
            $arParams['SLIDER_PROPERTY_IMAGE'],
            $arParams['SLIDER_PROPERTY_IMAGE_POSITION'],
        ),
        "CHECK_DATES" => $arParams['SLIDER_ACTIVE_ELEMENTS'],
        "PROPERTY_TITLE" => $arParams['SLIDER_PROPERTY_TITLE'],
        "PROPERTY_TITLE_TEXT_COLOR" => $arParams['SLIDER_PROPERTY_TITLE_COLOR'],
        "PROPERTY_DESCRIPTION" => $arParams['SLIDER_PROPERTY_DESCRIPTION'],
        "PROPERTY_DESCRIPTION_TEXT_COLOR" => $arParams['SLIDER_PROPERTY_DESCRIPTION_COLOR'],
        "PROPERTY_LINK" => $arParams['SLIDER_PROPERTY_LINK'],
        "PROPERTY_LINK_TARGET" => $arParams['SLIDER_PROPERTY_BLANK'],
        "PROPERTY_BUTTON_SHOW" => $arParams['SLIDER_PROPERTY_BUTTON_SHOW'],
        "PROPERTY_BUTTON_TEXT" => $arParams['SLIDER_PROPERTY_BUTTON_TEXT'],
        "PROPERTY_BUTTON_TEXT_COLOR" => $arParams['SLIDER_PROPERTY_BUTTON_TEXT_COLOR'],
        "PROPERTY_BUTTON_COLOR" => $arParams['SLIDER_PROPERTY_BUTTON_COLOR'],
        "PROPERTY_POSITION" => $arParams['SLIDER_PROPERTY_TEXT_POSITION'],
        "PROPERTY_IMAGE" => $arParams['SLIDER_PROPERTY_IMAGE'],
        "PROPERTY_IMAGE_POSITION" => $arParams['SLIDER_PROPERTY_IMAGE_POSITION'],
        "AUTOPLAY" => $arParams['SLIDER_PROPERTY_AUTOPLAY'],
        "AUTOPLAY_DELAY" => $arParams['SLIDER_PROPERTY_AUTOPLAY_DELAY'],
        "IBLOCK_TYPE_COMPLEX_BANNER" => $arParams['IBLOCK_TYPE_CB'],
        "IBLOCK_ID_COMPLEX_BANNER" => $arParams['IBLOCK_ID_CB'],
        "COMPLEX_BANNER_ELEMENTS" => $arParams['SLIDER_CB_PROPERTY_ELEMENTS'],
        "PROPERTY_COMPLEX_BANNER_LINK_BLANK" => "LINK_BLANK",
        "PROPERTY_COMPLEX_BANNER_LINK" => $arParams['SLIDER_CB_PROPERTY_LINK'],
        "PROPERTY_COMPLEX_BANNER_TEXT_COLOR" => $arParams['SLIDER_CB_PROPERTY_TEXT_COLOR'],
        "COMPLEX_BANNER_VIEW" => $arParams['SLIDER_CB_PROPERTY_VIEW'],
        "COMPLEX_BANNER_COUNT" => $arParams['SLIDER_CB_PROPERTY_COUNT'],
        'SET_TITLE' => 'N'
    ),
    $component
);
?>