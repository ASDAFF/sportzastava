<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

/**
 * @var array $arCurrentValues
 */

if (!Loader::includeModule('iblock'))
    return;


$arTemplateParameters = array(
    'SHOW_BASKET' => array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('WBF_SHOW_BASKET'),
        'TYPE' => 'CHECKBOX'
    ),
    'SHOW_FORM' => array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('WBF_SHOW_FORM'),
        'TYPE' => 'CHECKBOX',
        'REFRESH' => 'Y'
    ),
    'SHOW_AUTH' => array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('WBF_SHOW_AUTH'),
        'TYPE' => 'CHECKBOX'
    ),
    'SHOW_COMPARE' => array(
        'PARENT' => 'VISUAL',
        'NAME' => GetMessage('WBF_SHOW_COMPARE'),
        'TYPE' => 'CHECKBOX',
        'REFRESH' => 'Y'
    ),
    'OPEN_AFTER_ADD' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('WBF_OPEN_AFTER_ADD'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            'settings' => GetMessage('WBF_OPEN_AFTER_ADD_SETTINGS'),
            'N' => GetMessage('WBF_OPEN_AFTER_ADD_N'),
            'Y' => GetMessage('WBF_OPEN_AFTER_ADD_Y')
        )
    ),
    'URL_CATALOG' => array(
        'PARENT' => 'URL_TEMPLATES',
        'NAME' => GetMessage('WBF_URL_CATALOG'),
        'TYPE' => 'STRING'
    ),
    'URL_BASKET' => array(
        'PARENT' => 'URL_TEMPLATES',
        'NAME' => GetMessage('WBF_URL_BASKET'),
        'TYPE' => 'STRING'
    ),
    'URL_ORDER' => array(
        'PARENT' => 'URL_TEMPLATES',
        'NAME' => GetMessage('WBF_URL_ORDER'),
        'TYPE' => 'STRING'
    ),
    'URL_COMPARE' => array(
        'PARENT' => 'URL_TEMPLATES',
        'NAME' => GetMessage('WBF_URL_COMPARE'),
        'TYPE' => 'STRING'
    ),
    'URL_CABINET' => array(
        'PARENT' => 'URL_TEMPLATES',
        'NAME' => GetMessage('WBF_URL_CABINET'),
        'TYPE' => 'STRING'
    ),
    'URL_CONSENT' => array(
        'PARENT' => 'URL_TEMPLATES',
        'NAME' => GetMessage('WBF_URL_CONSENT'),
        'TYPE' => 'STRING'
    )
);

if ($arCurrentValues['SHOW_COMPARE']) {
    $arTemplateParameters['COMPARE_CODE'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('WBF_COMPARE_CODE'),
        'TYPE' => 'STRING'
    );

    $iblockTypesList = array();
    $iblockTypes = CIBlockType::GetList();
    while ($row = $iblockTypes->GetNext()) {
        $iblockTypesList[$row['ID']] = '['. $row['ID'] .'] '. $row['NAME'];
    }
    $arTemplateParameters['COMPARE_IBLOCK_TYPE'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('WBF_COMPARE_IBLOCK_TYPE'),
        'TYPE' => 'LIST',
        'VALUES' => $iblockTypesList,
        'REFRESH' => 'Y'
    );
    unset($iblockTypes);

    $iblocksList = array();
    $iblocks = CIBlock::GetList(array(), array(
        'TYPE' => $arCurrentValues['COMPARE_IBLOCK_TYPE']
    ));
    while ($row = $iblocks->GetNext()) {
        $iblocksList[$row['ID']] = '['. $row['ID'] .'] '. $row['NAME'];
    }
    $arTemplateParameters['COMPARE_IBLOCK_ID'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('WBF_COMPARE_IBLOCK_ID'),
        'TYPE' => 'LIST',
        'VALUES' => $iblocksList,
        'ADDITIONAL_VALUES' => 'Y'
    );
    unset($iblocks, $iblocksList);
}


if (Loader::includeModule('catalog')) {
    require_once('parameters/base.php');
} else if (Loader::includeModule('intec.startshop')) {
    require_once('parameters/lite.php');
}