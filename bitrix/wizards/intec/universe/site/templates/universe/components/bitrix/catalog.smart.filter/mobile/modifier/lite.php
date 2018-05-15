<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CStartShopTheme::ApplyTheme(SITE_ID);

if (!empty($arParams['PRICE_CODE'])) {
    foreach($arResult['ITEMS'] as $key=>$arItem) {
        if (in_array($arItem['CODE'], $arParams['PRICE_CODE'])) {
            $arResult['ITEMS'][$key]['PRICE'] = 1;
        }
    }
}