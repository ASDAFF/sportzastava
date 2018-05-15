<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * @var array $arParams
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 * @var array $bProductsValue
 * @var string $sHeaderProducts
 * @var string $sProductsIBlockType
 * @var string $sProductsIBlock
 * @var array $sProductsPriceCode
 * @var string $sProductsConvertCurrency
 */

$GLOBALS['arrFilter'] = array('ID' => $bProductsValue);

?>
<div class="related-products">
    <div class="service-caption">
        <?= $sHeaderProducts ?>
    </div>
    <div class="related-products-content">
        <?php $APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "small-products",
            array(
                "IBLOCK_TYPE" => $sProductsIBlockType,
                "IBLOCK_ID" => $sProductsIBlock,
                "SECTION_USER_FIELDS" => array(
                    0 => "",
                    1 => "",
                ),
                "SHOW_ALL_WO_SECTION" => "Y",
                "FILTER_NAME" => "arrFilter",
                "TITLE" => GetMessage("RECOMENDATIONS"),
                "PRICE_CODE" => $sProductsPriceCode,
                "CONVERT_CURRENCY" => $sProductsConvertCurrency,
                "CURRENCY_ID" => $sProductsCurrencyID,
                "COMPONENT_TEMPLATE" => "small",
                "SECTION_ID" => $_REQUEST["SECTION_ID"],
                "SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "CUSTOM_FILTER" => "",
                "HIDE_NOT_AVAILABLE" => "N",
                "HIDE_NOT_AVAILABLE_OFFERS" => "N",
                "ELEMENT_SORT_FIELD" => "sort",
                "ELEMENT_SORT_ORDER" => "asc",
                "ELEMENT_SORT_FIELD2" => "id",
                "ELEMENT_SORT_ORDER2" => "desc",
                "PAGE_ELEMENT_COUNT" => "18",
                "LINE_ELEMENT_COUNT" => "3",
                "PROPERTY_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "OFFERS_LIMIT" => "5",
                "BACKGROUND_IMAGE" => "-",
                "SECTION_URL" => "",
                "DETAIL_URL" => "",
                "SECTION_ID_VARIABLE" => "SECTION_ID",
                "SEF_MODE" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_GROUPS" => "Y",
                "SET_TITLE" => "N",
                "SET_BROWSER_TITLE" => "N",
                "BROWSER_TITLE" => "-",
                "SET_META_KEYWORDS" => "N",
                "META_KEYWORDS" => "-",
                "SET_META_DESCRIPTION" => "N",
                "META_DESCRIPTION" => "-",
                "SET_LAST_MODIFIED" => "N",
                "USE_MAIN_ELEMENT_SECTION" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "CACHE_FILTER" => "N",
                "ACTION_VARIABLE" => "action",
                "PRODUCT_ID_VARIABLE" => "id",
                "USE_PRICE_COUNT" => "N",
                "SHOW_PRICE_COUNT" => "1",
                "PRICE_VAT_INCLUDE" => "Y",
                "BASKET_URL" => "/personal/basket/",
                "USE_PRODUCT_QUANTITY" => "N",
                "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                "ADD_PROPERTIES_TO_BASKET" => "Y",
                "PRODUCT_PROPS_VARIABLE" => "prop",
                "PARTIAL_PRODUCT_PROPERTIES" => "N",
                "PRODUCT_PROPERTIES" => array(
                ),
                "DISPLAY_COMPARE" => "N",
                "PAGER_TEMPLATE" => ".default",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "PAGER_TITLE" => "Товары",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "SET_STATUS_404" => "N",
                "SHOW_404" => "N",
                "MESSAGE_404" => "",
                "COMPATIBLE_MODE" => "Y",
                "DISABLE_INIT_JS_IN_COMPONENT" => "N"
            ),
            $component
        ); ?>
    </div>
</div>
