<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Type;
use intec\constructor\models\Build;

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!Loader::includeModule('intec.core'))
    return;

$arParams = ArrayHelper::merge([
    'USE_SETTINGS' => 'Y'
], $arParams);

$propertiesUse = ArrayHelper::getValue($arParams, 'USE_SETTINGS') === 'Y';

if (
    Loader::includeModule('intec.constructor') ||
    Loader::includeModule('intec.constructorlite')
) {
    if (!defined('EDITOR')) {
        $build = Build::getCurrent();

        if (!empty($build)) {
            $code = 'news';
            $page = $build->getPage();
            $properties = $page->getProperties();
            $propertiesUse = $properties->get('use_global_settings') && $propertiesUse;

            if ($propertiesUse) {
                $blocks = $properties->get('main_blocks');

                $views = [
                    'desktop' => ArrayHelper::getValue($blocks, ['templates', $code]),
                    'mobile' => ArrayHelper::getValue($blocks, ['mobile_templates', $code])
                ];

                switch ($views['desktop']) {
                    case 'default':
                        $arParams['VIEW_DESKTOP'] = 'default.all';
                        $arParams['LINE_COUNT_DESKTOP'] = '4';
                        break;
                    case 'extend':
                        $arParams['VIEW_DESKTOP'] = 'extend.all';
                        break;
                    case 'tiles':
                        $arParams['VIEW_DESKTOP'] = 'tiles.all';
                        $arParams['LINE_COUNT_DESKTOP'] = '4';
                        break;
                }

                switch ($views['mobile']) {
                    case 'default':
                        $arParams['VIEW_MOBILE'] = 'default.all';
                        break;
                    case 'extend':
                        $arParams['VIEW_MOBILE'] = 'extend.all';
                        break;
                }
            }
        }
    }
}

$sIBlockType = $arParams['IBLOCK_TYPE'];
$iIBlockId = $arParams['IBLOCK_ID'];
$sFilterName = $arParams['FILTER_NAME'];
$sPropertyDisplay = $arParams['PROPERTY_DISPLAY'];

if (empty($sFilterName))
    $sFilterName = 'arFilter';

$arParams['FILTER_NAME'] = $sFilterName;
$arFilter = ArrayHelper::getValue($GLOBALS, $sFilterName);

if (!Type::isArray($arFilter))
    $arFilter = array();

if (!empty($sPropertyDisplay))
    $arFilter['!PROPERTY_'.$sPropertyDisplay] = false;

$GLOBALS[$sFilterName] = $arFilter;

$sView = ArrayHelper::getValue($arParams, 'VIEW_DESKTOP');
$sView = ArrayHelper::fromRange(['default.all', 'extend.all', 'list.all', 'tiles.all'], $sView);
$arParams['VIEW_DESKTOP'] = $sView;

if ($sView == 'default.all') {
    $iLineCount = ArrayHelper::getValue($arParams, 'LINE_COUNT_DESKTOP');
    $iLineCount = Type::toInteger($iLineCount);

    if ($iLineCount < 1)
        $iLineCount = 1;

    if ($iLineCount > 4)
        $iLineCount = 4;

    $arParams['LINE_COUNT_DESKTOP'] = $iLineCount;
}

$sView = ArrayHelper::getValue($arParams, 'VIEW_MOBILE');
$sView = ArrayHelper::fromRange(['default.all', 'extend.all', 'list.all', 'tiles.all'], $sView);
$arParams['VIEW_MOBILE'] = $sView;

if ($sView == 'default.all') {
    $iLineCount = ArrayHelper::getValue($arParams, 'LINE_COUNT_MOBILE');
    $iLineCount = Type::toInteger($iLineCount);

    if ($iLineCount < 1)
        $iLineCount = 1;

    if ($iLineCount > 4)
        $iLineCount = 4;

    $arParams['LINE_COUNT_MOBILE'] = $iLineCount;
}