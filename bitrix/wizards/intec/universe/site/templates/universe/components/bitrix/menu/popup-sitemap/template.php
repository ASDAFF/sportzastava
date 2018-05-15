<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\JavaScript;
use intec\core\helpers\Type;

/** @var array $arParams
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

?>
<div id="popup-menu" class="nano" style="height: 500px">
    <div class="popup-sitemap clearfix nano-content">
        <?php foreach ($arResult as $arItem) {

            $sSectionName = ArrayHelper::getValue($arItem, 'TEXT');
            $sSectionURL = ArrayHelper::getValue($arItem, 'LINK');
            $bHaveItems = count($arItem['ITEMS']) > 0;
            $arSecondLevel = $bHaveItems ? ArrayHelper::getValue($arItem, 'ITEMS') : null;

        ?>
            <div class="first-level">
                <div class="first-level-name">
                    <a class="intec-cl-text-hover" href="<?= $sSectionURL ?>">
                        <?= $sSectionName ?>
                    </a>
                </div>
                <?php if ($bHaveItems) { ?>
                    <div class="second-level">
                        <?php include('parts/subsections.php') ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    $(window).ready(function() {
        var popup_catalog_height = $(this).outerHeight() - 150;
        $('#popup-menu').css({
            'height': popup_catalog_height+'px'
        });

		$('#popup-menu').nanoScroller();
    });

    $(window).resize(function() {
        var popup_catalog_height = $(this).outerHeight() - 150;
        $('#popup-menu').css({
            'height': popup_catalog_height+'px'
        });
    });

    $('.third-level-show').on('click', function (event) {
       var container = $(this).closest('.second-level-element').find('.third-level');

		if (container.is(':hidden')) {
			$(this).attr('style', 'transform: rotate(180deg);');
		} else {
			$(this).attr('style', 'transform: initial;');
		}
       container.slideToggle(250);

		$('#popup-menu').delay(300).nanoScroller();
    });
</script>