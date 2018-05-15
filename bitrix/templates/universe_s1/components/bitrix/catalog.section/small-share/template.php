<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\JavaScript;

/**
 * @var array $arResult
 */

$this->setFrameMode(true);

$sBasketUrl = ArrayHelper::getValue($arResult, 'BASKET_URL');

if (!empty($arResult['ITEMS'])) { ?>
    <div class="share-products-block clearfix">
        <?php foreach ($arResult['ITEMS'] as $arItem) {

            $sDetailPage = ArrayHelper::getValue($arItem, 'DETAIL_PAGE_URL');
            $sPreviewPicture = ArrayHelper::getValue($arItem, ['PREVIEW_PICTURE', 'SRC']);
            $sName = ArrayHelper::getValue($arItem, 'NAME');
            $sSectionUrl = ArrayHelper::getValue($arItem, ['SECTION_DATA', 'SECTION_URL']);
            $sSectionName = ArrayHelper::getValue($arItem, ['SECTION_DATA', 'NAME']);
            $sPrice = ArrayHelper::getValue($arItem, ['MIN_PRICE', 'PRINT_DISCOUNT_VALUE']);
            $sOldPrice = ArrayHelper::getValue($arItem, ['MIN_PRICE', 'PRINT_VALUE']);
            $sPriceNumeric = ArrayHelper::getValue($arItem, ['MIN_PRICE', 'DISCOUNT_VALUE']);
            $sOldPriceNumeric = ArrayHelper::getValue($arItem, ['MIN_PRICE', 'VALUE']);

            $bDiscount = $sOldPriceNumeric > $sPriceNumeric;
            $bCanBuy = ArrayHelper::getValue($arItem, ['MIN_PRICE', 'CAN_BUY']);
            $bOffers = !empty($arItem['OFFERS']);

            $arButtonAdd = [];
            $arButtonAdded = [];
            $arButtonOffers = [];

            if ($bCanBuy && !$bOffers) {
                $arButtonAdd = [
                    'class' => 'element-buy add intec-cl-text intec-cl-text-light-hover',
                    'data-basket-add' => $arItem['ID'],
                    'data-basket-in' => 'false'
                ];

                $arButtonAdded = [
                    'class' => 'element-buy added intec-cl-background intec-cl-background-light-hover',
                    'href' => $sBasketUrl,
                    'data-basket-add' => $arItem['ID'],
                    'data-basket-in' => 'false'
                ];
            } else if ($bCanBuy && $bOffers) {
                /** Кнопка для товаров с предложениями */
                $arButtonOffers = [
                    'class' => 'element-buy add intec-cl-text intec-cl-text-light-hover',
                    'href' => $sDetailPage
                ];
            }

        ?>
            <div class="products-element">
                <div class="element-wrapper">
                    <div class="element-img">
                        <a href="<?= $sDetailPage ?>">
                            <img src="<?= $sPreviewPicture ?>">
                            <div class="intec-aligner"></div>
                        </a>
                    </div>
                    <div class="element-text">
                        <span class="text-name">
                            <a class="intec-cl-text-hover" href="<?= $sDetailPage ?>">
                                <?= $sName ?>
                            </a>
                        </span>
                        <span class="text-section">
                            <a class="intec-cl-text-hover" href="<?= $sSectionUrl ?>">
                                <?= $sSectionName ?>
                            </a>
                        </span>
                    </div>
                    <div class="price-block">
                        <div class="price">
                            <span class="new-price">
                                <?= $sPrice ?>
                            </span>
                            <?php if ($bDiscount) { ?>
                                <span class="old-price">
                                    <?= $sOldPrice ?>
                                </span>
                            <?php } ?>
                            <?php if ($bCanBuy) { ?>
                                <?php if ($arParams['USE_BASKET'] == 'Y') {?>
                                    <?php if ($bOffers) { ?>
                                        <?= Html::beginTag('a', $arButtonOffers) ?>
                                            <span class="glyph-icon-cart"></span>
                                        <?= Html::endTag('a') ?>
                                    <?php } else { ?>
                                        <?= Html::beginTag('a', $arButtonAdd) ?>
                                            <span class="glyph-icon-cart"></span>
                                        <?= Html::endTag('a') ?>
                                        <?= Html::beginTag('a', $arButtonAdded) ?>
                                            <span class="glyph-icon-cart"></span>
                                        <?= Html::endTag('a') ?>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php if (!empty($arItem['FORM_ORDER'])) {?>
                                        <a
                                                class="element-buy add intec-cl-text intec-cl-text-light-hover"
                                                onclick="universe.forms.show(<?= JavaScript::toObject($arItem['FORM_ORDER']) ?>)"
                                        >
                                            <span class="glyph-icon-cart"></span>
                                        </a>
                                    <?}?>
                                <?php }?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>