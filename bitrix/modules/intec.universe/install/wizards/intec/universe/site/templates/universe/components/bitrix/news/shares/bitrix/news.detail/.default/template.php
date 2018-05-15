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

$products = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_RECOMENDATIONS'], 'VALUE'));
$period = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_FOR_PERIOD'], 'VALUE'));
$conditions = ArrayHelper::getValue($arResult, array('PROPERTIES', $arParams['PROPERTY_OF_BLOCK_FOR_CONDITIONS'], 'VALUE'));

$this->setFrameMode(true);
?>

<?php
if ($arParams['HEAD_PICTURE_TYPE'] !== 'FULL_PICTURE') {
    include('parts/header-not-full.php');
} else {
    include('parts/header-full.php');
}

if ($conditions) {
    include('parts/conditions.php');
}

if ($products) {
    include('parts/products.php');
}
?>

<div class="hr-sale"></div>
<?php include('parts/links.php') ?>
