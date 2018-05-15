<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\StringHelper;
use intec\core\helpers\RegExp;
use intec\core\helpers\Type;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

if (!CModule::IncludeModule('intec.core'))
    return;

$sIBlockType = $arParams['IBLOCK_TYPE'];
$iIBlockId = $arParams['IBLOCK_ID'];

$arProperties = array(
    'PROPERTY_TITLE' => 'TITLE',
    'PROPERTY_DESCRIPTION' => 'DESCRIPTION',
    'PROPERTY_LINK' => 'LINK',
    'PROPERTY_LINK_TARGET' => 'LINK_TARGET',
    'PROPERTY_BUTTON_SHOW' => 'BUTTON_SHOW',
    'PROPERTY_BUTTON_TEXT' => 'BUTTON_TEXT',
    'PROPERTY_BUTTON_TEXT_COLOR' => 'BUTTON_TEXT_COLOR',
    'PROPERTY_BUTTON_COLOR' => 'BUTTON_COLOR',
);

foreach ($arResult['ITEMS'] as &$arItem) {
    $arItem['SYSTEM_PROPERTIES'] = [];

    foreach ($arProperties as $sPropertyKey => $sPropertyName) {
        $arItem['SYSTEM_PROPERTIES'][$sPropertyName] = null;

        $sPropertyParameter = ArrayHelper::getValue($arParams, $sPropertyKey);

        if (!empty($sPropertyParameter))
            if (ArrayHelper::keyExists($sPropertyParameter, $arItem['PROPERTIES'])) {
                $arProperty = ArrayHelper::getValue($arItem, ['PROPERTIES', $sPropertyParameter]);

                if ($sPropertyName == 'TITLE' || $sPropertyName == 'DESCRIPTION') {
                    $sValue = ArrayHelper::getValue($arProperty, 'VALUE');

                    if (Type::isArray($sValue)) {
                        $sType = ArrayHelper::getValue($sValue, 'TYPE');
                        $sValue = ArrayHelper::getValue($sValue, 'TEXT');

                        if ($sType == 'HTML') {
                            $sValue = Html::decode($sValue);
                        }
                    }

                    $arProperty['VALUE'] = $sValue;
                }

                $arItem['SYSTEM_PROPERTIES'][$sPropertyName] = $arProperty;
            }
    }
}