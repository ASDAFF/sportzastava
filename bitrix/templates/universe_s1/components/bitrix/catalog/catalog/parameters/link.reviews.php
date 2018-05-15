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

$sIBlockType = ArrayHelper::getValue($arCurrentValues, 'REVIEWS_IBLOCK_TYPE');
$iIBlockId = ArrayHelper::getValue($arCurrentValues, 'REVIEWS_IBLOCK_ID');

$arTemplateParameters['REVIEWS_IBLOCK_TYPE'] = array(
    'PARENT' => 'BASE',
    'NAME' => Loc::getMessage('C_CATALOG_REVIEWS_IBLOCK_TYPE'),
    'TYPE' => 'LIST',
    'VALUES' => $arIBlocksTypes,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);

if (!empty($sIBlockType)) {
    $arIBlockProperties = array();
    $rsIBlockProperties = CIBlockProperty::GetList(array(), array(
        'IBLOCK_ID' => $iIBlockId,
        'PROPERTY_TYPE' => 'E',
        'ACTIVE' => 'Y'
    ));

    while ($arIBlockProperty = $rsIBlockProperties->GetNext())
        if (!empty($arIBlockProperty['CODE']))
            $arIBlockProperties[$arIBlockProperty['CODE']] = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];

    unset($arIBlockProperty);
    unset($rsIBlockProperties);

    $arMailEvents = array();
    $rsMailEvents = CEventType::GetList(array(
        'TYPE_ID' => 'WF_NEW_IBLOCK_ELEMENT'
    ));

    while ($arMailEvent = $rsMailEvents->GetNext())
        $arMailEvents[$arMailEvent['CODE']] = '['.$arMailEvent['CODE'].'] '.$arMailEvent['NAME'];

    unset($arMailEvent);
    unset($rsMailEvents);

    $arTemplateParameters['REVIEWS_IBLOCK_ID'] = array(
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('C_CATALOG_REVIEWS_IBLOCK_ID'),
        'TYPE' => 'LIST',
        'VALUES' => ArrayHelper::getValue($arIBlocksByTypes, $sIBlockType),
        'ADDITIONAL_VALUES' => 'Y',
        'REFRESH' => 'Y'
    );

    $arTemplateParameters['REVIEWS_PROPERTY_LINK'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => Loc::getMessage('C_CATALOG_REVIEWS_PROPERTY_LINK'),
        'TYPE' => 'LIST',
        'VALUES' => $arIBlockProperties,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['REVIEWS_MAIL_EVENT'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => Loc::getMessage('C_CATALOG_REVIEWS_MAIL_EVENT'),
        'TYPE' => 'LIST',
        'VALUES' => $arMailEvents,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['REVIEWS_CAPTCHA_USE'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => Loc::getMessage('C_CATALOG_REVIEWS_CAPTCHA_USE'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    );

    unset($arMailEvents);
    unset($arIBlockProperties);
}

unset($iIBlockId);
unset($sIBlockType);