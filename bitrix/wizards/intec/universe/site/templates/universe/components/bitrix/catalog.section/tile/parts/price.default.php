<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\Html;
use intec\core\helpers\JavaScript;

/**
 * @var array $arParams
 * @var array $arElement
 * @var string $sDetailPage
 * @var string $sName
 * @var string $sPrice
 * @var string $sOldPrice
 * @var boolean $bCanBuy
 * @var boolean $bOffersExist
 * @var boolean $bDiscount
 * @var string $sBasketUrl
 */

?>
<div class="element-description">
    <a href="<?= $sDetailPage ?>" class="element-name intec-cl-text-hover">
        <?= $sName ?>
    </a>
    <div class="price-block">
        <div class="price-value">
            <div class="newprice">
                <span>
                    <?= $sPrice ?>
                </span>
            </div>
            <?php if ($bDiscount) { ?>
                <div class="oldprice">
                    <?= $sOldPrice ?>
                </div>
            <?php } ?>
        </div>
        <?php if ($arParams['USE_BASKET'] == 'Y') {?>
            <?php if ($bCanBuy && !$bOffersExist) { ?>
                <a class="element-buys add"
                   data-basket-add="<?= $arElement['ID'] ?>"
                   data-basket-in="false">
                    <div class="intec-aligner"></div>
                    <span class="intec-basket glyph-icon-cart"></span>
                </a>
                <a class="element-buys added intec-cl-background"
                   href="<?= $sBasketUrl ?>"
                   data-basket-added="<?= $arElement['ID'] ?>"
                   data-basket-in="false">
                    <div class="intec-aligner"></div>
                    <span class="intec-basket glyph-icon-cart"></span>
                </a>
            <?php } else if ($bOffersExist && $bCanBuy) { ?>
                <a href="<?= $sDetailPage ?>" class="element-buys">
                    <div class="intec-aligner"></div>
                    <span class="intec-basket glyph-icon-cart"></span>
                </a>
            <?php } ?>
        <?php } else {?>
            <?php if (!empty($arElement['FORM_ORDER'])) {?>
                <a onclick="universe.forms.show(<?= JavaScript::toObject($arElement['FORM_ORDER']) ?>)" class="element-buys">
                    <div class="intec-aligner"></div>
                    <span class="intec-basket glyph-icon-cart"></span>
                </a>
            <?php }?>
        <?php }?>
        <div class="clearfix"></div>
    </div>
</div>
