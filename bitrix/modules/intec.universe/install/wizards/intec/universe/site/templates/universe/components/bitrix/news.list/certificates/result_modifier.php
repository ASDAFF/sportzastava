<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */


$arResult['COMPONENT_HASH'] = 'certificates_'. spl_object_hash($this);

if (empty($arParams['DESKTOP_TEMPLATE'])) {
    $arParams['DESKTOP_TEMPLATE'] = 'tiles_big';
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