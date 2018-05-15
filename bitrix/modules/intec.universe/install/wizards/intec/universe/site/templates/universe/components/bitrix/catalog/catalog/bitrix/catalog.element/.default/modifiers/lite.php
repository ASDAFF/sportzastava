<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Iblock;
use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;

/**
 * @var CBitrixComponentTemplate $this
 * @var array $arParams
 * @var array $arResult
 */

if (!Loader::includeModule('intec.startshop'))
    return;


$arResult['DISPLAY_DELAY'] = false;
$arResult['FAST_ORDER_COMPONENT'] = 'intec.universe:oneclickbuy';
$arResult['CURRENT_OFFER'] = [];
$arResult['SKU_PROPS'] = [];
$arResult['OFFERS'] = [];
$arResult['JS_OFFERS'] = [];
$currentOffer = [];

$arProducts = array();
if (!empty($arResult['ID'])) {
    $arProduct = CStartShopCatalogProduct::GetByID(
        $arResult['ID'],
        array(),
        array(),
        ($arParams['USE_COMMON_CURRENCY'] == "Y" && !empty($arParams['CURRENCY']) ? $arParams['CURRENCY'] : false),
        $arParams['PRICE_CODE']
    )->Fetch();

    if (!empty($arProduct)) {
        $arResult['STARTSHOP'] = $arProduct;
    }
}

/** Hide quantity if no quantitative accounting */
$bElementQuantityUse = ArrayHelper::getValue($arResult, ['STARTSHOP', 'STARTSHOP', 'QUANTITY', 'USE']);
if (!$bElementQuantityUse) {
    $arParams['SHOW_MAX_QUANTITY'] = 'N';
}

$startshopMinPrice = ArrayHelper::getValue($arResult, ['STARTSHOP', 'STARTSHOP', 'PRICES', 'MINIMAL']);
$minPrice = array_merge($startshopMinPrice, [
    'DISCOUNT_VALUE' => ArrayHelper::getValue($startshopMinPrice, ['VALUE']),
    'PRINT_DISCOUNT_VALUE' => ArrayHelper::getValue($startshopMinPrice, ['PRINT_VALUE']),
    'DISCOUNT_DIFF' => 0,
    'DISCOUNT_DIFF_PERCENT' => 0
]);
unset($startshopMinPrice);

$Offers = ArrayHelper::getValue($arResult, ['STARTSHOP', 'STARTSHOP', 'OFFERS']);
$OffersFlg = !empty($Offers);

/** Available prices */
$bShowAllPrices = ArrayHelper::getValue($arParams, 'SHOW_ALL_SELECTED_PRICES') == 'Y';

$arPrices = [];

if ($bShowAllPrices) {
    $arPricesSelected = ArrayHelper::getValue($arParams, 'PRICE_CODE');
    $sPriceCurrentActive = ArrayHelper::getValue($arResult, ['STARTSHOP', 'STARTSHOP', 'PRICES', 'MINIMAL', 'TYPE']);

    /** Building prices array */
    if (!empty($arPricesSelected)) {
        $rsPricesList = CStartShopPrice::GetList([], ['CODE' => $arPricesSelected, 'ACTIVE' => 'Y']);

        while ($arPricesList = $rsPricesList->GetNext(true, false)) {
            $arPrices[] = $arPricesList;
        }
        unset($arPricesList, $rsPricesList);
    }

    if (!empty($arPricesSelected) && !$OffersFlg) {
        /** Exclude displayed price */
        foreach ($arPrices as $priceKey => $arPrice) {
            if ($arPrice['CODE'] == $sPriceCurrentActive) {
                unset($arPrices[$priceKey]);
            }
        }
        unset($arPrice, $priceKey);

        /** Combine element price data with price name of not displayed price types */
        $arPricesAdditional = [];
        $arPricesListReturned = ArrayHelper::getValue($arResult, ['STARTSHOP', 'STARTSHOP', 'PRICES', 'LIST']);

        if (!empty($arPrices)) {
            foreach ($arPrices as $priceKey => $arPrice) {
                foreach ($arPricesListReturned as $arPriceReturned) {
                    if ($arPrice['CODE'] == $arPriceReturned['TYPE'] && !empty($arPriceReturned['VALUE'])) {
                        $arPriceReturned['NAME'] = ArrayHelper::getValue($arPrice, ['LANG', LANGUAGE_ID, 'NAME']);
                        $arPricesAdditional[$arPrice['CODE']] = $arPriceReturned;
                    }
                }
            }
        }
        unset($arPricesListReturned, $priceKey, $arPrice, $arPriceReturned);

        $arResult['STARTSHOP']['STARTSHOP']['PRICES']['PRICES_TO_DISPLAY'] = $arPricesAdditional;
    }
}

/** Offers */
if ($OffersFlg) {
    $minPriceValue = null;
    $SKUProps = [];

    foreach ($Offers as $key => $arOffer) {
        /** Available prices for offers */
        if ($bShowAllPrices && !empty($arPricesSelected)) {
            $sPriceCurrentActive = ArrayHelper::getValue($arOffer, ['STARTSHOP', 'PRICES', 'MINIMAL', 'TYPE']);

            /** Exclude displayed price */
            foreach ($arPrices as $priceKey => $arPrice) {
                if ($arPrice['CODE'] == $sPriceCurrentActive) {
                    unset($arPrices[$priceKey]);
                }
            }
            unset($arPrice, $priceKey);

            /** Combine offer element price data with price name of not displayed price types */
            $arPricesAdditional = [];
            $arPricesListReturned = ArrayHelper::getValue($arOffer, ['STARTSHOP', 'PRICES', 'LIST']);

            if (!empty($arPrices)) {
                foreach ($arPrices as $priceKey => $arPrice) {
                    foreach ($arPricesListReturned as $arPriceReturned) {
                        if ($arPrice['CODE'] == $arPriceReturned['TYPE'] && !empty($arPriceReturned['VALUE'])) {
                            $arPricesAdditional[$arPrice['CODE']] = $arPriceReturned;
                            $arPricesAdditional[$arPrice['CODE']]['NAME'] = $arPrice['LANG'][LANGUAGE_ID]['NAME'];
                        }
                    }
                }
            }
            unset($arPricesListReturned, $priceKey, $arPrice, $arPriceReturned);

            $arResult['STARTSHOP']['STARTSHOP']['OFFERS'][$key]['STARTSHOP']['PRICES']['PRICES_TO_DISPLAY'] = $arPricesAdditional;
        }

        /** SKU List */
        $offerProps = [];
        $OfferSKUProperties = ArrayHelper::getValue($arOffer, ['STARTSHOP', 'OFFER', 'PROPERTIES']);
        foreach ($OfferSKUProperties as $keySKU => $arSKU) {
            $prop = ArrayHelper::getValue($arResult, ['STARTSHOP', 'STARTSHOP', 'OFFER', 'PROPERTIES', $keySKU]);
            $arSKU['XML_ID'] = $propCode = ArrayHelper::getValue($arSKU, ['VALUE', 'CODE']);
            $arSKU['VALUE_ENUM_ID'] = ArrayHelper::getValue($arSKU, ['VALUE', 'VALUE_XML_ID']);
            $arSKU['NAME'] = ArrayHelper::getValue($arSKU, ['VALUE', 'TEXT']);
            $arSKU['PICT'] = [
                'SRC' => ArrayHelper::getValue($arSKU, ['VALUE', 'PICTURE'])
            ];
            $offerProps[$keySKU] = [
                'CODE' => $prop['CODE'],
                'NAME' => $prop['NAME'],
                'TYPE' => $prop['TYPE'],
                'SHOW_MODE' => $prop['TYPE'],
                'VALUES' => [
                    $propCode => $arSKU
                ]
            ];

            if (ArrayHelper::keyExists($keySKU, $SKUProps)) {
                $SKUProps[$keySKU]['VALUES'] += [
                    $propCode => $arSKU
                ];
            } else {
                $SKUProps[$keySKU] = $offerProps[$keySKU];
            }
        }

        $offerProperties = ArrayHelper::getValue($arOffer, 'PROPERTIES', []);
        foreach ($offerProperties as $propertyKey => $property) {
            $arOffer['PROPERTIES'][$propertyKey]['VALUE_ENUM_ID'] = ArrayHelper::getValue($property, 'VALUE_XML_ID');
        }

        /** Detail & preview picture */
        $standardPics = array(
            'DETAIL_PICTURE' => $arOffer['DETAIL_PICTURE'],
            'PREVIEW_PICTURE' => $arOffer['PREVIEW_PICTURE']
        );

        if (!empty($standardPics['DETAIL_PICTURE'])) {
            $standardPics['DETAIL_PICTURE'] = CFile::GetPath($standardPics['DETAIL_PICTURE']);
        } else {
            $standardPics['DETAIL_PICTURE'] = $arResult['DETAIL_PICTURE']['SRC'];
        }

        if (!empty($standardPics['PREVIEW_PICTURE'])) {
            $standardPics['PREVIEW_PICTURE'] = CFile::GetPath($standardPics['PREVIEW_PICTURE']);
        } else {
            $standardPics['PREVIEW_PICTURE'] = $arResult['PREVIEW_PICTURE']['SRC'];
        }

        $arResult['STARTSHOP']['STARTSHOP']['OFFERS'][$key]['DETAIL_PICTURE'] = array(
            'ID' => $arOffer['DETAIL_PICTURE'],
            'SRC' => $standardPics['DETAIL_PICTURE']
        );
        $arOffer['DETAIL_PICTURE'] = $arResult['STARTSHOP']['STARTSHOP']['OFFERS'][$key]['DETAIL_PICTURE'];

        $arResult['STARTSHOP']['STARTSHOP']['OFFERS'][$key]['PREVIEW_PICTURE'] = array(
            'ID' => $arOffer['PREVIEW_PICTURE'],
            'SRC' => $standardPics['PREVIEW_PICTURE']
        );
        $arOffer['PREVIEW_PICTURE'] = $arResult['STARTSHOP']['STARTSHOP']['OFFERS'][$key]['PREVIEW_PICTURE'];

        /** Offers more photo */
        $arOfferPic = array();
        $arOfferPicIDs = ArrayHelper::getValue($arOffer, ['PROPERTIES', $arParams['PROPERTY_OFFERS_MORE_PHOTO'], 'VALUE']);
        if (!empty($arOfferPicIDs)) {
            $pictureOfferIDsString = implode(', ', $arOfferPicIDs);
            $arFilter = array(
                '@ID' => $pictureOfferIDsString
            );

            $rsOfferPictures = CFile::GetList(array(), $arFilter);

            while ($arOfferPictures = $rsOfferPictures->GetNext()) {
                $arOfferPictures['SRC'] = CFile::GetPath($arOfferPictures['ID']);
                $arOfferPic[] = $arOfferPictures;
            }

            foreach ($arOfferPic as $pic) {
                foreach ($arOfferPicIDs as $keyPic => $ID) {
                    if ($pic['ID'] == $ID) {
                        $arOfferPicIDs[$keyPic] = $pic;
                    }
                }
            }
            $arResult['STARTSHOP']['STARTSHOP']['OFFERS'][$key]['PROPERTIES'][$arParams['PROPERTY_OFFERS_MORE_PHOTO']]['VALUE'] = $arOfferPicIDs;
        }

        /** Prices */
        $offerPrice = ArrayHelper::getValue($arOffer, ['STARTSHOP', 'PRICES', 'MINIMAL']);
        $offerPrice['DISCOUNT_VALUE'] = $offerPrice['PRINT_VALUE'];
        $offerPrice['PRINT_DISCOUNT_VALUE'] = $offerPrice['PRINT_VALUE'];
        $offerPrice['DISCOUNT_DIFF'] = 0;
        $offerPrice['DISCOUNT_DIFF_PERCENT'] = 0;
        $arOffer['PRICE'] = $offerPrice;

        /** Offer */
        $arOffer['MAX_QUANTITY'] = $arOffer['CATALOG_QUANTITY'] = ArrayHelper::getValue($arOffer, ['STARTSHOP', 'QUANTITY', 'VALUE']);
        $arOffer['CATALOG_MEASURE_RATIO'] = ArrayHelper::getValue($arOffer, ['STARTSHOP', 'QUANTITY', 'RATIO']);
        $arOffer['MEASURE'] = '';

        /** Current Offer */
        if ($key == 0 || $offerPrice['VALUE'] < $minPriceValue) {
            $minPrice = $offerPrice;
            $minPriceValue = ArrayHelper::getValue($offerPrice, 'VALUE');
            $currentOffer = $arOffer;
        }

        $arOffer['CAN_BUY'] = ArrayHelper::getValue($arOffer, ['STARTSHOP', 'AVAILABLE']);
        $bQuantityUse = ArrayHelper::getValue($arOffer, ['STARTSHOP', 'QUANTITY', 'USE'], false);
        $arOffer['CAN_BUY_ZERO'] = !$bQuantityUse;

        $arResult['OFFERS'][$arOffer['ID']] = $arOffer;
    }

    $arResult['SKU_PROPS'] = $SKUProps;

    if ($currentOffer) {
        $arResult['CURRENT_OFFER'] = $currentOffer;

        $startShopCurrentOfferPrices = ArrayHelper::getValue($currentOffer, ['STARTSHOP', 'PRICES', 'LIST']);
        $additionalPrices = [];
        foreach ($startShopCurrentOfferPrices as $type => $price) {
            if ($type != $minPrice['TYPE']) {
                $price['DISCOUNT_VALUE'] = ArrayHelper::getValue($price, 'VALUE');
                $price['PRINT_DISCOUNT_VALUE'] = ArrayHelper::getValue($price, 'PRINT_VALUE');
                $price['DISCOUNT_DIFF'] = 0;
                $price['DISCOUNT_DIFF_PERCENT'] = 0;
                $additionalPrices[$type] = $price;
            }
        }
        $arResult['ADDITIONAL_PRICES_TO_DISPLAY'] = $additionalPrices;
        unset($startShopCurrentOfferPrices, $additionalPrices);
    }
}

/*$arJSParams = array(
    'CONFIG' => array(
        'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
        'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] == 'Y',
        'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] == 'Y',
        'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'] == 'Y',
        'SHOW_SKU_PROPS' => $arResult['SHOW_OFFERS_PROPS'],
        'OFFER_GROUP' => $arResult['OFFER_GROUP'],
        'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE']
    ),
    'PRODUCT_TYPE' => $arResult['CATALOG_TYPE'],
    'VISUAL' => array(
        'ID' => $arItemIDs['ID'],
        'CURRENT_PATH' => $this->GetFolder(),
        'ONE_CLICK_BUY' => $arItemIDs['ONE_CLICK_BUY'],
    ),
    'DEFAULT_PICTURE' => array(
        'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
        'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
    ),
    'PRODUCT' => array(
        'ID' => $arResult['ID'],
        'NAME' => $arResult['~NAME']
    ),
    'BASKET' => array(
        'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
        'BASKET_URL' => $arParams['BASKET_URL'],
        'SKU_PROPS' => $arResult['OFFERS_PROP_CODES']
    ),
    'OFFERS' => $arResult['STARTSHOP']['STARTSHOP']['OFFERS'],
    'OFFER_SELECTED' => $arResult['CURRENT_OFFER'],
    'PROPERTIES' => $arResult['STARTSHOP']['STARTSHOP']['OFFER']['PROPERTIES']
);*/

if (!empty($minPrice)) {
    $arResult['MIN_PRICE'] = $minPrice;
}

$arResult['OFFERS_SELECTED'] = ArrayHelper::getValue($arResult, ['CURRENT_OFFER', 'ID']);

$arResult['JS_OFFERS'] = $arResult['OFFERS'];

foreach ($arResult['SKU_PROPS'] as $propKey => &$prop) {
    $prop['VALUES_COUNT'] = count($prop['VALUES']);
    sort($prop['VALUES']);
}

$bCanBuyZero = ArrayHelper::getValue($arResult, ['STARTSHOP', 'STARTSHOP', 'QUANTITY', 'USE']);
$arResult['CAN_BUY_ZERO'] = !$bCanBuyZero;
$arResult['CAN_BUY'] = ArrayHelper::getValue($arResult, ['STARTSHOP', 'STARTSHOP', 'AVAILABLE']);
$arResult['CATALOG_QUANTITY'] = ArrayHelper::getValue($arResult, ['STARTSHOP', 'STARTSHOP', 'QUANTITY', 'VALUE']);
$arResult['CATALOG_MEASURE_RATIO'] = ArrayHelper::getValue($arResult, ['STARTSHOP', 'STARTSHOP', 'QUANTITY', 'RATIO']);
$arResult['MEASURE'] = '';