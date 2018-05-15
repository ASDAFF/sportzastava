<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
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
/** @var array $icons */
/** @var string $period */

?>
<div class="share-header">
    <div class="share-image"
         style="background-image: url('<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>')">
    </div>
    <?php if ($icons) { ?>
        <div class="share-icons">
            <?php include('icons.php')?>
        </div>
    <?php } ?>
    <div class="share-text">
        <?php if ($period) { ?>
            <div class="share-period">
                <?= $period ?>
            </div>
        <?php } ?>

        <?php if(!empty($arResult['DETAIL_TEXT'])) { ?>
            <div class="share-description">
                <?= $arResult['DETAIL_TEXT'] ?>
            </div>
        <? } ?>
    </div>
</div>



