<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;

/**
 * @global $APPLICATION
 * @global $USER
 * @var array $arParams
 * @var array $arResult
 */

$arResult['SHOW_BLOCK']['DELAYED'] = false;
$arCurrency = CStartShopCurrency::GetByCode($arParams['CURRENCY'])->Fetch();

if (empty($arCurrency))
    $arCurrency = CStartShopCurrency::GetBase()->Fetch();

if (empty($arCurrency))
    return;

$arProducts = [];
$arPictures = [];
$arItems = [];
$rsItems = CStartShopBasket::GetList(
    array('NAME' => 'ASC'),
    array(),
    array(),
    array(),
    $arCurrency['CODE'],
    SITE_ID
);

while ($arItem = $rsItems->GetNext()) {
    $iPicturePreview = ArrayHelper::getValue($arItem, 'PREVIEW_PICTURE');
    $iPictureDetail = ArrayHelper::getValue($arItem, 'DETAIL_PICTURE');

    if (!empty($iPicturePreview))
        $arPictures[] = $iPicturePreview;

    if (!empty($iPictureDetail))
        $arPictures[] = $iPictureDetail;

    $arItems[] = $arItem;
}

unset($rsItems);

$rsPictures = CFile::GetList([], [
    '@ID' => implode(',', $arPictures)
]);
$arPictures = [];

while ($arPicture = $rsPictures->GetNext()) {
    $arPicture['SRC'] = CFile::GetFileSRC($arPicture);
    $arPictures[$arPicture['ID']] = $arPicture;
}

unset($rsPictures);

foreach ($arItems as $arItem) {
    $fQuantity = CStartShopBasket::GetQuantity($arItem['ID']);
    $arPrice = CStartShopBasket::GetItemPriceType($arItem['ID']);
    $arPrice = ArrayHelper::getValue($arItem, ['STARTSHOP', 'PRICES', 'LIST', $arPrice]);

    if (empty($arPrice))
        continue;

    $arPrice['DISCOUNT_VALUE'] = $arPrice['VALUE'];
    $arPrice['PRINT_DISCOUNT_VALUE'] = $arPrice['PRINT_VALUE'];

    $arPicturePreview = ArrayHelper::getValue($arItem, 'PREVIEW_PICTURE');
    $arPictureDetail = ArrayHelper::getValue($arItem, 'DETAIL_PICTURE');

    if (!empty($arPicturePreview))
        $arPicturePreview = ArrayHelper::getValue($arPictures, $arPicturePreview);

    if (!empty($arPictureDetail))
        $arPictureDetail = ArrayHelper::getValue($arPictures, $arPictureDetail);

    $arProduct = [];
    $arProduct['ID'] = $arItem['ID'];
    $arProduct['NAME'] = $arItem['NAME'];
    $arProduct['URL'] = $arItem['DETAIL_PAGE_URL'];
    $arProduct['DELAY'] = false;
    $arProduct['PICTURE'] = null;
    $arProduct['PROPERTIES'] = $arItem['PROPERTIES'];
    $arProduct['MEASURE'] = [
        'RATIO' => $arItem['STARTSHOP']['QUANTITY']['RATIO']
    ];

    if (!empty($arPicturePreview)) {
        $arProduct['PICTURE'] = $arPicturePreview;
    } else if (!empty($arPictureDetail)) {
        $arProduct['PICTURE'] = $arPictureDetail;
    }

    $arProduct['PRICE'] = $arPrice;
    $arProduct['QUANTITY'] = [
        'USE' => $arItem['STARTSHOP']['QUANTITY']['USE'],
        'TOTAL' => $arItem['STARTSHOP']['QUANTITY']['VALUE'],
        'VALUE' => $fQuantity
    ];

    $arProducts[$arProduct['ID']] = $arProduct;
}

$arResult['CURRENCY'] = $arCurrency;
$arResult['BASKET_ITEMS'] = $arProducts;
$arResult['BASKET_COUNT'] = CStartShopBasket::GetItemsCount(SITE_ID);
$arResult['DELAYED_ITEMS'] = [];
$arResult['DELAYED_COUNT'] = 0;
$arResult['BASKET_SUM'] = CStartShopBasket::GetItemsAmount(SITE_ID, $arCurrency['CODE']);
$arResult['DISCOUNT_BASKET_SUM'] = $arResult['BASKET_SUM'];