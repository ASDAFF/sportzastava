<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\constructor\models\Build;
use intec\core\helpers\ArrayHelper;

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

?>
<div id="<?= $arResult['COMPONENT_HASH'] ?>" class="order-fast">
    <?php if (!empty($arResult['ELEMENT'])) {
        $productId = ArrayHelper::getValue($arResult, array('ELEMENT', 'ID'));
        $productQuantity = ArrayHelper::getValue($arResult, array('ELEMENT', 'QUANTITY'));
        $productName = ArrayHelper::getValue($arResult, array('ELEMENT', 'NAME'));
        $productMeasure = ArrayHelper::getValue($arResult, array('ELEMENT', 'MEASURE', 'SYMBOL_RUS'));
        $productPriceId = ArrayHelper::getValue($arResult, array('ELEMENT', 'PRICE', 'PRICE', 'ID'));
        $productPrice = ArrayHelper::getvalue($arResult, array('ELEMENT', 'PRICE', 'PRICE', 'PRICE'));
        $productDiscountPrice = ArrayHelper::getValue($arResult, array('ELEMENT', 'PRICE', 'DISCOUNT_PRICE'));
        $productCurrency = ArrayHelper::getValue($arResult, array('ELEMENT', 'PRICE', 'PRICE', 'CURRENCY'));
        $productPicture = ArrayHelper::getValue($arResult, array('ELEMENT', 'PICTURE', 'SRC'));
        $productFinalPrice = getSalePrice($productId, $productPriceId, $productDiscountPrice, $productQuantity, $productCurrency);
        ?>
        <div class="order-fast_product_wrapper">
            <div class="order-fast_product_name"><?= $productName ?></div>
            <div class="order-fast_product_quantity">
                <?= GetMessage('SOF_PRODUCT_QUANTITY') .': '. $productQuantity . $productMeasure ?>
            </div>
            <?php if (!empty($productPicture)) { ?>
                <div class="order-fast_product_picture">
                    <img src="<?= $productPicture ?>" alt="<?= $productName ?>" />
                </div>
            <?php } ?>
            <div class="order-fast_product_price"><?= CurrencyFormat($productFinalPrice * $productQuantity, $productCurrency) ?></div>
            <?php if ($productPrice != $productFinalPrice) { ?>
                <div class="order-fast_product_old_price"><?= CurrencyFormat($productPrice * $productQuantity, $productCurrency) ?></div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="order-fast_form_wrapper">
        <div class="order-fast_header">
            <span class="order-fast_title"><?= $arParams['TITLE'] ?></span>
        </div>
        <?php if (!empty($arResult['FORM_RESULT'])) {
            if (is_string($arResult['FORM_RESULT'])) { ?>
                <div class="order-fast_form_result order-fast_form_result_error">
                    <?= GetMessage('SOF_ERROR_'.$arResult['FORM_RESULT']) ?>
                </div>
            <?php } else {
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
            <form action="<?= $APPLICATION->GetCurPageParam() ?>" method="POST" class="intec-form">
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
                            }
                            ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($arResult['CONSENT']['SHOW']) { ?>
                    <div class="consent" style="margin-bottom: 15px;">
                        <div class="intec-contest-checkbox checked" style="margin-right: 5px; float: left;"></div>
                        <?= GetMessage('SOF_CONTEST', array(
                            '#URL#' => $arResult['CONSENT']['URL']
                        )) ?>
                    </div>
                <?php } ?>
                <div class="order-fast_bottom">
                    <button class="order-fast_send intec-button intec-button-cl-common intec-button-lg">
                        <?= $arParams['SEND'] ?>
                    </button>
                    <div class="order-fast_disclaimer">
                        <?= GetMessage('SOF_DISCLAIMER') ?>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
