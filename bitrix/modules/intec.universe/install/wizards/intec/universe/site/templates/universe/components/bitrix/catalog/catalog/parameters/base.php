<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Sale\Delivery\Services\Manager as Deliveries;
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

if (!empty($iIBlockId)) {
    $arCatalog = CCatalog::GetByID($iIBlockId);
    $iOffersIBlockId = ArrayHelper::getValue($arCatalog, 'OFFERS_IBLOCK_ID');

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

$arPrices = array();
$rsPrices = CCatalogGroup::GetList();

while ($arPrice = $rsPrices->GetNext())
    $arPrices[$arPrice['ID']] = '['.$arPrice['ID'].'] '.$arPrice['NAME'];

unset($arPrice);
unset($rsPrices);

$arTemplateParameters['LIST_SORT_PRICE_CODE'] = array(
    'PARENT' => 'LIST_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_LIST_SORT_PRICE_CODE'),
    'TYPE' => 'LIST',
    'VALUES' => $arPrices
);

$arSKU = CCatalogSKU::GetInfoByProductIBlock($arCurrentValues['IBLOCK_ID']);
$boolSKU = !empty($arSKU) && is_array($arSKU);

if ($boolSKU)
{
    $arAllOfferPropList = array();
    $arFileOfferPropList = array(
        '-' => Loc::getMessage('C_CATALOG_PROP_EMPTY')
    );
    $arTreeOfferPropList = array(
        '-' => Loc::getMessage('C_CATALOG_PROP_EMPTY')
    );
    $rsProps = CIBlockProperty::GetList(
        array('SORT' => 'ASC', 'ID' => 'ASC'),
        array('IBLOCK_ID' => $arSKU['IBLOCK_ID'], 'ACTIVE' => 'Y')
    );
    while ($arProp = $rsProps->Fetch())
    {
        if ($arProp['ID'] == $arSKU['SKU_PROPERTY_ID'])
            continue;
        $arProp['USER_TYPE'] = (string)$arProp['USER_TYPE'];
        $strPropName = '['.$arProp['ID'].']'.('' != $arProp['CODE'] ? '['.$arProp['CODE'].']' : '').' '.$arProp['NAME'];
        if ('' == $arProp['CODE'])
            $arProp['CODE'] = $arProp['ID'];
        $arAllOfferPropList[$arProp['CODE']] = $strPropName;
        if ('F' == $arProp['PROPERTY_TYPE'])
            $arFileOfferPropList[$arProp['CODE']] = $strPropName;
        if ('N' != $arProp['MULTIPLE'])
            continue;
        if (
            'L' == $arProp['PROPERTY_TYPE']
            || 'E' == $arProp['PROPERTY_TYPE']
            || ('S' == $arProp['PROPERTY_TYPE'] && 'directory' == $arProp['USER_TYPE'] && CIBlockPriceTools::checkPropDirectory($arProp))
        )
            $arTreeOfferPropList[$arProp['CODE']] = $strPropName;
    }

    $arTemplateParameters['OFFER_TREE_PROPS'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => Loc::getMessage('C_CATALOG_OFFER_TREE_PROPS'),
        'TYPE' => 'LIST',
        'MULTIPLE' => 'Y',
        'ADDITIONAL_VALUES' => 'N',
        'REFRESH' => 'N',
        'DEFAULT' => '-',
        'VALUES' => $arTreeOfferPropList
    );
}

$arTemplateParameters['OFFERS_PROPERTY_PICTURES'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => Loc::getMessage('C_CATALOG_OFFERS_PROPERTY_PICTURES'),
    'TYPE' => 'LIST',
    'VALUES' => $arOffersProperties,
    'ADDITIONAL_VALUES' => 'Y'
);

$arTemplateParameters['FAST_ORDER_USE'] = array(
    'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_USE'),
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y'
);

$arTemplateParameters['DETAIL_DISPLAY_MEASURE'] = array(
    'PARENT' => 'DETAIL_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_DETAIL_DISPLAY_MEASURE'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'Y',
    'REFRESH' => 'N'
);

if ($bFastOrderUse) {
    $arTemplates = array();
    $rsTemplates = CComponentUtil::GetTemplatesList('intec.universe:oneclickbuy');

    foreach ($rsTemplates as $arTemplate)
        $arTemplates[$arTemplate['NAME']] = $arTemplate['NAME'];

    unset($arTemplate);
    unset($rsTemplates);

    $iPerson = ArrayHelper::getValue($arCurrentValues, 'FAST_ORDER_PAYER');
    $arPersons = array();
    $rsPersons = CSalePersonType::GetList(
        array(),
        array('ACTIVE' => 'Y')
    );

    while ($arPerson = $rsPersons->GetNext())
        $arPersons[$arPerson['ID']] = '['.$arPerson['ID'].'] '.$arPerson['NAME'];

    unset($arPerson);
    unset($rsPersons);

    $arOrderProperties = array();
    $arOrderPropertiesOptional = array();

    if (!empty($iPerson)) {
        $rsOrderProperties = CSaleOrderProps::GetList(array(), array(
            'PERSON_TYPE_ID' => $iPerson
        ));

        while ($arProperty = $rsOrderProperties->GetNext()) {
            $sPropertyKey = $arProperty['ID'];
            $sPropertyName = '['.$sPropertyKey.'] '.$arProperty['NAME'];
            $arOrderProperties[$sPropertyKey] = $sPropertyName;

            if ($arProperty['REQUIED'] == 'N')
                $arOrderPropertiesOptional[$sPropertyKey] = $sPropertyName;
        }

        unset($sPropertyKey);
        unset($sPropertyName);
        unset($arProperty);
        unset($rsOrderProperties);
    }

    $arDeliveries = array();
    $rsDeliveries =  Deliveries::getActiveList();

    foreach ($rsDeliveries as $arDelivery)
        $arDeliveries[$arDelivery['ID']] = '['.$arDelivery['ID'].'] '.$arDelivery['NAME'];

    unset($arDelivery);
    unset($rsDeliveries);

    $arPayments = array();
    $rsPayments = CSalePaySystem::GetList(
        array(),
        array('ACTIVE' => 'Y')
    );

    while ($arPayment = $rsPayments->GetNext())
        $arPayments[$arPayment['ID']] = '['.$arPayment['ID'].'] '.$arPayment['NAME'];

    unset($arPayment);
    unset($rsPayments);

    $arTemplateParameters['FAST_ORDER_TEMPLATE'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_TEMPLATE'),
        'TYPE' => 'LIST',
        'VALUES' => $arTemplates
    );

    $arTemplateParameters['FAST_ORDER_PRICE_TYPE'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_PRICE_TYPE'),
        'TYPE' => 'LIST',
        'VALUES' => $arPrices,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['FAST_ORDER_PAYER'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_PAYER'),
        'TYPE' => 'LIST',
        'VALUES' => $arPersons,
        'REFRESH' => 'Y',
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['FAST_ORDER_PROPERTIES'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_PROPERTIES'),
        'TYPE' => 'LIST',
        'MULTIPLE' => 'Y',
        'VALUES' => $arOrderPropertiesOptional,
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

    $arTemplateParameters['FAST_ORDER_TITLE'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_TITLE'),
        'TYPE' => 'STRING'
    );

    $arTemplateParameters['FAST_ORDER_BUTTON'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_BUTTON'),
        'TYPE' => 'STRING'
    );

    $arTemplateParameters['FAST_ORDER_PROPERTY_PHONE'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_PROPERTY_PHONE'),
        'TYPE' => 'LIST',
        'VALUES' => $arOrderProperties,
        'ADDITIONAL_VALUES' => 'Y'
    );

    $arTemplateParameters['FAST_ORDER_COMMENT_SHOW'] = array(
        'NAME' => Loc::getMessage('C_CATALOG_FAST_ORDER_COMMENT_SHOW'),
        'TYPE' => 'CHECKBOX'
    );
}