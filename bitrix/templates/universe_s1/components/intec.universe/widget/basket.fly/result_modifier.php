<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\net\Url;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Type;
use intec\constructor\models\Build;

if (!Loader::includeModule('intec.core'))
    return;

if (!Loader::includeModule('iblock'))
    return;

/**
 * @global $APPLICATION
 * @global $USER
 * @var array $arParams
 * @var array $arResult
 */

$arParams = ArrayHelper::merge([
    'OPEN_AFTER_ADD' => 'N'
], $arParams);

if (
    Loader::includeModule('intec.constructor') ||
    Loader::includeModule('intec.constructorlite')
) {
    if (!defined('EDITOR')) {
        $build = Build::getCurrent();

        if (!empty($build)) {
            $page = $build->getPage();
            $properties = $page->getProperties();

            $property = ArrayHelper::getValue($arParams, 'OPEN_AFTER_ADD');

            if ($property == 'settings') {
                $property = $properties->get('show_flying_basket_when_add_product');
                $property = Type::toBoolean($property);
                $arParams['OPEN_AFTER_ADD'] = $property ? 'Y' : 'N';
            }
        }
    }
}

$arResult['COMPONENT_HASH'] = 'flying_basket_'. spl_object_hash($this);

$arParams['URL_CATALOG'] = str_replace('#SITE_DIR#', SITE_DIR, $arParams['URL_CATALOG']);
$arParams['URL_BASKET'] = str_replace('#SITE_DIR#', SITE_DIR, $arParams['URL_BASKET']);
$arParams['URL_ORDER'] = str_replace('#SITE_DIR#', SITE_DIR, $arParams['URL_ORDER']);
$arParams['URL_COMPARE'] = str_replace('#SITE_DIR#', SITE_DIR, $arParams['URL_COMPARE']);
$arParams['URL_CABINET'] = str_replace('#SITE_DIR#', SITE_DIR, $arParams['URL_CABINET']);

$arParams['IS_OPENED'] = !(empty($arParams['IS_OPENED']) || $arParams['IS_OPENED'] == 'N');
$arParams['ACTIVE_TAB'] = ArrayHelper::getValue($arParams, 'ACTIVE_TAB', '');

$delayedUrl = new Url($arParams['URL_BASKET']);
$delayedUrl->getQuery()->setRange(['delay' => 'y']);
$arResult['URL_DELAYED'] = $delayedUrl->build();
unset($delayedUrl);

$arResult['SHOW_BLOCK'] = array(
    'BASKET' => $arParams['SHOW_BASKET'] == 'Y',
    'DELAYED' => $arParams['SHOW_DELAYED'] == 'Y',
    'COMPARE' => $arParams['SHOW_COMPARE'] == 'Y',
    'FORM' => $arParams['SHOW_FORM'] == 'Y',
    'AUTH' => $arParams['SHOW_AUTH'] == 'Y'
);

$arResult['CURRENCY'] = null;
$arResult['BASKET_ITEMS'] = [];
$arResult['BASKET_SUM'] = [
    'VALUE' => 0,
    'PRINT_VALUE' => 0
];
$arResult['DISCOUNT_BASKET_SUM'] = [
    'VALUE' => 0,
    'PRINT_VALUE' => 0
];
$arResult['DELAYED_ITEMS'] = [];
$arResult['WEB_FORM'] = null;

if (defined('EDITOR'))
    return;

if (Loader::includeModule('form')) {
    include(__DIR__.'/modifiers/base.form.php');
} else if (Loader::includeModule('intec.startshop')) {
    include(__DIR__.'/modifiers/lite.form.php');
}

if (Loader::includeModule('catalog')) {
    include(__DIR__.'/modifiers/base.php');
} else if (Loader::includeModule('intec.startshop')) {
    include(__DIR__.'/modifiers/lite.php');
}

$arResult['COMPARE_ITEMS'] = $_SESSION[$arParams['COMPARE_CODE']][$arParams['COMPARE_IBLOCK_ID']]['ITEMS'];
$arResult['COMPARE_ITEMS_COUNT'] = 0;
if (!empty($arResult['COMPARE_ITEMS'])) {
    $arResult['COMPARE_ITEMS_COUNT'] = count($arResult['COMPARE_ITEMS']);
}