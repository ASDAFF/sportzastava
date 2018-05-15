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
$this->setFrameMode(true);
?>
<div class="icon-elements">
    <?php foreach($arResult['ITEMS'] as $arItem) { ?>
        <div class="element">
            <div class="element-wrapper">
                <div class="element-img">
                    <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>">
                    <div class="intec-aligner"></div>
                </div>
                <div class="element-text">
                    <span class="text-aligner">
                        <?= $arItem['NAME'] ?>
                    </span>
                </div>
            </div>
        </div>
    <?php } ?>
</div>