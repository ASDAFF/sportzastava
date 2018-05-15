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
    'NAME' => GetMessage('C_W_NEWS_PARAMETERS_IBLOCK_TYPE'),
    'VALUES' => $arIBlocksTypes,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);
$arTemplateParameters['IBLOCK_ID'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('C_W_NEWS_PARAMETERS_IBLOCK_ID'),
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

}

$arTemplateParameters['DATE_FORMAT'] = CIBlockParameters::GetDateFormat(GetMessage("C_W_NEWS_PARAMETERS_DATE_FORMAT"), "VISUAL");

$arTemplateParameters['DETAIL_URL'] = CIBlockParameters::GetPathTemplateParam(
    'DETAIL',
    'DETAIL_URL',
    GetMessage('C_W_NEWS_PARAMETERS_DETAIL_URL'),
    '',
    'URL_TEMPLATES'
);

$arTemplateParameters['USE_SETTINGS'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('C_W_NEWS_PARAMETERS_USE_SETTINGS'),
    'DEFAULT' => 'Y'
);

$arTemplateParameters['ITEMS_LIMIT'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'TEXT',
    'NAME' => GetMessage('C_W_NEWS_PARAMETERS_ITEMS_LIMIT')
);

$arTemplateParameters['DISPLAY_TITLE'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('C_W_NEWS_PARAMETERS_DISPLAY_TITLE'),
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y'
);

if ($arCurrentValues['DISPLAY_TITLE'] == 'Y') {
    $arTemplateParameters['ALIGN_TITLE'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('C_W_NEWS_PARAMETERS_ALIGN_HEADER'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'N'
    );
    $arTemplateParameters['TITLE'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('C_W_NEWS_PARAMETERS_TITLE'),
        'TYPE' => 'STRING'
    );
}
$arTemplateParameters['DISPLAY_DESCRIPTION'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('C_W_NEWS_PARAMETERS_SHOW_DESCRIPTION'),
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y'
);

if ($arCurrentValues['DISPLAY_DESCRIPTION'] == 'Y') {
    $arTemplateParameters['ALIGN_DESCRIPTION'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('C_W_NEWS_PARAMETERS_ALIGN_DESCRIPTION'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'N'
    );
    $arTemplateParameters['DESCRIPTION'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('C_W_NEWS_PARAMETERS_DESCRIPTION'),
        'TYPE' => 'STRING'
    );
}

$arTemplateParameters['VIEW_DESKTOP'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('C_W_NEWS_PARAMETERS_VIEW_DESKTOP'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'default.all' => GetMessage('C_W_NEWS_PARAMETERS_VIEW_DESKTOP_DEFAULT'),
        'extend.all' => GetMessage('C_W_NEWS_PARAMETERS_VIEW_DESKTOP_EXTEND'),
        'list.all' => GetMessage('C_W_NEWS_PARAMETERS_VIEW_DESKTOP_LIST'),
        'tiles.all' => GetMessage('C_W_NEWS_PARAMETERS_VIEW_DESKTOP_TILES')
    ),
    'REFRESH' => 'Y'
);

if (in_array($arCurrentValues['VIEW_DESKTOP'], array('default.all', 'tiles.all'))) {
    $arTemplateParameters['LINE_COUNT_DESKTOP'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('C_W_NEWS_PARAMETERS_LINE_COUNT_DESKTOP'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4
        )
    );
}

$arTemplateParameters['VIEW_MOBILE'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('C_W_NEWS_PARAMETERS_VIEW_MOBILE'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'default.all' => GetMessage('C_W_NEWS_PARAMETERS_VIEW_MOBILE_DEFAULT'),
        'extend.all' => GetMessage('C_W_NEWS_PARAMETERS_VIEW_MOBILE_EXTEND'),
        'list.all' => GetMessage('C_W_NEWS_PARAMETERS_VIEW_MOBILE_LIST'),
        'tiles.all' => GetMessage('C_W_NEWS_PARAMETERS_VIEW_MOBILE_TILES')
    ),
    'REFRESH' => 'Y'
);

if ($arCurrentValues['VIEW_MOBILE'] == 'default.all') {
    $arTemplateParameters['LINE_COUNT_MOBILE'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('C_W_NEWS_PARAMETERS_LINE_COUNT_MOBILE'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4
        )
    );
}

$arSortFields = array(
    "ID"=>GetMessage("C_W_NEWS_PARAMETERS_DESC_FID"),
    "NAME"=>GetMessage("C_W_NEWS_PARAMETERS_DESC_FNAME"),
    "ACTIVE_FROM"=>GetMessage("C_W_NEWS_PARAMETERS_DESC_FACT"),
    "SORT"=>GetMessage("C_W_NEWS_PARAMETERS_DESC_FSORT"),
    "TIMESTAMP_X"=>GetMessage("C_W_NEWS_PARAMETERS_DESC_FTSAMP")
);
$arSorts = array("ASC"=>GetMessage("C_W_NEWS_PARAMETERS_DESC_ASC"), "DESC"=>GetMessage("C_W_NEWS_PARAMETERS_DESC_DESC"));

$arTemplateParameters["SORT_BY1"] = array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => GetMessage("C_W_NEWS_PARAMETERS_DESC_IBORD1"),
    "TYPE" => "LIST",
    "DEFAULT" => "ACTIVE_FROM",
    "VALUES" => $arSortFields,
    "ADDITIONAL_VALUES" => "Y",
);

$arTemplateParameters["SORT_ORDER1"] = array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => GetMessage("C_W_NEWS_PARAMETERS_DESC_IBBY1"),
    "TYPE" => "LIST",
    "DEFAULT" => "DESC",
    "VALUES" => $arSorts,
);

$arTemplateParameters["SORT_BY2"] =  array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => GetMessage("C_W_NEWS_PARAMETERS_DESC_IBORD2"),
    "TYPE" => "LIST",
    "DEFAULT" => "ASC",
    "VALUES" => $arSortFields,
    "ADDITIONAL_VALUES" => "Y",
);

$arTemplateParameters["SORT_ORDER2"] = array(
    "PARENT" => "DATA_SOURCE",
    "NAME" => GetMessage("C_W_NEWS_PARAMETERS_DESC_IBBY2"),
    "TYPE" => "LIST",
    "DEFAULT" => "SORT",
    "VALUES" => $arSorts,
);