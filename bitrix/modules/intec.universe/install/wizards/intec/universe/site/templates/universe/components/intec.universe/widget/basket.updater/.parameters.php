<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arCurrentValues
 */

$arTemplateParameters = array(
    'BASKET_UPDATE' => array(
        'PARENT' => 'BASE',
        'TYPE' => 'CHECKBOX',
        'NAME' => GetMessage('W_BASKET_UPDATER_PARAMETERS_BASKET_UPDATE')
    ),
    'COMPARE_UPDATE' => array(
        'PARENT' => 'BASE',
        'TYPE' => 'CHECKBOX',
        'NAME' => GetMessage('W_BASKET_UPDATER_PARAMETERS_COMPARE_UPDATE')
    ),
    'COMPARE_NAME' => array(
        'PARENT' => 'BASE',
        'TYPE' => 'STRING',
        'NAME' => GetMessage('W_BASKET_UPDATER_PARAMETERS_COMPARE_NAME')
    )
);