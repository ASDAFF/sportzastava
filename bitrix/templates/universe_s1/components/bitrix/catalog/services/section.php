<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\Core;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\RegExp;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;
use intec\constructor\models\Build;

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

$oBuild = Build::getCurrent();
$oProperties = null;

if (!empty($oBuild)) {
    $oPage = $oBuild->getPage();
    $oProperties = $oPage->getProperties();
}

$bMenuDisplay = $arParams['MENU_DISPLAY_IN_SECTION'] == 'Y';

if (!empty($oProperties)) {
    if ($arParams['ELEMENTS_LIST_VIEW'] == 'settings') {
        switch ($oProperties->get('template_services_section')) {
            case 1:
                $arParams['ELEMENTS_LIST_VIEW'] = 'tile';
                break;
            case 2:
                $arParams['ELEMENTS_LIST_VIEW'] = 'blocks';
                $arParams['ELEMENTS_LIST_VIEW_IMAGES'] = 'CIRCLE';
                $arParams['ELEMENTS_LIST_VIEW_DISPLAY_DESCRIPTION'] = 'N';
                break;
            case 3:
                $arParams['ELEMENTS_LIST_VIEW'] = 'blocks';
                $arParams['ELEMENTS_LIST_VIEW_IMAGES'] = 'CIRCLE';
                $arParams['ELEMENTS_LIST_VIEW_DISPLAY_DESCRIPTION'] = 'Y';
                break;
            case 4:
                $arParams['ELEMENTS_LIST_VIEW'] = 'blocks';
                $arParams['ELEMENTS_LIST_VIEW_IMAGES'] = 'SQUARE_BIG';
                $arParams['ELEMENTS_LIST_VIEW_DISPLAY_DESCRIPTION'] = 'N';
                break;
            case 5:
                $arParams['ELEMENTS_LIST_VIEW'] = 'blocks';
                $arParams['ELEMENTS_LIST_VIEW_IMAGES'] = 'SQUARE_BIG';
                $arParams['ELEMENTS_LIST_VIEW_DISPLAY_DESCRIPTION'] = 'Y';
                break;
            case 6:
                $arParams['ELEMENTS_LIST_VIEW'] = 'blocks';
                $arParams['ELEMENTS_LIST_VIEW_IMAGES'] = 'SQUARE_SMALL';
                $arParams['ELEMENTS_LIST_VIEW_DISPLAY_DESCRIPTION'] = 'Y';
                break;
            case 7:
                $arParams['ELEMENTS_LIST_VIEW'] = 'blocks';
                $arParams['ELEMENTS_LIST_VIEW_IMAGES'] = 'SQUARE_SMALL';
                $arParams['ELEMENTS_LIST_VIEW_DISPLAY_DESCRIPTION'] = 'N';
                break;
            case 8:
                $arParams['ELEMENTS_LIST_VIEW'] = 'extend';
                $arParams['ELEMENTS_LIST_VIEW_IMAGES'] = 'SQUARE';
                break;
            case 9:
                $arParams['ELEMENTS_LIST_VIEW'] = 'extend';
                $arParams['ELEMENTS_LIST_VIEW_IMAGES'] = 'CIRCLE';
                break;
            case 10:
                $arParams['ELEMENTS_LIST_VIEW'] = 'list';
                break;
        }
    }

    if ($arParams['MENU_DISPLAY_IN_SECTION'] == 'settings') {
        $arMenuDisplayIn = $oProperties->get('menu_display_in');
        $sPath = '/' . Core::$app->request->getPathInfo();
        $sPath = RegExp::replaceBy('/^' . RegExp::escape(SITE_DIR) . '/', null, $sPath);
        $sPath = StringHelper::replace($sPath, [
            '/' => '.'
        ]);

        $sSection = null;

        if (Type::isArray($arMenuDisplayIn))
            foreach ($arMenuDisplayIn as $sKey => $arValue)
                if (RegExp::isMatchBy('/^'.RegExp::escape($sKey).'/', $sPath))
                    $sSection = $sKey;

        if (!empty($sSection)) {
            $sSection .= '.section';
            $bMenuDisplay = ArrayHelper::getValue($arMenuDisplayIn, [$sSection, 'display']) == 1;
        }

        unset($sSection);
    }
}

foreach (['SECTIONS', 'ELEMENTS'] as $sItem) {
    $sView = ArrayHelper::getValue($arParams, [$sItem.'_LIST_VIEW']);
    $sView = ArrayHelper::fromRange($arResult['VIEWS_LIST'], $sView);
    $arParams[$sItem.'_LIST_VIEW'] = $sView;
}
?>
<div class="intec-content clearfix">
    <div class="intec-content-wrapper">

        <h1 style="padding-bottom: 20px;margin-top: 0;">
            <?global $APPLICATION;?>
            <?$APPLICATION->ShowTitle("header")?>
        </h1>
        <?php if ($bMenuDisplay) { ?>
            <div class="intec-content-left">
                <?php $APPLICATION->IncludeComponent(
                    'bitrix:menu',
                    'vertical',
                    array(
                        'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                        'PROPERTY_IMAGE' => $arParams['PROPERTY_IMAGE'],
                        'PROPERTY_SHOW_HEADER_SUBMENU' => $arParams['SHOW_HEADER_SUBMENU'],
                        'ROOT_MENU_TYPE' => $arParams['MENU_ROOT_TYPE'],
                        'MENU_CACHE_TYPE' => 'N',
                        'MAX_LEVEL' => $arParams['MENU_MAX_LEVEL'],
                        'CHILD_MENU_TYPE' => $arParams['MENU_CHILD_TYPE'],
                        'USE_EXT' => 'Y',
                        'DELAY' => 'N',
                        'ALLOW_MULTI_SELECT' => 'N',
                        'HIDE_CATALOG' => 'Y'
                    ),
                    $component
                ) ?>
            </div>
            <div class="intec-content-right">
                <div class="intec-content-right-wrapper">
        <?php } ?>
                <?$intSectionID = $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section",
                    $arParams['ELEMENTS_LIST_VIEW'],
                    array(
                        'DISPLAY_DESCRIPTION' => $arParams['ELEMENTS_LIST_VIEW_DISPLAY_DESCRIPTION'],
                        'IMAGES' => $arParams['ELEMENTS_LIST_VIEW_IMAGES'],
                        'LINE_COUNT' => $arParams['ELEMENTS_LIST_VIEW_LINE_COUNT'],

                        'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                        'ELEMENT_SORT_FIELD' => $arParams['ELEMENT_SORT_FIELD'],
                        'ELEMENT_SORT_ORDER' => $arParams['ELEMENT_SORT_ORDER'],
                        'ELEMENT_SORT_FIELD2' => $arParams['ELEMENT_SORT_FIELD2'],
                        'ELEMENT_SORT_ORDER2' => $arParams['ELEMENT_SORT_ORDER2'],
                        'PROPERTY_CODE' => $arParams['LIST_PROPERTY_CODE'],
                        'META_KEYWORDS' => $arParams['LIST_META_KEYWORDS'],
                        'META_DESCRIPTION' => $arParams['LIST_META_DESCRIPTION'],
                        'BROWSER_TITLE' => $arParams['LIST_BROWSER_TITLE'],
                        'SET_LAST_MODIFIED' => $arParams['SET_LAST_MODIFIED'],
                        'INCLUDE_SUBSECTIONS' => $arParams['INCLUDE_SUBSECTIONS'],
                        'BASKET_URL' => $arParams['BASKET_URL'],
                        'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
                        'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
                        'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],
                        'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
                        'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
                        'FILTER_NAME' => $arParams['FILTER_NAME'],
                        'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                        'CACHE_TIME' => $arParams['CACHE_TIME'],
                        'CACHE_FILTER' => $arParams['CACHE_FILTER'],
                        'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                        'SET_TITLE' => $arParams['SET_TITLE'],
                        'MESSAGE_404' => $arParams['MESSAGE_404'],
                        'SET_STATUS_404' => $arParams['SET_STATUS_404'],
                        'SHOW_404' => $arParams['SHOW_404'],
                        'FILE_404' => $arParams['FILE_404'],
                        'DISPLAY_COMPARE' => 'N',
                        'PAGE_ELEMENT_COUNT' => $arParams['PAGE_ELEMENT_COUNT'],
                        'LINE_ELEMENT_COUNT' => $arParams['LINE_ELEMENT_COUNT'],
                        'PRICE_CODE' => $arParams['PRICE_CODE'],
                        'USE_PRICE_COUNT' => 'N',
                        'SHOW_PRICE_COUNT' => 'N',

                        "PRICE_VAT_INCLUDE" => 'N',
                        "USE_PRODUCT_QUANTITY" => 'N',
                        "ADD_PROPERTIES_TO_BASKET" => null,
                        "PARTIAL_PRODUCT_PROPERTIES" => null,
                        "PRODUCT_PROPERTIES" => null,

                        'DISPLAY_TOP_PAGER' => $arParams['DISPLAY_TOP_PAGER'],
                        'DISPLAY_BOTTOM_PAGER' => $arParams['DISPLAY_BOTTOM_PAGER'],
                        'PAGER_TITLE' => $arParams['PAGER_TITLE'],
                        'PAGER_SHOW_ALWAYS' => $arParams['PAGER_SHOW_ALWAYS'],
                        'PAGER_TEMPLATE' => $arParams['PAGER_TEMPLATE'],
                        'PAGER_DESC_NUMBERING' => $arParams['PAGER_DESC_NUMBERING'],
                        'PAGER_DESC_NUMBERING_CACHE_TIME' => $arParams['PAGER_DESC_NUMBERING_CACHE_TIME'],
                        'PAGER_SHOW_ALL' => $arParams['PAGER_SHOW_ALL'],
                        'PAGER_BASE_LINK_ENABLE' => $arParams['PAGER_BASE_LINK_ENABLE'],
                        'PAGER_BASE_LINK' => $arParams['PAGER_BASE_LINK'],
                        'PAGER_PARAMS_NAME' => $arParams['PAGER_PARAMS_NAME'],

                        "OFFERS_CART_PROPERTIES" => null,
                        "OFFERS_FIELD_CODE" => null,
                        "OFFERS_PROPERTY_CODE" => null,
                        "OFFERS_SORT_FIELD" => null,
                        "OFFERS_SORT_ORDER" => null,
                        "OFFERS_SORT_FIELD2" => null,
                        "OFFERS_SORT_ORDER2" => null,
                        "OFFERS_LIMIT" => null,

                        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                        "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],

                        'USE_MAIN_ELEMENT_SECTION' => 'N',
                        'CONVERT_CURRENCY' => 'N',
                        'CURRENCY_ID' => null,
                        'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
                        'ADD_SECTIONS_CHAIN' => $arParams["ADD_SECTIONS_CHAIN"],
                        'ADD_TO_BASKET_ACTION' => null,
                        'COMPARE_PATH' => null,
                        "LAZY_LOAD" => $arParams["LAZY_LOAD"],
                        "MESS_BTN_LAZY_LOAD" => $arParams["MESS_BTN_LAZY_LOAD"]
                    ),
                    $component
                );?>
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section.list",
                    $arParams['SECTIONS_LIST_VIEW'],
                    array(
                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                        "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
                        "TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
                        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                        "VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
                        "SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
                        "HIDE_SECTION_NAME" => 'Y',
                        "ADD_SECTIONS_CHAIN" => 'N'
                    ),
                    $component
                ); ?>
        <?php if ($bMenuDisplay) { ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>