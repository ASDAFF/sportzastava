<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use Bitrix\Main\Loader;

/**
 * @var array $arCurrentValues
 */

if (!Loader::includeModule('intec.startshop'))
	return;

$rsProperties = CStartShopOrderProperty::GetList(
    ['SORT' => 'ASC'],
    ['ACTIVE' => 'Y']
);
$arProperties = [];

while ($arProperty = $rsProperties->GetNext())
    if ($arProperty['REQUIRED'] == 'N')
        $arProperties[$arProperty['ID']] = '['.$arProperty['SID'].']['.$arProperty['ID'].'] '.$arProperty['LANG'][LANGUAGE_ID]['NAME'];

$rsCurrencies = CStartShopCurrency::GetList(
    ['SORT' => 'ASC'],
    ['ACTIVE' => 'Y']
);
$arCurrencies = [];

while ($arCurrency = $rsCurrencies->GetNext())
	$arCurrencies[$arCurrency['CODE']] = '['.$arCurrency['CODE'].'] '.$arCurrency['LANG'][LANGUAGE_ID]['NAME'];

$rsPayments = CStartShopPayment::GetList(
    ['SORT' => 'ASC'],
    ['ACTIVE' => 'Y']
);
$arPayments = [];

while ($arPayment = $rsPayments->GetNext())
    $arPayments[$arPayment['ID']] = '['.$arPayment['ID'].'] '.$arPayment['LANG'][LANGUAGE_ID]['NAME'];

$rsDeliveries = CStartShopDelivery::GetList(
    ['SORT' => 'ASC'],
    ['ACTIVE' => 'Y']
);
$arDeliveries = [];

while ($arDelivery = $rsDeliveries->GetNext())
	$arDeliveries[$arDelivery['ID']] = '['.$arDelivery['SID'].']['.$arDelivery['ID'].'] '.$arDelivery['LANG'][LANGUAGE_ID]['NAME'];

$rsStatuses = CStartShopOrderStatus::GetList(
    ['SORT' => 'ASC'],
    ['ACTIVE' => 'Y']
);
$arStatuses = [];

while ($arStatus = $rsStatuses->GetNext())
    $arStatuses[$arStatus['ID']] = '['.$arStatus['SID'].']['.$arStatus['ID'].'] '.$arStatus['LANG'][LANGUAGE_ID]['NAME'];

$arComponentParameters = array(
	'PARAMETERS' => array(
	    'REQUEST_VARIABLE_ACTION' => array(
	        'PARENT' => 'BASE',
            'NAME' => GetMessage('OCB_REQUEST_VARIABLE_ACTION'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'action'
        ),
        'REQUEST_VARIABLE_PROPERTIES' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('OCB_REQUEST_VARIABLE_PROPERTIES'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'properties'
        ),
		'PROPERTIES' => array(
			'PARENT' => 'DATA_SOURCE',
			'NAME' => GetMessage('OCB_PROPERTIES'),
			'TYPE' => 'LIST',
			'MULTIPLE' => 'Y',
			'VALUES' => $arProperties,
			'ADDITIONAL_VALUES' => 'Y'
		),
		'CURRENCY' => array(
			'PARENT' => 'DATA_SOURCE',
			'NAME' => GetMessage('OCB_CURRENCY'),
			'TYPE' => 'LIST',
			'VALUES' => $arCurrencies,
			'ADDITIONAL_VALUES' => 'Y'
		),
		'DELIVERY' => array(
			'PARENT' => 'DATA_SOURCE',
			'NAME' => GetMessage('OCB_DELIVERY'),
			'TYPE' => 'LIST',
			'VALUES' => $arDeliveries,
			'ADDITIONAL_VALUES' => 'Y'
		),
		'PAYMENT' => array(
			'PARENT' => 'DATA_SOURCE',
			'NAME' => GetMessage('OCB_PAYMENT'),
			'TYPE' => 'LIST',
			'VALUES' => $arPayments,
			'ADDITIONAL_VALUES' => 'Y'
		),
        'STATUS' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('OCB_STATUS'),
            'TYPE' => 'LIST',
            'VALUES' => $arStatuses,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'AJAX_MODE' => 'Y'
	)
);