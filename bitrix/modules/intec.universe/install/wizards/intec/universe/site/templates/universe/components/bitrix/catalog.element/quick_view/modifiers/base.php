<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Type\Collection;
use Bitrix\Currency\CurrencyTable;
use Bitrix\Iblock;
use Bitrix\Main\Loader;
use Bitrix\Main\Context;
use Bitrix\Sale\Basket;
use Bitrix\Sale\Fuser;
use intec\core\helpers\ArrayHelper;
use \Bitrix\Main\Localization\Loc;

/**
 * @var CBitrixComponentTemplate $this
 * @var array $arParams
 * @var array $arResult
 */

if (!Loader::includeModule('catalog') || !Loader::includeModule('sale'))
    return;


$arResult['FAST_ORDER_COMPONENT'] = 'intec.universe:sale.order.fast';


$oBasket = Basket::loadItemsForFUser(
    Fuser::getId(),
    Context::getCurrent()->getSite()
);

$displayPreviewTextMode = array(
    'H' => true,
    'E' => true,
    'S' => true
);
$detailPictMode = array(
    'IMG' => true,
    'POPUP' => true,
    'MAGNIFIER' => true,
    'GALLERY' => true
);

$arDefaultParams = array(
    'ADD_PICT_PROP' => '-',
    'LABEL_PROP' => '-',
    'OFFER_ADD_PICT_PROP' => '-',
    'OFFER_TREE_PROPS' => array('-'),
    'DISPLAY_NAME' => 'Y',
    'DETAIL_PICTURE_MODE' => 'IMG',
    'ADD_DETAIL_TO_SLIDER' => 'N',
    'DISPLAY_PREVIEW_TEXT_MODE' => 'E',
    'PRODUCT_SUBSCRIPTION' => 'N',
    'SHOW_DISCOUNT_PERCENT' => 'N',
    'SHOW_OLD_PRICE' => 'N',
    'SHOW_MAX_QUANTITY' => 'N',
    'SHOW_BASIS_PRICE' => 'N',
    'ADD_TO_BASKET_ACTION' => array('BUY'),
    'SHOW_CLOSE_POPUP' => 'N',
    'MESS_BTN_BUY' => '',
    'MESS_BTN_ADD_TO_BASKET' => '',
    'MESS_BTN_SUBSCRIBE' => '',
    'MESS_BTN_COMPARE' => '',
    'MESS_NOT_AVAILABLE' => '',
    'USE_VOTE_RATING' => 'N',
    'VOTE_DISPLAY_AS_RATING' => 'rating',
    'USE_COMMENTS' => 'N',
    'BLOG_USE' => 'N',
    'BLOG_URL' => 'catalog_comments',
    'BLOG_EMAIL_NOTIFY' => 'N',
    'VK_USE' => 'N',
    'VK_API_ID' => '',
    'FB_USE' => 'N',
    'FB_APP_ID' => '',
    'BRAND_USE' => 'N',
    'BRAND_PROP_CODE' => ''
);
$arParams = array_merge($arDefaultParams, $arParams);

$oBasketItem = $oBasket->getExistsItem('catalog', $arResult['ID']);
$arResult['BASKET'] = array(
    'IN' => !empty($oBasketItem) && !$oBasketItem->isDelay(),
    'DELAY' => !empty($oBasketItem) && $oBasketItem->isDelay(),
);

foreach (['ADD_PICT_PROP', 'LABEL_PROP', 'OFFER_ADD_PICT_PROP'] as $v) {
    $arParams[$v] = trim($arParams[$v]);
    if ($arParams[$v] == '-') {
        $arParams[$v] = '';
    }
}

if (!is_array($arParams['OFFER_TREE_PROPS'])) {
    $arParams['OFFER_TREE_PROPS'] = array($arParams['OFFER_TREE_PROPS']);
}
foreach ($arParams['OFFER_TREE_PROPS'] as $key => $value)
{
    $value = (string)$value;
    if (in_array($value, ['', '-']))
        unset($arParams['OFFER_TREE_PROPS'][$key]);
}
if (empty($arParams['OFFER_TREE_PROPS']) && isset($arParams['OFFERS_CART_PROPERTIES']) && is_array($arParams['OFFERS_CART_PROPERTIES']))
{
    $arParams['OFFER_TREE_PROPS'] = $arParams['OFFERS_CART_PROPERTIES'];
    foreach ($arParams['OFFER_TREE_PROPS'] as $key => $value)
    {
        $value = (string)$value;
        if (in_array($value, ['', '-']))
            unset($arParams['OFFER_TREE_PROPS'][$key]);
    }
}
if ($arParams['DISPLAY_NAME'] != 'N')
    $arParams['DISPLAY_NAME'] = 'Y';
if (!isset($detailPictMode[$arParams['DETAIL_PICTURE_MODE']]))
    $arParams['DETAIL_PICTURE_MODE'] = 'IMG';
if (!isset($displayPreviewTextMode[$arParams['DISPLAY_PREVIEW_TEXT_MODE']]))
    $arParams['DISPLAY_PREVIEW_TEXT_MODE'] = 'E';

foreach (array(
             'ADD_DETAIL_TO_SLIDER',
             'PRODUCT_SUBSCRIPTION',
             'SHOW_DISCOUNT_PERCENT',
             'SHOW_OLD_PRICE',
             'SHOW_MAX_QUANTITY',
             'SHOW_BASIS_PRICE',
             'SHOW_CLOSE_POPUP',
             'USE_COMMENTS',
             'BLOG_USE',
             'VK_USE',
             'FB_USE',
             'USE_VOTE_RATING'
         ) as $v) {
    if ($arParams[$v] != 'Y')
        $arParams[$v] = 'N';
}

if (!is_array($arParams['ADD_TO_BASKET_ACTION']))
    $arParams['ADD_TO_BASKET_ACTION'] = array($arParams['ADD_TO_BASKET_ACTION']);
$arParams['ADD_TO_BASKET_ACTION'] = array_filter($arParams['ADD_TO_BASKET_ACTION'], 'CIBlockParameters::checkParamValues');
if (empty($arParams['ADD_TO_BASKET_ACTION']) || (!in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']) && !in_array('BUY', $arParams['ADD_TO_BASKET_ACTION'])))
    $arParams['ADD_TO_BASKET_ACTION'] = array('BUY');

$arParams['MESS_BTN_BUY'] = trim($arParams['MESS_BTN_BUY']);
$arParams['MESS_BTN_ADD_TO_BASKET'] = trim($arParams['MESS_BTN_ADD_TO_BASKET']);
$arParams['MESS_BTN_SUBSCRIBE'] = trim($arParams['MESS_BTN_SUBSCRIBE']);
$arParams['MESS_BTN_COMPARE'] = trim($arParams['MESS_BTN_COMPARE']);
$arParams['MESS_NOT_AVAILABLE'] = trim($arParams['MESS_NOT_AVAILABLE']);
if ($arParams['VOTE_DISPLAY_AS_RATING'] != 'vote_avg')
    $arParams['VOTE_DISPLAY_AS_RATING'] = 'rating';
if ($arParams['USE_COMMENTS'] == 'Y')
{
    if ($arParams['BLOG_USE'] == 'N' && $arParams['VK_USE'] == 'N' && $arParams['FB_USE'] == 'N')
        $arParams['USE_COMMENTS'] = 'N';
}
if ($arParams['BRAND_USE'] != 'Y')
    $arParams['BRAND_USE'] = 'N';
if ($arParams['BRAND_PROP_CODE'] == '')
    $arParams['BRAND_PROP_CODE'] = array();
if (!is_array($arParams['BRAND_PROP_CODE']))
    $arParams['BRAND_PROP_CODE'] = array($arParams['BRAND_PROP_CODE']);

$arEmptyPreview = false;
$strEmptyPreview = $this->GetFolder().'/images/no_photo.png';
if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strEmptyPreview))
{
    $arSizes = getimagesize($_SERVER['DOCUMENT_ROOT'] . $strEmptyPreview);
    if (!empty($arSizes)) {
        $arEmptyPreview = array(
            'SRC' => $strEmptyPreview,
            'WIDTH' => (int)$arSizes[0],
            'HEIGHT' => (int)$arSizes[1]
        );
    }
    unset($arSizes);
}
unset($strEmptyPreview);

$arSKUPropList = array();
$arSKUPropIDs = array();
$arSKUPropKeys = array();
$boolSKU = false;
$strBaseCurrency = '';
$boolConvert = isset($arResult['CONVERT_CURRENCY']['CURRENCY_ID']);


/** Additional prices */
$arAdditionalPrices = [];
$arPriceNameList = ArrayHelper::getValue($arResult, 'CAT_PRICES');

$sDisplayedPriceID = ArrayHelper::getValue($arResult, ['MIN_PRICE', 'PRICE_ID']);
$arPriceList = ArrayHelper::getValue($arResult, 'PRICES');

foreach ($arPriceList as $priceKey => $arPrice) {
    if ($arPrice['PRICE_ID'] != $sDisplayedPriceID) {
        $arAdditionalPrices[$priceKey] = $arPrice;
        $arAdditionalPrices[$priceKey]['TITLE'] = $arPriceNameList[$priceKey]['TITLE'];
    }
}

$arResult['ADDITIONAL_PRICES_TO_DISPLAY'] = $arAdditionalPrices;


if ($arResult['MODULES']['catalog']) {
    if (!$boolConvert)
        $strBaseCurrency = CCurrency::GetBaseCurrency();

    $arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
    $boolSKU = !empty($arSKU) && is_array($arSKU);

    if ($boolSKU && !empty($arParams['OFFER_TREE_PROPS'])) {
        $arSKUPropList = CIBlockPriceTools::getTreeProperties(
            $arSKU,
            $arParams['OFFER_TREE_PROPS'],
            array(
                'PICT' => $arEmptyPreview,
                'NAME' => '-'
            )
        );
        $arSKUPropIDs = array_keys($arSKUPropList);
    }
}

$arResult['CHECK_QUANTITY'] = false;
if (!isset($arResult['CATALOG_MEASURE_RATIO']))
    $arResult['CATALOG_MEASURE_RATIO'] = 1;
if (!isset($arResult['CATALOG_QUANTITY']))
    $arResult['CATALOG_QUANTITY'] = 0;
$arResult['CATALOG_QUANTITY'] = (
0 < $arResult['CATALOG_QUANTITY'] && is_float($arResult['CATALOG_MEASURE_RATIO'])
    ? (float)$arResult['CATALOG_QUANTITY']
    : (int)$arResult['CATALOG_QUANTITY']
);
$arResult['CATALOG'] = false;
if (!isset($arResult['CATALOG_SUBSCRIPTION']) || $arResult['CATALOG_SUBSCRIPTION'] != 'Y')
    $arResult['CATALOG_SUBSCRIPTION'] = 'N';

CIBlockPriceTools::getLabel($arResult, $arParams['LABEL_PROP']);

if ($arResult['MODULES']['catalog']) {
    $arResult['CATALOG'] = true;
    if (!isset($arResult['CATALOG_TYPE']))
        $arResult['CATALOG_TYPE'] = CCatalogProduct::TYPE_PRODUCT;
    if (!empty($arResult['OFFERS']) &&
        (CCatalogProduct::TYPE_PRODUCT == $arResult['CATALOG_TYPE'] || CCatalogProduct::TYPE_SKU == $arResult['CATALOG_TYPE'])
    ) {
        $arResult['CATALOG_TYPE'] = CCatalogProduct::TYPE_SKU;
    }
    switch ($arResult['CATALOG_TYPE'])
    {
        case CCatalogProduct::TYPE_SET:
            $arResult['OFFERS'] = array();
            $arResult['CHECK_QUANTITY'] = $arResult['CATALOG_QUANTITY_TRACE'] == 'Y' && $arResult['CATALOG_CAN_BUY_ZERO'] == 'N';
            break;
        case CCatalogProduct::TYPE_SKU:
            break;
        case CCatalogProduct::TYPE_PRODUCT:
        default:
            $arResult['CHECK_QUANTITY'] = $arResult['CATALOG_QUANTITY_TRACE'] == 'Y' && $arResult['CATALOG_CAN_BUY_ZERO'] == 'N';
            break;
    }
} else {
    $arResult['CATALOG_TYPE'] = 0;
    $arResult['OFFERS'] = array();
}

if ($arResult['CATALOG'] && !empty($arResult['OFFERS']))
{
    $boolSKUDisplayProps = false;

    $arResultSKUPropIDs = array();
    $arFilterProp = array();
    $arNeedValues = array();
    foreach ($arResult['OFFERS'] as &$arOffer) {
        foreach ($arSKUPropIDs as &$strOneCode) {
            if (isset($arOffer['DISPLAY_PROPERTIES'][$strOneCode])) {
                $arResultSKUPropIDs[$strOneCode] = true;
                if (!isset($arNeedValues[$arSKUPropList[$strOneCode]['ID']]))
                    $arNeedValues[$arSKUPropList[$strOneCode]['ID']] = array();
                $valueId = (
                $arSKUPropList[$strOneCode]['PROPERTY_TYPE'] == Iblock\PropertyTable::TYPE_LIST
                    ? $arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE_ENUM_ID']
                    : $arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE']
                );
                $arNeedValues[$arSKUPropList[$strOneCode]['ID']][$valueId] = $valueId;
                unset($valueId);
                if (!isset($arFilterProp[$strOneCode]))
                    $arFilterProp[$strOneCode] = $arSKUPropList[$strOneCode];
            }
        }
        unset($strOneCode);
    }
    unset($arOffer);

    CIBlockPriceTools::getTreePropertyValues($arSKUPropList, $arNeedValues);
    $arSKUPropIDs = array_keys($arSKUPropList);
    $arSKUPropKeys = array_fill_keys($arSKUPropIDs, false);


    $arMatrixFields = $arSKUPropKeys;
    $arMatrix = array();

    $arNewOffers = array();

    $arIDS = array($arResult['ID']);
    $arOfferSet = array();
    $arResult['OFFER_GROUP'] = false;
    $arResult['OFFERS_PROP'] = false;

    $arDouble = array();
    foreach ($arResult['OFFERS'] as $keyOffer => $arOffer) {
        $oBasketItem = $oBasket->getExistsItem('catalog', $arOffer['ID']);
        $arOffer['BASKET'] = array(
            'IN' => !empty($oBasketItem) && !$oBasketItem->isDelay(),
            'DELAY' => !empty($oBasketItem) && $oBasketItem->isDelay(),
        );

        $arOffer['ID'] = (int)$arOffer['ID'];
        if (isset($arDouble[$arOffer['ID']]))
            continue;
        $arIDS[] = $arOffer['ID'];
        $boolSKUDisplayProperties = false;
        $arOffer['OFFER_GROUP'] = false;
        $arRow = array();
        foreach ($arSKUPropIDs as $propkey => $strOneCode) {
            $arCell = array(
                'VALUE' => 0,
                'SORT' => PHP_INT_MAX,
                'NA' => true
            );
            if (isset($arOffer['DISPLAY_PROPERTIES'][$strOneCode])) {
                $arMatrixFields[$strOneCode] = true;
                $arCell['NA'] = false;
                if ('directory' == $arSKUPropList[$strOneCode]['USER_TYPE']) {
                    $intValue = $arSKUPropList[$strOneCode]['XML_MAP'][$arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE']];
                    $arCell['VALUE'] = $intValue;
                } else {
                    switch ($arSKUPropList[$strOneCode]['PROPERTY_TYPE']) {
                        case 'L':
                            $arCell['VALUE'] = (int)$arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE_ENUM_ID'];
                            break;
                        case 'E':
                            $arCell['VALUE'] = (int)$arOffer['DISPLAY_PROPERTIES'][$strOneCode]['VALUE'];
                            break;
                    }
                }
                $arCell['SORT'] = $arSKUPropList[$strOneCode]['VALUES'][$arCell['VALUE']]['SORT'];
            }
            $arRow[$strOneCode] = $arCell;
        }
        $arMatrix[$keyOffer] = $arRow;

        CIBlockPriceTools::setRatioMinPrice($arOffer, false);

        $arOffer['MORE_PHOTO'] = array();
        $arOffer['MORE_PHOTO_COUNT'] = 0;
        $offerSlider = CIBlockPriceTools::getSliderForItem($arOffer, $arParams['OFFER_ADD_PICT_PROP'], $arParams['ADD_DETAIL_TO_SLIDER'] == 'Y');
        if (empty($offerSlider)) {
            $offerSlider = $productSlider;
        }
        $arOffer['MORE_PHOTO'] = $offerSlider;
        $arOffer['MORE_PHOTO_COUNT'] = count($offerSlider);

        if (CIBlockPriceTools::clearProperties($arOffer['DISPLAY_PROPERTIES'], $arParams['OFFER_TREE_PROPS'])) {
            $boolSKUDisplayProps = true;
        }

        $arDouble[$arOffer['ID']] = true;
        $arNewOffers[$keyOffer] = $arOffer;
    }
    $arResult['OFFERS'] = $arNewOffers;
    $arResult['SHOW_OFFERS_PROPS'] = $boolSKUDisplayProps;

    $arUsedFields = array();
    $arSortFields = array();

    foreach ($arSKUPropIDs as $propkey => $strOneCode) {
        $boolExist = $arMatrixFields[$strOneCode];
        foreach ($arMatrix as $keyOffer => $arRow) {
            if ($boolExist) {
                if (!isset($arResult['OFFERS'][$keyOffer]['TREE']))
                    $arResult['OFFERS'][$keyOffer]['TREE'] = array();
                $arResult['OFFERS'][$keyOffer]['TREE']['PROP_'.$arSKUPropList[$strOneCode]['ID']] = $arMatrix[$keyOffer][$strOneCode]['VALUE'];
                $arResult['OFFERS'][$keyOffer]['SKU_SORT_'.$strOneCode] = $arMatrix[$keyOffer][$strOneCode]['SORT'];
                $arUsedFields[$strOneCode] = true;
                $arSortFields['SKU_SORT_'.$strOneCode] = SORT_NUMERIC;
            } else {
                unset($arMatrix[$keyOffer][$strOneCode]);
            }
        }
    }
    $arResult['OFFERS_PROP'] = $arUsedFields;
    $arResult['OFFERS_PROP_CODES'] = !empty($arUsedFields) ? base64_encode(serialize(array_keys($arUsedFields))) : '';

    Collection::sortByColumn($arResult['OFFERS'], $arSortFields);

    $offerSet = array();
    if (!empty($arIDS) && CBXFeatures::IsFeatureEnabled('CatCompleteSet')) {
        $offerSet = array_fill_keys($arIDS, false);
        $rsSets = CCatalogProductSet::getList(
            array(),
            array(
                '@OWNER_ID' => $arIDS,
                '=SET_ID' => 0,
                '=TYPE' => CCatalogProductSet::TYPE_GROUP
            ),
            false,
            false,
            array('ID', 'OWNER_ID')
        );
        while ($arSet = $rsSets->Fetch()) {
            $arSet['OWNER_ID'] = (int)$arSet['OWNER_ID'];
            $offerSet[$arSet['OWNER_ID']] = true;
            $arResult['OFFER_GROUP'] = true;
        }
        if ($offerSet[$arResult['ID']]) {
            foreach ($offerSet as &$setOfferValue) {
                if ($setOfferValue === false)
                    $setOfferValue = true;
            }
            unset($setOfferValue);
            unset($offerSet[$arResult['ID']]);
        }
        if ($arResult['OFFER_GROUP']) {
            $offerSet = array_filter($offerSet);
            $arResult['OFFER_GROUP_VALUES'] = array_keys($offerSet);
        }
    }

    $arMatrix = array();
    $intSelected = -1;
    $arResult['MIN_PRICE'] = false;
    $arResult['MIN_BASIS_PRICE'] = false;

    $arBasketItems = array();
    $arBasketDelayed = array();
    $rsBasket = CSaleBasket::GetList(
        array(
            'NAME' => 'ASC',
            'ID' => 'ASC'
        ),
        array(
            'FUSER_ID' => CSaleBasket::GetBasketUserID(),
            'LID' => SITE_ID,
            'ORDER_ID' => 'NULL'
        ),
        false,
        false,
        array('ID', 'PRODUCT_ID', 'DELAY')
    );

    while ($arBasketItem = $rsBasket->GetNext()) {
        if ($arBasketItem['DELAY'] == 'N'){
            $arBasketItems[] = $arBasketItem['PRODUCT_ID'];
        } else {
            $arBasketDelayed[] = $arBasketItem['PRODUCT_ID'];
        }
    }

    $arResult['BASKET_ITEMS'] = $arBasketItems;
    $arResult['DELAYED_ITEMS'] = $arBasketDelayed;
    $minOfferPrice = null;
    if ($arResult['OFFERS']) {
        $minOfferPrice = $arResult['OFFERS'][0]["MIN_PRICE"];
    }
    foreach ($arResult['OFFERS'] as $keyOffer => $arOffer) {
        if ($arOffer['CAN_BUY'] && $arOffer['MIN_PRICE']["VALUE_NOVAT"] < $minOfferPrice["VALUE_NOVAT"]) {
            $minOfferPrice = $arOffer['MIN_PRICE'];
        }
        if (empty($arResult['MIN_PRICE']) && $arOffer['CAN_BUY']) {
            $intSelected = $keyOffer;
            //$arResult['MIN_PRICE'] = (isset($arOffer['RATIO_PRICE']) ? $arOffer['RATIO_PRICE'] : $arOffer['MIN_PRICE']);
            //$arResult['MIN_BASIS_PRICE'] = $arOffer['MIN_PRICE'];
        }

        $sDisplayedPriceID = ArrayHelper::getValue($arOffer, ['MIN_PRICE', 'PRICE_ID']);
        $arPriceList = ArrayHelper::getValue($arOffer, 'PRICES');
        $measureName = $arOffer['ITEM_MEASURE']['TITLE'];

        foreach ($arPriceList as $priceKey => $arPrice) {
            if ($arPrice['PRICE_ID'] != $sDisplayedPriceID) {
                $arAdditionalPrices[$priceKey] = $arPrice;
                $arAdditionalPrices[$priceKey]['TITLE'] = $arPriceNameList[$priceKey]['TITLE'];
            }
        }

        $arResult['OFFERS'][$keyOffer]['ADDITIONAL_PRICES_TO_DISPLAY'] = $arAdditionalPrices;

        if (empty($arResult['MIN_PRICE']) && $arOffer['CAN_BUY']) {
            $intSelected = $keyOffer;
            $arResult['MIN_PRICE'] = (isset($arOffer['RATIO_PRICE']) ? $arOffer['RATIO_PRICE'] : $arOffer['MIN_PRICE']);
            $arResult['MIN_BASIS_PRICE'] = $arOffer['MIN_PRICE'];
        }

        $arSKUProps = false;
        if (!empty($arOffer['DISPLAY_PROPERTIES'])) {
            $boolSKUDisplayProps = true;
            $arSKUProps = array();
            foreach ($arOffer['DISPLAY_PROPERTIES'] as &$arOneProp) {
                if ($arOneProp['PROPERTY_TYPE'] == 'F')
                    continue;
                $arSKUProps[] = array(
                    'NAME' => $arOneProp['NAME'],
                    'VALUE' => $arOneProp['DISPLAY_VALUE']
                );
            }
            unset($arOneProp);
        }
        if (isset($arOfferSet[$arOffer['ID']])) {
            $arOffer['OFFER_GROUP'] = true;
            $arResult['OFFERS'][$keyOffer]['OFFER_GROUP'] = true;
        }
        reset($arOffer['MORE_PHOTO']);
        $slider = $arOffer['PROPERTIES']['MORE_PHOTO']['VALUE'];

        if (!empty($arOffer['PREVIEW_PICTURE'])) {
            $slider[] = $arOffer['PREVIEW_PICTURE'];
        }

        if (!empty($slider)) {
            foreach ($slider as $key => $id) {
                if (!is_numeric($id))
                    continue;

                $slider[$key] = CFile::GetByID($id)->Fetch();
                $slider[$key]['SRC'] = CFile::GetPath($id);
            }
        }

        $firstPhoto = current($arOffer['MORE_PHOTO']);

        $strPriceRangesRatio = '';
        $strPriceRanges = '';

        if ($arParams['USE_PRICE_COUNT'] && count($arOffer['ITEM_QUANTITY_RANGES']) > 1)
        {
            $strPriceRangesRatio = '('.Loc::getMessage(
                    'CT_BCE_CATALOG_RATIO_PRICE',
                    array('#RATIO#' => ($useRatio
                            ? $fullOffer['ITEM_MEASURE_RATIOS'][$fullOffer['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']
                            : '1'
                        ).' '.$measureName)
                ).')';

            foreach ($arOffer['ITEM_QUANTITY_RANGES'] as $range)
            {
                if ($range['HASH'] !== 'ZERO-INF')
                {
                    $itemPrice = false;

                    foreach ($arOffer['ITEM_PRICES'] as $itemPrice)
                    {
                        if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
                        {
                            break;
                        }
                    }

                    if ($itemPrice)
                    {
                        $strPriceRanges .= '<div class="price-ranges-block-item">';
                        $strPriceRanges .= Loc::getMessage(
                                'CT_BCE_CATALOG_RANGE_FROM',
                                array('#FROM#' => $range['SORT_FROM'].' '.$measureName)
                            ).' ';

                        if (is_infinite($range['SORT_TO']))
                        {
                            $strPriceRanges .= Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
                        }
                        else
                        {
                            $strPriceRanges .= Loc::getMessage(
                                'CT_BCE_CATALOG_RANGE_TO',
                                array('#TO#' => $range['SORT_TO'].' '.$measureName)
                            );
                        }

                        $strPriceRanges .= '<span class="price-ranges-block-item-value">'.($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE']).'</dd>';
                        $strPriceRanges .= '</div>';
                    }
                }
            }

            unset($range, $itemPrice);
        }


        $arOneRow = array(
            'ID' => $arOffer['ID'],
            'NAME' => $arOffer['~NAME'],
            'TREE' => $arOffer['TREE'],
            'PRICE' => isset($arOffer['RATIO_PRICE']) ? $arOffer['RATIO_PRICE'] : $arOffer['MIN_PRICE'],
            'BASIS_PRICE' => $arOffer['MIN_PRICE'],
            'ITEM_PRICES' => $arOffer['ITEM_PRICES'],
            'PRICE_RANGES_RATIO_HTML' => $strPriceRangesRatio,
            'PRICE_RANGES_HTML' => $strPriceRanges,
            'DISPLAY_PROPERTIES' => $arSKUProps,
            'PREVIEW_PICTURE' => $firstPhoto,
            'DETAIL_PICTURE' => $firstPhoto,
            'CHECK_QUANTITY' => $arOffer['CATALOG_QUANTITY_TRACE'],
            'MAX_QUANTITY' => $arOffer['CATALOG_QUANTITY'],
            'STEP_QUANTITY' => $arOffer['CATALOG_MEASURE_RATIO'],
            'QUANTITY_FLOAT' => is_double($arOffer['CATALOG_MEASURE_RATIO']),
            'MEASURE' => $arOffer['~CATALOG_MEASURE_NAME'],
            'OFFER_GROUP' => isset($offerSet[$arOffer['ID']]) && $offerSet[$arOffer['ID']],
            'CAN_BUY' => $arOffer['CAN_BUY'],
            'CAN_BUY_ZERO' => $arOffer['CATALOG_CAN_BUY_ZERO'] == 'Y',
            'SLIDER' => $slider,
            'IN_CART' => in_array($arOffer['ID'], $arBasketItems),
            'IN_DELAY' => in_array($arOffer['ID'], $arBasketDelayed),
            'SLIDER_COUNT' => is_array($slider) ? count($slider) : 0,
            'ADDITIONAL_PRICES_TO_DISPLAY' => $arAdditionalPrices,
            'PROPERTIES' => array()
        );

        foreach ($arSKUPropList as $key => $property) {
            if (!empty($arOffer['PROPERTIES'][$key]))
                $arOneRow['PROPERTIES'][$key] = $arOffer['PROPERTIES'][$key];
        }

        $arMatrix[$keyOffer] = $arOneRow;

        $arResult['OFFERS'][$keyOffer]['CAN_BUY_ZERO'] = $arOffer['CATALOG_CAN_BUY_ZERO'] == 'Y';
    }
    if (empty($arResult['MIN_PRICE'])) {
        $arResult['MIN_PRICE'] = $minOfferPrice;
    } else {
        if ($arResult['MIN_PRICE']["VALUE_NOVAT"] > $minOfferPrice["VALUE_NOVAT"]) {
            $arResult['MIN_PRICE'] = $minOfferPrice;
        }
    }

    $arResult['JS_OFFERS'] = $arMatrix;
    $arResult['OFFERS_SELECTED'] = $intSelected == -1 ? 0 : $intSelected;
    $arResult['OFFERS_IBLOCK'] = $arSKU['IBLOCK_ID'];
} else {
    $arResult['CAN_BUY_ZERO'] = ArrayHelper::getValue($arResult, 'CATALOG_CAN_BUY_ZERO') == 'Y';
}

if ($arResult['MODULES']['catalog'] && $arResult['CATALOG']) {
    if ($arResult['CATALOG_TYPE'] == CCatalogProduct::TYPE_PRODUCT || $arResult['CATALOG_TYPE'] == CCatalogProduct::TYPE_SET) {
        CIBlockPriceTools::setRatioMinPrice($arResult, false);
        $arResult['MIN_BASIS_PRICE'] = $arResult['MIN_PRICE'];
    }
    if (CBXFeatures::IsFeatureEnabled('CatCompleteSet') && $arResult['CATALOG_TYPE'] == CCatalogProduct::TYPE_PRODUCT) {
        $rsSets = CCatalogProductSet::getList(
            array(),
            array(
                '@OWNER_ID' => $arResult['ID'],
                '=SET_ID' => 0,
                '=TYPE' => CCatalogProductSet::TYPE_GROUP
            ),
            false,
            false,
            array('ID', 'OWNER_ID')
        );
        if ($arSet = $rsSets->Fetch())
        {
            $arResult['OFFER_GROUP'] = true;
        }
    }
}

if (!empty($arResult['DISPLAY_PROPERTIES'])) {
    foreach ($arResult['DISPLAY_PROPERTIES'] as $propKey => $arDispProp) {
        if ($arDispProp['PROPERTY_TYPE'] == 'F')
            unset($arResult['DISPLAY_PROPERTIES'][$propKey]);
    }
}

$arResult['SKU_PROPS'] = $arSKUPropList;
$offersPropsCodes = array_keys(ArrayHelper::getValue($arResult, 'OFFERS_PROP', array()));
foreach ($arResult['SKU_PROPS'] as $k => $v) {
    if (!in_array($k, $offersPropsCodes))
        unset($arResult['SKU_PROPS'][$k]);
}
unset($offersPropsCodes);

$arResult['DEFAULT_PICTURE'] = $arEmptyPreview;

$arResult['CURRENCIES'] = array();
if ($arResult['MODULES']['currency']) {
    if ($boolConvert) {
        $currencyFormat = CCurrencyLang::GetFormatDescription($arResult['CONVERT_CURRENCY']['CURRENCY_ID']);
        $arResult['CURRENCIES'] = array(
            array(
                'CURRENCY' => $arResult['CONVERT_CURRENCY']['CURRENCY_ID'],
                'FORMAT' => array(
                    'FORMAT_STRING' => $currencyFormat['FORMAT_STRING'],
                    'DEC_POINT' => $currencyFormat['DEC_POINT'],
                    'THOUSANDS_SEP' => $currencyFormat['THOUSANDS_SEP'],
                    'DECIMALS' => $currencyFormat['DECIMALS'],
                    'THOUSANDS_VARIANT' => $currencyFormat['THOUSANDS_VARIANT'],
                    'HIDE_ZERO' => $currencyFormat['HIDE_ZERO']
                )
            )
        );
        unset($currencyFormat);
    } else {
        $currencyIterator = CurrencyTable::getList(array(
            'select' => array('CURRENCY')
        ));
        while ($currency = $currencyIterator->fetch()) {
            $currencyFormat = CCurrencyLang::GetFormatDescription($currency['CURRENCY']);
            $arResult['CURRENCIES'][] = array(
                'CURRENCY' => $currency['CURRENCY'],
                'FORMAT' => array(
                    'FORMAT_STRING' => $currencyFormat['FORMAT_STRING'],
                    'DEC_POINT' => $currencyFormat['DEC_POINT'],
                    'THOUSANDS_SEP' => $currencyFormat['THOUSANDS_SEP'],
                    'DECIMALS' => $currencyFormat['DECIMALS'],
                    'THOUSANDS_VARIANT' => $currencyFormat['THOUSANDS_VARIANT'],
                    'HIDE_ZERO' => $currencyFormat['HIDE_ZERO']
                )
            );
        }
        unset($currencyFormat, $currency, $currencyIterator);
    }
}

/*if (!empty($arResult['PROPERTIES']['BRAND']['VALUE'])) {
	$rsBrands = CIBlockElement::GetByID($arResult['PROPERTIES']['BRAND']['VALUE']);
	if ($rsBrands) {
		if ($arBrand = $rsBrands->GetNext()) {
			if (!empty($arBrand['PREVIEW_PICTURE']) && is_numeric($arBrand['PREVIEW_PICTURE'])) {
				$picture = CFile::GetByID($arBrand['PREVIEW_PICTURE'])->GetNext();

				if ($picture) {
					$picture['SRC'] = CFile::GetPath($arBrand['PREVIEW_PICTURE']);
					$arBrand['PREVIEW_PICTURE'] = $picture;
					unset($picture);
				}
			}

			if (!empty($arBrand['DETAIL_PICTURE']) && is_numeric($arBrand['DETAIL_PICTURE'])) {
				$picture = CFile::GetByID($arBrand['DETAIL_PICTURE'])->GetNext();

				if ($picture) {
					$picture['SRC'] = CFile::getPath($arBrand['DETAIL_PICTURE']);
					$arBrand['DETAIL_PICTURE'] = $picture;
					unset($picture);
				}
			}

			$arResult['PROPERTIES']['BRAND']['VALUE'] = $arBrand;
		}
	}
}*/


if (!empty($arResult['OFFERS'])) {
    foreach ($arResult['OFFERS'] as $k => $offer) {
        $arNewPrice = ArrayHelper::getValue($offer, ['ITEM_PRICES', $offer['ITEM_PRICE_SELECTED']]);

        if ($arMinPrice === null || $arMinPrice['PRINT_PRICE'] > $arNewPrice['PRINT_PRICE']) {
            $arMinPrice = $arNewPrice;

            $arMinPrice['PRINT_VALUE'] = $sPriceFrom.$arMinPrice['PRINT_BASE_PRICE'];
            $arMinPrice['PRINT_DISCOUNT_VALUE'] = $sPriceFrom.$arMinPrice['PRINT_PRICE'];
            $arMinPrice['DISCOUNT_VALUE'] = $arMinPrice['RATIO_PRICE'];
            $arMinPrice['VALUE'] = $arMinPrice['RATIO_BASE_PRICE'];
            $arMinPrice['DISCOUNT_DIFF_PERCENT'] = $arMinPrice['PERCENT'];

            $arResult['MIN_PRICE'] = $offer['MIN_PRICE'];
            $arResult['CURRENT_OFFER'] = $offer;
            $currentOffer = $offer;
        }

    }
} else {
    $arResult['ITEM_PRICE_SELECTED'] = isset($arResult['ITEM_PRICE_SELECTED'])?$arResult['ITEM_PRICE_SELECTED']:0;
    $arMinPrice = ArrayHelper::getValue($arResult, ['ITEM_PRICES', $arResult['ITEM_PRICE_SELECTED']]);
    $arMinPrice['PRINT_VALUE'] = $arMinPrice['PRINT_BASE_PRICE'];
    $arMinPrice['PRINT_DISCOUNT_VALUE'] = $arMinPrice['PRINT_PRICE'];
    $arMinPrice['DISCOUNT_VALUE'] = $arMinPrice['RATIO_PRICE'];
    $arMinPrice['VALUE'] = $arMinPrice['RATIO_BASE_PRICE'];
    $arMinPrice['DISCOUNT_DIFF_PERCENT'] = $arMinPrice['PERCENT'];

    $arResult['MIN_PRICE'] = $arMinPrice;
}