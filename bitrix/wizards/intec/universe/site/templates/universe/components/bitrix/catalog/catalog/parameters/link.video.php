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

$sIBlockType = ArrayHelper::getValue($arCurrentValues, 'VIDEO_IBLOCK_TYPE');
$iIBlockId = ArrayHelper::getValue($arCurrentValues, 'VIDEO_IBLOCK_ID');

$arTemplateParameters['VIDEO_IBLOCK_TYPE'] = array(
    'PARENT' => 'BASE',
    'NAME' => Loc::getMessage('C_CATALOG_VIDEO_IBLOCK_TYPE'),
    'TYPE' => 'LIST',
    'VALUES' => $arIBlocksTypes,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);

if (!empty($sIBlockType)) {
    $arTemplateParameters['VIDEO_IBLOCK_ID'] = array(
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('C_CATALOG_VIDEO_IBLOCK_ID'),
        'TYPE' => 'LIST',
        'VALUES' => ArrayHelper::getValue($arIBlocksByTypes, $sIBlockType),
        'ADDITIONAL_VALUES' => 'Y',
        'REFRESH' => 'Y'
    );

    if (!empty($iIBlockId)) {
        $arTemplateParameters['PROPERTY_VIDEO'] = array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => Loc::getMessage('C_CATALOG_PROPERTY_VIDEO'),
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
                if ($arProperty['PROPERTY_TYPE'] == 'S')
                    $arIBlockProperties[$arProperty['CODE']] = '['.$arProperty['CODE'].'] '.$arProperty['NAME'];

        $arTemplateParameters['VIDEO_PROPERTY_LINK'] = array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => Loc::getMessage('C_CATALOG_VIDEO_PROPERTY_LINK'),
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