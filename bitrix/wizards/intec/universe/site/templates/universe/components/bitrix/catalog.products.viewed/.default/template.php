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
?>
<div class="intec-content">
    <div class="intec-content-wrapper">
        <div class="catalog-products-viewed">
            <?php if ($arParams['DISPLAY_TITLE'] == 'Y' && !empty($arParams['TITLE'])) { ?>
                <div class="catalog-products-viewed-title">
                    <?= $arParams['TITLE'] ?>
                </div>
            <?php } ?>
            <div class="catalog-products-viewed-wrapper">
                <?php $iIndex = 0 ?>
                <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
                <?php
                    if ($iIndex >= 4)
                        break;

                    $sId = $sTemplateId.'_desktop_default_'.$arItem['ID'];
                    $sAreaId = $this->GetEditAreaId($sId);
                    $this->AddEditAction($sId, $arItem['EDIT_LINK']);
                    $this->AddDeleteAction($sId, $arItem['DELETE_LINK']);

                    $arPrice = $arItem['PRICE'];
                    $sImage = null;

                    if (!empty($arItem['PREVIEW_PICTURE'])) {
                        $sImage = $arItem['PREVIEW_PICTURE'];
                    } else if (!empty($arItem['DETAIL_PICTURE'])) {
                        $sImage = $arItem['DETAIL_PICTURE'];
                    }

                    if (!empty($sImage))
                        $sImage = CFile::ResizeImageGet($sImage['ID'], array(
                            'width' => 100,
                            'height' => 100
                        ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

                    if (!empty($sImage)) {
                        $sImage = $sImage['src'];
                    } else {
                        $sImage = null;
                    }
                ?>
                    <div class="catalog-products-viewed-product">
                        <div class="catalog-products-viewed-product-wrapper" id="<?= $sAreaId ?>">
                            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="catalog-products-viewed-image" style="background-image: url('<?= $sImage ?>')"></a>
                            <div class="catalog-products-viewed-information">
                                <div class="catalog-products-viewed-name">
                                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="catalog-products-viewed-name-wrapper">
                                        <?= $arItem['NAME'] ?>
                                    </a>
                                </div>
                                <?php if (!empty($arPrice)) { ?>
                                    <div class="catalog-products-viewed-price">
                                        <?= $arPrice['PRINT_PRICE'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <?php $iIndex++ ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>