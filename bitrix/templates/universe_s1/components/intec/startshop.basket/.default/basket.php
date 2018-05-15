<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 */

global $APPLICATION;

$APPLICATION->IncludeComponent('intec:startshop.basket.basket', '.default', array(
        'USE_ADAPTABILITY' => $arParams['USE_ADAPTABILITY'],
        'CURRENCY' => $arParams['CURRENCY'],
        'REQUEST_VARIABLE_ACTION' => $arParams['REQUEST_VARIABLE_ACTION'],
        'REQUEST_VARIABLE_QUANTITY' => $arParams['REQUEST_VARIABLE_QUANTITY'],
        'REQUEST_VARIABLE_ITEM' => $arParams['REQUEST_VARIABLE_ITEM'],
        'USE_ITEMS_PICTURES' => $arParams['USE_ITEMS_PICTURES'],
        'USE_BUTTON_CLEAR' => $arParams['USE_BUTTON_CLEAR'],
        'USE_SUM_FIELD' => $arParams['USE_SUM_FIELD'],
        'USE_BUTTON_ORDER' => 'Y',
        'USE_BUTTON_FAST_ORDER' => $arParams['USE_BUTTON_FAST_ORDER'],
        'USE_BUTTON_CONTINUE_SHOPPING' => $arParams['USE_BUTTON_CONTINUE_SHOPPING'],
        'URL_ORDER' => $arResult['URL_ORDER'],
        'URL_CATALOG' => $arParams['URL_CATALOG'],
        'URL_BASKET_EMPTY' => $arParams['URL_BASKET_EMPTY'],
        'USE_FAST_ORDER' => $arParams['USE_FAST_ORDER'],
        'FAST_ORDER_TEMPLATE' => $arParams['FAST_ORDER_TEMPLATE'],
        'FAST_ORDER_SHOW_PROPERTIES' => $arParams['FAST_ORDER_SHOW_PROPERTIES'],
        'FAST_ORDER_DELIVERY' => $arParams['FAST_ORDER_DELIVERY'],
        'FAST_ORDER_PAYMENT' => $arParams['FAST_ORDER_PAYMENT'],
        'FAST_ORDER_TITLE' => $arParams['FAST_ORDER_TITLE'],
        'FAST_ORDER_SEND_BUTTON' => $arParams['FAST_ORDER_SEND_BUTTON'],
        'FAST_ORDER_SHOW_AGREEMENT' => $arParams['FAST_ORDER_SHOW_AGREEMENT'],
        'FAST_ORDER_URL_AGREEMENT' => $arParams['FAST_ORDER_URL_AGREEMENT'],
    ),
    $component
);
