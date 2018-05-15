<?php

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

$lang = array(
    'TITLE' => empty($arParams['TITLE']) ? GetMessage('SOF_DEFAULT_TITLE') : $arParams['TITLE'],
    'SEND' => empty($arParams['SEND']) ? GetMessage('SOF_DEFAULT_SEND') : $arParams['SEND']
);
?>
<div id="<?= $arResult['COMPONENT_HASH'] ?>" class="order-fast clearfix">
    <?php if (!empty($arResult['ELEMENT'])) { ?>
        <div class="order-fast_product_wrapper">
            <div class="order-fast_product_name"><?= $arResult['ELEMENT']['NAME'] ?></div>
            <?php if (!empty($arResult['ELEMENT']['PICTURE'])) { ?>
                <div class="order-fast_product_picture">
                    <img src="<?= $arResult['ELEMENT']['PICTURE']['SRC'] ?>"
                         alt="<?= $arResult['ELEMENT']['NAME'] ?>" />
                </div>
            <?php } ?>
            <div class="order-fast_product_price">
                <?= CurrencyFormat($arResult['ELEMENT']['PRICE']['PRICE'], $arResult['ELEMENT']['PRICE']['CURRENCY']) ?>
            </div>
        </div>
    <?php } ?>
    <div class="order-fast_form_wrapper">
        <div class="order-fast_header">
            <span class="order-fast_title"><?= $lang['TITLE'] ?></span>
        </div>
        <?php if (!empty($arResult['FORM_RESULT'])) {

            if (is_string($arResult['FORM_RESULT'])) { ?>
                <div class="order-fast_form_result order-fast_form_result_error">
                    <?= $arResult['FORM_RESULT'] ?>
                </div>
            <?php } else {

                if (!empty($arResult['FORM_RESULT']['message'])) { ?>
                    <!--<?php var_dump($arResult['FORM_RESULT']['message']) ?>-->
                <?php }

                if (!empty($arResult['FORM_RESULT']['result'])) {
                    if ($arResult['FORM_RESULT']['result'] == 'Y') { ?>
                        <div class="order-fast_form_result order-fast_form_result_success">
                            <?= GetMessage('SOF_FORM_RESULT_SUCCESS') ?>
                        </div>
                        <script type="text/javascript">
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        </script>
                    <?php } else { ?>
                        <div class="order-fast_form_result order-fast_form_result_error">
                            <?= GetMessage('SOF_FORM_RESULT_ERROR') ?>
                        </div>
                    <?php }
                }
            }
        }

        if ($arResult['SHOW_FORM']) { ?>
            <form action="<?= $APPLICATION->GetCurPageParam() ?>" method="POST" class="intec-web-form">
                <?php if (!empty($arParams['PERSON_TYPE_ID'])) { ?>
                    <input type="hidden" name="PERSON_TYPE_ID" value="<?= $arParams['PERSON_TYPE_ID'] ?>" />
                <?php }
                if (!empty($arParams['DELIVERY_ID'])) { ?>
                    <input type="hidden" name="DELIVERY_ID" value="<?= $arParams['DELIVERY_ID'] ?>" />
                <?php }
                if (!empty($arParams['PAYMENT_ID'])) { ?>
                    <input type="hidden" name="PAYMENT_ID" value="<?= $arParams['PAYMENT_ID'] ?>" />
                <?php }
                if (!empty($arParams['PRODUCT_ID'])) { ?>
                    <input type="hidden" name="PRODUCT_ID" value="<?= $arParams['PRODUCT_ID'] ?>" />
                <?php } ?>
                <?php foreach ($arResult['ORDER_PROPERTIES'] as $id => $property) {
                    if ($property['TYPE'] == 'LOCATION')
                        continue;
                    ?>
                    <div class="intec-form-field order-fast-field-type-<?= strtolower($property['TYPE']) ?>">
                        <div class="intec-form-caption">
                            <?php if (!empty($property['IS_EMPTY'])) { ?>
                                <span class="requied-firld-is-empty"><?= GetMessage('SOF_REQUIED_FIELD') ?></span>
                            <?php } ?>
                            <?= $property['NAME'] ?><?= $property['REQUIED'] ? '<span class="required-sign">*</span>' : '' ?>
                        </div>
                        <div class="intec-form-value">
                            <?php
                            switch ($property['TYPE']) {
                                case 'TEXT':
                                    ?>
                                    <input type="text"
                                           name="<?= $property['CODE'] ?>"
                                           class=""
                                           value="<?= $property['DEFAULT_VALUE'] ?>" />
                                    <?php
                                    break;
                                case 'TEXTAREA':
                                    ?>
                                    <textarea name="<?= $property['CODE'] ?>"><?= $property['DEFAULT_VALUE'] ?></textarea>
                                    <?php
                                    break;
                                /*case 'CHECKBOX':
                                    ?>
                                    <input type="checkbox" name="<?= $property['CODE'] ?>" class="" />
                                    <?php
                                    break;
                                case 'RADIO':
                                    ?>
                                    <input type="radio" name="<?= $property['CODE'] ?>" class="" />
                                    <?php
                                    break;
                                case 'SELECT':
                                    ?>
                                    <select name="<?= $property['CODE'] ?>" class=""></select>
                                    <?php
                                    break;
                                case 'MULTISELECT':
                                    ?>
                                    <select name="<?= $property['CODE'] ?>" multiple class=""></select>
                                    <?php
                                    break;*/
                            }
                            ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="order-fast_bottom">
                    <button class="order-fast_send intec-button intec-button-cl-common intec-button-lg">
                        <?= $lang['SEND'] ?>
                    </button>
                    <div class="order-fast_disclaimer">
                        <?= GetMessage('SOF_DISCLAIMER') ?>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
