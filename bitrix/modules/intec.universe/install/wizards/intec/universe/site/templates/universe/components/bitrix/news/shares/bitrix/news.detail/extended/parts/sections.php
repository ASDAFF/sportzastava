<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

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
 * @var string $sectionsHeader
 * @var array $sections
 */

?>
<div class="share-header-block">
    <?php if ($sectionsHeader) {
        echo $sectionsHeader;
    } else {
	    echo GetMessage('SECTIONS');
	} ?>
</div>

<?php $APPLICATION->IncludeComponent(
	"intec.universe:widget", 
	"categories", 
	array(
		"IBLOCK_TYPE" => $arParams['PROPERTY_IBLOCK_TYPE_SECTION'],
		"IBLOCK_ID" => $arParams['PROPERTY_IBLOCK_ID_SECTION'],
		"COMPONENT_TEMPLATE" => "categories",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "1",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"VIEW_MODE" => "TILE",
		"SHOW_PARENT_NAME" => "Y",
		"HIDE_SECTION_NAME" => "N",
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"DISPLAY_TITLE" => "N",
		"DISPLAY_DESCRIPTION" => "N",
		"SECTION_COUNT_ELEMENTS" => "N",
		"VIEW" => "tile2",
		"GRID_CATALOG_ROOT_SECTIONS_COUNT" => "4",
		"USE_SUBSECTIONS_SECTIONS" => "N",
		"SECTIONS_DISPLAY_DESCRIPTION" => "N",
		"COUNT_SUBSECTIONS_SECTIONS" => "",
		"ID_CATEGORIES" => $sections
	),
	$component
); ?>
