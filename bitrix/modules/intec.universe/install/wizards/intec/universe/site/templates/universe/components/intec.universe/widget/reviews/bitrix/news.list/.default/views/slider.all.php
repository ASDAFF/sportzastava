<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

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
 * @var string $sTemplateId
 * @var string $sType
 */
?>
<div class="widget-reviews-view widget-reviews-view-slider">
    <div class="widget-reviews-view-wrapper">
        <div class="widget-reviews-navigation">
            <div class="intec-aligner"></div>
            <div class="widget-reviews-navigation-wrapper">
                <div class="widget-reviews-navigation-previous" data-move="previous">
                    <i class="fa fa-arrow-left intec-cl-text-hover"></i>
                </div>
                <div class="widget-reviews-navigation-next" data-move="next">
                    <i class="fa fa-arrow-right intec-cl-text-hover"></i>
                </div>
            </div>
        </div>
        <div class="widget-reviews-slider owl-carousel">
            <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
            <?php
                $sId = $sTemplateId.'_'.$sType.'_extend_'.$arItem['ID'];
                $sAreaId = $this->GetEditAreaId($sId);
                $this->AddEditAction($sId, $arItem['EDIT_LINK']);
                $this->AddDeleteAction($sId, $arItem['DELETE_LINK']);
                $sImage = null;

                if (!empty($arItem['PREVIEW_PICTURE'])) {
                    $sImage = $arItem['PREVIEW_PICTURE'];
                } else if (!empty($arItem['DETAIL_PICTURE'])) {
                    $sImage = $arItem['DETAIL_PICTURE'];
                }

                $sImage = CFile::ResizeImageGet($sImage, array(
                    'width' => 80,
                    'height' => 80
                ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

                if (!empty($sImage)) {
                    $sImage = $sImage['src'];
                } else {
                    $sImage = null;
                }
            ?>
                <div class="widget-reviews-item">
                    <div class="widget-reviews-item-wrapper" id="<?= $sAreaId ?>">
                        <div class="widget-reviews-item-header">
                            <div class="widget-reviews-item-image">
                                <div class="widget-reviews-item-image-wrapper" style="background-image: url('<?= $sImage ?>')"></div>
                            </div>
                            <div class="widget-reviews-item-name">
                                <?= $arItem['NAME'] ?>
                            </div>
                            <div class="widget-reviews-item-signature">
                                <?= $arItem['PREVIEW_TEXT'] ?>
                            </div>
                        </div>
                        <div class="widget-reviews-item-information">
                            <?= $arItem['DETAIL_TEXT'] ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="widget-reviews-dots"></div>
</div>
<script type="text/javascript">
    (function ($, api) {
        $(document).ready(function () {
            var root = $(<?= JavaScript::toObject('#'.$sTemplateId.' .widget-reviews-'.$sType.' .widget-reviews-view-slider') ?>);
            var sliders = root.find('.owl-carousel').each(function () {
                var slider = $(this);
                var parent = slider.parent().parent();
                var navigation = parent.find('.widget-reviews-navigation');
                var dots = parent.find('.widget-reviews-dots');
                var refresh = function (event) {
                    if (event.page.size < event.item.count) {
                        navigation.show();
                    } else {
                        navigation.hide();
                    }
                };

                slider.on('initialized.owl.carousel', refresh)
                    .on('resized.owl.carousel', refresh)
                    .on('refreshed.owl.carousel', refresh);

                slider.owlCarousel({
                    'center': false,
                    'loop': false,
                    'stagePadding': 5,
                    'margin': 20,
                    'nav': false,
                    'dots': true,
                    'dotsData': false,
                    'dotsContainer': dots,
                    'items': 1
                });

                navigation.find('[data-move]').on('click', function (event) {
                    var self = $(this);
                    var value = self.data('move');

                    if (value == 'next') {
                        slider.trigger('next.owl.carousel');
                    } else if (value == 'previous') {
                        slider.trigger('prev.owl.carousel');
                    } else {
                        slider.trigger('to.owl.carousel', [value])
                    }
                });
            });
        });
    })(jQuery, intec)
</script>
