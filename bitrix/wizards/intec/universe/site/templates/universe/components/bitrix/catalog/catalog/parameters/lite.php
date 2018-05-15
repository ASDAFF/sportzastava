<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use intec\core\helpers\ArrayHelper;

/**
 * @var array $arTemplateParameters
 * @var array $arCurrentValues
 *
 * @var array $arIBlocksTypes
 * @var array $arIBlocks
 * @var array $arIBlocksByTypes
 * @var array $arProperties
 */

$iIBlockId = $arCurrentValues['IBLOCK_ID'];
$iOffersIBlockId = null;
$bCurrencyUse = ArrayHelper::getValue($arCurrentValues, 'CURRENCY_USE') === 'Y';
$bFastOrderUse = ArrayHelper::getValue($arCurrentValues, 'FAST_ORDER_USE') === 'Y';

$arOffersProperties = array();

$arPrices = array();
$rsPrices = CStartShopPrice::GetList(array('SORT' => 'ASC'));

while ($arPrice = $rsPrices->GetNext())
    $arPrices[$arPrice['CODE']] = '['.$arPrice['CODE'].'] '.ArrayHelper::getValue($arPrice, ['LANG', LANGUAGE_ID, 'NAME']);

unset($arPrice);
unset($rsPrices);

$arCurrencies = array();
$rsCurrencies = CStartShopCurrency::GetList(array('SORT' => 'ASC'));

while ($arCurrency = $rsCurrencies->GetNext())
    $arCurrencies[$arCurrency['CODE']] = '['.$arCurrency['CODE'].'] '.ArrayHelper::getValue($arCurrency, ['LANG', LANGUAGE_ID, 'NAME']);

unset($arCurrency);
unset($rsCurrencies);

if (!empty($iIBlockId)) {
    $arCatalog = CStartShopCatalog::GetByIBlock($iIBlockId)->GetNext();
    $iOffersIBlockId = ArrayHelper::getValue($arCatalog, 'OFFERS_IBLOCK');

    if (!empty($iOffersIBlockId)) {
        $rsOffersProperties = CIBlockProperty::GetList(array(), array(
            'IBLOCK_ID' => $iOffersIBlockId,
            'ACTIVE' => 'Y',
            'PROPERTY_TYPE' => 'F',
            'MULTIPLE' => 'Y'
        ));

        while ($arProperty = $rsOffersProperties->GetNext())
            if (!empty($arProperty['CODE']))
                $arOffersProperties[$arProperty['CODE']] = '['.$arProperty['CODE'].'] '.$arProperty['NAME'];
    }
}

$arTemplateParameters['OFFERS_PROPERTY_PICTURES'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => Loc::getMessage('C_CATALOG_OFFERS_PROPERTY_PICTURES'),
    'TYPE' => 'LIST',
    'VALUES' => $arOffersProperties,
    'ADDITIONAL_VALUES' => 'Y'
);

$arTemplateParameters['PRICE_CODE'] = array(
    'PARENT' => 'PRICES',
    'NAME' => Loc::getMessage('C_CATALOG_PRICE_CODE'),
    'TYPE' => 'LIST',
    'MULTIPLE' => 'Y',
    'VALUES' => $arPrices
);

$arTemplateParameters['LIST_SORT_PRICE_CODE'] = array(
    'PARENT' => 'LIST_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_LIST_SORT_PRICE_CODE'),
    'TYPE' => 'LIST',
    'VALUES' => $arPrices
);

$arTemplateParameters['CURRENCY_USE'] = array(
    'PARENT' => 'PRICES',
    'NAME' => Loc::getMessage('C_CATALOG_CURRENCY_USE'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N',
    'REFRESH' => 'Y'
);

if ($bCurrencyUse) {
    $arTemplateParameters['CURRENCY_CODE'] = array(
        'PARENT' => 'PRICES',
        'NAME' => Loc::getMessage('C_CATALOG_CURRENCY_CODE'),
        'TYPE' => 'LIST',
        'VALUES' => $arCurrencies
    );
}

$arTemplateParameters['FAST_ORDER_USE'] = array(
    'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_USE'),
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y'
);

if ($bFastOrderUse) {
    $arTemplates = array();
    $rsTemplates = CComponentUtil::GetTemplatesList('intec.universe:oneclickbuy');

    foreach ($rsTemplates as $arTemplate)
        $arTemplates[$arTemplate['NAME']] = $arTemplate['NAME'];

    unset($arTemplate);
    unset($rsTemplates);

    $arOrderProperties = array();
    $rsOrderProperties = CStartShopOrderProperty::GetList(
        array('SORT' => 'ASC'),
        array('ACTIVE' => 'Y')
    );

    while ($arProperty = $rsOrderProperties->GetNext())
        if ($arProperty['REQUIRED'] == 'N')
            $arOrderProperties[$arProperty['ID']] = '['.$arProperty['SID'].'] '.ArrayHelper::getValue($arProperty, ['LANG', LANGUAGE_ID, 'NAME']);

    unset($arProperty);
    unset($rsOrderProperties);

    $arDeliveries = array();
    $rsDeliveries = CStartShopDelivery::GetList(
        array('SORT' => 'ASC'),
        array('ACTIVE' => 'Y')
    );

    while ($arDelivery = $rsDeliveries->GetNext())
        $arDeliveries[$arDelivery['CODE']] = '['.$arDelivery['SID'].']['.$arDelivery['CODE'].'] '.ArrayHelper::getValue($arDelivery, ['LANG', LANGUAGE_ID, 'NAME']);

    unset($arDelivery);
    unset($rsDeliveries);

    $arPayments = array();
    $rsPayments = CStartShopPayment::GetList(
        array('SORT' => 'ASC'),
        array('ACTIVE' => 'Y')
    );

    while ($arPayment = $rsPayments->GetNext())
        $arPayments[$arPayment['CODE']] = '['.$arPayment['CODE'].'] '.ArrayHelper::getValue($arPayment, ['LANG', LANGUAGE_ID, 'NAME']);

    unset($arPayment);
    unset($rsPayments);

    $arStatuses = array();
    $rsStatuses = CStartShopOrderStatus::GetList(
        array('SORT' => 'ASC'),
        array('ACTIVE' => 'Y')
    );

    while ($arStatus = $rsStatuses->GetNext())
        $arStatuses[$arStatus['CODE']] = '['.$arStatus['SID'].']['.$arStatus['CODE'].'] '.ArrayHelper::getValue($arStatus, ['LANG', LANGUAGE_ID, 'NAME']);

    unset($arStatus);
    unset($rsStatuses);

    $arTemplateParameters['FAST_ORDER_TEMPLATE'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_TEMPLATE'),
        'TYPE' => 'LIST',
        'VALUES' => $arTemplates
    );

    $arTemplateParameters['FAST_ORDER_PROPERTIES'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_PROPERTIES'),
        'TYPE' => 'LIST',
        'MULTIPLE' => 'Y',
        'VALUES' => $arOrderProperties,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['FAST_ORDER_DELIVERY'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_DELIVERY'),
        'TYPE' => 'LIST',
        'VALUES' => $arDeliveries,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['FAST_ORDER_PAYMENT'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_PAYMENT'),
        'TYPE' => 'LIST',
        'VALUES' => $arPayments,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['FAST_ORDER_STATUS'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_STATUS'),
        'TYPE' => 'LIST',
        'VALUES' => $arStatuses,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['FAST_ORDER_TITLE'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_TITLE'),
        'TYPE' => 'STRING'
    );

    $arTemplateParameters['FAST_ORDER_BUTTON'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_BUTTON'),
        'TYPE' => 'STRING'
    );
}

$arTemplateParameters['PRICE_VAT_SHOW_VALUE'] = array('HIDDEN' => 'Y');
$arTemplateParameters['PRICE_VAT_INCLUDE'] = array('HIDDEN' => 'Y');
$arTemplateParameters['USE_PRICE_COUNT'] = array('HIDDEN' => 'Y');
$arTemplateParameters['SHOW_PRICE_COUNT'] = array('HIDDEN' => 'Y');
$arTemplateParameters['USE_STORE'] = array('HIDDEN' => 'Y');
$arTemplateParameters['FILTER_PRICE_CODE'] = array('HIDDEN' => 'Y');