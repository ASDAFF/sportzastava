<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arTemplateParameters
 * @var array $arCurrentValues
 */

if (!Loader::includeModule('search'))
    return;

include ('add_filter_params_search.php');

$arTemplateParameters["SEARCH_PAGE"] = array(
        "PARENT" => "URL_TEMPLATES",
        "NAME" => GetMessage("CP_BST_FORM_PAGE"),
        "TYPE" => "STRING",
        "DEFAULT" => "#SITE_DIR#search/index.php",
);
$arTemplateParameters['SEARCH_PAGE_CATALOG'] = array(
    'PARENT' => 'URL_TEMPLATES',
    'TYPE' => 'STRING',
    'DEFAULT' => "#SITE_DIR#catalog/index.php",
    'NAME' => GetMessage('W_HEADER_PARAMETERS_SEARCH_PAGE_CATALOG'),
);
$arTemplateParameters["SEARCH_TOP_COUNT"] = array(
    "PARENT" => "BASE",
    "NAME" => GetMessage("CP_BST_TOP_COUNT"),
    "TYPE" => "STRING",
    "DEFAULT" => "5",
    "REFRESH" => "Y",
);
$arTemplateParameters["SEARCH_ORDER"] = array(
    "PARENT" => "BASE",
    "NAME" => GetMessage("CP_BST_ORDER"),
    "TYPE" => "LIST",
    "DEFAULT" => "date",
    "VALUES" => array(
        "date" => GetMessage("CP_BST_ORDER_BY_DATE"),
        "rank" => GetMessage("CP_BST_ORDER_BY_RANK"),
    ),
);
$arTemplateParameters["SEARCH_USE_LANGUAGE_GUESS"] = Array(
    "PARENT" => "BASE",
    "NAME" => GetMessage("CP_BST_USE_LANGUAGE_GUESS"),
    "TYPE" => "CHECKBOX",
    "DEFAULT" => "Y",
);
$arTemplateParameters["SEARCH_CHECK_DATES"] = array(
    "PARENT" => "BASE",
    "NAME" => GetMessage("CP_BST_CHECK_DATES"),
    "TYPE" => "CHECKBOX",
    "DEFAULT" => "N",
);
$arTemplateParameters["SEARCH_SHOW_OTHERS"] = array(
    "PARENT" => "BASE",
    "NAME" => GetMessage("CP_BST_SHOW_OTHERS"),
    "TYPE" => "CHECKBOX",
    "DEFAULT" => "N",
    "REFRESH" => "Y",
);

if ($arCurrentValues["SEARCH_SHOW_OTHERS"] === "Y") {
    $arTemplateParameters["SEARCH_CATEGORY_OTHERS_TITLE"] = array(
        "PARENT" => "OTHERS_CATEGORY",
        "NAME" => GetMessage("CP_BST_CATEGORY_TITLE"),
        "TYPE" => "STRING",
    );
}

$NUM_CATEGORIES = 1;
for ($i = 0; $i < $NUM_CATEGORIES; $i++) {
    $arTemplateParameters["SEARCH_CATEGORY_".$i."_TITLE"] = array(
        "PARENT" => "CATEGORY_".$i,
        "NAME" => GetMessage("CP_BST_CATEGORY_TITLE"),
        "TYPE" => "STRING",
    );

    AddFilterParamsSearch($arTemplateParameters, $arCurrentValues, "SEARCH_CATEGORY_".$i, "SEARCH_CATEGORY_".$i);
}

/*template params*/
$arPrice = array();
if (Loader::includeModule("catalog")) {
    $rsPrice=CCatalogGroup::GetList($v1="sort", $v2="asc");
    while($arr=$rsPrice->Fetch())
        $arPrice[$arr["NAME"]] = "[".$arr["NAME"]."] ".$arr["NAME_LANG"];
}


$arTemplateParameters["SEARCH_SHOW_INPUT"] = array(
    "NAME" => GetMessage("TP_BST_SHOW_INPUT"),
    "TYPE" => "CHECKBOX",
    "DEFAULT" => "Y",
    "REFRESH" => "Y",
);
$arTemplateParameters["SEARCH_INPUT_ID"] = array(
    "NAME" => GetMessage("TP_BST_INPUT_ID"),
    "TYPE" => "STRING",
    "DEFAULT" => "title-search-input",
);
$arTemplateParameters["SEARCH_CONTAINER_ID"] = array(
    "NAME" => GetMessage("TP_BST_CONTAINER_ID"),
    "TYPE" => "STRING",
    "DEFAULT" => "title-search",
);
$arTemplateParameters["SEARCH_PRICE_CODE"] = array(
    "PARENT" => "PRICES",
    "NAME" => GetMessage("TP_BST_PRICE_CODE"),
    "TYPE" => "LIST",
    "MULTIPLE" => "Y",
    "VALUES" => $arPrice,
);
$arTemplateParameters["SEARCH_PRICE_VAT_INCLUDE"] = array(
    "PARENT" => "PRICES",
    "NAME" => GetMessage("TP_BST_PRICE_VAT_INCLUDE"),
    "TYPE" => "CHECKBOX",
    "DEFAULT" => "Y",
);

if (Loader::includeModule('catalog') && Loader::includeModule('currency'))
{
    $arTemplateParameters['SEARCH_CONVERT_CURRENCY'] = array(
        'PARENT' => 'PRICES',
        'NAME' => GetMessage('TP_BST_CONVERT_CURRENCY'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'N',
        'REFRESH' => 'Y',
    );

    if (isset($arCurrentValues['SEARCH_CONVERT_CURRENCY']) && 'Y' == $arCurrentValues['SEARCH_CONVERT_CURRENCY'])
    {
        $arCurrencyList = array();
        $rsCurrencies = CCurrency::GetList(($by = 'SORT'), ($order = 'ASC'));
        while ($arCurrency = $rsCurrencies->Fetch())
        {
            $arCurrencyList[$arCurrency['CURRENCY']] = $arCurrency['CURRENCY'];
        }
        $arTemplateParameters['SEARCH_CURRENCY_ID'] = array(
            'PARENT' => 'PRICES',
            'NAME' => GetMessage('TP_BST_CURRENCY_ID'),
            'TYPE' => 'LIST',
            'VALUES' => $arCurrencyList,
            'DEFAULT' => CCurrency::GetBaseCurrency(),
            "ADDITIONAL_VALUES" => "Y",
        );
    }
}

