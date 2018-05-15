<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/**
 * @var $arParams
 * @var $arResult
 */

$rsIBlock = CIBlock::GetByID($arParams['IBLOCK_ID']);

$arIBlock = $rsIBlock->Fetch();
$arResult['SHARES_IBLOCK_DESCRIPTION'] = $arIBlock['DESCRIPTION'];

