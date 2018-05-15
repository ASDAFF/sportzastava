<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 */

if (!CModule::IncludeModule('intec.core'))
    return;

$this->setFrameMode(true);
if($arParams["ID_CATEGORIES"]) {
    global $arFilter_widget_categories;
    $arFilter_widget_categories = array(
        "ID" => $arParams["ID_CATEGORIES"]
    );
}

$sTitle = ArrayHelper::getValue($arParams, 'TITLE');
$bShowTitle = ArrayHelper::getValue($arParams, 'DISPLAY_TITLE') == 'Y' && !empty($sTitle);
$bTitleCenter = ArrayHelper::getValue($arParams, 'ALIGHT_HEADER') == 'Y';

$sDescription = ArrayHelper::getValue($arParams, 'DESCRIPTION');
$bShowDescription = ArrayHelper::getValue($arParams, 'DISPLAY_DESCRIPTION') == 'Y' && !empty($sDescription);
$bDescriptionCenter = ArrayHelper::getValue($arParams, 'ALIGHT_DESCRIPTION');

?>
<div class="intec-content">
    <div class="intec-content-wrapper widget-categories">
        <?php if($bShowTitle) { ?>
            <div class="title <?= $bTitleCenter ? 'text-center' : null ?>">
                <?= $sTitle ?>
            </div>
        <?php } ?>
        <?php if ($bShowDescription) { ?>
            <div class="description <?= $bDescriptionCenter ? 'text-center' : null ?>">
                <?= $sDescription ?>
            </div>
        <?php } ?>
        <?php $APPLICATION->IncludeComponent(
            'intec.universe:catalog.customsection.list',
            $arParams['VIEW'],
            array(
                'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                'CACHE_TIME' => $arParams['CACHE_TIME'],
                'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                'COUNT_ELEMENTS' => $arParams['SECTION_COUNT_ELEMENTS'],
                'TOP_DEPTH' => '6',
                'SECTION_URL' => "",
                'SHOW_PARENT_NAME' => "",
                'HIDE_SECTION_NAME' => "",
                'ADD_SECTIONS_CHAIN' => "",
                'GRID_CATALOG_SECTIONS_COUNT' => $arParams['GRID_CATALOG_ROOT_SECTIONS_COUNT'],
                'USE_SUBSECTIONS' => $arParams["USE_SUBSECTIONS_SECTIONS"],
                'COUNT_SUBSECTIONS' => "6",
                "FILTER_NAME" => "arFilter_widget_categories",
                "COUNT_SUBSECTIONS_SECTIONS"=>$arParams["COUNT_SUBSECTIONS_SECTIONS"]
            ),
            $component
        ); ?>
    </div>
</div>