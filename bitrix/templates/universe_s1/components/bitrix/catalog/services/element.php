<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\constructor\models\Build;

/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 */

$this->setFrameMode(true);

$oBuild = Build::getCurrent();
if (!empty($oBuild)) {
    $oPage = $oBuild->getPage();
    $oProperties = $oPage->getProperties();

    if ($arParams['TYPE_BANNER'] == 'settings') {
        switch ($oProperties->get('template_service_page')) {
            case 'default':
                $arParams['TYPE_BANNER'] = '1';
                $arParams['TYPE_BANNER_WIDE'] = 'N';
                break;
            case 'big_image':
                $arParams['TYPE_BANNER'] = '1';
                $arParams['TYPE_BANNER_WIDE'] = 'Y';
                break;
            case 'small_image':
                $arParams['TYPE_BANNER'] = '2';
                $arParams['TYPE_BANNER_WIDE'] = 'N';
                break;
            case 'without_text':
                $arParams['TYPE_BANNER'] = '3';
                $arParams['TYPE_BANNER_WIDE'] = 'N';
                break;
            case 'without_price_and_button':
                $arParams['TYPE_BANNER'] = '4';
                $arParams['TYPE_BANNER_WIDE'] = 'N';
                break;
        }
    }
}
?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:catalog.element',
    '',
    array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
        "META_KEYWORDS" => $arParams["DETAIL_META_KEYWORDS"],
        "META_DESCRIPTION" => $arParams["DETAIL_META_DESCRIPTION"],
        "BROWSER_TITLE" => $arParams["DETAIL_BROWSER_TITLE"],
        "SET_CANONICAL_URL" =>'N',
        "BASKET_URL" => null,
        "ACTION_VARIABLE" => null,
        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
        "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
        "CHECK_SECTION_ID_VARIABLE" => (isset($arParams["DETAIL_CHECK_SECTION_ID_VARIABLE"]) ? $arParams["DETAIL_CHECK_SECTION_ID_VARIABLE"] : ''),
        "PRODUCT_QUANTITY_VARIABLE" => null,
        "PRODUCT_PROPS_VARIABLE" => null,
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
        "MESSAGE_404" => $arParams["MESSAGE_404"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "SHOW_404" => $arParams["SHOW_404"],
        "FILE_404" => $arParams["FILE_404"],
        "PRICE_CODE" => $arParams['PRICE_CODE'],
        "USE_PRICE_COUNT" => 'N',
        "SHOW_PRICE_COUNT" => 'N',
        "PRICE_VAT_INCLUDE" => 'N',
        "PRICE_VAT_SHOW_VALUE" => 'N',
        "USE_PRODUCT_QUANTITY" => 'N',
        "PRODUCT_PROPERTIES" => array(),
        "ADD_PROPERTIES_TO_BASKET" => 'N',
        "PARTIAL_PRODUCT_PROPERTIES" => null,
        "LINK_IBLOCK_TYPE" => $arParams["LINK_IBLOCK_TYPE"],
        "LINK_IBLOCK_ID" => $arParams["LINK_IBLOCK_ID"],
        "LINK_PROPERTY_SID" => $arParams["LINK_PROPERTY_SID"],
        "LINK_ELEMENTS_URL" => $arParams["LINK_ELEMENTS_URL"],

        "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
        "OFFERS_FIELD_CODE" => $arParams["DETAIL_OFFERS_FIELD_CODE"],
        "OFFERS_PROPERTY_CODE" => $arParams["DETAIL_OFFERS_PROPERTY_CODE"],
        "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
        "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
        "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
        "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],

        "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
        "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
        "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
        'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
        'CURRENCY_ID' => $arParams['CURRENCY_ID'],
        'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
        'USE_ELEMENT_COUNTER' => 'N',
        'SHOW_DEACTIVATED' => $arParams['SHOW_DEACTIVATED'],
        "USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],

        'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
        'PRODUCT_SUBSCRIPTION' => 'N',
        'SHOW_DISCOUNT_PERCENT' => 'N',
        'SHOW_OLD_PRICE' => 'N',
        'SHOW_MAX_QUANTITY' => 'N',
        'USE_VOTE_RATING' => 'N',
        'VOTE_DISPLAY_AS_RATING' => 'N',
        'USE_COMMENTS' => 'N',
        'BLOG_USE' => 'N',
        'VK_USE' => 'N',
        'FB_USE' => 'N',
        'BRAND_USE' => 'N',
        'DISPLAY_NAME' => (isset($arParams['DETAIL_DISPLAY_NAME']) ? $arParams['DETAIL_DISPLAY_NAME'] : ''),
        "ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : ''),
        "ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
        "DISPLAY_PREVIEW_TEXT_MODE" => (isset($arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE']) ? $arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE'] : ''),
        "DETAIL_PICTURE_MODE" => (isset($arParams['DETAIL_DETAIL_PICTURE_MODE']) ? $arParams['DETAIL_DETAIL_PICTURE_MODE'] : ''),
        'ADD_TO_BASKET_ACTION' => null,
        'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
        'DISPLAY_COMPARE' => 'N',
        'COMPARE_PATH' => null,
        'SHOW_BASIS_PRICE' => (isset($arParams['DETAIL_SHOW_BASIS_PRICE']) ? $arParams['DETAIL_SHOW_BASIS_PRICE'] : 'Y'),
        'BACKGROUND_IMAGE' => (isset($arParams['DETAIL_BACKGROUND_IMAGE']) ? $arParams['DETAIL_BACKGROUND_IMAGE'] : ''),
        'USE_REVIEW' => $arParams['USE_REVIEW'],
        'REVIEWS_IBLOCK_TYPE' => $arParams['REVIEWS_IBLOCK_TYPE'],
        'REVIEWS_IBLOCK_ID' => $arParams['REVIEWS_IBLOCK_ID'],
        'REVIEWS_COUNT' => $arParams['REVIEWS_COUNT'],
        'USE_SIMILAR_SERVICES' => $arParams['USE_SIMILAR_SERVICES'],
        "TYPE_BANNER" => $arParams["TYPE_BANNER"],
        "TYPE_BANNER_WIDE" => $arParams["TYPE_BANNER_WIDE"],
        "NAME_PROP_PROJECTS" => $arParams["NAME_PROP_PROJECTS"],
        "NAME_PROP_VIDEO" => $arParams["NAME_PROP_VIDEO"],
        "NAME_PROP_GALLERY" => $arParams["NAME_PROP_GALLERY"],
        "NAME_PROP_REVIEWS" => $arParams["NAME_PROP_REVIEWS"],
        "NAME_PROP_SERVICES" => $arParams["NAME_PROP_SERVICES"],
        "FEEDBACK" => $arParams["FEEDBACK"],
        "SERVICES" => $arParams["SERVICES"],
        "FEEDBACK_FORM_ID" => $arParams["FEEDBACK_FORM_ID"],
        "SERVICES_FORM_ID" => $arParams["SERVICES_FORM_ID"],
        "PROPERTY_FORM_ORDER_SERVICE" => $arParams["PROPERTY_FORM_ORDER_SERVICE"],
        "NAME_PROP_URL_VIDEO" => $arParams["NAME_PROP_URL_VIDEO"],
        "NAME_PROP_PRICE" => $arParams["NAME_PROP_PRICE"],
        "NAME_PROP_AUTOR_REVIEW" => $arParams["NAME_PROP_AUTOR_REVIEW"],
        "NAME_PROP_COMPANY_REVIEW" => $arParams["NAME_PROP_COMPANY_REVIEW"],
        'NAME_PROP_PRODUCTS' => $arParams['NAME_PROP_PRODUCTS'],
        'CATALOB_IBLOCK_TYPE' => $arParams['CATALOB_IBLOCK_TYPE'],
        'CATALOG_IBLOCK' => $arParams['CATALOG_IBLOCK'],
        'CONSENT_URL' => $arParams['CONSENT_URL']
    ),
    $component
); ?>
