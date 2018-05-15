<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arData
 * @var string $sHeaderDetailDescription
 * @var string $sDetailDescription
 */

if (!$arData['IMAGE']['SHOW']) { ?>
<div class="detail_description_adaptiv">
    <?php } ?>
    <div class="detail_description">
        <div class="service-header-description">
            <div class="service-header-description-caption">
                <?= $sHeaderDetailDescription ?>
            </div>
            <div class="service-header-description-text">
                <?= $sDetailDescription ?>
            </div>
        </div>
    </div>
    <?php if (!$arData['IMAGE']['SHOW']) { ?>
</div>
<?php } ?>
