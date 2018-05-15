<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Loader;

$arPrice = array();
if(Loader::includeModule("catalog"))
{
    $rsPrice=CCatalogGroup::GetList($v1="sort", $v2="asc");
    while($arr=$rsPrice->Fetch())
        $arPrice[$arr["NAME"]] = "[".$arr["NAME"]."] ".$arr["NAME_LANG"];

    $arTemplateParameters["PRICE_CODE"] = array(
        "PARENT" => "PRICES",
        "NAME" => GetMessage("TP_BST_PRICE_CODE"),
        "TYPE" => "LIST",
        "MULTIPLE" => "Y",
        "VALUES" => $arPrice,
    );
}

if (Loader::includeModule('currency'))
{
    $arTemplateParameters['CONVERT_CURRENCY'] = array(
        'PARENT' => 'PRICES',
        'NAME' => GetMessage('TP_BST_CONVERT_CURRENCY'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'N',
        'REFRESH' => 'Y',
    );

    if (isset($arCurrentValues['CONVERT_CURRENCY']) && 'Y' == $arCurrentValues['CONVERT_CURRENCY'])
    {
        $arCurrencyList = array();
        $rsCurrencies = CCurrency::GetList(($by = 'SORT'), ($order = 'ASC'));
        while ($arCurrency = $rsCurrencies->Fetch())
        {
            $arCurrencyList[$arCurrency['CURRENCY']] = $arCurrency['CURRENCY'];
        }
        $arTemplateParameters['CURRENCY_ID'] = array(
            'PARENT' => 'PRICES',
            'NAME' => GetMessage('TP_BST_CURRENCY_ID'),
            'TYPE' => 'LIST',
            'VALUES' => $arCurrencyList,
            'DEFAULT' => CCurrency::GetBaseCurrency(),
            "ADDITIONAL_VALUES" => "Y",
        );
    }
}