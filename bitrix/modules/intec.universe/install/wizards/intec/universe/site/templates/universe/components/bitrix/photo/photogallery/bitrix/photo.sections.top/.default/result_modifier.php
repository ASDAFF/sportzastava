<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;

/**
 * @var array $arResult
 * @var array $arParams
 */

foreach ($arResult['SECTIONS'] as $sKey => $arSection) {
    /** Изображение раздела */
    $sSectionPicture = ArrayHelper::getValue($arSection, 'PICTURE');

    if (!empty($sSectionPicture)) {
        $sSectionPicturePath = CFile::GetPath($sSectionPicture);
        $arSection['PICTURE'] = $sSectionPicturePath;
    }

    /** Кол-во элементов раздела */
    $sItemsCount = count($arSection['ITEMS']);
    $arSection['ITEMS_COUNT'] = $sItemsCount;


    $arResult['SECTIONS'][$sKey] = $arSection;
}