<?php

use intec\core\helpers\Html;

/**
 * @var array $arElement
 * @var string $sName
 * @var string $sDetailPage
 * @var string $sPrice
 * @var string $sMeasureRatio
 * @var string $sBasketUrl
 * @var string $sOldPrice
 * @var boolean $bCanBuy
 * @var boolean $bOffersExist
 * @var boolean $bDiscount
 * @var array $arCounterSettings
 */

?>
<div class="element-description-with-counter">
    <a class="element-name intec-cl-text-hover" href="<?= $sDetailPage ?>">
        <?= $sName ?>
    </a>
    <div class="element-price">
        <?= $sPrice ?>
    </div>
    <?php if ($bDiscount) { ?>
        <div class="element-old-price">
            <?= $sOldPrice ?>
        </div>
    <?php } ?>
    <?php if ($bCanBuy) { ?>
        <div class="counter-wrapper">
            <div class="counter-block">
                <?php if (!$bOffersExist) { ?>
                    <div class="item-quantity" data-settings="<?= Html::encode($arCounterSettings) ?>">
                        <?= Html::tag('a', '-', [
                            'class' => 'quantity-button intec-cl-text-hover',
                            'href' => 'javascript:void(0)',
                            'data-type' => 'button',
                            'data-action' => 'decrement'
                        ]) ?>
                        <?= Html::input('text', null, $sMeasureRatio, [
                            'data-type' => 'input',
                            'class' => 'quantity-input'
                        ]) ?>
                        <?= Html::tag('a', '+', [
                            'class' => 'quantity-button intec-cl-text-hover',
                            'href' => 'javascript:void(0)',
                            'data-type' => 'button',
                            'data-action' => 'increment'
                        ]) ?>
                    </div>
                <?php } ?>
                <div class="buttons-block">
                    <?php if (!$bOffersExist) { ?>
                        <?= Html::beginTag('a', [
                            'class' => 'element-buys add',
                            'data-basket-add' => $arElement['ID'],
                            'data-basket-in' => 'false',
                            'data-basket-quantity' => $sMeasureRatio
                        ]) ?>
                            <div class="intec-aligner"></div>
                            <span class="intec-basket glyph-icon-cart"></span>
                        <?= Html::endTag('a') ?>
                        <?= Html::beginTag('a', [
                            'class' => 'element-buys added intec-cl-background',
                            'href' => $sBasketUrl,
                            'data-basket-added' => $arElement['ID'],
                            'data-basket-in' => 'false'
                        ]) ?>
                            <div class="intec-aligner"></div>
                            <span class="intec-basket glyph-icon-cart"></span>
                        <?= Html::endTag('a') ?>
                    <?php } else { ?>
                        <a class="more-info" href="<?= $sDetailPage ?>">
                            <span class="element-buys intec-cl-text">
                                <span class="intec-basket glyph-icon-cart"></span>
                            </span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>