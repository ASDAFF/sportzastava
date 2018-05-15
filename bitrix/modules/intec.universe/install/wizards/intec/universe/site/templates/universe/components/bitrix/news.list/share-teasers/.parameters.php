<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var array $arCurrentValues
 */

if (!CModule::IncludeModule('iblock'))
    return;

$sIBlockType = $arCurrentValues['IBLOCK_TYPE'];
$iIBlockId = $arCurrentValues['IBLOCK_ID'];

if (!empty($sIBlockType) && !empty($iIBlockId)) {

    $arPropertiesString = array();
    $arPropertiesBoolean = array();
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

        if ($arIBlockProperty['PROPERTY_TYPE'] == 'S' && $arIBlockProperty['MULTIPLE'] == 'N')
            $arPropertiesString[$arIBlockProperty['CODE']] = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];

        if (
            $arIBlockProperty['PROPERTY_TYPE'] == 'L' &&
            $arIBlockProperty['LIST_TYPE'] == 'C' &&
            $arIBlockProperty['MULTIPLE'] == 'N'
        ) $arPropertiesBoolean[$arIBlockProperty['CODE']] = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];
    }

    $arTemplateParameters = array(
        'PROPERTY_TITLE' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_TITLE'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_DESCRIPTION' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_DESCRIPTION'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_LINK' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_LINK'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_LINK_TARGET' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_LINK_TARGET'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesBoolean,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_BUTTON_SHOW' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_BUTTON_SHOW'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesBoolean,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_BUTTON_TEXT' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_BUTTON_TEXT'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_BUTTON_TEXT_COLOR' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_BUTTON_TEXT_COLOR'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_BUTTON_COLOR' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_BUTTON_COLOR'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        )
    );
}