<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 */

$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);
$sFormType = $arResult['FORM_TYPE'];
?>
<?php $oFrame = $this->createFrame() ?>
<?php $oFrame->begin() ?>
    <?php if ($sFormType == 'login') { ?>
        <?php if ($arParams['LOGIN_DISPLAY'] == 'Y') { ?>
            <a href="<?= $arResult['LOGIN_URL'] ?>" class="header-panel-icon">
                <i class="glyph-icon-login_2<?= $arParams['MOBILE_VIEW'] == 'default' ? ' intec-cl-text' : null ?>"></i>
            </a>
        <?php } ?>
    <?php } else { ?>
        <?php if ($arParams['PROFILE_DISPLAY'] == 'Y') { ?>
            <a href="<?= $arResult['PROFILE_URL'] ?>" class="header-panel-icon">
                <i class="glyph-icon-user_2<?= $arParams['MOBILE_VIEW'] == 'default' ? ' intec-cl-text' : null ?>"></i>
            </a>
        <?php } ?>
        <?php if ($arParams['LOGOUT_DISPLAY'] == 'Y') { ?>
            <a href="<?= $arResult['LOGOUT_URL'] ?>" class="header-panel-icon">
                <i class="glyph-icon-logout_2<?= $arParams['MOBILE_VIEW'] == 'default' ? ' intec-cl-text' : null ?>"></i>
            </a>
        <?php } ?>
    <?php } ?>
<?php $oFrame->end() ?>