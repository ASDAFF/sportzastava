<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use intec\core\helpers\Html;
use intec\core\helpers\JavaScript;

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
 * @var string $sTemplateId
 * @var string $sType
 */
?>
<div class="widget-reviews-view widget-reviews-view-blocks-2">
    <div class="widget-reviews-view-wrapper">
        <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
        <?php
            $sId = $sTemplateId.'_'.$sType.'_extend_'.$arItem['ID'];
            $sAreaId = $this->GetEditAreaId($sId);
            $this->AddEditAction($sId, $arItem['EDIT_LINK']);
            $this->AddDeleteAction($sId, $arItem['DELETE_LINK']);
            $sImage = null;

            if (!empty($arItem['PREVIEW_PICTURE'])) {
                $sImage = $arItem['PREVIEW_PICTURE'];
            } else if (!empty($arItem['DETAIL_PICTURE'])) {
                $sImage = $arItem['DETAIL_PICTURE'];
            }

            $sImage = CFile::ResizeImageGet($sImage, array(
                'width' => 150,
                'height' => 150
            ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

            if (!empty($sImage)) {
                $sImage = $sImage['src'];
            } else {
                $sImage = null;
            }
        ?>
            <div class="widget-reviews-item">
                <div class="widget-reviews-item-wrapper" id="<?= $sAreaId ?>">
                    <div class="widget-reviews-item-header">
                        <div class="widget-reviews-item-header-wrapper">
                            <div class="widget-reviews-item-image">
                                <div class="widget-reviews-item-image-wrapper" style="background-image: url('<?= $sImage ?>')"></div>
                            </div>
                            <div class="widget-reviews-item-name">
                                <?= $arItem['NAME'] ?>
                            </div>
                            <div class="widget-reviews-item-signature">
                                <?= $arItem['PREVIEW_TEXT'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="widget-reviews-item-information">
                        <?= $arItem['DETAIL_TEXT'] ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="clearfix"></div>
    </div>
</div>