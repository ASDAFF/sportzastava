<?php

use intec\core\helpers\JavaScript;

/**
 * @var array $arParams
 */

?>
<span class="quick-view" onclick="universe.components.show(
<?=JavaScript::toObject([
    "component" => 'bitrix:catalog.element',
    'template' => 'quick_view',
    'parameters' => [
        'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'PROPERTY_CODE' => $arParams['DETAIL_PROPERTY_CODE'],
        'BASKET_URL' => $arParams['BASKET_URL'],
        'CACHE_TYPE' => $arParams['CACHE_TYPE'],
        'CACHE_TIME' => $arParams['CACHE_TIME'],
        'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
        'SET_LAST_MODIFIED' => $arParams['SET_LAST_MODIFIED'],
        'PRICE_CODE' => $arParams['PRICE_CODE'],
        'USE_PRICE_COUNT' => $arParams['DETAIL_USE_PRICE_COUNT'],
        'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
        'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
        'PRICE_VAT_SHOW_VALUE' => $arParams['PRICE_VAT_SHOW_VALUE'],
        'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'] ? 'Y' : 'N',
        'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
        'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
        'OFFERS_FIELD_CODE' => $arParams['OFFERS_FIELD_CODE'],
        'OFFERS_PROPERTY_CODE' => $arParams['OFFERS_PROPERTY_CODE'],
        'OFFERS_SORT_FIELD' => $arParams['OFFERS_SORT_FIELD'],
        'OFFERS_SORT_ORDER' => $arParams['OFFERS_SORT_ORDER'],
        'OFFERS_SORT_FIELD2' => $arParams['OFFERS_SORT_FIELD2'],
        'OFFERS_SORT_ORDER2' => $arParams['OFFERS_SORT_ORDER2'],

        'ELEMENT_ID' => $arElement['ID'],
        'ELEMENT_CODE' => $arElement['CODE'],
        'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
        'CURRENCY_ID' => $arParams['CURRENCY_ID'],
        'USE_COMMON_CURRENCY' => $arParams['USE_COMMON_CURRENCY'],
        'CURRENCY' => $arParams['CURRENCY'],
        'HIDE_NOT_AVAILABLE' => 'Y',
        'SHOW_DEACTIVATED' => 'N',

        'DISPLAY_NAME' => "Y",
        'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'] ? "Y" : "N",
        'COMPARE_PATH' => $arParams["COMPARE_PATH"],
        'COMPARE_NAME' => $arParams['COMPARE_NAME'],
        'SET_VIEWED_IN_COMPONENT' => 'Y',

        'DETAIL_PICTURE_POPUP' => $arParams['AR_PARAMS']['DETAIL_PICTURE_POPUP'],
        'DETAIL_PICTURE_LOOP' => $arParams['AR_PARAMS']['DETAIL_PICTURE_LOOP'],

        'PROPERTY_BRAND' => $arParams['PROPERTY_BRAND'],
        'PROPERTY_IS_NEW' => $arParams['PROPERTY_IS_NEW'],
        'PROPERTY_IS_POPULAR' => $arParams['PROPERTY_IS_POPULAR'],
        'PROPERTY_IS_RECOMMENDATION' => $arParams['PROPERTY_IS_RECOMMENDATION'],
        'PROPERTY_MORE_PHOTO' => $arParams['PROPERTY_MORE_PHOTO'],
        'OFFERS_PROPERTY_MORE_PHOTO' => $arParams['OFFERS_PROPERTY_MORE_PHOTO'],

        'USE_FAST_ORDER' => $arParams['USE_FAST_ORDER'],
        'FAST_ORDER_TEMPLATE' => $arParams['FAST_ORDER_TEMPLATE'],
        'FAST_ORDER_TITLE' => $arParams['FAST_ORDER_TITLE'],
        'FAST_ORDER_SEND_BUTTON' => $arParams['FAST_ORDER_SEND_BUTTON'],
        'FAST_ORDER_SHOW_COMMENT' => $arParams['FAST_ORDER_SHOW_COMMENT'],
        'FAST_ORDER_PRICE_TYPE' => $arParams['FAST_ORDER_PRICE_TYPE'],
        'FAST_ORDER_DELIVERY_TYPE' => $arParams['FAST_ORDER_DELIVERY_TYPE'],
        'FAST_ORDER_PAYMET_TYPE' => $arParams['FAST_ORDER_PAYMET_TYPE'],
        'FAST_ORDER_PAYER_TYPE' => $arParams['FAST_ORDER_PAYER_TYPE'],
        'FAST_ORDER_SHOW_PROPERTIES' => $arParams['FAST_ORDER_SHOW_PROPERTIES'],
        'FAST_ORDER_PROPERTY_PHONE' => $arParams['FAST_ORDER_PROPERTY_PHONE'],
        'DETAIL_PAGE_URL' => $arElement["DETAIL_PAGE_URL"],
        'ORDER_PRODUCT_WEB_FORM' => $arParams['ORDER_PRODUCT_WEB_FORM'],
        'PROPERTY_FORM_ORDER_PRODUCT' => $arParams['PROPERTY_FORM_ORDER_PRODUCT'],
        'USE_BASKET' => $arParams['USE_BASKET'],
        'CONSENT_URL' => $arParams['CONSENT_URL'],
        'MESS_PRICE_RANGES_TITLE' => $arParams['MESS_PRICE_RANGES_TITLE'],
    ],
    'settings' => [
        'width' => 1150,
    ]
]);?>)
        ">
    <i class="intec-search-icon glyph-icon-loop"></i>
    <?= GetMessage("PRODUCT_QUICK_VIEW") ?>
</span>
