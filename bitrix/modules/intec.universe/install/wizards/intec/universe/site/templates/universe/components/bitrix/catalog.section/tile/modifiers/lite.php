<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;

/**
 * @var array $arResult
 * @var array $arParams
 * @var string $sPriceFrom
 * @var string $sPopularCode
 * @var string $sNewCode
 * @var string $sRecommendationCode
 * @var string $sBasketUrl
 */

/** Создание массива стартшопа */
$arProducts = [];
$arElements = ArrayHelper::getValue($arResult, 'ELEMENTS');

if (!empty($arElements)) {
    $dbProducts = CStartShopCatalogProduct::GetList(
        array(),
        array('ID' => $arElements),
        array(),
        array(),
        ($arParams['USE_COMMON_CURRENCY'] == "Y" && !empty($arParams['CURRENCY']) ? $arParams['CURRENCY'] : false),
        $arParams['PRICE_CODE']
    );

    while ($arProduct = $dbProducts->GetNext())
        $arProducts[$arProduct['ID']] = $arProduct;
}

/** Структурирование массива */
if (!empty($arResult['ITEMS'])) {
    foreach ($arResult["ITEMS"] as $sKey => $arItem) {
        /** Обработка цен */
        $sItemID = ArrayHelper::getValue($arItem, 'ID');
        $arProduct = ArrayHelper::getValue($arProducts, $sItemID);

        if (!empty($arProduct)) {
            $arPrice = ArrayHelper::getValue($arProduct, ['STARTSHOP', 'PRICES', 'MINIMAL']);
            $bOffers = !empty(ArrayHelper::getValue($arProduct, ['STARTSHOP', 'OFFERS']));
            $bCanBuy = ArrayHelper::getValue($arProduct, ['STARTSHOP', 'AVAILABLE']);
            $bCanBuyZero = !ArrayHelper::getValue($arProduct, ['STARTSHOP', 'QUANTITY', 'USE'], false);
            $sMeasureRatio = ArrayHelper::getValue($arProduct, ['STARTSHOP', 'QUANTITY', 'RATIO']);
            $sQuantity = ArrayHelper::getValue($arProduct, ['STARTSHOP', 'QUANTITY', 'VALUE']);

            if ($bOffers) {
                $arMinPrice = null;
                $bCanBuy = false;
                $arOffers = ArrayHelper::getValue($arProduct, ['STARTSHOP', 'OFFERS']);

                foreach ($arOffers as $arOffer) {
                    /** Выбор минимальной цены */
                    $arNewPrice = ArrayHelper::getValue($arOffer, ['STARTSHOP', 'PRICES', 'MINIMAL']);

                    if ($arMinPrice === null || $arMinPrice['VALUE'] > $arNewPrice['VALUE']) {
                        $arMinPrice = $arNewPrice;
                    }

                    /** Доступность предложений для покупки */
                    $bOfferCanBuy = ArrayHelper::getValue($arOffer, ['STARTSHOP', 'AVAILABLE']);

                    if (!$bCanBuy) {
                        $bCanBuy = $bOfferCanBuy;
                    }
                }
                unset($arOffers);

                $arMinPrice['VALUE'] = $sPriceFrom.$arMinPrice['VALUE'];

                /** Массив минимальной цены предложений */
                $arPrice = [
                    'VALUE' => $arMinPrice['VALUE'],
                    'CURRENCY' => $arMinPrice['CURRENCY'],
                    'PRINT_VALUE' => $sPriceFrom.$arMinPrice['PRINT_VALUE'],
                    'TYPE' => $arMinPrice['TYPE'],
                    'PRINT_DISCOUNT_VALUE' => $sPriceFrom.$arMinPrice['PRINT_VALUE'],
                    'DISCOUNT_VALUE' => $arMinPrice['VALUE'],
                    'DISCOUNT_DIFF' => 0,
                    'DISCOUNT_DIFF_PERCENT' => 0
                ];

                $arResult['ITEMS'][$sKey]['OFFERS'] = [
                    'HAVE_OFFERS' => true
                ];
            } else {
                /** Создание массива по типу старшей редакции */
                $arPrice = [
                    'VALUE' => $arPrice['VALUE'],
                    'CURRENCY' => $arPrice['CURRENCY'],
                    'PRINT_VALUE' => $arPrice['PRINT_VALUE'],
                    'TYPE' => $arPrice['TYPE'],
                    'PRINT_DISCOUNT_VALUE' => $arPrice['PRINT_VALUE'],
                    'DISCOUNT_VALUE' => $arPrice['VALUE'],
                    'DISCOUNT_DIFF' => false
                ];
            }

            $arResult['ITEMS'][$sKey]['MIN_PRICE'] = $arPrice;
            $arResult['ITEMS'][$sKey]['CAN_BUY'] = $bCanBuy;
            $arResult['ITEMS'][$sKey]['CAN_BUY_ZERO'] = $bCanBuyZero;
            $arResult['ITEMS'][$sKey]['CATALOG_MEASURE_RATIO'] = $sMeasureRatio;
            $arResult['ITEMS'][$sKey]['CATALOG_QUANTITY'] = $sQuantity;
        }

        /** Обработка изображений */
        $sName = ArrayHelper::getValue($arItem, 'NAME');
        $sTitle = ArrayHelper::getValue($arItem, ['IPROPERTY_VALUES', 'ELEMENT_PREVIEW_PICTURE_FILE_TITLE']);
        $sAlt = ArrayHelper::getValue($arItem, ['IPROPERTY_VALUES', 'ELEMENT_PREVIEW_PICTURE_FILE_ALT']);
        $arPicture = [];

        if (!empty($arItem['PREVIEW_PICTURE'])) {
            $arPicture = CFile::ResizeImageGet(
                $arItem['PREVIEW_PICTURE']['ID'],
                array(
                    'width' => 240,
                    'height' => 240,
                    BX_RESIZE_IMAGE_PROPORTIONAL_ALT
                )
            );

            $sImgTitle = !empty($sTitle) ? $sTitle : $sName;
            $sImgAlt = !empty($sAlt) ? $sAlt : $sName;
        } elseif (!empty($arItem['DETAIL_PICTURE']))  {
            $arPicture = CFile::ResizeImageGet(
                $arItem['DETAIL_PICTURE']['ID'],
                array(
                    'width' => 240,
                    'height' => 240,
                    BX_RESIZE_IMAGE_PROPORTIONAL_ALT
                )
            );

            $sImgTitle = !empty($sTitle) ? $sTitle : $sName;
            $sImgAlt = !empty($sAlt) ? $sAlt : $sName;
        } else {
            $arPicture['src'] = SITE_TEMPLATE_PATH.'/images/noimg/no-img.png';
            $sImgTitle = $sName;
            $sImgAlt = $sName;
        }

        $arPicture['imgTitle'] = $sImgTitle;
        $arPicture['imgAlt'] = $sImgAlt;

        $arResult['ITEMS'][$sKey]['PICTURE'] = $arPicture;

        /** add form ORDER_PRODUCT */
        if ($arParams['USE_BASKET'] != 'Y') {

            if (!empty($arParams['ORDER_PRODUCT_WEB_FORM'])) {
                $arResult["ITEMS"][$sKey]['FORM_ORDER'] = [
                    'id' => $arParams['ORDER_PRODUCT_WEB_FORM'],
                    'template' => '.default',
                    'parameters' => [
                        'AJAX_OPTION_ADDITIONAL' => $sKey.'_FORM_ORDER_PRODUCT',
                        'CONSENT_URL' => $arParams['CONSENT_URL']
                    ],
                    'settings' => [
                        'title' => GetMessage('DEFAULT_BUTTON_ORDER_PRODUCT')
                    ],
                    'fields' => []
                ];

                if (!empty($arParams['PROPERTY_FORM_ORDER_PRODUCT']))
                    $arResult["ITEMS"][$sKey]['FORM_ORDER']['fields'][$arParams['PROPERTY_FORM_ORDER_PRODUCT']] = $arItem['NAME'];
            }
        }

        /** Обработка параметров компонента для элементов */
        $bPopular = ArrayHelper::getValue($arItem, ['PROPERTIES', $sPopularCode, 'VALUE']);
        $bNew = ArrayHelper::getValue($arItem, ['PROPERTIES', $sNewCode, 'VALUE']);
        $bRecommendation = ArrayHelper::getValue($arItem, ['PROPERTIES', $sRecommendationCode, 'VALUE']);

        $arViewElement = [
            'MARKERS' => [
                'POPULAR' => $bPopular,
                'NEW' => $bNew,
                'RECOMMENDATION' => $bRecommendation
            ]
        ];

        $arResult['ITEMS'][$sKey]['VIEW_PARAMETERS'] = $arViewElement;
    }

    /** Обработка параметров компонента */
    $arView = [
        'BASKET_URL' => $sBasketUrl,
        'QUICK_VIEW_SHOW' => ArrayHelper::getValue($arParams, 'SHOW_QUICK_VIEW') == 'Y',
        'COUNTER_SHOW' => ArrayHelper::getValue($arParams, 'SHOW_QUANTITY_COUNTER') == 'Y',
        'COMPARE_SHOW' => ArrayHelper::getValue($arParams, 'DISPLAY_COMPARE') == 'Y',
        'DELAY_SHOW' => false,
        'DELIMITER_ELEMENT_SHOW' => ArrayHelper::getValue($arParams, 'USE_DELIMITER_ELEMENT') == 'Y',
    ];

    $arResult['VIEW_PARAMETERS'] = $arView;
}