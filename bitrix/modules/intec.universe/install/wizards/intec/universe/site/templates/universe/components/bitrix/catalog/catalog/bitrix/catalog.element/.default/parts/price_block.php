<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\JavaScript;
use intec\core\helpers\Json;
use \Bitrix\Main\Localization\Loc;

/**
 * @var $APPLICATION
 * @var array $arResult
 * @var array $arParams
 * @var array $component
 * @var array $arItemIDs
 * @var array $minPrice
 * @var boolean $canBuy
 * @var array $currentOffer
 * @var boolean $showBuyBtn
 * @var boolean $showAddBtn
 * @var boolean $showSubscribeBtn
 * @var integer $currentOfferId
 */

$buyBtnMessage = GetMessage('CT_BCE_CATALOG_BUY');
if (!empty($arParams['MESS_BTN_BUY'])) {
    $buyBtnMessage = $arParams['MESS_BTN_BUY'];
} else if (!empty($arParams['MESS_BTN_ADD_TO_BASKET'])) {
    $buyBtnMessage = $arParams['MESS_BTN_ADD_TO_BASKET'];
}
$notAvailableMessage = $arParams['MESS_NOT_AVAILABLE'] != '' ? $arParams['MESS_NOT_AVAILABLE'] : GetMessageJS('CT_BCE_CATALOG_NOT_AVAILABLE');
$compareBtnMessage = $arParams['MESS_BTN_COMPARE'] != '' ? $arParams['MESS_BTN_COMPARE'] : GetMessage('CT_BCE_CATALOG_COMPARE');

$iIBlockId = $arResult['IBLOCK_ID'];
$bInBasket = ArrayHelper::getValue($arResult, ['BASKET', 'IN']);
$bInDelay = ArrayHelper::getValue($arResult, ['BASKET', 'DELAY']);
$bInCompare = !empty(ArrayHelper::getValue($_SESSION, [$arParams['COMPARE_NAME'], $arParams['IBLOCK_ID'], 'ITEMS', $arResult['ID']]));
$compareList = $arParams['COMPARE_NAME'];

$bShowSelectedPrices = ArrayHelper::getValue($arParams, 'SHOW_ALL_SELECTED_PRICES') == 'Y';
$arPricesSelectedList = ArrayHelper::getValue($arParams, 'PRICE_CODE');
$arAdditionalPrices = ArrayHelper::getValue($arResult, 'ADDITIONAL_PRICES_TO_DISPLAY');

$bShowQuantityMarkers = ArrayHelper::getValue($arParams, 'USE_QUANTITY_MARKERS') == 'Y';
$sQuantityMarkerMany = ArrayHelper::getValue($arParams, 'QUANTITY_MARKER_MANY');
$sQuantityMarkerFew = ArrayHelper::getValue($arParams, 'QUANTITY_MARKER_FEW');
$sQuantityMarker = null;
$sQuantity = ArrayHelper::getValue($arResult, 'CATALOG_QUANTITY');
$sQuantityMeasure = ArrayHelper::getValue($arResult, 'CATALOG_MEASURE_NAME');
$displayDelay = ArrayHelper::getValue($arResult, 'DISPLAY_DELAY');
$bShowMeasure = ArrayHelper::getValue($arParams, 'DISPLAY_MEASURE', 'Y') == 'Y';
$bUseProductQuantity = ArrayHelper::getValue($arParams, 'USE_PRODUCT_QUANTITY');

if (empty($arResult['OFFERS']) && $bShowQuantityMarkers) {
    if ($sQuantity >= $sQuantityMarkerMany) {
        $sQuantityMarker = GetMessage('CE_M_QUANTITY_MARKER_MANY');
    } else if ($sQuantity <= $sQuantityMarkerFew) {
        $sQuantityMarker = GetMessage('CE_M_QUANTITY_MARKER_FEW');
    } else {
        $sQuantityMarker = GetMessage('CE_M_QUANTITY_MARKER_ENOUGH');
    }
}

$actualItem = (!empty($arResult['OFFERS']))?$currentOffer:$arResult;
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];

?>
<div class="row">
    <div class="col-xs-5 column-price-value">
        <div class="item-price">
            <div class="item-current-price-wrap">
                <?php if ('Y' == $arParams['SHOW_MAX_QUANTITY']) {
                    if (!empty($arResult['OFFERS'])) { ?>
                        <div class="item-quantity text-muted" id="<?= $arItemIDs['QUANTITY_LIMIT'] ?>">
                            <?= GetMessage('OSTATOK').': ' ?>
                            <span></span>
                        </div>
                    <?php } else { ?>
                        <div class="item-quantity text-muted" id="<? $arItemIDs['QUANTITY_LIMIT'] ?>">
                            <?= GetMessage('OSTATOK').': ' ?>
                            <?php if ($bShowQuantityMarkers && !empty($sQuantityMarkerMany) && !empty($sQuantityMarkerFew)) { ?>
                                <span><?= $sQuantityMarker ?></span>
                            <?php } else { ?>
                                <?php if ($sQuantity > 0) { ?>
                                    <span>
                                        <?= $arResult['CATALOG_QUANTITY'] .' '. $arResult['CATALOG_MEASURE_NAME'] ?>
                                    </span>
                                <?php } else { ?>
                                    <span>
                                        <?= $notAvailableMessage ?>
                                    </span>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php }
                } ?>
                <div class="item-current-price">
                    <?= $minPrice['PRINT_DISCOUNT_VALUE']?>
                </div>

                <?php if ($bShowSelectedPrices) { ?>
                    <div class="item-additional-price">
                        <?php foreach ($arPricesSelectedList as $selectedPrice) { ?>
                            <div class="price-<?= strtolower($selectedPrice) ?>">
                                <?php if (!empty($arAdditionalPrices[$selectedPrice])) { ?>
                                    <?= $arAdditionalPrices[$selectedPrice]['TITLE'] . ':' ?>
                                    <?= $arAdditionalPrices[$selectedPrice]['PRINT_DISCOUNT_VALUE'] ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="item-old-price-wrap">
                <?php if ($arParams['SHOW_OLD_PRICE'] == 'Y') {
                    $boolDiscountShow = $minPrice['DISCOUNT_DIFF'] > 0;
                ?>
                    <div class="item-old-price" style="<?= $boolDiscountShow ? '' : 'display: none' ?>">
                        <?= $boolDiscountShow ? $minPrice['PRINT_VALUE'] : '' ?>
                    </div>
                <?php } ?>

                <?php if ($arParams['SHOW_DISCOUNT_PERCENT'] == 'Y') {
                    if (empty($arResult['OFFERS'])) {
                        if ($arResult['MIN_PRICE']['DISCOUNT_DIFF'] > 0) { ?>
                            <div class="item-discount-percents" id="<?= $arItemIDs['DISCOUNT_PICT_ID'] ?>">
                                <?= -$arResult['MIN_PRICE']['DISCOUNT_DIFF_PERCENT'] ?>%
                            </div>
                        <?php }
                    } elseif ($currentOffer) {
                        if ($currentOffer['MIN_PRICE']['DISCOUNT_DIFF'] > 0) { ?>
                            <div class="item-discount-percents" id="<?= $arItemIDs['DISCOUNT_PICT_ID'] ?>">
                                <?= -$currentOffer['MIN_PRICE']['DISCOUNT_DIFF_PERCENT'] ?>%
                            </div>
                        <?php }
                    }
                } ?>
            </div>
            <?php
            if ($arParams['USE_PRICE_COUNT'])
            {
                $showRanges = count($actualItem['ITEM_QUANTITY_RANGES']) > 1;
                $useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';

                ?>
                <div class="item-current-price-ranges-block"
                    <?=$showRanges ? '' : 'style="display: none;"'?>
                     data-entity="price-ranges-block">
                    <div class="item-current-price-ranges-block-title">
                        <?=$arParams['MESS_PRICE_RANGES_TITLE']?>
                        <span data-entity="price-ranges-ratio-header">
                                                    (<?=(Loc::getMessage(
                                'CT_BCE_CATALOG_RATIO_PRICE',
                                array('#RATIO#' => ($useRatio ? $measureRatio : '1').' '.$actualItem['ITEM_MEASURE']['TITLE'])
                            ))?>)
                                                </span>
                    </div>
                    <div class="price-ranges-block-items" data-entity="price-ranges-body">
                        <?
                        if ($showRanges)
                        {
                            foreach ($actualItem['ITEM_QUANTITY_RANGES'] as $range)
                            {
                                if ($range['HASH'] !== 'ZERO-INF')
                                {
                                    $itemPrice = false;

                                    foreach ($actualItem['ITEM_PRICES'] as $itemPrice)
                                    {
                                        if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
                                        {
                                            break;
                                        }
                                    }

                                    if ($itemPrice)
                                    {
                                        ?>
                                        <div class="price-ranges-block-item">
                                            <?
                                            echo Loc::getMessage(
                                                    'CT_BCE_CATALOG_RANGE_FROM',
                                                    array('#FROM#' => $range['SORT_FROM'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
                                                ).' ';

                                            if (is_infinite($range['SORT_TO']))
                                            {
                                                echo Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
                                            }
                                            else
                                            {
                                                echo Loc::getMessage(
                                                    'CT_BCE_CATALOG_RANGE_TO',
                                                    array('#TO#' => $range['SORT_TO'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
                                                );
                                            }
                                            ?>
                                            <span class="price-ranges-block-item-value"><?=($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE'])?></span>
                                        </div>
                                        <?
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <?
                unset($showRanges, $useRatio, $itemPrice, $range);
            }
            ?>
        </div>
    </div>
    <div class="col-xs-7 column-buy-button" style="<?= !$currentOffer['CAN_BUY'] ? 'display: none;' : '' ?>">
        <div class="item-info-section clearfix">
            <?php if ($arParams['USE_BASKET'] == 'Y') { ?>
                <?php if ($bUseProductQuantity) { ?>
                    <?php if (!empty($arResult['OFFERS'])) { ?>
                        <?php foreach($arResult['OFFERS'] as $key => $arOffer) {
                            $bInBasket = ArrayHelper::getValue($arOffer, ['BASKET', 'IN']);
                            $bInDelay = ArrayHelper::getValue($arOffer, ['BASKET', 'DELAY']);
                            $bInCompare = !empty(ArrayHelper::getValue($_SESSION, [$arParams['COMPARE_NAME'], 'ITEMS', $arResult['ID']]));
                            $bCanBuyZero = ArrayHelper::getValue($arOffer, 'CAN_BUY_ZERO');
                            $bOfferCanBuy = ArrayHelper::getValue($arOffer, ['CAN_BUY']);

                            if ($bOfferCanBuy) {
                                $arCounterSettings = Json::encode([
                                    'bounds' => [
                                        'minimum' => $arOffer['CATALOG_MEASURE_RATIO'],
                                        'maximum' => $bCanBuyZero ? false : $arOffer['CATALOG_QUANTITY']
                                    ],
                                    'step' => $arOffer['CATALOG_MEASURE_RATIO'],
                                    'value' => $arOffer['CATALOG_MEASURE_RATIO']
                                ]);

                            ?>
                            <div class="item-buttons-block block-<?= $arOffer['ID'] ?>" style="display: none;">
                                <div class="item-buttons vam">
                                    <span class="item-quantity-wrap" data-settings="<?= Html::encode($arCounterSettings) ?>">
                                        <?= Html::tag('a', '-', [
                                            'href' => 'javascript:void(0)',
                                            'data-type' => 'button',
                                            'data-action' => 'decrement',
                                            'class' => 'intec-bt-button=type-2 button-small item-quantity-down intec-cl-text-hover'
                                        ]) ?>
                                        <?= Html::input('text', null, $arOffer['CATALOG_MEASURE_RATIO'], [
                                            'data-type' => 'input',
                                            'class' => 'item-quantity-input'
                                        ]) ?>
                                        <?= Html::tag('a', '+', [
                                            'href' => 'javascript:void(0)',
                                            'data-type' => 'button',
                                            'data-action' => 'increment',
                                            'class' => 'intec-bt-button=type-2 button-small item-quantity-down intec-cl-text-hover'
                                        ]) ?>
                                        <?=$bShowMeasure?'<span class="item-quantity-measure">'.$arOffer['ITEM_MEASURE']['TITLE'].'</span>':'';?>
                                    </span>
                                    <span class="item-buttons-counter-block">
                                        <a class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button add"
                                           data-basket-add="<?= $arOffer['ID'] ?>"
                                           data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                           data-basket-quantity="<?= $arOffer['CATALOG_MEASURE_RATIO'] ?>">
                                            <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                            <span class="intec-basket-text"><?= $buyBtnMessage ?></span>
                                        </a>
                                        <a href="<?= $arParams['BASKET_URL'] ?>"
                                           class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button added"
                                           data-basket-added="<?= $arOffer['ID'] ?>"
                                           data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                           data-basket-quantity="<?= $arOffer['CATALOG_MEASURE_RATIO'] ?>">
                                            <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                            <span class="intec-basket-text">
                                                <?= GetMessage('CT_BCE_CATALOG_ADDED') ?>
                                            </span>
                                        </a>
                                        <?php if ($arParams['USE_FAST_ORDER'] == 'Y') { ?>
                                            <span class="intec-button intec-button-link jsFastOrder">
                                                <i class="intec-button-w-icon glyph-icon-one_click"></i>
                                                <?= GetMessage('CE_FAST_ORDER') ?>
                                            </span>
                                        <?php } ?>
                                    </span>
                                </div>
                                <span class="intec-small-buttons-wrapper">
                                    <?php if ($arParams['DISPLAY_COMPARE']) { ?>
                                        <span class="intec-compare glyph-icon-compare add"
                                              data-compare-add="<?= $arOffer['ID'] ?>"
                                              data-compare-in="<?= $bInCompare ? 'true' : 'false' ?>"
                                              data-compare-list="<?= $compareList ?>"
                                              data-compare-iblock="<?= $iIBlockId ?>">
                                        </span>
                                        <span class="intec-compare glyph-icon-compare active added"
                                              data-compare-added="<?= $arOffer['ID'] ?>"
                                              data-compare-in="<?= $bInCompare ? 'true' : 'false' ?>"
                                              data-compare-list="<?= $compareList ?>"
                                              data-compare-iblock="<?= $iIBlockId ?>">
                                        </span>
                                    <?php } ?>
                                    <?php if ($displayDelay) { ?>
                                        <span class="intec-like fa fa-heart add"
                                              data-basket-delay="<?= $arOffer['ID'] ?>"
                                              data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>">
                                        </span>
                                        <span class="intec-like fa fa-heart added active"
                                              data-basket-delayed="<?= $arOffer['ID'] ?>"
                                              data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>">
                                        </span>
                                    <?php } ?>
                                </span>
                            </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } else {

                        $bCanBuyZero = ArrayHelper::getValue($arResult, 'CAN_BUY_ZERO');

                        $arCounterSettings = Json::encode([
                            'bounds' => [
                                'minimum' => $arResult['CATALOG_MEASURE_RATIO'],
                                'maximum' => $bCanBuyZero ? false : $arResult['CATALOG_QUANTITY']
                            ],
                            'step' => $arResult['CATALOG_MEASURE_RATIO'],
                            'value' => $arResult['CATALOG_MEASURE_RATIO']
                        ]);

                        ?>
                        <div class="item-buttons block-<?= $currentOfferId ?>">
                            <?php if ($canBuy) { ?>
                                <span class="item-quantity-wrap" data-settings="<?= Html::encode($arCounterSettings) ?>">
                                    <?= Html::tag('a', '-', [
                                        'href' => 'javascript:void(0)',
                                        'data-type' => 'button',
                                        'data-action' => 'decrement',
                                        'class' => 'intec-bt-button=type-2 button-small item-quantity-down intec-cl-text-hover'
                                    ]) ?>
                                    <?= Html::input('text', null, $arResult['CATALOG_MEASURE_RATIO'], [
                                        'data-type' => 'input',
                                        'class' => 'item-quantity-input'
                                    ]) ?>
                                    <?= Html::tag('a', '+', [
                                        'href' => 'javascript:void(0)',
                                        'data-type' => 'button',
                                        'data-action' => 'increment',
                                        'class' => 'intec-bt-button=type-2 button-small item-quantity-down intec-cl-text-hover'
                                    ]) ?>
                                    <?=$bShowMeasure?'<span class="item-quantity-measure">'.$arResult['ITEM_MEASURE']['TITLE'].'</span>':'';?>
                                </span>
                                <span class="item-buttons-counter-block" id="<?= $arItemIDs['BASKET_ACTIONS'] ?>">
                                    <a class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button add"
                                       data-basket-add="<?= $arResult['ID'] ?>"
                                       data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                       data-basket-quantity="<?= $arResult['CATALOG_MEASURE_RATIO'] ?>">
                                        <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                        <span class="intec-basket-text"><?= $buyBtnMessage ?></span>
                                    </a>
                                    <a href="<?= $arParams['BASKET_URL'] ?>"
                                       class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button added"
                                       data-basket-added="<?= $arResult['ID'] ?>"
                                       data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>">
                                        <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                        <span class="intec-basket-text"><?= GetMessage('CT_BCE_CATALOG_ADDED') ?></span>
                                    </a>

                                    <?php if ($arParams['USE_FAST_ORDER'] == 'Y') { ?>
                                        <span class="intec-button intec-button-link jsFastOrder">
                                            <i class="intec-button-w-icon glyph-icon-one_click"></i>
                                            <?= GetMessage('CE_FAST_ORDER') ?>
                                        </span>
                                    <?php } ?>
                                </span>
                            <?php } ?>

                            <?php if ($showSubscribeBtn) {
                                $APPLICATION->includeComponent('bitrix:catalog.product.subscribe', '',
                                    array(
                                        'PRODUCT_ID' => $arResult['ID'],
                                        'BUTTON_ID' => $arItemIDs['SUBSCRIBE_LINK'],
                                        'BUTTON_CLASS' => 'bx_big bx_bt_button',
                                        'DEFAULT_DISPLAY' => !$canBuy,
                                    ),
                                    $component, array('HIDE_ICONS' => 'Y')
                                );
                            } ?>
                        </div>
                        <span class="intec-small-buttons-wrapper">
                            <?php if ($arParams['DISPLAY_COMPARE']) { ?>
                                <span class="intec-compare glyph-icon-compare add"
                                      data-compare-add="<?= $arResult['ID'] ?>"
                                      data-compare-in="<?= $bInCompare ? 'true' : 'false' ?>"
                                      data-compare-list="<?= $compareList ?>"></span>
                                <span class="intec-compare glyph-icon-compare active added"
                                      data-compare-added="<?= $arResult['ID'] ?>"
                                      data-compare-in="<?= $bInCompare ? 'true' : 'false' ?>"
                                      data-compare-list="<?= $compareList ?>"></span>
                            <?php } ?>
                            <?php if ($displayDelay) { ?>
                                <span class="intec-like fa fa-heart add <?= $arResult['IN_DELAY'] ? 'active' : '' ?>"
                                      data-basket-delay="<?= $arResult['ID'] ?>"
                                      data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>"></span>
                                <span class="intec-like fa fa-heart added active <?= $arResult['IN_DELAY'] ? 'active' : '' ?>"
                                      data-basket-delayed="<?= $arResult['ID'] ?>"
                                      data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>"></span>
                            <?php } ?>
                        </span>
                    <?php } ?>
                <?php } else { ?>
                    <?php if (!empty($arResult['OFFERS'])) { ?>
                        <?php foreach($arResult['OFFERS'] as $key => $arOffer) {

                            $bInBasket = ArrayHelper::getValue($arOffer, ['BASKET', 'IN']);
                            $bInDelay = ArrayHelper::getValue($arOffer, ['BASKET', 'DELAY']);
                            $bInCompare = !empty(ArrayHelper::getValue($_SESSION, [$arParams['COMPARE_NAME'], 'ITEMS', $arResult['ID']]));

                            ?>
                            <div class="item-buttons-block block-<?= $arOffer['ID'] ?>" style="display: none;">
                                <div class="item-buttons vam">
                                    <span class="item-buttons-counter-block">
                                        <a class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button add"
                                           data-basket-add="<?= $arOffer['ID'] ?>"
                                           data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                           data-basket-quantity="<?= $arOffer['CATALOG_MEASURE_RATIO'] ?>">
                                            <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                            <span class="intec-basket-text"><?= $buyBtnMessage ?></span>
                                        </a>
                                        <a href="<?= $arParams['BASKET_URL'] ?>"
                                           class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button added"
                                           data-basket-added="<?= $arOffer['ID'] ?>"
                                           data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                           data-basket-quantity="<?= $arOffer['CATALOG_MEASURE_RATIO'] ?>">
                                            <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                            <span class="intec-basket-text">
                                                <?= GetMessage('CT_BCE_CATALOG_ADDED') ?>
                                            </span>
                                        </a>
                                        <?php if ($arParams['USE_FAST_ORDER'] == 'Y') { ?>
                                            <span class="intec-button intec-button-link jsFastOrder">
                                                <i class="intec-button-w-icon glyph-icon-one_click"></i>
                                                <?= GetMessage('CE_FAST_ORDER') ?>
                                            </span>
                                        <?php } ?>
                                    </span>
                                </div>
                                <span class="intec-small-buttons-wrapper">
                                    <?php if ($arParams['DISPLAY_COMPARE']) { ?>
                                        <span class="intec-compare glyph-icon-compare add"
                                              data-compare-add="<?= $arOffer['ID'] ?>"
                                              data-compare-in="<?= $bInCompare ? 'true' : 'false' ?>"
                                              data-compare-list="<?= $compareList ?>"
                                              data-compare-iblock="<?= $iIBlockId ?>">
                                        </span>
                                        <span class="intec-compare glyph-icon-compare active added"
                                              data-compare-added="<?= $arOffer['ID'] ?>"
                                              data-compare-in="<?= $bInCompare ? 'true' : 'false' ?>"
                                              data-compare-list="<?= $compareList ?>"
                                              data-compare-iblock="<?= $iIBlockId ?>">
                                        </span>
                                    <?php } ?>
                                    <?php if ($displayDelay) { ?>
                                        <span class="intec-like fa fa-heart add"
                                              data-basket-delay="<?= $arOffer['ID'] ?>"
                                              data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>">
                                        </span>
                                        <span class="intec-like fa fa-heart added active"
                                              data-basket-delayed="<?= $arOffer['ID'] ?>"
                                              data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>">
                                        </span>
                                    <?php } ?>
                                </span>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="item-buttons vam block-<?= $currentOfferId ?>">
                            <span class="item-buttons-counter-block"
                                  id="<?= $arItemIDs['BASKET_ACTIONS'] ?>"
                                  style="<?= $canBuy ? '' : 'display: none;' ?>">
                                <a class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button add"
                                   data-basket-add="<?= $arResult['ID'] ?>"
                                   data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                   data-basket-quantity="<?= $arResult['CATALOG_MEASURE_RATIO'] ?>">
                                    <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                    <span class="intec-basket-text"><?= $buyBtnMessage ?></span>
                                </a>
                                <a href="<?= $arParams['BASKET_URL'] ?>"
                                   class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button added"
                                   data-basket-added="<?= $arResult['ID'] ?>"
                                   data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                   data-basket-quantity="<?= $arResult['CATALOG_MEASURE_RATIO'] ?>">
                                    <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                    <span class="intec-basket-text"><?= GetMessage('CT_BCE_CATALOG_ADDED') ?></span>
                                </a>
                                <?php if ($arParams['USE_FAST_ORDER'] == 'Y') { ?>
                                    <span class="intec-button intec-button-link jsFastOrder">
                                        <i class="intec-button-w-icon glyph-icon-one_click"></i>
                                        <?= GetMessage('CE_FAST_ORDER') ?>
                                    </span>
                                <?php } ?>
                            </span>
                        </div>
                        <?php
                        unset($showAddBtn, $showBuyBtn); ?>

                        <span class="intec-small-buttons-wrapper">
                            <?php if ($arParams['DISPLAY_COMPARE']) { ?>
                                <span class="intec-compare glyph-icon-compare add"
                                      data-compare-add="<?= $arResult['ID'] ?>"
                                      data-compare-in="<?= $bInCompare ? 'true' : 'false' ?>"
                                      data-compare-list="<?= $compareList ?>">
                                </span>
                                <span class="intec-compare glyph-icon-compare active added"
                                      data-compare-added="<?= $arResult['ID'] ?>"
                                      data-compare-in="<?= $bInCompare ? 'true' : 'false' ?>"
                                      data-compare-list="<?= $compareList ?>">
                                </span>
                            <?php } ?>
                            <?php if ($displayDelay) { ?>
                                <span class="intec-like fa fa-heart add <?= $arResult['IN_DELAY'] ? 'active' : '' ?>"
                                      data-basket-delay="<?= $arResult['ID'] ?>"
                                      data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>">
                                </span>
                                <span class="intec-like fa fa-heart added active <?= $arResult['IN_DELAY'] ? 'active' : '' ?>"
                                      data-basket-delayed="<?= $arResult['ID'] ?>"
                                      data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>">
                                </span>
                            <?php } ?>
                        </span>
                    <?php } ?>
                <?php } ?>
            <?php } else { ?>
                <?php if (!empty($arResult['FORM_ORDER'])) { ?>
                    <a class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16"
                       onclick="universe.forms.show(<?= JavaScript::toObject($arResult['FORM_ORDER']) ?>)"
                        >
                        <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                        <span class="intec-basket-text"><?= GetMessage('TEXT_BUTTON_ORDER_PRODUCT') ?></span>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function ($, api) {
        var offer = null;
        var $itemDetail = $('.intec-item-detail');

        var priceUpdate = function (count) {

            if (count == 'undefined')
                return;

            var currentOffer = null;

            <?if (!empty($arResult['OFFERS'])) {?>
                currentOffer = offer['ITEM_PRICES'];
            <?php } elseif (!empty($arResult['ITEM_PRICES'])) {?>
                currentOffer = <?=JavaScript::toObject($arResult['ITEM_PRICES'])?>;
            <?php }?>

            if (currentOffer != null) {
                if (currentOffer.length > 1) {
                    var newPrice;
                    var oldPrice;

                    intec.each(currentOffer, function(i, property){
                        if (property['QUANTITY_FROM'] == null
                            && property['QUANTITY_TO'] != null
                            && property['QUANTITY_TO'] >= count) {

                            newPrice = property['PRINT_PRICE'];
                            oldPrice = property['PRINT_BASE_PRICE'];

                        } else if (property['QUANTITY_TO'] == null
                            && property['QUANTITY_FROM'] != null
                            && property['QUANTITY_FROM'] <= count) {

                            newPrice = property['PRINT_PRICE'];
                            oldPrice = property['PRINT_BASE_PRICE'];

                        } else if (property['QUANTITY_FROM'] != null
                            && property['QUANTITY_TO'] != null
                            && property['QUANTITY_FROM'] <= count
                            && property['QUANTITY_TO'] >= count) {

                            newPrice = property['PRINT_PRICE'];
                            oldPrice = property['PRINT_BASE_PRICE'];

                        }
                    });

                    $('.item-current-price', $itemDetail).html(newPrice);
                    $('.item-old-price', $itemDetail).html(oldPrice);

                    if (api.isDeclared(offer))
                        offer['CURRENT_COUNT'] = count;
                }
            }
        };

        $(document).ready(function () {
            $('.item-quantity-wrap').control('numeric', {}, function (settings, instance) {
                var node = this;

                if (instance !== null) {
                    instance.on('change', function (event, value) {
                        node.closest('.item-buttons')
                            .find('[data-basket-add]')
                            .data('basket-quantity', value);

                        priceUpdate(value);
                    });
                }
            });
        });

        <?php if (!empty($arResult['OFFERS'])) { ?>
            window.offers = new universe.catalog.offers(<?= JavaScript::toObject($arJSParams) ?>);

            $('.intec-item-detail .item-buttons-block.block-'+<?= $currentOffer['ID'] ?>).show();

            offers.on('offerChange', function(event, parameters) {
                offer = parameters.offer;

                var $container = $('#item-offer-' + parameters.offer['ID']);
                //var $buyButtonText = $('.intec-item-detail .intec-basket-button .intec-basket-text');

                if ($container.length > 0) {
                    var $containerSiblings = $container.siblings('.item-offer-images');
                    $container.fadeIn(500);
                    $containerSiblings.fadeOut(500);
                    $('.item-offers-images > .item-default-images').animate({opacity: 0}, 500);
                    $containerSiblings.find('.slider-item').removeClass('active');
                } else {
                    $('.item-offers-images > .item-offer-images').fadeOut(500);
                    $('.item-offers-images > .item-default-images').animate({opacity: 1}, 500);
                }

                var propertyValueSelector = function (properties, codeKey, valueKey) {
                    var result = [];

                    codeKey = codeKey || 'key';
                    valueKey = valueKey || 'value';

                    intec.each(properties, function(i, property){
                        if (property[codeKey] && property[valueKey])
                            result.push('[data-property-code="'+ property[codeKey] +'"] [data-property-value="'+ property[valueKey] +'"]');
                    });

                    return result.join(', ');
                };

                // Properties values
                $('.sku-property-value', $itemDetail).addClass('disabled');
                $(propertyValueSelector(parameters.properties.enabled)).removeClass('disabled');
                $('[data-property-value]').removeClass('active');
                $(propertyValueSelector(parameters.properties.selected)).addClass('active');

                // Show offer content
                $itemDetail.data('offer-id', parameters.offer['ID']);

                if (parameters.offer['CAN_BUY']) {
                    $('.column-buy-button', $itemDetail).show();
                } else {
                    $('.column-buy-button', $itemDetail).hide();
                }

                $('.item-current-price', $itemDetail).html(parameters.offer['PRICE']['PRINT_DISCOUNT_VALUE']);
                $('.price-ranges-block-items', $itemDetail).html(parameters.offer['PRICE_RANGES_HTML']);

                <?php if (!empty($arResult['OFFERS'])) { ?>
                for (var key in parameters.offer['ADDITIONAL_PRICES_TO_DISPLAY']) {
                    var priceName = parameters.offer['ADDITIONAL_PRICES_TO_DISPLAY'][key]['TITLE'];
                    var price = parameters.offer['ADDITIONAL_PRICES_TO_DISPLAY'][key]['PRINT_DISCOUNT_VALUE'];
                    var selector = key.toLowerCase();

                    $('.item-additional-price .price-'+selector, $itemDetail).html(priceName + ': ' + price);
                }
                <?php } ?>

                $('.item-old-price', $itemDetail).html(parameters.offer['PRICE']['PRINT_VALUE']);
                $('.item-discount-percents', $itemDetail).html('-' + parameters.offer['PRICE']['DISCOUNT_DIFF_PERCENT'] + '%');
                $('[data-max-quantity]', $itemDetail).data('max-quantity', parameters.offer['MAX_QUANTITY']);
                $('.item-quantity-input', $itemDetail).trigger('change');

                <?php if ($bShowQuantityMarkers && !empty($sQuantityMarkerMany) && !empty($sQuantityMarkerFew)) { ?>
                    if (parameters.offer['MAX_QUANTITY'] >= <?= $sQuantityMarkerMany ?>) {
                        $('.item-quantity > span', $itemDetail).html('<?= GetMessage('CE_M_QUANTITY_MARKER_MANY') ?>');
                    } else if (parameters.offer['MAX_QUANTITY'] <= <?= $sQuantityMarkerFew ?>) {
                        $('.item-quantity > span', $itemDetail).html('<?= GetMessage('CE_M_QUANTITY_MARKER_ENOUGH') ?>');
                    } else {
                        $('.item-quantity > span', $itemDetail).html('<?= GetMessage('CE_M_QUANTITY_MARKER_FEW') ?>');
                    }
                <?php } else { ?>
                    if (parameters.offer['MAX_QUANTITY'] > 0) {
                        $('.item-quantity > span', $itemDetail).html(parameters.offer['MAX_QUANTITY'] + ' ' + parameters.offer['MEASURE']);
                    } else {
                        $('.item-quantity > span', $itemDetail).html(<?= JavaScript::toObject($notAvailableMessage) ?>);
                    }
                <?php } ?>

                if (parameters.offer['DETAIL_PICTURE'] !== null) {
                    $('.item-bigimage', $itemDetail).attr('src', parameters.offer['DETAIL_PICTURE']['SRC']).trigger('changeImage');
                }

                $('.item-buttons-block', $itemDetail).hide();
                $('.item-buttons-block.block-'+parameters.offer['ID'], $itemDetail).show();

                priceUpdate(offer['CURRENT_COUNT']);
            });

            $(document).ready(function() {
                offers.setCurrentOfferByID(<?= $currentOffer['ID'] ?>);
            });
        <?php } ?>
    })(jQuery, intec);



    // Fast order
    $(document).on('click', '.intec-item-detail .jsFastOrder', function(){
        var itemId = $('.intec-item-detail').data('offer-id');
        var $itemQuantityInput = $(this).closest('.block-' + itemId).find('input.item-quantity-input');
        var parameters = <?= JavaScript::toObject(array(
            'TITLE' => $arParams['FAST_ORDER_TITLE'],
            'SEND' => $arParams['FAST_ORDER_SEND_BUTTON'],
            'SHOW_COMMENT' => $arParams['FAST_ORDER_SHOW_COMMENT'],
            'PRICE_TYPE_ID' => $arParams['FAST_ORDER_PRICE_TYPE'],
            'DELIVERY_ID' => $arParams['FAST_ORDER_DELIVERY_TYPE'],
            'PAYMENT_ID' => $arParams['FAST_ORDER_PAYMET_TYPE'],
            'PERSON_TYPE_ID' => $arParams['FAST_ORDER_PAYER_TYPE'],
            'SHOW_ORDER_PROPERTIES' => $arParams['FAST_ORDER_SHOW_PROPERTIES'],
            'PROPERTY_PHONE' => $arParams['FAST_ORDER_PROPERTY_PHONE'],
            'CONSENT_URL' => $arParams['CONSENT_URL'],
            'SHOW_AGREEMENT' => 'Y',
            'URL_AGREEMENT' => $arParams['CONSENT_URL'],
            'AJAX_OPTION_ADDITIONAL' => $sTemplateId.'_FAST_ORDER'
        )) ?>;

        parameters.PRODUCT_ID = itemId;

        if ($itemQuantityInput) {
            parameters.PRODUCT_QUANTITY = $itemQuantityInput.val();
        }

        universe.components.show({
            component: '<?= $arResult['FAST_ORDER_COMPONENT'] ?>',
            template: '<?= $arParams['FAST_ORDER_TEMPLATE'] ?>',
            parameters: parameters,
            settings: {
                width: 800
            }
        });
    });
</script>
