<?php

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Json;
use intec\core\helpers\Html;

/**
 * @var $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var array $products
 * @var bool $bModuleCatalog
 * @var bool $bModuleSale
 * @var bool $bModuleShop
 */

?>
<table class="flying-basket_table_products" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="column-image"></th>
            <th class="column-name"><?= GetMessage('WBF_COLUMN_NAME') ?></th>
            <th class="column-price"><?= GetMessage('WBF_COLUMN_PRICE') ?></th>
            <th class="column-quantity"><?= GetMessage('WBF_COLUMN_QUANTITY') ?></th>
            <th class="column-sum"><?= GetMessage('WBF_COLUMN_SUM') ?></th>
            <th class="column-control"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $id => $product) { ?>
        <tr data-product-id="<?= $id ?>">
            <td class="column-image">
                <?php if (!empty($product['PICTURE'])) { ?>
                    <a href="<?= $product['URL'] ?>">
                        <span class="product-image" style="background-image: url(<?= $product['PICTURE']['SRC'] ?>);"></span>
                    </a>
                <?php } ?>
            </td>
            <td class="column-name">
                <a class="intec-cl-text" href="<?= $product['URL'] ?>">
                    <?= Html::encode($product['NAME']) ?>
                </a>
            </td>
            <td class="column-price">
                <?= $product['PRICE']['PRINT_DISCOUNT_VALUE'] ?>
            </td>
            <td class="column-quantity">
                <?php if ($product['DELAY']) {
                    echo $product['QUANTITY']['VALUE'];
                } else { ?>
                    <div class="quantity-wrapper intec-no-select"
                         data-settings="<?= Html::encode(Json::encode([
                             'bounds' => array(
                                 'minimum' => $product['MEASURE']['RATIO'],
                                 'maximum' => $product['QUANTITY']['USE'] ? $product['QUANTITY']['TOTAL'] : false
                             ),
                             'step' => $product['MEASURE']['RATIO'],
                             'value' => $product['QUANTITY']['VALUE']
                         ])) ?>">
                        <span class="quantity-down">-</span>
                        <input type="text"
                            class="intec-input quantity-value"
                            value="<?= $product['QUANTITY']['VALUE'] ?>" />
                        <span class="quantity-up">+</span>
                    </div>
                <?php } ?>
            </td>
            <td class="column-sum">
                <?php if ($bModuleCatalog) { ?>
                    <?= CCurrencyLang::CurrencyFormat($product['PRICE']['DISCOUNT_VALUE'] * $product['QUANTITY']['VALUE'], $product['PRICE']['CURRENCY'], true) ?>
                <?php } else { ?>
                    <?= CStartShopCurrency::FormatAsString($product['PRICE']['DISCOUNT_VALUE'] * $product['QUANTITY']['VALUE'], $product['PRICE']['CURRENCY']) ?>
                <?php } ?>
            </td>
            <td class="column-control">
                <?php if ($bModuleCatalog) { ?>
                    <?php if ($product['DELAY']) { ?>
                        <span class="add-item glyph-icon-cart intec-cl-text-hover" title="<?= GetMessage('WBF_BUTTON_TO_BASKET') ?>"></span>
                    <?php } else { ?>
                        <span class="delay-item fa fa-heart intec-cl-text-hover" title="<?= GetMessage('WBF_BUTTON_DELAY') ?>"></span>
                    <?php } ?>
                <?php } ?>
                <span class="delete-item glyph-icon-cancel" title="<?= GetMessage('WBF_BUTTON_DELETE') ?>"></span>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
