<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use intec\constructor\models\build\Template;

global $data;

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global array $settings
 * @global Template $template
 */
?>
<?php $data = $APPLICATION->IncludeComponent(
    'intec.constructor:template',
    '',
    array(
        'TEMPLATE_ID' => $template->id,
        'DISPLAY' => 'HEADER',
        'DATA' => [
            'template' => $template
        ]
    ),
    false,
    array('HIDE_ICONS' => 'Y')
); ?>

