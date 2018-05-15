<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
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
$sTemplateId = spl_object_hash($this);
$iIBlockId = ArrayHelper::getValue($arParams, 'IBLOCK_ID');
$iIBlockId = Type::toInteger($iIBlockId);
$sDescription = null;

if ($arParams['ROOT_DESCRIPTION_SHOW'] == 'Y')
    $sDescription = CIBlock::GetArrayByID($iIBlockId, 'DESCRIPTION');

$sView = ArrayHelper::getValue($arParams, 'ROOT_VIEW');
$oBuild = Build::getCurrent();
$oProperties = null;
$bMenuDisplay = $arParams['MENU_DISPLAY_IN_ROOT'] == 'Y';

if (!empty($oBuild)) {
    $oPage = $oBuild->getPage();
    $oProperties = $oPage->getProperties();
}

if (!empty($oProperties)) {

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

    if ($arParams['MENU_VIEW'] == 'settings') {
        switch ($oProperties->get('show_sections_icons_in_menu')) {
            case 1:
                $arParams['MENU_VIEW'] = 'picture';
                break;
            default:
                $arParams['MENU_VIEW'] = 'default';
                break;
        }
    }

    if ($sView == 'settings') {
        switch ($oProperties->get('template_catalog_root')) {
            case 'list':
                $sView = 'text';
                $arParams['ROOT_CHILDREN_USE'] = 'Y';
                $arParams['ROOT_VIEW_DESCRIPTION_SHOW'] = 'Y';
                break;
            case 'list_2':
                $sView = 'list';
                $arParams['ROOT_CHILDREN_USE'] = 'Y';
                $arParams['ROOT_VIEW_DESCRIPTION_SHOW'] = 'Y';
                if ($bMenuDisplay) {
                    $arParams['ROOT_ROW_COUNT'] = 2;
                } else $arParams['ROOT_ROW_COUNT'] = 3;
                break;
            case 'tile':
                $sView = 'tile';
                $arParams['ROOT_CHILDREN_USE'] = 'Y';
                if (ArrayHelper::isIn($sView, array('list', 'text'))) {
                    $arParams['ROOT_ROW_COUNT'] = 2;
                }
                break;
            case 'tile_2':
                $sView = 'tile2';
                $arParams['ROOT_CHILDREN_USE'] = 'N';
                break;
        }
    }

}

$sView = ArrayHelper::fromRange(array('tile', 'tile2', 'text', 'list'), $sView);
if (ArrayHelper::isIn($sView, array('text'))) {
    $arParams['ROOT_ROW_COUNT'] = 2;
}

?>
<div class="catalog" id="<?= $sTemplateId ?>">
    <div class="intec-content intec-content-visible">
        <div class="intec-content-wrapper">
            <? if ($bMenuDisplay) { ?>
                <div class="intec-content-left">
                    <? $APPLICATION->IncludeComponent(
                        'bitrix:menu',
                        'vertical',
                        array(
                            'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                            'PROPERTY_IMAGE' => $arParams['PROPERTY_IMAGE'],
                            'PROPERTY_SHOW_HEADER_SUBMENU' => $arParams['SHOW_HEADER_SUBMENU'],
                            'ROOT_MENU_TYPE' => $arParams['MENU_TYPE_ROOT'],
                            'MENU_CACHE_TYPE' => 'N',
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MAX_LEVEL" => $arParams['MENU_MAX_LEVEL'],
                            "CHILD_MENU_TYPE" => $arParams['MENU_TYPE_CHILD'],
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N",
                            "HIDE_CATALOG" => "Y",
                            "COUNT_ITEMS_CATALOG" => "8",
                            'TYPE_SUBMENU' => $arParams['MENU_VIEW']
                        ),
                        $component
                    ); ?>
                </div>
                <div class="intec-content-right">
                    <div class="intec-content-right-wrapper">
            <? } ?>
            <?php $APPLICATION->IncludeComponent(
                'bitrix:catalog.section.list',
                $sView,
                array(
                    'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                    'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                    'CACHE_TIME' => $arParams['CACHE_TIME'],
                    'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                    'COUNT_ELEMENTS' => $arParams['SECTION_COUNT_ELEMENTS'],
                    'TOP_DEPTH' => $arParams['SECTION_TOP_DEPTH'],
                    'SECTION_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
                    'VIEW_MODE' => $arParams['ROOT_VIEW'],
                    'SHOW_PARENT_NAME' => $arParams['SECTIONS_SHOW_PARENT_NAME'],
                    'HIDE_SECTION_NAME' => (isset($arParams['SECTIONS_HIDE_SECTION_NAME']) ? $arParams['SECTIONS_HIDE_SECTION_NAME'] : 'N'),
                    'ADD_SECTIONS_CHAIN' => (isset($arParams['ADD_SECTIONS_CHAIN']) ? $arParams['ADD_SECTIONS_CHAIN'] : ''),
                    'GRID_CATALOG_SECTIONS_COUNT' => $arParams['ROOT_ROW_COUNT'],
                    'USE_SUBSECTIONS' => $arParams['ROOT_CHILDREN_USE'],
                    'COUNT_SUBSECTIONS' => $arParams['ROOT_CHILDREN_COUNT'],
                    'SECTIONS_DISPLAY_DESCRIPTION' => $arParams['ROOT_VIEW_DESCRIPTION_SHOW']
                ),
                $component
            ); ?>
            <?php if (!empty($sDescription)) { ?>
                <div class="catalog-description">
                    <?= $sDescription ?>
                </div>
            <?php } ?>
            <? if ($bMenuDisplay) { ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            <? } ?>
        </div>
    </div>
</div>
