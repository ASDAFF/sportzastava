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
    <div id="<?= $arResult['COMPONENT_HASH'] ?>" class="widget-flying-basket <?= $arParams['IS_OPENED'] ? 'show' : '' ?>">
        <div class="flying-basket_buttons_wrap">
            <?php if ($arResult['SHOW_BLOCK']['BASKET']) { ?>
                <span class="flying-basket_button intec-cl-background-dark <?= $arParams['ACTIVE_TAB'] === 'flying-basket_content_basket' ? 'active' : '' ?>"
                      title="<?= GetMessage('WBF_BASKET') ?>"
                      data-target="flying-basket_content_basket">
                    <?php if ($arResult['BASKET_COUNT'] > 0) { ?>
                        <span class="flying-basket_button_count"><?= $arResult['BASKET_COUNT'] ?></span>
                    <?php } ?>
                    <span class="flying-basket_button-wrap">
                        <i class="icon-basket glyph-icon-cart"></i>
                    </span>
                </span>
            <?php } ?>
            <?php if ($arResult['SHOW_BLOCK']['DELAYED']) { ?>
                <span class="flying-basket_button intec-cl-background-dark <?= $arParams['ACTIVE_TAB'] === 'flying-basket_content_delayed' ? 'active' : '' ?>"
                      title="<?= GetMessage('WBF_DELAYED') ?>"
                      data-target="flying-basket_content_delayed">
                    <?php if ($arResult['DELAYED_COUNT'] > 0) { ?>
                        <span class="flying-basket_button_count"><?= $arResult['DELAYED_COUNT'] ?></span>
                    <?php } ?>
                    <span class="flying-basket_button-wrap">
                        <i class="icon-heart glyph-icon-heart"></i>
                    </span>
                </span>
            <?php } ?>
            <?php if ($arResult['SHOW_BLOCK']['FORM']) { ?>
                <span class="flying-basket_button intec-cl-background-dark <?= $arParams['ACTIVE_TAB'] === 'flying-basket_content_form' ? 'active' : '' ?>"
                    <?= $arResult['WEB_FORM'] ? 'title="'. $arResult['WEB_FORM']['NAME'] .'"' : '' ?>
                      data-target="flying-basket_content_form">
                    <span class="flying-basket_button-wrap">
                        <i class="icon-phone glyph-icon-phone"></i>
                    </span>
                </span>
            <?php } ?>
            <?php if ($arResult['SHOW_BLOCK']['AUTH']) { ?>
                <a href="<?= $arParams['URL_CABINET'] ?>"
                   class="flying-basket_button intec-cl-background-dark "
                   title="<?= GetMessage('WBF_CABINET') ?>">
                    <span class="flying-basket_button-wrap">
                        <i class="icon-login glyph-icon-lock"></i>
                    </span>
                </a>
            <?php } ?>
            <?php if ($arResult['SHOW_BLOCK']['COMPARE']) { ?>
                <a href="<?= $arParams['URL_COMPARE'] ?>"
                   class="flying-basket_button intec-cl-background-dark "
                   title="<?= GetMessage('WBF_COMPARE') ?>">
                    <?php if ($arResult['COMPARE_ITEMS_COUNT'] > 0) { ?>
                        <span class="flying-basket_button_count"><?= $arResult['COMPARE_ITEMS_COUNT'] ?></span>
                    <?php } ?>
                    <span class="flying-basket_button-wrap">
                        <i class="icon-compare glyph-icon-compare"></i>
                    </span>
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
                <?php if ($arResult['SHOW_BLOCK']['FORM']) { ?>
                    <span class="flying-basket_button jsShowForm intec-cl-background-dark"
                          <?= $arResult['WEB_FORM'] ? 'title="'. $arResult['WEB_FORM']['NAME'] .'"' : '' ?>>
                        <span class="flying-basket_button-wrap">
                            <i class="icon-phone glyph-icon-phone"></i>
                        </span>
                    </span>
                <?php } ?>
                <?php if ($arResult['SHOW_BLOCK']['AUTH']) { ?>
                    <a href="<?= $arParams['URL_CABINET'] ?>"
                       class="flying-basket_button intec-cl-background-dark "
                       title="<?= GetMessage('WBF_CABINET') ?>">
                        <span class="flying-basket_button-wrap">
                            <i class="icon-login glyph-icon-lock"></i>
                        </span>
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="flying-basket_content_wrap <?= $arParams['IS_OPENED'] ? 'show' : '' ?>"
             style="<?= $arParams['IS_OPENED'] ? $arParams['ACTIVE_TAB'] === 'flying-basket_content_form' ? 'width: 400px;' : 'width: 700px;' : '' ?>">
            <?php if ($arResult['SHOW_BLOCK']['BASKET']) { ?>
                <div class="flying-basket_content flying-basket_content_basket <?= $arParams['ACTIVE_TAB'] === 'flying-basket_content_basket' ? 'show' : '' ?>">
                    <?php if ($arResult['BASKET_COUNT'] > 0) { ?>
                        <div class="flying-basket_content_header">
                            <span class="flying-basket_clear intec-button intec-button-cl-default intec-button-md intec-button-transparent intec-button-w-icon">
                                <i class="glyph-icon-cancel"></i>
                                <span class="intec-button-text"><?= GetMessage('WBF_CLEAR') ?></span>
                            </span>
                            <div class="flying-basket_content_title"><?= GetMessage('WBF_BASKET') ?></div>
                        </div>

                        <div class="flying-basket_table_products_wrapper">
                            <?php
                            $products = $arResult['BASKET_ITEMS'];
                            include('parts/products.php');
                            ?>
                        </div>
                        <div class="flying-basket_sum_wrapper">
                            <span class="flying-basket_sum_title"><?= GetMessage('WBF_TOTAL_PRICE') ?>:</span>
                            <span class="flying-basket_sum_value">
                                <?= $arResult['DISCOUNT_BASKET_SUM']['PRINT_VALUE'] ?>
                            </span>
                        </div>
                        <div class="row flying-basket_bottom_buttons">
                            <div class="col-xs-4">
                                <span class="flying-basket_close intec-button intec-button-cl-common intec-button-md">
                                    <?= GetMessage('WBF_CONTINUE_SHOPPING') ?>
                                </span>
                            </div>
                            <div class="col-xs-8" style="text-align: right;">
                                <?php if ($arParams['URL_BASKET']) { ?>
                                    <a href="<?= $arParams['URL_BASKET'] ?>"
                                       class="intec-button intec-button-cl-common intec-button-md intec-button-transparent">
                                        <?= GetMessage('WBF_TO_BASKET') ?>
                                    </a>
                                <?php } ?>
                                <?php if ($arParams['URL_ORDER']) { ?>
                                    <a href="<?= $arParams['URL_ORDER'] ?>"
                                       class="intec-button intec-button-cl-common intec-button-md">
                                        <?= GetMessage('WBF_CREATE_ORDER') ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="flying-basket_content_header flying-basket_content_empty">
                            <div class="flying-basket_content_title"><?= GetMessage('WBF_BASKET') ?></div>
                        </div>
                        <div class="flying-basket_content_empty_wrapper intec-no-select">
                            <img src="<?= $templateFolder ?>/images/empty_basket.png" alt="empty basket" />
                            <div class="flying-basket-content_empty_title"><?= GetMessage('WBF_BASKET_EMPTY_TITLE') ?></div>
                            <div class="flying-basket-content_empty_description"><?= GetMessage('WBF_BASKET_EMPTY_DESCRIPTION') ?></div>
                            <!--<span class="flying-basket_close intec-button intec-button-cl-default intec-button-transparent intec-button-md">
                                <?= GetMessage('WBF_CLOSE') ?>
                            </span>-->
                            <?php if (!empty($arParams['URL_CATALOG'])) { ?>
                                <a href="<?= $arParams['URL_CATALOG'] ?>"
                                   class="intec-button intec-button-cl-common intec-button-lg">
                                    <?= GetMessage('WBF_TO_CATALOG') ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php }
            if ($arResult['SHOW_BLOCK']['DELAYED']) { ?>
                <div class="flying-basket_content flying-basket_content_delayed <?= $arParams['ACTIVE_TAB'] === 'flying-basket_content_delayed' ? 'show' : '' ?>">
                    <?php if ($arResult['DELAYED_COUNT'] > 0) { ?>
                        <div class="flying-basket_content_header">
                            <span class="flying-basket_clear_delay intec-button intec-button-cl-default intec-button-md intec-button-transparent">
                                <i class="glyph-icon-cancel"></i>
                                <?= GetMessage('WBF_CLEAR') ?>
                            </span>
                            <div class="flying-basket_content_title"><?= GetMessage('WBF_DELAYED') ?></div>
                        </div>
                        <div class="flying-basket_table_products_wrapper">
                            <?php
                            $products = $arResult['DELAYED_ITEMS'];
                            include('parts/products.php');
                            ?>
                        </div>
                        <div class="row flying-basket_bottom_buttons">
                            <div class="col-xs-6">
                                <span class="flying-basket_close intec-button intec-button-cl-common intec-button-md">
                                    <?= GetMessage('WBF_CONTINUE_SHOPPING') ?>
                                </span>
                            </div>
                            <div class="col-xs-6" style="text-align: right;">
                                <?php if ($arParams['URL_BASKET']) { ?>
                                    <a href="<?= $arParams['URL_BASKET'] ?>"
                                       class="intec-button intec-button-cl-common intec-button-md intec-button-transparent">
                                        <?= GetMessage('WBF_TO_BASKET') ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="flying-basket_content_header flying-basket_content_empty">
                            <div class="flying-basket_content_title"><?= GetMessage('WBF_DELAYED') ?></div>
                        </div>
                        <div class="flying-basket_content_empty_wrapper intec-no-select">
                            <img src="<?= $templateFolder ?>/images/empty_delayed.png" alt="empty delayed" />
                            <div class="flying-basket-content_empty_title"><?= GetMessage('WBF_DELAYED_EMPTY_TITLE') ?></div>
                            <div class="flying-basket-content_empty_description"><?= GetMessage('WBF_DELAYED_EMPTY_DESCRIPTION') ?></div>
                            <?php if (!empty($arParams['URL_CATALOG'])) { ?>
                                <a href="<?= $arParams['URL_CATALOG'] ?>"
                                   class="intec-button intec-button-cl-common intec-button-lg">
                                    <?= GetMessage('WBF_TO_CATALOG') ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php }
            if ($arResult['SHOW_BLOCK']['FORM']) { ?>
                <div class="flying-basket_content flying-basket_content_form <?= $arParams['ACTIVE_TAB'] === 'flying-basket_content_form' ? 'show' : '' ?>">
                    <?php if (!empty($arResult['WEB_FORM'])) { ?>
                        <div class="flying-basket_content_header">
                            <div class="flying-basket_content_title"><?= $arResult['WEB_FORM']['NAME'] ?></div>
                        </div>
                        <div class="flying-basket_form_container"></div>
                    <?php } else { ?>
                        <div class="flying-basket_content_empty_wrapper"><?= GetMessage('WBF_FORM_EMPTY') ?></div>
                    <?php } ?>
                </div>
            <?php } ?>
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
