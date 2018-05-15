<?php  if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

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
<div class="cb-banner-wrapper">
    <?= Html::beginTag(
        $cbIsLink ? 'a' : 'div',
        array(
            'class' => 'cb-banner',
            'target' => $cbIsLink ? $cbLinkBlank : null,
            'href' => $cbIsLink ? $cbLink : null
        )
    ) ?>
        <?= Html::beginTag(
            'div',
            array(
                'style' => array(
                    'background-image' => $cbImage ? 'url('.$cbImage.')' : null
                ),
                'class' => 'cb-banner-img'
            )
        ) ?>
        <?= Html::endTag('div') ?>
        <?= Html::beginTag(
            'div',
            array(
                'style' => $cbNameColor ? 'color:'.$cbNameColor : null,
                'class' => 'cb-banner-text'
            )
        )?>
            <?= $cbName ?>
        <?= Html::endTag('div')?>
    <?= Html::endTag($cbIsLink ? 'a' : 'div') ?>
</div>
