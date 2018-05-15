<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use intec\core\helpers\ArrayHelper;

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

$icons = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_FOR_ICONS'], 'VALUE'));
$promo = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_FOR_PROMO'], 'VALUE'));
$teasers = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_FOR_TEASER'], 'VALUE'));
$teasersHeader = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_TEASER_HEADER'], 'VALUE'));
$video = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_FOR_OVERVIEWS'], 'VALUE'));
$photo = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_FOR_PHOTO'], 'VALUE'));
$sections = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_FOR_SECTION'], 'VALUE'));
$sectionsHeader = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_SECTION_HEADER'], 'VALUE'));
$services = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_FOR_SERVICES'], 'VALUE'));
$products = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_RECOMENDATIONS'], 'VALUE'));
$period = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_FOR_PERIOD'], 'VALUE'));

?>

<?php if ($arParams['HEAD_PICTURE_TYPE'] !== 'FULL_PICTURE') {
    include('parts/header-not-full.php');
} else {
    include('parts/header-full.php');
} ?>

<?php if ($promo) {
    include('parts/info.php');
} ?>

<?php if ($teasers) { ?>
    <div class="share-teasers share-block">
        <?php include('parts/teasers.php') ?>
    </div>
<?php } ?>

<?php if ($arParams['PROPERTY_SHOW_FORM'] == 'Y' && !empty($arParams['PROPERTY_FORM_ID'])) { ?>
    <div class="share-form share-block">
        <?php include('parts/feedback.php')?>
    </div>
<?php } ?>

<?php if ($video) { ?>
    <div class="share-video share-block clearfix">
        <?php include('parts/video.php') ?>
    </div>
<?php } ?>

<?php if ($photo) { ?>
    <div class="share-photo share-block clearfix">
        <?php include('parts/photo.php') ?>
    </div>
<?php } ?>

<?php if ($sections) { ?>
    <div class="share-services share-block clearfix">
        <?php include('parts/sections.php')?>
    </div>
<?php } ?>

<?php if ($services) { ?>
    <div class="share-services share-block clearfix">
        <?php include('parts/services.php') ?>
    </div>
<?php } ?>

<?php if ($products) { ?>
    <div class="share-products share-block clearfix">
        <?php include('parts/products.php'); ?>
    </div>
<?php } ?>

<div class="hr-line"></div>
<div class="share-links clearfix">
    <?php include('parts/links.php') ?>
</div>