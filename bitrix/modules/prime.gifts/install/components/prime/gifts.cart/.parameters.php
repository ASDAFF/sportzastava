<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS"  =>  array(

		"PRIME_YOUR_GIFT_TEXT" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("PRIME_YOUR_GIFT_TEXT"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("PRIME_YOUR_GIFT_TEXT"),
		),

		"PRIME_YOUR_GIFT_TEXT_MORE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("PRIME_YOUR_GIFT_TEXT_MORE"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("PRIME_YOUR_GIFT_TEXT_MORE"),
		),

		"PRIME_YOUR_GIFT_TEXT_MORE_FROM" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("PRIME_YOUR_GIFT_TEXT_MORE_FROM"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("PRIME_YOUR_GIFT_TEXT_MORE_FROM"),
		)

	),
);
?>
