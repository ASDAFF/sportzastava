<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!Loader::includeModule('intec.startshop'))
    return;


$basket = array();
$rsBasket = CStartShopBasket::GetList(array(), array(), array(), array(), array(), SITE_ID);
while ($arBasket = $rsBasket->GetNext()) {
    $basket[] = $arBasket;
}

foreach ($basket as $item) {
    $arResult['BASKET'][] = array(
        'id' => $item['ID'],
        'delay' => false
    );
}