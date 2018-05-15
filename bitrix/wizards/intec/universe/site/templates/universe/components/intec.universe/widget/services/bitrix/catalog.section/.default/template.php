<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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
$sTemplateId = spl_object_hash($this);

$sTitle = ArrayHelper::getValue($arParams, 'TITLE');
$bDisplayTitle = ArrayHelper::getValue($arParams, 'DISPLAY_TITLE') == 'Y' && !empty($sTitle);
$bTitleCenter = ArrayHelper::getValue($arParams, 'ALIGHT_TEXT') == 'Y';

$sDescription = ArrayHelper::getValue($arParams, 'DESCRIPTION');
$bDisplayDescription = ArrayHelper::getValue($arParams, 'DISPLAY_DESCRIPTION') == 'Y' && !empty($sDescription);
$bDescriptionCenter = ArrayHelper::getValue($arParams, 'ALIGHT_DESCRIPTION') == 'Y';

?>
<div class="intec-content widget-services" id="<?= $sTemplateId ?>">
    <div class="intec-content-wrapper">
        <?php if ($bDisplayTitle) { ?>
            <div class="widget-services-title <?= $bTitleCenter ? 'text-center' : null ?>">
                <?= $sTitle ?>
            </div>
        <?php } ?>
        <?php if ($bDisplayDescription) { ?>
            <div class="widget-services-description <?= $bDescriptionCenter ? 'text-center' : null ?>">
                <?= $sDescription ?>
            </div>
        <?php } ?>
        <div class="widget-services-desktop">
            <?php $sType = 'desktop';
            require('views/'.$arParams['VIEW_DESKTOP'].'.php'); ?>
        </div>
        <?php if (!defined('EDITOR')) { ?>
            <div class="widget-services-mobile">
                <?php $sType = 'mobile';
                require('views/'.$arParams['VIEW_MOBILE'].'.php'); ?>
            </div>
        <?php } ?>
        <?php if ($arParams['DISPLAY_BUTTON_ALL'] == 'Y') { ?>
            <div class="intec-content">
                <div class="intec-content-wrapper">
                    <div class="widget-services-buttons">
                        <a href="<?= $arParams['PAGE_URL'] ?>" class="intec-button intec-button-md intec-button-cl-common intec-button-transparent">
                            <?= GetMessage('C_W_SERVICES_C_S_BUTTON_ALL') ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
