<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!Loader::includeModule('catalog') || !Loader::includeModule('sale'))
    return;


$saleBasket = CSaleBasket::GetList(array(), array(
    'FUSER_ID' => CSaleBasket::GetBasketUserID(),
    'LID' => SITE_ID,
    'ORDER_ID' => 'NULL'
));
$basketItems = array();
while ($row = $saleBasket->GetNext()) {
    $basketItems[$row['PRODUCT_ID']] = $row;
}
unset($saleBasket);


// Set delatey and basket items
foreach ($basketItems as $id => $item) {
    if ($item['DELAY'] == 'Y') {
        $arResult['DELAYED_COUNT']++;
    } else {
        $arResult['BASKET_COUNT']++;
    }
}
unset($basketItems);