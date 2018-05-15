<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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
 * @var string $sTemplateId
 * @var integer $count_elements
 */

?>
<div class="widget-catalog-categories-view widget-catalog-categories-view-deployed">
    <ul class="nav nav-tabs widget-catalog-categories-tabs">
        <?php $bSectionFirst = true ?>
        <?php foreach ($arResult['SECTIONS'] as $arSection) { ?>
            <li class="widget-catalog-categories-tab<?= $bSectionFirst ? ' active' : null ?>" role="presentation">
                <a href="#<?= $sTemplateId ?>-mobile-deployed-section-<?= $arSection['CODE'] ?>"
                    aria-controls="<?= $sTemplateId ?>-mobile-deployed-section-<?= $arSection['CODE'] ?>"
                    role="tab"
                    data-toggle="tab"
                ><?= $arSection['NAME'] ?></a>
            </li>
            <?php $bSectionFirst = false ?>
        <?php } ?>
    </ul>
    <div class="widget-catalog-categories-tabs-content tab-content clearfix">
        <?php $bSectionFirst = true ?>
        <?php foreach ($arResult['SECTIONS'] as $arSection) { ?>
        <div role="tabpanel"
            id="<?= $sTemplateId ?>-mobile-deployed-section-<?= $arSection['CODE'] ?>"
            class="widget-catalog-categories-tab-content tab-pane <?= $bSectionFirst ? 'active' : null ?>"
        >
            <?php $iIndex = 0; ?>
            <?php foreach ($arSection['ITEMS'] as $arItem) {
                if ($iIndex++ >= 4)
                    break;

                $sId = $sTemplateId.'_mobile_default_'.$arItem['ID'];
                $sAreaId = $this->GetEditAreaId($sId);
                $this->AddEditAction($sId, $arItem['EDIT_LINK']);
                $this->AddDeleteAction($sId, $arItem['DELETE_LINK']);

                $sImage = ArrayHelper::getValue($arItem, 'PREVIEW_PICTURE_300_300');
                $arIBlockSection = ArrayHelper::getValue($arItem, 'IBLOCK_SECTION');
                $arPrice = ArrayHelper::getValue($arItem, 'PRICE');
                $bAvailable = ArrayHelper::getValue($arItem, 'CAN_BUY', false);
                $bHaveOffers = ArrayHelper::getValue($arItem, 'HAS_OFFERS', false);
                $bInBasket = ArrayHelper::getValue($arItem, ['BASKET', 'IN'], false);
                $sInBasket = $bInBasket ? 'true' : 'false';

                if (!empty($sImage)) {
                    $sImage = $sImage['src'];
                } else {
                    $sImage = null;
                }
            ?>
                <div class="widget-catalog-categories-product">
                    <div class="widget-catalog-categories-product-wrapper" id="<?= $sAreaId ?>">
                        <div class="widget-catalog-categories-product-substrate"></div>
                        <div class="widget-catalog-categories-product-image">
                            <a class="widget-catalog-categories-product-image-wrapper"
                                href="<?= $arItem['DETAIL_PAGE_URL'] ?>"
                                style="background-image: url('<?= $sImage ?>')"
                            ></a>
                            <?php if ($bAvailable) { ?>
                                <?php if ($arParams['USE_BASKET'] == 'Y') {?>
                                    <?php if (!$bHaveOffers) { ?>
                                        <a data-basket-add="<?= $arItem['ID'] ?>"
                                            data-basket-in="<?= $sInBasket ?>"
                                            class="intec-button intec-button-cl-common widget-catalog-categories-product-button"
                                        ><?= GetMessage('W_C_CATALOG_CATEGORIES_C_S_DEFAULT_TO_BASKET') ?></a>
                                        <a data-basket-added="<?= $arItem['ID'] ?>"
                                            data-basket-in="<?= $sInBasket ?>"
                                            class="intec-button intec-button-cl-common widget-catalog-categories-product-button"
                                            href="<?= $arResult['BASKET_URL'] ?>"
                                        ><?= GetMessage('W_C_CATALOG_CATEGORIES_C_S_DEFAULT_IN_BASKET') ?></a>
                                    <?php } else { ?>
                                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"
                                            class="intec-button intec-button-cl-common widget-catalog-categories-product-button"
                                        ><?= GetMessage('W_C_CATALOG_CATEGORIES_C_S_DEFAULT_LEARN_MORE') ?></a>
                                    <?php } ?>
                                <?php } else{?>
                                    <?php if (!empty($arItem['FORM_ORDER'])) {?>
                                        <a onclick="universe.forms.show(<?= JavaScript::toObject($arItem['FORM_ORDER']) ?>)"
                                            class="intec-button intec-button-cl-common widget-catalog-categories-product-button"
                                        ><?= GetMessage('TEXT_BUTTON_ORDER_PRODUCT') ?></a>
                                    <?php }?>
                                <?php }?>
                            <?php } ?>
                        </div>
                        <div class="widget-catalog-categories-product-name">
                            <a class="widget-catalog-categories-product-name-wrapper" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                <?= $arItem['NAME'] ?>
                            </a>
                        </div>
                        <div class="widget-catalog-categories-product-section">
                            <?php if (!empty($arIBlockSection)) { ?>
                                <a class="widget-catalog-categories-product-section-wrapper" href="<?= $arIBlockSection['SECTION_PAGE_URL'] ?>">
                                    <?= $arIBlockSection['NAME'] ?>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="widget-catalog-categories-product-price">
                            <?php if (!empty($arPrice)) { ?>
                                <?php if ($arPrice['DISCOUNT_DIFF'] > 0) { ?>
                                    <span class="widget-catalog-categories-product-price-new">
                                        <?= $arPrice['PRINT_DISCOUNT_VALUE'] ?>
                                    </span>
                                    <span class="widget-catalog-categories-product-price-old">
                                        <?= $arPrice['PRINT_VALUE'] ?>
                                    </span>
                                <?php } else { ?>
                                    <span class="widget-catalog-categories-product-price-new">
                                        <?= $arPrice['PRINT_VALUE'] ?>
                                    </span>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php $bSectionFirst = false ?>
        <?php } ?>
    </div>
</div>