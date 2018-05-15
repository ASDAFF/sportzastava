<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use intec\core\helpers\ArrayHelper;

/**
 * @var array $arParams
 * @var array $arResult
 * CBitrixComponentTemplate $this
 */

if (!CModule::IncludeModule('intec.core'))
    return;

$arResult['VIEWS_LIST'] = array(
    'list',
    'blocks',
    'tile',
    'tile.2',
    'extend',
    'blocks.links'
);