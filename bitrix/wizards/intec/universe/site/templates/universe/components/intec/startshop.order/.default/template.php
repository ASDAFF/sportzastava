<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

global $USER;

$sUniqueID = 'startshop_order_'.spl_object_hash($this);

$arUser = array();

if ($USER->IsAuthorized()) {
    $arUser = CUser::GetByID($USER->GetID())->Fetch();
}
?>

<?php
$fPropertyDraw = function ($arProperty, $arUser = array()) {

    $sValue = '';

    if (isset($_REQUEST['PROPERTY_'.$arProperty['ID']])) {
        $sValue = $_REQUEST['PROPERTY_'.$arProperty['ID']];
    } else if (!empty($arProperty['USER_FIELD']) && !empty($arUser) && !empty($arUser[$arProperty['USER_FIELD']])) {
        $sValue = $arUser[$arProperty['USER_FIELD']];
    }

    if ($arProperty['TYPE'] == 'S' && empty($arProperty['SUBTYPE'])) { ?>
        <div class="intec-form-field">
            <div class="intec-form-caption">
                <?= $arProperty['LANG'][LANGUAGE_ID]['NAME'] ?>:
                <?php if ($arProperty['REQUIRED'] == 'Y') { ?>
                    <span class="startshop-order-required">*</span>
                <?php } ?>
            </div>
            <div class="intec-form-value">
                <input type="text"
                       <?= $arProperty['DATA']['LENGTH'] > 0 ? ' maxlength="'. $arProperty['DATA']['LENGTH'] .'"' : '' ?>
                       class="intec-input"
                       name="PROPERTY_<?= $arProperty['ID'] ?>"
                       value="<?= htmlspecialcharsbx($sValue) ?>" />
                <?php if (!empty($arProperty['LANG'][LANGUAGE_ID]['DESCRIPTION'])) { ?>
                    <div class="startshop-order-field-description"><?= $arProperty['LANG'][LANGUAGE_ID]['DESCRIPTION'] ?></div>
                <?php } ?>
            </div>
        </div>
    <?php } elseif ($arProperty['TYPE'] == 'S' && $arProperty['SUBTYPE'] == 'TEXT') { ?>
        <div class="intec-form-field">
            <div class="intec-form-caption">
                <?= $arProperty['LANG'][LANGUAGE_ID]['NAME'] ?>:
                <?php if ($arProperty['REQUIRED'] == 'Y') { ?>
                    <span class="startshop-order-required">*</span>
                <?php } ?>
            </div>
            <div class="intec-form-value">
                <textarea name="PROPERTY_<?= $arProperty['ID'] ?>"
                          class="intec-input"><?= htmlspecialcharsbx($sValue) ?></textarea>
                <?php if (!empty($arProperty['LANG'][LANGUAGE_ID]['DESCRIPTION'])) { ?>
                    <div class="startshop-order-field-description"><?= $arProperty['LANG'][LANGUAGE_ID]['DESCRIPTION'] ?></div>
                <?php } ?>
            </div>
        </div>
    <?php } elseif ($arProperty['TYPE'] == 'B' && empty($arProperty['SUBTYPE'])) { ?>
        <div class="intec-form-field">
            <div class="intec-form-caption">
                <?= $arProperty['LANG'][LANGUAGE_ID]['NAME'] ?>:
                <?/*if ($arProperty['REQUIRED'] == 'Y'):?>
                    <span class="startshop-order-required">*</span>
                <?endif;*/?>
            </div>
            <div class="intec-form-value">
                <div style="padding-top: 7px;"></div>
                <input type="hidden" value="N" name="PROPERTY_<?= $arProperty['ID'] ?>" />
                <label class="startshop-button-checkbox">
                    <input type="checkbox" value="Y" name="PROPERTY_<?= $arProperty['ID'] ?>"<?= $sValue == 'Y' ? ' checked="checked"' : '' ?> />
                    <div class="selector"></div>
                </label>
                <?php if (!empty($arProperty['LANG'][LANGUAGE_ID]['DESCRIPTION'])) { ?>
                    <div class="startshop-order-field-description"><?= $arProperty['LANG'][LANGUAGE_ID]['DESCRIPTION'] ?></div>
                <?php } ?>
            </div>
        </div>
    <?php } elseif ($arProperty['TYPE'] == 'L' && $arProperty['SUBTYPE'] == 'IBLOCK_ELEMENT') { ?>
        <div class="intec-form-field">
            <div class="intec-form-caption">
                <?= $arProperty['LANG'][LANGUAGE_ID]['NAME'] ?>:
                <?php if ($arProperty['REQUIRED'] == 'Y') { ?>
                    <span class="startshop-order-required">*</span>
                <?php } ?>
            </div>
            <div class="intec-form-value">
                <select name="PROPERTY_<?= $arProperty['ID'] ?>" class="intec-input">
                    <?php foreach ($arProperty['VALUES'] as $iPropertyKey => $arPropertyValue) { ?>
                        <option value="<?= $iPropertyKey ?>"
                                <?= $sValue == $iPropertyKey ? 'selected="selected"' : '' ?>>
                            <?= htmlspecialcharsbx($arPropertyValue['NAME']) ?>
                        </option>
                    <?php } ?>
                </select>
                <?php if (!empty($arProperty['LANG'][LANGUAGE_ID]['DESCRIPTION'])) { ?>
                    <div class="startshop-order-field-description"><?= $arProperty['LANG'][LANGUAGE_ID]['DESCRIPTION'] ?></div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>

<div class="intec-content">
    <div class="intec-content-wrapper startshop-order default<?= $arParams['USE_ADAPTABILITY'] == 'Y' ? ' adaptability' : '' ?>" id="<?= $sUniqueID ?>">
        <?php foreach ($arResult['ERRORS'] as $arError) { ?>
            <?php if ($arError['CODE'] == 'DELIVERY_EMPTY') { ?>
                <div class="startshop-order-notify startshop-order-notify-red">
                    <div class="startshop-order-notify-wrapper">
                        <?= GetMessage('SO_DEFAULT_ERRORS_DELIVERY_EMPTY') ?>
                    </div>
                </div>
            <?php } elseif ($arError['CODE'] == 'PAYMENT_EMPTY') { ?>
                <div class="startshop-order-notify startshop-order-notify-red">
                    <div class="startshop-order-notify-wrapper">
                        <?= GetMessage('SO_DEFAULT_ERRORS_PAYMENT_EMPTY') ?>
                    </div>
                </div>
            <?php } elseif ($arError['CODE'] == 'PROPERTIES_EMPTY') { ?>
                <div class="startshop-order-notify startshop-order-notify-red">
                    <div class="startshop-order-notify-wrapper">
                        <?php
                            $arPropertiesEmpty = array();
                            foreach ($arError['PROPERTIES'] as $arProperty) {
                                $arPropertiesEmpty[] = $arProperty['LANG'][LANGUAGE_ID]['NAME'];
                            }
                        ?>
                        <?= GetMessage('SO_DEFAULT_ERRORS_PROPERTIES_EMPTY', array('#FIELDS#' => '<b>"'.implode('"</b>, <b>"', $arPropertiesEmpty).'"</b>')) ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <?php if (!empty($arResult['ITEMS'])) { ?>
            <form method="POST" class="intec-form">
                <?php $oFrame = $this->createFrame()->begin(); ?>
                    <input type="hidden" name="<?= $arParams['REQUEST_VARIABLE_ACTION'] ?>" value="order" />
                    <div class="row">
                        <div class="col-md-9">
                            <?php if (!empty($arResult['ITEMS']) && !empty($arResult['PROPERTIES'])) { ?>
                                <div class="startshop-order-section startshop-order-section-general">
                                    <div class="startshop-order-caption"><?= GetMessage('SO_DEFAULT_SECTIONS_PROPERTIES') ?></div>
                                    <?php
                                    foreach ($arResult['PROPERTIES'] as $arProperty) {
                                        $fPropertyDraw($arProperty, $arUser);
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if (!empty($arResult['DELIVERIES'])) { ?>
                                <div class="startshop-order-section startshop-order-section-delivery">
                                    <div class="startshop-order-caption"><?= GetMessage('SO_DEFAULT_SECTIONS_DELIVERIES') ?></div>
                                    <div class="intec-form-field">
                                        <div class="intec-form-caption">
                                            <?= GetMessage('SO_DEFAULT_SECTIONS_DELIVERIES_DELIVERY') ?>:
                                            <span class="startshop-order-required">*</span>
                                        </div>
                                        <div class="intec-form-value">
                                            <select name="DELIVERY" class="intec-input startshop-order-field-value-delivery">
                                                <?php foreach ($arResult['DELIVERIES'] as $iDeliveryKey => $arDelivery) { ?>
                                                    <option value="<?= $iDeliveryKey ?>"
                                                            <?= $_REQUEST['DELIVERY'] == $iDeliveryKey ? 'selected="selected"' : ''?>>
                                                        <?= htmlspecialcharsbx($arDelivery['LANG'][LANGUAGE_ID]['NAME']).' ('.($arDelivery['PRICE']['VALUE'] > 0 ? $arDelivery['PRICE']['PRINT_VALUE'] : GetMessage('SO_DEFAULT_SECTIONS_DELIVERIES_DELIVERY_FREE')).')' ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    foreach ($arResult['DELIVERIES'] as $iDeliveryKey => $arDelivery) {
                                        foreach ($arDelivery['PROPERTIES'] as $arDeliveryProperty) {
                                            $fPropertyDraw($arDeliveryProperty, $arUser);
                                        }
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                            <?php if (!empty($arResult['PAYMENTS'])) { ?>
                                <div class="startshop-order-section startshop-order-section-payments">
                                    <div class="startshop-order-caption"><?= GetMessage('SO_DEFAULT_SECTIONS_PAYMENTS') ?></div>
                                    <div class="intec-form-field">
                                        <div class="intec-form-caption">
                                            <?= GetMessage('SO_DEFAULT_SECTIONS_PAYMENTS_PAYMENT') ?>:
                                            <span class="startshop-order-required">*</span>
                                        </div>
                                        <div class="intec-form-value">
                                            <select name="PAYMENT" class="intec-input startshop-order-field-value-total">
                                                <?php foreach ($arResult['PAYMENTS'] as $iPaymentKey => $arPayment) { ?>
                                                    <option value="<?= $iPaymentKey ?>"
                                                            <?= $_REQUEST['PAYMENT'] == $iPaymentKey ? 'selected="selected"' : '' ?>>
                                                        <?= htmlspecialcharsbx($arPayment['LANG'][LANGUAGE_ID]['NAME']) ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="startshop-order-section startshop-order-section-products">
                                <div class="startshop-order-caption"><?= GetMessage('SO_DEFAULT_SECTIONS_ITEMS') ?></div>
                                <div class="startshop-order-table-wrapper">
                                    <table class="startshop-order-table">
                                        <thead>
                                            <tr class="startshop-order-row startshop-order-row-header">
                                                <?php if ($arParams['USE_ITEMS_PICTURES'] == 'Y') { ?>
                                                    <td class="startshop-order-column startshop-order-column-image">
                                                        <div class="startshop-order-cell"></div>
                                                    </td>
                                                <?php } ?>
                                                <td class="startshop-order-column startshop-order-column-name">
                                                    <div class="startshop-order-cell" style="white-space: nowrap;">
                                                        <?= GetMessage('SO_DEFAULT_SECTIONS_ITEMS_COLUMN_NAME') ?>
                                                    </div>
                                                </td>
                                                <td class="startshop-order-column startshop-order-column-offer"></td>
                                                <td class="startshop-order-column startshop-order-column-quantity">
                                                    <div class="startshop-order-cell" style="white-space: nowrap;">
                                                        <?= GetMessage('SO_DEFAULT_SECTIONS_ITEMS_COLUMN_QUANTITY') ?>
                                                    </div>
                                                </td>
                                                <td class="startshop-order-column startshop-order-column-price">
                                                    <div class="startshop-order-cell" style="white-space: nowrap;">
                                                        <?= GetMessage('SO_DEFAULT_SECTIONS_ITEMS_COLUMN_PRICE') ?>
                                                    </div>
                                                </td>
                                                <td class="startshop-order-column startshop-order-column-total">
                                                    <div class="startshop-order-cell" style="white-space: nowrap;">
                                                        <?= GetMessage('SO_DEFAULT_SECTIONS_ITEMS_COLUMN_TOTAL') ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
                                                <tr class="startshop-order-row">
                                                    <?php if ($arParams['USE_ITEMS_PICTURES'] == 'Y') { ?>
                                                        <td class="startshop-order-column startshop-order-column-image">
                                                            <div class="startshop-order-cell">
                                                                <div class="startshop-image">
                                                                    <div class="startshop-aligner-vertical"></div>
                                                                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                                                        <img src="<?= $arItem['PICTURE']['SRC'] ?>"
                                                                             alt="<?= $arItem['NAME'] ?>"
                                                                             title="<?= $arItem['NAME'] ?>" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    <?php } ?>
                                                    <td class="startshop-order-column startshop-order-column-name">
                                                        <div class="startshop-order-cell">
                                                            <a class="product-link" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['NAME'] ?></a>
                                                        </div>
                                                    </td>
                                                    <td class="startshop-basket-column startshop-order-column-offer">
                                                        <?php if ($arItem['STARTSHOP']['OFFER']['OFFER']) { ?>
                                                            <div class="startshop-order-cell">
                                                                <?php foreach ($arItem['STARTSHOP']['OFFER']['PROPERTIES'] as $arProperty) { ?>
                                                                    <?php if ($arProperty['TYPE'] == 'TEXT') { ?>
                                                                        <div class="startshop-order-property startshop-order-property-text">
                                                                            <div class="startshop-order-name">
                                                                                <?= $arProperty['NAME'] ?>:
                                                                            </div>
                                                                            <div class="startshop-order-value">
                                                                                <?= $arProperty['VALUE']['TEXT'] ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php } else { ?>
                                                                        <div class="startshop-order-property startshop-order-property-picture">
                                                                            <div class="startshop-order-name">
                                                                                <?= $arProperty['NAME'] ?>:
                                                                            </div>
                                                                            <div class="startshop-order-value">
                                                                                <div class="startshop-order-value-wrapper">
                                                                                    <img src="<?= $arProperty['VALUE']['PICTURE'] ?>"
                                                                                         alt="<?= $arProperty['VALUE']['TEXT'] ?>"
                                                                                         title="<?= $arProperty['VALUE']['TEXT'] ?>" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="startshop-order-column startshop-order-column-quantity">
                                                        <div class="startshop-order-cell-title">
                                                            <?= GetMessage('SO_DEFAULT_SECTIONS_ITEMS_COLUMN_QUANTITY') ?>:
                                                        </div>
                                                        <div class="startshop-order-cell" style="white-space: nowrap;">
                                                            <?= $arItem['STARTSHOP']['BASKET']['QUANTITY'] ?>
                                                        </div>
                                                    </td>
                                                    <td class="startshop-order-column startshop-order-column-price">
                                                        <div class="startshop-order-cell-title">
                                                            <?= GetMessage('SO_DEFAULT_SECTIONS_ITEMS_COLUMN_PRICE') ?>:
                                                        </div>
                                                        <div class="startshop-order-cell" style="white-space: nowrap;">
                                                            <?= $arItem['STARTSHOP']['PRICES']['MINIMAL']['PRINT_VALUE'] ?>
                                                        </div>
                                                    </td>
                                                    <td class="startshop-order-column startshop-order-column-total">
                                                        <div class="startshop-order-cell-title">
                                                            <?= GetMessage('SO_DEFAULT_SECTIONS_ITEMS_COLUMN_TOTAL') ?>:
                                                        </div>
                                                        <div class="startshop-order-cell" style="white-space: nowrap;">
                                                            <?= CStartShopCurrency::FormatAsString($arItem['STARTSHOP']['PRICES']['MINIMAL']['VALUE'] * $arItem['STARTSHOP']['BASKET']['QUANTITY'], $arParams['CURRENCY']) ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 startshop-order-total-wrapper">
                            <div class="startshop-order-total">
                                <div class="startshop-order-total-title"><?= GetMessage('SO_DEFAULT_YOUR_ORDER') ?></div>
                                <hr/>
                                <div class="startshop-order-field clearfix">
                                    <span class="startshop-order-field-title"><?= GetMessage('SO_DEFAULT_TOTAL_ITEMS') ?>:</span>
                                    <span class="startshop-order-field-value startshop-order-field-value-items">
                                        <?= $arResult['SUM']['PRINT_VALUE'] ?>
                                    </span>
                                </div>
                                <?php if (!empty($arResult['DELIVERIES'])) { ?>
                                    <div class="startshop-order-field clearfix">
                                        <span class="startshop-order-field-title"><?= GetMessage('SO_DEFAULT_TOTAL_DELIVERY') ?>:</span>
                                        <span class="startshop-order-field-value startshop-order-field-value-delivery"></span>
                                    </div>
                                <?php } ?>
                                <hr class="clearfix" />
                                <div class="startshop-order-field">
                                    <span class="startshop-order-field-title"><?= GetMessage('SO_DEFAULT_TOTAL') ?>:</span>
                                    <span class="startshop-order-field-value startshop-order-field-value-total">
                                        <?= $arResult['SUM']['PRINT_VALUE'] ?>
                                    </span>
                                </div>
                            </div>
                            <input type="submit" class="intec-button intec-button-cl-common intec-button-lg intec-button-block intec-button-fs-16"
                                   value="<?= GetMessage('SO_DEFAULT_BUTTONS_ORDER') ?>" />
                        </div>
                    </div>
                    <div class="startshop-order-buttons col-md-9">
                        <?php if ($arParams['VERIFY_CONSENT_TO_PROCESSING_PERSONAL_DATA'] == 'Y') { ?>
                            <div class="startshop-order-processing-personal-data-wrapper">
                                <label class="intec-input intec-input-checkbox">
                                    <input type="checkbox" name="" checked onclick="return false;"/>
                                    <span class="intec-input-selector"></span>
                                    <span class="intec-input-text">
                                        <?= GetMessage('SO_DEFAULT_I_AGREED_TO') ?>
                                        <a href="<?= $arParams['URL_RULES_OF_PERSONAL_DATA_PROCESSING'] ?>" target="_blank"><?= GetMessage('SO_DEFAULT_PROCESSING_PERSONAL_DATA') ?></a>
                                    </span>
                                </label>
                            </div>
                        <?php } ?>
                        <div class="startshop-order-buttons-wrapper">
                            <input type="submit" class="intec-button intec-button-cl-common intec-button-lg"
                                   value="<?= GetMessage('SO_DEFAULT_BUTTONS_ORDER') ?>" />
                            <?php if ($arParams['USE_BUTTON_BASKET'] == 'Y') { ?>
                                <a class="intec-button intec-button-cl-default intec-button-lg intec-button-transparent "
                                   href="<?= $arParams['URL_BASKET'] ?>">
                                    <?= GetMessage('SO_DEFAULT_BUTTONS_BASKET') ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            var $oRoot = $('#<?= $sUniqueID ?>');
                            var $oProperties = <?= !empty($arResult['PROPERTIES']) ? CUtil::PhpToJSObject($arResult['PROPERTIES']) : '{}' ?>;
                            var $oDeliveries = <?= !empty($arResult['DELIVERIES']) ? CUtil::PhpToJSObject($arResult['DELIVERIES']) : '{}' ?>;
                            var $oPayments = <?= !empty($arResult['PAYMENTS']) ? CUtil::PhpToJSObject($arResult['PAYMENTS']) : '{}' ?>;
                            var $oCurrency = <?= !empty($arResult['CURRENCY']) ? CUtil::PhpToJSObject($arResult['CURRENCY']) : 'null' ?>;
                            var $sLanguageID = <?= CUtil::PhpToJSObject(LANGUAGE_ID) ?>;
                            var $oItemsSum = <?= CUtil::PhpToJSObject($arResult['SUM']) ?>;

                            function UpdateForm() {
                                var $iCurrentDelivery = $oRoot.find('[name=DELIVERY]').val();
                                var $fDeliverySum = 0;
                                Startshop.Functions.forEach($oDeliveries, function($iKey, $oDelivery) {
                                    Startshop.Functions.forEach($oDelivery['PROPERTIES'], function ($iDeliveryPropertyKey, $oDeliveryProperty) {
                                        $oRoot.find('[name=PROPERTY_' + $iDeliveryPropertyKey + ']').parents('div.intec-form-field').hide();
                                    });
                                });

                                if ($iCurrentDelivery !== undefined) {
                                    Startshop.Functions.forEach($oDeliveries[$iCurrentDelivery]['PROPERTIES'], function($iDeliveryPropertyKey, $oDeliveryProperty) {
                                        $oRoot.find('[name=PROPERTY_' + $iDeliveryPropertyKey + ']').parents('div.intec-form-field').show();
                                    });

                                    $fDeliverySum = parseFloat($oDeliveries[$iCurrentDelivery]['PRICE']['VALUE']);
                                }

                                var $fTotalSum = parseFloat($oItemsSum['VALUE']) + parseFloat($fDeliverySum);
                                var $oFieldDelivery = $('.startshop-order-total-wrapper .startshop-order-field-value-delivery', $oRoot);
                                var $oFieldTotal = $('.startshop-order-total-wrapper .startshop-order-field-value-total', $oRoot);

                                if ($oCurrency != null) {
                                    $fDeliverySum = Startshop.Functions.stringReplace(
                                        {
                                            '#': Startshop.Functions.numberFormat(
                                                $fDeliverySum,
                                                $oCurrency['FORMAT'][$sLanguageID]['DECIMALS_COUNT'],
                                                $oCurrency['FORMAT'][$sLanguageID]['DELIMITER_DECIMAL'],
                                                $oCurrency['FORMAT'][$sLanguageID]['DELIMITER_THOUSANDS']
                                            )
                                        },
                                        $oCurrency['FORMAT'][$sLanguageID]['FORMAT']
                                    );

                                    $fTotalSum = Startshop.Functions.stringReplace(
                                        {
                                            '#': Startshop.Functions.numberFormat(
                                                $fTotalSum,
                                                $oCurrency['FORMAT'][$sLanguageID]['DECIMALS_COUNT'],
                                                $oCurrency['FORMAT'][$sLanguageID]['DELIMITER_DECIMAL'],
                                                $oCurrency['FORMAT'][$sLanguageID]['DELIMITER_THOUSANDS']
                                            )
                                        },
                                        $oCurrency['FORMAT'][$sLanguageID]['FORMAT']
                                    );
                                }

                                $oFieldDelivery.html($fDeliverySum);
                                $oFieldTotal.html($fTotalSum);
                            }

                            $oRoot.find('[name=DELIVERY]').change(function () {
                                UpdateForm();
                            });

                            UpdateForm();
                        });
                    </script>
                <?php $oFrame->end(); ?>
            </form>
        <?php } else { ?>
            <?php if (is_numeric($arResult['ORDER'])) { ?>
                <div class="startshop-order-notify startshop-order-notify-green">
                    <div class="startshop-order-notify-wrapper">
                        <?= GetMessage('SO_DEFAULT_NOTIFIES_ORDER_CREATED', array('#NUMBER#' => $arResult['ORDER'])) ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="startshop-order-notify">
                    <div class="startshop-order-notify-wrapper">
                        <?= GetMessage('SO_DEFAULT_NOTIFIES_ITEMS_EMPTY') ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<?php unset($fPropertyDraw); ?>
