<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arCurrentValues
 */

if (!CModule::IncludeModule('iblock'))
    return;

$arTemplateParameters = array();

$arIBlocksTypes = CIBlockParameters::GetIBlockTypes();
$sIBlockType = $arCurrentValues['IBLOCK_TYPE'];

$arIBlocks = array();
$arIBlocksFilter = array();
$arIBlocksFilter['ACTIVE'] = 'Y';

if (!empty($sIBlockType))
    $arIBlocksFilter['TYPE'] = $sIBlockType;

$rsIBlocks = CIBlock::GetList(array('SORT' => 'ASC'), $arIBlocksFilter);

while ($arIBlock = $rsIBlocks->Fetch())
    $arIBlocks[$arIBlock['ID']] = '['.$arIBlock['ID'].'] '.$arIBlock['NAME'];

$iIBlockId = (int)$arCurrentValues['IBLOCK_ID'];

$arTemplateParameters['IBLOCK_TYPE'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_IBLOCK_TYPE'),
    'VALUES' => $arIBlocksTypes,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);
$arTemplateParameters['IBLOCK_ID'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_IBLOCK_ID'),
    'VALUES' => $arIBlocks,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);

if (!empty($iIBlockId)) {
    $arProperties = array();
    $arPropertiesBoolean = array();
    $rsProperties = CIBlockProperty::GetList(array('SORT' => 'ASC'), array(
        'IBLOCK_ID' => $iIBlockId
    ));

    while ($arProperty = $rsProperties->Fetch()) {
        if (!empty($arProperty['CODE'])) {
            $sName = '[' . $arProperty['CODE'] . '] ' . $arProperty['NAME'];

            if ($arProperty['PROPERTY_TYPE'] == 'L' && $arProperty['LIST_TYPE'] == 'C')
                $arPropertiesBoolean[$arProperty['CODE']] = $sName;
        }

        $arProperties[$arProperty['CODE']] = $arProperty;
    }

    $arTemplateParameters['PROPERTY_DISPLAY'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_PROPERTY_DISPLAY'),
        'VALUES' => $arPropertiesBoolean,
        'ADDITIONAL_VALUES' => 'Y'
    );
}

$arTemplateParameters['USE_SETTINGS'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_USE_SETTINGS'),
    'DEFAULT' => 'Y'
);

$arTemplateParameters['ITEMS_LIMIT'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_ITEMS_LIMIT'),
    'DEFAULT' => 20
);

$arTemplateParameters['PAGE_URL'] = array(
    'PARENT' => 'URL_TEMPLATES',
    'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_PAGE_URL'),
    'TYPE' => 'STRING'
);

$arTemplateParameters['SECTION_URL'] = CIBlockParameters::GetPathTemplateParam(
    'SECTION',
    'SECTION_URL',
    GetMessage('C_W_SERVICES_PARAMETERS_SECTION_URL'),
    '',
    'URL_TEMPLATES'
);

$arTemplateParameters['DETAIL_URL'] = CIBlockParameters::GetPathTemplateParam(
    'DETAIL',
    'DETAIL_URL',
    GetMessage('C_W_SERVICES_PARAMETERS_DETAIL_URL'),
    '',
    'URL_TEMPLATES'
);

$arTemplateParameters['DISPLAY_TITLE'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_DISPLAY_TITLE'),
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y'
);

if ($arCurrentValues['DISPLAY_TITLE'] == 'Y') {
    $arTemplateParameters['ALIGHT_TEXT'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('C_W_SERVICES_ALIGHT_TEXT'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'N'
    );
    $arTemplateParameters['TITLE'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_TITLE'),
        'TYPE' => 'STRING'
    );
}

$arTemplateParameters['DISPLAY_DESCRIPTION'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_DISPLAY_DESCRIPTION'),
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y'
);

if ($arCurrentValues['DISPLAY_DESCRIPTION'] == 'Y') {
    $arTemplateParameters['ALIGHT_DESCRIPTION'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('C_W_SERVICES_ALIGHT_DESCRIPTION'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'N'
    );
    $arTemplateParameters['DESCRIPTION'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_DESCRIPTION'),
        'TYPE' => 'STRING'
    );
}

$arTemplateParameters['DISPLAY_BUTTON_ALL'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_DISPLAY_BUTTON_ALL'),
    'TYPE' => 'CHECKBOX'
);

$arTemplateParameters['VIEW_DESKTOP'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_DESKTOP'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'default.all' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_DESKTOP_DEFAULT'),
        'tile.all' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_DESKTOP_TILE'),
        'minimal.all' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_DESKTOP_MINIMAL'),
        'blocks.all' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_DESKTOP_BLOCKS'),
        'blocks.small.all' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_DESKTOP_BLOCKS_SMALL')
    )
);

$arTemplateParameters['VIEW_MOBILE'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_MOBILE'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'default.all' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_MOBILE_DEFAULT'),
        'tile.all' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_MOBILE_TILE'),
        'tile.slider.mobile' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_MOBILE_TILE_SLIDER'),
        'minimal.all' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_MOBILE_MINIMAL'),
        'blocks.all' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_MOBILE_BLOCKS'),
        'blocks.small.all' => GetMessage('C_W_SERVICES_PARAMETERS_VIEW_MOBILE_BLOCKS_SMALL')
    )
);