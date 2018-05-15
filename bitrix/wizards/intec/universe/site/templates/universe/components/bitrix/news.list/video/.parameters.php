<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock'))
    return;

$arTemplateParameters = array(
    "DISPLAY_FIRST_VIDEO" => Array(
        'PARENT' => 'DATA_SOURCE',
        "NAME" => GetMessage("T_IBLOCK_FIRST_VIDEO"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "N",
        "REFRESH" => "Y",
    ),
);
$iBlockProperty = array();
$properties = CIBlockProperty::GetList(Array("sort" => "asc"), Array("ACTIVE" => "Y", "IBLOCK_ID" => $arCurrentValues["IBLOCK_ID"]));

while ($propFields = $properties->GetNext()) {
    $iBlockProperty[$propFields["CODE"]] = '[' . $propFields["CODE"] . ']' . $propFields["NAME"];
}

$arTemplateParameters["IBLOCK_PROPERTY"] = array(
    'PARENT' => 'DATA_SOURCE',
    "NAME" => GetMessage("IBLOCK_PROPERTY"),
    "TYPE" => "LIST",
    'VALUES' => $iBlockProperty,
);

$arElement = array();
$arFilter = Array("IBLOCK_ID"=>$arCurrentValues["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), Array());

while($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arElement[$arFields['ID']] = $arFields['NAME'];
}

if ($arCurrentValues['DISPLAY_FIRST_VIDEO'] == "Y")
    $arTemplateParameters["IBLOCK_FIRST_VIDEO"] = array(
        'PARENT' => 'DATA_SOURCE',
        "NAME" => GetMessage("IBLOCK_FIRST_VIDEO"),
        "TYPE" => "LIST",
        'VALUES' => $arElement,
    );

$arTemplateParameters["IBLOCK_DISPLAY_VIDEO"] = array(
    'PARENT' => 'DATA_SOURCE',
    "NAME" => GetMessage("IBLOCK_DISPLAY_VIDEO"),
    "TYPE" => "LIST",
    'MULTIPLE' => 'Y',
    'VALUES' => $arElement,
);