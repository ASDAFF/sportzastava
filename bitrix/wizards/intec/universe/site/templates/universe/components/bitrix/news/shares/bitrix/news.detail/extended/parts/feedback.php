<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 */

?>
<? $APPLICATION->IncludeComponent(
    'intec.universe:widget',
    'web.form',
    array(
        'WEB_FORM_ID' => $arParams['PROPERTY_FORM_ID'],
        'FORM_TEXT' => $arParams["FORM_TEXT"],
        'HIDE_TITLE' => "Y",
        'WEB_FORM_SETTINGS' => array(
            'COMPONENT_TEMPLATE' => '.default'
        )
    ),
    $component
); ?>
