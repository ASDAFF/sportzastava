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
 * @var array $services
 */

$GLOBALS['arrFilterServices'] = array(
	'ID' => $services
);

?>
<div class="share-header-block"><?= GetMessage('SERVICES') ?></div>
<?php $APPLICATION->IncludeComponent(
	"intec.universe:widget", 
	"services", 
	array(
		"COMPONENT_TEMPLATE" => "services",
		"IBLOCK_TYPE" => $arParams['PROPERTY_IBLOCK_TYPE_SERVICES'],
		"IBLOCK_ID" => $arParams['PROPERTY_IBLOCK_ID_SERVICES'],
		"ITEMS_LIMIT" => "20",
		"PROPERTY_DISPLAY" => "",
		"FILTER_NAME" => "arrFilterServices",
		"DISPLAY_TITLE" => "N",
		"DISPLAY_DESCRIPTION" => "N",
		"DISPLAY_BUTTON_ALL" => "N",
		"VIEW_DESKTOP" => "blocks.all",
		"VIEW_MOBILE" => "blocks.all",
		"PAGE_URL" => "",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0"
	),
    $component
); ?>
