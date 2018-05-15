<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arCurrentValues
 * @var array $pricesTypes
 * @var array $currencies
 */

if (!Loader::includeModule('intec.startshop'))
    return;


$pricesTypes = array();
$currencies = array();

$dbPricesTypes = CStartShopPrice::GetList(array('SORT' => 'ASC'));
while ($row = $dbPricesTypes->Fetch()) {
    $pricesTypes[$row['CODE']] = '['. $row['CODE'] .'] '. $row['LANG'][LANGUAGE_ID]['NAME'];
}
unset($dbPricesTypes, $arPriceType);

$dbCurrencies = CStartShopCurrency::GetList();
while ($row = $dbCurrencies->Fetch()) {
    $currencies[$row['CODE']] = '['. $row['CODE'] .'] '. $row['LANG'][LANGUAGE_ID]['NAME'];
}
unset($dbCurrencies, $arCurrency);

/** Web-form list */
$webFormsList = array();

$webForms = CStartShopForm::GetList(
    array(),
    array()
);
while ($row = $webForms->Fetch()) {
    $webFormsList[$row['ID']] = '[' . $row['ID'] . '] ' . $row['LANG']['ru']['NAME'];
}
unset($webForms, $row);

$arTemplateParameters['ORDER_PRODUCT_WEB_FORM'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => GetMessage('C_CATEGORIES_ORDER_PRODUCT_WEB_FORM'),
    'TYPE' => 'LIST',
    'VALUES' => $webFormsList,
    'REFRESH' => 'Y'
);

if (!empty($arCurrentValues['ORDER_PRODUCT_WEB_FORM'])) {
    $arFormFields = array();
    $rsFormFields = CStartShopFormProperty::GetList(
        array(), array('FORM' => $arCurrentValues['ORDER_PRODUCT_WEB_FORM'])
    );

    while ($arFormField = $rsFormFields->GetNext()) {
        $arFormFields[$arFormField['ID']] = '['.$arFormField['ID'].'] '.$arFormField['LANG']['ru']['NAME'];
    }

    $arTemplateParameters['PROPERTY_FORM_ORDER_PRODUCT'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('C_CATEGORIES_PROPERTY_FORM_ORDER_PRODUCT'),
        'VALUES' => $arFormFields,
        'ADDITIONAL_VALUES' => 'Y'
    );
}

$arTemplateParameters['USE_BASKET'] = array(
    'PARENT' => 'ADDITIONAL_SETTINGS',
    'NAME' => GetMessage('C_CATEGORIES_USE_BASKET'),
    'TYPE' => 'LIST',
    'DEFAULT' => 'settings',
    'VALUES' => array(
        'settings' => GetMessage('C_CATEGORIES_USE_BASKET_FROM_SETTINGS'),
        'Y'        => GetMessage('C_CATEGORIES_USE_BASKET_YES'),
        'N'        => GetMessage('C_CATEGORIES_USE_BASKET_NO'),
    )
);