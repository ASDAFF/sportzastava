<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arCurrentValues
 */

$parameters = array(
    'SESSION_PROPERTY' => array(
        'NAME' => GetMessage('UNIVERSE_SETTINGS_SESSION_PROPERTY'),
        'PARENT' => 'DATA_SOURCE',
		'TYPE' => 'STRING'
    )
);

$arComponentParameters = array(
    'PARAMETERS' => $parameters
);