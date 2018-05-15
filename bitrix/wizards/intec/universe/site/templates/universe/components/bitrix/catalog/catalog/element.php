<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
use intec\Core;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\RegExp;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;
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

if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] == 'Y') {
	$basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? array($arParams['COMMON_ADD_TO_BASKET_ACTION']) : array();
} else {
	$basketAction = isset($arParams['DETAIL_ADD_TO_BASKET_ACTION']) ? $arParams['DETAIL_ADD_TO_BASKET_ACTION'] : array();
}

$isSidebar = $arParams['SIDEBAR_DETAIL_SHOW'] == 'Y' && !empty($arParams['SIDEBAR_PATH']);
$sView = ArrayHelper::getValue($arParams, 'DETAIL_VIEW');

$oBuild = Build::getCurrent();
$oProperties = null;
$bMenuDisplay = $arParams['MENU_DISPLAY_IN_ELEMENT'] == 'Y';

if (!empty($oBuild)) {
    $oPage = $oBuild->getPage();
    $oProperties = $oPage->getProperties();
}

if (!empty($oProperties)) {
    if ($sView == 'settings')
        $sView = $oProperties->get('template_catalog_product');

    if ($arParams['MENU_DISPLAY_IN_ELEMENT'] == 'settings') {
        $arMenuDisplayIn = $oProperties->get('menu_display_in');
        $sPath = '/' . Core::$app->request->getPathInfo();
        $sPath = RegExp::replaceBy('/^' . RegExp::escape(SITE_DIR) . '/', null, $sPath);
        $sPath = StringHelper::replace($sPath, [
            '/' => '.'
        ]);

        $sSection = null;

        if (Type::isArray($arMenuDisplayIn))
            foreach ($arMenuDisplayIn as $sKey => $arValue)
                if (RegExp::isMatchBy('/^'.RegExp::escape($sKey).'/', $sPath))
                    $sSection = $sKey;

        if (!empty($sSection)) {
            $sSection .= '.element';
            $bMenuDisplay = ArrayHelper::getValue($arMenuDisplayIn, [$sSection, 'display']) == 1;
        }

        unset($sSection);
    }

    if ($arParams['BASKET_USE'] == 'settings') {
        switch ($oProperties->get('use_basket')) {
            case 1:
                $arParams['BASKET_USE'] = 'Y';
                break;
            default:
                $arParams['BASKET_USE'] = 'N';
                break;
        }
    }
}

$sView = ArrayHelper::fromRange(array('tabless', 'tabs', 'tabs_bottom', 'tabs_right'), $sView);

?>
<div class="intec-content intec-content-visible">
    <div class="intec-content-wrapper">
        <? if ($bMenuDisplay) { ?>
            <div class="intec-content-left">
                <? $APPLICATION->IncludeComponent(
                    'bitrix:menu',
                    'vertical',
                    array(
                        'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                        'PROPERTY_IMAGE' => $arParams['PROPERTY_IMAGE'],
                        'PROPERTY_SHOW_HEADER_SUBMENU' => $arParams['SHOW_HEADER_SUBMENU'],
                        'ROOT_MENU_TYPE' => $arParams['MENU_TYPE_ROOT'],
                        'MENU_CACHE_TYPE' => 'N',
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MAX_LEVEL" => $arParams['MENU_MAX_LEVEL'],
                        "CHILD_MENU_TYPE" => $arParams['MENU_TYPE_CHILD'],
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N",
                        "HIDE_CATALOG" => "Y",
                        "COUNT_ITEMS_CATALOG" => "8",
                        'TYPE_SUBMENU' => $arParams['MENU_VIEW']
                    ),
                    $component
                ); ?>
            </div>
            <div class="intec-content-right">
                <div class="intec-content-right-wrapper">
        <? } ?>
        <div class="row">
            <div class="<?= $isSidebar ? 'col-md-9 col-sm-8' : 'col-xs-12' ?>">
        <? $ElementID = $APPLICATION->IncludeComponent(
            'bitrix:catalog.element',
            '',
            array(
                'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                'PROPERTY_CODE' => $arParams['DETAIL_PROPERTY_CODE'],
                'META_KEYWORDS' => $arParams['DETAIL_META_KEYWORDS'],
                'META_DESCRIPTION' => $arParams['DETAIL_META_DESCRIPTION'],
                'BROWSER_TITLE' => $arParams['DETAIL_BROWSER_TITLE'],
                'SET_CANONICAL_URL' => $arParams['DETAIL_SET_CANONICAL_URL'],
                'BASKET_URL' => $arParams['BASKET_URL'],
                'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
                'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
                'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],
                'CHECK_SECTION_ID_VARIABLE' => (isset($arParams['DETAIL_CHECK_SECTION_ID_VARIABLE']) ? $arParams['DETAIL_CHECK_SECTION_ID_VARIABLE'] : ''),
                'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
                'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
                'DESCRIPTION_SHOW' => $arParams['DETAIL_DESCRIPTION_SHOW'],
                'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                'CACHE_TIME' => $arParams['CACHE_TIME'],
                'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                'SET_TITLE' => $arParams['SET_TITLE'],
                'SET_LAST_MODIFIED' => $arParams['SET_LAST_MODIFIED'],
                'MESSAGE_404' => $arParams['MESSAGE_404'],
                'SET_STATUS_404' => $arParams['SET_STATUS_404'],
                'SHOW_404' => $arParams['SHOW_404'],
                'FILE_404' => $arParams['FILE_404'],
                'PRICE_CODE' => $arParams['PRICE_CODE'],
                'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
                'MESS_PRICE_RANGES_TITLE' => $arParams['MESS_PRICE_RANGES_TITLE'],
                'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
                'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
                'PRICE_VAT_SHOW_VALUE' => $arParams['PRICE_VAT_SHOW_VALUE'],
                'USE_PRODUCT_QUANTITY' => $arParams['DETAIL_COUNTER_SHOW'],
                'PRODUCT_PROPERTIES' => $arParams['PRODUCT_PROPERTIES'],
                'ADD_PROPERTIES_TO_BASKET' => (isset($arParams['ADD_PROPERTIES_TO_BASKET']) ? $arParams['ADD_PROPERTIES_TO_BASKET'] : ''),
                'PARTIAL_PRODUCT_PROPERTIES' => (isset($arParams['PARTIAL_PRODUCT_PROPERTIES']) ? $arParams['PARTIAL_PRODUCT_PROPERTIES'] : ''),
                'LINK_IBLOCK_TYPE' => $arParams['LINK_IBLOCK_TYPE'],
                'LINK_IBLOCK_ID' => $arParams['LINK_IBLOCK_ID'],
                'LINK_PROPERTY_SID' => $arParams['LINK_PROPERTY_SID'],
                'LINK_ELEMENTS_URL' => $arParams['LINK_ELEMENTS_URL'],

                'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
                'OFFERS_FIELD_CODE' => $arParams['DETAIL_OFFERS_FIELD_CODE'],
                'OFFERS_PROPERTY_CODE' => $arParams['DETAIL_OFFERS_PROPERTY_CODE'],
                'OFFERS_SORT_FIELD' => $arParams['OFFERS_SORT_FIELD'],
                'OFFERS_SORT_ORDER' => $arParams['OFFERS_SORT_ORDER'],
                'OFFERS_SORT_FIELD2' => $arParams['OFFERS_SORT_FIELD2'],
                'OFFERS_SORT_ORDER2' => $arParams['OFFERS_SORT_ORDER2'],

                'ELEMENT_ID' => $arResult['VARIABLES']['ELEMENT_ID'],
                'ELEMENT_CODE' => $arResult['VARIABLES']['ELEMENT_CODE'],
                'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
                'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
                'SECTION_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
                'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['element'],
                'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                'HIDE_NOT_AVAILABLE' => $arParams['HIDE_NOT_AVAILABLE'],
                'SHOW_DEACTIVATED' => $arParams['SHOW_DEACTIVATED'],
                'USE_MAIN_ELEMENT_SECTION' => $arParams['USE_MAIN_ELEMENT_SECTION'],

                'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
                'LABEL_PROP' => $arParams['LABEL_PROP'],
                'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
                'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
                'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
                'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
                'SHOW_OLD_PRICE' => 'Y',
                'SHOW_MAX_QUANTITY' => $arParams['DETAIL_QUANTITY_SHOW'],
                'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
                'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
                'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
                'MESS_BTN_COMPARE' => $arParams['MESS_BTN_COMPARE'],
                'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],
                'USE_VOTE_RATING' => $arParams['DETAIL_USE_VOTE_RATING'],
                'VOTE_DISPLAY_AS_RATING' => (isset($arParams['DETAIL_VOTE_DISPLAY_AS_RATING']) ? $arParams['DETAIL_VOTE_DISPLAY_AS_RATING'] : ''),
                'USE_COMMENTS' => $arParams['DETAIL_USE_COMMENTS'],
                'BLOG_USE' => (isset($arParams['DETAIL_BLOG_USE']) ? $arParams['DETAIL_BLOG_USE'] : ''),
                'BLOG_URL' => (isset($arParams['DETAIL_BLOG_URL']) ? $arParams['DETAIL_BLOG_URL'] : ''),
                'BLOG_EMAIL_NOTIFY' => (isset($arParams['DETAIL_BLOG_EMAIL_NOTIFY']) ? $arParams['DETAIL_BLOG_EMAIL_NOTIFY'] : ''),
                'VK_USE' => (isset($arParams['DETAIL_VK_USE']) ? $arParams['DETAIL_VK_USE'] : ''),
                'VK_API_ID' => (isset($arParams['DETAIL_VK_API_ID']) ? $arParams['DETAIL_VK_API_ID'] : 'API_ID'),
                'FB_USE' => (isset($arParams['DETAIL_FB_USE']) ? $arParams['DETAIL_FB_USE'] : ''),
                'FB_APP_ID' => (isset($arParams['DETAIL_FB_APP_ID']) ? $arParams['DETAIL_FB_APP_ID'] : ''),
                'BRAND_USE' => (isset($arParams['DETAIL_BRAND_USE']) ? $arParams['DETAIL_BRAND_USE'] : 'N'),
                'BRAND_PROP_CODE' => (isset($arParams['DETAIL_BRAND_PROP_CODE']) ? $arParams['DETAIL_BRAND_PROP_CODE'] : ''),
                'DISPLAY_NAME' => (isset($arParams['DETAIL_DISPLAY_NAME']) ? $arParams['DETAIL_DISPLAY_NAME'] : ''),
                'ADD_DETAIL_TO_SLIDER' => (isset($arParams['DETAIL_ADD_DETAIL_TO_SLIDER']) ? $arParams['DETAIL_ADD_DETAIL_TO_SLIDER'] : ''),
                'ADD_SECTIONS_CHAIN' => (isset($arParams['ADD_SECTIONS_CHAIN']) ? $arParams['ADD_SECTIONS_CHAIN'] : ''),
                'ADD_ELEMENT_CHAIN' => (isset($arParams['ADD_ELEMENT_CHAIN']) ? $arParams['ADD_ELEMENT_CHAIN'] : ''),
                'DISPLAY_PREVIEW_TEXT_MODE' => (isset($arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE']) ? $arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE'] : ''),
                'ADD_TO_BASKET_ACTION' => $basketAction,
                'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
                'DISPLAY_COMPARE' => (isset($arParams['USE_COMPARE']) ? $arParams['USE_COMPARE'] : ''),
                'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
                'COMPARE_NAME' => $arParams['COMPARE_NAME'],
                'SHOW_BASIS_PRICE' => (isset($arParams['DETAIL_SHOW_BASIS_PRICE']) ? $arParams['DETAIL_SHOW_BASIS_PRICE'] : 'Y'),
                'BACKGROUND_IMAGE' => (isset($arParams['DETAIL_BACKGROUND_IMAGE']) ? $arParams['DETAIL_BACKGROUND_IMAGE'] : ''),
                'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : ''),
                'SET_VIEWED_IN_COMPONENT' => (isset($arParams['DETAIL_SET_VIEWED_IN_COMPONENT']) ? $arParams['DETAIL_SET_VIEWED_IN_COMPONENT'] : ''),

                'USE_GIFTS_DETAIL' => $arParams['USE_GIFTS_DETAIL']?: 'Y',
                'USE_GIFTS_MAIN_PR_SECTION_LIST' => $arParams['USE_GIFTS_MAIN_PR_SECTION_LIST']?: 'Y',
                'GIFTS_SHOW_DISCOUNT_PERCENT' => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
                'GIFTS_SHOW_OLD_PRICE' => $arParams['GIFTS_SHOW_OLD_PRICE'],
                'GIFTS_DETAIL_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],
                'GIFTS_DETAIL_HIDE_BLOCK_TITLE' => $arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE'],
                'GIFTS_DETAIL_TEXT_LABEL_GIFT' => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],
                'GIFTS_DETAIL_BLOCK_TITLE' => $arParams["GIFTS_DETAIL_BLOCK_TITLE"],
                'GIFTS_SHOW_NAME' => $arParams['GIFTS_SHOW_NAME'],
                'GIFTS_SHOW_IMAGE' => $arParams['GIFTS_SHOW_IMAGE'],
                'GIFTS_MESS_BTN_BUY' => $arParams['GIFTS_MESS_BTN_BUY'],

                'GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
                'GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'],

                'OFFERS_PROPERTIES_MODE' => $arParams['OFFERS_PROPERTIES_MODE'],
                'DETAIL_PICTURE_POPUP' => $arParams['DETAIL_PICTURE_POPUP'],
                'DETAIL_PICTURE_LOOP' => $arParams['DETAIL_PICTURE_LOOP'],
                'DETAIL_VIEW' => $sView,
                'REVIEWS_IBLOCK_TYPE' => $arParams['REVIEWS_IBLOCK_TYPE'],
                'REVIEWS_IBLOCK' => $arParams['REVIEWS_IBLOCK_ID'],
                'REVIEWS_PROPERTY_ELEMENT_ID' => $arParams['REVIEWS_PROPERTY_LINK'],
                'REVIEWS_MAIL_EVENT' => $arParams['REVIEWS_MAIL_EVENT'],
                'REVIEWS_USE_CAPTCHA' => $arParams['REVIEWS_CAPTCHA_USE'],
                'FEEDBACK_FORM_SHOW' => $arParams['FEEDBACK_FORM_SHOW'],
                'FEEDBACK_FORM_ID' => $arParams['FEEDBACK_FORM_ID'],
                'FEEDBACK_FORM_TEXT' => $arParams['FEEDBACK_FORM_TEXT'],
                'PROPERTY_ARTICLE' => $arParams['PROPERTY_ARTICLE'],
                'PROPERTY_BRAND' => $arParams['PROPERTY_BRAND'],
                'PROPERTY_VIDEO' => $arParams['PROPERTY_VIDEO'],
                'PROPERTY_DOCUMENTS' => $arParams['PROPERTY_DOCUMENTS'],
                'PROPERTY_BUYING' => $arParams['PROPERTY_PRODUCTS_ASSOCIATED'],
                'PROPERTY_RECOMENDATIONS' => $arParams['PROPERTY_PRODUCTS_RECOMMENDED'],
                'PROPERTY_IS_NEW' => $arParams['PROPERTY_IS_NEW'],
                'PROPERTY_IS_POPULAR' => $arParams['PROPERTY_IS_POPULAR'],
                'PROPERTY_IS_RECOMMENDATION' => $arParams['PROPERTY_IS_RECOMMENDATION'],
                'PROPERTY_MORE_PHOTO' => $arParams['PROPERTY_PICTURES'],
                'VIDEO_IBLOCK_TYPE' => $arParams['VIDEO_IBLOCK_TYPE'],
                'VIDEO_IBLOCK_ID' => $arParams['VIDEO_IBLOCK_ID'],
                'VIDEO_IBLOCK_PROPERTY' => $arParams['VIDEO_PROPERTY_LINK'],
                'PROPERTY_OFFERS_MORE_PHOTO' => $arParams['OFFERS_PROPERTY_PICTURES'],

                'USE_FAST_ORDER' => $arParams['FAST_ORDER_USE'],
                'FAST_ORDER_TEMPLATE' => $arParams['FAST_ORDER_TEMPLATE'],
                'FAST_ORDER_TITLE' => $arParams['FAST_ORDER_TITLE'],
                'FAST_ORDER_SEND_BUTTON' => $arParams['FAST_ORDER_BUTTON'],
                'FAST_ORDER_SHOW_COMMENT' => $arParams['FAST_ORDER_COMMENT_SHOW'],
                'FAST_ORDER_PRICE_TYPE' => $arParams['FAST_ORDER_PRICE_TYPE'],
                'FAST_ORDER_DELIVERY_TYPE' => $arParams['FAST_ORDER_DELIVERY'],
                'FAST_ORDER_PAYMET_TYPE' => $arParams['FAST_ORDER_PAYMENT'],
                'FAST_ORDER_PAYER_TYPE' => $arParams['FAST_ORDER_PAYER'],
                'FAST_ORDER_SHOW_PROPERTIES' => $arParams['FAST_ORDER_PROPERTIES'],
                'FAST_ORDER_PROPERTY_PHONE' => $arParams['FAST_ORDER_PROPERTY_PHONE'],
                'PROPERTY_RELATED_SERVICES' => $arParams['PROPERTY_SERVICES'],
                'PROPERTY_IBLOCK_RELATED_SERVICES_PRICE' => $arParams['SERVICES_PROPERTY_PRICE'],
                'USE_FIXED_HEADER_PRODUCT' => $arParams['DETAIL_HEADER_FIXED'],
                'DISPLAY_MEASURE' => $arParams['DETAIL_DISPLAY_MEASURE'],
                'SHOW_ALL_SELECTED_PRICES' => $arParams['PRICE_SHOW_ALL'],
                'USE_QUANTITY_MARKERS' => $arParams['QUANTITY_MARKERS_USE'],
                'QUANTITY_MARKER_MANY' => $arParams['QUANTITY_MARKERS_MANY'],
                'QUANTITY_MARKER_FEW' => $arParams['QUANTITY_MARKERS_FEW'],
                'CONSENT_URL' => $arParams['CONSENT_URL'],
                'ORDER_PRODUCT_WEB_FORM' => $arParams['PRODUCT_FORM_ID'],
                'PROPERTY_FORM_ORDER_PRODUCT' => $arParams['PRODUCT_FORM_PROPERTY_PRODUCT'],
                'USE_BASKET' => $arParams['BASKET_USE'],
                'USE_COMMON_CURRENCY' => $arParams['CURRENCY_USE'],
                'CURRENCY' => $arParams['CURRENCY_CODE']
            ),
            $component
        );

        $GLOBALS['CATALOG_CURRENT_ELEMENT_ID'] = $ElementID;
        unset($basketAction);
        if ($ElementID > 0)
        {
            if($arParams['USE_STORE'] == 'Y' && ModuleManager::isModuleInstalled('catalog'))
            {
                $APPLICATION->IncludeComponent("bitrix:catalog.store.amount", ".default", array(
                    "ELEMENT_ID" => $ElementID,
                    "STORE_PATH" => $arParams['STORE_PATH'],
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000",
                    "MAIN_TITLE" => $arParams['MAIN_TITLE'],
                    "USE_MIN_AMOUNT" =>  $arParams['USE_MIN_AMOUNT'],
                    "MIN_AMOUNT" => $arParams['MIN_AMOUNT'],
                    "STORES" => $arParams['STORES'],
                    "SHOW_EMPTY_STORE" => $arParams['SHOW_EMPTY_STORE'],
                    "SHOW_GENERAL_STORE_INFORMATION" => $arParams['SHOW_GENERAL_STORE_INFORMATION'],
                    "USER_FIELDS" => $arParams['USER_FIELDS'],
                    "FIELDS" => $arParams['FIELDS']
                ),
                $component,
                array("HIDE_ICONS" => "Y")
            );
            }

            $arRecomData = array();
            $recomCacheID = array('IBLOCK_ID' => $arParams['IBLOCK_ID']);
            $obCache = new CPHPCache();
            if ($obCache->InitCache(36000, serialize($recomCacheID), "/catalog/recommended"))
            {
                $arRecomData = $obCache->GetVars();
            }
            elseif ($obCache->StartDataCache())
            {
                if (Loader::includeModule("catalog"))
                {
                    $arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
                    $arRecomData['OFFER_IBLOCK_ID'] = (!empty($arSKU) ? $arSKU['IBLOCK_ID'] : 0);
                    $arRecomData['IBLOCK_LINK'] = '';
                    $arRecomData['ALL_LINK'] = '';
                    $rsProps = CIBlockProperty::GetList(
                        array('SORT' => 'ASC', 'ID' => 'ASC'),
                        array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'PROPERTY_TYPE' => 'E', 'ACTIVE' => 'Y')
                    );
                    $found = false;
                    while ($arProp = $rsProps->Fetch())
                    {
                        if ($found)
                        {
                            break;
                        }
                        if ($arProp['CODE'] == '')
                        {
                            $arProp['CODE'] = $arProp['ID'];
                        }
                        $arProp['LINK_IBLOCK_ID'] = intval($arProp['LINK_IBLOCK_ID']);
                        if ($arProp['LINK_IBLOCK_ID'] != 0 && $arProp['LINK_IBLOCK_ID'] != $arParams['IBLOCK_ID'])
                        {
                            continue;
                        }
                        if ($arProp['LINK_IBLOCK_ID'] > 0)
                        {
                            if ($arRecomData['IBLOCK_LINK'] == '')
                            {
                                $arRecomData['IBLOCK_LINK'] = $arProp['CODE'];
                                $found = true;
                            }
                        }
                        else
                        {
                            if ($arRecomData['ALL_LINK'] == '')
                            {
                                $arRecomData['ALL_LINK'] = $arProp['CODE'];
                            }
                        }
                    }
                    if ($found)
                    {
                        if(defined("BX_COMP_MANAGED_CACHE"))
                        {
                            global $CACHE_MANAGER;
                            $CACHE_MANAGER->StartTagCache("/catalog/recommended");
                            $CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);
                            $CACHE_MANAGER->EndTagCache();
                        }
                    }
                }
                $obCache->EndDataCache($arRecomData);
            }
            /*if (!empty($arRecomData))
            {
                if (ModuleManager::isModuleInstalled("sale") && (!isset($arParams['USE_BIG_DATA']) || $arParams['USE_BIG_DATA'] != 'N'))
                {
                    $APPLICATION->IncludeComponent("bitrix:catalog.bigdata.products", "", array(
                        "LINE_ELEMENT_COUNT" => 5,
                        "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
                        "BASKET_URL" => $arParams["BASKET_URL"],
                        "ACTION_VARIABLE" => (!empty($arParams["ACTION_VARIABLE"]) ? $arParams["ACTION_VARIABLE"] : "action")."_cbdp",
                        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                        "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                        "ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
                        "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                        "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
                        "SHOW_OLD_PRICE" => $arParams['SHOW_OLD_PRICE'],
                        "SHOW_DISCOUNT_PERCENT" => $arParams['SHOW_DISCOUNT_PERCENT'],
                        "PRICE_CODE" => $arParams["PRICE_CODE"],
                        "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
                        "PRODUCT_SUBSCRIPTION" => $arParams['PRODUCT_SUBSCRIPTION'],
                        "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
                        "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
                        "SHOW_NAME" => "Y",
                        "SHOW_IMAGE" => "Y",
                        "MESS_BTN_BUY" => $arParams['MESS_BTN_BUY'],
                        "MESS_BTN_DETAIL" => $arParams['MESS_BTN_DETAIL'],
                        "MESS_BTN_SUBSCRIBE" => $arParams['MESS_BTN_SUBSCRIBE'],
                        "MESS_NOT_AVAILABLE" => $arParams['MESS_NOT_AVAILABLE'],
                        "PAGE_ELEMENT_COUNT" => 5,
                        "SHOW_FROM_SECTION" => "N",
                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "DEPTH" => "2",
                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                        "SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
                        "HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
                        "CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
                        "CURRENCY_ID" => $arParams["CURRENCY_ID"],
                        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                        "SECTION_ELEMENT_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                        "SECTION_ELEMENT_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                        "ID" => $ElementID,
                        "LABEL_PROP_".$arParams["IBLOCK_ID"] => $arParams['LABEL_PROP'],
                        "PROPERTY_CODE_".$arParams["IBLOCK_ID"] => $arParams["LIST_PROPERTY_CODE"],
                        "PROPERTY_CODE_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["LIST_OFFERS_PROPERTY_CODE"],
                        "CART_PROPERTIES_".$arParams["IBLOCK_ID"] => $arParams["PRODUCT_PROPERTIES"],
                        "CART_PROPERTIES_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFERS_CART_PROPERTIES"],
                        "ADDITIONAL_PICT_PROP_".$arParams["IBLOCK_ID"] => $arParams['ADD_PICT_PROP'],
                        "ADDITIONAL_PICT_PROP_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams['OFFER_ADD_PICT_PROP'],
                        "OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
                        "RCM_TYPE" => (isset($arParams['BIG_DATA_RCM_TYPE']) ? $arParams['BIG_DATA_RCM_TYPE'] : '')
                    ),
                    $component,
                    array("HIDE_ICONS" => "Y")
                );
                }
                if (($arRecomData['IBLOCK_LINK'] != '' || $arRecomData['ALL_LINK'] != ''))
                {

                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.recommended.products",
                    "",
                    array(
                        "LINE_ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
                        "ID" => $ElementID,
                        "PROPERTY_LINK" => ($arRecomData['IBLOCK_LINK'] != '' ? $arRecomData['IBLOCK_LINK'] : $arRecomData['ALL_LINK']),
                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "BASKET_URL" => $arParams["BASKET_URL"],
                        "ACTION_VARIABLE" => (!empty($arParams["ACTION_VARIABLE"]) ? $arParams["ACTION_VARIABLE"] : "action")."_crp",
                        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                        "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                        "ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
                        "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                        "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
                        "PAGE_ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
                        "SHOW_OLD_PRICE" => $arParams['SHOW_OLD_PRICE'],
                        "SHOW_DISCOUNT_PERCENT" => $arParams['SHOW_DISCOUNT_PERCENT'],
                        "PRICE_CODE" => $arParams["PRICE_CODE"],
                        "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
                        "PRODUCT_SUBSCRIPTION" => 'N',
                        "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
                        "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
                        "SHOW_NAME" => "Y",
                        "SHOW_IMAGE" => "Y",
                        "MESS_BTN_BUY" => $arParams['MESS_BTN_BUY'],
                        "MESS_BTN_DETAIL" => $arParams["MESS_BTN_DETAIL"],
                        "MESS_NOT_AVAILABLE" => $arParams['MESS_NOT_AVAILABLE'],
                        "MESS_BTN_SUBSCRIBE" => $arParams['MESS_BTN_SUBSCRIBE'],
                        "SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
                        "HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
                        "OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
                        "OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
                        "ADDITIONAL_PICT_PROP_".$arParams['IBLOCK_ID'] => $arParams['ADD_PICT_PROP'],
                        "ADDITIONAL_PICT_PROP_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams['OFFER_ADD_PICT_PROP'],
                        "PROPERTY_CODE_".$arRecomData['OFFER_IBLOCK_ID'] => array(),
                        "CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
                        "CURRENCY_ID" => $arParams["CURRENCY_ID"]
                    ),
                    $component
                );

                }
            }*/

            /*if($arParams["USE_ALSO_BUY"] == "Y" && ModuleManager::isModuleInstalled("sale") && !empty($arRecomData))
            {
                $APPLICATION->IncludeComponent("bitrix:sale.recommended.products", ".default", array(
                    "ID" => $ElementID,
                    "MIN_BUYES" => $arParams["ALSO_BUY_MIN_BUYES"],
                    "ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
                    "LINE_ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
                    "DETAIL_URL" => $arParams["DETAIL_URL"],
                    "BASKET_URL" => $arParams["BASKET_URL"],
                    "ACTION_VARIABLE" => (!empty($arParams["ACTION_VARIABLE"]) ? $arParams["ACTION_VARIABLE"] : "action")."_srp",
                    "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                    "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
                    "PAGE_ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "PRICE_CODE" => $arParams["PRICE_CODE"],
                    "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
                    "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
                    "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
                    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                    'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                    'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
                    "SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
                    "PROPERTY_CODE_".$arRecomData['OFFER_IBLOCK_ID'] => array(    ),
                    "OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
                    "OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
                    "ADDITIONAL_PICT_PROP_".$arParams['IBLOCK_ID'] => $arParams['ADD_PICT_PROP'],
                    "ADDITIONAL_PICT_PROP_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams['OFFER_ADD_PICT_PROP']
                    ),
                    $component,
                    array("HIDE_ICONS" => "Y")
                );
            }*/
        }
        ?>
            </div>
            <? if ($isSidebar): ?>
            <div class="col-md-3 col-sm-4">
                <?$APPLICATION->IncludeComponent(
                    'bitrix:main.include',
                    '',
                    Array(
                        'AREA_FILE_SHOW' => 'file',
                        'PATH' => $arParams['SIDEBAR_PATH'],
                        'AREA_FILE_RECURSIVE' => 'N',
                        'EDIT_MODE' => 'html',
                    ),
                    false,
                    Array('HIDE_ICONS' => 'Y')
                );?>
            </div>
            <? endif ?>
        </div>
        <? if ($bMenuDisplay) { ?>
                </div>
            </div>
            <div class="clearfix"></div>
        <? } ?>
    </div>
</div>