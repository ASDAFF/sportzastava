<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

/**
 * @var array $arCurrentValues
 */

$arTemplateParameters = array(
    'DISPLAY_TITLE' => array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('N_L_NEWS_BLOCKS_2_PROPERTIES_DISPLAY_TITLE'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y',
        'REFRESH' => 'Y'
    )
);

if ($arCurrentValues['DISPLAY_TITLE'] == 'Y') {
    $arTemplateParameters['TITLE'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('N_L_NEWS_BLOCKS_2_PROPERTIES_TITLE'),
        'TYPE' => 'STRING'
    );
}

$arTemplateParameters['LINE_COUNT'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('N_L_NEWS_BLOCKS_2_PROPERTIES_LINE_COUNT'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        4 => 4,
        5 => 5
    ),
    'DEFAULT' => '4'
);