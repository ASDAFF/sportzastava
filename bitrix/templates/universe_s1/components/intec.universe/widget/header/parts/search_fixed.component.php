<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?php
$arParamsSearch = array();

foreach ($arParams as $key=>$value) {
    if (preg_match("/^SEARCH_/", $key)) {
        $replacement = '';
        $new_key = preg_replace("/^SEARCH_/", $replacement, $key);
        $arParamsSearch[$new_key] = $value;
    }
}
$arParamsSearch["COMPONENT_TEMPLATE"] = ".default";
$arParamsSearch["NUM_CATEGORIES"] = 1;
if ($arParams['TYPE_SEARCH'] == 'popup' && $arParams['DISPLAY_SEARCH'] == 'Y') {
    $arParamsSearch["TYPE_SEARCH_FORM"] = 'fixed_without_container';
} else {
    $arParamsSearch["TYPE_SEARCH_FORM"] = 'fixed_with_container';
}

$arParamsSearch['POSITION_SEARCH'] = $arParams['POSITION_SEARCH'];

$arParamsSearch['INPUT_ID'] = "title-search-input";
$arParamsSearch['CONTAINER_ID'] = "title-search";
//$arParamsSearch['CATEGORY_0_iblock_catalogs'] = array(38);
//$arParamsSearch['CATEGORY_0'] = array("iblock_catalogs");
$arParamsSearch['ORDER'] = "rank";

?>
<?php
$APPLICATION->IncludeComponent(
    "bitrix:search.title",
    ".default",
    $arParamsSearch,
    false
);?>