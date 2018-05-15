<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);
?>
<div class="share-teaser">
    <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
        <div class="teaser-element">
            <div class="element-header">
                <?= $arItem['PREVIEW_TEXT'] ?>
            </div>
            <div class="element-description">
                <?= $arItem['DETAIL_TEXT'] ?>
            </div>
        </div>
    <?php } ?>
</div>