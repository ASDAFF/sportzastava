<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arCurrentValues;
 */

if (!CModule::IncludeModule('iblock'))
    return;

$arIBlocksTypes = CIBlockParameters::GetIBlockTypes();
$sIBlockType = $arCurrentValues['IBLOCK_TYPE'];

$arIBlocks = array();
$iIBlockId = $arCurrentValues['IBLOCK_ID'];
$arIBlocksFilter = array();
$arIBlocksFilter['ACTIVE'] = 'Y';

if (!empty($sIBlockType))
    $arIBlocksFilter['TYPE'] = $sIBlockType;

$rsIBlocks = CIBlock::GetList(array('SORT' => 'ASC'), $arIBlocksFilter);

while ($arIBlock = $rsIBlocks->Fetch())
    $arIBlocks[$arIBlock['ID']] = '['.$arIBlock['ID'].'] '.$arIBlock['NAME'];

$arTemplateParameters = array();
$arTemplateParameters['IBLOCK_TYPE'] = array(
    'PARENT' => 'BASE',
    'NAME' => Loc::getMessage('M_HORIZONTAL_PARAMETERS_IBLOCK_TYPE'),
    'TYPE' => 'LIST',
    'VALUES' => $arIBlocksTypes,
    'REFRESH' => 'Y',
    'ADDITIONAL_VALUES' => 'Y'
);
$arTemplateParameters['IBLOCK_ID'] = array(
    'PARENT' => 'BASE',
    'NAME' => Loc::getMessage('M_HORIZONTAL_PARAMETERS_IBLOCK_ID'),
    'TYPE' => 'LIST',
    'VALUES' => $arIBlocks,
    'REFRESH' => 'Y',
    'ADDITIONAL_VALUES' => 'Y'
);

if (!empty($iIBlockId)) {
    $arFields = array();
    $rsFields = CUserTypeEntity::GetList(array('SORT' => 'ASC'), array(
        'ENTITY_ID' => 'IBLOCK_'.$iIBlockId.'_SECTION',
        'USER_TYPE_ID' => 'file'
    ));

    while ($arField = $rsFields->Fetch())
        $arFields[$arField['FIELD_NAME']] = $arField['FIELD_NAME'];

    $arTemplateParameters['PROPERTY_IMAGE'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => Loc::getMessage('M_HORIZONTAL_PARAMETERS_PROPERTY_IMAGE'),
        'TYPE' => 'LIST',
        'VALUES' => $arFields,
        'REFRESH' => 'Y',
        'ADDITIONAL_VALUES' => 'Y'
    );
}

$arTemplateParameters['DEFAULT_VIEW'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => Loc::getMessage('M_HORIZONTAL_PARAMETERS_DEFAULT_VIEW'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'default' => Loc::getMessage('M_HORIZONTAL_PARAMETERS_DEFAULT_VIEW_DEFAULT')
    )
);

$arTemplateParameters['SECTION_VIEW'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => Loc::getMessage('M_HORIZONTAL_PARAMETERS_SECTION_VIEW'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'default' => Loc::getMessage('M_HORIZONTAL_PARAMETERS_SECTION_VIEW_DEFAULT'),
        'with.images' => Loc::getMessage('M_HORIZONTAL_PARAMETERS_SECTION_VIEW_WITH_IMAGES')
    )
);

if ($arCurrentValues['SECTION_VIEW'] == 'with.images') {
    $arTemplateParameters['SECTION_VIEW_SUBSECTION_COUNT'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => Loc::getMessage('M_HORIZONTAL_PARAMETERS_SECTION_VIEW_SUBSECTION_COUNT'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5'
        ),
        'DEFAULT' => 3,
        'ADDITIONAL_VALUES' => 'Y'
    );
}