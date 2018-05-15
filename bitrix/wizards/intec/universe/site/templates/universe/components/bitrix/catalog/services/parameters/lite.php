<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

/** Prices List */
$arPricesTypes = array();
$arPriceIDs = array();

$dbPricesTypes = CStartShopPrice::GetList(array('SORT' => 'ASC'));

while ($arPriceType = $dbPricesTypes->Fetch()) {
    $arPricesTypes[$arPriceType['CODE']] = '['.$arPriceType['CODE'].'] '.$arPriceType['LANG'][LANGUAGE_ID]['NAME'];
    $arPriceIDs[$arPriceType['ID']] = '['.$arPriceType['ID'].'] '.$arPriceType['LANG'][LANGUAGE_ID]['NAME'];
}
unset($dbPricesTypes, $arPriceType);

/** Currencies */
$arCurrencies = array();
$dbCurrencies = CStartShopCurrency::GetList();

while ($arCurrency = $dbCurrencies->Fetch())
    $arCurrencies[$arCurrency['CODE']] = '['.$arCurrency['CODE'].'] '.$arCurrency['LANG'][LANGUAGE_ID]['NAME'];
unset($dbCurrencies, $arCurrency);

$arTemplateParameters['PRICE_CODE'] = array(
    'PARENT' => 'PRICE',
    'NAME' => GetMessage('C_SERVICES_PARAMETERS_CATALOG_PRICE_CODE'),
    'TYPE' => 'LIST',
    'VALUES' => $arPricesTypes,
    'MULTIPLE' => 'Y'
);
$arTemplateParameters['CONVERT_CURRENCY'] = array(
    'PARENT' => 'PRICE',
    'NAME' => GetMessage('C_SERVICES_PARAMETERS_CATALOG_USE_COMMON_CURRENCY'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N',
    'REFRESH' => 'Y'
);
if ($arCurrentValues['CONVERT_CURRENCY'] == 'Y') {
    $arTemplateParameters['CURRENCY_ID'] = array(
        'PARENT' => 'PRICE',
        'NAME' => GetMessage('C_SERVICES_PARAMETERS_CATALOG_CURRENCY'),
        'TYPE' => 'LIST',
        'VALUES' => $arCurrencies
    );
}