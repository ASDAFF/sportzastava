<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die() ?>
<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;

global $USER;

if (!Loader::includeModule('intec.core'))
    return;

$arSubscription = ArrayHelper::getValue($arResult, 'SUBSCRIPTION');
$arRubrics = ArrayHelper::getValue($arResult, 'RUBRICS');
$bSubscribed = ArrayHelper::getValue($arSubscription, 'ID') != 0;
$bConfirmed = ArrayHelper::getValue($arSubscription, 'CONFIRMED') === 'Y';
$bFormatHtml = ArrayHelper::getValue($arSubscription, 'FORMAT') === 'html';
$sEmail = ArrayHelper::getValue($arSubscription, 'EMAIL');
$sEmail = !empty($sEmail) ? $sEmail : ArrayHelper::getValue($arResult, ['REQUEST', 'EMAIL']);

?>
<div class="intec-content">
    <div class="intec-content-wrapper">
        <?php
        foreach($arResult['MESSAGE'] as $sMessage)
            ShowMessage(['MESSAGE' => $sMessage, 'TYPE' => 'OK']);

        foreach($arResult['ERROR'] as $sError)
            ShowMessage(['MESSAGE' => $sError, 'TYPE' => 'ERROR']);

        if($arResult['ALLOW_ANONYMOUS'] == 'N' && !$USER->IsAuthorized()) {
            ShowMessage(['MESSAGE' => Loc::getMessage('SE_DEFAULT_ERROR'), 'TYPE' => 'ERROR']);
        } else { ?>
            <div class="subscribe-edit">
                <div class="subscribe-edit-wrapper">
                    <h4><?= Loc::getMessage('SE_DEFAULT_TITLE') ?></h4>
                    <div class="subscribe-edit-form">
                        <form action="<?= $arResult['FORM_ACTION'] ?>" method="POST">
                            <?= bitrix_sessid_post() ?>
                            <input type="hidden" name="PostAction" value="<?= $bSubscribed ? 'Update' : 'Add' ?>" />
                            <input type="hidden" name="ID" value="<?= $arSubscription['ID'] ?>" />
                            <input type="hidden" name="RUB_ID[]" value="0" />

                            <? if ($bSubscribed && !$bConfirmed) { ?>
                                <div class="subscribe-edit-confirm">
                                    <div class="subscribe-edit-confirm-title">
                                        <?= Loc::getMessage('SE_DEFAULT_CONFIRM_TITLE') ?>
                                    </div>
                                    <div class="subscribe-edit-confirm-description">
                                        <?= Loc::getMessage('SE_DEFAULT_CONFIRM_DESCRIPTION')?>
                                    </div>
                                    <?= Html::textInput('CONFIRM_CODE', null, [
                                        'class' => 'subscribe-edit-confirm-input intec-input',
                                        'placeholder' => Loc::getMessage('SE_DEFAULT_CONFIRM_INPUT')
                                    ]) ?>
                                    <input class="subscribe-edit-confirm-button intec-button intec-button-cl-common" type="submit" name="confirm" value="<?= Loc::getMessage('SE_DEFAULT_CONFIRM_BUTTON') ?>" />
                                </div>
                            <? } ?>

                            <div class="subscribe-edit-information">
                                <div class="row">
                                    <div class="subscribe-edit-information-email col-sm-4">
                                        <div class="subscribe-edit-information-email-title">
                                            <?= Loc::getMessage('SE_DEFAULT_INFORMATION_EMAIL') ?>:
                                        </div>
                                        <?= Html::textInput('EMAIL', $sEmail, [
                                            'class' => 'subscribe-edit-information-email-input intec-input intec-input-block',
                                            'placeholder' => Loc::getMessage('SE_DEFAULT_INFORMATION_EMAIL')
                                        ]) ?>
                                    </div>
                                    <div class="subscribe-edit-information-description col-sm-8">
                                        <div class="subscribe-edit-information-description-icon">!</div>
                                        <div class="subscribe-edit-information-description-text">
                                            <?= Loc::getMessage('SE_DEFAULT_INFORMATION_DESCRIPTION') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe-edit-settings">
                                <div class="row">
                                    <?php if (!empty($arRubrics)) { ?>
                                        <div class="subscribe-edit-settings-rubrics col-sm-4">
                                            <div class="subscribe-edit-settings-title">
                                                <?= Loc::getMessage('SE_DEFAULT_SETTINGS_RUBRICS') ?>:
                                            </div>
                                            <?php foreach ($arRubrics as $arRubric) { ?>
                                                <div class="subscribe-edit-settings-rubric">
                                                    <label class="intec-input intec-input-checkbox">
                                                        <?= Html::checkbox('RUB_ID[]', $arRubric['CHECKED'], [
                                                            'value' => $arRubric['ID']
                                                        ]) ?>
                                                        <span class="intec-input-selector"></span>
                                                        <span class="intec-input-text">
                                                            <?= $arRubric['NAME'] ?>
                                                        </span>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <div class="subscribe-edit-settings-format col-sm-8">
                                        <div class="subscribe-edit-settings-title">
                                            <?= Loc::getMessage('SE_DEFAULT_SETTINGS_FORMAT') ?>:
                                        </div>
                                        <div class="subscribe-edit-settings-format-options">
                                            <label class="intec-input intec-input-radio" style="margin-right: 10px;">
                                                <?= Html::radio('FORMAT', !$bFormatHtml, [
                                                    'value' => 'text'
                                                ]) ?>
                                                <span class="intec-input-selector"></span>
                                                <span class="intec-input-text">
                                                    <?= Loc::getMessage('SE_DEFAULT_SETTINGS_FORMAT_TEXT') ?>
                                                </span>
                                            </label>
                                            <label class="intec-input intec-input-radio">
                                                <?= Html::radio('FORMAT', $bFormatHtml, [
                                                    'value' => 'html'
                                                ]) ?>
                                                <span class="intec-input-selector"></span>
                                                <span class="intec-input-text">
                                                    <?= Loc::getMessage('SE_DEFAULT_SETTINGS_FORMAT_HTML') ?>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe-edit-buttons">
                                <input type="submit" class="intec-button intec-button-md intec-button-cl-common" value="<?= $bSubscribed ? Loc::getMessage('SE_DEFAULT_BUTTONS_EDIT') : Loc::getMessage('SE_DEFAULT_BUTTONS_ADD') ?>" style="margin-right: 20px;" />
                                <?php if ($arResult['CONSENT']['SHOW']) { ?>
                                    <label class="intec-input intec-input-checkbox">
                                        <?= Html::checkbox(null, true, [
                                            'disabled' => 'disabled'
                                        ]) ?>
                                        <span class="intec-input-selector"></span>
                                        <span class="intec-input-text">
                                            <?= Loc::getMessage('SE_DEFAULT_CONSENT', [
                                                '#URL#' => $arResult['CONSENT']['URL']
                                            ]) ?>
                                        </span>
                                    </label>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>