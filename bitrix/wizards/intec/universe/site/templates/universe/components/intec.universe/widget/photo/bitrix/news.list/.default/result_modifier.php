<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */


$arResult['COMPONENT_HASH'] = 'gallery_'. spl_object_hash($this);

if (empty($arParams['COLUMNS_COUNT'])) {
    $arParams['COLUMNS_COUNT'] = 1;
}
if (empty($arParams['ROWS_COUNT'])) {
    $arParams['ROWS_COUNT'] = 1;
}
$arResult['ITEMS_IN_SLIDE'] = $arParams['COLUMNS_COUNT'] * $arParams['ROWS_COUNT'];
$arResult['SLIDES_COUNT'] = ceil(count($arResult['ITEMS']) / $arResult['ITEMS_IN_SLIDE']);

$arResult['LIST_URL'] = str_replace('#SITE_DIR#', rtrim(SITE_DIR, '/'), $arParams['LIST_URL']);
$arResult['SHOW_DETAIL_LINK'] = $arParams['SHOW_DETAIL_LINK'] == 'Y' && $arResult['LIST_URL'];

$arResult['SHOW_TITLE'] = $arParams['SHOW_TITLE'] == 'Y' && $arParams['TITLE'];

$arResult['USE_CAROUSEL'] = $arParams['USE_CAROUSEL'] == 'Y' && $arResult['SLIDES_COUNT'] > 1;

$arResult['ITEM_WIDTH'] = null;
if (!empty($arParams['COLUMNS_COUNT'])) {
    $arResult['ITEM_WIDTH'] = round(100 / $arParams['COLUMNS_COUNT'], 1, PHP_ROUND_HALF_DOWN) .'%';
}


foreach ($arResult['ITEMS'] as $k => &$item) {
    $customData = array(
        'PREVIEW_IMAGE' => '',
        'DETAIL_IMAGE' => ''
    );

    if (!empty($item['PREVIEW_PICTURE']['SRC'])) {
        $customData['PREVIEW_IMAGE'] = $item['PREVIEW_PICTURE']['SRC'];
    }

    if (!empty($item['DETAIL_PICTURE']['SRC'])) {
        $customData['DETAIL_IMAGE'] = $item['DETAIL_PICTURE']['SRC'];
    }

    if (!$customData && !$customData) {
        unset($arResult['ITEMS'][$k]);
        continue;
    }

    if (empty($customData['DETAIL_IMAGE']) && !empty($customData['PREVIEW_IMAGE'])) {
        $customData['DETAIL_IMAGE'] = $customData['PREVIEW_IMAGE'];
    }
    if (empty($customData['PREVIEW_IMAGE']) && !empty($customData['DETAIL_IMAGE'])) {
        $customData['PREVIEW_IMAGE'] = $customData['DETAIL_IMAGE'];
    }

    $item['CUSTOM_DATA'] = $customData;
}