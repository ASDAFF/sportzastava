<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Context;
use Bitrix\Sale\BasketItem;
use Bitrix\Sale\Basket;
use Bitrix\Sale\Fuser;

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!Loader::includeModule('sale'))
    return;


$basket = Basket::loadItemsForFUser(
    Fuser::getId(),
    Context::getCurrent()->getSite()
);

/** @var BasketItem $item */
foreach ($basket as $item) {
    $arResult['BASKET'][] = array(
        'id' => $item->getField('PRODUCT_ID'),
        'delay' => $item->isDelay()
    );
}