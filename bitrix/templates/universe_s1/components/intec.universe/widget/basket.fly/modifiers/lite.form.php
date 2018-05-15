<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;

$arForm = CStartShopForm::GetByID($arParams['WEB_FORM_ID']);

if (!empty($arForm)) {
    $arForm = $arForm->GetNext();

    if (!empty($arForm)) {
        $arForm['NAME'] = ArrayHelper::getValue($arForm, ['LANG', 'ru', 'NAME']);
        $arResult['WEB_FORM'] = $arForm;
    }
}