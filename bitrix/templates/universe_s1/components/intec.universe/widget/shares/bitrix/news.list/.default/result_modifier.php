<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Type;

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!CModule::IncludeModule('iblock'))
    return;

if (!CModule::IncludeModule('intec.core'))
    return;

$sDateFormat = $arParams['ACTIVE_DATE_FORMAT'];

foreach ($arResult['ITEMS'] as &$arItem) {
    $sDateTo = $arItem['ACTIVE_TO'];
    $arItem['DISPLAY_ACTIVE_TO'] = '';

    if (!empty($sDateFormat) && !empty($sDateTo)) {
        $arItem['DISPLAY_ACTIVE_TO'] = CIBlockFormatProperties::DateFormat(
            $arParams['ACTIVE_DATE_FORMAT'],
            MakeTimeStamp(
                $sDateTo,
                CSite::GetDateFormat()
            )
        );
    }
}