<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\StringHelper;
use intec\constructor\models\Build;

/**
 * @var array $arParams
 * @var array $arResult
 * CBitrixComponentTemplate $this
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
            $page = $build->getPage();
            $properties = $page->getProperties();
            $propertiesUse = $properties->get('use_global_settings') && $propertiesUse;

            if ($propertiesUse) {
                $template = $properties->get('template_footer');
                $template = ArrayHelper::fromRange([1,2,3,4,5], $template);
                $theme = $properties->get('footer_theme');

                $arParams['FOOTER_DESIGN'] = 'TYPE_'.$template;
                $arParams['FOOTER_BLACK'] = 'N';

                if ($theme == 'dark')
                    $arParams['FOOTER_BLACK'] = 'Y';
            }
        }
    }
}

$arHandleParameters = array(
    'FOOTER_SHOW_SEARCH_PATH',
    'CONSENT_URL'
);

foreach ($arHandleParameters as $sParameter) {
    $sValue = ArrayHelper::getValue($arParams, $sParameter, '');
    $sValue = StringHelper::replaceMacros($sValue, array(
        'SITE_DIR' => SITE_DIR
    ));

    $arResult[$sParameter] = $sValue;
}