<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die() ?>
<?php
/**
 * @var array $arCurrentValues
 */

if (!CModule::IncludeModule('iblock'))
    return;

$sIBlockType = $arCurrentValues['IBLOCK_TYPE'];
$iIBlockId = $arCurrentValues['IBLOCK_ID'];

$arTemplateParameters = array();

if (!empty($iIBlockId)) {
    $arPropertiesString = array();

    $arProperties = array();
    $rsIBlockProperties = CIBlockProperty::GetList(array(
        'SORT' => 'ASC'
    ), array(
        'ACTIVE' => 'Y',
        'IBLOCK_ID' => $iIBlockId
    ));

    while ($arIBlockProperty = $rsIBlockProperties->Fetch()) {
        if (empty($arIBlockProperty['CODE']))
            continue;

        $sName = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];

        $arProperties[$arIBlockProperty['CODE']] = $arIBlockProperty;

        if ($arIBlockProperty['PROPERTY_TYPE'] == 'S')
            $arPropertiesString[$arIBlockProperty['CODE']] = $sName;
    }

    $arTemplateParameters['PROPERTY_POSITION'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('N_L_STUFFS_PARAMETERS_PROPERTY_POSITION'),
        'TYPE' => 'LIST',
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['PROPERTY_PHONE'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('N_L_STUFFS_PARAMETERS_PROPERTY_PHONE'),
        'TYPE' => 'LIST',
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['PROPERTY_SKYPE'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('N_L_STUFFS_PARAMETERS_PROPERTY_SKYPE'),
        'TYPE' => 'LIST',
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['PROPERTY_EMAIL'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('N_L_STUFFS_PARAMETERS_PROPERTY_EMAIL'),
        'TYPE' => 'LIST',
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters["SHOW_ALL_STUFFS"] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage("N_L_STUFFS_SHOW_ALL"),
        "TYPE" => "CHECKBOX",
        'DEFAULT' => 'Y'
    );
}