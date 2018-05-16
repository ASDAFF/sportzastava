<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\Json;
use Bitrix\Main\Localization\Loc;
use intec\core\helpers\JavaScript;

/**
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $templateFile
 * @var string $componentPath
 * @var CMain $APPLICATION
 * @var CBitrixComponent $component
 */

if (!empty($arResult['NAV_RESULT'])) {
    $navParams =  array(
        'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
        'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
        'NavNum' => $arResult['NAV_RESULT']->NavNum
    );
} else {
    $navParams = array(
        'NavPageCount' => 1,
        'NavPageNomer' => 1,
        'NavNum' => $this->randString()
    );
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;
$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];
$compareList = $arParams['COMPARE_NAME'];

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
    $showTopPager = $arParams['DISPLAY_TOP_PAGER'];
    $showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
    $showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$this->setFrameMode(true);

switch ($arParams['LINE_ELEMENT_COUNT']) {
    case '2':
        $gridStyle = "col-lg-6 col-md-6 col-sm-6 col-xs-12";
        break;
    case '3':
        $gridStyle = "col-lg-4 col-md-4 col-sm-4 col-xs-12";
        break;
    default :
        $gridStyle = "col-lg-4 col-md-4 col-sm-4 col-xs-12";
        break;
}

$sPriceFrom = Loc::getMessage('PRICE_FROM');
$sNotAvailable = Loc::getMessage('PRODUCT_NOT_HAVE');
$sRecommendation = Loc::getMessage('MARK_RECOMMEND');
$sNew = Loc::getMessage('MARK_NEW');
$sPopular = Loc::getMessage('MARK_HIT');
$sAddToCart = Loc::getMessage('ADD_TO_CART');
$sAddedToCart = Loc::getMessage('ADDED_TO_CART');
$sMoreInfo = Loc::getMessage('MORE');

$sBasketUrl = ArrayHelper::getValue($arResult, ['VIEW_PARAMETERS', 'BASKET_URL']);
$sIBlockId = ArrayHelper::getValue($arParams, 'IBLOCK_ID');

$bDisplayCompare = ArrayHelper::getValue($arResult, ['VIEW_PARAMETERS', 'COMPARE_SHOW']);
$bDisplayDelay = ArrayHelper::getValue($arResult, ['VIEW_PARAMETERS', 'DELAY_SHOW']);
$bDisplayQuickView = ArrayHelper::getValue($arResult, ['VIEW_PARAMETERS', 'QUICK_VIEW_SHOW']);
$bDisplayCounter = ArrayHelper::getValue($arResult, ['VIEW_PARAMETERS', 'COUNTER_SHOW']);
$bUseDelimiter = ArrayHelper::getValue($arResult, ['VIEW_PARAMETERS', 'DELIMITER_ELEMENT_SHOW']);
$bUseDelimiter = $bUseDelimiter ? ' intec-catalog-section-tile-del' : null;

$arPriceItems = array();

if (!empty($arResult['ITEMS'])) {?>
    <div class="intec-catalog-section intec-catalog-section-tile<?=$bUseDelimiter ?>">
        <!-- items-container -->
        <div data-entity="<?=$containerName?>">
            <?php

            $strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
            $strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
            $arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

            foreach ($arResult['ITEMS'] as $cell => $arElement) {

                $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], $strElementEdit);
                $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);

                $arMarkers = ArrayHelper::getValue($arElement, ['VIEW_PARAMETERS', 'MARKERS']);
                $bPopular = ArrayHelper::getValue($arMarkers, 'POPULAR');
                $bNew = ArrayHelper::getValue($arMarkers, 'NEW');

                $sDetailPage = ArrayHelper::getValue($arElement, 'DETAIL_PAGE_URL');
                $sPictureSrc = ArrayHelper::getValue($arElement, ['PICTURE', 'src']);
                $sName = ArrayHelper::getValue($arElement, 'NAME');
                $sPrice = ArrayHelper::getValue($arElement, ['MIN_PRICE', 'PRINT_DISCOUNT_VALUE']);
                $sOldPrice = ArrayHelper::getValue($arElement, ['MIN_PRICE', 'PRINT_VALUE']);
                $sPriceNumeric = ArrayHelper::getValue($arElement, ['MIN_PRICE', 'DISCOUNT_VALUE']);
                $sOldPriceNumeric = ArrayHelper::getValue($arElement, ['MIN_PRICE', 'VALUE']);
                $sDiscountDifference = ArrayHelper::getValue($arElement, ['MIN_PRICE', 'DISCOUNT_DIFF_PERCENT']);
                $sMeasureRatio = ArrayHelper::getValue($arElement, 'CATALOG_MEASURE_RATIO');
                $sQuantity = ArrayHelper::getValue($arElement, 'CATALOG_QUANTITY');

                $bRecommendation = ArrayHelper::getValue($arMarkers, 'RECOMMENDATION');
                $bCanBuy = ArrayHelper::getValue($arElement, 'CAN_BUY');
                $bCanBuyZero = ArrayHelper::getValue($arElement, 'CAN_BUY_ZERO');
                $bDiscount = $sOldPriceNumeric > $sPriceNumeric;
                $bOffersExist = !empty(ArrayHelper::getValue($arElement, 'OFFERS'));

                $arPictureAttributes = [
                    'title' => ArrayHelper::getValue($arElement, ['PICTURE', 'imgTitle']),
                    'alt' => ArrayHelper::getValue($arElement, ['PICTURE', 'imgAlt'])
                ];

                /** Параметры счетчика */
                $arCounterSettings = Json::encode([
                    'bounds' => [
                        'maximum' => $bCanBuyZero ? false: $sQuantity,
                        'minimum' => $sMeasureRatio
                    ],
                    'step' => $sMeasureRatio,
                    'value' => $sMeasureRatio
                ]);

                /** Кнопки отложенных товаров */
                $arDelayAdd = [];
                $arDelayAdded = [];

                if ($bDisplayDelay) {
                    $arDelayAdd = [
                        'class' => 'intec-min-button intec-min-button-like add',
                        'data-basket-delay' => $arElement['ID'],
                        'data-basket-in' => 'false'
                    ];

                    $arDelayAdded = [
                        'class' => 'intec-min-button intec-min-button-like added',
                        'data-basket-delayed' => $arElement['ID'],
                        'data-basket-in' => 'false'
                    ];
                }

                /** Кнопки сравнения */
                $arCompareAdd = [];
                $arCompareAdded = [];

                if ($bDisplayCompare) {
                    $arCompareAdd = [
                        'class' => 'intec-min-button intec-min-button-compare add',
                        'data-compare-add' => $arElement['ID'],
                        'data-compare-in' => 'false',
                        'data-compare-list' => $compareList,
                        'data-compare-iblock' => $sIBlockId
                    ];

                    $arCompareAdded = [
                        'class' => 'intec-min-button intec-min-button-compare added',
                        'data-compare-added' => $arElement['ID'],
                        'data-compare-in' => 'false',
                        'data-compare-list' => $compareList,
                        'data-compare-iblock' => $sIBlockId
                    ];
                }

                if (count($arElement['ITEM_QUANTITY_RANGES']) > 1) {
                    $arPriceItems[$arElement['ID']] = $arElement['ITEM_PRICES'];
                }
            ?>
                <div id="<?= $this->GetEditAreaId($arElement['ID']) ?>" class="catalog-section-element <?= $gridStyle ?>" data-entity="items-row" data-product-id="<?=$arElement['ID']?>">
                    <div class="element-wrap">
                        <div class="element-img-wrap">
                            <?php $APPLICATION->IncludeComponent(
                                'intec.universe:widget',
                                'markers',
                                array(
                                    'MARKER_RECOMMENDATION' => $bRecommendation,
                                    'MARKER_NEW' => $bNew,
                                    'MARKER_HIT' => $bPopular,
                                    'MARKER_DISCOUNT' => $bDiscount,
                                    'MARKER_DISCOUNT_VALUE' => $sDiscountDifference
                                ),
                                $component,
                                array(
                                    'HIDE_ICONS' => 'Y'
                                )
                            ) ?>

                            <a href="<?= $sDetailPage ?>" class="element-img">
                                <div class="intec-aligner"></div>
                                <?= Html::img($sPictureSrc, $arPictureAttributes) ?>
                            </a>
                            <?php if ($bDisplayQuickView) {
                                include('parts/quick.view.php');
                            } ?>
                            <?php if ($bCanBuy && !$bOffersExist) { ?>
                                <div class="min-button-block">
                                    <?php if ($bDisplayCompare) { ?>
                                        <?= Html::beginTag('div', $arCompareAdd) ?>
                                            <i class="glyph-icon-compare" aria-hidden="true"></i>
                                        <?= Html::endTag('div') ?>
                                        <?= Html::beginTag('div', $arCompareAdded) ?>
                                            <i class="glyph-icon-compare" aria-hidden="true"></i>
                                        <?= Html::endTag('div') ?>
                                    <?php } ?>
                                    <?php if ($bDisplayDelay) { ?>
                                        <?php if ($arParams['USE_BASKET'] == 'Y') {?>
                                            <?= Html::beginTag('div', $arDelayAdd) ?>
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                            <?= Html::endTag('div') ?>
                                            <?= Html::beginTag('div', $arDelayAdded) ?>
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                            <?= Html::endTag('div') ?>
                                        <?php }?>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if ($bDisplayCounter && $arParams['USE_BASKET'] == 'Y') {
                            include('parts/price.with.counter.php');
                        } else {
                            include('parts/price.default.php');
                        } ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($bDisplayCounter) { ?>

                <script type="text/javascript">
                    (function ($, api) {

                        <?php if (!empty($arPriceItems)) {?>
                            var productItemsPrice = <?= JavaScript::toObject($arPriceItems) ?>;
                        <?php }?>

                        $(document).ready(function () {
                            $('.item-quantity').control('numeric', {}, function (settings, instance) {
                                var node = this;

                                if (instance === null) {
                                    api.extend(settings, this.data('settings'));
                                } else {
                                    instance.on('change', function (event, value) {
                                        node.closest('.counter-block')
                                            .find('[data-basket-add]')
                                            .data('basket-quantity', value);

                                        <?php if (!empty($arPriceItems)) {?>
                                            element = node.closest('.catalog-section-element');

                                            productID = element.data('product-id');
                                            if (api.isDeclared(productItemsPrice[productID])) {
                                                currentOffer = productItemsPrice[productID];
                                                if (currentOffer.length > 1) {
                                                    var newPrice;
                                                    var oldPrice;

                                                    intec.each(currentOffer, function(i, property){
                                                        if (property['QUANTITY_FROM'] == null
                                                            && property['QUANTITY_TO'] != null
                                                            && property['QUANTITY_TO'] >= value) {

                                                            newPrice = property['PRINT_PRICE'];
                                                            oldPrice = property['PRINT_BASE_PRICE'];

                                                        } else if (property['QUANTITY_TO'] == null
                                                            && property['QUANTITY_FROM'] != null
                                                            && property['QUANTITY_FROM'] <= value) {

                                                            newPrice = property['PRINT_PRICE'];
                                                            oldPrice = property['PRINT_BASE_PRICE'];

                                                        } else if (property['QUANTITY_FROM'] != null
                                                            && property['QUANTITY_TO'] != null
                                                            && property['QUANTITY_FROM'] <= value
                                                            && property['QUANTITY_TO'] >= value) {

                                                            newPrice = property['PRINT_PRICE'];
                                                            oldPrice = property['PRINT_BASE_PRICE'];

                                                        }
                                                    });

                                                    $('.element-price', element).html(newPrice);
                                                    $('.element-old-price', element).html(oldPrice);
                                                }
                                            }
                                        <?php }?>
                                    });
                                }
                            });
                        })
                    })(jQuery, intec);

                    $('.catalog-section-element').off('mouseover').on('mouseover', function () {
                        var self = $(this);
                        var extendBlock = self.find('.element-wrap');
                        var blockHeight = self.get(0).getBoundingClientRect().height;

                        self.css('height', blockHeight);
                        self.find('.counter-wrapper').css('height', '60px');
                        extendBlock.addClass('extended');
                    }).off('mouseout').on('mouseout', function () {
                        var self = $(this);
                        var extendBlock = self.find('.element-wrap');

                        self.css('height', '');
                        self.find('.counter-wrapper').css('height', '0');
                        extendBlock.removeClass('extended');
                    });
                </script>
            <?php } ?>
        </div>
        <!-- items-container -->
        <div class="clearfix"></div>
    </div>
<?php } ?>
<?php if ($showLazyLoad) { ?>
    <div class="row bx-<?= $arParams['TEMPLATE_THEME'] ?>">
        <div class="show-more show-more-btn intec-cl-text"
             data-use="show-more-<?= $navParams['NavNum'] ?>">
            <i class="glyph-icon-show-more intec-cl-background"></i>
            <?= $arParams['MESS_BTN_LAZY_LOAD'] ?>
        </div>
    </div>
<?php }
if ($showBottomPager) { ?>
    <div data-pagination-num="<?= $navParams['NavNum'] ?>">
        <!-- pagination-container -->
        <?= $arResult['NAV_STRING'] ?>
        <!-- pagination-container -->
    </div>
<?php }

$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<script>
    BX.message({
        BTN_MESSAGE_BASKET_REDIRECT: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT') ?>',
        BASKET_URL: '<?= $arParams['BASKET_URL'] ?>',
        ADD_TO_BASKET_OK: '<?= GetMessageJS('ADD_TO_BASKET_OK') ?>',
        TITLE_ERROR: '<?= GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR') ?>',
        TITLE_BASKET_PROPS: '<?= GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS') ?>',
        TITLE_SUCCESSFUL: '<?= GetMessageJS('ADD_TO_BASKET_OK') ?>',
        BASKET_UNKNOWN_ERROR: '<?= GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
        BTN_MESSAGE_SEND_PROPS: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS') ?>',
        BTN_MESSAGE_CLOSE: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE') ?>',
        BTN_MESSAGE_CLOSE_POPUP: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP') ?>',
        COMPARE_MESSAGE_OK: '<?= GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK') ?>',
        COMPARE_UNKNOWN_ERROR: '<?= GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR') ?>',
        COMPARE_TITLE: '<?= GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE') ?>',
        PRICE_TOTAL_PREFIX: '<?= GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX') ?>',
        RELATIVE_QUANTITY_MANY: '<?= CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY']) ?>',
        RELATIVE_QUANTITY_FEW: '<?= CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW']) ?>',
        BTN_MESSAGE_COMPARE_REDIRECT: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT') ?>',
        BTN_MESSAGE_LAZY_LOAD: '<?= $arParams['MESS_BTN_LAZY_LOAD'] ?>',
        BTN_MESSAGE_LAZY_LOAD_WAITER: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER') ?>',
        SITE_ID: '<?= SITE_ID ?>'
    });
    var <?= $obName ?> = new JCCatalogSectionComponent({
        siteId: '<?= CUtil::JSEscape(SITE_ID) ?>',
        componentPath: '<?= CUtil::JSEscape($componentPath) ?>',
        navParams: <?= CUtil::PhpToJSObject($navParams) ?>,
        deferredLoad: false, // enable it for deferred load
        initiallyShowHeader: '<?= !empty($arResult['ITEM_ROWS']) ?>',
        bigData: <?= CUtil::PhpToJSObject($arResult['BIG_DATA']) ?>,
        lazyLoad: !!'<?= $showLazyLoad ?>',
        loadOnScroll: !!'<?= ($arParams['LOAD_ON_SCROLL'] === 'Y') ?>',
        template: '<?= CUtil::JSEscape($signedTemplate) ?>',
        ajaxId: '<?= CUtil::JSEscape($arParams['AJAX_ID']) ?>',
        parameters: '<?= CUtil::JSEscape($signedParams) ?>',
        container: '<?= $containerName ?>'
    });
</script>