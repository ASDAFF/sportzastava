<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arCurrentValues
 * @var array $arTemplateParameters
 */

if (!Loader::includeModule('catalog'))
    return;


$arTemplateParameters['SHOW_DELAYED'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('WBF_SHOW_DELAYED'),
    'TYPE' => 'CHECKBOX'
);

# Web form
if (Loader::includeModule('form')) {
    $webForms = array();
    $webFormsResult = CForm::GetList(
        ($sort = 's_sort'),
        ($order = 'asc'),
        array(),
        ($filter = true)
    );
    while ($row = $webFormsResult->Fetch()) {
        $webForms[$row['ID']] = '['. $row['ID'] .'] '. $row['NAME'];
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