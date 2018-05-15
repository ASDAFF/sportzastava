<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arData
 * @var array $arResult
 * @var array $arParams
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 * @var string $sHeaderVideo
 * @var array $bVideoValue
 */

?>
<div class="section-video">
    <div class="service-caption" id="video">
        <?= $sHeaderVideo ?>
    </div>
    <div class="service-section">
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:iblock.elements",
            "video.slider.1",
            array(
                "ELEMENTS_ID" => $bVideoValue,
                "USE_DETAIL_PICTURE" => "N",
                "USE_PREVIEW_PICTURE" => "N",
                "SLIDER_ID" => "services-video-slider-".$arResult['ID'],
                "NAME_PROP_URL_VIDEO" => $arParams["NAME_PROP_URL_VIDEO"]
            ),
            $component
        ); ?>
    </div>
</div>
