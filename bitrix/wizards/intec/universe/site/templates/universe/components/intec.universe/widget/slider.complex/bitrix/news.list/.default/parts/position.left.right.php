<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\Html;

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

?>

<div class="slider-item-wrapper <?= $sPosition ?>">
    <?php if($sPosition == 'left') {?>
        <div class="slider-text-wrapper">
            <?php if (!empty($sTitle)) {?>
                <div class="slider-title"<?= $sTitleTextColor ?>>
                    <?= $sTitle ?>
                </div>
            <?php } ?>
            <?php if (!empty($sDescription)) { ?>
                <div class="slider-description"<?= $sDescriptionTextColor ?>>
                    <?= $sDescription ?>
                </div>
            <?php } ?>
            <?php if ($bIsButton) { ?>
                <div class="slider-buttons">
                    <?= Html::beginTag('a', array(
                        'class' => 'intec-button intec-button-lg intec-button-cl-common',
                        'href' => $sLink,
                        'style' => $sStyle,
                        'target' => $sLinkTarget
                    )) ?>
                    <?= $sButtonText ?>
                    <?= Html::endTag('a') ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if ($sBannerImagePosition == 'middle') {
        $sBannerImagePosition = 'center';
    } ?>

    <?= Html::beginTag(
        'div',
        array(
            'class' => 'slider-image-wrapper',
            'style' => array(
                'background-image' => $sBannerImage ? 'url('.$sBannerImage.')' : null,
                'background-position' => $sPosition.' '.$sBannerImagePosition
            )
        )
    )?>
    <?= Html::endTag('div')?>

    <?php if($sPosition == 'right') {?>
        <div class="slider-text-wrapper">
            <?php if (!empty($sTitle)) {?>
                <div class="slider-title"<?= $sTitleTextColor ?>>
                    <?= $sTitle ?>
                </div>
            <?php } ?>
            <?php if (!empty($sDescription)) { ?>
                <div class="slider-description"<?= $sDescriptionTextColor ?>>
                    <?= $sDescription ?>
                </div>
            <?php } ?>
            <?php if ($bIsButton) { ?>
                <div class="slider-buttons">
                    <?= Html::beginTag('a', array(
                        'class' => 'intec-button intec-button-lg intec-button-cl-common',
                        'href' => $sLink,
                        'style' => $sStyle,
                        'target' => $sLinkTarget
                    )) ?>
                    <?= $sButtonText ?>
                    <?= Html::endTag('a') ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>
