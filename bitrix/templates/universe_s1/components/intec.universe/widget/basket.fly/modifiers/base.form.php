<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arForm = CForm::GetByID($arParams['WEB_FORM_ID']);

if (!empty($arForm)) {
    $arForm = $arForm->GetNext();

    if (!empty($arForm))
        $arResult['WEB_FORM'] = $arForm;
}