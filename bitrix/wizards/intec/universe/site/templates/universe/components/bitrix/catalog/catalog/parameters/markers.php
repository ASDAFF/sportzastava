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

$bQuantityMarkersUse = ArrayHelper::getValue($arCurrentValues, 'QUANTITY_MARKERS_USE') === 'Y';

$arTemplateParameters['QUANTITY_MARKERS_USE'] = array(
    'NAME' => Loc::getMessage('C_CATALOG_QUANTITY_MARKERS_USE'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N',
    'REFRESH' => 'Y'
);

if ($bQuantityMarkersUse) {
    $arTemplateParameters['QUANTITY_MARKER_MANY'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_QUANTITY_MARKERS_MANY'),
        'TYPE' => 'STRING'
    );
    $arTemplateParameters['QUANTITY_MARKER_FEW'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_QUANTITY_MARKERS_FEW'),
        'TYPE' => 'STRING'
    );
}