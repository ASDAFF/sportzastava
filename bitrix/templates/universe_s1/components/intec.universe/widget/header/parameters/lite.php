<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arCurrentValues
 * @var array $arForms
 */

if (!Loader::includeModule('intec.startshop'))
    return;


$rsForms = CStartShopForm::GetList(array(), array('ACTIVE' => 'Y'));
while ($arForm = $rsForms->GetNext()) {
    $arForms[$arForm['ID']] = '['.$arForm['ID'].'] '.$arForm['LANG'][LANGUAGE_ID]['NAME'];
}
unset($rsForms);