<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use intec\core\helpers\ArrayHelper;
use intec\constructor\models\Build;

/**
 * @global CMain $APPLICATION
 */

$properties = Build::getCurrent()->getPage()->getProperties();
$blocks = $properties->get('main_blocks');

if ($APPLICATION->GetCurPage(false) !== SITE_DIR || ArrayHelper::getValue($blocks, ['active', 'main_banner'], 'Y') !== 'Y')
    $blocks['templates']['main_banner'] = 1;

$blocks = $properties->set('main_blocks', $blocks);

?>
<?php $APPLICATION->IncludeComponent(
    "intec.universe:widget",
    "buttontop",
    array(
        "RADIUS" => "10",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "0"
    ),
    false
); ?>
<?php $APPLICATION->IncludeComponent(
    "intec.universe:widget",
    "header",
    array(
        "MENU_MAIN_ROOT_TYPE" => "top",
        "MENU_MAIN_MAX_LEVEL" => "4",
        "MENU_MAIN_CHILD_TYPE" => "left",
        "MENU_INFO_ROOT_TYPE" => "footer",
        "CATALOG_IBLOCK_TYPE" => "#PRODUCTS_IBLOCK_TYPE#",
        "CATALOG_IBLOCK_ID" => "#PRODUCTS_IBLOCK_ID#",
        "MENU_MAIN_DISPLAY" => "Y",
        "MENU_MAIN_DISPLAY_IN" => "default",
        "POPUP_MENU_BACKGROUND" => "",
        "FIXED_HEADER" => "settings",
        "FIXED_HEADER_MOBILE" => "settings",
        "MENU_CATALOG_LINK" => "#SITE_DIR#catalog/",
        "MENU_INFO_MAX_LEVEL" => "1",
        "MENU_INFO_CHILD_TYPE" => "footer",
        "MENU_INFO_DISPLAY" => "Y",
        "MENU_MOBILE_ROOT_TYPE" => "top",
        "MENU_MOBILE_MAX_LEVEL" => "4",
        "MENU_MOBILE_CHILD_TYPE" => "left",
        "MENU_PROPERTY_IMAGE" => "UF_IMAGE_MENU",
        "MENU_DEFAULT_VIEW" => "color",
        "MENU_SECTION_VIEW" => "with.images",
        "AUTH_DISPLAY" => "Y",
        "POSITION_AUTH" => "top",
        "HEADER_SHOW_SOCIAL" => "Y",
        "POSITION_HEADER_SOCIAL" => "default",
        "HEADER_VK" => "https://vk.com/intecweb",
        "HEADER_FACEBOOK" => "https://facebook.com/",
        "HEADER_INSTAGRAM" => "https://www.instagram.com/intecweb.ru/",
        "HEADER_TWITTER" => "https://twitter.com",
        "AUTH_MOBILE_DISPLAY" => "Y",
        "AUTH_MOBILE_PROFILE_DISPLAY" => "Y",
        "AUTH_MOBILE_LOGIN_DISPLAY" => "Y",
        "AUTH_MOBILE_LOGOUT_DISPLAY" => "Y",
        "LOGOTYPE_PATH" => "#SITE_DIR#include/logotype.php",
        "LOGOTYPE_MOBILE_PATH" => "#SITE_DIR#include/logotype.mobile.php",
        "TAGLINE_DISPLAY" => "Y",
        "TAGLINE" => "Universe это революция в мире интернет технологий",
        "POSITION_STICKERS" => "top_left",
        "LOCATION_DISPLAY" => "Y",
        "LOCATION" => "#SITE_ADDRESS#",
        "MAIL_DISPLAY" => "Y",
        "MAIL" => "#SITE_MAIL#",
        "PHONE_DISPLAY" => "Y",
        "PHONE_FORM" => "1",
        "PHONE_DISPLAY_IN" => "default",
        "PHONE_FORM_DISPLAY" => "",
        "PHONE_FORM_BUTTON_TYPE" => "",
        "PHONE" => array(
            "#SITE_PHONE#"
        ),
        "LOGIN_URL" => "#SITE_DIR#personal/profile/",
        "PROFILE_URL" => "#SITE_DIR#personal/profile/",
        "FORGOT_PASSWORD_URL" => "#SITE_DIR#personal/profile/?forgot_pass",
        "REGISTER_URL" => "#SITE_DIR#personal/profile/?register=yes",
        "BASKET_URL" => "#SITE_DIR#personal/basket/",
        "COMPARE_URL" => "#SITE_DIR#catalog/compare.php",
        "BASKET_DISPLAY" => "Y",
        "BASKET_MOBILE_DISPLAY" => "Y",
        "BASKET_DELAY_DISPLAY" => "Y",
        "COMPARE_DISPLAY" => "Y",
        "COMPARE_CODE" => "compare",
        "COMPARE_IBLOCK_TYPE" => "#PRODUCTS_IBLOCK_TYPE#",
        "COMPARE_IBLOCK_ID" => "#PRODUCTS_IBLOCK_ID#",
        "MOBILE_VIEW" => "settings",
        "MOBILE_LOGOTYPE_CENTERED" => "Y",
        "DISPLAY_SEARCH" => "Y",
        "DISPLAY_SEARCH_MOBILE" => "N",
        "TYPE_SEARCH" => "popup",
        "SEARCH_PAGE" => "#SITE_DIR#search/index.php",
        "POSITION_SEARCH" => "",
        "COMPONENT_TEMPLATE" => "header",
        "SEARCH_TOP_COUNT" => "5",
        "SEARCH_ORDER" => "date",
        "SEARCH_USE_LANGUAGE_GUESS" => "Y",
        "SEARCH_CHECK_DATES" => "N",
        "SEARCH_SHOW_OTHERS" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "0",
        "SEARCH_arrFILTER"  => array(
            0 => "no",
        ),
        "SEARCH_CATEGORY_0_TITLE" => "",
        "SEARCH_CATEGORY_0" => array(
        ),
        "SEARCH_SHOW_INPUT" => "Y",
        "SEARCH_INPUT_ID" => "title-search-input",
        "SEARCH_CONTAINER_ID" => "title-search",
        "SEARCH_PRICE_CODE" => array(
            0 => "BASE",
        ),
        "SEARCH_PRICE_VAT_INCLUDE" => "Y",
        "SEARCH_CONVERT_CURRENCY" => "N",
        "WITH_BANNER" => "GLOBAL",
        "BANNER_IBLOCK_TYPE" => "#BANNERS_IBLOCK_TYPE#",
        "BANNER_IBLOCK_ID" => "#BANNERS_IBLOCK_ID#",
        "BANNER_SLIDER_COUNT" => "4",
        "BANNER_ACTIVE_ELEMENTS" => "Y",
        "BANNER_PROPERTY_TITLE" => "HEADER",
        "BANNER_PROPERTY_TITLE_COLOR" => "TITLE_TEXT_COLOR",
        "BANNER_PROPERTY_DESCRIPTION" => "DESCRIPTION",
        "BANNER_PROPERTY_DESCRIPTION_COLOR" => "DESCRIPTION_TEXT_COLOR",
        "BANNER_PROPERTY_LINK" => "LINK",
        "BANNER_PROPERTY_BLANK" => "NEW_TAB",
        "BANNER_PROPERTY_BUTTON_SHOW" => "BUTTON_SHOW",
        "BANNER_PROPERTY_BUTTON_TEXT" => "BUTTON_TEXT",
        "BANNER_PROPERTY_BUTTON_TEXT_COLOR" => "BUTTON_TEXT_COLOR",
        "BANNER_PROPERTY_BUTTON_COLOR" => "BUTTON_COLOR",
        "BANNER_PROPERTY_TEXT_POSITION" => "POSITION",
        "BANNER_PROPERTY_IMAGE" => "BANNER_IMG",
        "BANNER_PROPERTY_IMAGE_POSITION" => "BANNER_IMG_POSITION",
        "BANNER_PROPERTY_BANNER_COLOR" => "BANNER_COLOR",
        "BANNER_PROPERTY_AUTOPLAY" => "N",
        "BANNER_PROPERTY_AUTOPLAY_DELAY" => "",
        "BANNER_PROPERTY_HEIGHT" => "",
        "CONSENT_URL" => "#SITE_DIR#company/consent/"
    ),
    false
); ?>