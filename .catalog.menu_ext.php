<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
/**
 * @var array $aMenuLinks
 */

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"intec.universe:menu.sections", 
	"", 
	array(
		"IS_SEF" => "Y",
		"SEF_BASE_URL" => "/catalog/",
		"SECTION_PAGE_URL" => "#SECTION_CODE#/",
		"DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#",
		"IBLOCK_TYPE" => "catalogs",
		"IBLOCK_ID" => "38",
		"DEPTH_LEVEL" => "4",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"ID" => $_REQUEST["ID"],
		"SECTION_URL" => "//catalog/?SECTION_ID=#ID#",
		"USUAL" => "N"
	),
	false
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
