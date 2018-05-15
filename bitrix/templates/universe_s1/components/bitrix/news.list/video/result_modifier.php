<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arElement = array();
foreach ($arResult['ITEMS'] as $el){
    if(empty($arParams['IBLOCK_DISPLAY_VIDEO']) || in_array($el['ID'], $arParams['IBLOCK_DISPLAY_VIDEO'])) {
        if ($el['ID'] == $arParams['IBLOCK_FIRST_VIDEO'])
            array_unshift($arElement, $el);
        else
            $arElement[] = $el;
    }
}
$arResult['ITEMS'] = $arElement;