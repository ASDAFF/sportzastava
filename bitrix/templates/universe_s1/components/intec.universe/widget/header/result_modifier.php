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
                $blocks = $properties->get('main_blocks');
                $bannerUse = ArrayHelper::getValue($blocks, ['templates', 'main_banner']) == 5;
                $basketUse = $properties->get('use_basket');
                $template = $properties->get('template_menu');

                switch ($template) {
                    case 1:
                        $arParams['POSITION_STICKERS'] = 'top_left';
                        $arParams['LOCATION_DISPLAY'] = 'Y';
                        $arParams['MAIL_DISPLAY'] = 'Y';
                        $arParams['MENU_INFO_DISPLAY'] = 'N';
                        $arParams['AUTH_DISPLAY'] = 'Y';
                        $arParams['POSITION_AUTH'] = 'top';
                        $arParams['DISPLAY_SEARCH'] = 'Y';
                        $arParams['TYPE_SEARCH'] = 'normal';
                        $arParams['POSITION_SEARCH'] = 'header';
                        $arParams['TAGLINE_DISPLAY'] = 'Y';
                        $arParams['BASKET_DISPLAY'] = 'Y';
                        $arParams['BASKET_DELAY_DISPLAY'] = 'Y';
                        $arParams['COMPARE_DISPLAY'] = 'Y';
                        $arParams['PHONE_DISPLAY_IN'] = 'header';
                        $arParams['PHONE_FORM_DISPLAY'] = 'Y';
                        $arParams['PHONE_FORM_BUTTON_TYPE'] = 'text';
                        $arParams['MENU_MAIN_DISPLAY_IN'] = 'default';
                        $arParams['MENU_MAIN_ROOT_TYPE'] = 'top';
                        $arParams['MENU_MAIN_CHILD_TYPE'] = 'left';
                        $arParams['MENU_DEFAULT_VIEW'] = 'color';
                        $arParams['HEADER_SHOW_SOCIAL'] = 'N';
                        break;
                    case 2:
                        $arParams['POSITION_STICKERS'] = 'top_right';
                        $arParams['LOCATION_DISPLAY'] = 'Y';
                        $arParams['MAIL_DISPLAY'] = 'Y';
                        $arParams['MENU_INFO_DISPLAY'] = 'Y';
                        $arParams['AUTH_DISPLAY'] = 'Y';
                        $arParams['POSITION_AUTH'] = 'top';
                        $arParams['DISPLAY_SEARCH'] = 'Y';
                        $arParams['TYPE_SEARCH'] = 'popup';
                        $arParams['POSITION_SEARCH'] = 'top';
                        $arParams['TAGLINE_DISPLAY'] = 'N';
                        $arParams['BASKET_DISPLAY'] = 'N';
                        $arParams['BASKET_DELAY_DISPLAY'] = 'N';
                        $arParams['COMPARE_DISPLAY'] = 'N';
                        $arParams['PHONE_DISPLAY_IN'] = 'header';
                        $arParams['PHONE_FORM_DISPLAY'] = 'Y';
                        $arParams['PHONE_FORM_BUTTON_TYPE'] = 'text';
                        $arParams['MENU_MAIN_DISPLAY_IN'] = 'header';
                        $arParams['MENU_MAIN_ROOT_TYPE'] = 'top';
                        $arParams['MENU_MAIN_CHILD_TYPE'] = 'left';
                        $arParams['HEADER_SHOW_SOCIAL'] = 'N';
                        break;
                    case 3:
                        $arParams['LOCATION_DISPLAY'] = 'N';
                        $arParams['MAIL_DISPLAY'] = 'N';
                        $arParams['MENU_INFO_DISPLAY'] = 'N';
                        $arParams['AUTH_DISPLAY'] = 'N';
                        $arParams['DISPLAY_SEARCH'] = 'N';
                        $arParams['TAGLINE_DISPLAY'] = 'N';
                        $arParams['BASKET_DISPLAY'] = 'N';
                        $arParams['BASKET_DELAY_DISPLAY'] = 'N';
                        $arParams['COMPARE_DISPLAY'] = 'N';
                        $arParams['PHONE_DISPLAY_IN'] = 'header';
                        $arParams['PHONE_FORM_DISPLAY'] = 'Y';
                        $arParams['PHONE_FORM_BUTTON_TYPE'] = 'text';
                        $arParams['MENU_MAIN_DISPLAY_IN'] = 'header';
                        $arParams['MENU_MAIN_ROOT_TYPE'] = 'top';
                        $arParams['MENU_MAIN_CHILD_TYPE'] = 'left';
                        $arParams['HEADER_SHOW_SOCIAL'] = 'N';
                        break;
                    case 4:
                        $arParams['LOCATION_DISPLAY'] = 'Y';
                        $arParams['MAIL_DISPLAY'] = 'Y';
                        $arParams['MENU_INFO_DISPLAY'] = 'N';
                        $arParams['AUTH_DISPLAY'] = 'Y';
                        $arParams['POSITION_AUTH'] = 'header';
                        $arParams['DISPLAY_SEARCH'] = 'Y';
                        $arParams['TYPE_SEARCH'] = 'normal';
                        $arParams['POSITION_SEARCH'] = 'header';
                        $arParams['TAGLINE_DISPLAY'] = 'N';
                        $arParams['BASKET_DISPLAY'] = 'Y';
                        $arParams['BASKET_DELAY_DISPLAY'] = 'Y';
                        $arParams['COMPARE_DISPLAY'] = 'Y';
                        $arParams['PHONE_DISPLAY_IN'] = 'header';
                        $arParams['PHONE_FORM_DISPLAY'] = 'Y';
                        $arParams['PHONE_FORM_BUTTON_TYPE'] = 'text';
                        $arParams['MENU_MAIN_DISPLAY_IN'] = 'default';
                        $arParams['MENU_MAIN_ROOT_TYPE'] = 'catalog';
                        $arParams['MENU_MAIN_CHILD_TYPE'] = 'catalog';
                        $arParams['POSITION_STICKERS'] = 'header';
                        $arParams['HEADER_SHOW_SOCIAL'] = 'N';
                        break;
                    case 5:
                        $arParams['POSITION_STICKERS'] = 'top_right';
                        $arParams['LOCATION_DISPLAY'] = 'Y';
                        $arParams['MAIL_DISPLAY'] = 'Y';
                        $arParams['MENU_INFO_DISPLAY'] = 'Y';
                        $arParams['AUTH_DISPLAY'] = 'Y';
                        $arParams['POSITION_AUTH'] = 'top';
                        $arParams['DISPLAY_SEARCH'] = 'Y';
                        $arParams['TYPE_SEARCH'] = 'popup';
                        $arParams['POSITION_SEARCH'] = 'top';
                        $arParams['TAGLINE_DISPLAY'] = 'N';
                        $arParams['BASKET_DISPLAY'] = 'Y';
                        $arParams['BASKET_DELAY_DISPLAY'] = 'Y';
                        $arParams['COMPARE_DISPLAY'] = 'Y';
                        $arParams['PHONE_DISPLAY_IN'] = 'header';
                        $arParams['PHONE_FORM_DISPLAY'] = 'Y';
                        $arParams['PHONE_FORM_BUTTON_TYPE'] = 'text';
                        $arParams['MENU_MAIN_DISPLAY_IN'] = 'header';
                        $arParams['MENU_MAIN_ROOT_TYPE'] = 'top';
                        $arParams['MENU_MAIN_CHILD_TYPE'] = 'left';
                        $arParams['HEADER_SHOW_SOCIAL'] = 'N';
                        break;
                    case 6:
                        $arParams['POSITION_STICKERS'] = 'top_left';
                        $arParams['LOCATION_DISPLAY'] = 'Y';
                        $arParams['MAIL_DISPLAY'] = 'Y';
                        $arParams['MENU_INFO_DISPLAY'] = 'N';
                        $arParams['AUTH_DISPLAY'] = 'Y';
                        $arParams['POSITION_AUTH'] = 'top';
                        $arParams['DISPLAY_SEARCH'] = 'Y';
                        $arParams['TYPE_SEARCH'] = 'normal';
                        $arParams['POSITION_SEARCH'] = 'header';
                        $arParams['TAGLINE_DISPLAY'] = 'Y';
                        $arParams['BASKET_DISPLAY'] = 'Y';
                        $arParams['BASKET_DELAY_DISPLAY'] = 'Y';
                        $arParams['COMPARE_DISPLAY'] = 'Y';
                        $arParams['PHONE_DISPLAY_IN'] = 'header';
                        $arParams['PHONE_FORM_DISPLAY'] = 'Y';
                        $arParams['PHONE_FORM_BUTTON_TYPE'] = 'text';
                        $arParams['MENU_MAIN_DISPLAY_IN'] = 'default';
                        $arParams['MENU_MAIN_ROOT_TYPE'] = 'catalog';
                        $arParams['MENU_MAIN_CHILD_TYPE'] = 'catalog';
                        $arParams['MENU_DEFAULT_VIEW'] = 'transparent';
                        $arParams['HEADER_SHOW_SOCIAL'] = 'N';
                        break;
                    case 7:
                        $arParams['POSITION_STICKERS'] = 'top_left';
                        $arParams['LOCATION_DISPLAY'] = 'Y';
                        $arParams['MAIL_DISPLAY'] = 'Y';
                        $arParams['MENU_INFO_DISPLAY'] = 'N';
                        $arParams['AUTH_DISPLAY'] = 'Y';
                        $arParams['POSITION_AUTH'] = 'top';
                        $arParams['DISPLAY_SEARCH'] = 'Y';
                        $arParams['TYPE_SEARCH'] = 'normal';
                        $arParams['POSITION_SEARCH'] = 'header';
                        $arParams['TAGLINE_DISPLAY'] = 'Y';
                        $arParams['BASKET_DISPLAY'] = 'N';
                        $arParams['BASKET_DELAY_DISPLAY'] = 'N';
                        $arParams['COMPARE_DISPLAY'] = 'N';
                        $arParams['PHONE_DISPLAY_IN'] = 'header';
                        $arParams['PHONE_FORM_DISPLAY'] = 'Y';
                        $arParams['PHONE_FORM_BUTTON_TYPE'] = 'text';
                        $arParams['MENU_MAIN_DISPLAY_IN'] = 'default';
                        $arParams['MENU_MAIN_ROOT_TYPE'] = 'catalog';
                        $arParams['MENU_MAIN_CHILD_TYPE'] = 'catalog';
                        $arParams['MENU_DEFAULT_VIEW'] = 'transparent';
                        $arParams['HEADER_SHOW_SOCIAL'] = 'N';
                        break;
                    case 8:
                        $arParams['POSITION_STICKERS'] = 'top_left';
                        $arParams['LOCATION_DISPLAY'] = 'Y';
                        $arParams['MAIL_DISPLAY'] = 'Y';
                        $arParams['MENU_INFO_DISPLAY'] = 'N';
                        $arParams['AUTH_DISPLAY'] = 'Y';
                        $arParams['POSITION_AUTH'] = 'top';
                        $arParams['DISPLAY_SEARCH'] = 'Y';
                        $arParams['TYPE_SEARCH'] = 'popup';
                        $arParams['POSITION_SEARCH'] = 'top';
                        $arParams['TAGLINE_DISPLAY'] = 'Y';
                        $arParams['BASKET_DISPLAY'] = 'N';
                        $arParams['BASKET_DELAY_DISPLAY'] = 'N';
                        $arParams['COMPARE_DISPLAY'] = 'N';
                        $arParams['PHONE_DISPLAY_IN'] = 'top';
                        $arParams['PHONE_FORM_DISPLAY'] = 'N';
                        $arParams['MENU_MAIN_DISPLAY_IN'] = 'header';
                        $arParams['MENU_DEFAULT_VIEW'] = 'transparent';
                        $arParams['MENU_MAIN_ROOT_TYPE'] = 'top';
                        $arParams['MENU_MAIN_CHILD_TYPE'] = 'left';
                        $arParams['HEADER_SHOW_SOCIAL'] = 'Y';
                        $arParams['POSITION_HEADER_SOCIAL'] = 'contacts';
                        break;
                    case 9:
                        $arParams['POSITION_STICKERS'] = 'top_right';
                        $arParams['LOCATION_DISPLAY'] = 'Y';
                        $arParams['MAIL_DISPLAY'] = 'Y';
                        $arParams['MENU_INFO_DISPLAY'] = 'N';
                        $arParams['AUTH_DISPLAY'] = 'Y';
                        $arParams['POSITION_AUTH'] = 'top';
                        $arParams['DISPLAY_SEARCH'] = 'Y';
                        $arParams['TYPE_SEARCH'] = 'popup';
                        $arParams['POSITION_SEARCH'] = 'top';
                        $arParams['TAGLINE_DISPLAY'] = 'N';
                        $arParams['BASKET_DISPLAY'] = 'N';
                        $arParams['BASKET_DELAY_DISPLAY'] = 'N';
                        $arParams['COMPARE_DISPLAY'] = 'N';
                        $arParams['PHONE_DISPLAY_IN'] = 'header';
                        $arParams['PHONE_FORM_DISPLAY'] = 'Y';
                        $arParams['PHONE_FORM_BUTTON_TYPE'] = 'text';
                        $arParams['MENU_MAIN_DISPLAY_IN'] = 'header';
                        $arParams['MENU_MAIN_ROOT_TYPE'] = 'top';
                        $arParams['MENU_MAIN_CHILD_TYPE'] = 'left';
                        $arParams['MENU_DEFAULT_VIEW'] = 'transparent';
                        $arParams['HEADER_SHOW_SOCIAL'] = 'Y';
                        $arParams['POSITION_HEADER_SOCIAL'] = 'default';
                        break;
                    case 10:
                        $arParams['POSITION_STICKERS'] = 'top_right';
                        $arParams['LOCATION_DISPLAY'] = 'Y';
                        $arParams['MAIL_DISPLAY'] = 'Y';
                        $arParams['MENU_INFO_DISPLAY'] = 'Y';
                        $arParams['AUTH_DISPLAY'] = 'Y';
                        $arParams['POSITION_AUTH'] = 'top';
                        $arParams['DISPLAY_SEARCH'] = 'Y';
                        $arParams['TYPE_SEARCH'] = 'popup';
                        $arParams['POSITION_SEARCH'] = 'top';
                        $arParams['TAGLINE_DISPLAY'] = 'N';
                        $arParams['BASKET_DISPLAY'] = 'N';
                        $arParams['BASKET_DELAY_DISPLAY'] = 'N';
                        $arParams['COMPARE_DISPLAY'] = 'N';
                        $arParams['PHONE_DISPLAY_IN'] = 'header';
                        $arParams['PHONE_FORM_DISPLAY'] = 'Y';
                        $arParams['PHONE_FORM_BUTTON_TYPE'] = 'text';
                        $arParams['MENU_MAIN_DISPLAY_IN'] = 'header';
                        $arParams['MENU_MAIN_ROOT_TYPE'] = 'top';
                        $arParams['MENU_MAIN_CHILD_TYPE'] = 'left';
                        $arParams['MENU_DEFAULT_VIEW'] = 'transparent';
                        $arParams['HEADER_SHOW_SOCIAL'] = 'N';
                        break;
                    case 11:
                        $arParams['LOCATION_DISPLAY'] = 'Y';
                        $arParams['MAIL_DISPLAY'] = 'Y';
                        $arParams['MENU_INFO_DISPLAY'] = 'N';
                        $arParams['AUTH_DISPLAY'] = 'Y';
                        $arParams['POSITION_AUTH'] = 'header';
                        $arParams['DISPLAY_SEARCH'] = 'Y';
                        $arParams['TYPE_SEARCH'] = 'popup';
                        $arParams['POSITION_SEARCH'] = 'header';
                        $arParams['TAGLINE_DISPLAY'] = 'N';
                        $arParams['BASKET_DISPLAY'] = 'Y';
                        $arParams['BASKET_DELAY_DISPLAY'] = 'Y';
                        $arParams['COMPARE_DISPLAY'] = 'Y';
                        $arParams['PHONE_DISPLAY_IN'] = 'header';
                        $arParams['PHONE_FORM_DISPLAY'] = 'Y';
                        $arParams['PHONE_FORM_BUTTON_TYPE'] = 'button';
                        $arParams['MENU_MAIN_DISPLAY_IN'] = 'popup';
                        $arParams['POPUP_MENU_TYPE'] = 'full';
                        $arParams['POSITION_STICKERS'] = 'header';
                        $arParams['HEADER_SHOW_SOCIAL'] = 'N';
                        break;
                    case 12:
                        $arParams['LOCATION_DISPLAY'] = 'Y';
                        $arParams['MAIL_DISPLAY'] = 'Y';
                        $arParams['MENU_INFO_DISPLAY'] = 'N';
                        $arParams['AUTH_DISPLAY'] = 'Y';
                        $arParams['POSITION_AUTH'] = 'header';
                        $arParams['DISPLAY_SEARCH'] = 'Y';
                        $arParams['TYPE_SEARCH'] = 'popup';
                        $arParams['POSITION_SEARCH'] = 'header';
                        $arParams['TAGLINE_DISPLAY'] = 'N';
                        $arParams['BASKET_DISPLAY'] = 'N';
                        $arParams['BASKET_DELAY_DISPLAY'] = 'N';
                        $arParams['COMPARE_DISPLAY'] = 'N';
                        $arParams['PHONE_DISPLAY_IN'] = 'header';
                        $arParams['PHONE_FORM_DISPLAY'] = 'Y';
                        $arParams['PHONE_FORM_BUTTON_TYPE'] = 'button';
                        $arParams['MENU_MAIN_DISPLAY_IN'] = 'popup';
                        $arParams['POPUP_MENU_TYPE'] = 'full';
                        $arParams['POSITION_STICKERS'] = 'header';
                        $arParams['HEADER_SHOW_SOCIAL'] = 'N';
                        break;
                }

                if (!$basketUse) {
                    $arParams['BASKET_DISPLAY'] = 'N';
                    $arParams['BASKET_DELAY_DISPLAY'] = 'N';
                    $arParams['COMPARE_DISPLAY'] = 'N';
                }

                if ($arParams['WITH_BANNER'] == 'GLOBAL' && $bannerUse)
                    $arParams['WITH_BANNER'] = 'Y';
            }
        }
    }
}

if ($arParams['WITH_BANNER'] == 'GLOBAL')
    $arParams['WITH_BANNER'] = 'N';

$sDisplayIn = ArrayHelper::getValue($arParams, 'MENU_MAIN_DISPLAY_IN');
$sDisplayIn = ArrayHelper::fromRange(array('default', 'header', 'popup'), $sDisplayIn);
$arParams['MENU_MAIN_DISPLAY_IN'] = $sDisplayIn;

$sDisplayIn = ArrayHelper::getValue($arParams, 'PHONE_DISPLAY_IN');
$sDisplayIn = ArrayHelper::fromRange(array('default', 'header'), $sDisplayIn);
$arParams['PHONE_DISPLAY_IN'] = $sDisplayIn;

$arHandleParameters = array(
    'LOGOTYPE_PATH',
    'LOGOTYPE_MOBILE_PATH',
    'LOGIN_URL',
    'PROFILE_URL',
    'FORGOT_PASSWORD_URL',
    'REGISTER_URL',
    'BASKET_URL',
    'COMPARE_URL',
    'CONSENT_URL',
    'AUTH_URL',
    'SEARCH_PAGE',
    'SEARCH_PAGE_CATALOG',
    'MENU_CATALOG_LINK'
);

foreach ($arHandleParameters as $sParameter) {
    $sValue = ArrayHelper::getValue($arParams, $sParameter, '');
    $sValue = StringHelper::replaceMacros($sValue, array(
        'SITE_DIR' => SITE_DIR
    ));

    $arResult[$sParameter] = $sValue;
    $arParams[$sParameter] = $sValue;
}


$build = Build::getCurrent();
$properties = null;

if (!empty($build)) {
    $page = $build->getPage();
    $properties = $page->getProperties();
}

$sView = ArrayHelper::getValue($arParams, 'MOBILE_VIEW');
if ($sView == 'settings') {
    switch ($properties->get('template_mobile_header')) {
        case 'white':
            $arParams['MOBILE_VIEW'] = 'default';
            $arParams['W_HEADER_PARAMETERS_AUTH_MOBILE_DISPLAY'] = 'N';
            break;
        case 'colored':
            $arParams['MOBILE_VIEW'] = 'colored';
            $arParams['W_HEADER_PARAMETERS_AUTH_MOBILE_DISPLAY'] = 'N';
            break;
        case 'white_with_icons':
            $arParams['MOBILE_VIEW'] = 'default';
            $arParams['W_HEADER_PARAMETERS_AUTH_MOBILE_DISPLAY'] = 'Y';
            break;
        case 'colored_with_icons':
            $arParams['MOBILE_VIEW'] = 'colored';
            $arParams['W_HEADER_PARAMETERS_AUTH_MOBILE_DISPLAY'] = 'Y';
            break;
    }
}

$sView = ArrayHelper::getValue($arParams, 'FIXED_HEADER');
if ($sView == 'settings') {
    switch ($properties->get('use_fixed_header')) {
        case 1:
            $arParams['FIXED_HEADER'] = 'Y';
            break;
        default:
            $arParams['FIXED_HEADER'] = 'N';
            break;
    }
}

$sView = ArrayHelper::getValue($arParams, 'FIXED_HEADER_MOBILE');
if ($sView == 'settings') {
    switch ($properties->get('use_fixed_mobile_header')) {
        case 1:
            $arParams['FIXED_HEADER_MOBILE'] = 'Y';
            break;
        default:
            $arParams['FIXED_HEADER_MOBILE'] = 'N';
            break;
    }
}

switch ($properties->get('search_mode')) {
    case 'catalog':
        $arParams['SEARCH_PAGE'] = $arParams['SEARCH_PAGE_CATALOG'];
        break;
}