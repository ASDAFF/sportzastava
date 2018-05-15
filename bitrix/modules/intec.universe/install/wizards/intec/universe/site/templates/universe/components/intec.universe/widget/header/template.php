<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\JavaScript;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @global CMain $APPLICATION
 */

if (!CModule::IncludeModule('intec.core'))
    return;

$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);

?>
<div class="header <?= $arParams['WITH_BANNER'] == 'Y' ? 'with-banner' : '' ?>" id="<?= $sTemplateId ?>">
    <?php if ($arParams['WITH_BANNER'] == 'Y') { ?>
        <?php $APPLICATION->IncludeComponent(
            'intec.universe:widget',
            'slider',
            array(
                'AJAX_MODE' => 'N',
                'IN_HEADER' => 'Y',
                'IBLOCK_ID' => $arParams['BANNER_IBLOCK_ID'],
                'SLIDER_COUNT' => $arParams['BANNER_SLIDER_COUNT'],
                'SLIDER_ACTIVE_ELEMENTS' => $arParams['BANNER_ACTIVE_ELEMENTS'],
                'SLIDER_PROPERTY_TITLE' => $arParams['BANNER_PROPERTY_TITLE'],
                'SLIDER_PROPERTY_TITLE_COLOR' => $arParams['BANNER_PROPERTY_TITLE_COLOR'],
                'SLIDER_PROPERTY_DESCRIPTION' => $arParams['BANNER_PROPERTY_DESCRIPTION'],
                'SLIDER_PROPERTY_DESCRIPTION_COLOR' => $arParams['BANNER_PROPERTY_DESCRIPTION_COLOR'],
                'SLIDER_PROPERTY_LINK' => $arParams['BANNER_PROPERTY_LINK'],
                'SLIDER_PROPERTY_BLANK' => $arParams['BANNER_PROPERTY_BLANK'],
                'SLIDER_PROPERTY_BUTTON_SHOW' => $arParams['BANNER_PROPERTY_BUTTON_SHOW'],
                'SLIDER_PROPERTY_BUTTON_TEXT' => $arParams['BANNER_PROPERTY_BUTTON_TEXT'],
                'SLIDER_PROPERTY_BUTTON_TEXT_COLOR' => $arParams['BANNER_PROPERTY_BUTTON_TEXT_COLOR'],
                'SLIDER_PROPERTY_BUTTON_COLOR' => $arParams['BANNER_PROPERTY_BUTTON_COLOR'],
                'SLIDER_PROPERTY_TEXT_POSITION' => $arParams['BANNER_PROPERTY_TEXT_POSITION'],
                'SLIDER_PROPERTY_IMAGE' => $arParams['BANNER_PROPERTY_IMAGE'],
                'SLIDER_PROPERTY_IMAGE_POSITION' => $arParams['BANNER_PROPERTY_IMAGE_POSITION'],
                'SLIDER_PROPERTY_BANNER_COLOR' => $arParams['BANNER_PROPERTY_BANNER_COLOR'],
                'SLIDER_PROPERTY_AUTOPLAY' => $arParams['BANNER_PROPERTY_AUTOPLAY'],
                'SLIDER_PROPERTY_AUTOPLAY_DELAY' => $arParams['BANNER_PROPERTY_AUTOPLAY_DELAY'],
                'SLIDER_PROPERTY_HEIGHT' => $arParams['BANNER_PROPERTY_HEIGHT'],
            ),
            false
        ); ?>
    <?php } ?>

    <div class="header-desktop">
        <div class="header-static">
            <?php
            include('parts/info.php');
            include('parts/content.php');
            include('parts/menu.php');
            ?>
        </div>
        <?php if ($arParams['FIXED_HEADER'] == 'Y') {
            include('parts/header_fixed.php');
        } ?>
    </div>
    <div class="intec-content-responsive intec-content-responsive-mobile">
        <div class="header-mobile">
            <?php include('parts/panel.php') ?>
        </div>
    </div>

    <script type="text/javascript">
        (function ($, api) {
            var root = $(<?= JavaScript::toObject('#'.$sTemplateId) ?>);
            var selectors = {
                'phone': '[data-type=phone]',
                'menu': '[data-type=menu]'
            };

            $(document).ready(function () {
                root.find(selectors.phone).each(function () {
                    var self = $(this);
                    var menu = self.find(selectors.menu);

                    self.on('mouseover', function () {
                        menu.attr('data-active', 'true');
                        menu.stop().show(300);
                    }).on('mouseout', function () {
                        menu.attr('data-active', 'false');
                        menu.stop().hide(300);
                    });
                });
            });
        })(jQuery, intec);

        <?php if ($arParams['FIXED_HEADER'] == 'Y') { ?>
            function fix_header(positionActive){
                var currentPosition = $(window).scrollTop();
                var headerDOM = $('#<?= $sTemplateId ?> .header-fixed');
                if (currentPosition > positionActive && !headerDOM.hasClass('menu-fixed')) {
                    headerDOM.addClass('menu-fixed');
                    headerDOM.animate({opacity: 1, top: 0}, 200);
                } else if (currentPosition <= positionActive && headerDOM.hasClass('menu-fixed')) {
                    headerDOM.removeClass('menu-fixed');
                    headerDOM.animate({opacity: 0, top: '-70px'}, 100);
                }
            }

            $(document).ready(function() {
                var menu = $('#<?= $sTemplateId ?>');
                var positionActive = menu.offset().top + $('.header-desktop', menu).outerHeight();
                $(window).scroll(function() {
                    fix_header(positionActive);
                });
            });
        <?php } ?>

        <?php if ($arParams['FIXED_HEADER_MOBILE'] == 'Y') { ?>
            function fix_header_mobile(positionActive){
                var currentPosition = $(window).scrollTop();
                var headerDOM = $('.header-mobile');
                if (currentPosition > positionActive && !headerDOM.hasClass('header-fixed-menu')) {
                    headerDOM.addClass('header-fixed-menu');
                } else if (currentPosition <= positionActive && headerDOM.hasClass('header-fixed-menu')) {
                    headerDOM.removeClass('header-fixed-menu');
                }
            }

            $(document).ready(function() {
                var header = $('#<?= $sTemplateId ?>');
                var positionActive = header.offset().top + $('.header-mobile', header).outerHeight();
                $(window).scroll(function() {
                    fix_header_mobile(positionActive);
                });
            });
        <?php } ?>
    </script>
</div>
