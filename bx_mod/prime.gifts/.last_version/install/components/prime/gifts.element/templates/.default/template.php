<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<div class="prime-gift-el">
    <?if($arResult['PRICE_FROM']):?>
        <div class="pg-text">
            <?=$arResult['DESCRIPTION']?>
        </div>
    <? else:?>
        <div class="pg-text">
            <?=$arResult['DESCRIPTION_ONE']?>
        </div>
    <? endif; ?>

    <?if($arResult['SRC']):?>
    <div class="pg-img">
        <img src="<?=$arResult['SRC']?>">
    </div>
    <?endif;?>
</div>


