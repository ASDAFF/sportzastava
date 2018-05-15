<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Sale\Basket;
use Bitrix\Main\Context;
use Bitrix\Sale\Fuser;
use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;

/**
 * @var array $arParams
 * @var array $arResult
 * @var array $arSections
 */

if (!Loader::includeModule('sale'))
    return;


$oBasket = Basket::loadItemsForFUser(
    Fuser::getId(),
    Context::getCurrent()->getSite()
);


while ($row = $rsIBlockSections->GetNext())
    $arIBlockSections[$row['ID']] = $row;

foreach ($arResult['ITEMS'] as &$arItem) {
    $iIBlockSectionId = ArrayHelper::getValue($arItem, 'IBLOCK_SECTION_ID');
    $arItem['IBLOCK_SECTION'] = null;
    $oBasketItem = $oBasket->getExistsItem('catalog', $arItem['ID']);
    $arItem['BASKET'] = array(
        'IN' => !empty($oBasketItem) && !$oBasketItem->isDelay(),
        'DELAY' => !empty($oBasketItem) && $oBasketItem->isDelay(),
    );

    if (!empty($iIBlockSectionId) && ArrayHelper::keyExists($iIBlockSectionId, $arIBlockSections))
        $arItem['IBLOCK_SECTION'] = ArrayHelper::getValue($arIBlockSections, $iIBlockSectionId);

    //$arItem['CAN_BUY'] = false;
    //$arItem['HAS_OFFERS'] = false;

    $arPrice = $arItem['MIN_PRICE'];

    foreach ($arItem['OFFERS'] as $arOffer) {
        $arOfferPrice = $arOffer['MIN_PRICE'];

        if (empty($arOfferPrice))
            continue;

        if (empty($arPrice) || $arPrice['VALUE'] > $arOfferPrice['VALUE'])
            $arPrice = $arOfferPrice;
    }

    $arItem['PRICE'] = $arPrice;

    $sId = ArrayHelper::getValue($arItem, ['PROPERTIES', $sPropertySection, 'VALUE_XML_ID']);
    $sValue = ArrayHelper::getValue($arItem, ['PROPERTIES', $sPropertySection, 'VALUE']);

    /** add form 'ORDER_PRODUCT' */
    if ($arParams['USE_BASKET'] != 'Y') {

        if (!empty($arParams['ORDER_PRODUCT_WEB_FORM'])) {
            $arItem['FORM_ORDER'] = [
                'id' => $arParams['ORDER_PRODUCT_WEB_FORM'],
                'template' => '.default',
                'parameters' => [
                    'AJAX_OPTION_ADDITIONAL' => $arItem['ID'].'CATEGORIES_FORM_ORDER_PRODUCT',
                    'CONSENT_URL' => $arParams['CONSENT_URL']
                ],
                'settings' => [
                    'title' => GetMessage('DEFAULT_BUTTON_ORDER_PRODUCT')
                ],
                'fields' => []
            ];

            if (!empty($arParams['PROPERTY_FORM_ORDER_PRODUCT']))
                $arItem['FORM_ORDER']['fields'][$arParams['PROPERTY_FORM_ORDER_PRODUCT']] = $arItem['NAME'];
        }
    }

    if (!empty($sId) && !empty($sValue)) {
        if (!ArrayHelper::keyExists($sId, $arSections))
            $arSections[$sId] = array(
                'NAME' => $sValue,
                'CODE' => $sId,
                'ITEMS' => array()
            );

        $arSections[$sId]['ITEMS'][] = $arItem;
    }
}
