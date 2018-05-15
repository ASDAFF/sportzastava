<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();


use Bitrix\Main\Loader;
use intec\Core;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Type;

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!Loader::includeModule('intec.core'))
    return;


$arResult['BASKET'] = array();
$arResult['COMPARE'] = array();

if ($arParams['BASKET_UPDATE'] == 'Y') {
    if (Loader::includeModule('sale')) {
        require_once('modifiers/base.php');
    } else if (Loader::includeModule('intec.startshop')) {
        require_once('modifiers/lite.php');
    }
}


$sCompare = ArrayHelper::getValue($arParams, 'COMPARE_NAME');
$compareUpdate = ArrayHelper::getValue($arParams, 'COMPARE_UPDATE', 'N');

if (!empty($sCompare) && $compareUpdate == 'Y') {
    $arCompare = Core::$app->session->get($sCompare);

    if (Type::isArray($arCompare)) {
        foreach ($arCompare as $arIBlock) {
            $arItems = ArrayHelper::getValue($arIBlock, 'ITEMS');

            if (Type::isArray($arItems)) {
                foreach ($arItems as $arItem) {
                    $iId = ArrayHelper::getValue($arItem, 'ID');

                    if (!empty($iId))
                        $arResult['COMPARE'][] = $iId;
                }
            }
        }
    }
}