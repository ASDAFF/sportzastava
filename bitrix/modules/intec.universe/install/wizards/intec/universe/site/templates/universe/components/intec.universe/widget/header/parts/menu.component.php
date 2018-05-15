<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @global CMain $APPLICATION
 * @var string $sTemplateId
 */
?>
<?php $APPLICATION->IncludeComponent(
    'bitrix:menu',
    'horizontal',
    array(
        'ROOT_MENU_TYPE' => $arParams['MENU_MAIN_ROOT_TYPE'],
        'MENU_CACHE_TYPE' => 'N',
        'MAX_LEVEL' => $arParams['MENU_MAIN_MAX_LEVEL'],
        'MENU_CATALOG_LINK' => $arParams['MENU_CATALOG_LINK'],
        'CHILD_MENU_TYPE' => $arParams['MENU_MAIN_CHILD_TYPE'],
        'USE_EXT' => 'Y',
        'DELAY' => 'N',
        'ALLOW_MULTI_SELECT' => 'N',
        'PROPERTY_IMAGE' => $arParams['MENU_PROPERTY_IMAGE'],
        'DEFAULT_VIEW' => $arParams['MENU_DEFAULT_VIEW'],
        'SECTION_VIEW' => $arParams['MENU_SECTION_VIEW'],
        'SECTION_VIEW_SUBSECTION_COUNT' => $arParams['MENU_SECTION_VIEW_SUBSECTION_COUNT'],
        'POSITION_MENU' => $arParams['MENU_MAIN_DISPLAY_IN'],
    ),
    $component
); ?>