<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$arFields = array('CONFIRM_PASSWORD',
    'PASSWORD',
    'PERSONAL_PHONE',
    'EMAIL',
    'SECOND_NAME',
    'NAME',
    'LAST_NAME');
$arResult['SHOW_FIELDS'] = array_diff($arResult['SHOW_FIELDS'], $arFields);
foreach($arFields as $field)
    array_unshift($arResult['SHOW_FIELDS'], $field);


