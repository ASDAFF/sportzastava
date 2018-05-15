<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
/**
 * @global CMain $APPLICATION
 */
?>
<?php $APPLICATION->IncludeComponent(
    "intec.universe:widget",
    "footer",
    array(
        "COMPONENT_TEMPLATE" => "footer",
        "USE_GLOBAL_SETTINGS" => "Y",
        "FOOTER_DESIGN" => "TYPE_1",
        "FOOTER_BLACK" => "N",
        "FOOTER_PHONE" => "+7 (000) 000 00 00",
        "FOOTER_EMAIL" => "shop@example.com",
        "FOOTER_ADDRESS" => "г. Челябинск",
        "FOOTER_SHOW_FEEDBACK" => "Y",
        "FOOTER_SHOW_MENU" => "Y",
        "FOOTER_SHOW_SEARCH" => "Y",
        "FOOTER_SHOW_SOCIAL" => "Y",
        "FOOTER_COPYRIGHT_TEXT" => "&copy; #YEAR# Universe, Все права защищены",
        "FOOTER_LOGO" => "Y",
        "FOOTER_PAYSYSTEM" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "0",
        "FOOTER_SHOW_TEXT_BUTTON" => "Обратный звонок",
        "FOOTER_FORM_ID" => "8",
        "FOOTER_MENU" => "footer",
        "FOOTER_CHILD_MENU" => "",
        "FOOTER_SHOW_SEARCH_PATH" => "/search/",
        "FOOTER_VKONTACTE" => "https://vk.com/intecweb",
        "FOOTER_FACEBOOK" => "https://facebook.com/",
        "FOOTER_INSTAGRAM" => "https://www.instagram.com/intecweb.ru/",
        "FOOTER_TWITTER" => "http://vk.com",
        "FOOTER_PAYSYSTEM_TYPE" => "color",
        "FOOTER_ALFABANK" => "Y",
        "FOOTER_SBERBANK" => "Y",
        "FOOTER_YANDEX_MONEY" => "Y",
        "FOOTER_QIWI" => "Y",
        "FOOTER_VISA" => "Y",
        "FOOTER_MASTERCARD" => "Y",
        "CONSENT_URL" => "/company/consent/"
    ),
    false
); ?>