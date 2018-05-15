<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\JavaScript;

/**
 * @var $APPLICATION
 * @var array $arResult
 * @var array $arParams
 * @var array $component
 * @var string $strTitle
 * @var string $strAlt
 * @var array $headerFixedImg
 * @var array $minPrice
 */

?>
<div id="header-fixed-product" class="header-fixed-product">
    <div class="header-content">
        <div class="intec-content intec-content-primary">
            <div class="intec-content-wrapper">
                <div class="header-product-wrapper">
                    <?if (!empty($headerFixedImg)) {?>
                        <div class="header-product-image-block">
                            <img src="<?= $headerFixedImg['src'] ?>" title="<?=$strTitle?>" alt="<?=$strAlt?>">
                            <div class="valign"></div>
                        </div>
                    <?}?>
                    <div class="header-product-description">
                        <?php if (!empty($arParams['PROPERTY_ARTICLE']) && !empty($arResult['PROPERTIES'][$arParams['PROPERTY_ARTICLE']])) { ?>
                            <div class="header-product-article">
                                <?= GetMessage('ARTICLE') ?> <?= $arResult['PROPERTIES'][$arParams['PROPERTY_ARTICLE']]['VALUE'] ?>
                            </div>
                        <?php } ?>
                        <div class="header-product-name">
                            <?=$arResult['NAME']?>
                        </div>
                    </div>
                    <div class="header-product-price">
                        <?php if ($arParams['SHOW_OLD_PRICE'] == 'Y') { ?>
                            <div class="header-product-old-price">
                                <?= $minPrice['DISCOUNT_DIFF'] > 0 ? $minPrice['PRINT_VALUE'] : '' ?>
                            </div>
                        <?php } ?>
                        <div class="header-product-new-price">
                            <?=$minPrice['PRINT_DISCOUNT_VALUE']?>
                        </div>
                    </div>
                    <div class="item-info-section clearfix">
                        <?php if ($arParams['USE_PRODUCT_QUANTITY'] == 'Y') { ?>
                            <?php if (!empty($arResult['OFFERS'])) { ?>
                                <?php foreach($arResult['OFFERS'] as $key => $arOffer) {
                                    $bInBasket = ArrayHelper::getValue($arOffer, ['BASKET', 'IN']);
                                    $bInDelay = ArrayHelper::getValue($arOffer, ['BASKET', 'DELAY']);
                                    $bInCompare = !empty(ArrayHelper::getValue($_SESSION, [$arParams['COMPARE_NAME'], 'ITEMS', $arResult['ID']]));

                                    if ($canBuy) {
                                        ?>
                                        <div class="item-buttons-block block-<?= $arOffer['ID'] ?>" style="display: none;">
                                            <div class="item-buttons vam">
                                                <?php if ($showBuyBtn || $showAddBtn) { ?>
                                                    <span class="item-quantity-wrap">
                                                        <?= Html::tag('a', '-', [
                                                            'href' => 'javascript:void(0)',
                                                            'data-type' => 'button',
                                                            'data-action' => 'decrement',
                                                            'class' => 'intec-bt-button=type-2 button-small item-quantity-down intec-cl-text-hover'
                                                        ]) ?>
                                                        <?= Html::input('text', null, 1, [
                                                            'data-type' => 'input',
                                                            'class' => 'item-quantity-input'
                                                        ]) ?>
                                                        <?= Html::tag('a', '+', [
                                                            'href' => 'javascript:void(0)',
                                                            'data-type' => 'button',
                                                            'data-action' => 'increment',
                                                            'class' => 'intec-bt-button=type-2 button-small item-quantity-down intec-cl-text-hover'
                                                        ]) ?>
                                                    </span>
                                                    <script type="text/javascript">
                                                        (function ($, api) {
                                                            api.controls.numeric(<?= JavaScript::toObject([
                                                                'bounds' => [
                                                                    'minimum' => $arOffer['CATALOG_MEASURE_RATIO'],
                                                                    'maximum' => $arOffer['CATALOG_QUANTITY']
                                                                ],
                                                                'step' => $arOffer['CATALOG_MEASURE_RATIO'],
                                                                'value' => $arOffer['CATALOG_MEASURE_RATIO']
                                                            ]) ?>, {
                                                                'node': $(<?= JavaScript::toObject('.item-buttons-block.block-'.$arOffer['ID'].' .item-quantity-wrap') ?>)
                                                            }).on('change', function (event, value) {
                                                                $(<?= JavaScript::toObject('.item-buttons-block.block-'.$arOffer['ID'].' [data-basket-add]') ?>).data('basket-quantity', value);
                                                            });
                                                        })(jQuery, intec)
                                                    </script>
                                                <?php } ?>
                                                <span class="item-buttons-counter-block">
                                    <a class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button add"
                                       data-basket-add="<?= $arOffer['ID'] ?>"
                                       data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                       data-basket-quantity="1">
                                        <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                        <span class="intec-basket-text"><?= $buyBtnMessage ?></span>
                                    </a>
                                    <a href="<?= $arParams['BASKET_URL'] ?>"
                                       class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button added"
                                       data-basket-added="<?= $arOffer['ID'] ?>"
                                       data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                       data-basket-quantity="1">
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
                                                <span class="intec-like fa fa-heart add"
                                                      data-basket-delay="<?= $arOffer['ID'] ?>"
                                                      data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>">
                                </span>
                                <span class="intec-like fa fa-heart added active"
                                      data-basket-delayed="<?= $arOffer['ID'] ?>"
                                      data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>">
                                </span>
                            </span>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="item-buttons vam">
                                    <?php if ($canBuy) { ?>
                                        <span class="item-quantity-wrap">
                                <?= Html::tag('a', '-', [
                                    'href' => 'javascript:void(0)',
                                    'data-type' => 'button',
                                    'data-action' => 'decrement',
                                    'class' => 'intec-bt-button=type-2 button-small item-quantity-down intec-cl-text-hover'
                                ]) ?>
                                <?= Html::input('text', null, 1, [
                                    'data-type' => 'input',
                                    'class' => 'item-quantity-input'
                                ]) ?>
                                <?= Html::tag('a', '+', [
                                    'href' => 'javascript:void(0)',
                                    'data-type' => 'button',
                                    'data-action' => 'increment',
                                    'class' => 'intec-bt-button=type-2 button-small item-quantity-down intec-cl-text-hover'
                                ]) ?>
                            </span>
                                        <script type="text/javascript">
                                            (function ($, api) {
                                                api.controls.numeric(<?= JavaScript::toObject([
                                                    'bounds' => [
                                                        'minimum' => $arResult['CATALOG_MEASURE_RATIO'],
                                                        'maximum' => $arResult['CATALOG_QUANTITY']
                                                    ],
                                                    'step' => $arResult['CATALOG_MEASURE_RATIO'],
                                                    'value' => $arResult['CATALOG_MEASURE_RATIO']
                                                ]) ?>, {
                                                    'node': $('.item-quantity-wrap')
                                                }).on('change', function (event, value) {
                                                    $('.intec-item-detail [data-basket-add]').data('basket-quantity', value);
                                                });
                                            })(jQuery, intec)
                                        </script>
                                        <span class="item-buttons-counter-block" id="<?= $arItemIDs['BASKET_ACTIONS'] ?>">
                                <?php if ($showBuyBtn) { ?>
                                    <a class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button add"
                                       data-basket-add="<?= $arResult['ID'] ?>"
                                       data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                       data-basket-quantity="1">
                                        <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                        <span class="intec-basket-text"><?= $buyBtnMessage ?></span>
                                    </a>
                                <?php } else if ($showAddBtn) { ?>
                                    <a class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button add"
                                       id="<?= $arItemIDs['ADD_BASKET_LINK'] ?>"
                                       data-basket-add="<?= $arResult['ID'] ?>"
                                       data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                       data-basket-quantity="1">
                                        <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                        <span class="intec-basket-text"><?= $addToBasketBtnMessage ?></span>
                                    </a>
                                <?php } ?>
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
                                    <?php } ?>
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
                                    <span class="intec-like fa fa-heart add <?= $arResult['IN_DELAY'] ? 'active' : '' ?>"
                                          data-basket-delay="<?= $arResult['ID'] ?>"
                                          data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>"></span>
                        <span class="intec-like fa fa-heart added active <?= $arResult['IN_DELAY'] ? 'active' : '' ?>"
                              data-basket-delayed="<?= $arResult['ID'] ?>"
                              data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>"></span>
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
                                       data-basket-quantity="1">
                                        <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                        <span class="intec-basket-text"><?= $buyBtnMessage ?></span>
                                    </a>

                                    <a href="<?= $arParams['BASKET_URL'] ?>"
                                       class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button added"
                                       data-basket-added="<?= $arOffer['ID'] ?>"
                                       data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                       data-basket-quantity="1">
                                        <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                        <span class="intec-basket-text">
                                            <?= GetMessage('CT_BCE_CATALOG_ADDED') ?>
                                        </span>
                                    </a>
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
                                            <span class="intec-like fa fa-heart add"
                                                  data-basket-delay="<?= $arOffer['ID'] ?>"
                                                  data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>">
                                </span>
                                <span class="intec-like fa fa-heart added active"
                                      data-basket-delayed="<?= $arOffer['ID'] ?>"
                                      data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>">
                                </span>
                            </span>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="item-buttons vam">
                        <span class="item-buttons-counter-block"
                              id="<?= $arItemIDs['BASKET_ACTIONS'] ?>"
                              style="<?= $canBuy ? '' : 'display: none;' ?>">
                            <?php if ($showBuyBtn) { ?>
                                <a class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button add"
                                   data-basket-add="<?= $arResult['ID'] ?>"
                                   data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                   data-basket-quantity="1">
                                    <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                    <span class="intec-basket-text"><?= $buyBtnMessage ?></span>
                                </a>
                            <?php } else if ($showAddBtn) { ?>
                                <a class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button add"
                                   data-basket-add="<?= $arResult['ID'] ?>"
                                   data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                                   data-basket-quantity="1">
                                    <span class="intec-button-w-icon intec-basket glyph-icon-cart"></span>
                                    <span class="intec-basket-text"><?= $addToBasketBtnMessage ?></span>
                                </a>
                            <?php } ?>
                            <a href="<?= $arParams['BASKET_URL'] ?>"
                               class="intec-button intec-button-cl-common intec-button-md intec-button-s-7 intec-button-fs-16 intec-button-block intec-basket-button added"
                               data-basket-added="<?= $arResult['ID'] ?>"
                               data-basket-in="<?= $bInBasket ? 'true' : 'false' ?>"
                               data-basket-quantity="1">
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
                                    <span class="intec-like fa fa-heart add <?= $arResult['IN_DELAY'] ? 'active' : '' ?>"
                                          data-basket-delay="<?= $arResult['ID'] ?>"
                                          data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>">
                        </span>
                        <span class="intec-like fa fa-heart added active <?= $arResult['IN_DELAY'] ? 'active' : '' ?>"
                              data-basket-delayed="<?= $arResult['ID'] ?>"
                              data-basket-in="<?= $bInDelay ? 'true' : 'false' ?>">
                        </span>
                    </span>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function fix_header_product(positionActive){
        var currentPosition = $(window).scrollTop();
        var headerDOM = $('.header-fixed-product');
        if (currentPosition > positionActive && !headerDOM.hasClass('product-fixed')) {
            headerDOM.addClass('product-fixed');
            headerDOM.animate({opacity: 1, top: 0}, 200);
        } else if (currentPosition <= positionActive && headerDOM.hasClass('product-fixed')) {
            headerHeight = headerDOM.outerHeight();
            headerDOM.removeClass('product-fixed');
            headerDOM.animate({opacity: 0, top: '-'+headerHeight+'px'}, 100);
        }
    }

    $(document).ready(function() {
        $("#header-fixed").remove();
        var headerDOM = $('.header-fixed-product');
        headerDOM.css('top', '-'+headerDOM.outerHeight()+'px');
        var positionActive = $('.header-desktop').offset().top + $('.header-desktop').outerHeight();
        $(window).scroll(function() {
            fix_header_product(positionActive);
        });
    });
</script>
