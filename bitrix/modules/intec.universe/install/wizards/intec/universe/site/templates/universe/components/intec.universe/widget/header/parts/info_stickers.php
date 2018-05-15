<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<div class="header-info-stickers">
    <div class="header-info-stickers-wrapper">
        <?php if ($bLocationDisplay) { ?>
            <div class="header-info-item header-info-sticker">
                <div class="header-info-item header-info-sticker-wrapper">
                    <div class="intec-aligner"></div>
                    <div class="header-info-sticker-icon glyph-icon-location intec-cl-text"></div>
                    <div class="header-info-sticker-text">
                        <?= $arParams['LOCATION'] ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($bMailDisplay) { ?>
            <div class="header-info-item header-info-sticker">
                <div class="header-info-item header-info-sticker-wrapper">
                    <div class="intec-aligner"></div>
                    <div class="header-info-sticker-icon glyph-icon-mail intec-cl-text"></div>
                    <a class="header-info-sticker-text" href="mailto:<?= $arParams['MAIL'] ?>"><?= $arParams['MAIL'] ?></a>
                </div>
            </div>
        <?php } ?>
        <?php if ($bSocialDisplay && $bSocialPosition == 'contacts') {?>
            <div class="header-info-item header-info-sticker">
                <?include('social.php');?>
            </div>
        <?php }?>
        <?php if ($bPhoneDisplay) { ?>
            <div class="header-info-phone header-info-item header-info-sticker">
                <div class="header-info-phone-wrapper header-info-item header-info-sticker-wrapper">
                    <div class="intec-aligner"></div>
                    <div class="header-info-sticker-icon glyph-icon-phone intec-cl-text"></div>
                    <a class="header-info-sticker-text" href="tel:<?= $sPhone ?>">
                        <?= $sPhone ?>
                    </a>
                    <?php if (count($arPhones) > 1) { ?>
                        <div class="header-info-phone-menu intec-cl-text-hover" data-type="phone">
                            <div class="header-info-phone-menu-button fa fa-angle-down"></div>
                            <div class="header-info-phone-menu-content" data-type="menu">
                                <?php $bFirst = true ?>
                                <?php foreach ($arParams['PHONE'] as $sPhone) { ?>
                                    <?php if ($bFirst) { $bFirst = false; continue; } ?>
                                    <a href="tel:<?= $sPhone ?>" class="header-info-phone-menu-phone intec-cl-text-hover">
                                        <?= $sPhone ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="clearfix"></div>
    </div>
</div>