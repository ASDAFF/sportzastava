<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arCurrentValues
 * @var array $arForms
 */

if (!Loader::includeModule('form'))
    return;


$rsForms = CForm::GetList(
    $by = 'sort',
    $order = 'asc',
    array('ACTIVE' => 'Y'),
    $filtered = false
);
while ($row = $rsForms->GetNext()) {
    $arForms[$row['ID']] = '[' . $row['ID'] . '] ' . $row['NAME'];
}