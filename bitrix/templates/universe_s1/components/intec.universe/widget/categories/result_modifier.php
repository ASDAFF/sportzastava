<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;
use intec\constructor\models\Build;

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!CModule::IncludeModule('intec.core'))
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
            $code = 'categories';
            $page = $build->getPage();
            $properties = $page->getProperties();
            $propertiesUse = $properties->get('use_global_settings') && $propertiesUse;

            if ($propertiesUse) {
                $blocks = $properties->get('main_blocks');

                $views = [
                    'desktop' => ArrayHelper::getValue($blocks, ['templates', $code])
                ];

                switch ($views['desktop']) {
                    case 'list':
                        $arParams['GRID_CATALOG_ROOT_SECTIONS_COUNT'] = 3;
                        $arParams['VIEW'] = 'list';
                        break;
                    case 'tiles':
                        $arParams['GRID_CATALOG_ROOT_SECTIONS_COUNT'] = 5;
                        $arParams['VIEW'] = 'tile2';
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
$sView = ArrayHelper::fromRange(['default.all', 'tile.all', 'minimal.all', 'blocks.all', 'blocks.small.all'], $sView);
$arParams['VIEW_DESKTOP'] = $sView;

$sView = ArrayHelper::getValue($arParams, 'VIEW_MOBILE');
$sView = ArrayHelper::fromRange(['default.all', 'tile.all', 'tile.slider.mobile', 'minimal.all', 'blocks.all', 'blocks.small.all'], $sView);
$arParams['VIEW_MOBILE'] = $sView;

$arParams['ITEMS_LIMIT'] = Type::toInteger($arParams['ITEMS_LIMIT']);

$sPageUrl = ArrayHelper::getValue($arParams, 'PAGE_URL');
$sPageUrl = StringHelper::replaceMacros($sPageUrl, [
    'SITE_DIR' => SITE_DIR
]);
$arParams['PAGE_URL'] = $sPageUrl;