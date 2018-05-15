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
            $code = 'reviews';
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
                        break;
                    case 'slider':
                        $arParams['VIEW_DESKTOP'] = 'slider.all';
                        break;
                    case 'blocks_1':
                        $arParams['VIEW_DESKTOP'] = 'blocks.all';
                        break;
                    case 'blocks_2':
                        $arParams['VIEW_DESKTOP'] = 'blocks.2.desktop';
                        break;
                }

                switch ($views['mobile']) {
                    case 'default':
                        $arParams['VIEW_MOBILE'] = 'default.all';
                        break;
                    case 'slider':
                        $arParams['VIEW_MOBILE'] = 'slider.all';
                        break;
                    case 'blocks_1':
                        $arParams['VIEW_MOBILE'] = 'blocks.all';
                        break;
                    case 'blocks_2':
                        $arParams['VIEW_MOBILE'] = 'blocks.2.mobile';
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
$sView = ArrayHelper::fromRange(['default.all', 'slider.all', 'blocks.all', 'blocks.2.desktop'], $sView);
$arParams['VIEW_DESKTOP'] = $sView;

$sView = ArrayHelper::getValue($arParams, 'VIEW_MOBILE');
$sView = ArrayHelper::fromRange(['default.all', 'slider.all', 'blocks.all', 'blocks.2.mobile'], $sView);
$arParams['VIEW_MOBILE'] = $sView;

$sPageUrl = ArrayHelper::getValue($arParams, 'PAGE_URL');
$sPageUrl = StringHelper::replaceMacros($sPageUrl, [
    'SITE_DIR' => SITE_DIR
]);
$arParams['PAGE_URL'] = $sPageUrl;