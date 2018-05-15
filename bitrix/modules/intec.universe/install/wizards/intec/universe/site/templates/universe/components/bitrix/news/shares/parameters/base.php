<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arTemplateParameters
 * @var array $arCurrentValues
 * @var array $webFormsList
 * @var array $arPricesTypes
 * @var array $arCurrencies
 */

if (!Loader::includeModule('catalog') || !Loader::includeModule('form'))
    return;


$arPricesTypes = CCatalogIBlockParameters::getPriceTypesList();


// Web Form Product
if (CModule::IncludeModule('form')) {
    $webFormsList = array();
    $webForms = CForm::GetList($by = 'sort', $order = 'asc', array(), $filtered = false);
    while ($row = $webForms->Fetch()) {
        $webFormsList[$row['ID']] = '['. $row['ID'] .'] '. $row['NAME'];
    }

    $arTemplateParameters['ORDER_PRODUCT_WEB_FORM'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('C_SHARES_ORDER_PRODUCT_WEB_FORM'),
        'TYPE' => 'LIST',
        'VALUES' => $webFormsList,
        'REFRESH' => 'Y'
    );

    if (!empty($arCurrentValues['ORDER_PRODUCT_WEB_FORM'])) {
        $arFormFields = array();
        $rsFormFields = CFormField::GetList(
            $arCurrentValues['ORDER_PRODUCT_WEB_FORM'],
            'N',
            $by = null,
            $asc = null,
            array(
                'ACTIVE' => 'Y'
            ),
            $filtered = false
        );

        while ($arFormField = $rsFormFields->GetNext()) {

            $rsFormAnswers = CFormAnswer::GetList(
                $arFormField['ID'],
                $sort = '',
                $order = '',
                array(),
                $filtered = false
            );

            while ($arFormAnswer = $rsFormAnswers->GetNext()) {
                $sType = $arFormAnswer['FIELD_TYPE'];

                if (empty($sType))
                    continue;

                $sId = 'form_'.$sType.'_'.$arFormAnswer['ID'];
                $arFormFields[$sId] = '['.$arFormAnswer['ID'].'] '.$arFormField['TITLE'];
            }
        }

        $arTemplateParameters['PROPERTY_FORM_ORDER_PRODUCT'] = array(
            'PARENT' => 'DATA_SOURCE',
            'TYPE' => 'LIST',
            'NAME' => GetMessage('C_SHARES_PROPERTY_FORM_ORDER_PRODUCT'),
            'VALUES' => $arFormFields,
            'ADDITIONAL_VALUES' => 'Y'
        );
    }
}