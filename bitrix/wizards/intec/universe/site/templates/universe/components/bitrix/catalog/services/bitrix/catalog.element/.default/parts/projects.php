<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arData
 * @var array $arResult
 * @var array $arParams
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 * @var string $sHeaderProjects
 * @var array $bProjectsValue
 */

?>
<div class="section-projects">
    <div class="service-caption" id="projects">
        <?= $sHeaderProjects ?>
    </div>
    <div class="service-section">
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:iblock.elements",
            "tiles.projects",
            array(
                "ELEMENTS_ID" => $bProjectsValue,
                "LINK_TO_ELEMENTS" => $arParams["PROJECTS_SECTION_URL"],
            ),
            $component
        ); ?>
    </div>
</div>
