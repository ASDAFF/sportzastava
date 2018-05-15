<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * @var array $arData
 * @var string $sHeaderGallery
 * @var array $bGalleryValue
 */

?>
<div class="gallery-section">
    <div class="service-caption">
        <?= $sHeaderGallery ?>
    </div>
    <div class="owl-carousel owl-theme owl-carusel-gallery light-gallery">
        <?php foreach ($bGalleryValue as $arElement) {
            $gall_picture = CFile::GetPath($arElement);
            $sPictureStyle = 'background-image: url('.$gall_picture.');';
        ?>
            <div class="item" data-src="<?= $gall_picture ?>">
                <a class="picturelist-slider-image" href="<?= $gall_picture ?>" style="<?= $sPictureStyle ?>">
                    <img src="<?= $gall_picture ?>" style="display: none;"/>
                </a>
            </div>
        <?php } ?>
    </div>
    <script>
        $(document).ready(function() {
            $(".light-gallery").lightGallery({
                selector: '.item'
            });
            var owl = $('.owl-carusel-gallery');
            owl.owlCarousel({
                loop: false,
                margin: 0,
                navRewind: false,
                nav: true,
                navText: ["<i class=\"fa fa-chevron-left\"></i>", "<i class=\"fa fa-chevron-right\"></i>"],
                responsive: {
                    0: {items: 2},
                    600: {items: 3},
                    1000: {items: 4}
                }
            })
        })
    </script>
</div>