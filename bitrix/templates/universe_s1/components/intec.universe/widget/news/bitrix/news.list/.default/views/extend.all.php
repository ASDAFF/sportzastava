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
<div class="widget-news-view widget-news-view-extend">
    <div class="widget-news-view-wrapper">
        <div class="widget-news-navigation">
            <div class="intec-aligner"></div>
            <div class="widget-news-navigation-wrapper">
                <div class="widget-news-navigation-previous" data-move="previous">
                    <i class="fa fa-arrow-left intec-cl-text-hover"></i>
                </div>
                <div class="widget-news-navigation-next" data-move="next">
                    <i class="fa fa-arrow-right intec-cl-text-hover"></i>
                </div>
            </div>
        </div>
        <div class="widget-news-slider owl-carousel">
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
                    'width' => 150,
                    'height' => 150
                ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

                if (!empty($sImage)) {
                    $sImage = $sImage['src'];
                } else {
                    $sImage = null;
                }
            ?>
                <div class="widget-news-item">
                    <div class="widget-news-item-wrapper" id="<?= $sAreaId ?>">
                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="widget-news-item-image" style="background-image: url('<?= $sImage ?>')"></a>
                        <div class="widget-news-item-information">
                            <div class="widget-news-item-name">
                                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="widget-news-item-name-wrapper intec-cl-text-hover">
                                    <?= $arItem['NAME'] ?>
                                </a>
                            </div>
                            <div class="widget-news-item-date">
                                <?= $arItem['DISPLAY_ACTIVE_FROM'] ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="widget-news-dots"></div>
</div>
<script type="text/javascript">
    (function ($, api) {
        $(document).ready(function () {
            var root = $(<?= JavaScript::toObject('#'.$sTemplateId.' .widget-news-'.$sType.' .widget-news-view-extend') ?>);
            var sliders = root.find('.owl-carousel').each(function () {
                var slider = $(this);
                var parent = slider.parent().parent();
                var navigation = parent.find('.widget-news-navigation');
                var dots = parent.find('.widget-news-dots');
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
                    'nav': false,
                    'dots': true,
                    'dotsData': false,
                    'dotsContainer': dots,
                    'responsive': {
                        0: {
                            'items': 1
                        },
                        640: {
                            'items': 2
                        },
                        960: {
                            'items': 3
                        }
                    }
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
            })
        });
    })(jQuery, intec)
</script>
