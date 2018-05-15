<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$counter = 1;
$filler = false;

$this->setFrameMode(true);
?>


<div class="share-promo share-block">
    <?php foreach($arResult['ITEMS'] as $arItem): ?>
        <?php
            $mod = $counter % 2;
            if ($mod == 0) {
                $filler = true;
            } else {
                $filler = false;
            }

            $counter++;

            $img = CFile::ResizeImageGet(
                $arItem['PREVIEW_PICTURE'],
                array(
                    'width' => 320,
                    'height' => 320
                ),
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT
            );
        ?>
        <div class="promo-element-wrapper<?= $filler == true ? ' fill' : null ?> clearfix">
            <div class="intec-content">
                <div class="intec-content-wrapper">
                    <div class="promo-element">
                        <?php if (!$filler) { ?>
                            <div class="element-text">
                                <div class="text-wrapper">
                                    <div class="text-name">
                                        <?= $arItem['NAME'] ?>
                                    </div>
                                    <?php if (!empty($arItem['PREVIEW_TEXT'])) { ?>
                                        <div class="text-description">
                                            <?= $arItem['PREVIEW_TEXT'] ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="element-image">
                            <img src="<?= $img['src'] ?>">
                        </div>
                        <?php if ($filler) { ?>
                            <div class="element-text">
                                <div class="text-wrapper">
                                    <div class="text-name">
                                        <?= $arItem['NAME'] ?>
                                    </div>
                                    <?php if (!empty($arItem['PREVIEW_TEXT'])) { ?>
                                        <div class="text-description">
                                            <?= $arItem['PREVIEW_TEXT'] ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>