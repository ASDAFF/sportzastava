<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arCurrentValues
 */

$arTemplateParameters = array(
    'DESKTOP_TEMPLATE' => array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('N_L_GALLERY_DESKTOP_TEMPLATE'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            'settings' => GetMessage('N_L_GALLERY_DESKTOP_TEMPLATE_SETTINGS'),
            'list' => GetMessage('N_L_GALLERY_DESKTOP_TEMPLATE_LIST'),
            'tiles' => GetMessage('N_L_GALLERY_DESKTOP_TEMPLATE_TILES')
        )
    )
);
