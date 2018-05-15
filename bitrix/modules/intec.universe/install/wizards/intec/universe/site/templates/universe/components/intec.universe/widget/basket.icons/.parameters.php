<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arCurrentValues
 */

$arTemplateParameters = array(
    'SHOW_COMPARE' => array(
        'PARENT' => 'BASE',
        'TYPE' => 'CHECKBOX',
        'NAME' => GetMessage('WSI_SHOW_COMPARE'),
        'REFRESH' => 'Y'
    ),
    'SHOW_DELAY' => array(
        'PARENT' => 'BASE',
        'TYPE' => 'CHECKBOX',
        'NAME' => GetMessage('WSI_SHOW_DELAY')
    ),
    'SHOW_BASKET' => array(
        'PARENT' => 'BASE',
        'TYPE' => 'CHECKBOX',
        'NAME' => GetMessage('WSI_SHOW_BASKET')
    ),
    'URL_COMPARE' => array(
        'PARENT' => 'URL_TEMPLATES',
        'TYPE' => 'STRING',
        'NAME' => GetMessage('WSI_URL_COMPARE')
    ),
    'URL_BASKET' => array(
        'PARENT' => 'URL_TEMPLATES',
        'TYPE' => 'STRING',
        'NAME' => GetMessage('WSI_URL_BASKET')
    ),
);

if ($arCurrentValues['SHOW_COMPARE'] == 'Y')
    $arTemplateParameters['COMPARE_CODE'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'STRING',
        'NAME' => GetMessage('WSI_COMPARE_CODE')
    );