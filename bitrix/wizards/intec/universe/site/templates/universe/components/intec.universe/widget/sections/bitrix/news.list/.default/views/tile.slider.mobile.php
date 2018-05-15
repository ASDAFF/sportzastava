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
<div class="widget-services-view widget-services-view-tile-slider">
    <div class="widget-services-slider owl-carousel">
        <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
        <?php
            $sId = $sTemplateId.'_'.$sType.'_tile_slider_'.$arItem['ID'];
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
                'width' => 680,
                'height' => 540
            ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

            if (!empty($sImage)) {
                $sImage = $sImage['src'];
            } else {
                $sImage = null;
            }
        ?>
            <div class="widget-services-element">
                <div class="widget-services-element-wrapper" id="<?= $sAreaId ?>">
                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="widget-services-element-wrapper-2" style="background-image: url('<?= $sImage ?>')">
                        <div class="widget-services-element-background"></div>
                        <div class="widget-services-element-information">
                            <div class="widget-services-element-name">
                                <div class="widget-services-element-name-wrapper">
                                    <div class="widget-services-element-name-wrapper-2">
                                        <?= $arItem['NAME'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-services-element-description">
                                <?= $arItem['PREVIEW_TEXT'] ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script type="text/javascript">
    (function ($, api) {
        $(document).ready(function () {
            var root = $(<?= JavaScript::toObject('#'.$sTemplateId.' .widget-services-mobile .widget-services-view-tile-slider') ?>);
            var sliders = root.find('.owl-carousel').each(function () {
                var slider = $(this);

                slider.owlCarousel({
                    'center': false,
                    'loop': true,
                    'stagePadding': 50,
                    'nav': false,
                    'dots': false,
                    'responsive': {
                        0: {
                            'items': 1
                        },
                        600: {
                            'items': 2
                        }
                    }
                });
            })
        });
    })(jQuery, intec)
</script>