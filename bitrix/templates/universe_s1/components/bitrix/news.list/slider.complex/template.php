<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
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
 */

$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);

$cbPosition = $arParams['COMPLEX_BANNER_VIEW'];
$cbCount = $arParams['COMPLEX_BANNER_COUNT'];

?>

<div class="intec-content">
    <div class="intec-content-wrapper">
        <div class="main-banner">

<?= Html::beginTag(
    'div',
    array(
        'id' => $sTemplateId,
        'class' => 'news-list-slider-cb '.$cbPosition
    )
)?>
    <div class="slider-wrapper owl-carousel">
        <?php foreach ($arResult['ITEMS'] as $arItem): ?>
            <?php
                $sId = $sTemplateId.'_'.$arItem['ID'];
                $sAreaId = $this->GetEditAreaId($sId);

                $this->AddEditAction($sId, $arItem['EDIT_LINK']);
                $this->AddDeleteAction($sId, $arItem['DELETE_LINK']);

                $sImage = null;
                if (!empty($arItem['PREVIEW_PICTURE']['SRC']))
                    $sImage = $arItem['PREVIEW_PICTURE']['SRC'];
                if (empty($sImage))
                    continue;

                $sLink = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'LINK', 'VALUE'));
                $bButtonShow = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'BUTTON_SHOW', 'VALUE_XML_ID')) == 'Y';
                $sLinkTarget = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'LINK_TARGET', 'VALUE_XML_ID')) == 'Y' ? '_blank' : null;

                $bIsLink = !empty($sLink) && !$bButtonShow;
                $bIsButton = !empty($sLink) && $bButtonShow;

                $sTitle = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'TITLE', 'VALUE'));
                $sTitleTextColor = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'TITLE_TEXT_COLOR', 'VALUE'));
                $sDescription = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'DESCRIPTION', 'VALUE'));
                $sDescriptionTextColor = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'DESCRIPTION_TEXT_COLOR', 'VALUE'));
                $sButtonText = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'BUTTON_TEXT', 'VALUE'));
                $sButtonTextColor = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'BUTTON_TEXT_COLOR', 'VALUE'));
                $sButtonColor = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'BUTTON_COLOR', 'VALUE'));
                $sPosition = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'POSITION', 'VALUE_XML_ID'));
                $sBannerImage = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'IMAGE', 'VALUE'));
                $sBannerImagePosition = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'IMAGE_POSITION', 'VALUE_XML_ID'));

                $sTitleTextColor ? $sTitleTextColor = ' style="color:'.$sTitleTextColor.';"' : $sTitleTextColor = ' style="color:#FFF;"';
                $sDescriptionTextColor ? $sDescriptionTextColor = ' style="color:'.$sDescriptionTextColor.';"' : $sDescriptionTextColor = ' style="color:#FFF;"';

                if (empty($sButtonText))
                    $sButtonText = GetMessage('N_L_SLIDER_BUTTON');

                $sStyle = array();

                if (!empty($sButtonColor)) {
                    $sStyle[] = 'background-color: ' . $sButtonColor;
                    $sStyle[] = 'border-color: ' . $sButtonColor;
                }

                if (!empty($sButtonTextColor)) {
                    $sStyle[] = 'color: ' . $sButtonTextColor;
                }

                if (!empty($sStyle)) {
                    $sStyle = implode('; ', $sStyle);
                } else {
                    $sStyle = null;
                }
            ?>

            <?= Html::beginTag(
                $bIsLink ? 'a' : 'div',
                array(
                    'class' => 'slider-item',
                    'data-dot' => '<div class="slider-dot"></div>',
                    'style' => array(
                        'background-image' => 'url(\''.$sImage.'\')'
                    ),
                    'id' => $sAreaId,
                    'href' => $bIsLink ? $sLink : null,
                    'target' => $bIsLink ? $sLinkTarget : null
                )
            ) ?>
                <?php if ($sPosition != 'center') { ?>
                    <?php include('parts/position.left.right.php') ?>
                <?php } else { ?>
                    <?php include('parts/position.center.php') ?>
                <?php } ?>
            <?= Html::endTag($bIsLink ? 'a' : 'div') ?>

        <?php endforeach; ?>
    </div>
    <div class="slider-dots-wrap">
        <div class="slider-dots"></div>
    </div>
    <script type="text/javascript">
        (function ($, api) {
            $(document).ready(function () {
                var root = $(<?= JavaScript::toObject('#'.$sTemplateId) ?>);
                var slider = root.find('.owl-carousel').owlCarousel({
                    items: 1,
                    autoplay: <?= $arParams['AUTOPLAY'] == 'Y' ? 'true' : 'false' ?>,
                    autoplaySpeed: 500,
                    autoplayTimeout: <?= $arParams['AUTOPLAY_DELAY'] != '' ? $arParams['AUTOPLAY_DELAY'] : '10000' ?>,
                    autoplayHoverPause: true,
                    loop: true,
                    nav: true,
                    navText: ['', ''],
                    dots: true,
                    dotsData: true,
                    dotsContainer: root.find('.slider-dots')
                });

                console.log(slider);
            });
        })(jQuery, intec)
    </script>
<?= Html::endTag('div') ?>

            <?php if (!empty($arResult['CBANNER'])) { ?>
                <?php //Блоки маленьких баннеров
                    $separate = 1;
                    $separateCount = 1;

                    foreach ($arResult['CBANNER'] as $arItem) { ?>
                    <?php
                        $cbLink = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'LINK', 'VALUE'));
                        $cbIsLink = !empty($cbLink);
                        $cbLinkBlank = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'LINK_BLANK', 'VALUE_XML_ID')) == 'Y' ? '_blank' : null;

                        $cbImage = ArrayHelper::getValue($arItem, 'PREVIEW_PICTURE');
                        $cbName = ArrayHelper::getValue($arItem, 'NAME');
                        $cbNameColor = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'TEXT_COLOR', 'VALUE'));
                        //$cbMarkText = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'MARK_TEXT', 'VALUE'));
                        //$cbMarkTextColor = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'MARK_TEXT_COLOR', 'VALUE'));
                        //$cbMarkColor = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'MARK_COLOR', 'VALUE'));
                    ?>
                    <?php if ($separate == 1 || $separate == 3) { ?>

                        <?= Html::beginTag(
                            'div',
                            array(
                                'class' => 'cb-block-wrapper-'.$separateCount.' items-'.$cbCount.' '.$cbPosition.' clearfix'
                            )
                        ) ?>

                    <?php } ?>
                        <?php include('parts/cb.banners.php') ?>
                    <?php if ($separate == 2 || $separate == 4) {
                        $separateCount++ ?>

                        <?= Html::endTag('div') ?>

                    <?php }
                        if ($separate == $cbCount) break;
                        $separate++;
                    ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>