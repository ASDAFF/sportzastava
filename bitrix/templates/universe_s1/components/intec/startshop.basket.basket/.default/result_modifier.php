<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!CModule::IncludeModule('intec.startshop'))
    return;


$arDefaultParams = array(
    'USE_ITEMS_PICTURES' => 'Y',
    'USE_BUTTON_CLEAR' => 'N',
    'USE_BUTTON_ORDER' => 'N',
    'USE_BUTTON_FAST_ORDER' => 'N',
    'USE_BUTTON_CONTINUE_SHOPPING' => 'N',
    'URL_ORDER' => '',
    'URL_CATALOG' => '',
    'USE_SUM_FIELD' => 'N',
    'USE_ADAPTABILITY' => 'N'
);

$arParams = array_merge($arDefaultParams, $arParams);

$arParams['USE_BUTTON_ORDER'] = $arParams['USE_BUTTON_ORDER'] == 'Y' && !empty($arParams['URL_ORDER']) ? 'Y' : 'N';
$arParams['USE_BUTTON_CONTINUE_SHOPPING'] = $arParams['USE_BUTTON_CONTINUE_SHOPPING'] == 'Y' && !empty($arParams['URL_CATALOG']) ? 'Y' : 'N';

if ($arParams['USE_ITEMS_PICTURES'] == 'Y') {
    foreach ($arResult['ITEMS'] as &$arItem) {
        $arItem['PICTURE'] = CStartShopToolsIBlock::GetItemPicture($arItem, 200, 200, true);

        if (empty($arItem['PICTURE']))
            $arItem['PICTURE']['SRC'] = $this->GetFolder() . '/images/image.empty.png';
    }
}