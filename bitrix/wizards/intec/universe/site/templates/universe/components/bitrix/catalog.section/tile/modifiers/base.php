<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\StringHelper;

/**
 * @var array $arResult
 * @var array $arParams
 * @var string $sPriceFrom
 * @var string $sPopularCode
 * @var string $sNewCode
 * @var string $sRecommendationCode
 * @var string $sBasketUrl
 */

if (!empty($arResult['ITEMS'])) {
    /** Структурирование массива */
    foreach ($arResult['ITEMS'] as $sKey => $arItem) {
        /** Обработка цен */
        $bOffers = !empty(ArrayHelper::getValue($arItem, 'OFFERS'));

        if ($bOffers) {
            $bCanBuy = false;
            $arMinPrice = null;
            $arOffers = ArrayHelper::getValue($arItem, ['OFFERS']);

            foreach ($arOffers as $arOffer) {
                /** Выбор минимальной цены */
                $arNewPrice = ArrayHelper::getValue($arOffer, ['ITEM_PRICES', $arOffer['ITEM_PRICE_SELECTED']]);

                if ($arMinPrice === null || $arMinPrice['RATIO_PRICE'] > $arNewPrice['RATIO_PRICE']) {
                    $arMinPrice = $arNewPrice;
                }

                /** Доступность предложений для покупки */
                $bOfferCanBuy = ArrayHelper::getValue($arOffer, 'CAN_BUY') == 'Y';

                if (!$bCanBuy) {
                    $bCanBuy = $bOfferCanBuy;
                }
            }
            unset($arOffers);

            $arMinPrice['PRINT_VALUE'] = $sPriceFrom.$arMinPrice['PRINT_BASE_PRICE'];
            $arMinPrice['PRINT_DISCOUNT_VALUE'] = $sPriceFrom.$arMinPrice['PRINT_PRICE'];
            $arMinPrice['DISCOUNT_VALUE'] = $arMinPrice['RATIO_PRICE'];
            $arMinPrice['VALUE'] = $arMinPrice['RATIO_BASE_PRICE'];
            $arMinPrice['DISCOUNT_DIFF_PERCENT'] = $arMinPrice['PERCENT'];

            $arResult['ITEMS'][$sKey]['MIN_PRICE'] = $arMinPrice;
            $arResult['ITEMS'][$sKey]['CAN_BUY'] = $bCanBuy;
        } else {
            $arItem['ITEM_PRICE_SELECTED'] = isset($arItem['ITEM_PRICE_SELECTED'])?$arItem['ITEM_PRICE_SELECTED']:0;
            $arMinPrice = ArrayHelper::getValue($arItem, ['ITEM_PRICES', $arItem['ITEM_PRICE_SELECTED']]);
            $arMinPrice['PRINT_VALUE'] = $arMinPrice['PRINT_BASE_PRICE'];
            $arMinPrice['PRINT_DISCOUNT_VALUE'] = $arMinPrice['PRINT_PRICE'];
            $arMinPrice['DISCOUNT_VALUE'] = $arMinPrice['RATIO_PRICE'];
            $arMinPrice['VALUE'] = $arMinPrice['RATIO_BASE_PRICE'];
            $arMinPrice['DISCOUNT_DIFF_PERCENT'] = $arMinPrice['PERCENT'];

            $arResult['ITEMS'][$sKey]['CAN_BUY_ZERO'] = ArrayHelper::getValue($arItem, ['PRODUCT', 'CAN_BUY_ZERO']) == 'Y';

            $arResult['ITEMS'][$sKey]['MIN_PRICE'] = $arMinPrice;
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

        /** Обработка параметров компонента для элемента */
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
        'DELAY_SHOW' => true,
        'DELIMITER_ELEMENT_SHOW' => ArrayHelper::getValue($arParams, 'USE_DELIMITER_ELEMENT') == 'Y',
    ];

    $arResult['VIEW_PARAMETERS'] = $arView;
}