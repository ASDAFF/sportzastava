<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;
use intec\constructor\models\Build;

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
            $code = 'articles';
            $page = $build->getPage();
            $properties = $page->getProperties();
            $propertiesUse = $properties->get('use_global_settings') && $propertiesUse;

            if ($propertiesUse) {
                $blocks = $properties->get('main_blocks');

                $views = [
                    'desktop' => ArrayHelper::getValue($blocks, ['templates', $code])
                ];

                switch ($views['desktop']) {
                    case 'default':
                        $arParams['BIG_FIRST_BLOCK'] = 'N';
                        $arParams['ELEMENTS_COUNT'] = 4;
                        break;
                    case 'with_big_block':
                        $arParams['BIG_FIRST_BLOCK'] = 'Y';
                        $arParams['ELEMENTS_COUNT'] = 3;
                        break;
                }
            }
        }
    }
}