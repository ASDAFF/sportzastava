<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arCurrentValues
 */

if (!CModule::IncludeModule('intec.startshop'))
    return;


$arTemplateParameters['USE_ADAPTABILITY'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('SB_DEFAULT_USE_ADAPTABILITY'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);
$arTemplateParameters['USE_ITEMS_PICTURES'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('SB_DEFAULT_USE_ITEMS_PICTURES'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'Y'
);
$arTemplateParameters['USE_SUM_FIELD'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('SB_DEFAULT_USE_SUM_FIELD'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);


// Buttons
$arTemplateParameters['USE_BUTTON_CLEAR'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('SB_DEFAULT_USE_BUTTON_CLEAR'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);
$arTemplateParameters['USE_BUTTON_BASKET'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('SB_DEFAULT_USE_BUTTON_BASKET'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);
$arTemplateParameters['USE_BUTTON_FAST_ORDER'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('SB_DEFAULT_USE_BUTTON_FAST_ORDER'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);
$arTemplateParameters['USE_BUTTON_CONTINUE_SHOPPING'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('SB_DEFAULT_USE_BUTTON_CONTINUE_SHOPPING'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N',
    'REFRESH' => 'Y'
);
$arTemplateParameters['VERIFY_CONSENT_TO_PROCESSING_PERSONAL_DATA'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('SB_DEFAULT_VERIFY_CONSENT_TO_PROCESSING_PERSONAL_DATA'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N',
    'REFRESH' => 'Y'
);

if ($arCurrentValues['USE_BUTTON_CONTINUE_SHOPPING'] == 'Y') {
    $arTemplateParameters['URL_CATALOG'] = array(
        'PARENT' => 'URL',
        'NAME' => GetMessage('SB_DEFAULT_URL_CATALOG'),
        'TYPE' => 'STRING'
    );
}

if ($arCurrentValues['VERIFY_CONSENT_TO_PROCESSING_PERSONAL_DATA'] == 'Y') {
    $arTemplateParameters['URL_RULES_OF_PERSONAL_DATA_PROCESSING'] = array(
        'PARENT' => 'URL',
        'NAME' => GetMessage('SB_DEFAULT_URL_RULES_OF_PERSONAL_DATA_PROCESSING'),
        'TYPE' => 'STRING'
    );
}


// Fast order
$arTemplateParameters['USE_FAST_ORDER'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('SB_USE_FAST_ORDER'),
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y'
);

if ($arCurrentValues['USE_FAST_ORDER'] == 'Y') {

    // Templates
    $fastOrderTemplatesList = array();
    $fastOrderTemplates = CComponentUtil::GetTemplatesList('intec.universelite:sale.order.fast');
    foreach ($fastOrderTemplates as $template) {
        $templateName = $template['TEMPLATE'] ? $template['TEMPLATE'] : GetMessage('CE_DEFAULT_TEMPLATE');
        $fastOrderTemplatesList[$template['NAME']] = $template['NAME'] .' ('. $templateName .')';
    }
    unset($fastOrderTemplates);

    // Properties
    $fastOrderProperties = array();
    $orderProperties = CStartShopOrderProperty::GetList(
        array('SORT' => 'ASC'),
        array('ACTIVE' => 'Y')
    );
    while ($row = $orderProperties->GetNext()) {
        if ($row['REQUIRED'] == 'N') {
            $fastOrderProperties[$row['ID']] = $row['LANG'][LANG]['NAME'] .' ['. $row['SID'] .']';
        }
    }
    unset($orderProperties);

    // Payments
    $fastOrderPayments = array();
    $shopPayments = CStartShopPayment::GetList(
        array('SORT' => 'ASC'),
        array('ACTIVE' => 'Y')
    );
    while ($row = $shopPayments->GetNext()) {
        $fastOrderPayments[$row['ID']] = $row['LANG'][LANG]['NAME'] .' ['. $row['CODE'] .']';
    }
    unset($shopPayments);

    // Deliveries
    $fastOrderDeliveries = array();
    $shopDeliveries = CStartShopDelivery::GetList(
        array('SORT' => 'ASC'),
        array('ACTIVE' => 'Y')
    );
    while ($row = $shopDeliveries->GetNext()) {
        $fastOrderDeliveries[$row['ID']] = $row['LANG'][LANG]['NAME'] .' ['. $row['CODE'] .']';
    }
    unset($shopDeliveries);


    $arTemplateParameters['FAST_ORDER_TEMPLATE'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('SB_FAST_ORDER_TEMPLATE'),
        'TYPE' => 'LIST',
        'VALUES' => $fastOrderTemplatesList
    );
    $arTemplateParameters['FAST_ORDER_SHOW_PROPERTIES'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('SB_FAST_ORDER_SHOW_PROPERTIES'),
        'TYPE' => 'LIST',
        'MULTIPLE' => 'Y',
        'VALUES' => $fastOrderProperties,
        'ADDITIONAL_VALUES' => 'Y'
    );
    $arTemplateParameters['FAST_ORDER_DELIVERY'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('SB_FAST_ORDER_DELIVERY'),
        'TYPE' => 'LIST',
        'VALUES' => $fastOrderDeliveries,
        'ADDITIONAL_VALUES' => 'Y'
    );
    $arTemplateParameters['FAST_ORDER_PAYMENT'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('SB_FAST_ORDER_PAYMENT'),
        'TYPE' => 'LIST',
        'VALUES' => $fastOrderPayments,
        'ADDITIONAL_VALUES' => 'Y'
    );
    $arTemplateParameters['FAST_ORDER_TITLE'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('SB_FAST_ORDER_TITLE'),
        'TYPE' => 'STRING'
    );
    $arTemplateParameters['FAST_ORDER_SEND_BUTTON'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('SB_FAST_ORDER_SEND_BUTTON'),
        'TYPE' => 'STRING'
    );
    $arTemplateParameters['FAST_ORDER_SHOW_AGREEMENT'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('SB_FAST_ORDER_SHOW_AGREEMENT'),
        'TYPE' => 'CHECKBOX',
        'REFRESH' => 'Y'
    );
    if ($arCurrentValues['FAST_ORDER_SHOW_AGREEMENT'] == 'Y') {
        $arTemplateParameters['FAST_ORDER_URL_AGREEMENT'] = array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('SB_FAST_ORDER_URL_AGREEMENT'),
            'TYPE' => 'STRING'
        );
    }
}