<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use Bitrix\Iblock;
use Bitrix\Currency;

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

//$arTemplateParameters['ITEMS_LIMIT'] = array(
//    'PARENT' => 'BASE',
//    'TYPE' => 'STRING',
//    'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_ITEMS_LIMIT'),
//    'DEFAULT' => 20
//);


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
    'REFRESH' => 'Y'
);

if ($arCurrentValues['DISPLAY_DESCRIPTION'] == 'Y') {
    $arTemplateParameters['ALIGHT_DESCRIPTION'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_ALIGHT_DESCRIPTION'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'N'
    );
    $arTemplateParameters['DESCRIPTION'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('C_W_SECTIONS_PARAMETERS_DESCRIPTION'),
        'TYPE' => 'STRING'
    );
}
$arTemplateParameters["SECTION_COUNT_ELEMENTS"] = array(
    "PARENT" => "BASE",
    "NAME" => GetMessage("SECTION_COUNT_ELEMENTS"),
    "TYPE" => "CHECKBOX"
);
//$arTemplateParameters["SECTION_TOP_DEPTH"] = array(
//    "PARENT" => "BASE",
//    "NAME" => GetMessage("SECTION_TOP_DEPTH"),
//    "TYPE" => "STRING"
//);
$arTemplateParameters["VIEW"] = array(
    "PARENT" => "BASE",
    "NAME" => GetMessage("SECTION_VIEW"),
    "TYPE" => "LIST",
    "VALUES" => array(
        "list" => GetMessage("SECTION_LIST"),
        "tile2" => GetMessage("SECTION_TILE")
    ),
    "REFRESH" => "Y"
);
if ($arCurrentValues["VIEW"] == "list") {
    $arTemplateParameters["GRID_CATALOG_ROOT_SECTIONS_COUNT"] = array(
        "PARENT" => "BASE",
        "NAME" => GetMessage("GRID_CATALOG_ROOT_SECTIONS_COUNT"),
        "TYPE" => "LIST",
        "VALUES" => array(
            "2" => 2,
            "3" => 3
        )
    );
} else {
    $arTemplateParameters["GRID_CATALOG_ROOT_SECTIONS_COUNT"] = array(
        "PARENT" => "BASE",
        "NAME" => GetMessage("GRID_CATALOG_ROOT_SECTIONS_COUNT"),
        "TYPE" => "LIST",
        "VALUES" => array(
            "2" => 2,
            "3" => 3,
            "4" => 4,
            "5" => 5,
            "6" => 6,
        )
    );
}

$arTemplateParameters["USE_SUBSECTIONS_SECTIONS"] = array(
    "PARENT" => "BASE",
    "NAME" => GetMessage("USE_SUBSECTIONS_SECTIONS"),
    "TYPE" => "CHECKBOX"
);
//$arTemplateParameters["SECTIONS_DISPLAY_DESCRIPTION"] = array(
//    "PARENT" => "BASE",
//    "NAME" => GetMessage("SECTIONS_DISPLAY_DESCRIPTION"),
//    "TYPE" => "CHECKBOX"
//);
$arTemplateParameters["COUNT_SUBSECTIONS_SECTIONS"] = array(
    "PARENT" => "BASE",
    "NAME" => GetMessage("COUNT_SUBSECTIONS_SECTIONS"),
    "TYPE" => "STRING"
);
if($arCurrentValues["IBLOCK_ID"]){
    $categoryList = array();
    $arFilter  = array(
        "IBLOCK_ID" => $arCurrentValues["IBLOCK_ID"],
        "IBLOCK_TYPE" => $arCurrentValues["IBLOCK_TYPE"]
    );
    $rsSections = CIBlockSection::GetList($arSort, $arFilter);
    while($arSection = $rsSections->GetNext())    {
        $categoryList[$arSection["ID"]] = $arSection["NAME"];
    }
    $arTemplateParameters["ID_CATEGORIES"] = array(
        "PARENT" => "BASE",
        "NAME" => "CATEGORIES",
        "TYPE" => "LIST",
        "MULTIPLE" => "Y",
        "VALUES" => $categoryList
    );


}






