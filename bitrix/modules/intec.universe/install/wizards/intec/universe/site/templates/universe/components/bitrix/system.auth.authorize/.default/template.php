<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

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

$authUrl = $arResult['AUTH_URL'] ? $arResult['AUTH_URL'] : SITE_DIR .'auth/';
if ($arParams['AUTH_URL']) {
    $authUrl = $arParams['AUTH_URL'];
}

$this->setFrameMode(true);

?>
<div class="intec-content">
    <div class="intec-content-wrapper">
        <div class="system-auth-authorize main">
            <div class="h4">
                <?=GetMessage("AUTH_TITLE");?>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-7 login_page">
                    <?php
                    ShowMessage($arParams['~AUTH_RESULT']);
                    ShowMessage($arResult['ERROR_MESSAGE']);
                    /* <div class="header_grey"><?= GetMessage("AUTH_TITLE")?></div> */
                    ?>
                    <div class="login_form clearfix">
                        <form name="form_auth"
                              method="post"
                              target="_top"
                              action="<?= $authUrl ?>"
                              class="bx_auth_form intec-form">
                            <input type="hidden" name="AUTH_FORM" value="Y" />
                            <input type="hidden" name="TYPE" value="AUTH" />
                            <?php if (strlen($arParams['BACKURL']) > 0 || strlen($arResult['BACKURL']) > 0) { ?>
                                <input type="hidden" name="backurl" value="<?=($arParams['BACKURL'] ? $arParams['BACKURL'] : $arResult['BACKURL'])?>" />
                            <?php } ?>
                            <?php foreach ($arResult['POST'] as $key => $value) { ?>
                                <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
                            <?php } ?>
                            <div class="intec-form-field">
                                <div class="intec-form-caption"><?= GetMessage('AUTH_LOGIN') ?></div>
                                <div class="intec-form-value">
                                    <input class="intec-input intec-input-block login-input"
                                           type="text"
                                           name="USER_LOGIN"
                                           maxlength="255"
                                           value="<?= $arResult['LAST_LOGIN'] ?>" />
                                </div>
                            </div>
                            <div class="intec-form-field">
                                <div class="intec-form-caption"><?= GetMessage('AUTH_PASSWORD') ?></div>
                                <div class="intec-form-value">
                                    <input class="intec-input intec-input-block password-input"
                                           type="password"
                                           name="USER_PASSWORD"
                                           maxlength="255" />
                                </div>
                            </div>
                            <?php if ($arResult['SECURE_AUTH']) { ?>
                                <span class="bx-auth-secure" id="bx_auth_secure" title="<?= GetMessage('AUTH_SECURE_NOTE') ?>" style="display:none;">
                            <div class="bx-auth-secure-icon"></div>
                        </span>
                                <noscript>
                            <span class="bx-auth-secure" title="<?= GetMessage('AUTH_NONSECURE_NOTE') ?>">
                                <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                            </span>
                                </noscript>
                                <script type="text/javascript">
                                    document.getElementById('bx_auth_secure').style.display = 'inline-block';
                                </script>
                            <?php } ?>
                            <?php if ($arResult['CAPTCHA_CODE']) { ?>
                                <input type="hidden" name="captcha_sid" value="<?= $arResult['CAPTCHA_CODE'] ?>" />
                                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult['CAPTCHA_CODE'] ?>"
                                     width="180"
                                     height="40"
                                     alt="CAPTCHA" />
                                <?= GetMessage('AUTH_CAPTCHA_PROMT') ?>:
                                <input class="intec-input intec-input-block bx-auth-input"
                                       type="text"
                                       name="captcha_word"
                                       maxlength="50"
                                       value=""
                                       size="15" />
                            <?php } ?>
                            <div class="login-page-row row">
                                <?php if ($arParams['NOT_SHOW_LINKS'] != 'Y') { ?>
                                    <div class="col-xs-6 link">
                                        <a href="<?= $arParams['AUTH_FORGOT_PASSWORD_URL'] ? $arParams['AUTH_FORGOT_PASSWORD_URL'] : $arResult['AUTH_FORGOT_PASSWORD_URL'] ?>"
                                           rel="nofollow" class="intec-cl-text"><?= GetMessage('AUTH_FORGOT_PASSWORD_2') ?></a>
                                    </div>
                                <?php } ?>
                                <?php if ($arResult['STORE_PASSWORD'] == 'Y') { ?>
                                    <div class="col-xs-6 rememberme">
                                        <label for="USER_REMEMBER_D" class="USER_REMEMBER right intec-input intec-input-checkbox">
                                            <input type="checkbox" id="USER_REMEMBER_D" name="USER_REMEMBER" value="Y"/>
                                            <label for="USER_REMEMBER_D" class="intec-input-selector"></label>
                                            <label for="USER_REMEMBER_D" class="intec-input-text"><?= GetMessage('AUTH_REMEMBER_ME') ?></a></label>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="login-page-row row">
                                <?php if ($arResult['STORE_PASSWORD'] == 'Y') { ?>
                                    <div class="col-xs-12">
                                        <input type="submit"
                                               name="Login"
                                               class="intec-button intec-button-cl-common intec-button-lg login_button"
                                               value="<?= GetMessage('AUTH_AUTHORIZE') ?>" />
                                    </div>
                                <?php } ?>
                            </div>
                        </form>

                        <?php if ($arResult['AUTH_SERVICES']) { ?>
                            <div class="login-page_socserv_form">
                                <div class="login-page_socserv_form_title"><?= GetMessage('AUTH_SOCSERV_FORM_TITLE') ?></div>
                                <?php $APPLICATION->IncludeComponent(
                                    'bitrix:socserv.auth.form',
                                    '',
                                    array(
                                        'AUTH_SERVICES' => $arResult['AUTH_SERVICES'],
                                        'CURRENT_SERVICE' => $arResult['CURRENT_SERVICE'],
                                        'AUTH_URL' => $arResult['AUTH_URL'],
                                        'POST' => $arResult['POST'],
                                        'SUFFIX' => 'main'
                                    ),
                                    $component,
                                    array()
                                ); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-5 reg_block">
                    <a href="<?= $arParams['AUTH_REGISTER_URL'] ? $arParams['AUTH_REGISTER_URL'] : $arResult['AUTH_REGISTER_URL'] ?>"
                       class="intec-button intec-button-cl-common intec-button-lg registration_button solid_button">
                        <?= GetMessage('AUTH_REGISTRATION') ?>
                    </a>
                    <div class="label_text"><?= GetMessage('TEXT_LABEL') ?></div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            <?php if (strlen($arResult['LAST_LOGIN']) > 0) { ?>
            try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
            <?php } else { ?>
            try{document.form_auth.USER_LOGIN.focus();}catch(e){}
            <?php } ?>
        </script>
    </div>
</div>
