<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

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
            $code = 'products';
            $page = $build->getPage();
            $properties = $page->getProperties();
            $propertiesUse = $properties->get('use_global_settings') && $propertiesUse;

            if ($propertiesUse) {
                $blocks = $properties->get('main_blocks');

                $views = [
                    'mobile' => ArrayHelper::getValue($blocks, ['mobile_templates', $code])
                ];

                switch ($views['mobile']) {
                    case 'default':
                        $arParams['VIEW_MOBILE'] = 'default.mobile';
                        break;
                    case 'deployed':
                        $arParams['VIEW_MOBILE'] = 'deployed.mobile';
                        break;
                }
            }
            if ($arParams['USE_BASKET'] == 'settings') {
                switch ($properties->get('use_basket')) {
                    case 1:
                        $arParams['USE_BASKET'] = 'Y';
                        break;
                    default:
                        $arParams['USE_BASKET'] = 'N';
                        break;
                }
            }
        }
    }
}

$sFilterName = $arParams['FILTER_NAME'];
$sPropertySection = $arParams['PROPERTY_SECTION'];

if (empty($sFilterName))
    $sFilterName = 'arFilter';

$arParams['FILTER_NAME'] = $sFilterName;
$arFilter = ArrayHelper::getValue($GLOBALS, $sFilterName);

if (!Type::isArray($arFilter))
    $arFilter = array();

if (!empty($sPropertySection))
    $arFilter['!PROPERTY_'.$sPropertySection] = false;

$GLOBALS[$sFilterName] = $arFilter;

$sView = ArrayHelper::getValue($arParams, 'VIEW_DESKTOP');
$sView = ArrayHelper::fromRange(['default.desktop'], $sView);
$arParams['VIEW_DESKTOP'] = $sView;

$sView = ArrayHelper::getValue($arParams, 'VIEW_MOBILE');
$sView = ArrayHelper::fromRange(['default.mobile', 'deployed.mobile'], $sView);
$arParams['VIEW_MOBILE'] = $sView;

$arParams['ITEMS_LIMIT'] = Type::toInteger($arParams['ITEMS_LIMIT']);

$sIBlockType = $arParams['IBLOCK_TYPE'];
$iIBlockId = $arParams['IBLOCK_ID'];
