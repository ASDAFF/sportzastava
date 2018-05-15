<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use Bitrix\Main\Localization\Loc;

/**
 * @var array $arResult
 * @var CMain $APPLICATION
 */

$isAjax = ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajax_action']) && $_POST['ajax_action'] == 'Y')

?>
<div class="compare-result-empty">
    <?= Loc::getMessage('COMPARE_RESULT_EMPTY') ?>
</div>
<div class="bx_compare" id="bx_catalog_compare_block">
    <?php if ($isAjax) {
        $APPLICATION->RestartBuffer();
    } ?>
    <div class="bx_sort_container">
        <div class="bx_sort_container">
            <a class="compare-result-clear">
                <i class="fa fa-times" aria-hidden="true"></i>
                <?= Loc::getMessage('CATALOG_COMPARE_CLEAR') ?>
            </a>
            <div>
                <a class="sortbutton<?php echo (!$arResult["DIFFERENT"] ? ' current' : '') ?>" href="<?php echo $arResult['COMPARE_URL_TEMPLATE'].'DIFFERENT=N' ?>" rel="nofollow">
                    <?= Loc::getMessage("CATALOG_ALL_CHARACTERISTICS") ?>
                </a>
                <a class="sortbutton<?php echo ($arResult["DIFFERENT"] ? ' current' : '') ?>" href="<?php echo $arResult['COMPARE_URL_TEMPLATE'].'DIFFERENT=Y' ?>" rel="nofollow">
                    <?= Loc::getMessage("CATALOG_ONLY_DIFFERENT")?>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="table_compare wrap_sliders tabs-body">
        <?php if (!empty($arResult["SHOW_FIELDS"])) { ?>
            <div class="frame top">
                <div class="wraps">
                    <table class="compare_view top">
                        <tr>
                            <?php foreach($arResult["ITEMS"] as $arElement) {

                                $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
                                $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));

                                $sDetail = ArrayHelper::getValue($arElement, 'DETAIL_PAGE_URL');
                                $sPictureSrc = ArrayHelper::getValue($arElement, ['PICTURE', 'src']);
                                $sName = ArrayHelper::getValue($arElement, 'NAME');
                                $sSectionUrl = ArrayHelper::getValue($arElement, ['SECTION', 'SECTION_PAGE_URL']);
                                $sSectionName = ArrayHelper::getValue($arElement, ['SECTION', 'NAME']);
                                $sNewPrice = ArrayHelper::getValue($arElement, ['MIN_PRICE', 'PRINT_DISCOUNT_VALUE']);
                                $sOldPrice = ArrayHelper::getValue($arElement, ['MIN_PRICE', 'PRINT_VALUE']);
                                $sNewPriceNumeric = ArrayHelper::getValue($arElement, ['MIN_PRICE', 'DISCOUNT_VALUE']);
                                $sOldPriceNumeric = ArrayHelper::getValue($arElement, ['MIN_PRICE', 'VALUE']);

                                $bDiscount = $sOldPriceNumeric > $sNewPriceNumeric;

                                $arCompareItem = [
                                    'class' => 'compare-item',
                                    'data-product-id' => $arElement['ID'],
                                    'id' => $this->GetEditAreaId($arElement['ID'])
                                ];

                                $arPictureAttributes = [
                                    'title' => ArrayHelper::getValue($arElement, ['PICTURE', 'imgAlt']),
                                    'alt' => ArrayHelper::getValue($arElement, ['PICTURE', 'imgAlt'])
                                ];

                            ?>
                                <td class="compare-item-td">
                                    <?= Html::beginTag('div', $arCompareItem) ?>
                                        <i class="remove_compare fa fa-times" aria-hidden="true"></i>
                                        <a href="<?= $sDetail ?>" class="intec-image compare-item-img">
                                            <span class="intec-aligner"></span>
                                            <?= Html::img($sPictureSrc, $arPictureAttributes) ?>
                                        </a>
                                        <a href="<?= $sDetail ?>" class="compare-item-name">
                                            <?= $sName ?>
                                        </a>
                                        <a href="<?= $sSectionUrl ?>" class="compare-item-section">
                                            <?= $sSectionName ?>
                                        </a>
                                        <div class="compare-item-price">
                                            <div class="price newprice">
                                                <?= $sNewPrice ?>
                                            </div>
                                            <?php if ($bDiscount) { ?>
                                                <div class="price oldprice">
                                                    <?= $sOldPrice ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?= Html::endTag('div') ?>
                                </td>
                            <?php } ?>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="wrapp_scrollbar">
                <div class="wr_scrollbar">
                    <div class="scrollbar">
                        <div class="handle intec-cl-background">
                            <div class="mousearea"></div>
                        </div>
                    </div>
                </div>
                <ul class="slider_navigation compare">
                    <ul class="slider-direction-nav">
                        <li class="slider-nav-prev backward">
                            <span class="slider-prev fa fa-angle-left"></span>
                        </li>
                        <li class="slider-nav-next forward">
                            <span class="slider-next fa fa-angle-right"></span>
                        </li>
                    </ul>
                </ul>
            </div>
        <?php } ?>
        <div class="bx_filtren_container">
            <ul>
                <?php foreach ($arResult["SHOW_PROPERTIES"] as $key => $arProp) { ?>
                    <li class="intec-button intec-button-s-6 intec-button-r-3 intec-button-cl-common intec-button-transparent property" data-id-prop="<?=$arProp['ID']?>">
                        + <?= $arProp['NAME'] ?>
                    </li>
                <?php } ?>
                <?php foreach ($arResult["SHOW_OFFER_PROPERTIES"] as $key => $arProp) { ?>
                    <li class="intec-button intec-button-s-6 intec-button-r-3 intec-button-cl-common intec-button-transparent property" data-id-prop="<?=$arProp['ID']?>">
                        + <?= $arProp['NAME'] ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="prop_title_table"></div>
        <div class="frame props">
            <div class="wraps">
                <table class="data_table_props compare_view">
                    <?php $arUnvisible = ["NAME", "PREVIEW_PICTURE", "DETAIL_PICTURE"];

                    if (!empty($arResult["SHOW_FIELDS"])) {
                        foreach ($arResult["SHOW_FIELDS"] as $code => $arProp) {
                            if (!in_array($code, $arUnvisible)) {
                                $showRow = true;

                                if (!isset($arResult['FIELDS_REQUIRED'][$code]) || $arResult['DIFFERENT']) {
                                    $arCompare = array();

                                    foreach($arResult["ITEMS"] as &$arElement) {
                                        $arPropertyValue = $arElement["FIELDS"][$code];

                                        if (is_array($arPropertyValue)){
                                            sort($arPropertyValue);
                                            $arPropertyValue = implode(" / ", $arPropertyValue);
                                        }

                                        $arCompare[] = $arPropertyValue;
                                    }
                                    unset($arElement);

                                    $showRow = (count(array_unique($arCompare)) > 1);
                                }

                                if ($showRow) { ?>
                                    <tr>
                                        <td>
                                            <?= Loc::getMessage("IBLOCK_FIELD_".$code) ?>
                                            <i class="fa fa-times" aria-hidden="true" data-id-prop="<?= $arProperty['ID'] ?>"></i>
                                        </td>
                                        <?php foreach ($arResult["ITEMS"] as $arElement) { ?>
                                            <td valign="top">
                                                <?= $arElement["FIELDS"][$code] ?>
                                            </td>
                                        <?php }
                                        unset($arElement) ?>
                                    </tr>
                                <?php }
                            }
                        }
                    }

                    if (!empty($arResult["SHOW_OFFER_FIELDS"])) {
                        foreach ($arResult["SHOW_OFFER_FIELDS"] as $code => $arProp) {
                            $showRow = true;

                            if ($arResult['DIFFERENT']) {
                                $arCompare = array();

                                foreach ($arResult["ITEMS"] as &$arElement) {
                                    $Value = $arElement["OFFER_FIELDS"][$code];

                                    if (is_array($Value)) {
                                        sort($Value);
                                        $Value = implode(" / ", $Value);
                                    }

                                    $arCompare[] = $Value;
                                }

                                unset($arElement);
                                $showRow = (count(array_unique($arCompare)) > 1);
                            }

                            if ($showRow) { ?>
                                <tr>
                                    <td>
                                        <?= Loc::getMessage("IBLOCK_OFFER_FIELD_".$code) ?>
                                        <i class="fa fa-times" aria-hidden="true" data-id-prop="<?= $arProperty['ID'] ?>"></i>
                                    </td>
                                    <?php foreach ($arResult["ITEMS"] as &$arElement) { ?>
                                        <td>
                                            <?= (is_array($arElement["OFFER_FIELDS"][$code]) ? implode("/ ", $arElement["OFFER_FIELDS"][$code]) : $arElement["OFFER_FIELDS"][$code]) ?>
                                        </td>
                                    <?php }
                                    unset($arElement) ?>
                                </tr>
                            <?php }
                        }
                    }

                    if (!empty($arResult["SHOW_PROPERTIES"])) {
                        foreach ($arResult["SHOW_PROPERTIES"] as $code => $arProperty) {
                            $showRow = true;

                            if ($arResult['DIFFERENT']) {
                                $arCompare = [];

                                foreach ($arResult["ITEMS"] as &$arElement) {
                                    $arPropertyValue = $arElement["DISPLAY_PROPERTIES"][$code]["VALUE"];

                                    if (is_array($arPropertyValue)) {
                                        sort($arPropertyValue);
                                        $arPropertyValue = implode(" / ", $arPropertyValue);
                                    }

                                    $arCompare[] = $arPropertyValue;
                                }
                                unset($arElement);

                                $showRow = (count(array_unique($arCompare)) > 1);
                            }

                            if ($showRow) { ?>
                                <tr>
                                    <td>
                                        <?= $arProperty["NAME"] ?>
                                        <i class="fa fa-times" aria-hidden="true" data-id-prop="<?=$arProperty['ID']?>"></i>
                                    </td>
                                    <?php foreach ($arResult["ITEMS"] as &$arElement) { ?>
                                        <td>
                                            <?= (is_array($arElement["DISPLAY_PROPERTIES"][$code]["DISPLAY_VALUE"]) ? implode("/ ", $arElement["DISPLAY_PROPERTIES"][$code]["DISPLAY_VALUE"]) : $arElement["DISPLAY_PROPERTIES"][$code]["DISPLAY_VALUE"]) ?>
                                        </td>
                                    <?php }
                                    unset($arElement) ?>
                                </tr>
                            <?php }
                        }
                    }

                    if (!empty($arResult["SHOW_OFFER_PROPERTIES"])) {
                        foreach ($arResult["SHOW_OFFER_PROPERTIES"] as $code=>$arProperty) {
                            $showRow = true;

                            if ($arResult['DIFFERENT']) {
                                $arCompare = [];

                                foreach ($arResult["ITEMS"] as &$arElement) {
                                    $arPropertyValue = $arElement["OFFER_DISPLAY_PROPERTIES"][$code]["VALUE"];

                                    if (is_array($arPropertyValue)) {
                                        sort($arPropertyValue);
                                        $arPropertyValue = implode(" / ", $arPropertyValue);
                                    }

                                    $arCompare[] = $arPropertyValue;
                                }
                                unset($arElement);

                                $showRow = (count(array_unique($arCompare)) > 1);
                            }

                            if ($showRow) { ?>
                                <tr>
                                    <td>
                                        <?= $arProperty["NAME"] ?>
                                        <i class="fa fa-times" aria-hidden="true" data-id-prop="<?=$arProperty['ID']?>"></i>
                                    </td>
                                    <?php foreach($arResult["ITEMS"] as &$arElement) { ?>
                                        <td>
                                            <?= (is_array($arElement["OFFER_DISPLAY_PROPERTIES"][$code]["DISPLAY_VALUE"]) ? implode("/ ", $arElement["OFFER_DISPLAY_PROPERTIES"][$code]["DISPLAY_VALUE"]) : $arElement["OFFER_DISPLAY_PROPERTIES"][$code]["DISPLAY_VALUE"]) ?>
                                        </td>
                                    <?php }
                                    unset($arElement) ?>
                                </tr>
                            <?php }
                        }
                    } ?>
                </table>
            </div>
        </div>
    </div>
    <?php if ($isAjax) die(); ?>
</div>
<?php include('script.php');