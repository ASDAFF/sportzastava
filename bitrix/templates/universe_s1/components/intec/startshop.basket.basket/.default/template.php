<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\JavaScript;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */

if (!CModule::IncludeModule('intec.startshop'))
    return;

$sUniqueID = 'startshop-basket-default-'.spl_object_hash($this);

$this->setFrameMode(true);

?>
<div class="intec-content" id="<?= $sUniqueID ?>">
    <div class="intec-content-wrapper startshop-basket default<?= $arParams['USE_ADAPTABILITY'] == 'Y' ? ' adaptability' : '' ?>">
        <?php $oFrame = $this->createFrame()->begin(); ?>
            <?php if (!empty($arResult['ITEMS'])) { ?>
                <div class="startshop-basket-table-wrapper">
                    <table class="startshop-basket-table">
                        <thead>
                            <tr class="startshop-basket-row startshop-basket-row-header">
                                <?php if ($arParams['USE_ITEMS_PICTURES'] == 'Y') { ?>
                                    <td class="startshop-basket-column startshop-basket-column-picture">
                                        <div class="startshop-basket-cell"></div>
                                    </td>
                                <?php } ?>
                                <td class="startshop-basket-column startshop-basket-column-name">
                                    <div class="startshop-basket-cell" style="white-space: nowrap;">
                                        <?= GetMessage('SBB_DEFAULT_COLUMN_NAME') ?>
                                    </div>
                                </td>
                                <td class="startshop-basket-column startshop-basket-column-offers"></td>
                                <td class="startshop-basket-column startshop-basket-column-quantity">
                                    <div class="startshop-basket-cell" style="white-space: nowrap;">
                                        <?= GetMessage('SBB_DEFAULT_COLUMN_QUANTITY') ?>
                                    </div>
                                </td>
                                <td class="startshop-basket-column startshop-basket-column-price">
                                    <div class="startshop-basket-cell" style="white-space: nowrap;">
                                        <?= GetMessage('SBB_DEFAULT_COLUMN_PRICE') ?>
                                    </div>
                                </td>
                                <td class="startshop-basket-column startshop-basket-column-total">
                                    <div class="startshop-basket-cell" style="white-space: nowrap;">
                                        <?= GetMessage('SBB_DEFAULT_COLUMN_TOTAL') ?>
                                    </div>
                                </td>
                                <td class="startshop-basket-column startshop-basket-column-control">
                                    <div class="startshop-basket-cell"></div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
                                <tr class="startshop-basket-row">
                                    <?php if ($arParams['USE_ITEMS_PICTURES'] == 'Y') { ?>
                                        <td class="startshop-basket-column startshop-basket-column-picture">
                                            <div class="startshop-basket-cell startshop-basket-cell-picture">
                                                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="startshop-image">
                                                    <span class="startshop-aligner-vertical"></span>
                                                    <img src="<?= $arItem['PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>" title="<?= $arItem['NAME'] ?>" />
                                                </a>
                                            </div>
                                        </td>
                                    <?php } ?>
                                    <td class="startshop-basket-column startshop-basket-column-name">
                                        <div class="startshop-basket-cell">
                                            <a class="startshop-link startshop-link-standart"
                                               href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['NAME'] ?></a>
                                        </div>
                                    </td>
                                    <td class="startshop-basket-column startshop-basket-column-offers">
                                        <?php if ($arItem['STARTSHOP']['OFFER']['OFFER']) { ?>
                                            <div class="startshop-basket-cell">
                                                <?php foreach ($arItem['STARTSHOP']['OFFER']['PROPERTIES'] as $arProperty) { ?>
                                                    <?php if ($arProperty['TYPE'] == 'TEXT') { ?>
                                                        <div class="startshop-basket-property startshop-basket-property-text">
                                                            <div class="startshop-basket-name"><?= $arProperty['NAME'] ?>:</div>
                                                            <div class="startshop-basket-value"><?= $arProperty['VALUE']['TEXT'] ?></div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="startshop-basket-property startshop-basket-property-picture">
                                                            <div class="startshop-basket-name"><?= $arProperty['NAME'] ?>:</div>
                                                            <div class="startshop-basket-value">
                                                                <div class="startshop-basket-value-wrapper">
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
                                    <td class="startshop-basket-column startshop-basket-column-quantity">
                                        <div class="startshop-basket-cell">
                                            <?php
                                                $arJSNumeric = array(
                                                    'Value' => $arItem['STARTSHOP']['BASKET']['QUANTITY'],
                                                    'Minimum' => $arItem['STARTSHOP']['QUANTITY']['RATIO'],
                                                    'Ratio' => $arItem['STARTSHOP']['QUANTITY']['RATIO'],
                                                    'Maximum' => $arItem['STARTSHOP']['QUANTITY']['VALUE'],
                                                    'Unlimited' => !$arItem['STARTSHOP']['QUANTITY']['USE'],
                                                    'ValueType' => 'Float',
                                                );
                                            ?>
                                            <div class="intec-input-numeric">
                                                <button class="intec-input-numeric-button intec-input-numeric-button-left QuantityDecrease<?= $arItem['ID'] ?>">-</button>
                                                <input type="text" class="intec-input-numeric-text QuantityNumeric<?= $arItem['ID'] ?>"
                                                       value="<?= $arItem['STARTSHOP']['BASKET']['QUANTITY'] ?>" />
                                                <button class="intec-input-numeric-button intec-input-numeric-button-right QuantityIncrease<?= $arItem['ID'] ?>">+</button>
                                            </div>
                                            <script type="text/javascript">
                                                $(document).ready(function(){
                                                    var Quantity = new Startshop.Controls.NumericUpDown(<?=CUtil::PhpToJSObject($arJSNumeric)?>);
                                                    var QuantityIncrease = $('#<?=$sUniqueID?> .QuantityIncrease<?=$arItem['ID']?>');
                                                    var QuantityDecrease = $('#<?=$sUniqueID?> .QuantityDecrease<?=$arItem['ID']?>');
                                                    var QuantityNumeric = $('#<?=$sUniqueID?> .QuantityNumeric<?=$arItem['ID']?>');

                                                    Quantity.Settings.Events.OnValueChange = function ($oNumeric) {
                                                        QuantityNumeric.val($oNumeric.GetValue());
                                                        Reload();
                                                    };

                                                    QuantityIncrease.click(function () {
                                                        Quantity.Increase();
                                                    });

                                                    QuantityDecrease.click(function () {
                                                        Quantity.Decrease();
                                                    });

                                                    QuantityNumeric.change(function () {
                                                        Quantity.SetValue($(this).val());
                                                    });

                                                    function Reload() {
                                                        window.location.href = Startshop.Functions.stringReplace({'#QUANTITY#': Quantity.GetValue()}, <?=CUtil::PhpToJSObject($arItem['ACTIONS']['SET_QUANTITY'])?>);
                                                    }
                                                })
                                            </script>
                                        </div>
                                    </td>
                                    <td class="startshop-basket-column startshop-basket-column-price">
                                        <div class="startshop-basket-cell-title">
                                            <?= GetMessage('SBB_DEFAULT_COLUMN_PRICE') ?>
                                        </div>
                                        <div class="startshop-basket-cell" style="white-space: nowrap;">
                                            <?= $arItem['STARTSHOP']['BASKET']['PRICE']['PRINT_VALUE'] ?>
                                        </div>
                                    </td>
                                    <td class="startshop-basket-column startshop-basket-column-total">
                                        <div class="startshop-basket-cell-title">
                                            <?= GetMessage('SBB_DEFAULT_COLUMN_TOTAL') ?>
                                        </div>
                                        <div class="startshop-basket-cell" style="white-space: nowrap;">
                                            <?= CStartShopCurrency::FormatAsString($arItem['STARTSHOP']['BASKET']['PRICE']['VALUE'] * $arItem['STARTSHOP']['BASKET']['QUANTITY'], $arParams['CURRENCY']) ?>
                                        </div>
                                    </td>
                                    <td class="startshop-basket-column startshop-basket-column-control">
                                        <div class="startshop-basket-cell">
                                            <a class="startshop-button-custom startshop-button-delete fa fa-close"
                                               href="<?= $arItem['ACTIONS']['DELETE'] ?>"></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php if ($arParams['USE_BUTTON_CLEAR'] == 'Y' || $arParams['USE_SUM_FIELD'] == 'Y') { ?>
                    <div class="row startshop-basket-information">
                        <div class="col-xs-6">
                            <?php if ($arParams['USE_BUTTON_CLEAR'] == 'Y') { ?>
                                <div class="startshop-basket-clear-wrapper">
                                    <a class="intec-button intec-button-cl-default intec-button-transparent intec-button-lg intec-button-w-icon"
                                       href="<?= $arResult['ACTIONS']['CLEAR'] ?>">
                                        <i class="intec-button-icon glyph-icon-cancel"></i>
                                        <span class="intec-button-text">
                                            <?= GetMessage('SBB_DEFAULT_BUTTON_CLEAR') ?>
                                        </span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-xs-6">
                            <?php if ($arParams['USE_SUM_FIELD'] == 'Y') { ?>
                                <div class="startshop-basket-sum">
                                    <span class="startshop-basket-sum-title">
                                        <?= GetMessage('SBB_DEFAULT_FIELD_SUM') ?>:
                                    </span>
                                    <span class="startshop-basket-sum-value">
                                        <?= $arResult['SUM']['PRINT_VALUE'] ?>
                                    </span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($arParams['USE_BUTTON_ORDER'] == 'Y' || $arParams['USE_BUTTON_FAST_ORDER'] == 'Y') { ?>
                    <div class="startshop-basket-buttons">
                        <div class="startshop-basket-buttons-wrapper">
                            <?php if ($arParams['USE_BUTTON_CONTINUE_SHOPPING'] == 'Y') { ?>
                                <a class="intec-button intec-button-cl-default intec-button-transparent intec-button-lg"
                                   style="float: left;"
                                   href="<?= $arParams['URL_CATALOG'] ?>">
                                    <?= GetMessage('SBB_DEFAULT_CONTINUE_SHOPPING') ?>
                                </a>
                            <?php } ?>
                            <?php if ($arParams['USE_BUTTON_FAST_ORDER'] == 'Y') { ?>
                                <span class="intec-button intec-button-cl-common intec-button-transparent intec-button-lg"
                                      onclick="{
                                          var parameters = <?= JavaScript::toObject(array(
                                              'TEMPLATE' => $arParams['FAST_ORDER_TEMPLATE'],
                                              'SHOW_PROPERTIES' => $arParams['FAST_ORDER_SHOW_PROPERTIES'],
                                              'DELIVERY' => $arParams['FAST_ORDER_DELIVERY'],
                                              'PAYMENT' => $arParams['FAST_ORDER_PAYMENT'],
                                              'STATUS' => $arParams['FAST_ORDER_STATUS'],
                                              'TITLE' => $arParams['FAST_ORDER_TITLE'],
                                              'SEND_BUTTON' => $arParams['FAST_ORDER_SEND_BUTTON'],
                                              'SHOW_AGREEMENT' => $arParams['FAST_ORDER_SHOW_AGREEMENT'],
                                              'URL_AGREEMENT' => $arParams['FAST_ORDER_URL_AGREEMENT'],
                                              'AJAX_OPTION_ADDITIONAL' => $sTemplateId.'_FAST_ORDER',
                                          )) ?>;

                                          universe.components.show({
                                              component: 'intec.universe:oneclickbuy',
                                              template: '.default',
                                              parameters: parameters
                                          });
                                      }">
                                    <?= GetMessage('SBB_DEFAULT_FAST_ORDER') ?>
                                </span>
                            <?php } ?>
                            <?php if ($arParams['USE_BUTTON_ORDER'] == 'Y') { ?>
                                <a class="intec-button intec-button-cl-common intec-button-lg"
                                   href="<?= $arParams['URL_ORDER'] ?>"><?= GetMessage('SBB_DEFAULT_BUTTON_ORDER') ?></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="empty-basket intec-no-select">
                    <div class="empty_basket_img">
                    </div>
                    <div class="content_empty_title"><?=GetMessage("SBB_DEFAULT_EMPTY_BASKET");?></div>
                    <div class="basket-content_empty_description"><?=GetMessage("SBB_DEFAULT_CHOOSE");?></div>

                    <a href="<?=$arParams["URL_CATALOG"]?>" class="intec-button intec-button-cl-common intec-button-lg">
                       <?=GetMessage("SBB_DEFAULT_CATALOG");?>
                    </a>
                </div>
            <?php } ?>
        <?php $oFrame->beginStub(); ?>
            <div class="empty-basket intec-no-select">
                <div class="empty_basket_img">
                </div>
                <div class="content_empty_title"><?=GetMessage("SBB_DEFAULT_EMPTY_BASKET");?></div>
                <div class="basket-content_empty_description"><?=GetMessage("SBB_DEFAULT_CHOOSE");?></div>

                <a href="<?=$arParams["URL_CATALOG"]?>" class="intec-button intec-button-cl-common intec-button-lg">
                    <?=GetMessage("SBB_DEFAULT_CATALOG");?>
                </a>
            </div>
        <?php $oFrame->end(); ?>
    </div>
</div>