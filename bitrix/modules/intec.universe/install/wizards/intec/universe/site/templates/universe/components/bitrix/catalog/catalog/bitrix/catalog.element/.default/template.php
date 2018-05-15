<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\JavaScript;
use intec\core\helpers\ArrayHelper;
use intec\constructor\models\Build;
use \Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var array $currentOffer
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var boolean $showPreviewDescription
 * @var CBitrixComponent $component
 */

$useFixedHeader = false;

$oBuild = Build::getCurrent();
if (!empty($oBuild)) {
    $oPage = $oBuild->getPage();
    $oProperties = $oPage->getProperties();

    $detailImage = $oProperties->get('catalog_detail_image');
    if ($arParams['DETAIL_PICTURE_POPUP'] == 'SETTINGS') {
        $arParams['DETAIL_PICTURE_POPUP'] = 'N';
        if (ArrayHelper::getValue($detailImage, 'popup', 0) == 1) {
            $arParams['DETAIL_PICTURE_POPUP'] = 'Y';
        }
    }
    if ($arParams['DETAIL_PICTURE_LOOP'] == 'SETTINGS') {
        $arParams['DETAIL_PICTURE_LOOP'] = 'N';
        if (ArrayHelper::getValue($detailImage, 'loop', 0) == 1) {
            $arParams['DETAIL_PICTURE_LOOP'] = 'Y';
        }
    }
    unset($detailImage);

    if ($arParams['DETAIL_HEADER_FIXED'] == 'settings') {
        $useFixedHeader = $oProperties->get('use_fixed_header_product') == 1;
    } else if ($arParams['DETAIL_HEADER_FIXED'] == 'Y') {
        $useFixedHeader = true;
    }
}


$this->setFrameMode(true);

$templateLibrary = array('popup');
$sTemplateId = spl_object_hash($this);
$currencyList = '';
if (!empty($arResult['CURRENCIES'])) {
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}
$templateData = array(
    'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
    'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME'],
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$strMainID = $this->GetEditAreaId($arResult['ID']);
$arItemIDs = array(
    'ID' => $strMainID,
    'PICT' => $strMainID.'_pict',
    'DISCOUNT_PICT_ID' => $strMainID.'_dsc_pict',
    'STICKER_ID' => $strMainID.'_sticker',
    'BIG_SLIDER_ID' => $strMainID.'_big_slider',
    'BIG_IMG_CONT_ID' => $strMainID.'_bigimg_cont',
    'SLIDER_CONT_ID' => $strMainID.'_slider_cont',
    'SLIDER_LIST' => $strMainID.'_slider_list',
    'SLIDER_LEFT' => $strMainID.'_slider_left',
    'SLIDER_RIGHT' => $strMainID.'_slider_right',
    'OLD_PRICE' => $strMainID.'_old_price',
    'PRICE' => $strMainID.'_price',
    'DISCOUNT_PRICE' => $strMainID.'_price_discount',
    'SLIDER_CONT_OF_ID' => $strMainID.'_slider_cont_',
    'SLIDER_LIST_OF_ID' => $strMainID.'_slider_list_',
    'SLIDER_LEFT_OF_ID' => $strMainID.'_slider_left_',
    'SLIDER_RIGHT_OF_ID' => $strMainID.'_slider_right_',
    'QUANTITY' => $strMainID.'_quantity',
    'QUANTITY_DOWN' => $strMainID.'_quant_down',
    'QUANTITY_UP' => $strMainID.'_quant_up',
    'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
    'QUANTITY_LIMIT' => $strMainID.'_quant_limit',
    'BASIS_PRICE' => $strMainID.'_basis_price',
    'BUY_LINK' => $strMainID.'_buy_link',
    'ADD_BASKET_LINK' => $strMainID.'_add_basket_link',
    'BASKET_ACTIONS' => $strMainID.'_basket_actions',
    'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
    'COMPARE_LINK' => $strMainID.'_compare_link',
    'PROP' => $strMainID.'_prop_',
    'PROP_DIV' => $strMainID.'_skudiv',
    'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
    'OFFER_GROUP' => $strMainID.'_set_group_',
    'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
    'SUBSCRIBE_LINK' => $strMainID.'_subscribe',
);

$sProductsRecommend = ArrayHelper::getValue($arParams, ['PROPERTY_RECOMENDATIONS']);
$sProductsBuying = ArrayHelper::getValue($arParams, ['PROPERTY_BUYING']);
$arProductsRecommend = ArrayHelper::getValue($arResult, ['PROPERTIES', $sProductsRecommend, 'VALUE']);
$arProductsBuying = ArrayHelper::getValue($arResult, ['PROPERTIES', $sProductsBuying, 'VALUE']);

$sPropertyRelatedServices = ArrayHelper::getValue($arParams, 'PROPERTY_RELATED_SERVICES');
$arRelatedServices = ArrayHelper::getValue($arResult, ['PROPERTIES', $sPropertyRelatedServices, 'VALUE']);
$sPropertyRelatedServicesPrice = ArrayHelper::getValue($arParams, 'PROPERTY_IBLOCK_RELATED_SERVICES_PRICE');
$RelatedServicesHeader = GetMessage('CT_BCE_CATALOG_RELATED_SERVICES_HEADER');

$isNew = !!ArrayHelper::getValue($arResult, ['PROPERTIES', $arParams['PROPERTY_IS_NEW'], 'VALUE'], false);
$isPopular = !!ArrayHelper::getValue($arResult, ['PROPERTIES', $arParams['PROPERTY_IS_POPULAR'], 'VALUE'], false);
$isRecommendation = !!ArrayHelper::getValue($arResult, ['PROPERTIES', $arParams['PROPERTY_IS_RECOMMENDATION'], 'VALUE'], false);

$strTitle = ArrayHelper::getValue($arResult, ['IPROPERTY_VALUES', 'ELEMENT_DETAIL_PICTURE_FILE_TITLE'], $arResult['NAME']);
$strAlt = ArrayHelper::getValue($arResult, ['IPROPERTY_VALUES', 'ELEMENT_DETAIL_PICTURE_FILE_ALT'], $arResult['NAME']);

$article = ArrayHelper::getValue($arResult, ['PROPERTIES', $arParams['PROPERTY_ARTICLE'], 'VALUE']);
$description = $name = strip_tags(ArrayHelper::getValue($arResult, ['IPROPERTY_VALUES', 'ELEMENT_PAGE_TITLE'], $arResult['NAME']));
$descriptionPreview = strip_tags(ArrayHelper::getValue($arResult, 'PREVIEW_TEXT'));
$descriptionDetail = strip_tags(ArrayHelper::getVAlue($arResult, 'DETAIL_TEXT'));
if ($descriptionPreview) {
    $description = $descriptionPreview;
} else if ($descriptionDetail) {
    $description = $descriptionDetail;
}

$currentOfferId = ArrayHelper::getValue($currentOffer, 'ID', $arResult['ID']);
$showPreviewDescription = ArrayHelper::getValue($arResult, 'DESCRIPTION_SHOW', false);

$characteristics = ArrayHelper::getValue($arResult, ['PRODUCT_DATA', 'CHARACTERISTICS']);
$videoLinks = ArrayHelper::getValue($arResult, ['PRODUCT_DATA', 'VIDEO_LINKS']);
$documents = ArrayHelper::getValue($arResult, ['PRODUCT_DATA', 'DOCUMENTS']);
$brand = ArrayHelper::getValue($arResult, ['PRODUCT_DATA', 'BRAND']);
$morePhotoList = ArrayHelper::getValue($arResult, ['PRODUCT_DATA', 'MORE_PHOTO']);
$arFirstPhoto = ArrayHelper::getValue($arResult, ['PRODUCT_DATA', 'FIRST_PHOTO']);
if (!empty($arFirstPhoto)) {
    $headerFixedImg = CFile::ResizeImageGet($arFirstPhoto['ID'], array('width' => 65, 'height' => 65, BX_RESIZE_IMAGE_PROPORTIONAL_ALT));
}

// Info tabs
$hasTab = array(
    'description' => !empty($arResult['DETAIL_TEXT']),
    'characteristics' => !empty($characteristics),
    'documents' => !empty($documents),
    'video' => !empty($videoLinks),
    'reviews' => !empty($arParams['REVIEWS_IBLOCK'])
);
$activeTab = '';
foreach ($hasTab as $key => $val) {
    if ($val) {
        $activeTab = $key;
        break;
    }
}

$arJSParams = array();
if (!empty($arResult['OFFERS'])) {
    $arJSParams = array(
        'CONFIG' => array(
            'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
            'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] == 'Y',
            'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] == 'Y',
            'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'] == 'Y',
            'SHOW_SKU_PROPS' => $arResult['SHOW_OFFERS_PROPS'],
            'OFFER_GROUP' => $arResult['OFFER_GROUP'],
            'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE']
        ),
        'PRODUCT_TYPE' => $arResult['CATALOG_TYPE'],
        'VISUAL' => array(
            'ID' => $arItemIDs['ID'],
            'CURRENT_PATH' => $this->GetFolder(),
            'ONE_CLICK_BUY' => $arItemIDs['ONE_CLICK_BUY'],
        ),
        'DEFAULT_PICTURE' => array(
            'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
            'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
        ),
        'PRODUCT' => array(
            'ID' => $arResult['ID'],
            'NAME' => $arResult['~NAME']
        ),
        'BASKET' => array(
            'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
            'BASKET_URL' => $arParams['BASKET_URL'],
            'SKU_PROPS' => $arResult['OFFERS_PROP_CODES']
        ),
        'OFFERS' => $arResult['JS_OFFERS'],
        'OFFER_SELECTED' => $arResult['OFFERS_SELECTED'],
        'PROPERTIES' => $arResult['SKU_PROPS']
    );
}

$currentOffer = ArrayHelper::getValue($arResult, 'CURRENT_OFFER');
$minPrice = ArrayHelper::getValue($arResult, 'MIN_PRICE');
$canBuy = ArrayHelper::getValue($arResult, 'CAN_BUY');
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showSubscribeBtn = $arResult['CATALOG_SUBSCRIBE'] == 'Y';

?>
<div class="intec-item-detail <?= $templateData['TEMPLATE_CLASS'] ?>"
     id="<?= $strMainID ?>"
     data-offer-id="<?= $currentOfferId ?>"
     itemscope itemtype="http://schema.org/Product">
    <meta itemprop="name" content="<?= $name ?>" />
    <meta itemprop="category" content="<?= $arResult['CATEGORY_PATH'] ?>" />
    <meta itemprop="description" content="<?= $description ?>" />

    <div class="intec-item-container">

        <div class="row intec-item-top">
            <div class="col-xs-12 col-md-5">
                <?php include('parts/main_image.php') ?>
            </div>
            <div class="col-xs-12 col-md-7 item-info-column">
                <?php if ($brand && !empty($brand['SRC'])) { ?>
                    <span class="item-brand">
                        <a href="<?= $brand['DETAIL_PAGE_URL'] ?>">
                            <img class="intec-icon-brand"
                                 src="<?= $brand['SRC'] ?>"
                                 alt="<?= $brand['NAME'] ?>"
                                 title="<?= $brand['NAME'] ?>" />
                        </a>
                    </span>
                <?php } ?>

                <?php if (!empty($article)) { ?>
                    <div class="item-article text-muted"><?= GetMessage('ARTICLE') ?> <?= $article ?></div>
                <?php } ?>
                <div class="clearfix"></div>

                <?php include('parts/price_block.php') ?>

                <?php include('parts/sku.php') ?>

                <?php if ($showPreviewDescription) { ?>
                    <div class="item-preview-description"><?= $arResult['PREVIEW_TEXT'] ?></div>
                <?php } ?>

                <?php include('parts/characteristics.php') ?>

                <?php if (empty($arParams['DETAIL_VIEW']) || $arParams['DETAIL_VIEW'] == 'tabs_right') {
                    include('parts/info_tabs.php');
                } ?>
                <?php include('parts/micro_offers.php') ?>
            </div>
        </div>

        <?php
        if (!empty($arParams['DETAIL_VIEW'])) {
            switch ($arParams['DETAIL_VIEW']) {
                case 'tabs':
                    include('parts/info_tabs.php');
                    break;
                case 'tabless':
                    include('parts/info_full.php');
                    break;
            }
        }

        /** Ask questions web form */
        if ($arParams['FEEDBACK_FORM_SHOW'] === 'Y' && !empty($arParams['FEEDBACK_FORM_ID'])) {
            $APPLICATION->IncludeComponent(
                'intec.universe:widget',
                'web.form',
                array(
                    'WEB_FORM_ID' => $arParams['FEEDBACK_FORM_ID'],
                    'WEB_FORM_SETTINGS' => array(
                        'COMPONENT_TEMPLATE' => '.default'
                    ),
                    'FORM_TEXT' => $arParams['FEEDBACK_FORM_TEXT'],
                    'CONSENT_URL' => $arParams['CONSENT_URL']
                ),
                $component
            );
        }

        /** Often by with */
        if (!empty($arProductsBuying)) {
            $GLOBALS['arrFilter'] = array(
                'ID' => $arProductsBuying
            );
            $APPLICATION->IncludeComponent(
                'bitrix:catalog.section',
                'small-products',
                array(
                    'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                    'SECTION_USER_FIELDS' => array(),
                    'SHOW_ALL_WO_SECTION' => 'Y',
                    'FILTER_NAME' => 'arrFilter',
                    'TITLE' => GetMessage('BUYING_WITH'),
                    'PRICE_CODE' => $arParams['PRICE_CODE'],
                    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                    'CURRENCY_ID' => $arParams['CURRENCY_ID']
                ),
                $component
            );
        }

        if (!empty($arProductsBuying) && !empty($arProductsRecommend))
            echo '<div style="margin-bottom: 20px;"></div>';

        /** Recommended products */
        if (!empty($arProductsRecommend)) {
            $GLOBALS['arrFilter'] = array(
                'ID' => $arProductsRecommend
            );
            $APPLICATION->IncludeComponent(
                'bitrix:catalog.section',
                'small-products',
                array(
                    'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                    'SECTION_USER_FIELDS' => array(),
                    'SHOW_ALL_WO_SECTION' => 'Y',
                    'FILTER_NAME' => 'arrFilter',
                    'TITLE' => GetMessage('RECOMENDATIONS'),
                    'PRICE_CODE' => $arParams['PRICE_CODE'],
                    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                    'CURRENCY_ID' => $arParams['CURRENCY_ID']
                ),
                $component
            );
        }

        if (!empty($arRelatedServices) && (!empty($arProductsBuying) || !empty($arProductsRecommend)))
            echo '<div style="margin-bottom: 20px;"></div>';
        
        /** Related services */
        if (!empty($arRelatedServices)) { ?>
            <div class="item-sub-title">
                <?= $RelatedServicesHeader ?>
            </div>
            <?php $APPLICATION->IncludeComponent(
                'intec.universe:iblock.elements',
                'tiles.landing.3',
                array(
                    "ELEMENTS_ID" => $arRelatedServices,
                    "LINK_TO_ELEMENTS" => "",
                    "NAME_PROP_PRICE" => $sPropertyRelatedServicesPrice
                ),
                $component
            );
        }

        if (!empty($arParams['DETAIL_VIEW']) && $arParams['DETAIL_VIEW'] == 'tabs_bottom') {
            include('parts/info_tabs.php');
        }
        ?>

    </div>
    <?
    if ($useFixedHeader) {
        include('parts/fixed_header_product.php');
    }
    ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        <?php if ($hasTab['reviews']) { ?>
            universe.components.get(<?= JavaScript::toObject([
                'component' => 'intec.universe:reviews',
                'template' => '.default',
                'parameters' => [
                    'COMPONENT_TEMPLATE' => '.default',
                    'IBLOCK_TYPE' => $arParams['REVIEWS_IBLOCK_TYPE'],
                    'IBLOCK_ID' => $arParams['REVIEWS_IBLOCK'],
                    'ELEMENT_ID' => $arParams['ELEMENT_ID'],
                    'DISPLAY_REVIEWS_COUNT' => 5,
                    'PROPERTY_ELEMENT_ID' => $arParams['REVIEWS_PROPERTY_ELEMENT_ID'],
                    'MAIL_EVENT' => $arParams['REVIEWS_MAIL_EVENT'],
                    'USE_CAPTCHA' => $arParams['REVIEWS_USE_CAPTCHA'],
                    'AJAX_MODE' => 'Y',
                    'AJAX_OPTION_ADDITIONAL' => $sTemplateId.'_REVIEWS',
                    'AJAX_OPTION_SHADOW' => 'N',
                    'AJAX_OPTION_JUMP' => 'Y',
                    'AJAX_OPTION_STYLE' => 'Y'
                ]
            ]) ?>, function(popup){
                $('#<?= $strMainID ?> .reviews-container').html(popup);
            });
        <?php } ?>
    });
</script>