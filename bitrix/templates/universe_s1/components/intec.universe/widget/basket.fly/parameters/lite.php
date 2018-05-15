<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arCurrentValues
 * @var array $arTemplateParameters
 */

if (!Loader::includeModule('intec.startshop'))
    return;


$arCurrencies = array();
$dbCurrencies = CStartShopCurrency::GetList();
while ($arCurrency = $dbCurrencies->Fetch()) {
    $arCurrencies[$arCurrency['CODE']] = '[' . $arCurrency['CODE'] . '] ' . $arCurrency['LANG'][LANGUAGE_ID]['NAME'];
}
unset($dbCurrencies, $arCurrency);

$arTemplateParameters['CURRENCY'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('WBF_CURRENCY'),
    'TYPE' => 'LIST',
    'VALUES' => $arCurrencies
);


# Web form
if ($arCurrentValues['SHOW_FORM'] == 'Y') {
    $webForms = array();
    $webFormsResult = CStartShopForm::GetList(
        ($sort = 's_sort'),
        ($order = 'asc'),
        array(),
        ($filter = true)
    );
    while ($row = $webFormsResult->Fetch()) {
        $webForms[$row['ID']] = '['. $row['ID'] .'] '.(!empty($arForm['LANG'][LANGUAGE_ID]['NAME']) ? $arForm['LANG'][LANGUAGE_ID]['NAME'] : $arForm['CODE']);
    }
    unset($webFormsResult);

    $arTemplateParameters['WEB_FORM_ID'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('WBF_WEB_FORM'),
        'TYPE' => 'LIST',
        'VALUES' => $webForms,
        'ADDITIONAL_VALUES' => 'Y',
        'REFRESH' => 'Y'
    );
}