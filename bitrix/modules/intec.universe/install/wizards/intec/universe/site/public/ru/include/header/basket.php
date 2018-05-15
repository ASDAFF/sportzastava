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
        "COMPARE_IBLOCK_TYPE" => "#PRODUCTS_IBLOCK_TYPE#",
        "COMPARE_IBLOCK_ID" => "#PRODUCTS_IBLOCK_ID#",
        "WEB_FORM_ID" => "#FORMS_CALL_ID#",
        "SHOW_BASKET" => "Y",
        "SHOW_DELAYED" => "Y",
        "SHOW_FORM" => "Y",
        "SHOW_AUTH" => "Y",
        "SHOW_COMPARE" => "Y",
        "URL_CATALOG" => "#SITE_DIR#catalog/",
        "URL_BASKET" => "#SITE_DIR#personal/basket/",
        "URL_ORDER" => "#SITE_DIR#personal/basket/order.php",
        "URL_COMPARE" => "#SITE_DIR#catalog/compare.php",
        "URL_CABINET" => "#SITE_DIR#personal/profile/",
        "URL_CONSENT" => "#SITE_DIR#company/consent/",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "",
        "CACHE_NOTES" => ""
    ),
    false,
    array()
); ?>