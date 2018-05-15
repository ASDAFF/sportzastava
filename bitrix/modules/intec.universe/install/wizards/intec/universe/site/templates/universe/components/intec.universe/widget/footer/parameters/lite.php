<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;

/**
 * @var array $arCurrentValues
 * @var array $arForms
 */

if (!Loader::includeModule('intec.startshop'))
    return;


$dbForms = CStartShopForm::GetList();
while ($row = $dbForms->Fetch()) {
    $name = ArrayHelper::getValue($row, ['LANG', LANGUAGE_ID, 'NAME'], $row['CODE']);
    $arForms[$row['ID']] = '[' . $row['ID'] . '] ' . $name;
}
