<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Localization\Loc;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;

/**
 * @global $APPLICATION
 * @global $USER
 * @var array $arParams
 * @var array $arResult
 */

$arImage = null;
$arPrice = ArrayHelper::getValue($arResult, ['PRODUCT', 'STARTSHOP', 'PRICES', 'MINIMAL']);
$arText = [
    'TITLE' => ArrayHelper::getValue($arParams, 'TITLE'),
    'BUTTON' => ArrayHelper::getValue($arParams, 'SEND_BUTTON')
];

if (!empty($arResult['PRODUCT']['PREVIEW_PICTURE']))
    $arImage = $arResult['PRODUCT']['PREVIEW_PICTURE'];

if (!empty($arResult['PRODUCT']['DETAIL_PICTURE']))
    $arImage = $arResult['PRODUCT']['DETAIL_PICTURE'];

foreach ($arText as $sKey => $sValue) {
    if (empty($sValue))
        $arText[$sKey] = Loc::getMessage('OCB_TEXT_'.$sKey);
}
?>
<div class="ocb-form">
	<div class="ocb-form-wrap">
		<?php if ($arResult['PRODUCT']) { ?>
			<div class="product-wrapper">
				<div class="product-name"><?= Html::encode($arResult['PRODUCT']['NAME']) ?></div>
                <?php if (!empty($arResult['PRODUCT']['QUANTITY'])) { ?>
                    <div class="product-quantity">
                        <?= Loc::getMessage('OCB_PRODUCT_QUANTITY') ?>: <?= Html::encode($arResult['PRODUCT']['QUANTITY']) ?>
                    </div>
                <?php } ?>
                <?php if (!empty($arImage)) { ?>
                    <div class="product-image">
                        <?= Html::img($arImage['SRC'], [
                             'alt' => $arResult['PRODUCT']['NAME']
                        ]) ?>
                    </div>
                <? } ?>
                <?php if (!empty($arPrice)) { ?>
                    <div class="product-price">
                        <?= CStartShopCurrency::FormatAsString($arResult['PRODUCT']['SUM'], $arPrice['CURRENCY']) ?>
                    </div>
                <?php } ?>
			</div>
		<?php } ?>
		<form method="post" class="nosubit_ocb intec-form" action="<?= $APPLICATION->GetCurPageParam() ?>">
			<?= bitrix_sessid_post() ?>
            <?= Html::hiddenInput($arParams['REQUEST_VARIABLE_ACTION'], 'send') ?>
            <div class="title"><?= Html::encode($arText['TITLE']) ?></div>
            <div class="ocb-form-result">
                <?php if ($arResult['ERROR'] !== null) { ?>
                    <div class="ocb-result-icon-fail"><?= Loc::getMessage('OCB_ERRORS_'.$arResult['ERROR']['CODE']) ?></div>
                <?php } ?>
                <?php if ($arResult['ORDER'] !== null) { ?>
                    <div class="ocb-result-icon-success"><?= Loc::getMessage('OCB_ORDER_SUCCESS') ?></div>
                    <div class="ocb-result-text"><?= Loc::getMessage('OCB_ORDER_SUCCESS_TEXT') ?></div>
                    <?php if (empty($arResult['PRODUCT'])) { ?>
                        <script type="text/javascript">
                            setTimeout(function () {
                                location.reload();
                            }, 5000);
                        </script>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php if ($arResult['ORDER'] === null) { ?>
                <div class="ocb-params">
                    <?php foreach ($arResult['PROPERTIES'] as $arProperty) { ?>
                    <?php
                        $sName = ArrayHelper::getValue($arProperty, ['LANG', LANGUAGE_ID, 'NAME']);
                    ?>
                        <?php if ($arProperty['TYPE'] == 'S') { ?>
                            <div class="intec-form-field <?= $arProperty['ERROR'] ? 'intec-form-field-error' : '' ?>">
                                <div class="intec-form-caption">
                                    <?= Html::encode($sName) ?>
                                    <?php if ($arProperty['REQUIRED'] == 'Y') { ?>
                                        <span class="starrequired">*</span>
                                    <?php } ?>
                                </div>
                                <div class="intec-form-value">
                                    <?php if ($arProperty['SUBTYPE'] == 'TEXT') { ?>
                                        <?= Html::textarea($arParams['REQUEST_VARIABLE_PROPERTIES'].'['.$arProperty['CODE'].']', $arProperty['VALUE'], [
                                            'class' => 'intec-input'
                                        ]) ?>
                                    <?php } else { ?>
                                        <?= Html::textInput($arParams['REQUEST_VARIABLE_PROPERTIES'].'['.$arProperty['CODE'].']', $arProperty['VALUE'], [
                                            'class' => 'intec-input',
                                            'maxlength' => $arProperty['DATA']['LENGTH'] >= 1 ? $arProperty['DATA']['LENGTH'] : null
                                        ]) ?>
                                    <?php } ?>
                                    <div class="required">
                                        <?php foreach ($arProperty['ERRORS'] as $sCode => $bExcepted) {
                                            if (!$bExcepted) {
                                                continue;
                                            }
                                            $arData = null;
                                            if ($sCode == 'LENGTH') {
                                                $arData = [
                                                    '#LENGTH#' => $arProperty['DATA']['LENGTH']
                                                ];
                                            }
                                            echo Loc::getMessage('OCB_ERRORS_PROPERTY_'.$sCode, $arData);
                                            break;
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <div class="ocb-modules-button">
                        <div class="promt">
                            <span>
                                <span class="starrequired">*</span> - <?= Loc::getMessage('OCB_INFO_PROPERTY_EMPTY') ?>
                            </span>
                        </div>
                        <?php if ($arResult['AGREEMENT']['SHOW']) { ?>
                            <div class="consent">
                                <label class="intec-input intec-input-checkbox">
                                    <?= Html::checkbox(null, true, [
                                        'disabled' => true
                                    ]) ?>
                                    <span class="intec-input-selector"></span>
                                    <span class="intec-input-text">
                                        <?= Loc::getMessage('OCB_CONSENT', [
                                            '#URL#' => $arResult['AGREEMENT']['URL']
                                        ]) ?>
                                    </span>
                                </label>
                            </div>
                        <?php } ?>
                        <div class="ocb-button-wrapper">
                            <?= Html::submitButton($arText['BUTTON'], [
                                'class' => 'intec-button intec-button-cl-common intec-button-lg'
                            ]) ?>
                            <div class="ocb-disclaimer"><?= Loc::getMessage('OCB_DISCLAIMER') ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
		</form>
	</div>
</div>