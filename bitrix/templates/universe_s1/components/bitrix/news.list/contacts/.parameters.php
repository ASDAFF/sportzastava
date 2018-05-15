<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arCurrentValues
 */

if (!Loader::IncludeModule('iblock'))
    return;

$sIBlockType = $arCurrentValues['IBLOCK_TYPE'];
$iIBlockId = $arCurrentValues['IBLOCK_ID'];

$arTemplateParameters = array(
    'SHOW_MAP' => array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_SHOW_MAP'),
        'TYPE' => 'CHECKBOX',
        'REFRESH' => 'Y'
    ),
    'SHOW_FORM' => array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_SHOW_FORM'),
        'TYPE' => 'CHECKBOX',
        'REFRESH' => 'Y'
    ),
    'SHOW_LIST' => array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_SHOW_LIST'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            'SETTINGS' => GetMessage('N_L_CONTACTS_PARAMETERS_SHOW_LIST_SETTINGS'),
            'NONE' => GetMessage('N_L_CONTACTS_PARAMETERS_SHOW_LIST_NONE'),
            'SHOPS' => GetMessage('N_L_CONTACTS_PARAMETERS_SHOW_LIST_SHOPS'),
            'OFFICES' => GetMessage('N_L_CONTACTS_PARAMETERS_SHOW_LIST_OFFICES')
        )
    )
);

if (!empty($iIBlockId)) {
    $arContacts = array();
    $arIBlockElements = array();
    $rsIBlockElements = CIBlockElement::GetList(array(
        'SORT' => 'ASC'
    ), array(
        'ACTIVE' => 'Y',
        'IBLOCK_ID' => $iIBlockId,
        'IBLOCK_TYPE' => $iIBlockType
    ));

    while ($arIBlockElement = $rsIBlockElements->Fetch()) {
        $arIBlockElements[$arIBlockElement['ID']] = $arIBlockElement;
        $arContacts[$arIBlockElement['ID']] = '['.$arIBlockElement['ID'].'] '.$arIBlockElement['NAME'];
    }

    $arTemplateParameters['CONTACT_ID'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_CONTACT_ID'),
        'TYPE' => 'LIST',
        'VALUES' => $arContacts,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arPropertiesString = array();
    $arPropertiesMap = array();

    $arIBlockProperties = array();
    $rsIBlockProperties = CIBlockProperty::GetList(array(
        'SORT' => 'ASC'
    ), array(
        'ACTIVE' => 'Y',
        'IBLOCK_ID' => $iIBlockId,
        'IBLOCK_TYPE' => $sIBlockType
    ));

    while ($arIBlockProperty = $rsIBlockProperties->Fetch()) {
        if (empty($arIBlockProperty['CODE']))
            continue;

        $arIBlockProperties[$arIBlockProperty['CODE']] = $arIBlockProperty;

        if ($arIBlockProperty['PROPERTY_TYPE'] == 'S')
            $arPropertiesString[$arIBlockProperty['CODE']] = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];

        if ($arIBlockProperty['PROPERTY_TYPE'] == 'S' && $arIBlockProperty['USER_TYPE'] == 'map_google')
            $arPropertiesMap[$arIBlockProperty['CODE']] = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];
    }

    if ($arCurrentValues['SHOW_MAP'] == 'Y') {
        $arTemplateParameters['PROPERTY_MAP'] = array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_PROPERTY_MAP'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesMap,
            'ADDITIONAL_VALUES' => 'Y'
        );

        $arTemplateParameters['API_KEY_MAP'] = array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_API_KEY_MAP'),
            'TYPE' => 'STRING'
        );
    }

    $arTemplateParameters['PROPERTY_ADDRESS'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_PROPERTY_ADDRESS'),
        'TYPE' => 'LIST',
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['PROPERTY_PHONE'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_PROPERTY_PHONE'),
        'TYPE' => 'LIST',
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['PROPERTY_PHONE_HELP'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_PROPERTY_PHONE_HELP'),
        'TYPE' => 'LIST',
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['PROPERTY_EMAIL'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_PROPERTY_EMAIL'),
        'TYPE' => 'LIST',
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['PROPERTY_WORK_TIME'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_PROPERTY_WORK_TIME'),
        'TYPE' => 'LIST',
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );
}

if ($arCurrentValues['SHOW_FORM'] == 'Y') {
    $arForms = array();

    if (Loader::IncludeModule('intec.startshop')) {
        include('parameters/lite.php');
    } elseif (Loader::IncludeModule('form')) {
        include('parameters/base.php');
    }

    $arTemplateParameters['WEB_FORM_ID'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_WEB_FORM_ID'),
        'TYPE' => 'LIST',
        'VALUES' => $arForms,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['WEB_FORM_CONSENT_URL'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('N_L_CONTACTS_PARAMETERS_WEB_FORM_CONSENT_URL'),
        'TYPE' => 'TEXT'
    );
}