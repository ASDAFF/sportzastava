<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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

$GLOBALS['arBrandFilter'] = array(
    'PROPERTY_'.$arParams['CATALOG_IBLOCK_PROPERTY'] => $arResult['ID'],
);

$sImage = null;

if (!empty($arResult['DETAIL_PICTURE'])) {
    $sImage = $arResult['DETAIL_PICTURE'];
} else if (!empty($arResult['PREVIEW_PICTURE'])) {
    $sImage = $arResult['PREVIEW_PICTURE'];
}

$sImage = CFile::ResizeImageGet($sImage, array(
    'width' => 640,
    'height' => 480
), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

if (!empty($sImage)) {
    $sImage = $sImage['src'];
} else {
    $sImage = null;
}
?>
<div class="brand">
    <a class="brand-back intec-button intec-button-s-5 intec-button-cl-default intec-button-transparent" href="<?= $arParams['BACK_URL'] ?>">
        <span class="brand-back-icon fa fa-angle-left"></span>
        <span class="brand-back-text"><?= GetMessage('C_BRANDS_C_E_DEFAULT_BACK') ?></span>
    </a>
    <div class="brand-information">
        <div class="brand-image">
            <div class="brand-image-wrapper">
                <div class="brand-image-wrapper-2 intec-image">
                    <div class="intec-aligner"></div>
                    <img src="<?= $sImage ?>" />
                </div>
            </div>
        </div>
        <div class="brand-text">
            <?= $arResult['PREVIEW_TEXT'] ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php if ($arParams['CATALOG_DISPLAY'] == 'Y') { ?>
        <div class="brand-products">
            <div class="brand-products-title">
                <?=GetMessage('C_BRANDS_C_E_DEFAULT_PRODUCTS')?>
            </div>
            <?php
            $APPLICATION->IncludeComponent(
                'bitrix:catalog.section',
                'tile',
                array(
                    'IBLOCK_TYPE' => $arParams['CATALOG_IBLOCK_TYPE'],
                    'IBLOCK_ID' => $arParams['CATALOG_IBLOCK_ID'],
                    'SECTION_USER_FIELDS' => array(),
                    'SHOW_ALL_WO_SECTION' => 'Y',
                    'FILTER_NAME' => 'arBrandFilter',
                    'ELEMENT_SORT_FIELD' => $arParams['ELEMENT_SORT_FIELD'],
                    'ELEMENT_SORT_ORDER' => $arParams['ELEMENT_SORT_ORDER'],
                    'ELEMENT_SORT_FIELD2' => $arParams['ELEMENT_SORT_FIELD2'],
                    'ELEMENT_SORT_ORDER2' => $arParams['ELEMENT_SORT_ORDER2'],
                    'PROPERTY_CODE' => $arParams['LIST_PROPERTY_CODE'],
                    'META_KEYWORDS' => $arParams['LIST_META_KEYWORDS'],
                    'META_DESCRIPTION' => $arParams['LIST_META_DESCRIPTION'],
                    'BROWSER_TITLE' => $arParams['LIST_BROWSER_TITLE'],
                    'INCLUDE_SUBSECTIONS' => $arParams['INCLUDE_SUBSECTIONS'],
                    'BASKET_URL' => $arParams['BASKET_URL'],
                    'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
                    'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
                    'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],
                    'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
                    'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
                    'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                    'CACHE_TIME' => $arParams['CACHE_TIME'],
                    'CACHE_FILTER' => $arParams['CACHE_FILTER'],
                    'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                    'SET_TITLE' => $arParams['SET_TITLE'],
                    'SET_STATUS_404' => $arParams['SET_STATUS_404'],
                    'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'] ? 'Y' : 'N',
                    'COMPARE_NAME' => $arParams['COMPARE_NAME'],
                    'PAGE_ELEMENT_COUNT' => 21,
                    'LINE_ELEMENT_COUNT' => $arParams['LINE_ELEMENT_COUNT'],
                    'DISPLAY_PREVIEW' => $arParams['LIST_DISPLAY_PREVIEW'],
                    'DISPLAY_PROPERTIES' => $arParams['LIST_DISPLAY_PROPERTIES'],
                    'PRICE_CODE' => $arParams['PRICE_CODE'],
                    'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
                    'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],

                    'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
                    'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
                    'QUANTITY_FLOAT' => $arParams['QUANTITY_FLOAT'],
                    'PRODUCT_PROPERTIES' => $arParams['PRODUCT_PROPERTIES'],

                    'DISPLAY_TOP_PAGER' => $arParams['DISPLAY_TOP_PAGER'],
                    'DISPLAY_BOTTOM_PAGER' => $arParams['DISPLAY_BOTTOM_PAGER'],
                    'PAGER_TITLE' => $arParams['PAGER_TITLE'],
                    'PAGER_SHOW_ALWAYS' => $arParams['PAGER_SHOW_ALWAYS'],
                    'PAGER_TEMPLATE' => $arParams['PAGER_TEMPLATE'],
                    'PAGER_DESC_NUMBERING' => $arParams['PAGER_DESC_NUMBERING'],
                    'PAGER_DESC_NUMBERING_CACHE_TIME' => $arParams['PAGER_DESC_NUMBERING_CACHE_TIME'],
                    'PAGER_SHOW_ALL' => $arParams['PAGER_SHOW_ALL'],
                    'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
                    'OFFERS_FIELD_CODE' => $arParams['LIST_OFFERS_FIELD_CODE'],
                    'OFFERS_PROPERTY_CODE' => $arParams['LIST_OFFERS_PROPERTY_CODE'],
                    'OFFERS_SORT_FIELD' => $arParams['OFFERS_SORT_FIELD'],
                    'OFFERS_SORT_ORDER' => $arParams['OFFERS_SORT_ORDER'],
                    'OFFERS_SORT_FIELD2' => $arParams['OFFERS_SORT_FIELD2'],
                    'OFFERS_SORT_ORDER2' => $arParams['OFFERS_SORT_ORDER2'],
                    'OFFERS_LIMIT' => $arParams['LIST_OFFERS_LIMIT'],
                    'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
                    'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
                    'SECTION_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
                    'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['element'],
                    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                    'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                    'HIDE_NOT_AVAILABLE' => $arParams['HIDE_NOT_AVAILABLE'],
                    'USE_COUNT_PRODUCT' => $arParams['USE_COUNT_PRODUCT'],
                    'LAZY_LOAD' => $arParams['LAZY_LOAD'],
                    'MESS_BTN_LAZY_LOAD' => $arParams['MESS_BTN_LAZY_LOAD'],
                ),
                $component
            ); ?>
        </div>
    <?php } ?>
</div>
<?php
unset($GLOBALS['arBrandFilter']);
