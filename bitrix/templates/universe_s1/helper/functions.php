<?php

use Bitrix\Main\Loader;

/**
 * @param $url - YouTube video-URL
 * @return array URL-templates, preview picture, video-id
 */
function youtube_video($url)
{
    $arrUrl = parse_url($url);

    if (isset($arrUrl['query'])) {
        $arrUrlGet = explode('&', $arrUrl['query']);
        foreach ($arrUrlGet as $value) {
            $arrGetParam = explode('=', $value);
            if (!strcmp(array_shift($arrGetParam), 'v')) {
                $videoID = array_pop($arrGetParam);
                break;
            }
        }
        if (empty($videoID)) {
            $videoID = array_pop(explode('/', $arrUrl['path']));
        }
    } else {
        $videoID = array_pop(explode('/', $url));
    }

    return array(
        'iframe' => 'https://www.youtube.com/embed/'.$videoID,
        'src' => 'https://www.youtube.com/watch?v='.$videoID,
        'image_maxresdefault' => 'http://img.youtube.com/vi/'.$videoID.'/maxresdefault.jpg',
        'id' => $videoID
    );
}


/**
 * Return product price with discount
 *
 * @param $productId
 * @param null $productPriceId
 * @param null $price
 * @param int $quantity
 * @param string $currency
 * @return bool
 * @throws \Bitrix\Main\LoaderException
 */
function getSalePrice($productId, $productPriceId = null, $price = null, $quantity = 1, $currency = "RUB") {
    if ($productId < 1)
        return false;

    Loader::includeModule('sale');

    if (!isset($productPriceId) || !isset($price)) {
        Loader::includeModule('catalog');

        $arBasePrice = CCatalogGroup::GetBaseGroup();

        $db_res = CPrice::GetList(
            array(),
            array(
                "PRODUCT_ID" => $productId,
                "CATALOG_GROUP_ID" => $arBasePrice['ID']
            ),
            false,
            false,
            array('ID', 'PRICE')
        );
        if ($ar_res = $db_res->Fetch()) {
            $productPriceId = $ar_res["ID"];
            $price = $ar_res["PRICE"];
        } else {
            return false;
        }
    }

    $arOrder = array(
        'SITE_ID' => SITE_ID,
        'USER_ID' => $GLOBALS["USER"]->GetID(),
        'ORDER_PRICE' => "0", // сумма всей корзины
        'ORDER_WEIGHT' => "0", // вес всей корзины
        'BASKET_ITEMS' => [
            [
                'PRODUCT_ID' => $productId,
                'PRODUCT_PRICE_ID' => $productPriceId,
                'PRICE' => $price,
                'CURRENCY' => $currency,
                'BASE_PRICE' => $price,
                'QUANTITY' => $quantity,
                'LID' => SITE_ID,
                'MODULE' => 'catalog',
            ]
        ]
    );

    $arOptions = array(
        'COUNT_DISCOUNT_4_ALL_QUANTITY' => "Y",
    );

    $arErrors = array();

    CSaleDiscount::DoProcessOrder($arOrder, $arOptions, $arErrors);

    $resultPrice = $arOrder['BASKET_ITEMS'][0]['PRICE'];
    return $resultPrice;
}