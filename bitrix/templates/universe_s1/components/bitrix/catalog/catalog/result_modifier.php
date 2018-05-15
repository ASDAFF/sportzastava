<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use Bitrix\Main\Loader;

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!Loader::includeModule('intec.core'))
    return;

if (!Loader::includeModule('iblock'))
    return;

$prefixPriceSort = 'catalog_PRICE_';
if (!Loader::includeModule('catalog') && Loader::includeModule('intec.startshop'))
    $prefixPriceSort = 'PROPERTY_STARTSHOP_PRICE_';

$arResult['PREFIX_PRICE_SORT'] = $prefixPriceSort;