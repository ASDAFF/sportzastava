<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\JavaScript;
use intec\core\helpers\Type;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @global CMain $APPLICATION
 * @var string $sTemplateId
 */

$bTaglineDisplay =
    $arParams['TAGLINE_DISPLAY'] == 'Y' &&
    !empty($arParams['TAGLINE']);

$bMenuDisplay =
    $arParams['MENU_MAIN_DISPLAY'] == 'Y' &&
    $arParams['MENU_MAIN_DISPLAY_IN'] == 'header';

$bSearchDisplay =
    $arParams['DISPLAY_SEARCH'] == 'Y' &&
    $arParams['POSITION_SEARCH'] == 'header';
$bSearchType = $arParams['TYPE_SEARCH'];

$arPhones = ArrayHelper::getValue($arParams, 'PHONE');

if (!Type::isArray($arPhones))
    $arPhones = [];

$sPhone = ArrayHelper::getFirstValue($arParams['PHONE']);
$bPhoneDisplay =
    $arParams['PHONE_DISPLAY'] == 'Y' &&
    $arParams['PHONE_DISPLAY_IN'] == 'header' &&
    !empty($sPhone);

$bPhoneFormDisplay =
    $arParams['PHONE_FORM_DISPLAY'] == 'Y' &&
    !empty($arParams['PHONE_FORM']);

$bPhoneFormButtonType = $arParams['PHONE_FORM_BUTTON_TYPE'];

$bCompareDisplay =
    $arParams['COMPARE_DISPLAY'] == 'Y' &&
    !empty($arParams['COMPARE_CODE']) &&
    !empty($arParams['COMPARE_IBLOCK_ID']);

$bBasketDisplay =
    $arParams['BASKET_DISPLAY'] == 'Y';

$bBasketDelayDisplay =
    $arParams['BASKET_DELAY_DISPLAY'] == 'Y';

$bAuthDisplay =
    $arParams['AUTH_DISPLAY'] == 'Y' &&
    $arParams['POSITION_AUTH'] == 'header';

$bIconsDisplay =
    $bCompareDisplay ||
    $bBasketDisplay ||
    $bBasketDelayDisplay;

$bLocationDisplay =
    $arParams['LOCATION_DISPLAY'] == 'Y' &&
    !empty($arParams['LOCATION']) &&
    $arParams['POSITION_STICKERS'] == 'header';

$bMailDisplay =
    $arParams['MAIL_DISPLAY'] == 'Y' &&
    !empty($arParams['MAIL']) &&
    $arParams['POSITION_STICKERS'] == 'header';

$bStickersDisplay =
    $bLocationDisplay ||
    $bMailDisplay;

?>
<div class="header-content">
    <div class="intec-content">
        <div class="intec-content-wrapper">
            <div class="header-content-wrapper">
                <div class="header-content-wrapper-2">
                    <div class="header-content-wrapper-3">
                        <?if ($arParams['MENU_MAIN_DISPLAY'] == 'Y' && $arParams['MENU_MAIN_DISPLAY_IN'] == 'popup') {?>
                            <div class="header-content-item">
                                <span class="button-popup-menu-open glyph-icon-menu-icon"></span>
                            </div>
                        <?}?>
                        <div class="header-content-item">
                            <a href="<?= SITE_DIR ?>" class="header-content-item-wrapper header-content-logotype intec-image">
                                <div class="intec-aligner"></div>
                                <?php $APPLICATION->IncludeComponent(
                                    'bitrix:main.include',
                                    '.default',
                                    array(
                                        'AREA_FILE_SHOW' => 'file',
                                        'PATH' => $arResult['LOGOTYPE_PATH'],
                                        'EDIT_TEMPLATE' => null
                                    ),
                                    $component
                                );?>
                            </a>
                        </div>
                        <?php if ($bTaglineDisplay) { ?>
                            <div class="header-content-item">
                                <div class="header-content-item-wrapper">
                                    <div class="header-content-tagline">
                                        <div class="header-content-tagline-delimiter"></div>
                                        <div class="header-content-tagline-text">
                                            <?= $arParams['TAGLINE'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($bMenuDisplay) { ?>
                            <div class="header-content-item header-content-item-full header-content-menu">
                                <div class="header-content-item-wrapper header-content-menu-wrapper">
                                    <?php include('menu.component.php') ?>
                                </div>
                            </div>
                        <?php } elseif (($bSearchDisplay && $bSearchType == 'normal') || $bStickersDisplay) { ?>
                            <?php if (($bSearchDisplay && $bSearchType == 'normal') && !$bStickersDisplay) {?>
                                <div class="header-content-item header-content-item-full">
                                    <?php include('search.component.php') ?>
                                </div>
                            <?php } else if (($bSearchDisplay && $bSearchType == 'normal') && $bStickersDisplay) {?>
                                <div class="header-content-item">
                                    <?php include('search.component.php') ?>
                                </div>
                                <div class="header-content-item header-content-item-full">
                                    <div class="header-content-item-wrapper">
                                        <?php if ($bLocationDisplay) { ?>
                                            <div class="header-content-sticker-wrapper">
                                                <div class="intec-aligner"></div>
                                                <div class="header-content-sticker-icon glyph-icon-location intec-cl-text"></div>
                                                <div class="header-content-sticker-text">
                                                    <?= $arParams['LOCATION'] ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($bMailDisplay && !($bPhoneFormDisplay && $bPhoneFormButtonType == 'button')) { ?>
                                            <div class="header-content-sticker-wrapper">
                                                <div class="intec-aligner"></div>
                                                <div class="header-content-sticker-icon glyph-icon-mail intec-cl-text"></div>
                                                <a class="header-content-sticker-text" href="mailto:<?= $arParams['MAIL'] ?>"><?= $arParams['MAIL'] ?></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } elseif (!($bSearchDisplay && $bSearchType == 'normal') && $bStickersDisplay) {?>
                                <div class="header-content-item header-content-item-full">
                                    <div class="header-content-item-wrapper">
                                        <?php if ($bLocationDisplay) { ?>
                                            <div class="header-content-sticker-wrapper">
                                                <div class="intec-aligner"></div>
                                                <div class="header-content-sticker-icon glyph-icon-location intec-cl-text"></div>
                                                <div class="header-content-sticker-text">
                                                    <?= $arParams['LOCATION'] ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($bMailDisplay && !($bPhoneFormDisplay && $bPhoneFormButtonType == 'button')) { ?>
                                            <div class="header-content-sticker-wrapper">
                                                <div class="intec-aligner"></div>
                                                <div class="header-content-sticker-icon glyph-icon-mail intec-cl-text"></div>
                                                <a class="header-content-sticker-text" href="mailto:<?= $arParams['MAIL'] ?>"><?= $arParams['MAIL'] ?></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php }?>


                        <?php } else { ?>
                            <div class="header-content-item header-content-item-full">
                            </div>
                        <?php }?>
                        <?php if ($bPhoneDisplay) { ?>
                            <div class="header-content-item">
                                <div class="header-content-item-wrapper header-content-phone">
                                    <?php if ($bMailDisplay && ($bPhoneFormDisplay && $bPhoneFormButtonType == 'button')) {?>
                                        <div class="intec-aligner"></div>
                                        <div class="header-content-phone-button-wrapper">
                                    <?php }?>
                                            <div class="header-content-phone-text">
                                                <div class="header-content-phone-text-icon glyph-icon-phone intec-cl-text" style="padding-bottom: 3px"></div>
                                                <a class="header-content-phone-text-content" href="tel:<?= $sPhone ?>">
                                                    <?= $sPhone ?>
                                                </a>
                                                <?php if (count($arPhones) > 1) { ?>
                                                    <div class="header-content-phone-text-menu intec-cl-text-hover" data-type="phone">
                                                        <div class="header-content-phone-text-menu-button fa fa-angle-down"></div>
                                                        <div class="header-content-phone-text-menu-content" data-type="menu">
                                                            <?php $bFirst = true ?>
                                                            <?php foreach ($arParams['PHONE'] as $sPhone) { ?>
                                                                <?php if ($bFirst) { $bFirst = false; continue; } ?>
                                                                <a href="tel:<?= $sPhone ?>" class="header-content-phone-text-menu-phone intec-cl-text-hover">
                                                                    <?= $sPhone ?>
                                                                </a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                    <?php if ($bMailDisplay && ($bPhoneFormDisplay && $bPhoneFormButtonType == 'button')) {?>
                                            <div class="header-content-sticker-wrapper header-content-sticker-wrapper-in-phone">
                                                <div class="intec-aligner"></div>
                                                <div class="header-content-sticker-icon glyph-icon-mail intec-cl-text"></div>
                                                <a class="header-content-sticker-text" href="mailto:<?= $arParams['MAIL'] ?>"><?= $arParams['MAIL'] ?></a>
                                            </div>
                                        </div>
                                        <div class="intec-button intec-button-s-6 intec-button-r-3 intec-button-cl-common intec-button-transparent header-content-phone-call-button" data-action="call">
                                            <?= GetMessage('W_HEADER_PHONE_ORDER') ?>
                                        </div>
                                        <?php if (!defined('EDITOR')) { ?>
                                            <script type="text/javascript">
                                                (function ($, api) {
                                                    var root;

                                                    root = $(<?= JavaScript::toObject('#'.$sTemplateId) ?>);
                                                    root.find('[data-action=call]').on('click', function () {
                                                        universe.forms.show(<?= JavaScript::toObject([
                                                            'id' => $arParams['PHONE_FORM'],
                                                            'template' => '.default',
                                                            'parameters' => [
                                                                'AJAX_OPTION_ADDITIONAL' => $sTemplateId.'_FORM_CALL',
                                                                'CONSENT_URL' => $arResult['CONSENT_URL']
                                                            ],
                                                            'settings' => [
                                                                'title' => GetMessage('W_HEADER_PHONE_ORDER')
                                                            ]
                                                        ]) ?>);
                                                    });
                                                })(jQuery, intec);
                                            </script>
                                        <?php } ?>
                                    <?php } elseif ($bPhoneFormDisplay && $bPhoneFormButtonType == 'text') { ?>
                                        <div class="header-content-phone-call">
                                            <a class="header-content-phone-call-wrapper intec-cl-text intec-cl-text-light-hover" data-action="call">
                                                <?= GetMessage('W_HEADER_PHONE_ORDER') ?>
                                            </a>
                                        </div>
                                        <?php if (!defined('EDITOR')) { ?>
                                            <script type="text/javascript">
                                                (function ($, api) {
                                                    var root;

                                                    root = $(<?= JavaScript::toObject('#'.$sTemplateId) ?>);
                                                    root.find('[data-action=call]').on('click', function () {
                                                        universe.forms.show(<?= JavaScript::toObject([
                                                            'id' => $arParams['PHONE_FORM'],
                                                            'template' => '.default',
                                                            'parameters' => [
                                                                'AJAX_OPTION_ADDITIONAL' => $sTemplateId.'_FORM_CALL',
                                                                'CONSENT_URL' => $arResult['CONSENT_URL']
                                                            ],
                                                            'settings' => [
                                                                'title' => GetMessage('W_HEADER_PHONE_ORDER')
                                                            ]
                                                        ]) ?>);
                                                    });
                                                })(jQuery, intec);
                                            </script>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($bIconsDisplay) { ?>
                        <div class="header-content-item">
                            <div class="header-content-item-wrapper header-content-sale">
                                <?php $APPLICATION->IncludeComponent(
                                    'intec.universe:widget',
                                    'basket.icons',
                                    array(
                                        'SHOW_COMPARE' => $bCompareDisplay ? 'Y' : 'N',
                                        'SHOW_BASKET' => $bBasketDisplay ? 'Y' : 'N',
                                        'SHOW_DELAY' => $bBasketDelayDisplay ? 'Y' : 'N',
                                        'URL_BASKET' => $arResult['BASKET_URL'],
                                        'URL_COMPARE' => $arResult['COMPARE_URL'],
                                        'COMPARE_CODE' => $arParams['COMPARE_CODE'],
                                        'COMPARE_IBLOCK_ID' => $arParams['COMPARE_IBLOCK_ID']
                                    ),
                                    $component
                                ); ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if (($bSearchDisplay && $bSearchType == 'popup')) {?>
                            <div class="header-content-item">
                                <div class="header-content-item-wrapper">
                                    <?php include('search_header_popup.component.php')?>
                                </div>
                            </div>
                        <?php }?>
                        <?php if ($bAuthDisplay) { ?>
                            <div class="header-content-item">
                                <div class="header-content-item-wrapper">
                                    <?php $APPLICATION->IncludeComponent(
                                        'bitrix:system.auth.form',
                                        '.default',
                                        array(
                                            'LOGIN_URL' => $arResult['LOGIN_URL'],
                                            'PROFILE_URL' => $arResult['PROFILE_URL'],
                                            'FORGOT_PASSWORD_URL' => $arResult['FORGOT_PASSWORD_URL'],
                                            'REGISTER_URL' => $arResult['REGISTER_URL']
                                        ),
                                        $component
                                    ) ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?if ($arParams['MENU_MAIN_DISPLAY'] == 'Y' && $arParams['MENU_MAIN_DISPLAY_IN'] == 'popup') {?>
<div class="popup-menu-wrapper">
    <?php if ($arParams['POPUP_MENU_TYPE'] == 'catalog') {
        include('popup_menu.catalog.php');
    } else {
        include('popup_menu.full.php');
    } ?>
</div>
<script>
    $(document).on('click', '.button-popup-menu-open', function() {

        $('.popup-menu-wrapper').show('', function() {
            $(window).trigger('resize');
            $(this).css(
                {
                    'z-index': '1001'
                }
            );
            $(this).animate(
                {
                    opacity: 1
                },
                500
            );
            /*$('body').css(
                {
                    'overflow': 'hidden'
                }
            );*/
        })
    });
    $(document).on('click', '.button-popup-menu-close', function() {
        /*$('body').css(
            {
                overflow: ''
            }
        );*/

        $('.popup-menu-wrapper').animate(
            {
                opacity: 0
            },
            300,
            function() {
                $(this).css({
                    'z-index': '-1'
                });
                $(this).hide();
            }
        )
    });
</script>
<?}?>
