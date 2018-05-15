<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
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
<div class="brands">
    <?php if (!empty($arResult['DESCRIPTION'])) { ?>
        <div class="brands-description<?= empty($arResult['ITEMS']) ? ' brands-description-only' : '' ?>">
            <?= $arResult['DESCRIPTION'] ?>
        </div>
        <div class="clearfix"></div>
    <?php } ?>
    <div class="brands-wrapper">
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

            $sImage = CFile::ResizeImageGet($sImage, array(
                'width' => 520,
                'height' => 440
            ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

            if (!empty($sImage)) {
                $sImage = $sImage['src'];
            } else {
                $sImage = null;
            }
        ?>
            <div class="brand" id="<?= $sAreaId ?>">
                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="brand-wrapper">
                    <div class="brand-wrapper-2" style="background-image: url('<?= $sImage ?>')"></div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<div class="clearfix"></div>


