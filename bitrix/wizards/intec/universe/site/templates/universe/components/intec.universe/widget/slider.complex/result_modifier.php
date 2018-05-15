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
            $code = 'main_banner';
            $page = $build->getPage();
            $properties = $page->getProperties();
            $propertiesUse = $properties->get('use_global_settings') && $propertiesUse;

            if ($propertiesUse) {
                $blocks = $properties->get('main_blocks');

                $views = [
                    'desktop' => ArrayHelper::getValue($blocks, ['templates', $code])
                ];

                switch ($views['desktop']) {
                    case 2:
                        $arParams['SLIDER_CB_PROPERTY_VIEW'] = 'standart';
                        break;
                    case 3:
                        $arParams['SLIDER_CB_PROPERTY_VIEW'] = 'left';
                        $arParams['SLIDER_CB_PROPERTY_COUNT'] = 4;
                        break;
                    case 4:
                        $arParams['SLIDER_CB_PROPERTY_VIEW'] = 'left';
                        $arParams['SLIDER_CB_PROPERTY_COUNT'] = 2;
                        break;
                }
            }
        }
    }
}