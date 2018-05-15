<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
/**
 * @global CMain $APPLICATION
 */
?>
<?php $APPLICATION->IncludeComponent(
    'intec.universe:widget',
    'basket.fly',
    array(
        "OPEN_AFTER_ADD" => "settings",
        "COMPARE_CODE" => "compare",
        "COMPARE_IBLOCK_TYPE" => "catalogs",
        "COMPARE_IBLOCK_ID" => "38",
        "WEB_FORM_ID" => "8",
        "SHOW_BASKET" => "Y",
        "SHOW_DELAYED" => "Y",
        "SHOW_FORM" => "Y",
        "SHOW_AUTH" => "Y",
        "SHOW_COMPARE" => "Y",
        "URL_CATALOG" => "/catalog/",
        "URL_BASKET" => "/personal/basket/",
        "URL_ORDER" => "/personal/basket/order.php",
        "URL_COMPARE" => "/catalog/compare.php",
        "URL_CABINET" => "/personal/profile/",
        "URL_CONSENT" => "/company/consent/",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "",
        "CACHE_NOTES" => ""
    ),
    false,
    array()
); ?>