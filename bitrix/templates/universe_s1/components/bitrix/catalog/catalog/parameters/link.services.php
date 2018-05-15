<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use intec\core\helpers\ArrayHelper;

/**
 * @var array $arTemplateParameters
 * @var array $arCurrentValues
 *
 * @var array $arIBlocksTypes
 * @var array $arIBlocks
 * @var array $arIBlocksByTypes
 * @var array $arProperties
 */

$sIBlockType = ArrayHelper::getValue($arCurrentValues, 'SERVICES_IBLOCK_TYPE');
$iIBlockId = ArrayHelper::getValue($arCurrentValues, 'SERVICES_IBLOCK_ID');

$arTemplateParameters['SERVICES_IBLOCK_TYPE'] = array(
    'PARENT' => 'BASE',
    'NAME' => Loc::getMessage('C_CATALOG_SERVICES_IBLOCK_TYPE'),
    'TYPE' => 'LIST',
    'VALUES' => $arIBlocksTypes,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);

if (!empty($sIBlockType)) {
    $arTemplateParameters['SERVICES_IBLOCK_ID'] = array(
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('C_CATALOG_SERVICES_IBLOCK_ID'),
        'TYPE' => 'LIST',
        'VALUES' => ArrayHelper::getValue($arIBlocksByTypes, $sIBlockType),
        'ADDITIONAL_VALUES' => 'Y',
        'REFRESH' => 'Y'
    );

    if (!empty($iIBlockId)) {
        $arTemplateParameters['PROPERTY_SERVICES'] = array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => Loc::getMessage('C_CATALOG_PROPERTY_SERVICES'),
            'TYPE' =>'LIST',
            'VALUES' => ArrayHelper::getValue($arProperties, 'ELEMENT'),
            'ADDITIONAL_VALUES' => 'Y'
        );

        $arIBlockProperties = array();
        $rsIBlockProperties = CIBlockProperty::GetList(array(), array(
            'IBLOCK_ID' => $iIBlockId
        ));

        while ($arProperty = $rsIBlockProperties->GetNext())
            if (!empty($arProperty['CODE']))
                if ($arProperty['PROPERTY_TYPE'] == 'N')
                    $arIBlockProperties[$arProperty['CODE']] = '['.$arProperty['CODE'].'] '.$arProperty['NAME'];

        $arTemplateParameters['SERVICES_PROPERTY_PRICE'] = array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => Loc::getMessage('C_CATALOG_SERVICES_PROPERTY_PRICE'),
            'TYPE' => 'LIST',
            'VALUES' => $arIBlockProperties,
            'ADDITIONAL_VALUES' => 'Y'
        );

        unset($arProperty);
        unset($rsIBlockProperties);
        unset($arIBlockProperties);
    }
}

unset($iIBlockId);
unset($sIBlockType);