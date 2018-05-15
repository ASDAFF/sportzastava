<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arData
 * @var array $arResult
 * @var array $arParams
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 * @var string $sHeaderServices
 * @var array $bServicesValue
 */

?>
<div class="service-caption" id="services">
    <?= $sHeaderServices ?>
</div>
<div class="service-section">
    <?php $APPLICATION->IncludeComponent(
        "intec.universe:iblock.elements",
        "tiles.landing.3",
        array(
            "ELEMENTS_ID" => $bServicesValue,
            "LINK_TO_ELEMENTS" => "",
            "NAME_PROP_PRICE" => $arParams["NAME_PROP_PRICE"]
        ),
        $component
    ); ?>
</div>
