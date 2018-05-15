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
    'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_IBLOCK_TYPE'),
    'VALUES' => $arIBlocksTypes,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);

$arTemplateParameters['IBLOCK_ID'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_IBLOCK_ID'),
    'VALUES' => $arIBlocks,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);

$arTemplateParameters['USE_SETTINGS'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_USE_SETTINGS'),
    'DEFAULT' => 'Y'
);

$arTemplateParameters['ITEMS_LIMIT'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_ITEMS_LIMIT'),
    'DEFAULT' => 20
);


$arTemplateParameters['DISPLAY_TITLE'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_DISPLAY_TITLE'),
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y'
);

if ($arCurrentValues['DISPLAY_TITLE'] == 'Y') {
    $arTemplateParameters['ALIGHT_HEADER'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_ALIGHT_HEADER'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'N'
    );
    $arTemplateParameters['TITLE'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_TITLE'),
        'TYPE' => 'STRING'
    );
}

$arTemplateParameters['DISPLAY_DESCRIPTION'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_DISPLAY_DESCRIPTION'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N',
    'REFRESH' => 'Y'
);

if ($arCurrentValues['DISPLAY_DESCRIPTION'] == 'Y') {
    $arTemplateParameters['ALIGHT_DESCRIPTION'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_ALIGHT_DESCRIPTION'),
        'TYPE' => 'CHECKBOX'
    );
    $arTemplateParameters['DESCRIPTION'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_DESCRIPTION'),
        'TYPE' => 'STRING'
    );
}


$arTemplateParameters['DESKTOP_TEMPLATE'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_VIEW_DESKTOP'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'chess' => GetMessage('N_L_SECTIONS_DESKTOP_TEMPLATE_CHESS'),
        'puzzle' => GetMessage('N_L_SECTIONS_DESKTOP_TEMPLATE_PUZZLE'),
        'tiles' => GetMessage('N_L_SECTIONS_DESKTOP_TEMPLATE_TILES')
    ),
    'REFRESH' => 'Y'
);

$arTemplateParameters['MOBILE_TEMPLATE'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_VIEW_MOBILE'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'one_column' => GetMessage('N_L_SECTIONS_MOBILE_TEMPLATE_ONE_COLUMN'),
        'two_column' => GetMessage('N_L_SECTIONS_MOBILE_TEMPLATE_TWO_COLUMN')
    )
);

if (!empty($iIBlockId)) {
    $arProperties = array();
    $arPropertiesBoolean = array();
    $arPropsList = array();
    $rsProperties = CIBlockProperty::GetList(array('SORT' => 'ASC'), array(
        'IBLOCK_ID' => $iIBlockId
    ));

    while ($arProperty = $rsProperties->Fetch()) {
        if (!empty($arProperty['CODE'])) {
            $sName = '[' . $arProperty['CODE'] . '] ' . $arProperty['NAME'];

            if ($arProperty['PROPERTY_TYPE'] == 'L' && $arProperty['LIST_TYPE'] == 'C')
                $arPropertiesBoolean[$arProperty['CODE']] = $sName;
            if ($arProperty['PROPERTY_TYPE'] == 'L' && $arProperty['LIST_TYPE'] != 'C')
                $arPropsList[$arProperty['CODE']] = $sName;
        }

        $arProperties[$arProperty['CODE']] = $sName;
    }

    if ($arCurrentValues['DESKTOP_TEMPLATE'] == 'puzzle') {
        $iblockElementsArray = array();
        $iblockElements = CIBlockElement::GetList(array(), array(
            'IBLOCK_ID' => $iIBlockId
        ));
        while ($row = $iblockElements->GetNext()) {
            $iblockElementsArray[$row['ID']] = '['. $row['ID'] .']'. $row['NAME'];
        }
        $arTemplateParameters['MAIN_ELEMENT'] = array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_MAIN_ELEMENT'),
            'TYPE' => 'LIST',
            'ADDITIONAL_VALUES' => 'Y',
            'VALUES' => $iblockElementsArray
        );
        unset($iblockElements, $iblockElementsArray);
    }
}
$arTemplateParameters["PROPERTY_LINK"] = array(
    'PARENT' => 'DATA_SOURCE',
    'TYPE'=>'LIST',
    'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_PROPERTY_LINK'),
    'VALUES' => $arProperties

);
$arTemplateParameters["PROPERTY_TARGET"] = array(
    'PARENT' => 'DATA_SOURCE',
    'TYPE'=>'LIST',
    'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_PROPERTY_TARGET'),
    'VALUES' => $arPropertiesBoolean

);
if ($arCurrentValues['DESKTOP_TEMPLATE'] == 'puzzle') {
    $arTemplateParameters["PROPERTY_SHOW_STICKER"] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_PROPERTY_SHOW_STICKER'),
        'VALUES' => $arPropertiesBoolean

    );
    $arTemplateParameters["PROPERTY_STICKER"] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_PROPERTY_STICKER'),
        'VALUES' => $arProperties

    );
    $arTemplateParameters["PROPERTY_SIZE"] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_PROPERTY_SIZE'),
        'VALUES' => $arProperties

    );
}
if ($arCurrentValues['DESKTOP_TEMPLATE'] == 'chess') {
    $arTemplateParameters["PROPERTY_SHOW_STICKER"] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_PROPERTY_SHOW_STICKER'),
        'VALUES' => $arPropertiesBoolean

    );
    $arTemplateParameters["PROPERTY_STICKER"] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_PROPERTY_STICKER'),
        'VALUES' => $arProperties

    );
}
if ($arCurrentValues['DESKTOP_TEMPLATE'] == 'tiles') {
    $arTemplateParameters["COUNT_IN_ROW"] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('C_W_SECTIONS_DESC_COUNT_IN_ROW'),
        'VALUES' => array(
            "three" => "3",
            "four" => "4",
            "five" => "5"
        )

    );
}

$arSortFields = array(
    "ID"=>GetMessage("C_W_SECTIONS_DESC_FID"),
    "NAME"=>GetMessage("C_W_SECTIONS_DESC_FNAME"),
    "ACTIVE_FROM"=>GetMessage("C_W_SECTIONS_DESC_FACT"),
    "SORT"=>GetMessage("C_W_SECTIONS_DESC_FSORT"),
    "TIMESTAMP_X"=>GetMessage("C_W_SECTIONS_DESC_FTSAMP")
);
$arSorts = array("ASC"=>GetMessage("C_W_SECTIONS_DESC_ASC"), "DESC"=>GetMessage("C_W_SECTIONS_DESC_DESC"));

$arTemplateParameters["SORT_BY1"] = array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => GetMessage("C_W_SECTIONS_DESC_IBORD1"),
    "TYPE" => "LIST",
    "DEFAULT" => "ACTIVE_FROM",
    "VALUES" => $arSortFields,
    "ADDITIONAL_VALUES" => "Y",
);

$arTemplateParameters["SORT_ORDER1"] = array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => GetMessage("C_W_SECTIONS_DESC_IBBY1"),
    "TYPE" => "LIST",
    "DEFAULT" => "DESC",
    "VALUES" => $arSorts,
);

$arTemplateParameters["SORT_BY2"] =  array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => GetMessage("C_W_SECTIONS_DESC_IBORD2"),
    "TYPE" => "LIST",
    "DEFAULT" => "ASC",
    "VALUES" => $arSortFields,
    "ADDITIONAL_VALUES" => "Y",
);

$arTemplateParameters["SORT_ORDER2"] = array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => GetMessage("C_W_SECTIONS_DESC_IBBY2"),
    "TYPE" => "LIST",
    "DEFAULT" => "SORT",
    "VALUES" => $arSorts,
);
