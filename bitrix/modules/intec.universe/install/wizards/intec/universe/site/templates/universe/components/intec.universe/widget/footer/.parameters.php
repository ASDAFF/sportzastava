<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arCurrentValues
 */

if (!Loader::includeModule('iblock'))
    return;

if (!Loader::includeModule('intec.core'))
    return;

$arForms = array();

if (Loader::includeModule('form')) {
    require_once('parameters/base.php');
} else if (Loader::includeModule('intec.startshop')) {
    require_once('parameters/lite.php');
}

$arTemplateParameters = array(
    'USE_SETTINGS' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('WF_USE_SETTINGS'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    ),
    'FOOTER_DESIGN' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_DESIGN'),
        'TYPE' => "LIST",
        'VALUES' => array(
            'TYPE_1' => 1,
            'TYPE_2' => 2,
            'TYPE_3' => 3,
            'TYPE_4' => 4,
            'TYPE_5' => 5
        )
    ),
    'FOOTER_BLACK' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_BLACK'),
        'TYPE' => 'CHECKBOX',
    ),
    'FOOTER_PHONE' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_PHONE'),
        'TYPE' => 'STRING',
    ),
    'FOOTER_EMAIL' => array(
        'PARENT' => 'BASE',
        'NAME' => "E-mail",
        'TYPE' => 'STRING',
    ),
    'FOOTER_ADDRESS' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_ADDRESS'),
        'TYPE' => 'STRING',
    )
);


$arTemplateParameters['FOOTER_SHOW_FEEDBACK'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_SHOW_FEEDBACK'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y',
        'REFRESH' => 'Y'
);
if ($arCurrentValues['FOOTER_SHOW_FEEDBACK'] == 'Y') {
    $arTemplateParameters["FOOTER_SHOW_TEXT_BUTTON"] = array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('FOOTER_SHOW_TEXT_BUTTON'),
            'TYPE' => 'STRING',
            'DEFAULT' => GetMessage('FOOTER_SHOW_TEXT_BUTTON_DEFAULT')
    );
    $arTemplateParameters['FOOTER_FORM_ID'] = array(
        'PARENT' => 'BASE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('FOOTER_FORM_ID'),
        'DEFAULT' => '',
        'VALUES' => $arForms
    );
}

$arTemplateParameters['FOOTER_SHOW_MENU'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('FOOTER_SHOW_MENU'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'Y',
    'REFRESH' => 'Y'
);
if ($arCurrentValues['FOOTER_SHOW_MENU'] == 'Y') {
    $arMenuTypes = GetMenuTypes(SITE_ID);
    $arTemplateParameters['FOOTER_MENU'] = array(
        'PARENT' => 'BASE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('FOOTER_MENU'),
        'DEFAULT' => '',
        'VALUES' => $arMenuTypes,
        'ADDITIONAL_VALUES'	=> 'Y'
    );
    $arTemplateParameters['FOOTER_CHILD_MENU'] = array(
        'PARENT' => 'BASE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('FOOTER_CHILD_MENU'),
        'DEFAULT' => '',
        'VALUES' => $arMenuTypes,
        'ADDITIONAL_VALUES'	=> 'Y'
    );
}

$arTemplateParameters['FOOTER_SHOW_SEARCH'] =array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('FOOTER_SHOW_SEARCH'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'Y',
    'REFRESH' => 'Y'
);
if ($arCurrentValues['FOOTER_SHOW_SEARCH'] == 'Y') {
    $arTemplateParameters['FOOTER_SHOW_SEARCH_PATH'] =array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_SHOW_SEARCH_PATH'),
        'TYPE' => 'STRING',
        'DEFAULT' => '#SITE_DIR#search/'
    );
}

$arTemplateParameters['FOOTER_SHOW_SOCIAL'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('FOOTER_SHOW_SOCIAL'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'Y',
    'REFRESH' => 'Y'
);
if ($arCurrentValues['FOOTER_SHOW_SOCIAL'] == 'Y') {
    $arTemplateParameters['FOOTER_VKONTACTE'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_VKONTACTE'),
        'TYPE' => 'STRING'
    );
    $arTemplateParameters['FOOTER_FACEBOOK'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_FACEBOOK'),
        'TYPE' => 'STRING'
    );
    $arTemplateParameters['FOOTER_INSTAGRAM'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_INSTAGRAM'),
        'TYPE' => 'STRING'
    );
    $arTemplateParameters['FOOTER_TWITTER'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_TWITTER'),
        'TYPE' => 'STRING'
    );
}

$arTemplateParameters['FOOTER_COPYRIGHT_TEXT'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('FOOTER_COPYRIGHT_TEXT'),
    'TYPE' => 'STRING',
    'DEFAULT' => GetMessage('FOOTER_COPYRIGHT_DEFAULTEXT')
);

$arTemplateParameters['FOOTER_LOGO'] = array(
    'PARENT' => 'BASE',
    'NAME' =>GetMessage('FOOTER_LOGO'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' =>'Y'
);

$arTemplateParameters['FOOTER_PAYSYSTEM'] =array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('FOOTER_PAYSYSTEM'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'Y',
    'REFRESH' => 'Y'
);

if ($arCurrentValues['FOOTER_PAYSYSTEM'] == 'Y') {
    $arTemplateParameters['FOOTER_PAYSYSTEM_TYPE'] =array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_PAYSYSTEM_TYPE'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            'color' => GetMessage('FOOTER_PAYSYSTEM_COLOR'),
            'grey' => GetMessage('FOOTER_PAYSYSTEM_GREY')
        )
    );
    $arTemplateParameters['FOOTER_ALFABANK'] =array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_ALFABANK'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    );
    $arTemplateParameters['FOOTER_SBERBANK'] =array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_SBERBANK'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    );
    $arTemplateParameters['FOOTER_YANDEX_MONEY'] =array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_YANDEX_MONEY'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    );
    $arTemplateParameters['FOOTER_QIWI'] =array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_QIWI'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    );
    $arTemplateParameters['FOOTER_VISA'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_VISA'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    );
    $arTemplateParameters['FOOTER_MASTERCARD'] = array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('FOOTER_MASTERCARD'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    );
}

$arTemplateParameters['CONSENT_URL'] = array(
    'PARENT' => 'URL_TEMPLATES',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('FOOTER_CONSENT_URL')
);