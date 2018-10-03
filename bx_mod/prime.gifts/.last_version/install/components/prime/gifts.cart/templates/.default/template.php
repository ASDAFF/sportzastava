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



    <? if($arResult['ITEM']): ?>
    <div class="prime-gifts-main">

        <div class="prime-gifts-h1"><?=(strlen($arResult['GIFT_TEXT']) > 1) ? $arResult['GIFT_TEXT'] : $arParams['PRIME_YOUR_GIFT_TEXT']?><?=CurrencyFormat($arResult['SUM_FROM'],'RUB')?></div>

        <ul class="prime-gifts-list">

            <? foreach($arResult['ITEM'] as $key => $item): ?>
            <li>
                <input type="radio" onclick="SetGifts('<?=$item['NAME']?>','<?=$arResult['USER_ID']?>','<?=$arResult['SITE_ID']?>')" id="r-<?=$key?>" name="r" />
                <label for="r-<?=$key?>" class="gifts-item">
                    <div class="gifts-image">
                        <img src="<?=$item['SRC']?>">
                    </div>
                    <div class="gifts-text">
                        <?=$item['NAME']?>
                    </div>
                </label>
            </li>
            <? endforeach;?>
        </ul>

    </div>
    <?endif;?>

    <? if($arResult['ITEM_MAX']): ?>
    <div class="prime-gifts-main disabled">

        <div class="prime-gifts-h1"><?=(strlen($arResult['GIFT_TEXT_MORE']) > 1) ? $arResult['GIFT_TEXT_MORE'] : $arParams['PRIME_YOUR_GIFT_TEXT_MORE']?><?=CurrencyFormat($arResult['SUM_ADD'],'RUB')?><?=(strlen($arResult['GIFT_TEXT_MORE_FROM']) > 1) ? $arResult['GIFT_TEXT_MORE_FROM'] : $arParams['PRIME_YOUR_GIFT_TEXT_MORE_FROM']?><?=CurrencyFormat($arResult['SUM_TO'],'RUB')?></div>

        <ul class="prime-gifts-list">

            <? foreach($arResult['ITEM_MAX'] as $key => $item): ?>
                <li>
                    <label class="gifts-item">
                        <div class="gifts-image">
                            <img src="<?=$item['SRC']?>">
                        </div>
                        <div class="gifts-text">
                            <?=$item['NAME']?>
                        </div>
                    </label>
                </li>
            <? endforeach;?>

        </ul>

    </div>
    <?endif;?>


