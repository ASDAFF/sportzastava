<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arResult
 * @var array $arElementID
 */

if (!empty($arElementID)) {
    if (!Loader::IncludeModule('iblock'))
        return;

    /** Получение данных о разделе товара */
    $dbGroups = CIBlockElement::GetElementGroups(
        $arElementID,
        true,
        array('NAME', 'SECTION_PAGE_URL')
    );

    $arSection = [];

    while ($arGroup = $dbGroups->GetNext())
        $arSection[$arGroup['ID']] = $arGroup;
    unset($dbGroups);

    foreach ($arResult['ITEMS'] as $sKey => $arItem)
        $arResult["ITEMS"][$sKey]['SECTION'] = $arSection[$arItem['IBLOCK_SECTION_ID']];
    unset($arSection);
}