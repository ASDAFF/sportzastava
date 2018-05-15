<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use intec\core\helpers\ArrayHelper;
use intec\core\bitrix\Component;

global $arFilter;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

if (!CModule::IncludeModule('intec.core'))
    return;

$arResult = Component::SetElementProperties(
    $arResult,
    ArrayHelper::replaceKeys(
        array(
            'PROPERTY_READ_ALSO' => 'READ_ALSO'
        ),
        $arParams
    )
);

$arResult['DISPLAY_READ_ALSO'] = false;
$arResult['FILTER_NAME'] = 'arFilter';

if ($arParams['DISPLAY_READ_ALSO'] == 'Y') {
    $arReadAlso = ArrayHelper::getValue($arResult, ['SYSTEM_PROPERTIES', 'READ_ALSO', 'VALUE']);

    if (!empty($arReadAlso)) {
        $arResult['DISPLAY_READ_ALSO'] = true;
        $arFilter = array('ID' => $arReadAlso);
    }
}