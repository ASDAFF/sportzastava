<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/** @var array $photoList */
?>
<div class="slider-container">
    <div class="slider">
        <ul class="owl-carousel">
            <?php foreach ($photoList as $image) { ?>
                <li class="slider-item">
                    <span class="slider-image"
                          data-src="<?= $image['SRC'] ?>"
                          style="background-image: url('<?= $image['SRC'] ?>');"></span>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="slide-left"></div>
    <div class="slide-right"></div>
</div>