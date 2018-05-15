<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use \intec\core\helpers\ArrayHelper;

/**
 * @var $APPLICATION
 * @var array $arResult
 * @var array $arParams
 * @var string $strAlt
 * @var string $strTitle
 * @var boolean $isNew
 * @var boolean $isPopular
 * @var array $morePhotoList
 * @var array $arFirstPhoto
 * @var array $currentOffer
 */

/** @param array $photoList - files urls */
function printMainImageCarousel ($photoList) {
    include('main_image_carousel.php');
}

?>

<div class="item-image-container">

    <div class="item-bigimage-container <?= $arParams['DETAIL_PICTURE_POPUP'] == 'Y' ? 'light-gallery' : '' ?>">
        <span class="item-bigimage-wrap" data-src="<?= $arFirstPhoto['SRC'] ?>">
            <img class="item-bigimage <?= $arParams['DETAIL_PICTURE_LOOP'] == 'Y' ? 'zoom' : '' ?>"
                 src="<?= $arFirstPhoto['SRC'] ?>"
                 alt="<?= $strAlt ?>"
                 title="<?= $strTitle ?>" itemprop="image" />
        </span>
        <?php //<div class="image-loop"></div> ?>
        <div class="item-image-stick-wrap intec-no-select">
            <?php if ($isRecommendation) { ?>
                <div class="item-image-stick is-recommendation"><?= GetMessage('IS_RECOMMENDATION') ?></div>
            <?php }
            if ($isNew) { ?>
                <div class="item-image-stick is-new"><?= GetMessage('IS_NEW') ?></div>
            <?php }

            if ($isPopular) { ?>
                <div class="item-image-stick is-popular"><?= GetMessage('IS_POPULAR') ?></div>
            <?php } ?>
        </div>
    </div>

    <?php // Slider
    if ($arResult['SHOW_SLIDER']) {
        if (empty($arResult['OFFERS'])) {
            if ($morePhotoList) {
                printMainImageCarousel($morePhotoList);
            }
        } else if (!empty($arParams['PROPERTY_OFFERS_MORE_PHOTO'])) { ?>
            <div class="item-offers-images clearfix">
                <div class="item-default-images">
                    <?php printMainImageCarousel($morePhotoList) ?>
                </div>
            <?php foreach ($arResult['OFFERS'] as $key => $offer) {
                $offerMorePhoto = ArrayHelper::getValue($offer, ['PROPERTIES', $arParams['PROPERTY_OFFERS_MORE_PHOTO'], 'VALUE']);
                if (empty($offerMorePhoto)) {
                    continue;
                }
                $offerPhotos = [];
                if (!empty($offer['DETAIL_PICTURE']['SRC'])) {
                    $offerPhotos[] = array_merge($offer['DETAIL_PICTURE'], [
                        'SRC' => $offer['DETAIL_PICTURE']['SRC']
                    ]);
                }
                foreach ($offerMorePhoto as $fileId) {
                    if (is_numeric($fileId)) {
                        $offerPhotos[] = [
                            'ID' => $fileId,
                            'SRC' => CFile::GetPath($fileId)
                        ];
                    }
                }
                ?>
                <div id="item-offer-<?= $offer['ID'] ?>" class="item-offer-images">
                    <?php printMainImageCarousel($offerPhotos) ?>
                </div>
                <?php
            } ?>
            </div>
            <script type="text/javascript">
                $('#item-offer-<?= $currentOffer['ID'] ?>').show();
            </script>
        <?php
        }
    }
    ?>
</div>
