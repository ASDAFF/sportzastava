<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\RegExp;

/**
 * @var array $arCurrentValues
 */

if (!Loader::includeModule('intec.core') || !Loader::includeModule('iblock'))
    return;

$bBase = false;
if (Loader::includeModule('catalog'))
    $bBase = true;

$arForms = array();
$sSite = false;

if (!empty($_REQUEST['site'])) {
    $sSite = $_REQUEST['site'];
} else if (!empty($_REQUEST['src_site'])) {
    $sSite = $_REQUEST['src_site'];
}

$arIBlocksTypes = CIBlockParameters::GetIBlockTypes();

$arMenuTypes = GetMenuTypes($sSite);

$arTemplateParameters = array();
$arTemplateParameters['USE_SETTINGS'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_USE_SETTINGS'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'Y'
);
$arTemplateParameters['MENU_MAIN_ROOT_TYPE'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_MAIN_ROOT_TYPE'),
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'DEFAULT ' => 'left',
    'VALUES' => $arMenuTypes,
    'ADDITIONAL_VALUES'	=> 'Y'
);

$arTemplateParameters['MENU_MAIN_MAX_LEVEL'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_MAIN_MAX_LEVEL'),
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'DEFAULT ' => 1,
    'VALUES' => array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
    ),
    'ADDITIONAL_VALUES'	=> 'Y'
);

$arTemplateParameters['MENU_MAIN_CHILD_TYPE'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_MAIN_CHILD_TYPE'),
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'DEFAULT ' => 'left',
    'VALUES' => $arMenuTypes,
    'ADDITIONAL_VALUES'	=> 'Y'
);

$arTemplateParameters['MENU_MAIN_DISPLAY'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_MAIN_DISPLAY'),
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y'
);

if ($arCurrentValues['MENU_MAIN_DISPLAY'] == 'Y') {
    $arTemplateParameters['MENU_MAIN_DISPLAY_IN'] = array(
        'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_MAIN_DISPLAY_IN'),
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'REFRESH' => 'Y',
        'VALUES' => array(
            'default' => GetMessage('W_HEADER_PARAMETERS_MENU_MAIN_DISPLAY_IN_DEFAULT'),
            'header' => GetMessage('W_HEADER_PARAMETERS_MENU_MAIN_DISPLAY_IN_HEADER'),
            'popup' => GetMessage('W_HEADER_PARAMETERS_MENU_MAIN_DISPLAY_IN_POPUP')
        )
    );
    $arTemplateParameters['POPUP_MENU_TYPE'] = array(
        'NAME' => GetMessage('W_HEADER_PARAMETERS_POPUP_MENU_TYPE'),
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'VALUES' => array(
            'catalog' => GetMessage('W_HEADER_PARAMETERS_POPUP_MENU_TYPE_CATALOG'),
            'full' => GetMessage('W_HEADER_PARAMETERS_POPUP_MENU_TYPE_FULL')
        )
    );
}

$sIBlockType = $arCurrentValues['CATALOG_IBLOCK_TYPE'];
$arIBlocks = array();
$arIBlocksFilter = array();
$arIBlocksFilter['ACTIVE'] = 'Y';

if (!empty($sIBlockType))
    $arIBlocksFilter['TYPE'] = $sIBlockType;

$rsIBlocks = CIBlock::GetList(array('SORT' => 'ASC'), $arIBlocksFilter);

while ($arIBlock = $rsIBlocks->Fetch())
    $arIBlocks[$arIBlock['ID']] = '['.$arIBlock['ID'].'] '.$arIBlock['NAME'];

$arTemplateParameters['CATALOG_IBLOCK_TYPE'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_CATALOG_IBLOCK_TYPE'),
    'VALUES' => $arIBlocksTypes,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);

$arTemplateParameters['CATALOG_IBLOCK_ID'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_CATALOG_IBLOCK_ID'),
    'VALUES' => $arIBlocks,
    'ADDITIONAL_VALUES' => 'Y'
);

if ($arCurrentValues['MENU_MAIN_DISPLAY_IN'] == 'popup') {
    $arTemplateParameters['POPUP_MENU_BACKGROUND'] = array(
        'NAME' => GetMessage('W_HEADER_PARAMETERS_POPUP_MENU_BACKGROUND'),
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'REFRESH' => 'Y',
        'VALUES' => array(
            'light' => GetMessage('W_HEADER_PARAMETERS_POPUP_MENU_BACKGROUND_LIGHT'),
            'color' => GetMessage('W_HEADER_PARAMETERS_POPUP_MENU_BACKGROUND_COLOR'),
            'dark' => GetMessage('W_HEADER_PARAMETERS_POPUP_MENU_BACKGROUND_DARK')
        )
    );
}

$arTemplateParameters['MENU_INFO_ROOT_TYPE'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_INFO_ROOT_TYPE'),
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'DEFAULT ' => 'left',
    'VALUES' => $arMenuTypes,
    'ADDITIONAL_VALUES'	=> 'Y'
);

$arTemplateParameters['FIXED_HEADER'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_FIXED_HEADER'),
    'PARENT' => 'VISUAL',
    'TYPE' => 'LIST',
    'DEFAULT ' => 'Y',
    'VALUES' => array(
        'settings' => GetMessage('W_HEADER_PARAMETERS_FIXED_HEADER_SETTINGS'),
        'Y' => GetMessage('W_HEADER_PARAMETERS_FIXED_HEADER_YES'),
        'N' => GetMessage('W_HEADER_PARAMETERS_FIXED_HEADER_NO')
    )
);

$arTemplateParameters['FIXED_HEADER_MOBILE'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_FIXED_HEADER_MOBILE'),
    'PARENT' => 'VISUAL',
    'TYPE' => 'LIST',
    'DEFAULT ' => 'Y',
    'VALUES' => array(
        'settings' => GetMessage('W_HEADER_PARAMETERS_FIXED_HEADER_MOBILE_SETTINGS'),
        'Y' => GetMessage('W_HEADER_PARAMETERS_FIXED_HEADER_MOBILE_YES'),
        'N' => GetMessage('W_HEADER_PARAMETERS_FIXED_HEADER_MOBILE_NO')
    )
);

$arTemplateParameters['MENU_CATALOG_LINK'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_CATALOG_LINK'),
    'PARENT' => 'BASE',
    'TYPE' => 'STRING',
    'DEFAULT ' => SITE_DIR.'catalog/'
);

$arTemplateParameters['MENU_INFO_MAX_LEVEL'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_INFO_MAX_LEVEL'),
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'DEFAULT ' => 1,
    'VALUES' => array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
    ),
    'ADDITIONAL_VALUES'	=> 'Y'
);

$arTemplateParameters['MENU_INFO_CHILD_TYPE'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_INFO_CHILD_TYPE'),
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'DEFAULT ' => 'left',
    'VALUES' => $arMenuTypes,
    'ADDITIONAL_VALUES'	=> 'Y'
);

$arTemplateParameters['MENU_INFO_DISPLAY'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_INFO_DISPLAY'),
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y'
);

$arTemplateParameters['MENU_MOBILE_ROOT_TYPE'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_MOBILE_ROOT_TYPE'),
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'DEFAULT ' => 'left',
    'VALUES' => $arMenuTypes,
    'ADDITIONAL_VALUES'	=> 'Y'
);

$arTemplateParameters['MENU_MOBILE_MAX_LEVEL'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_MOBILE_MAX_LEVEL'),
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'DEFAULT ' => 1,
    'VALUES' => array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
    ),
    'ADDITIONAL_VALUES'	=> 'Y'
);

$arTemplateParameters['MENU_MOBILE_CHILD_TYPE'] = array(
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_MOBILE_CHILD_TYPE'),
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'DEFAULT ' => 'left',
    'VALUES' => $arMenuTypes,
    'ADDITIONAL_VALUES'	=> 'Y'
);

$arFields = array();
$rsFields = CUserTypeEntity::GetList(array('SORT' => 'ASC'), array(
    'USER_TYPE_ID' => 'file'
));
$oExpression = new RegExp('IBLOCK_\d+_SECTION');

while ($arField = $rsFields->Fetch())
    if ($oExpression->isMatch($arField['ENTITY_ID']))
        $arFields[$arField['FIELD_NAME']] = $arField['FIELD_NAME'];

$arTemplateParameters['MENU_PROPERTY_IMAGE'] = array(
    'PARENT' => 'DATA_SOURCE',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_PROPERTY_IMAGE'),
    'TYPE' => 'LIST',
    'VALUES' => $arFields,
    'ADDITIONAL_VALUES' => 'Y'
);

$arTemplateParameters['MENU_DEFAULT_VIEW'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_DEFAULT_VIEW'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'color' => GetMessage('W_HEADER_PARAMETERS_MENU_DEFAULT_VIEW_COLOR'),
        'transparent' => GetMessage('W_HEADER_PARAMETERS_MENU_DEFAULT_VIEW_TRANSPARENT')
    )
);

$arTemplateParameters['MENU_SECTION_VIEW'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_SECTION_VIEW'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'default' => GetMessage('W_HEADER_PARAMETERS_MENU_SECTION_VIEW_DEFAULT'),
        'with.images' => GetMessage('W_HEADER_PARAMETERS_MENU_SECTION_VIEW_WITH_IMAGES')
    ),
    'REFRESH' => 'Y'
);

if ($arCurrentValues['MENU_SECTION_VIEW'] == 'with.images') {
    $arTemplateParameters['MENU_SECTION_VIEW_SUBSECTION_COUNT'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_MENU_SECTION_VIEW_SUBSECTION_COUNT'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5'
        ),
        'DEFAULT' => 3,
        'ADDITIONAL_VALUES' => 'Y'
    );
}

$arTemplateParameters['AUTH_DISPLAY'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_AUTH_DISPLAY')
);
$arTemplateParameters['POSITION_AUTH'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_POSITION_AUTH'),
    'VALUES' => array(
        'top' => GetMessage('W_HEADER_PARAMETERS_POSITION_AUTH_TOP'),
        'header' => GetMessage('W_HEADER_PARAMETERS_POSITION_AUTH_HEADER')
    )
);

$arTemplateParameters['AUTH_MOBILE_DISPLAY'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_AUTH_MOBILE_DISPLAY'),
    'REFRESH' => 'Y'
);

if ($arCurrentValues['AUTH_MOBILE_DISPLAY'] == 'Y') {
    $arTemplateParameters['AUTH_MOBILE_PROFILE_DISPLAY'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'CHECKBOX',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_AUTH_MOBILE_PROFILE_DISPLAY')
    );

    $arTemplateParameters['AUTH_MOBILE_LOGIN_DISPLAY'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'CHECKBOX',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_AUTH_MOBILE_LOGIN_DISPLAY')
    );

    $arTemplateParameters['AUTH_MOBILE_LOGOUT_DISPLAY'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'CHECKBOX',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_AUTH_MOBILE_LOGOUT_DISPLAY')
    );
}

$arTemplateParameters['LOGOTYPE_PATH'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_LOGOTYPE_PATH')
);

$arTemplateParameters['LOGOTYPE_MOBILE_PATH'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_LOGOTYPE_MOBILE_PATH')
);

$arTemplateParameters['TAGLINE_DISPLAY'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_TAGLINE_DISPLAY'),
    'REFRESH' => 'Y'
);

if ($arCurrentValues['TAGLINE_DISPLAY'] == 'Y') {
    $arTemplateParameters['TAGLINE'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'STRING',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_TAGLINE')
    );
}

$arTemplateParameters['POSITION_STICKERS'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_POSITION_STICKERS'),
    'VALUES' => array(
        'top_left' => GetMessage('W_HEADER_PARAMETERS_POSITION_STICKERS_TOP_LEFT'),
        'top_right' => GetMessage('W_HEADER_PARAMETERS_POSITION_STICKERS_TOP_RIGHT'),
        'header' => GetMessage('W_HEADER_PARAMETERS_POSITION_STICKERS_HEADER')
    ),
    'REFRESH' => 'Y'
);

$arTemplateParameters['LOCATION_DISPLAY'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_LOCATION_DISPLAY'),
    'REFRESH' => 'Y'
);

if ($arCurrentValues['LOCATION_DISPLAY'] == 'Y') {
    $arTemplateParameters['LOCATION'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'STRING',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_LOCATION')
    );
}

$arTemplateParameters['MAIL_DISPLAY'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MAIL_DISPLAY'),
    'REFRESH' => 'Y'
);

if ($arCurrentValues['MAIL_DISPLAY'] == 'Y') {
    $arTemplateParameters['MAIL'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'STRING',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_MAIL')
    );
}

$arTemplateParameters['PHONE_DISPLAY'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_PHONE_DISPLAY'),
    'REFRESH' => 'Y'
);

if (Loader::includeModule('form')) {
    require_once('parameters/base.php');
} else if (Loader::includeModule('intec.startshop')) {
    require_once('parameters/lite.php');
}

$arTemplateParameters['PHONE_FORM'] = array(
    'PARENT' => 'DATA_SOURCE',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_PHONE_FORM'),
    'VALUES' => $arForms,
    'ADDITIONAL_VALUES' => 'Y'
);

if ($arCurrentValues['PHONE_DISPLAY'] == 'Y') {

    $arTemplateParameters['PHONE_DISPLAY_IN'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_PHONE_DISPLAY_IN'),
        'VALUES' => array(
            'default' => GetMessage('W_HEADER_PARAMETERS_PHONE_DISPLAY_IN_DEFAULT'),
            'header' => GetMessage('W_HEADER_PARAMETERS_PHONE_DISPLAY_IN_HEADER')
        ),
        'REFRESH' => 'Y'
    );

    if ($arCurrentValues['PHONE_DISPLAY_IN'] == 'header') {
        $arTemplateParameters['PHONE_FORM_DISPLAY'] = array(
            'PARENT' => 'VISUAL',
            'TYPE' => 'CHECKBOX',
            'NAME' => GetMessage('W_HEADER_PARAMETERS_PHONE_FORM_DISPLAY')
        );

        $arTemplateParameters['PHONE_FORM_BUTTON_TYPE'] = array(
            'PARENT' => 'VISUAL',
            'TYPE' => 'LIST',
            'NAME' => GetMessage('W_HEADER_PARAMETERS_PHONE_FORM_BUTTON_TYPE'),
            'VALUES' => array(
                'text' => GetMessage('W_HEADER_PARAMETERS_PHONE_FORM_BUTTON_TYPE_TEXT'),
                'button' => GetMessage('W_HEADER_PARAMETERS_PHONE_FORM_BUTTON_TYPE_BUTTON')
            )
        );
    }

    $arTemplateParameters['PHONE'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'STRING',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_PHONE'),
        'MULTIPLE' => 'Y'
    );
}

if ($arCurrentValues['POSITION_STICKERS'] == 'top_left' || $arCurrentValues['POSITION_STICKERS'] == 'top_right') {
    $arTemplateParameters['HEADER_SHOW_SOCIAL'] = array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_SHOW_SOCIAL'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'N',
        'REFRESH' => 'Y'
    );
    if ($arCurrentValues['HEADER_SHOW_SOCIAL'] == 'Y') {
        $arTemplateParameters['POSITION_HEADER_SOCIAL'] = array(
            'PARENT' => 'VISUAL',
            'NAME' => GetMessage('W_HEADER_PARAMETERS_POSITION_HEADER_SOCIAL'),
            'TYPE' => 'LIST',
            'VALUES' => array(
                'default' => GetMessage('W_HEADER_PARAMETERS_POSITION_HEADER_SOCIAL_DEFAULT'),
                'contacts' => GetMessage('W_HEADER_PARAMETERS_POSITION_HEADER_SOCIAL_CONTACTS')
            )
        );
        $arTemplateParameters["HEADER_VK"] = array(
            'PARENT' => 'VISUAL',
            'NAME' => GetMessage('W_HEADER_PARAMETERS_SOCIAL_VK'),
            'TYPE' => 'STRING',
        );
        $arTemplateParameters["HEADER_FACEBOOK"] = array(
            'PARENT' => 'VISUAL',
            'NAME' => GetMessage('W_HEADER_PARAMETERS_SOCIAL_VK_FACEBOOK'),
            'TYPE' => 'STRING',
        );
        $arTemplateParameters["HEADER_INSTAGRAM"] = array(
            'PARENT' => 'VISUAL',
            'NAME' => GetMessage('W_HEADER_PARAMETERS_SOCIAL_VK_INSTAGRAM'),
            'TYPE' => 'STRING',
        );
        $arTemplateParameters["HEADER_TWITTER"] = array(
            'PARENT' => 'VISUAL',
            'NAME' => GetMessage('W_HEADER_PARAMETERS_SOCIAL_VK_TWITTER'),
            'TYPE' => 'STRING',
        );
    }
}

$arTemplateParameters['LOGIN_URL'] = array(
    'PARENT' => 'URL_TEMPLATES',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_LOGIN_URL')
);

$arTemplateParameters['PROFILE_URL'] = array(
    'PARENT' => 'URL_TEMPLATES',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_PROFILE_URL')
);

$arTemplateParameters['FORGOT_PASSWORD_URL'] = array(
    'PARENT' => 'URL_TEMPLATES',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_FORGOT_PASSWORD_URL')
);

$arTemplateParameters['REGISTER_URL'] = array(
    'PARENT' => 'URL_TEMPLATES',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_REGISTER_URL')
);

$arTemplateParameters['BASKET_URL'] = array(
    'PARENT' => 'URL_TEMPLATES',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_BASKET_URL')
);

$arTemplateParameters['COMPARE_URL'] = array(
    'PARENT' => 'URL_TEMPLATES',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_COMPARE_URL')
);

$arTemplateParameters['CONSENT_URL'] = array(
    'PARENT' => 'URL_TEMPLATES',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_CONSENT_URL')
);

$arTemplateParameters['BASKET_DISPLAY'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_BASKET_DISPLAY')
);

$arTemplateParameters['BASKET_MOBILE_DISPLAY'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_BASKET_MOBILE_DISPLAY')
);

if ($bBase) {
    $arTemplateParameters['BASKET_DELAY_DISPLAY'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'CHECKBOX',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_BASKET_DELAY_DISPLAY'),
        'DEFAULT' => 'N'
    );
}

$arTemplateParameters['COMPARE_DISPLAY'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_COMPARE_DISPLAY'),
    'REFRESH' => 'Y'
);

if ($arCurrentValues['COMPARE_DISPLAY'] == 'Y') {
    $sIBlockType = $arCurrentValues['COMPARE_IBLOCK_TYPE'];
    $arIBlocks = array();
    $arIBlocksFilter = array();
    $arIBlocksFilter['ACTIVE'] = 'Y';

    if (!empty($sIBlockType))
        $arIBlocksFilter['TYPE'] = $sIBlockType;

    $rsIBlocks = CIBlock::GetList(array('SORT' => 'ASC'), $arIBlocksFilter);

    while ($arIBlock = $rsIBlocks->Fetch())
        $arIBlocks[$arIBlock['ID']] = '['.$arIBlock['ID'].'] '.$arIBlock['NAME'];

    $iIBlockId = (int)$arCurrentValues['COMPARE_IBLOCK_ID'];

    $arTemplateParameters['COMPARE_CODE'] = array(
        'PARENT' => 'BASE',
        'TYPE' => 'STRING',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_COMPARE_CODE')
    );

    $arTemplateParameters['COMPARE_IBLOCK_TYPE'] = array(
        'PARENT' => 'BASE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_COMPARE_IBLOCK_TYPE'),
        'VALUES' => $arIBlocksTypes,
        'ADDITIONAL_VALUES' => 'Y',
        'REFRESH' => 'Y'
    );

    $arTemplateParameters['COMPARE_IBLOCK_ID'] = array(
        'PARENT' => 'BASE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_COMPARE_IBLOCK_ID'),
        'VALUES' => $arIBlocks,
        'ADDITIONAL_VALUES' => 'Y'
    );
}

$arTemplateParameters['MOBILE_VIEW'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MOBILE_VIEW'),
    'VALUES' => array(
        'settings' => GetMessage('W_HEADER_PARAMETERS_MOBILE_VIEW_SETTINGS'),
        'default' => GetMessage('W_HEADER_PARAMETERS_MOBILE_VIEW_DEFAULT'),
        'colored' => GetMessage('W_HEADER_PARAMETERS_MOBILE_VIEW_COLORED')
    )
);

$arTemplateParameters['MOBILE_LOGOTYPE_CENTERED'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_MOBILE_LOGOTYPE_CENTERED')
);

$arTemplateParameters['DISPLAY_SEARCH'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_DISPLAY_SEARCH'),
);

$arTemplateParameters['DISPLAY_SEARCH_MOBILE'] = array(
    'PARENT' => 'VISUAL',
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y',
    'NAME' => GetMessage('W_HEADER_PARAMETERS_DISPLAY_SEARCH_MOBILE'),
);

if ($arCurrentValues['DISPLAY_SEARCH'] == 'Y') {
    $arTemplateParameters['TYPE_SEARCH'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'REFRESH' => 'Y',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_TYPE_SEARCH'),
        'VALUES' => array(
            'normal' => GetMessage('W_HEADER_PARAMETERS_TYPE_SEARCH_NORMAL'),
            'popup' => GetMessage('W_HEADER_PARAMETERS_TYPE_SEARCH_POPUP'),
        )
    );
}


if ($arCurrentValues['DISPLAY_SEARCH'] == 'Y' || $arCurrentValues['DISPLAY_SEARCH_MOBILE'] == 'Y'){
    $arTemplateParameters['SEARCH_PAGE'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'STRING',
        'DEFAULT' => SITE_DIR.'search/',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_SEARCH_PAGE'),
    );
}

if ($arCurrentValues['DISPLAY_SEARCH'] == 'Y' && $arCurrentValues['TYPE_SEARCH'] == 'normal' && $arCurrentValues['MENU_MAIN_DISPLAY_IN'] == 'default') {
    $arTemplateParameters['POSITION_SEARCH'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('W_HEADER_PARAMETERS_POSITION_SEARCH'),
        'VALUES' => array(
            'top' => GetMessage('W_HEADER_PARAMETERS_POSITION_SEARCH_TOP'),
            'header' => GetMessage('W_HEADER_PARAMETERS_POSITION_SEARCH_HEADER'),
        )
    );
}


$arTemplateParameters['WITH_BANNER'] = array(
    'NAME' => GetMessage('W_HEADER_WITH_BANNER'),
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'VALUES' => array(
        'N' => GetMessage('W_HEADER_WITH_BANNER_N'),
        'Y' => GetMessage('W_HEADER_WITH_BANNER_Y'),
        'GLOBAL' => GetMessage('W_HEADER_WITH_BANNER_GLOBAL')
    ),
    'REFRESH' => 'Y'
);
if (in_array($arCurrentValues['WITH_BANNER'], array('Y', 'GLOBAL'))) {
    $bannerIBlocksFilter = array();
    if (!empty($arCurrentValues['BANNER_IBLOCK_TYPE'])) {
        $bannerIBlocksFilter['TYPE'] = $arCurrentValues['BANNER_IBLOCK_TYPE'];
    }
    $bannerIBlocksArray = array();
    $bannerIBlocks = CIBlock::GetList(array('SORT' => 'ASC'), $bannerIBlocksFilter);
    while ($row = $bannerIBlocks->Fetch()) {
        $bannerIBlocksArray[$row['ID']] = '['. $row['ID'] .'] ' . $row['NAME'];
    }
    unset($bannerIBlocks);

    $arTemplateParameters['BANNER_IBLOCK_TYPE'] = array(
        'NAME' => GetMessage('W_HEADER_BANNER_IBLOCK_TYPE'),
        'PARENT' => 'BASE',
        'TYPE' => 'LIST',
        'VALUES' => $arIBlocksTypes,
        'ADDITIONAL_VALUES'	=> 'Y',
        'REFRESH' => 'Y'
    );
    $arTemplateParameters['BANNER_IBLOCK_ID'] = array(
        'NAME' => GetMessage('W_HEADER_BANNER_IBLOCK_ID'),
        'PARENT' => 'BASE',
        'TYPE' => 'LIST',
        'VALUES' => $bannerIBlocksArray,
        'ADDITIONAL_VALUES'	=> 'Y',
        'REFRESH' => 'Y'
    );
    $arTemplateParameters['BANNER_SLIDER_COUNT'] = array(
        'NAME' => GetMessage('W_HEADER_BANNER_SLIDER_COUNT'),
        'PARENT' => 'BASE',
        'TYPE' => 'STRING'
    );
    $arTemplateParameters['BANNER_ACTIVE_ELEMENTS'] = array(
        'NAME' => GetMessage('W_HEADER_BANNER_ACTIVE_ELEMENTS'),
        'PARENT' => 'BASE',
        'TYPE' => 'CHECKBOX'
    );

    if (!empty($arCurrentValues['BANNER_IBLOCK_ID'])) {

        $arPropertiesString = array();
        $arPropertiesBoolean = array();
        $arPropertiesFile = array();
        $arPropertiesList = array();
        $arIBlockProperties = array();

        $rsIBlockProperties = CIBlockProperty::GetList(array(
            'SORT' => 'ASC'
        ), array(
            'ACTIVE' => 'Y',
            'IBLOCK_ID' => $arCurrentValues['BANNER_IBLOCK_ID']
        ));

        while ($arIBlockProperty = $rsIBlockProperties->Fetch()) {
            if (empty($arIBlockProperty['CODE']))
                continue;

            $arIBlockProperties[$arIBlockProperty['CODE']] = $arIBlockProperty;

            if ($arIBlockProperty['PROPERTY_TYPE'] == 'S' && $arIBlockProperty['MULTIPLE'] == 'N')
                $arPropertiesString[$arIBlockProperty['CODE']] = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];

            if (
                $arIBlockProperty['PROPERTY_TYPE'] == 'L' &&
                $arIBlockProperty['LIST_TYPE'] == 'C' &&
                $arIBlockProperty['MULTIPLE'] == 'N'
            ) {
                $arPropertiesBoolean[$arIBlockProperty['CODE']] = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];
            }
            if (
                $arIBlockProperty['PROPERTY_TYPE'] == 'L' &&
                $arIBlockProperty['LIST_TYPE'] == 'L'
            ) {
                $arPropertiesList[$arIBlockProperty['CODE']] = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];
            }
            if (
                $arIBlockProperty['PROPERTY_TYPE'] == 'F' &&
                $arIBlockProperty['MULTIPLE'] == 'N'
            ) {
                $arPropertiesFile[$arIBlockProperty['CODE']] = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];
            }
        }

        //Свойство Заголовок
        $arTemplateParameters['BANNER_PROPERTY_TITLE'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_TITLE'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Свойство Цвет текста заголовка баннера
        $arTemplateParameters['BANNER_PROPERTY_TITLE_COLOR'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_TITLE_COLOR'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Свойство Описание
        $arTemplateParameters['BANNER_PROPERTY_DESCRIPTION'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_DESCRIPTION'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Свойство Цвет текста описания
        $arTemplateParameters['BANNER_PROPERTY_DESCRIPTION_COLOR'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_DESCRIPTION_COLOR'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Свойство Ссылка
        $arTemplateParameters['BANNER_PROPERTY_LINK'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_LINK'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Свойство Открывать ссылку в новой вкладке
        $arTemplateParameters['BANNER_PROPERTY_BLANK'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_BLANK'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesBoolean,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Свойство Показывать кнопку
        $arTemplateParameters['BANNER_PROPERTY_BUTTON_SHOW'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_BUTTON_SHOW'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesBoolean,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Свойство Текст кнопки
        $arTemplateParameters['BANNER_PROPERTY_BUTTON_TEXT'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_BUTTON_TEXT'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Свойство Цвет текста кнопки
        $arTemplateParameters['BANNER_PROPERTY_BUTTON_TEXT_COLOR'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_BUTTON_TEXT_COLOR'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Свойство Цвет кнопки
        $arTemplateParameters['BANNER_PROPERTY_BUTTON_COLOR'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_BUTTON_COLOR'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Свойство Расположение текста
        $arTemplateParameters['BANNER_PROPERTY_TEXT_POSITION'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_TEXT_POSITION'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesList,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Свойство Картинка баннера
        $arTemplateParameters['BANNER_PROPERTY_IMAGE'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_IMAGE'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesFile,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Свойство Вертикальное расположение картинки баннера
        $arTemplateParameters['BANNER_PROPERTY_IMAGE_POSITION'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_IMAGE_POSITION'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesList,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Цвет баннера
        $arTemplateParameters['BANNER_PROPERTY_BANNER_COLOR'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_BANNER_COLOR'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesList,
            'ADDITIONAL_VALUES' => 'Y'
        );

        //Включить автопрокрутку слайдов
        $arTemplateParameters['BANNER_PROPERTY_AUTOPLAY'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_AUTOPLAY'),
            'PARENT' => 'BASE',
            'TYPE' => 'CHECKBOX'
        );

        //Включить автопрокрутку слайдов
        $arTemplateParameters['BANNER_PROPERTY_AUTOPLAY_DELAY'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_AUTOPLAY_DELAY'),
            'PARENT' => 'BASE',
            'TYPE' => 'STRING'
        );

        //Высота баннера
        $arTemplateParameters['BANNER_PROPERTY_HEIGHT'] = array(
            'NAME' => GetMessage('W_HEADER_BANNER_PROPERTY_HEIGHT'),
            'PARENT' => 'BASE',
            'TYPE' => 'LIST',
            'VALUES' => array(
                '400' => '400px',
                '450' => '450px',
                '500' => '500px',
                '550' => '550px',
                '600' => '600px',
                '650' => '650px'
            ),
            'ADDITIONAL_VALUES' => 'Y'
        );
    }
}

include('.search_parameters.php');
