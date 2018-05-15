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
<div class="intec-content">
    <div class="intec-content-wrapper">
        <?php $iElementId = $APPLICATION->IncludeComponent(
            'bitrix:news.detail',
            '',
            Array(
                'DISPLAY_DATE' => $arParams['DISPLAY_DETAIL_DATE'],
                'DISPLAY_NAME' => $arParams['DISPLAY_NAME'],
                'DISPLAY_PICTURE' => $arParams['DISPLAY_DETAIL_PICTURE'],
                'DISPLAY_PREVIEW_TEXT' => $arParams['DISPLAY_DETAIL_PREVIEW_TEXT'],
                'DISPLAY_READ_ALSO' => $arParams['DISPLAY_DETAIL_READ_ALSO'],
                'PROPERTY_READ_ALSO' => $arParams['PROPERTY_DETAIL_READ_ALSO'],
                'VIEW_READ_ALSO' => $arParams['VIEW_DETAIL_READ_ALSO'],
                'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                'FIELD_CODE' => $arParams['DETAIL_FIELD_CODE'],
                'PROPERTY_CODE' => $arParams['DETAIL_PROPERTY_CODE'],
                'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['detail'],
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
                'BACK_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['news']
            ),
            $component
        );?>
    </div>
</div>