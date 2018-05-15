<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock\PropertyTable;

/**
 * @var array $arCurrentValues
 * @var array $pricesTypes
 */

if (!Loader::includeModule('catalog'))
    return;


$pricesTypes = CCatalogIBlockParameters::getPriceTypesList();

$arTemplateParameters['DISPLAY_DISCOUNT'] = array(
    'PARENT' => 'DATA_SOURCE',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('C_W_CATALOG_CATEGORIES_PARAMETERS_DISPLAY_DISCOUNT')
);

// Web Form
if (Loader::includeModule('form')) {
    $webFormsList = array();
    $webForms = CForm::GetList($by = 'sort', $order = 'asc', array(), $filtered = false);
    while ($row = $webForms->Fetch()) {
        $webFormsList[$row['ID']] = '['. $row['ID'] .'] '. $row['NAME'];
    }

    $arTemplateParameters['ORDER_PRODUCT_WEB_FORM'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('C_CATEGORIES_ORDER_PRODUCT_WEB_FORM'),
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
            'NAME' => GetMessage('C_CATEGORIES_PROPERTY_FORM_ORDER_PRODUCT'),
            'VALUES' => $arFormFields,
            'ADDITIONAL_VALUES' => 'Y'
        );
    }
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

$arOffers = CCatalogSku::GetInfoByProductIBlock($iIBlockId);
$arOffersProperties = array();

if (!empty($arOffers)) {
    $rsOffersProperties = PropertyTable::getList(array(
        'select' => array('ID', 'IBLOCK_ID', 'NAME', 'CODE', 'PROPERTY_TYPE', 'MULTIPLE', 'LINK_IBLOCK_ID', 'USER_TYPE', 'SORT'),
        'filter' => array('=IBLOCK_ID' => $arOffers['IBLOCK_ID'], '=ACTIVE' => 'Y', '!=ID' => $arOffers['SKU_PROPERTY_ID']),
        'order' => array('SORT' => 'ASC', 'NAME' => 'ASC')
    ));

    while ($arOfferProperty = $rsOffersProperties->Fetch()) {
        $sCode = $arOfferProperty['CODE'];

        if (empty($sCode))
            $sCode = $arOfferProperty['ID'];

        $sName = '['.$sCode.'] '.$arOfferProperty['NAME'];
        $arOffersProperties[$sCode] = $sName;
    }
}

$arTemplateParameters['OFFERS_PROPERTY_CODE'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('C_W_CATALOG_CATEGORIES_PARAMETERS_OFFERS_PROPERTY_CODE'),
    'TYPE' => 'LIST',
    'MULTIPLE' => 'Y',
    'VALUES' => $arOffersProperties,
    'ADDITIONAL_VALUES' => 'Y',
);