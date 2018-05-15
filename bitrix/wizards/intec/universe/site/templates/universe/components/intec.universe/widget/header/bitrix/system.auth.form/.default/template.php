<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\JavaScript;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 */

if (!CModule::IncludeModule('intec.core'))
    return;

$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);
$sFormType = $arResult['FORM_TYPE'];

$authParams = $arParams;
$authParams['AJAX_MODE'] = 'N';
$authParams['AUTH_URL'] = $arParams["LOGIN_URL"];
$authParams["AUTH_FORGOT_PASSWORD_URL"] = $arParams["FORGOT_PASSWORD_URL"];
$authParams["AUTH_REGISTER_URL"] = $arParams["REGISTER_URL"];

$oFrame = $this->createFrame();
$oFrame->begin();
?>
    <div class="header-info-authorization" id="<?= $sTemplateId ?>">
        <?php if ($sFormType == 'login') { ?>
            <div class="header-info-button intec-cl-text-hover" data-action="login">
                <div class="intec-aligner"></div>
                <div class="header-info-button-icon glyph-icon-login_2"></div>
                <div class="header-info-button-text">
                    <?= GetMessage('W_HEADER_S_A_F_LOGIN') ?>
                </div>
            </div>
        <?php } else { ?>
            <a href="<?= $arResult['PROFILE_URL'] ?>" class="header-info-button intec-cl-text-hover">
                <div class="intec-aligner"></div>
                <div class="header-info-button-icon glyph-icon-user_2"></div>
                <?php if ($arParams['FIXED'] != 'Y' ) {?>
                    <div class="header-info-button-text">
                        <?= $arResult['USER_LOGIN'] ?>
                    </div>
                <?}?>
            </a>
            <?php if ($arParams['FIXED'] != 'Y' ) {?>
                <a href="<?= $arResult['LOGOUT_URL'] ?>" class="header-info-button">
                    <div class="intec-aligner"></div>
                    <div class="header-info-button-icon glyph-icon-logout_2"></div>
                    <div class="header-info-button-text">
                        <?= GetMessage('W_HEADER_S_A_F_LOGOUT') ?>
                    </div>
                </a>
            <?php }?>
        <?php } ?>
        <?php if (!defined('EDITOR')) { ?>
            <div class="auth_popup_container" style="display: none;">
                <?php $APPLICATION->IncludeComponent(
                    'bitrix:system.auth.authorize',
                    'popup',
                    $authParams,
                    $component
                ) ?>
            </div>
            <script type="text/javascript">
                (function ($, api) {
                    var root = $(<?= JavaScript::toObject('#'.$sTemplateId) ?>);
                    var buttons = {
                        'login': root.find('[data-action=login]')
                    };

                    buttons.login.on('click', function () {
                        var popup = new BX.PopupWindow(
                            'authPopup',
                            null,
                            {
                                content: $(<?= JavaScript::toObject('#' . $sTemplateId . ' .auth_popup_container') ?>).clone().get(0),
                                title: <?= JavaScript::toObject(GetMessage('W_HEADER_S_A_F_AUTH_FORM_TITLE')) ?>,
                                closeIcon: {
                                    right: '20px',
                                    top: '22px'
                                },
                                zIndex: 0,
                                offsetLeft: 0,
                                offsetTop: 0,
                                width: 800,
                                overlay: true,
                                titleBar: {
                                    content: BX.create('span', {
                                        html: <?= JavaScript::toObject(GetMessage('W_HEADER_S_A_F_AUTH_FORM_TITLE')) ?>,
                                        props: {
                                            className: 'access-title-bar'
                                        }
                                    })
                                }
                            });
                        popup.show();
                    });
                })(jQuery, intec);
            </script>
        <?php } ?>
    </div>
<?php $oFrame->end(); ?>