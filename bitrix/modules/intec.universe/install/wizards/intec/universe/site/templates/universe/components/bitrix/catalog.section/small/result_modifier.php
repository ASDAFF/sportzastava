<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use intec\core\helpers\ArrayHelper;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!Loader::includeModule('intec.core'))
    return;

$sPriceFrom = Loc::getMessage('CR_PRICE_FROM');

if (Loader::includeModule('catalog')) {
    include('modifiers/base.php');
} else if (Loader::includeModule('intec.startshop')) {
    include('modifiers/lite.php');
}

$arResult['VIEW_PARAMETERS'] = [
    'TITLE' => ArrayHelper::getValue($arParams, 'TITLE')
];