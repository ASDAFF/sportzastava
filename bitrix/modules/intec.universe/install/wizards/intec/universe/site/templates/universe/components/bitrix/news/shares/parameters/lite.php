<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;

/**
 * @var array $arTemplateParameters
 * @var array $arCurrentValues
 * @var array $webFormsList
 * @var array $arPricesTypes
 * @var array $arCurrencies
 */

if (!Loader::includeModule('intec.startshop'))
    return;


// Price types
$dbPricesTypes = CStartShopPrice::GetList(array('SORT' => 'ASC'));
while ($priceType = $dbPricesTypes->Fetch()) {
    $name = ArrayHelper::getValue($priceType, ['LANG', LANGUAGE_ID, 'NAME'], '-');
    $arPricesTypes[$priceType['CODE']] = '[' . $priceType['CODE'] . '] ' . $name;
}
unset($dbPricesTypes);


// Currencies
$dbCurrencies = CStartShopCurrency::GetList();
while ($currency = $dbCurrencies->Fetch()) {
    $name = ArrayHelper::getValue($currency, ['LANG', LANGUAGE_ID, 'NAME'], '-');
    $arCurrencies[$currency['CODE']] = '[' . $currency['CODE'] . '] ' . $name;
}
unset($dbCurrencies);


// Web forms
if ($arCurrentValues['PROPERTY_SHOW_FORM'] == 'Y') {
    $webForms = CStartShopForm::GetList(array(), array());
    while ($form = $webForms->Fetch()) {
        $name = ArrayHelper::getValue($form, ['LANG', LANGUAGE_ID, 'NAME'], '');
        $webFormsList[$form['ID']] = '[' . $form['ID'] . '] ' . $name;
    }
    unset($webForms, $form);
}

$arTemplateParameters['ORDER_PRODUCT_WEB_FORM'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => GetMessage('C_SHARE_ORDER_PRODUCT_WEB_FORM'),
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
        'NAME' => GetMessage('C_SHARE_PROPERTY_FORM_ORDER_PRODUCT'),
        'VALUES' => $arFormFields,
        'ADDITIONAL_VALUES' => 'Y'
    );
}

$arTemplateParameters['USE_COMMON_CURRENCY'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('SH_C_USE_COMMON_CURRENCY'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N',
    'REFRESH' => 'Y'
);
if ($arCurrentValues['USE_COMMON_CURRENCY'] == 'Y') {
    $arTemplateParameters['CURRENCY'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('C_CATALOG_CURRENCY'),
        'TYPE' => 'LIST',
        'VALUES' => $arCurrencies
    );
}