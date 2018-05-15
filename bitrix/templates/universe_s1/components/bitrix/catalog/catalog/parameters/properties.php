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

$arTemplateParameters['PROPERTY_PICTURES'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => Loc::getMessage('C_CATALOG_PROPERTY_PICTURES'),
    'TYPE' => 'LIST',
    'VALUES' => ArrayHelper::getValue($arProperties, 'FILE'),
    'ADDITIONAL_VALUES' => 'Y'
);

$arTemplateParameters['PROPERTY_ARTICLE'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => Loc::getMessage('C_CATALOG_PROPERTY_ARTICLE'),
    'TYPE' => 'LIST',
    'VALUES' => ArrayHelper::getValue($arProperties, 'STRING'),
    'ADDITIONAL_VALUES' => 'Y'
);

$arTemplateParameters['PROPERTY_BRAND'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => Loc::getMessage('C_CATALOG_PROPERTY_BRAND'),
    'TYPE' => 'LIST',
    'VALUES' => ArrayHelper::getValue($arProperties, 'ELEMENT'),
    'ADDITIONAL_VALUES' => 'Y'
);

$arTemplateParameters['PROPERTY_IS_NEW'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => Loc::getMessage('C_CATALOG_PROPERTY_IS_NEW'),
    'TYPE' => 'LIST',
    'VALUES' => ArrayHelper::getValue($arProperties, 'CHECKBOX'),
    'ADDITIONAL_VALUES' => 'Y'
);

$arTemplateParameters['PROPERTY_IS_POPULAR'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => Loc::getMessage('C_CATALOG_PROPERTY_IS_POPULAR'),
    'TYPE' => 'LIST',
    'VALUES' => ArrayHelper::getValue($arProperties, 'CHECKBOX'),
    'ADDITIONAL_VALUES' => 'Y'
);

$arTemplateParameters['PROPERTY_IS_RECOMMENDATION'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => Loc::getMessage('C_CATALOG_PROPERTY_IS_RECOMMENDATION'),
    'TYPE' => 'LIST',
    'VALUES' => ArrayHelper::getValue($arProperties, 'CHECKBOX'),
    'ADDITIONAL_VALUES' => 'Y'
);

$arTemplateParameters['PROPERTY_DOCUMENTS'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => Loc::getMessage('C_CATALOG_PROPERTY_DOCUMENTS'),
    'TYPE' => 'LIST',
    'VALUES' => ArrayHelper::getValue($arProperties, 'FILE'),
    'ADDITIONAL_VALUES' => 'Y'
);

$arTemplateParameters['PROPERTY_PRODUCTS_ASSOCIATED'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => Loc::getMessage('C_CATALOG_PROPERTY_PRODUCTS_ASSOCIATED'),
    'TYPE' => 'LIST',
    'VALUES' => ArrayHelper::getValue($arProperties, 'ELEMENT'),
    'ADDITIONAL_VALUES' => 'Y'
);

$arTemplateParameters['PROPERTY_PRODUCTS_RECOMMENDED'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => Loc::getMessage('C_CATALOG_PROPERTY_PRODUCTS_RECOMMENDED'),
    'TYPE' => 'LIST',
    'VALUES' => ArrayHelper::getValue($arProperties, 'ELEMENT'),
    'ADDITIONAL_VALUES' => 'Y'
);