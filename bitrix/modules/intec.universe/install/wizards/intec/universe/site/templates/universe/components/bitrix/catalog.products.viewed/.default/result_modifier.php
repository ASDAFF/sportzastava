<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

/**
 * @var array $arParams
 * @var array $arResult
 */

foreach ($arResult['ITEMS'] as &$arItem) {
    $arPrice = null;

    foreach ($arItem['ITEM_PRICES'] as $arPriceData) {
        if (empty($arPrice) || $arPrice['PRICE'] > $arPriceData['PRICE'])
            $arPrice = $arPriceData;
    }

    foreach ($arItem['OFFERS'] as $arOffer) {
        $arOfferPrice = null;

        foreach ($arOffer['ITEM_PRICES'] as $arOfferPriceData) {
            if (empty($arOfferPrice) || $arOfferPrice['PRICE'] > $arOfferPriceData['PRICE'])
                $arOfferPrice = $arOfferPriceData;
        }

        if (empty($arOfferPrice))
            continue;

        if (empty($arPrice) || $arPrice['PRICE'] > $arOfferPrice['PRICE'])
            $arPrice = $arOfferPrice;
    }

    $arItem['PRICE'] = $arPrice;
}