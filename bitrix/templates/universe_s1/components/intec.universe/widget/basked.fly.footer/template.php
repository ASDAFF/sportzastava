<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;
use intec\constructor\models\Build;

/**
 * @var $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

$bModuleCatalog = Loader::includeModule('catalog');
$bModuleSale = Loader::includeModule('sale');
$bModuleShop = Loader::includeModule('intec.startshop');

if (!defined('EDITOR')) {
    if (empty($arResult['CURRENCY']))
        return;

    if (!ArrayHelper::isIn(true, ArrayHelper::getKeys($arResult['SHOW_BLOCK'])))
        return;

    if (!(($bModuleCatalog && $bModuleSale) || $bModuleShop))
        return;
}

$this->setFrameMode(true);
$templateFolder = $this->GetFolder();

?>
<?php if (!defined('EDITOR')) { ?>
    <div id="<?= $arResult['COMPONENT_HASH'] ?>" class="widget-flying-basket-footer">

        <div class="flying-basket-footer-wrapper">

            <?php if ($arResult['SHOW_BLOCK']['BASKET']) { ?>
                <a href="<?= $arParams['URL_BASKET'] ?>" class="" title="<?= GetMessage('WBF_BASKET') ?>">
                    <i class="icon-basket glyph-icon-cart"></i>
                    <?= GetMessage('WBF_BASKET') ?>
                    <?php if ($arResult['BASKET_COUNT'] > 0) { ?>
                        (<?= $arResult['BASKET_COUNT'] ?>)
                    <?php } ?>
                </a>
            <?php } ?>

            <?php if ($arResult['SHOW_BLOCK']['DELAYED']) { ?>
                <a href="<?= $arResult['URL_DELAYED'] ?>" class="" title="<?= GetMessage('WBF_DELAYED') ?>">
                    <i class="icon-heart glyph-icon-heart"></i>
                    <?= GetMessage('WBF_DELAYED') ?>
                    <?php if ($arResult['DELAYED_COUNT'] > 0) { ?>
                        (<?= $arResult['DELAYED_COUNT'] ?>)
                    <?php } ?>
                </a>
            <?php } ?>

            <?php if ($arResult['SHOW_BLOCK']['COMPARE']) { ?>
                <a href="<?= $arParams['URL_COMPARE'] ?>" class="" title="<?= GetMessage('WBF_COMPARE') ?>">
                    <i class="icon-compare glyph-icon-compare"></i>
                    <?= GetMessage('WBF_COMPARE') ?>
                    <?php if ($arResult['COMPARE_ITEMS_COUNT'] > 0) { ?>
                        (<?= $arResult['COMPARE_ITEMS_COUNT'] ?>)
                    <?php } ?>
                </a>
            <?php } ?>

            <?php if ($arResult['SHOW_BLOCK']['LOOKED']) { ?>
                <a href="<?= $arParams['URL_LOOKED'] ?>" class="" title="<?= GetMessage('WBF_LOOKED') ?>">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <?= GetMessage('WBF_LOOKED') ?>
                    <?php if ($arResult['LOOKED_ITEMS_COUNT'] > 0) { ?>
                        (<?= $arResult['LOOKED_ITEMS_COUNT'] ?>)
                    <?php } ?>
                </a>
            <?php } ?>

        </div>


        <div class="flying-basket-mobile-buttons-wrap intec-content-responsive intec-content-responsive-mobile">
            <div class="flying-basket-mobile-buttons-wrap-2">
                <?php if ($arResult['SHOW_BLOCK']['BASKET']) { ?>
                    <a href="<?= $arParams['URL_BASKET'] ?>"
                       class="flying-basket_button intec-cl-background-dark "
                       title="<?= GetMessage('WBF_BASKET') ?>">
                        <span class="flying-basket_button-wrap">
                            <i class="icon-basket glyph-icon-cart"></i>
                        </span>
                        <?php if ($arResult['BASKET_COUNT'] > 0) { ?>
                            <span class="flying-basket_button_count"><?= $arResult['BASKET_COUNT'] ?></span>
                        <?php } ?>
                    </a>
                <?php } ?>
                <?php if ($arResult['SHOW_BLOCK']['DELAYED']) { ?>
                    <a href="<?= $arResult['URL_DELAYED'] ?>"
                       class="flying-basket_button intec-cl-background-dark "
                       title="<?= GetMessage('WBF_DELAYED') ?>">
                        <span class="flying-basket_button-wrap">
                            <i class="icon-heart glyph-icon-heart"></i>
                        </span>
                        <?php if ($arResult['DELAYED_COUNT'] > 0) { ?>
                            <span class="flying-basket_button_count"><?= $arResult['DELAYED_COUNT'] ?></span>
                        <?php } ?>
                    </a>
                <?php } ?>
                <?php if ($arResult['SHOW_BLOCK']['COMPARE']) { ?>
                    <a href="<?= $arParams['URL_COMPARE'] ?>"
                       class="flying-basket_button intec-cl-background-dark "
                       title="<?= GetMessage('WBF_COMPARE') ?>">
                        <span class="flying-basket_button-wrap">
                            <i class="icon-compare glyph-icon-compare"></i>
                        </span>
                        <?php if ($arResult['COMPARE_ITEMS_COUNT'] > 0) { ?>
                            <span class="flying-basket_button_count"><?= $arResult['COMPARE_ITEMS_COUNT'] ?></span>
                        <?php } ?>
                    </a>
                <?php } ?>

                <?php if ($arResult['SHOW_BLOCK']['LOOKED']) { ?>
                    <a href="<?= $arParams['URL_LOOKED'] ?>"
                       class="flying-basket_button intec-cl-background-dark "
                       title="<?= GetMessage('WBF_LOOKED') ?>">
                        <span class="flying-basket_button-wrap">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                        <?php if ($arResult['LOOKED_ITEMS_COUNT'] > 0) { ?>
                            <span class="flying-basket_button_count"><?= $arResult['LOOKED_ITEMS_COUNT'] ?></span>
                        <?php } ?>
                    </a>
                <?php } ?>

            </div>
        </div>


    </div>

    <?php include('parts/script.php'); ?>

<?php } else { ?>
    <div class="constructor-element-stub">
        <div class="constructor-element-stub-wrapper">
            <?= GetMessage('WBF_TITLE') ?>
        </div>
    </div>
<?php } ?>
