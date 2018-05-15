<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\StringHelper;

if (!Loader::includeModule('intec.core') || !Loader::includeModule('iblock'))
    return;

$bBase = false;
if (Loader::includeModule('catalog'))
    $bBase = true;


/**
 * @var array $arParams
 * @var array $arResult
 */

$arResult['SHOW_COMPARE'] = $arParams['SHOW_COMPARE'] == 'Y';
$arResult['SHOW_BASKET'] = $arParams['SHOW_BASKET'] == 'Y';
$arResult['SHOW_DELAY'] = $arParams['SHOW_DELAY'] == 'Y' && $bBase;

$arResult['URL_COMPARE'] = StringHelper::replaceMacros(
    ArrayHelper::getValue($arParams, 'URL_COMPARE'),
    array('SITE_DIR' => SITE_DIR)
);
$arResult['URL_BASKET'] = StringHelper::replaceMacros(
    ArrayHelper::getValue($arParams, 'URL_BASKET'),
    array('SITE_DIR' => SITE_DIR)
);

$arResult['COMPARE_COUNT'] = 0;
$arResult['BASKET_COUNT'] = 0;
$arResult['DELAYED_COUNT'] = 0;


$compareItems = $_SESSION[$arParams['COMPARE_CODE']][$arParams['COMPARE_IBLOCK_ID']]['ITEMS'];
if (!empty($compareItems)) {
    $arResult['COMPARE_COUNT'] = count($compareItems);
}


if (Loader::includeModule('catalog') && Loader::includeModule('sale')) {
    require(__DIR__.'/modifiers/base.php');
} else if (Loader::includeModule('intec.startshop')) {
    require(__DIR__.'/modifiers/lite.php');

}