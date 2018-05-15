<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

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
$showBottomPager = false;
$showTopPager = false;

if ($arParams['NEWS_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
    $showTopPager = $arParams['DISPLAY_TOP_PAGER'];
    $showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
}
?>

<?if($showTopPager){?>
    <div data-pagination-num="<?=$navParams['NavNum']?>">
        <!-- pagination-container -->
        <?=$arResult['NAV_STRING']?>
        <!-- pagination-container -->
    </div>
<?}?>
    <div class="intec-content">
        <div class="intec-content-wrapper">
            <div class="news-list news-list-blocks-2 news-list-row-<?= $arParams['LINE_COUNT'] ?>">
                <div class="news-list-title"><?= $arParams['TITLE'] ?></div>
                <div class="news-list-wrapper">
                    <?php $bFirst = true ?>
                    <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
                        <?php
                        $sId = $sTemplateId.'_'.$arItem['ID'];
                        $sAreaId = $this->GetEditAreaId($sId);
                        $sImage = null;

                        $this->AddEditAction($sId, $arItem['EDIT_LINK']);
                        $this->AddDeleteAction($sId, $arItem['DELETE_LINK']);

                        if (!empty($arItem['PREVIEW_PICTURE'])) {
                            $sImage = $arItem['PREVIEW_PICTURE'];
                        } else {
                            $sImage = $arItem['DETAIL_PICTURE'];
                        }

                        $sImage = CFile::ResizeImageGet($sImage, array(
                            'width' => 640,
                            'height' => 420
                        ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

                        if (!empty($sImage)) {
                            $sImage = $sImage['src'];
                        } else {
                            $sImage = null;
                        }
                        ?>
                        <div class="news-list-item<?= $bFirst ? ' news-list-item-first' : null?>">
                            <div class="news-list-item-wrapper" id="<?= $sAreaId ?>">
                                <?php if ($bFirst) { ?>
                                    <a class="news-list-item-wrapper-2" href="<?= $arItem['DETAIL_PAGE_URL'] ?>" style="background-image: url('<?= $sImage?>')">
                                        <div class="news-list-name">
                                            <div class="news-list-name-wrapper">
                                                <div class="news-list-name-wrapper-2">
                                                    <?= $arItem['NAME'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php } else { ?>
                                    <?php if ($arParams['DISPLAY_PICTURE'] == 'Y') { ?>
                                        <div class="news-list-image">
                                            <a class="news-list-image-wrapper" href="<?= $arItem['DETAIL_PAGE_URL'] ?>" style="background-image: url('<?= $sImage ?>')"></a>
                                        </div>
                                    <?php } ?>
                                    <div class="news-list-information">
                                        <div class="news-list-name">
                                            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="news-list-name-wrapper intec-cl-text-hover">
                                                <?= $arItem['NAME'] ?>
                                            </a>
                                        </div>
                                        <?php if ($arParams['DISPLAY_DATE'] == 'Y') { ?>
                                            <div class="news-list-date">
                                                <?= $arItem['DISPLAY_ACTIVE_FROM'] ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($arParams['DISPLAY_PREVIEW_TEXT'] == 'Y') { ?>
                                            <div class="news-list-description">
                                                <?= $arItem['PREVIEW_TEXT'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if ($bFirst) $bFirst = false ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?if ($showBottomPager) {?>
    <div data-pagination-num="<?=$navParams['NavNum']?>">
        <!-- pagination-container -->
        <?=$arResult['NAV_STRING']?>
        <!-- pagination-container -->
    </div>
<?}?>