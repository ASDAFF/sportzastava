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
$arParamsSearch["TYPE_SEARCH_FORM"] = $arParams['TYPE_SEARCH'];
$arParamsSearch['POSITION_SEARCH'] = $arParams['POSITION_SEARCH'];
?>
<?php
$APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	".default",
    $arParamsSearch,
	false
);?>