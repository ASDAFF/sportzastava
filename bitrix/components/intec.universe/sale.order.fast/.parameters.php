<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

/**
 * @var array $arCurrentValues
 */

if (!CModule::IncludeModule('intec.core') || !CModule::IncludeModule('sale') || !CModule::IncludeModule('catalog')) {
    return false;
}


$parameters = array(
    'TITLE' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('SOF_TITLE'),
        'TYPE' => 'STRING'
    ),
    'SEND' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('SOF_SEND'),
        'TYPE' => 'STRING'
    ),
    'SHOW_COMMENT' => array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('SOF_SHOW_COMMENT'),
        'TYPE' => 'CHECKBOX'
    )
);


// ---------- Price type ----------
$priceTypesList = array();
$priceTypes = CCatalogGroup::GetList(array(), array());
while ($row = $priceTypes->GetNext()) {
    $priceTypesList[$row['ID']] = '['. $row['ID'] .'] '. $row['NAME'];
}
$parameters['PRICE_TYPE_ID'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => GetMessage('SOF_PRICE_TYPE'),
    'TYPE' => 'LIST',
    'VALUES' => $priceTypesList
);
unset($priceTypes, $priceTypesList);


// ---------- Person type id ----------
$personTypeList = array();
$personType = CSalePersonType::GetList(
    array(),
    array('ACTIVE' => 'Y', 'SID'=>SITE_ID),
    false,
    false,
    array('ID', 'NAME')
);
while ($row = $personType->Fetch()) {
    $personTypeList[$row['ID']] = '['. $row['ID'] .'] '. $row['NAME'];
}
$parameters['PERSON_TYPE_ID'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => GetMessage('SOF_PERSON_TYPE'),
    'TYPE' => 'LIST',
    'VALUES' => $personTypeList,
    'REFRESH' => 'Y'
);
unset($personType, $personTypeList);


// ---------- Delivery id ----------
$deliveryTypeList = array();
$deliveryType = CSaleDelivery::GetList(
    array(),
    array('ACTIVE' => 'Y', 'SID'=>SITE_ID),
    false,
    false,
    array('ID', 'NAME')
);
while ($row = $deliveryType->Fetch()) {
    $deliveryTypeList[$row['ID']] = '['. $row['ID'] .'] '. $row['NAME'];
}
$parameters['DELIVERY_ID'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => GetMessage('SOF_DELIVERY_TYPE_ID'),
    'TYPE' => 'LIST',
    'VALUES' => $deliveryTypeList
);
unset($deliveryType, $deliveryTypeList);


// ---------- Payment id ----------
$paySystemList = array();
$paySystem = CSalePaySystem::GetList(
    array(),
    array('ACTIVE' => 'Y'),
    false,
    false,
    array('ID', 'NAME')
);
while ($row = $paySystem->Fetch()) {
    $paySystemList[$row['ID']] = '['. $row['ID'] .'] '. $row['NAME'];
}
$parameters['PAYMENT_ID'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => GetMessage('SOF_PAYMENT_ID'),
    'TYPE' => 'LIST',
    'VALUES' => $paySystemList
);
unset($paySystem, $paySystemList);


// ---------- Order properties ----------
$saleOrderPropsList = array();
$saleOrderPropsNoRrequiedList = array();
$saleOrderProps = CSaleOrderProps::GetList(array(), array(
    'PERSON_TYPE_ID' => $arCurrentValues['PERSON_TYPE_ID']
));
while ($row = $saleOrderProps->Fetch()) {
    $name = '['. $row['ID'] .'] '. $row['NAME'];
    if ($row['REQUIED'] == 'N') {
        $saleOrderPropsNoRrequiedList[$row['ID']] = $name;
    }
    $saleOrderPropsList[$row['ID']] = $name;
}
$parameters['SHOW_ORDER_PROPERTIES'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => GetMessage('SOF_SHOW_ORDER_PROPERTIES'),
    'TYPE' => 'LIST',
    'VALUES' => $saleOrderPropsNoRrequiedList,
    'MULTIPLE' => 'Y',
    'ADDITIONAL_VALUES' => 'Y'
);
unset($saleOrderProps, $saleOrderPropsNoRrequiedList);


$parameters['PROPERTY_PHONE'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => GetMessage('SOF_PROPERTY_PHONE'),
    'TYPE' => 'LIST',
    'VALUES' => $saleOrderPropsList,
    'ADDITIONAL_VALUES' => 'Y'
);


$arComponentParameters = array(
    'PARAMETERS' => $parameters
);
