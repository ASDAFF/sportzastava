<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 */

$this->setFrameMode(true);
?>
<?php $iElementId = $APPLICATION->IncludeComponent(
    'bitrix:news.detail',
    '',
    Array(
        'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'IBLOCK_TYPE_SERVICES' => $arParams['IBLOCK_TYPE_SERVICES'],
        'IBLOCK_ID_SERVICES' => $arParams['IBLOCK_ID_SERVICES'],
        'IBLOCK_TYPE_REVIEWS' => $arParams['IBLOCK_TYPE_REVIEWS'],
        'IBLOCK_ID_REVIEWS' => $arParams['IBLOCK_ID_REVIEWS'],
        'FIELD_CODE' => $arParams['DETAIL_FIELD_CODE'],
        'PROPERTY_CODE' => $arParams['DETAIL_PROPERTY_CODE'],
        'ALLOW_LINK_SERVICES' => $arParams['ALLOW_LINK_SERVICES'],
        'ALLOW_LINK_REVIEWS' => $arParams['ALLOW_LINK_REVIEWS'],
        'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['detail'],
        'DETAIL_URL_SERVICES' => $arParams['DETAIL_URL_SERVICES'],
        'PAGE_URL_REVIEWS' => $arParams['PAGE_URL_REVIEWS'],
        'DETAIL_URL_REVIEWS' => $arParams['DETAIL_URL_REVIEWS'],
        'SECTION_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
        'IBLOCK_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['news'],
        'META_KEYWORDS' => $arParams['META_KEYWORDS'],
        'META_DESCRIPTION' => $arParams['META_DESCRIPTION'],
        'BROWSER_TITLE' => $arParams['BROWSER_TITLE'],
        'SET_CANONICAL_URL' => $arParams['DETAIL_SET_CANONICAL_URL'],
        'DISPLAY_PANEL' => $arParams['DISPLAY_PANEL'],
        'SET_LAST_MODIFIED' => $arParams['SET_LAST_MODIFIED'],
        'SET_TITLE' => $arParams['SET_TITLE'],
        'MESSAGE_404' => $arParams['MESSAGE_404'],
        'SET_STATUS_404' => $arParams['SET_STATUS_404'],
        'SHOW_404' => $arParams['SHOW_404'],
        'FILE_404' => $arParams['FILE_404'],
        'INCLUDE_IBLOCK_INTO_CHAIN' => $arParams['INCLUDE_IBLOCK_INTO_CHAIN'],
        'ADD_SECTIONS_CHAIN' => $arParams['ADD_SECTIONS_CHAIN'],
        'ACTIVE_DATE_FORMAT' => $arParams['DETAIL_ACTIVE_DATE_FORMAT'],
        'CACHE_TYPE' => $arParams['CACHE_TYPE'],
        'CACHE_TIME' => $arParams['CACHE_TIME'],
        'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
        'CACHE_FILTER' => $arParams['CACHE_FILTER'],
        'USE_PERMISSIONS' => $arParams['USE_PERMISSIONS'],
        'GROUP_PERMISSIONS' => $arParams['GROUP_PERMISSIONS'],
        'DISPLAY_TOP_PAGER' => $arParams['DETAIL_DISPLAY_TOP_PAGER'],
        'DISPLAY_BOTTOM_PAGER' => $arParams['DETAIL_DISPLAY_BOTTOM_PAGER'],
        'PAGER_TITLE' => $arParams['DETAIL_PAGER_TITLE'],
        'PAGER_SHOW_ALWAYS' => 'N',
        'PAGER_TEMPLATE' => $arParams['DETAIL_PAGER_TEMPLATE'],
        'PAGER_SHOW_ALL' => $arParams['DETAIL_PAGER_SHOW_ALL'],
        'CHECK_DATES' => $arParams['CHECK_DATES'],
        'ELEMENT_ID' => $arResult['VARIABLES']['ELEMENT_ID'],
        'ELEMENT_CODE' => $arResult['VARIABLES']['ELEMENT_CODE'],
        'USE_SHARE' => $arParams['USE_SHARE'],
        'SHARE_HIDE' => $arParams['SHARE_HIDE'],
        'SHARE_TEMPLATE' => $arParams['SHARE_TEMPLATE'],
        'SHARE_HANDLERS' => $arParams['SHARE_HANDLERS'],
        'SHARE_SHORTEN_URL_LOGIN' => $arParams['SHARE_SHORTEN_URL_LOGIN'],
        'SHARE_SHORTEN_URL_KEY' => $arParams['SHARE_SHORTEN_URL_KEY'],
        'ADD_ELEMENT_CHAIN' => (isset($arParams['ADD_ELEMENT_CHAIN']) ? $arParams['ADD_ELEMENT_CHAIN'] : ''),
        'DESCRIPTION_PROPERTIES' => $arParams['DESCRIPTION_DETAIL_PROPERTIES'],
        'PROPERTY_GALLERY' => $arParams['PROPERTY_GALLERY'],
        'PROPERTY_OBJECTIVE' => $arParams['PROPERTY_OBJECTIVE'],
        'PROPERTY_SERVICES' => $arParams['PROPERTY_SERVICES'],
        'PROPERTY_IMAGES' => $arParams['PROPERTY_IMAGES'],
        'PROPERTY_REVIEW' => $arParams['PROPERTY_REVIEW'],
        'PROPERTY_SOLUTION_BEGIN' => $arParams['PROPERTY_SOLUTION_BEGIN'],
        'PROPERTY_SOLUTION_IMAGE' => $arParams['PROPERTY_SOLUTION_IMAGE'],
        'PROPERTY_SOLUTION_END' => $arParams['PROPERTY_SOLUTION_END'],
        'DISPLAY_FORM_ORDER' => $arParams['DISPLAY_FORM_ORDER'],
        'FORM_ORDER' => $arParams['FORM_ORDER'],
        'PROPERTY_FORM_ORDER_PROJECT' => $arParams['PROPERTY_FORM_ORDER_PROJECT'],
        'DISPLAY_FORM_ASK' => $arParams['DISPLAY_FORM_ASK'],
        'FORM_ASK' => $arParams['FORM_ASK'],
        'CONSENT_URL' => $arParams['CONSENT_URL']
    ),
    $component
);?>