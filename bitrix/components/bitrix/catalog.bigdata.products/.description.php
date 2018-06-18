<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("CVP_SECTION_TEMPLATE_NAME"),
	"DESCRIPTION" => GetMessage("CVP_SECTION_TEMPLATE_DESCRIPTION"),
	"ICON" => "/images/catalog.gif",
	"COMPLEX" => "Y",
	"SORT" => 10,
	"PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "catalog-services",
			"NAME" => GetMessage("CVP_SECTION_TEMPLATE_NAME"),
			"SORT" => 30,
		)
	)
);
?>