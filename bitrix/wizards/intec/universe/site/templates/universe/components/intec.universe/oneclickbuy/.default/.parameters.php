<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arCurrentValues
 */

$arTemplateParameters['TITLE'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('OCB_TITLE'),
    'TYPE' => 'STRING'
);

$arTemplateParameters['SEND_BUTTON'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('OCB_SEND_BUTTON'),
    'TYPE' => 'STRING'
);

$arTemplateParameters['SHOW_AGREEMENT'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('OCB_SHOW_AGREEMENT'),
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y'
);

if ($arCurrentValues['SHOW_AGREEMENT'] == 'Y') {
    $arTemplateParameters['URL_AGREEMENT'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('OCB_URL_AGREEMENT'),
        'TYPE' => 'STRING'
    );
}