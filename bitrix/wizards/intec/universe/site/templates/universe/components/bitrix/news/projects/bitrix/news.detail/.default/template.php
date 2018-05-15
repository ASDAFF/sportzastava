<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\JavaScript;
use intec\core\helpers\Type;

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

$arDescriptionProperties = ArrayHelper::getValue($arParams, 'DESCRIPTION_PROPERTIES');

$sImage = null;

if (!empty($arResult['DETAIL_PICTURE'])) {
    $sImage = $arResult['DETAIL_PICTURE'];
}

if (!empty($sImage)) {
    $sImage = $sImage['SRC'];
} else {
    $sImage = null;
}

$arForms = [];

if ($arParams['DISPLAY_FORM_ORDER'] == 'Y' && !empty($arParams['FORM_ORDER'])) {
    $arForms['ORDER'] = [
        'id' => $arParams['FORM_ORDER'],
        'template' => '.default',
        'parameters' => [
            'AJAX_OPTION_ADDITIONAL' => $sTemplateId.'_FORM_ORDER',
            'CONSENT_URL' => $arParams['CONSENT_URL']
        ],
        'settings' => [
            'title' => GetMessage('N_PROJECTS_N_D_DEFAULT_BUTTON_ASK')
        ],
        'fields' => []
    ];

    if (!empty($arParams['PROPERTY_FORM_ORDER_PROJECT']))
        $arForms['ORDER']['fields'][$arParams['PROPERTY_FORM_ORDER_PROJECT']] = $arResult['NAME'];
}

if ($arParams['DISPLAY_FORM_ASK'] == 'Y' && !empty($arParams['FORM_ASK'])) {
    $arForms['ASK'] = [
        'id' => $arParams['FORM_ASK'],
        'template' => '.default',
        'parameters' => [
            'AJAX_OPTION_ADDITIONAL' => $sTemplateId.'_FORM_ASK',
            'CONSENT_URL' => $arParams['CONSENT_URL']
        ],
        'settings' => [
            'title' => GetMessage('N_PROJECTS_N_D_DEFAULT_BUTTON_ASK')
        ]
    ];
}
?>
<div class="project" id="<?= $sTemplateId ?>">
    <div class="project-wrapper">
        <?php if (!empty($sImage)) { ?>
            <?php include('parts/header-with-image.php') ?>
        <? } else { ?>
            <?php include('parts/header-no-img.php') ?>
        <? } ?>
        <div class="project-sections">
            <div class="project-sections-wrapper">
                <div class="project-section project-section-indent"></div>
                <?php include('parts/gallery.php') ?>
                <?php include('parts/objective.php') ?>
                <?php include('parts/information.php') ?>
                <?php include('parts/services.php') ?>
                <?php include('parts/review.php') ?>
                <?php include('parts/images.php') ?>
                <?php include('parts/solution.php') ?>
            </div>
        </div>
    </div>
</div>
