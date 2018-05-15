<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arCurrentValues
 * @var array $arTemplateParameters
 */

if (!CModule::IncludeModule('sale') || !CModule::IncludeModule('catalog'))
	return;


$arSKU = false;
$boolSKU = false;
$arOfferProps = array();

// get iblock props from all catalog iblocks including sku iblocks
$arSkuIblockIDs = array();
$dbCatalog = CCatalog::GetList(array(), array());
while ($arCatalog = $dbCatalog->GetNext())
{
	$arSKU = CCatalogSKU::GetInfoByProductIBlock($arCatalog['IBLOCK_ID']);

	if (!empty($arSKU) && is_array($arSKU))
	{
		$arSkuIblockIDs[] = $arSKU['IBLOCK_ID'];
		$arSkuData[$arSKU['IBLOCK_ID']] = $arSKU;

		$boolSKU = true;
	}
}

// iblock props
$arProps = array();
foreach ($arSkuIblockIDs as $iblockID)
{
	$dbProps = CIBlockProperty::GetList(
		array(
			'SORT' => 'ASC',
			'NAME' => 'ASC'
		),
		array(
			'IBLOCK_ID' => $iblockID,
			'ACTIVE' => 'Y',
			'CHECK_PERMISSIONS' => 'N',
		)
	);

	while ($arProp = $dbProps->GetNext())
	{
		if ($arProp['ID'] == $arSkuData[$arSKU['IBLOCK_ID']]['SKU_PROPERTY_ID'])
			continue;

		if ($arProp['XML_ID'] == 'CML2_LINK')
			continue;

		$strPropName = '['. $arProp['ID'] .'] '. ('' != $arProp['CODE'] ? '['. $arProp['CODE'] .']' : '') .' '. $arProp['NAME'];

		if ($arProp['PROPERTY_TYPE'] != 'F') {
			$arOfferProps[$arProp['CODE']] = $strPropName;
		}
	}

	if (!empty($arOfferProps) && is_array($arOfferProps))
	{
		$arTemplateParameters['OFFERS_PROPS'] = array(
			'PARENT' => 'OFFERS_PROPS',
			'NAME' => GetMessage('SALE_PROPERTIES_RECALCULATE_BASKET'),
			'TYPE' => 'LIST',
			'MULTIPLE' => 'Y',
			'SIZE' => '7',
			'ADDITIONAL_VALUES' => 'N',
			'REFRESH' => 'N',
			'DEFAULT' => '-',
			'VALUES' => $arOfferProps
		);
	}
}


// Fast order settings
$arTemplateParameters['USE_FAST_ORDER'] = array(
	'PARENT' => 'BASE',
	'NAME' => GetMessage('SBB_USE_FAST_ORDER'),
	'TYPE' => 'CHECKBOX',
	'REFRESH' => 'Y'
);
if ($arCurrentValues['USE_FAST_ORDER'] == 'Y') {

	$fastOrderTemplatesList = array();
	$fastOrderTemplates = CComponentUtil::GetTemplatesList('intec.universe:sale.order.fast', 'universe');
	foreach ($fastOrderTemplates as $template) {
		$templateName = $template['TEMPLATE'] ? $template['TEMPLATE'] : GetMessage('SBB_DEFAULT_TEMPLATE');
		$fastOrderTemplatesList[$template['NAME']] = $template['NAME'] .' ('. $templateName .')';
	}
	$arTemplateParameters['FAST_ORDER_TEMPLATE'] = array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('SBB_FAST_ORDER_TEMPLATE'),
		'TYPE' => 'LIST',
		'VALUES' => $fastOrderTemplatesList
	);
	unset($fastOrderTemplates);

	$arTemplateParameters['FAST_ORDER_TITLE'] = array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('SBB_FAST_ORDER_TITLE'),
		'TYPE' => 'STRING'
	);
	$arTemplateParameters['FAST_ORDER_SEND_BUTTON'] = array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('SBB_FAST_ORDER_SEND_BUTTON'),
		'TYPE' => 'STRING'
	);
	$arTemplateParameters['FAST_ORDER_SHOW_COMMENT'] = array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('SBB_FAST_ORDER_SHOW_COMMENT'),
		'TYPE' => 'CHECKBOX'
	);

	$priceTypesList = array();
	$priceTypes = CCatalogGroup::GetList(array(), array());
	while ($row = $priceTypes->GetNext()) {
		$priceTypesList[$row['ID']] = '['. $row['ID'] .'] '. $row['NAME'];
	}
	$arTemplateParameters['FAST_ORDER_PRICE_TYPE'] = array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('SBB_FAST_ORDER_PRICE_TYPE'),
		'TYPE' => 'LIST',
		'VALUES' => $priceTypesList
	);
	unset($priceTypes, $priceTypesList);

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
	$arTemplateParameters['FAST_ORDER_DELIVERY_TYPE'] = array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('SBB_FAST_ORDER_DELIVERY_TYPE'),
		'TYPE' => 'LIST',
		'VALUES' => $deliveryTypeList
	);
	unset($deliveryType, $deliveryTypeList);

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
	$arTemplateParameters['FAST_ORDER_PAYMET_TYPE'] = array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('SBB_FAST_ORDER_PAYMENT_TYPE'),
		'TYPE' => 'LIST',
		'VALUES' => $paySystemList
	);
	unset($paySystem, $paySystemList);

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
	$arTemplateParameters['FAST_ORDER_PAYER_TYPE'] = array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('SBB_FAST_ORDER_PAYER_TYPE'),
		'TYPE' => 'LIST',
		'VALUES' => $personTypeList,
		'REFRESH' => 'Y'
	);
	unset($personType, $personTypeList);

	$saleOrderPropsList = array();
	$saleOrderPropsNoRrequiedList = array();
	$saleOrderProps = CSaleOrderProps::GetList(array(), array(
		'PERSON_TYPE_ID' => $arCurrentValues['FAST_ORDER_PAYER_TYPE']
	));
	while ($row = $saleOrderProps->Fetch()) {
		$name = '['. $row['ID'] .'] '. $row['NAME'];
		if ($row['REQUIED'] == 'N') {
			$saleOrderPropsNoRrequiedList[$row['ID']] = $name;
		}
		$saleOrderPropsList[$row['ID']] = $name;
	}
	$arTemplateParameters['FAST_ORDER_SHOW_PROPERTIES'] = array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('SBB_FAST_ORDER_SHOW_PROPERTIES'),
		'TYPE' => 'LIST',
		'VALUES' => $saleOrderPropsNoRrequiedList,
		'MULTIPLE' => 'Y'
	);
	unset($saleOrderProps, $saleOrderPropsNoRrequiedList);

	$arTemplateParameters['FAST_ORDER_PROPERTY_PHONE'] = array(
		'PARENT' => 'BASE',
		'NAME' => GetMessage('SBB_FAST_ORDER_PROPERTY_PHONE'),
		'TYPE' => 'LIST',
		'VALUES' => $saleOrderPropsList,
		'ADDITIONAL_VALUES' => 'Y'
	);
}

$arTemplateParameters['CONSENT_URL'] = array(
    'PARENT' => 'URL_TEMPLATES',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('SBB_CONSENT_URL')
);
