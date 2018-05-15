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

$bMenuDisplay = $arParams['MENU_DISPLAY_IN_ROOT'] == 'Y';

if (!empty($oProperties)) {
    if ($arParams['SECTIONS_LIST_VIEW'] == 'settings') {
        switch ($oProperties->get('template_services_root')) {
            case 1:
                $arParams['SECTIONS_LIST_VIEW'] = 'tile';
                break;
            case 2:
                $arParams['SECTIONS_LIST_VIEW'] = 'blocks';
                $arParams['SECTIONS_LIST_VIEW_IMAGES'] = 'CIRCLE';
                $arParams['SECTIONS_LIST_VIEW_DISPLAY_DESCRIPTION'] = 'N';
                break;
            case 3:
                $arParams['SECTIONS_LIST_VIEW'] = 'blocks';
                $arParams['SECTIONS_LIST_VIEW_IMAGES'] = 'CIRCLE';
                $arParams['SECTIONS_LIST_VIEW_DISPLAY_DESCRIPTION'] = 'Y';
                break;
            case 4:
                $arParams['SECTIONS_LIST_VIEW'] = 'blocks';
                $arParams['SECTIONS_LIST_VIEW_IMAGES'] = 'SQUARE_BIG';
                $arParams['SECTIONS_LIST_VIEW_DISPLAY_DESCRIPTION'] = 'N';
                break;
            case 5:
                $arParams['SECTIONS_LIST_VIEW'] = 'blocks';
                $arParams['SECTIONS_LIST_VIEW_IMAGES'] = 'SQUARE_BIG';
                $arParams['SECTIONS_LIST_VIEW_DISPLAY_DESCRIPTION'] = 'Y';
                break;
            case 6:
                $arParams['SECTIONS_LIST_VIEW'] = 'blocks';
                $arParams['SECTIONS_LIST_VIEW_IMAGES'] = 'SQUARE_SMALL';
                $arParams['SECTIONS_LIST_VIEW_DISPLAY_DESCRIPTION'] = 'Y';
                break;
            case 7:
                $arParams['SECTIONS_LIST_VIEW'] = 'blocks';
                $arParams['SECTIONS_LIST_VIEW_IMAGES'] = 'SQUARE_SMALL';
                $arParams['SECTIONS_LIST_VIEW_DISPLAY_DESCRIPTION'] = 'N';
                break;
            case 8:
                $arParams['SECTIONS_LIST_VIEW'] = 'extend';
                $arParams['SECTIONS_LIST_VIEW_IMAGES'] = 'SQUARE';
                break;
            case 9:
                $arParams['SECTIONS_LIST_VIEW'] = 'extend';
                $arParams['SECTIONS_LIST_VIEW_IMAGES'] = 'CIRCLE';
                break;
            case 10:
                $arParams['SECTIONS_LIST_VIEW'] = 'list';
                break;
        }
    }

    if ($arParams['MENU_DISPLAY_IN_ROOT'] == 'settings') {
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
            $sSection .= '.root';
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
        <?$res = CIBlock::GetByID($arParams["IBLOCK_ID"]);
        $ar_res = $res->GetNext();
        if($ar_res["DESCRIPTION"]) { ?>
           <div class="description">
               <?=$ar_res["DESCRIPTION"]?>
               <br>
               <br>
           </div>
        <?}?>
        <? $APPLICATION->IncludeComponent(
            'bitrix:catalog.section.list',
            $arParams['SECTIONS_LIST_VIEW'],
            array(
                'DISPLAY_DESCRIPTION' => $arParams['SECTIONS_LIST_VIEW_DISPLAY_DESCRIPTION'],
                'IMAGES' => $arParams['SECTIONS_LIST_VIEW_IMAGES'],
                'LINE_COUNT' => $arParams['SECTIONS_LIST_VIEW_LINE_COUNT'],

                'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                'CACHE_TIME' => $arParams['CACHE_TIME'],
                'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                'COUNT_ELEMENTS' => $arParams['SECTION_COUNT_ELEMENTS'],
                'TOP_DEPTH' => $arParams['SECTION_TOP_DEPTH'],
                'SECTION_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
                "ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : ''),
                "HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
            ),
            $component
        ); ?>
        <?php if ($bMenuDisplay) { ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>