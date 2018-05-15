<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/** @var array $arCurrentValues */

use Bitrix\Main\Loader;
use intec\core\helpers\Type;

if (!Loader::includeModule('intec.core'))
    return;

if (!Loader::includeModule('iblock'))
	return;

$arBlockTypes = CIBlockParameters::GetIBlockTypes();

$bCatalogDisplay = $arCurrentValues['CATALOG_DISPLAY'] == 'Y';
$sCatalogIBlockType = $arCurrentValues['CATALOG_IBLOCK_TYPE'];
$iCatalogIBlockId = $arCurrentValues['CATALOG_IBLOCK_ID'];
$iCatalogIBlockId = Type::toInteger($iCatalogIBlockId);
$sCatalogIBlockProperty = $arCurrentValues['CATALOG_IBLOCK_PROPERTY'];

$arTemplateParameters = array(
    'CATALOG_DISPLAY' => array(
        'PARENT' => 'DETAIL_SETTINGS',
        'NAME' => GetMessage('C_BRANDS_PARAMETERS_CATALOG_DISPLAY'),
        'TYPE' => 'CHECKBOX',
        'REFRESH' => 'Y'
    )
);

if ($bCatalogDisplay) {
    $arTemplateParameters['CATALOG_IBLOCK_TYPE'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('C_BRANDS_PARAMETERS_CATALOG_IBLOCK_TYPE'),
        'TYPE' => 'LIST',
        'VALUES' => $arBlockTypes,
        'REFRESH' => 'Y',
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arIBlocks = array();
    $rsIBlocks = CIBlock::GetList(array('SORT' => 'ASC'), array('TYPE' => $sCatalogIBlockType));

    while ($arIBlock = $rsIBlocks->Fetch())
        $arIBlocks[$arIBlock['ID']] = '[' . $arIBlock['ID'] . '] ' . $arIBlock['NAME'];

    $arTemplateParameters['CATALOG_IBLOCK_ID'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('C_BRANDS_PARAMETERS_CATALOG_IBLOCK_ID'),
        'TYPE' => 'LIST',
        'VALUES' => $arIBlocks,
        'REFRESH' => 'Y',
        'ADDITIONAL_VALUES' => 'Y'
    );

    if (!empty($iCatalogIBlockId)) {
        $arIBlockProperties = array();
        $rsIBlockProperties = CIBlockProperty::GetList(array('sort' => 'asc'), array(
            'ACTIVE' => 'Y',
            'IBLOCK_ID' => $iCatalogIBlockId
        ));

        while ($arIBlockProperty = $rsIBlockProperties->GetNext())
            if (!empty($arIBlockProperty['CODE']))
                $arIBlockProperties[$arIBlockProperty['CODE']] = '[' . $arIBlockProperty['CODE'] . '] ' . $arIBlockProperty['NAME'];

        $arTemplateParameters['CATALOG_IBLOCK_PROPERTY'] = array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('C_BRANDS_PARAMETERS_CATALOG_IBLOCK_PROPERTY'),
            'TYPE' => 'LIST',
            'VALUES' => $arIBlockProperties
        );
    }
}

if (!Loader::includeModule('catalog') && Loader::includeModule('intec.startshop'))
    include('parameters/lite.php');