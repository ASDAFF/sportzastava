<?php
/**
 * @var array $arResult
 * @var array $arParams
 */

use \intec\core\helpers\Html;
?>

<div class="intec-form">
    <?php if ($arResult['isFormNote'] == 'Y') { ?>
        <div class="contacts-form-note">
            <?= $arResult["FORM_NOTE"] ?>
        </div>

        <?
        switch ($arResult['arForm']['ID']) {
            case "8":
                $goal_id = "zakaz_zvonka";
                break;
            case "12":
                $goal_id = "zadat_vopros";
                break;
        }
        ?>
        <script type="text/javascript">
            $(function() {
                yaCounter49185655.reachGoal('<?=$goal_id;?>',function(){
                    console.log('form goal <?=$goal_id?>');
                });
            });
        </script>
    <?php } else { ?>
        <?= $arResult['FORM_HEADER'] ?>

        <?php if ($arResult["isFormErrors"] == 'Y') { ?>
            <div class="contacts-form-error">
                <?= $arResult["FORM_ERRORS_TEXT"] ?>
            </div>
        <?php } ?>

        <div class="intec-form-description"><?= $arResult['arForm']['DESCRIPTION'] ?></div>

        <?php foreach ($arResult['QUESTIONS'] as $question) { ?>
            <div class="intec-form-field">
                <div class="intec-form-caption">
                    <?= $question['CAPTION'] . ($question['REQUIRED'] == 'Y' ? $arResult['REQUIRED_SIGN'] : '') ?>
                    <?= $question['IS_INPUT_CAPTION_IMAGE'] == 'Y' ? '<br />'. $question['IMAGE']['HTML_CODE'] : '' ?>
                </div>
                <div class="intec-form-value <?=($question['REQUIRED'] == "Y") ? "req" : ""?>">
                    <?= $question['HTML_CODE'] ?>
                </div>
            </div>
        <?php } ?>

        <?php if ($arResult['isUseCaptcha'] == 'Y') { ?>
            <div class="contacts-form-field contacts-form-field-captcha">
                <div class="contacts-form-field-title">
                    <?= GetMessage('FRN_DEFAULT_FIELD_CAPTCHA') ?> *
                </div>
                <div class="contacts-form-field-content intec-form-value">
                    <input type="hidden" name="captcha_sid" value="<?= Html::encode($arResult["CAPTCHACode"]) ?>" />
                    <div class="contacts-form-captcha-image">
                        <img src="/bitrix/tools/captcha.php?captcha_sid=<?= Html::encode($arResult["CAPTCHACode"]) ?>" width="180" height="40" />
                    </div>
                    <input type="text" name="captcha_word" size="30" maxlength="50" value="" />
                </div>
            </div>
        <?php } ?>

        <? if ($arResult['CONSENT']['SHOW']) { ?>

            <?$APPLICATION->IncludeComponent("bitrix:main.userconsent.request", "userconsent.request",
                array(
                    "ID" => 1,
                    "IS_CHECKED" => "Y",
                    "AUTO_SAVE" => "N",
                    "IS_LOADED" => "Y",
                    "INPUT_NAME" => "RULE",
                    "REPLACE" => array(
                        "button_caption" => htmlspecialcharsbx(strlen(trim($arResult['arForm']['BUTTON'])) <= 0 ? GetMessage('FORM_ADD') : $arResult['arForm']['BUTTON']),
                    ),
                )
            );?>

        <? } ?>

        <div class="intec-form-buttons-wrap">
            <input <?= intval($arResult['F_RIGHT']) < 10 ? "disabled=\"disabled\"" : '' ?>
                   class="intec-button intec-button-cl-common intec-button-s-6"
                   id="intec_button_event"
                   type="submit"
                   name="web_form_submit"
                   value="<?= htmlspecialcharsbx(strlen(trim($arResult['arForm']['BUTTON'])) <= 0 ? GetMessage('FORM_ADD') : $arResult['arForm']['BUTTON']) ?>" />
            &nbsp;<input class="intec-button intec-button-cl-common intec-button-s-6" type="reset" value="<?= GetMessage('FORM_RESET') ?>" />
        </div>
    <?php } ?>

    <?= $arResult['FORM_FOOTER'] ?>
</div>
