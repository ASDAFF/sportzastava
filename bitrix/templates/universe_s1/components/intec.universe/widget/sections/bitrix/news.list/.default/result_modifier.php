<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\StringHelper;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

$arResult['COMPONENT_HASH'] = 'sections_'. spl_object_hash($this);

$arResult['DESKTOP_TEMPLATE'] = $arParams['DESKTOP_TEMPLATE'];
if (empty($arParams['DESKTOP_TEMPLATE'])) {
    $arResult['DESKTOP_TEMPLATE'] = 'puzzle';
}

$arResult['MOBILE_TEMPLATE'] = $arParams['MOBILE_TEMPLATE'];
if (empty($arParams['MOBILE_TEMPLATE'])) {
    $arResult['MOBILE_TEMPLATE'] = 'one_column';
}


$checkField = array(
    'LINK' => !empty($arParams['PROPERTY_LINK']),
    'TARGET' => !empty($arParams['PROPERTY_TARGET']),
    'SIZE' => !empty($arParams['PROPERTY_SIZE']),
    'STICKER' => !empty($arParams['PROPERTY_STICKER']),
    'SHOW_STICKER' => !empty($arParams['PROPERTY_SHOW_STICKER'])
);

$items = array();
foreach ($arResult['ITEMS'] as $k => $item) {
    $customData = array(
        'IMAGE' => '',
        'LINK' => null,
        'TARGET' => null,
        'SIZE' => 'small',
        'STICK' => null,
        'SHOW_STICK' => false
    );

    if ($checkField['LINK'] && !empty($item['PROPERTIES'][$arParams['PROPERTY_LINK']]['VALUE'])) {
        $customData['LINK'] = $item['PROPERTIES'][$arParams['PROPERTY_LINK']]['VALUE'];
        $customData['LINK'] = StringHelper::replaceMacros($customData['LINK'], [
            'SITE_DIR' => SITE_DIR
        ]);
    }

    if ($checkField['TARGET']
        && !empty($item['PROPERTIES'][$arParams['PROPERTY_TARGET']]['VALUE_XML_ID'])
        && $item['PROPERTIES'][$arParams['PROPERTY_TARGET']]['VALUE_XML_ID'] == 'Y'
    ) {
        $customData['TARGET'] = true;
    }

    if ($checkField['SIZE'] && !empty($item['PROPERTIES'][$arParams['PROPERTY_SIZE']]['VALUE_XML_ID'])) {
        $customData['SIZE'] = $item['PROPERTIES'][$arParams['PROPERTY_SIZE']]['VALUE_XML_ID'];
    }

    if ($checkField['SHOW_STICKER']
        && !empty($item['PROPERTIES'][$arParams['PROPERTY_SHOW_STICKER']]['VALUE_XML_ID'])
        && $item['PROPERTIES'][$arParams['PROPERTY_SHOW_STICKER']]['VALUE_XML_ID'] == 'Y'
    ) {
        $customData['SHOW_STICKER'] = true;
    }

    if ($checkField['STICKER'] && !empty($item['PROPERTIES'][$arParams['PROPERTY_STICKER']]['VALUE'])) {
        $customData['STICKER'] = $item['PROPERTIES'][$arParams['PROPERTY_STICKER']]['VALUE'];
    }

    if (!empty($item['PREVIEW_PICTURE']['SRC'])) {
        $customData['IMAGE'] = $item['PREVIEW_PICTURE']['SRC'];
    }

    $item['CUSTOM_DATA'] = $customData;

    if ($arParams['MAIN_ELEMENT'] == $item['ID']) { // Main item must be first and BIG
        $item['CUSTOM_DATA']['SIZE'] = 'big';
        $items[0] = $item;
    } else {
        $items[++$k] = $item;
    }
}
ksort($items);
$arResult['ITEMS'] = $items;
unset($items);