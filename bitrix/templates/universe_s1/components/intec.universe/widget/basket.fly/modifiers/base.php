<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;

/**
 * @global $APPLICATION
 * @global $USER
 * @var array $arParams
 * @var array $arResult
 */

if (!Loader::includeModule('catalog') || !Loader::includeModule('sale'))
    return;

$arCurrency = COption::GetOptionString('sale', 'default_currency', 'RUB');
$arCurrency = CCurrency::GetByID($arCurrency);

if (empty($arCurrency))
    return;

$arCurrency = [
    'ID' => intval($arCurrency['NUMCODE']),
    'CODE' => $arCurrency['CURRENCY'],
    'ACTIVE' => 'Y',
    'BASE' => $arCurrency['BASE'],
    'RATE' => floatval($arCurrency['AMOUNT']),
    'RATING' => intval($arCurrency['AMOUNT_CNT']),
    'LANG' => [],
    'FORMAT' => []
];

$arProducts = [];
$fProductsSum = 0;
$fProductsDiscountSum = 0;
$arProductsDelayed = [];
$arBasketItems = [];
$rsBasketItems = CSaleBasket::GetList(array(), array(
    'FUSER_ID' => CSaleBasket::GetBasketUserID(),
    'LID' => SITE_ID,
    'ORDER_ID' => 'NULL'
));

while ($arBasketItem = $rsBasketItems->GetNext())
    $arBasketItems[$arBasketItem['PRODUCT_ID']] = $arBasketItem;

unset($arBasketItem);
unset($rsBasketItems);

if (!empty($arBasketItems)) {
    $arIdentifiers = ArrayHelper::getKeys($arBasketItems);
    $arPictures = [];
    $arItems = [];
    $arParentItems = [];
    $rsItems = CIBlockElement::GetList([], [
        'ID' => $arIdentifiers
    ]);

    while ($rsItem = $rsItems->GetNextElement()) {
        $arItem = $rsItem->GetFields();
        $arItem['PROPERTIES'] = $rsItem->GetProperties();

        $iPicturePreview = ArrayHelper::getValue($arItem, 'PREVIEW_PICTURE');
        $iPictureDetail = ArrayHelper::getValue($arItem, 'DETAIL_PICTURE');

        if (!empty($iPicturePreview))
            $arPictures[] = $iPicturePreview;

        if (!empty($iPictureDetail))
            $arPictures[] = $iPictureDetail;

        $arItems[$arItem['ID']] = $arItem;
    }

    unset($arItem);
    unset($rsItem);
    unset($rsItems);

    $rsPictures = CFile::GetList([], [
        '@ID' => implode(',', $arPictures)
    ]);
    $arPictures = [];

    while ($arPicture = $rsPictures->GetNext()) {
        $arPicture['SRC'] = CFile::GetFileSRC($arPicture);
        $arPictures[$arPicture['ID']] = $arPicture;
    }

    $arCatalogItems = [];
    $rsCatalogItems = CCatalogProduct::GetList([], [
        'ID' => $arIdentifiers
    ]);

    while ($arCatalogItem = $rsCatalogItems->GetNext())
        $arCatalogItems[$arCatalogItem['ID']] = $arCatalogItem;

    unset($arCatalogItem);
    unset($rsCatalogItems);

    $arMeasures = [];
    $rsMeasures = CCatalogMeasureRatio::getList([], [
        'PRODUCT_ID' => $arIdentifiers
    ]);

    while ($arMeasure = $rsMeasures->GetNext())
        $arMeasures[$arMeasure['PRODUCT_ID']] = $arMeasure;

    unset($arMeasure);
    unset($rsMeasures);

    foreach ($arBasketItems as $iId => $arBasketItem) {
        if ($arBasketItem['CAN_BUY'] !== 'Y')
            continue;

        $arItem = ArrayHelper::getValue($arItems, $iId);
        $arCatalogItem = ArrayHelper::getValue($arCatalogItems, $iId);
        $arMeasure = ArrayHelper::getValue($arMeasures, $iId);

        if (empty($arItem) || empty($arCatalogItem))
            continue;

        $arPicturePreview = ArrayHelper::getValue($arItem, 'PREVIEW_PICTURE');
        $arPictureDetail = ArrayHelper::getValue($arItem, 'DETAIL_PICTURE');

        if (!empty($arPicturePreview))
            $arPicturePreview = ArrayHelper::getValue($arPictures, $arPicturePreview);

        if (!empty($arPictureDetail))
            $arPictureDetail = ArrayHelper::getValue($arPictures, $arPictureDetail);

        if (empty($arPicturePreview) && empty($arPictureDetail)) {
            $arParentItem = CCatalogSku::GetProductInfo($iId, $arItem['IBLOCK_ID']);

            if (!empty($arParentItem)) {
                $iParentItemId = ArrayHelper::getValue($arParentItem, 'ID');
                $arParentItem = ArrayHelper::getValue($arParentItems, $iParentItemId);

                if (empty($arParentItem)) {
                    $arParentItem = CIBlockElement::GetList(array(), array(
                        'ID' => $iParentItemId
                    ))->GetNext();

                    if (!empty($arParentItem))
                        $arParentItems[$iParentItemId] = $arParentItem;
                }

                $arPicturePreview = ArrayHelper::getValue($arItem, 'PREVIEW_PICTURE');
                $arPictureDetail = ArrayHelper::getValue($arItem, 'DETAIL_PICTURE');

                if (!empty($arPicturePreview))
                    $arPicturePreview = CFile::GetFileArray($arPicturePreview);

                if (!empty($arPictureDetail))
                    $arPictureDetail = CFile::GetFileArray($arPictureDetail);
            }
        }

        $arProduct = [];
        $arProduct['ID'] = $iId;
        $arProduct['NAME'] = $arItem['NAME'];
        $arProduct['URL'] = $arItem['DETAIL_PAGE_URL'];
        $arProduct['DELAY'] = $arBasketItem['DELAY'] === 'Y';
        $arProduct['PICTURE'] = null;
        $arProduct['PROPERTIES'] = $arItem['PROPERTIES'];
        $arProduct['MEASURE'] = [
            'RATIO' => !empty($arMeasure) ? floatval($arMeasure['RATIO']) : 1
        ];

        if (!empty($arPicturePreview)) {
            $arProduct['PICTURE'] = $arPicturePreview;
        } else if (!empty($arPictureDetail)) {
            $arProduct['PICTURE'] = $arPictureDetail;
        }

        $arPrice = [
            'CURRENCY' => $arBasketItem['CURRENCY'],
            'VALUE' => floatval($arBasketItem['PRICE']),
            'DISCOUNT_VALUE' => floatval($arBasketItem['DISCOUNT_PRICE']),
            'TYPE' => $arBasketItem['PRICE_TYPE_ID']
        ];



        $arProduct['QUANTITY'] = [
            'USE' => $arCatalogItem['CAN_BUY_ZERO'] !== 'Y',
            'TOTAL' => $arCatalogItem['QUANTITY'],
            'VALUE' => $arBasketItem['QUANTITY']
        ];

        $arPrice['DISCOUNT_VALUE'] = getSalePrice(
            $iId,
            $arPrice['TYPE'],
            $arPrice['VALUE'],
            $arProduct['QUANTITY']['VALUE'],
            $arCurrency['CODE']
        );
        $arPrice['VALUE'] = CCurrencyRates::ConvertCurrency($arPrice['VALUE'], $arPrice['CURRENCY'], $arCurrency['CODE']);
        $arPrice['DISCOUNT_VALUE'] = CCurrencyRates::ConvertCurrency($arPrice['DISCOUNT_VALUE'], $arPrice['CURRENCY'], $arCurrency['CODE']);
        $arPrice['PRINT_VALUE'] = CCurrencyLang::CurrencyFormat($arPrice['VALUE'], $arCurrency['CODE'], true);
        $arPrice['PRINT_DISCOUNT_VALUE'] = CCurrencyLang::CurrencyFormat($arPrice['DISCOUNT_VALUE'], $arCurrency['CODE'], true);
        $arPrice['CURRENCY'] = $arCurrency['CODE'];

        $arProduct['PRICE'] = $arPrice;

        if ($arProduct['DELAY']) {
            $arProductsDelayed[$arProduct['ID']] = $arProduct;
        } else {
            $arProducts[$arProduct['ID']] = $arProduct;
            $fProductsSum += $arProduct['PRICE']['VALUE'] * $arProduct['QUANTITY']['VALUE'];
            $fProductsDiscountSum += $arProduct['PRICE']['DISCOUNT_VALUE'] * $arProduct['QUANTITY']['VALUE'];
        }
    }
}

$arResult['CURRENCY'] = $arCurrency;
$arResult['BASKET_ITEMS'] = $arProducts;
$arResult['BASKET_COUNT'] = count($arProducts);
$arResult['DELAYED_ITEMS'] = $arProductsDelayed;
$arResult['DELAYED_COUNT'] = count($arProductsDelayed);
$arResult['BASKET_SUM'] = [
    'VALUE' => $fProductsSum,
    'PRINT_VALUE' => CCurrencyLang::CurrencyFormat($fProductsSum, $arCurrency['CODE'], true)
];
$arResult['DISCOUNT_BASKET_SUM'] = [
    'VALUE' => $fProductsDiscountSum,
    'PRINT_VALUE' => CCurrencyLang::CurrencyFormat($fProductsDiscountSum, $arCurrency['CODE'], true)
];