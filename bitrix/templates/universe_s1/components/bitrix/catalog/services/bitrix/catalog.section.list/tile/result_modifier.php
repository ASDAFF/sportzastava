<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Type;

/**
 * @var array $arParams
 * @var array $arResult
 * CBitrixComponentTemplate $this
 */



$iLineCount = ArrayHelper::getValue($arParams, 'LINE_COUNT');
$iLineCount = Type::toInteger($iLineCount);
$iLineCount = ArrayHelper::fromRange([3, 4], $arParams['LINE_COUNT']);
$arParams['LINE_COUNT'] = $iLineCount;