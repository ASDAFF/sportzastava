<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arData
 * @var array $arResult
 * @var array $arParams
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 * @var string $sHeaderReviews
 * @var array $bReviewsValue
 */

?>
<div class="block-review">
    <div class="service-caption" id="reviews">
        <?= $sHeaderReviews ?>
    </div>
    <div class="service-section">
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:iblock.elements",
            "reviews.landing.1",
            array(
                "ELEMENTS_ID" => $bReviewsValue,
                "USE_LINK_TO_ELEMENTS" => "Y",
                "LINK_TO_ELEMENTS" => $arParams['REVIEWS_SECTION_URL'],
                "NAME_PROP_AUTOR_REVIEW" => $arParams["NAME_PROP_AUTOR_REVIEW"],
                "NAME_PROP_COMPANY_REVIEW" => $arParams["NAME_PROP_COMPANY_REVIEW"]
            ),
            $component
        ); ?>
    </div>
</div>