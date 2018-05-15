<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
\Bitrix\Main\Loader::includeModule("intec.core");
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

$bDisplayDescription = !empty($arResult['DESCRIPTION']);
$bDisplayItems = !empty($arResult['ITEMS']);
$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);

if (!empty($arResult['NAV_RESULT'])) {
    $navParams =  array(
        'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
        'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
        'NavNum' => $arResult['NAV_RESULT']->NavNum
    );
} else {
    $navParams = array(
        'NavPageCount' => 1,
        'NavPageNomer' => 1,
        'NavNum' => $this->randString()
    );
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;
$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
    $showTopPager = $arParams['DISPLAY_TOP_PAGER'];
    $showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
    $showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}
?>
<div class="services-section services-section-extend">
    <?php if ($bDisplayDescription) { ?>
        <div class="services-section-description<?= $bDisplayItems ? ' services-section-description-only' : null ?>">
            <?=$arResult['DESCRIPTION']?>
        </div>
    <?php } ?>
    <?php if ($bDisplayItems) { ?>
        <div class="services-section-items">
            <div class="services-section-items-wrapper" data-entity="<?=$containerName?>">
                <!-- items-container -->
                <?php $bFiresItem = true ?>
                <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
                <?php
                    $sId = $sTemplateId.'_'.$arItem['ID'];
                    $sAreaId = $this->GetEditAreaId($sId);
                    $this->AddEditAction($sId, $arItem['EDIT_LINK']);
                    $this->AddDeleteAction($sId, $arItem['DELETE_LINK']);
                    $sImage = null;

                    if (!empty($arItem['PREVIEW_PICTURE'])) {
                        $sImage = $arItem['PREVIEW_PICTURE'];
                    } else if (!empty($arItem['DETAIL_PICTURE'])) {
                        $sImage = $arItem['DETAIL_PICTURE'];
                    }

                    if ($arParams['IMAGES'] == 'CIRCLE')
                        $sImageClass = 'services-section-item-image-circle';

                    $sImage = CFile::ResizeImageGet($sImage, array(
                        'width' => 480,
                        'height' => 195
                    ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

                    if (!empty($sImage)) {
                        $sImage = $sImage['src'];
                    } else {
                        $sImage = null;
                    }
                ?>
                    <div class="services-section-item" data-entity="items-row" style="<?if(!empty($sImageClass)) echo 'border: none; margin-bottom: 40px;';?>">
                        <div class="services-section-item-wrapper" id="<?= $sAreaId ?>">
                            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="<?= (!empty($sImageClass)) ? $sImageClass : 'services-section-item-image';?>" style="background-image: url('<?= $sImage ?>')"></a>
                            <div class="services-section-item-information">
                                <div class="services-section-item-name">
                                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="services-section-item-name-wrapper intec-cl-text intec-cl-text-dark-hover">
                                        <?= $arItem['NAME'] ?>
                                    </a>
                                </div>
                                <div class="services-section-item-description">
                                    <?= $arItem['PREVIEW_TEXT'] ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <?php if ($bFiresItem) $bFiresItem = false ?>
                <?php } ?>
                <!-- items-container -->
            </div>
        </div>
    <?php } ?>
    <?if ($showLazyLoad){ ?>
        <div class="row bx-<?=$arParams['TEMPLATE_THEME']?>">
            <div class="show-more show-more-btn intec-cl-text"
                 data-use="show-more-<?=$navParams['NavNum']?>">
                <i class="glyph-icon-show-more intec-cl-background"></i>
                <?=$arParams['MESS_BTN_LAZY_LOAD']?>
            </div>
        </div>
    <? }
    if ($showBottomPager) {?>
        <div data-pagination-num="<?=$navParams['NavNum']?>">
            <!-- pagination-container -->
            <?=$arResult['NAV_STRING']?>
            <!-- pagination-container -->
        </div>
        <?
    }?>
</div>
<?
$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<script>
    BX.message({
        BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
        BASKET_URL: '<?=$arParams['BASKET_URL']?>',
        ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
        TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
        TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
        TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
        BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
        BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
        BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
        BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
        COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
        COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
        COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
        PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
        RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
        RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
        BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
        BTN_MESSAGE_LAZY_LOAD: '<?=$arParams['MESS_BTN_LAZY_LOAD']?>',
        BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER')?>',
        SITE_ID: '<?=SITE_ID?>'
    });
    var <?=$obName?> = new JCCatalogSectionComponent({
        siteId: '<?=CUtil::JSEscape(SITE_ID)?>',
        componentPath: '<?=CUtil::JSEscape($componentPath)?>',
        navParams: <?=CUtil::PhpToJSObject($navParams)?>,
        deferredLoad: false, // enable it for deferred load
        initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
        bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
        lazyLoad: !!'<?=$showLazyLoad?>',
        loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
        template: '<?=CUtil::JSEscape($signedTemplate)?>',
        ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'])?>',
        parameters: '<?=CUtil::JSEscape($signedParams)?>',
        container: '<?=$containerName?>'
    });
</script>