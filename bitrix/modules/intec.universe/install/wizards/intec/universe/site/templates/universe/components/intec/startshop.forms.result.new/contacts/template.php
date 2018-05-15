<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?php
use intec\Core;
use intec\constructor\models\Build;
?>
<?
$oBuild = Build::getCurrent();
if (!empty($oBuild)) {
    $oPage = $oBuild->getPage();
    $oProperties = $oPage->getProperties();
    $personal_data = $oProperties->get('inform_about_processing_personal_data');
}?>
<?$this->setFrameMode(true);?>
<?
    $sUniqueID = 'form_'.spl_object_hash($this);

    if ($arParams['AJAX_MODE'] == 'Y') {
        $sAjaxID = CAjax::GetComponentID($component->__name, $component->__template->__name, '');
        $APPLICATION->AddHeadString("<style>#wait_comp_".$sAjaxID." {display: none !important;}</style>");
    }
?>
<?if (($arResult['ERROR']['CODE'] == 0 || $arResult['ERROR']['CODE'] >= 4) && !$arResult['SENT']):?>
    <div class="contacts-form intec-form">
        <form action="<?=$APPLICATION->GetCurPage()?>" id="<?=$sUniqueID?>" class="startshop-forms-result-new default">

            <div class="contacts-form-title"><?=htmlspecialcharsbx($arResult['LANG'][LANGUAGE_ID]['NAME'])?></div>
            <div class="contacts-form-fields">
                <div class="contacts-form-fields-wrapper">
                    <input type="hidden" name="<?=htmlspecialcharsbx($arParams['REQUEST_VARIABLE_ACTION'])?>" value="send" />
                    <?foreach ($arResult['PROPERTIES'] as $iPropertyID => $arProperty):?>
                        <?if ($arProperty['TYPE'] == STARTSHOP_FORM_PROPERTY_TYPE_TEXT):?>
                            <div class="contacts-form-field contacts-form-field-text">
                                <div class="contacts-form-field-title">
                                    <?=$arProperty['LANG'][LANGUAGE_ID]['NAME']?>
                                    <?if ($arProperty['REQUIRED'] == 'Y'):?>
                                        *
                                    <?endif;?>
                                </div>
                                <div class="contacts-form-field-content intec-form-value">
                                    <input class="intec-input intec-input-block" type="text" name="<?=htmlspecialcharsbx($arProperty['CODE'])?>" value="<?=htmlspecialcharsbx($_REQUEST[$arProperty['CODE']])?>"<?=$arProperty['READONLY'] == 'Y' ? ' disabled="disabled"' : ''?> />
                                    <?if (!empty($arProperty['DATA']['MASK'])):?>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#<?=$sUniqueID?>')
                                                    .find('input[name="<?=htmlspecialcharsbx($arProperty['CODE'])?>"]')
                                                    .mask(<?=CUtil::PhpToJSObject($arProperty['DATA']['MASK'])?>, {
                                                        'placeholder': <?=CUtil::PhpToJSObject($arProperty['DATA']['MASK_PLACEHOLDER'])?>
                                                    });
                                            })
                                        </script>
                                    <?endif;?>
                                </div>
                                <?if ($arResult['ERROR']['CODE'] == 5):?>
                                    <?if (array_key_exists($arProperty['CODE'], $arResult['ERROR']['FIELDS']['EMPTY'])):?>
                                        <div class="startshop-forms-result-new-message-error">
                                            <?=GetMessage('SFRN_FIELD_EMPTY')?>
                                        </div>
                                    <?endif;?>
                                    <?if (array_key_exists($arProperty['CODE'], $arResult['ERROR']['FIELDS']['INVALID'])):?>
                                        <div class="startshop-forms-result-new-message-error">
                                            <?=GetMessage('SFRN_FIELD_INVALID')?>
                                        </div>
                                    <?endif;?>
                                <?endif;?>
                            </div>
                        <?elseif ($arProperty['TYPE'] == STARTSHOP_FORM_PROPERTY_TYPE_TEXTAREA):?>
                            <div class="contacts-form-field contacts-form-field-textarea">
                                <div class="contacts-form-field-title">
                                    <?=$arProperty['LANG'][LANGUAGE_ID]['NAME']?>
                                    <?if ($arProperty['REQUIRED'] == 'Y'):?>
                                        *
                                    <?endif;?>
                                </div>
                                <div class="contacts-form-field-content intec-form-value">
                                    <textarea class="intec-input intec-input-block" name="<?=htmlspecialcharsbx($arProperty['CODE'])?>" <?=$arProperty['READONLY'] == 'Y' ? ' disabled="disabled"' : ''?>><?=htmlspecialcharsbx($_REQUEST[$arProperty['CODE']])?></textarea>
                                </div>
                                <?if ($arResult['ERROR']['CODE'] == 5):?>
                                    <?if (array_key_exists($arProperty['CODE'], $arResult['ERROR']['FIELDS']['EMPTY'])):?>
                                        <div class="startshop-forms-result-new-message-error">
                                            <?=GetMessage('SFRN_FIELD_EMPTY')?>
                                        </div>
                                    <?endif;?>
                                <?endif;?>
                            </div>
                        <?elseif ($arProperty['TYPE'] == STARTSHOP_FORM_PROPERTY_TYPE_RADIO):?>
                            <div class="contacts-form-field contacts-form-field-text">
                                <div class="contacts-form-field-title">
                                    <?=$arProperty['LANG'][LANGUAGE_ID]['NAME']?>
                                    <?if ($arProperty['REQUIRED'] == 'Y'):?>
                                        *
                                    <?endif;?>
                                </div>
                                <div class="contacts-form-field-content">
                                    <div class="startshop-forms-result-new-row-control-box">
                                        <div class="startshop-forms-result-new-row-control-box-wrapper">
                                            <?foreach($arProperty['DATA']['VALUES'] as $iValueID => $arValue):?>
                                                <div class="startshop-forms-result-new-row-control-box-line">
                                                    <label class="startshop-button-radio">
                                                        <input type="radio" name="<?=htmlspecialcharsbx($arProperty['CODE'])?>" value="<?=htmlspecialcharsbx($arValue['VALUE'])?>"<?=$_REQUEST[$arProperty['CODE']] == $arValue['VALUE'] ? ' checked="checked"' : ''?><?=$arProperty['READONLY'] == 'Y' ? ' disabled="disabled"' : ''?> />
                                                        <div class="selector"></div>
                                                        <div class="text"><?=htmlspecialcharsbx($arValue['VALUE'])?></div>
                                                    </label>
                                                </div>
                                            <?endforeach;?>
                                        </div>
                                    </div>
                                </div>
                                <?if ($arResult['ERROR']['CODE'] == 5):?>
                                    <?if (array_key_exists($arProperty['CODE'], $arResult['ERROR']['FIELDS']['EMPTY'])):?>
                                        <div class="startshop-forms-result-new-message-error">
                                            <?=GetMessage('SFRN_FIELD_EMPTY')?>
                                        </div>
                                    <?endif;?>
                                <?endif;?>
                            </div>
                        <?elseif ($arProperty['TYPE'] == STARTSHOP_FORM_PROPERTY_TYPE_CHECKBOX):?>
                            <div class="contacts-form-field contacts-form-field-text">
                                <div class="startshop-forms-result-new-row-control">
                                    <div class="startshop-forms-result-new-row-control-box startshop-input-box">
                                        <div class="startshop-forms-result-new-row-control-box-wrapper">
                                            <div class="startshop-forms-result-new-row-control-box-line">
                                                <input type="hidden" name="<?=htmlspecialcharsbx($arProperty['CODE'])?>" value="N" />
                                                <label class="startshop-button-checkbox">
                                                    <input type="checkbox" name="<?=htmlspecialcharsbx($arProperty['CODE'])?>" value="Y"<?=$_REQUEST[$arProperty['CODE']] == 'Y' ? ' checked="checked"' : ''?><?=$arProperty['READONLY'] == 'Y' ? ' disabled="disabled"' : ''?> />
                                                    <div class="selector"></div>
                                                    <div class="text"><?=htmlspecialcharsbx($arProperty['LANG'][LANGUAGE_ID]['NAME'])?></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?elseif ($arProperty['TYPE'] == STARTSHOP_FORM_PROPERTY_TYPE_SELECT):?>
                            <div class="contacts-form-field contacts-form-field-text">
                                <div class="startshop-forms-result-new-row-name startshop-forms-result-new-table-cell-name">
                                    <?=$arProperty['LANG'][LANGUAGE_ID]['NAME']?>
                                    <?if ($arProperty['REQUIRED'] == 'Y'):?>
                                        <span class="startshop-forms-result-new-required">*</span>
                                    <?endif;?>
                                </div>
                                <div class="startshop-forms-result-new-row-control">
                                    <select name="<?=htmlspecialcharsbx($arProperty['CODE'])?>" class="startshop-input-select startshop-input-select-standart"<?=$arProperty['READONLY'] == 'Y' ? ' disabled="disabled"' : ''?>>
                                        <?foreach($arProperty['DATA']['VALUES'] as $iValueID => $arValue):?>
                                            <option value="<?=htmlspecialcharsbx($arValue['VALUE'])?>"<?=$_REQUEST[$arProperty['CODE']] == $arValue['VALUE'] ? ' selected="selected"' : ''?>><?=htmlspecialcharsbx($arValue['VALUE'])?></option>
                                        <?endforeach;?>
                                    </select>
                                </div>
                                <?if ($arResult['ERROR']['CODE'] == 5):?>
                                    <?if (array_key_exists($arProperty['CODE'], $arResult['ERROR']['FIELDS']['EMPTY'])):?>
                                        <div class="startshop-forms-result-new-message-error">
                                            <?=GetMessage('SFRN_FIELD_EMPTY')?>
                                        </div>
                                    <?endif;?>
                                <?endif;?>
                            </div>
                        <?elseif ($arProperty['TYPE'] == STARTSHOP_FORM_PROPERTY_TYPE_MULTISELECT):?>
                            <div class="contacts-form-field contacts-form-field-text">
                                <div class="startshop-forms-result-new-row-name startshop-forms-result-new-table-cell-name">
                                    <?=$arProperty['LANG'][LANGUAGE_ID]['NAME']?>
                                    <?if ($arProperty['REQUIRED'] == 'Y'):?>
                                        <span class="startshop-forms-result-new-required">*</span>
                                    <?endif;?>
                                </div>
                                <div class="startshop-forms-result-new-row-control">
                                    <select name="<?=htmlspecialcharsbx($arProperty['CODE'])?>[]" multiple="multiple" class="startshop-input-multiselect startshop-input-multiselect-standart"<?=$arProperty['READONLY'] == 'Y' ? ' disabled="disabled"' : ''?>>
                                        <?foreach($arProperty['DATA']['VALUES'] as $iValueID => $arValue):?>
                                            <?
                                            $bSelected = false;

                                            if (is_array($_REQUEST[$arProperty['CODE']])) {
                                                $bSelected = in_array($arValue['VALUE'], $_REQUEST[$arProperty['CODE']]);
                                            } else {
                                                $bSelected = $_REQUEST[$arProperty['CODE']] == $arValue['VALUE'];
                                            }
                                            ?>
                                            <option value="<?=htmlspecialcharsbx($arValue['VALUE'])?>"<?=$bSelected ? ' selected="selected"' : ''?>><?=htmlspecialcharsbx($arValue['VALUE'])?></option>
                                            <?unset($bSelected);?>
                                        <?endforeach;?>
                                    </select>
                                </div>
                                <?if ($arResult['ERROR']['CODE'] == 5):?>
                                    <?if (array_key_exists($arProperty['CODE'], $arResult['ERROR']['FIELDS']['EMPTY'])):?>
                                        <div class="startshop-forms-result-new-message-error">
                                            <?=GetMessage('SFRN_FIELD_EMPTY')?>
                                        </div>
                                    <?endif;?>
                                <?endif;?>
                            </div>
                        <?elseif ($arProperty['TYPE'] == STARTSHOP_FORM_PROPERTY_TYPE_PASSWORD):?>
                            <div class="contacts-form-field contacts-form-field-text">
                                <div class="startshop-forms-result-new-row-name startshop-forms-result-new-table-cell-name">
                                    <?=$arProperty['LANG'][LANGUAGE_ID]['NAME']?>
                                    <?if ($arProperty['REQUIRED'] == 'Y'):?>
                                        <span class="startshop-forms-result-new-required">*</span>
                                    <?endif;?>
                                </div>
                                <div class="startshop-forms-result-new-row-control">
                                    <input type="password" name="<?=htmlspecialcharsbx($arProperty['CODE'])?>" class="startshop-input-text startshop-input-text-standart" value="<?=htmlspecialcharsbx($_REQUEST[$arProperty['CODE']])?>" />
                                </div>
                                <?if ($arResult['ERROR']['CODE'] == 5):?>
                                    <?if (array_key_exists($arProperty['CODE'], $arResult['ERROR']['FIELDS']['EMPTY'])):?>
                                        <div class="startshop-forms-result-new-message-error">
                                            <?=GetMessage('SFRN_FIELD_EMPTY')?>
                                        </div>
                                    <?endif;?>
                                <?endif;?>
                            </div>
                        <?elseif ($arProperty['TYPE'] == STARTSHOP_FORM_PROPERTY_TYPE_HIDDEN):?>
                            <input type="hidden" name="<?=htmlspecialcharsbx($arProperty['CODE'])?>" value="<?=htmlspecialcharsbx($_REQUEST[$arProperty['CODE']])?>"<?=$arProperty['READONLY'] == 'Y' ? ' disabled="disabled"' : ''?> />
                        <?endif;?>
                    <?endforeach;?>
                    <?if ($arResult['USE_CAPTCHA'] == 'Y'):?>
                        <div class="contacts-form-field contacts-form-field-text">
                            <?$sCaptchaSID = $APPLICATION->CaptchaGetCode();?>
                            <input type="hidden" name="<?=htmlspecialcharsbx($arParams['FORM_VARIABLE_CAPTCHA_SID'])?>" value="<?=$sCaptchaSID?>" />
                            <div class="contacts-form-field-title">
                                <?=GetMessage('SFRN_CAPTCHA_CAPTION')?> *
                            </div>
                            <div class="contacts-form-field-content intec-form-value">
                                <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$sCaptchaSID?>" alt="CAPTCHA" />
                                <br>
                                <br>
                            </div>
                            <div class="contacts-form-field-content intec-form-value">
                                <input type="text" class="intec-input intec-input-block" name="<?=htmlspecialcharsbx($arParams['FORM_VARIABLE_CAPTCHA_CODE'])?>" value="<?=htmlspecialcharsbx($_REQUEST[$arParams['FORM_VARIABLE_CAPTCHA_CODE']])?>" />
                            </div>
                            <?if ($arResult['ERROR']['CODE'] == 4):?>
                                <div class="startshop-forms-result-new-message-error">
                                    <?=GetMessage('SFRN_CAPTCHA_INVALID')?>
                                </div>
                            <?endif;?>
                        </div>
                    <?endif;?>
                </div>
            </div>
            <div class="contacts-form-footer clearfix">
                <?if($personal_data){?>
                    <div class="consent" style="float: left; margin-right: 13px; margin-top: 9px;">
                        <div class="intec-contest-checkbox checked" style="margin-right: 10px; float: left; margin-top: 5px;"></div>

                        <?=GetMessage("F_R_N_CONTEST",array(
                            "#URL#" => $arParams["CONSENT_URL"]
                        ));?>
                    </div>
                <?}?>
                <input type="submit" class="intec-button intec-button-cl-common intec-button-s-5" value="<?=$arResult['LANG'][LANGUAGE_ID]['BUTTON']?>" style="float: right;" />
            </div>

        </form>
    </div>
<?elseif ($arResult['SENT']):?>
    <div class="startshop-forms-result-new default">
        <div class="startshop-forms-result-new-wrapper">
            <div class="startshop-forms-result-new-sent">
                <?=nl2br($arResult['LANG'][LANGUAGE_ID]['SENT'])?>
            </div>
        </div>
    </div>
<?else:?>
    <div class="startshop-forms-result-new default">
        <div class="startshop-forms-result-new-wrapper">
            <?if ($arResult['ERROR']['CODE'] == 1):?>
                <div class="startshop-forms-result-new-message-error">
                    <?=GetMessage('SFRN_ERROR_FORM_NOT_EXISTS')?>
                </div>
            <?elseif ($arResult['ERROR']['CODE'] == 2):?>
                <div class="startshop-forms-result-new-message-error">
                    <?=GetMessage('SFRN_ERROR_FORM_INBOUND_SITE')?>
                </div>
            <?elseif ($arResult['ERROR']['CODE'] == 3):?>
                <div class="startshop-forms-result-new-message-error">
                    <?=GetMessage('SFRN_ERROR_FORM_FIELDS_NOT_EXISTS')?>
                </div>
            <?endif;?>
        </div>
    </div>
<?endif;?>
