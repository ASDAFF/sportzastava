<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Loader;

$arTemplateParameters = array(
	"SHOW_INPUT" => array(
		"NAME" => GetMessage("TP_BST_SHOW_INPUT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
		"REFRESH" => "Y",
	),
	"INPUT_ID" => array(
		"NAME" => GetMessage("TP_BST_INPUT_ID"),
		"TYPE" => "STRING",
		"DEFAULT" => "title-search-input",
	),
	"CONTAINER_ID" => array(
		"NAME" => GetMessage("TP_BST_CONTAINER_ID"),
		"TYPE" => "STRING",
		"DEFAULT" => "title-search",
	),
    "PRICE_VAT_INCLUDE" => array(
        "PARENT" => "PRICES",
        "NAME" => GetMessage("TP_BST_PRICE_VAT_INCLUDE"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
    ),
    'TYPE_SEARCH_FORM' => array(
        'NAME' => GetMessage("TYPE_SEARCH_FORM"),
        'TYPE' => 'LIST',
        'VALUES' => array(
            'normal' => GetMessage('TYPE_SEARCH_FORM_NORMAL'),
            'popup' => GetMessage('TYPE_SEARCH_FORM_POPUP')
        )
    )
);

if (Loader::includeModule('catalog')) {
    include('parameters/base.php');
} elseif (Loader::includeModule('intec.startshop')) {
    include('parameters/lite.php');
}
?>
