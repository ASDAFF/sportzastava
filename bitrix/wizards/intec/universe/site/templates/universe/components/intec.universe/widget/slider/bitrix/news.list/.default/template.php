<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\StringHelper;
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

$height = null;
if (!empty($arParams['PROPERTY_BANNER_HEIGHT'])) {
    $height = $arParams['PROPERTY_BANNER_HEIGHT'].'px;';
}

?>
<?= Html::beginTag('div', array(
    'id' => $sTemplateId,
    'class' => 'news-list-slider',
    'style' => array(
        'height' => $height
    )
)) ?>
    <div class="slider-wrapper owl-carousel">
        <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
            <?php
            $sId = $sTemplateId.'_'.$arItem['ID'];
            $sAreaId = $this->GetEditAreaId($sId);
            $sImage = null;

            if (!empty($arItem['PREVIEW_PICTURE']['SRC']))
                $sImage = $arItem['PREVIEW_PICTURE']['SRC'];

            if (empty($sImage))
                continue;

            $this->AddEditAction($sId, $arItem['EDIT_LINK']);
            $this->AddDeleteAction($sId, $arItem['DELETE_LINK']);

            $sTitle = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'TITLE', 'VALUE'));
            $sTitleTextColor = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'TITLE_TEXT_COLOR', 'VALUE'));
            $sDescription = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'DESCRIPTION', 'VALUE'));
            $sDescriptionTextColor = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'DESCRIPTION_TEXT_COLOR', 'VALUE'));
            $sLink = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'LINK', 'VALUE'));
            $sLink = StringHelper::replaceMacros($sLink, array('SITE_DIR' => SITE_DIR));
            $sLinkTarget = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'LINK_TARGET', 'VALUE_XML_ID')) == 'Y' ? '_blank' : null;
            $bButtonShow = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'BUTTON_SHOW', 'VALUE_XML_ID')) == 'Y';
            $bIsLink = !empty($sLink) && !$bButtonShow;
            $bIsButton = !empty($sLink) && $bButtonShow;
            $sButtonText = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'BUTTON_TEXT', 'VALUE'));
            $sButtonTextColor = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'BUTTON_TEXT_COLOR', 'VALUE'));
            $sButtonColor = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'BUTTON_COLOR', 'VALUE'));
            $sPosition = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'POSITION', 'VALUE_XML_ID'));
            $sBannerImage = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'IMAGE', 'VALUE'));
            $sBannerImagePosition = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'IMAGE_POSITION', 'VALUE_XML_ID'));
            $sBannerColor = ArrayHelper::getValue($arItem, array('SYSTEM_PROPERTIES', 'BANNER_COLOR', 'VALUE_XML_ID'));

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
            <?= Html::beginTag($bIsLink ? 'a' : 'div', array(
                'class' => 'slider-item',
                'data-dot' => '<div class="slider-dot"></div>',
                'style' => array(
                    'background-image' => 'url(\''.$sImage.'\')',
                    'height' => $height
                ),
                'href' => $bIsLink ? $sLink : null,
                'target' => $bIsLink ? $sLinkTarget : null,
                'id' => $sAreaId
            )) ?>
            <?php if ($sPosition != 'center') { ?>
                <div class="slider-item-wrapper <?= $sPosition ?>" data-color="<?= $sBannerColor ?>">
                    <div class="intec-content intec-content-visible">
                        <?php if($sPosition == 'left') {?>
                            <div class="slider-text-wrapper">
                                <?php if (!empty($sTitle)) {?>
                                    <div class="slider-title"<?= $sTitleTextColor ?>>
                                        <?= $sTitle ?>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($sDescription)) { ?>
                                    <div class="slider-description"<?= $sDescriptionTextColor ?>>
                                        <?= $sDescription ?>
                                    </div>
                                <?php } ?>
                                <?php if ($bIsButton) { ?>
                                    <div class="slider-buttons">
                                        <?= Html::beginTag('a', array(
                                            'class' => 'intec-button intec-button-lg intec-button-cl-common',
                                            'href' => $sLink,
                                            'style' => $sStyle,
                                            'target' => $sLinkTarget
                                        )) ?>
                                        <?= $sButtonText ?>
                                        <?= Html::endTag('a') ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if ($sBannerImagePosition == 'middle') {
                            $sBannerImagePosition = 'center';
                        } ?>

                        <?= Html::beginTag('div',
                            array(
                                'class' => 'slider-image-wrapper',
                                'style' => array(
                                    'background-image' => 'url('.$sBannerImage.')',
                                    'background-position' => $sPosition.' '.$sBannerImagePosition
                                )
                            )
                        ) ?>
                        <?=Html::endTag('div') ?>

                        <?php if($sPosition == 'right') {?>
                            <div class="slider-text-wrapper">
                                <?php if (!empty($sTitle)) {?>
                                    <div class="slider-title"<?= $sTitleTextColor ?>>
                                        <?= $sTitle ?>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($sDescription)) { ?>
                                    <div class="slider-description"<?= $sDescriptionTextColor ?>>
                                        <?= $sDescription ?>
                                    </div>
                                <?php } ?>
                                <?php if ($bIsButton) { ?>
                                    <div class="slider-buttons">
                                        <?= Html::beginTag('a', array(
                                            'class' => 'intec-button intec-button-lg intec-button-cl-common',
                                            'href' => $sLink,
                                            'style' => $sStyle,
                                            'target' => $sLinkTarget
                                        )) ?>
                                        <?= $sButtonText ?>
                                        <?= Html::endTag('a') ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="slider-item-wrapper" data-color="<?= $sBannerColor ?>">
                    <div class="intec-content">
                        <div class="slider-text-wrapper">
                            <?php if (!empty($sTitle)) { ?>
                                <div class="slider-title"<?= $sTitleTextColor ?>>
                                    <?= $sTitle ?>
                                </div>
                            <?php } ?>
                            <?php if (!empty($sDescription)) { ?>
                                <div class="slider-description"<?= $sDescriptionTextColor ?>>
                                    <?= $sDescription ?>
                                </div>
                            <?php } ?>
                            <?php if ($bIsButton) { ?>
                                <div class="slider-buttons">
                                    <?= Html::beginTag('a', array(
                                        'class' => 'intec-button intec-button-lg intec-button-cl-common',
                                        'href' => $sLink,
                                        'style' => $sStyle,
                                        'target' => $sLinkTarget
                                    )) ?>
                                    <?= $sButtonText ?>
                                    <?= Html::endTag('a') ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?= Html::endTag($bIsLink ? 'a' : 'div') ?>
        <?php } ?>
    </div>
    <div class="slider-dots-wrap">
        <div class="slider-dots"></div>
    </div>
    <script type="text/javascript">
        (function ($, api) {
            $(document).ready(function () {
                var root = $(<?= JavaScript::toObject('#'.$sTemplateId) ?>);
                var slider = $('.owl-carousel', root).owlCarousel({
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
                    dotsContainer: $('.slider-dots', root),
                    <?php if ($arParams['IN_HEADER'] == 'Y') { ?>
                    onInitialized: function(event){
                        var header = root.closest('.header').find('.header-desktop');

                        if (header.length > 0 && header.is(':visible')) {
                            var headHeight = header.height();
                            $('.owl-nav', root).css({'margin-top': headHeight / 4});
                            $('.slider-item', root).css({'padding-top': headHeight});
                        }

                        var bannerColor = $('.owl-item.active [data-color]', root).data('color');
                        root.closest('.header').attr('data-banner-color', bannerColor);
                    },
                    onChanged: function(event){
                        var color = root.find('.owl-item').eq(event.item.index).find('[data-color]').data('color');
                        root.closest('.header').attr('data-banner-color', color);
                    }
                    <?php } ?>
                });
            });
        })(jQuery, intec)
    </script>
<?= Html::endTag('div') ?>