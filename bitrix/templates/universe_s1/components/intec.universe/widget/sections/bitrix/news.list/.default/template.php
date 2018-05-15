<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

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

$sTitle = ArrayHelper::getValue($arParams, 'TITLE');
$bDisplayTitle = ArrayHelper::getValue($arParams, 'DISPLAY_TITLE') == 'Y' && !empty($sTitle);
$bTitleCenter = ArrayHelper::getValue($arParams, 'ALIGHT_HEADER') == 'Y';

$sDescription = ArrayHelper::getValue($arParams, 'DESCRIPTION');
$bDisplayDescription = ArrayHelper::getValue($arParams, 'DISPLAY_DESCRIPTION') == 'Y' && !empty($sDescription);
$bDescriptionCenter = ArrayHelper::getValue($arParams, 'ALIGHT_DESCRIPTION') == 'Y';

?>
<div id="<?= $arResult['COMPONENT_HASH'] ?>" class="intec-content widget-sections">
    <div class="intec-content-wrapper">
        <?php if ($bDisplayTitle) { ?>
            <div class="title <?= $bTitleCenter ? 'text-center' : null ?>">
                <?= $sTitle ?>
            </div>
        <?php } ?>
        <?php if ($bDisplayDescription) { ?>
            <div class="description <?= $bDescriptionCenter ? 'text-center' : null ?>">
                <?= $sDescription ?>
            </div>
        <?php }

        $mobile = false ?>
        <div class="intec-news-sections desktop-template template-<?= $arResult['DESKTOP_TEMPLATE'] ?>">
            <?php include('parts/items.php') ?>
        </div>
        <?php if (!defined('EDITOR')) {

            $mobile = true ?>
            <div class="intec-news-sections mobile-template template-<?= $arResult['MOBILE_TEMPLATE'] ?>">
                <?php include('parts/items.php') ?>
            </div>
        <?php } ?>
    </div>
</div>
