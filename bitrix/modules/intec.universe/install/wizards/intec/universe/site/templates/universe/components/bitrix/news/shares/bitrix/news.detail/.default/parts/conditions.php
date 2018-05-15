<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 * @var $conditions
 */
?>
<?php $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "conditions",
    array(
        'IBLOCK_TYPE' => $arParams['TYPE_OF_BLOCK_FOR_CONDITIONS'],
        'IBLOCK_ID' => $arParams['ID_OF_BLOCK_FOR_CONDITIONS'],
        'ARR_ID_IBLOCK' => $conditions,
        'SECTION_USER_FIELDS' => array(),
        'SHOW_ALL_WO_SECTION' => 'Y',
    ),
    $component,
    array("HIDE_ICONS" => "Y")
);?>
