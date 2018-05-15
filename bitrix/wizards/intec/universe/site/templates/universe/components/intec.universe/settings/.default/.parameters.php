<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arCurrentValues
 */

$sSite = false;

if (!empty($_REQUEST['site'])) {
    $sSite = $_REQUEST['site'];
} else if (!empty($_REQUEST['src_site'])) {
    $sSite = $_REQUEST['src_site'];
}

$arMenuTypes = GetMenuTypes($sSite);

$arTemplateParameters = array();

$arTemplateParameters['SIDE_MENU_ROOT_TYPE'] = array(
    'NAME' => GetMessage('UNIVERSE_SETTINGS_SIDE_MENU_ROOT_TYPE'),
    'PARENT' => 'DATA_SOURCE',
    'TYPE' => 'LIST',
    'DEFAULT ' => 'left',
    'VALUES' => $arMenuTypes,
    'ADDITIONAL_VALUES'	=> 'Y'
);

$arTemplateParameters['SIDE_MENU_CHILD_TYPE'] = array(
    'NAME' => GetMessage('UNIVERSE_SETTINGS_SIDE_MENU_CHILD_TYPE'),
    'PARENT' => 'DATA_SOURCE',
    'TYPE' => 'LIST',
    'DEFAULT ' => 'left',
    'VALUES' => $arMenuTypes,
    'ADDITIONAL_VALUES'	=> 'Y'
);