<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!Loader::includeModule('intec.core'))
    return;

$iIBlockId = ArrayHelper::getValue($arParams, 'IBLOCK_ID');
$sDescription = CIBlock::GetArrayByID($iIBlockId, 'DESCRIPTION');
$arResult['DESCRIPTION'] = $sDescription;