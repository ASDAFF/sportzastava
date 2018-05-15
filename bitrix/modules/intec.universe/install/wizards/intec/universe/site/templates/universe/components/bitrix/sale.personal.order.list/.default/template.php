<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use Bitrix\Main\Localization\Loc;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\JavaScript;

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

$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);

$dbStatuses = (new CSaleStatus())->GetList();
$arStatuses = [];

$toHistory = '?filter_history=Y';
if ($_GET['filter_history'] == 'Y') $toHistory = null;

while ($arStatus = $dbStatuses->GetNext()) {
    $arStatuses[$arStatus['ID']] = $arStatus;
}

?>
<div class="order-list-default" id="<?= $sTemplateId ?>">
    <div class="intec-content">
        <div class="intec-content-wrapper">
            <div class="order-list-default-header">
                <div class="order-list-default-text">
                    <?php if ($toHistory) { ?>
                        <?=GetMessage("SHOP_CUR_TITLE_ACTIVE");?>
                    <?php } else {?>
                        <?=GetMessage("SHOP_CUR_TITLE_HISTORY");?>
                    <?php } ?>
                </div>
                <a class="order-list-default-history intec-cl-text" href="<?= $arResult["CURRENT_PAGE"] ?><?= $toHistory ?>">
                    <?php if (!empty($toHistory)): ?>
                        <?= Loc::getMessage('SPOL_ORDERS_HISTORY') ?>
                    <?php else: ?>
                        <?= Loc::getMessage('SPOL_CUR_ORDERS') ?>
                    <?php endif ?>
                </a>
                <div class="clearfix"></div>
            </div>
            <div class="order-list-default-items">
                <div class="order-list-default-items-wrapper" data-role="items">
                    <?php foreach ($arResult["ORDER_BY_STATUS"] as $arGroup) { ?>
                        <?php foreach($arGroup as $arOrder) { ?>
                        <?php
                            $arStatus = ArrayHelper::getValue($arStatuses, $arOrder['ORDER']['STATUS_ID']);
                        ?>
                            <div class="order-list-default-item" data-role="item">
                                <div class="order-list-default-item-header" data-role="button">
                                    <div class="order-list-default-item-header-wrapper">
                                        <div class="order-list-default-item-header-parts">
                                            <div class="order-list-default-item-header-part" style="margin-right: 25px;">
                                                <?= Loc::getMessage('SPOL_ORDER') ?>
                                            </div>
                                            <div class="order-list-default-item-header-part">
                                                <?= Loc::getMessage('SPOL_NUM_SIGN') ?><?= $arOrder['ORDER']['ACCOUNT_NUMBER'] ?>
                                            </div>
                                            <? if (!empty($arOrder["ORDER"]["DATE_INSERT_FORMATED"])) { ?>
                                                <div class="order-list-default-item-header-part">
                                                    <?= Loc::getMessage('SPOL_FROM') ?>
                                                    <?= $arOrder['ORDER']['DATE_INSERT_FORMATED'] ?>
                                                </div>
                                            <? } ?>
                                            <div class="order-list-default-item-header-part">
                                                <?= Loc::getMessage('SPOL_FROM_SUM') ?>
                                                <?= $arOrder['ORDER']['FORMATED_PRICE'] ?>
                                            </div>
                                        </div>
                                        <div class="order-list-default-item-header-indicator">
                                            <div class="intec-aligner"></div>
                                            <div class="order-list-default-item-header-icon order-list-default-item-header-icon-active fa fa-angle-up"></div>
                                            <div class="order-list-default-item-header-icon order-list-default-item-header-icon-inactive fa fa-angle-down"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-list-default-item-content" data-role="content">
                                    <div class="order-list-default-item-content-wrapper">
                                        <div class="order-list-default-item-content-left">
                                            <div class="order-list-default-item-content-payment">
                                                <?= Loc::getMessage('SPOL_PAYED') ?>:
                                                <span class="order-list-default-item-content-state">
                                                    <?= Loc::getMessage('SPOL_'.($arOrder['ORDER']['PAYED'] == 'Y' ? 'YES' : 'NO')) ?>
                                                </span>
                                            </div>
                                            <div class="order-list-default-item-content-blocks">
                                                <?php foreach($arOrder['PAYMENT'] as $arPayment) { ?>
                                                    <div class="order-list-default-item-content-block">
                                                        <div class="order-list-default-item-content-properties">
                                                            <div class="order-list-default-item-content-property">
                                                                <?= Loc::getMessage('SPOL_ORDER_N') ?> <?= Loc::getMessage('SPOL_NUM_SIGN') ?><?= $arPayment['ACCOUNT_NUMBER']?>
                                                                <?php if(!empty($arOrder['ORDER']['DATE_INSERT_FORMATED'])) { ?>
                                                                    <?= Loc::getMessage('SPOL_FROM') ?> <?= $arOrder['ORDER']['DATE_INSERT_FORMATED'] ?>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="order-list-default-item-content-property">
                                                                <?= Loc::getMessage('SPOL_TYPE_PAY') ?>: <?= $arPayment['PAY_SYSTEM_NAME'] ?>
                                                            </div>
                                                            <div class="order-list-default-item-content-property">
                                                                <?= Loc::getMessage('SPOL_FROM_ORDER') ?> <?= $arPayment['FORMATED_SUM'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="order-list-default-item-content-block">
                                                    <div class="order-list-default-item-content-properties">
                                                        <?php if (!empty($arStatus)) { ?>
                                                            <div class="order-list-default-item-content-property">
                                                                <?= Loc::getMessage('SPOL_STATUS') ?>: <?= $arStatus['NAME'] ?>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="order-list-default-item-content-property">
                                                            <?= Loc::getMessage('SPOL_PAY_SUM') ?> <?= $arOrder['ORDER']['FORMATED_PRICE'] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-list-default-item-content-right">
                                            <div class="order-list-default-item-content-blocks">
                                                <?php foreach($arOrder['SHIPMENT'] as $arShipment) { ?>
                                                    <div class="order-list-default-item-content-block order-list-default-item-content-delivery">
                                                        <div class="order-list-default-item-content-name">
                                                            <?= Loc::getMessage('SPOL_DELIVERY') ?>:
                                                            <span class="order-list-default-item-content-state">
                                                                <?= $arShipment['DELIVERY_NAME']?>
                                                            </span>
                                                        </div>
                                                        <div class="order-list-default-item-content-properties">
                                                            <div class="order-list-default-item-content-property">
                                                                <?= Loc::getMessage('SPOL_SNIP') ?>: <?= Loc::getMessage('SPOL_NUM_SIGN') ?><?= $arShipment['ACCOUNT_NUMBER'] ?>
                                                            </div>
                                                            <div class="order-list-default-item-content-property">
                                                                <?= Loc::getMessage('SPOL_SUM_SNIPMENT') ?>: <?= $arShipment['FORMATED_DELIVERY_PRICE'] ?>
                                                            </div>
                                                            <div class="order-list-default-item-content-property">
                                                                <?= Loc::getMessage('SPOL_SHIPPING_STATUS') ?>: <?= $arShipment['DELIVERY_STATUS_NAME'] ?>
                                                            </div>
                                                            <div class="order-list-default-item-content-property">
                                                                <?= Loc::getMessage('SPOL_DELIVERY_SERVICE') ?>: <?= $arShipment['DELIVERY_NAME'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="order-list-default-item-content-buttons">
                                        <div class="order-list-default-item-content-wrapper">
                                            <div class="order-list-default-item-content-left">
                                                <a href="<?=$arOrder["ORDER"]["URL_TO_DETAIL"]?>" class="intec-button intec-button-s-7 intec-button-cl-common">
                                                    <?= Loc::getMessage('SPOL_BUTTONS_DETAIL') ?>
                                                </a>
                                                <a href="<?=$arOrder["ORDER"]["URL_TO_COPY"]?>" class="intec-button intec-button-s-7 intec-button-cl-common">
                                                    <?= Loc::getMessage('SPOL_BUTTONS_COPY') ?>
                                                </a>
                                            </div>
                                            <div class="order-list-default-item-content-right">
                                                <a href="<?=$arOrder["ORDER"]["URL_TO_CANCEL"]?>" class="intec-button intec-button-s-7 intec-button-cl-default intec-button-transparent">
                                                    <?= Loc::getMessage('SPOL_BUTTONS_CANCEL') ?>
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    <? } ?>
                </div>
            </div>
            <script>
                (function ($, api) {
                    var root = $(<?= JavaScript::toObject('#'.$sTemplateId) ?>);
                    var items = [];

                    root.find('[data-role="items"] [data-role="item"]').each(function () {
                        var item;
                        var nodes;
                        var isOpened;

                        nodes = {};
                        nodes.item = $(this);
                        nodes.button = nodes.item.find('[data-role="button"]');
                        nodes.content = nodes.item.find('[data-role="content"]');

                        isOpened = false;

                        item = {};
                        item.getNode = function () { return nodes.item; };
                        item.getNodeButton = function () { return nodes.button; };
                        item.getNodeContent = function () { return nodes.content; };

                        item.isOpened = function () { return isOpened; };

                        item.open = function (callback) {
                            if (item.isOpened())
                                return;

                            isOpened = true;
                            nodes.item.trigger('open', item);
                            nodes.content.stop().slideToggle({
                                'duration': 300,
                                'complete': function () {
                                    nodes.item.trigger('opened', item);

                                    if ($.isFunction(callback))
                                        callback.apply(item);
                                }
                            });
                        };
                        item.close = function (callback) {
                            if (!item.isOpened())
                                return;

                            isOpened = false;
                            nodes.item.trigger('close', item);
                            nodes.content.stop().slideToggle({
                                'duration': 300,
                                'complete': function () {
                                    nodes.item.trigger('closed', item);

                                    if ($.isFunction(callback))
                                        callback.apply(item);
                                }
                            });
                        };
                        item.toggle = function (callback) {
                            var state;
                            var handler;

                            handler = function () {
                                nodes.item.trigger('toggled', item, state);

                                if ($.isFunction(callback))
                                    callback.apply(this, arguments);
                            };

                            state = item.isOpened();
                            nodes.item.trigger('toggle', item, state);

                            if (state) {
                                item.close(handler);
                            } else {
                                item.open(handler);
                            }
                        };

                        nodes.button.on('click', function () {
                            item.toggle();
                        });

                        nodes.content.slideToggle();

                        items.push(item);
                    }).on('open', function (event, item) {
                        item.getNode().addClass('order-list-default-item-active');
                    }).on('close', function (event, item) {
                        item.getNode().removeClass('order-list-default-item-active');
                    });
                })(jQuery, intec)
            </script>
        </div>
    </div>
</div>