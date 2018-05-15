<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use intec\core\helpers\ArrayHelper;

/**
 * @var array $arTemplateParameters
 * @var array $arCurrentValues
 */

if (!Loader::includeModule('iblock'))
	return;

if (!Loader::includeModule('intec.core'))
    return;

Loc::loadMessages(__FILE__);

$sSite = ($_REQUEST['site'] <> '' ? $_REQUEST['site'] : ($_REQUEST['src_site'] <> '' ? $_REQUEST['src_site'] : false));
$arMenu = GetMenuTypes($sSite);

/** Типы инфоблков */
$arIBlocksTypes = CIBlockParameters::GetIBlockTypes();

/** Список всех инфоблоков */
$arIBlocks = array();
$arIBlocksByTypes = array();
$rsIBlocks = CIBlock::GetList(
    array('SORT' => 'ASC'),
    array()
);

while ($arIBlock = $rsIBlocks->GetNext()) {
    $iIBlockId = $arIBlock['ID'];
    $sIBlockType = $arIBlock['IBLOCK_TYPE_ID'];
    $sIBlockText = '['.$iIBlockId.'] '.$arIBlock['NAME'];

    $arIBlocks[$iIBlockId] = $sIBlockText;
    $arIBlocksByTypes[$sIBlockType][$iIBlockId] = $sIBlockText;
}

unset($iIBlockId);
unset($sIBlockType);
unset($sIBlockText);
unset($arIBlock);
unset($rsIBlocks);

/** Свойства главного инфоблока по типам */
$arProperties = array(
    'LIST' => array(),
    'ELEMENT' => array(),
    'STRING' => array(),
    'FILE' => array(),
    'CHECKBOX' => array()
);
$rsProperties = CIBlockProperty::GetList(array(), array(
    'IBLOCK_ID' => $arCurrentValues['IBLOCK_ID'],
    'ACTIVE' => 'Y'
));

while ($arProperty = $rsProperties->GetNext()) {
    $sPropertyCode = $arProperty['CODE'];
    $sPropertyType = $arProperty['PROPERTY_TYPE'];
    $sPropertyText = '['.$sPropertyCode.'] '.$arProperty['NAME'];
    $sPropertyGroup = null;

    if (empty($sPropertyCode))
        continue;

    switch ($sPropertyType) {
        case 'L': {
            $sPropertyGroup = 'LIST';

            if ($arProperty['LIST_TYPE'] == 'C')
                $sPropertyGroup = 'CHECKBOX';

            break;
        }
        case 'E': { $sPropertyGroup = 'ELEMENT'; break; }
        case 'F': { $sPropertyGroup = 'FILE'; break; }
        case 'S': { $sPropertyGroup = 'STRING'; break; }
    }

    if ($sPropertyGroup === null)
        continue;

    $arProperties[$sPropertyGroup][$sPropertyCode] = $sPropertyText;
}

unset($sPropertyCode);
unset($sPropertyType);
unset($sPropertyText);
unset($sPropertyGroup);
unset($arProperty);
unset($rsProperties);

include(__DIR__.'/parameters/hidden.php');
include(__DIR__.'/parameters/properties.php');
include(__DIR__.'/parameters/markers.php');
include(__DIR__.'/parameters/link.video.php');
include(__DIR__.'/parameters/link.services.php');
include(__DIR__.'/parameters/link.reviews.php');

$arTemplateParameters['BASKET_USE'] = array(
    'NAME' => Loc::getMessage('C_CATALOG_BASKET_USE'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'settings' => Loc::getMessage('C_CATALOG_BASKET_USE_FROM_SETTINGS'),
        'Y' => Loc::getMessage('C_CATALOG_BASKET_USE_YES'),
        'N' => Loc::getMessage('C_CATALOG_BASKET_USE_NO')
    )
);

$arTemplateParameters['DETAIL_HEADER_FIXED'] = array(
    'PARENT' => 'DETAIL_SETTINGS',
    'NAME' => GetMessage('C_CATALOG_DETAIL_HEADER_FIXED'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'settings' => GetMessage('C_CATALOG_DETAIL_HEADER_FIXED_FROM_SETTINGS'),
        'Y' => GetMessage('C_CATALOG_DETAIL_HEADER_FIXED_YES'),
        'N' => GetMessage('C_CATALOG_DETAIL_HEADER_FIXED_NO'),
    ),
    'DEFAULT' => 'N'
);

$arTemplateParameters['DETAIL_DESCRIPTION_SHOW'] = array(
    'PARENT' => 'DETAIL_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_DETAIL_DESCRIPTION_SHOW'),
    'TYPE' => 'CHECKBOX'
);

$arTemplateParameters['DETAIL_PICTURE_POPUP'] = array(
    'PARENT' => 'DETAIL_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_DETAIL_PICTURE_POPUP'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'SETTINGS' => Loc::getMessage('C_CATALOG_DETAIL_PICTURE_POPUP_SETTINGS'),
        'Y' => Loc::getMessage('C_CATALOG_DETAIL_PICTURE_POPUP_Y'),
        'N' => Loc::getMessage('C_CATALOG_DETAIL_PICTURE_POPUP_N')
    )
);

$arTemplateParameters['DETAIL_PICTURE_LOOP'] = array(
    'PARENT' => 'DETAIL_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_DETAIL_PICTURE_LOOP'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'SETTINGS' => Loc::getMessage('C_CATALOG_DETAIL_PICTURE_LOOP_SETTINGS'),
        'Y' => Loc::getMessage('C_CATALOG_DETAIL_PICTURE_LOOP_Y'),
        'N' => Loc::getMessage('C_CATALOG_DETAIL_PICTURE_LOOP_N')
    )
);

$arTemplateParameters['DETAIL_BRAND_USE'] = array(
    'PARENT' => 'DETAIL_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_DETAIL_BRAND_USE'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);

$arTemplateParameters['DETAIL_QUANTITY_SHOW'] = array(
    'PARENT' => 'DETAIL_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_DETAIL_QUANTITY_SHOW'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);

$arTemplateParameters['DETAIL_COUNTER_SHOW'] = array(
    'PARENT' => 'DETAIL_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_DETAIL_COUNTER_SHOW'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);

$arTemplateParameters['DETAIL_VIEW'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => Loc::getMessage('C_CATALOG_DETAIL_VIEW'),
    'TYPE' => 'LIST',
    'VALUES' => [
        'settings' => Loc::getMessage('C_CATALOG_DETAIL_VIEW_SETTINGS'),
        'tabless' => Loc::getMessage('C_CATALOG_DETAIL_VIEW_TABLESS'),
        'tabs' => Loc::getMessage('C_CATALOG_DETAIL_VIEW_TABS'),
        'tabs_bottom' => Loc::getMessage('C_CATALOG_DETAIL_VIEW_TABS_BOTTOM'),
        'tabs_right' => Loc::getMessage('C_CATALOG_DETAIL_VIEW_TABS_RIGHT')
    ]
);

$arTemplateParameters['MENU_TYPE_ROOT'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => Loc::getMessage('C_CATALOG_MENU_TYPE_ROOT'),
    'TYPE' => 'LIST',
    'DEFAULT'=>'left',
    'VALUES' => $arMenu,
    'ADDITIONAL_VALUES'	=> 'Y',
    'COLS' => 45
);

$arTemplateParameters['MENU_TYPE_CHILD'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => Loc::getMessage('C_CATALOG_MENU_TYPE_CHILD'),
    'TYPE' => 'LIST',
    'DEFAULT'=>'left',
    'VALUES' => $arMenu,
    'ADDITIONAL_VALUES'	=> 'Y',
    'COLS' => 45
);

$arTemplateParameters['MENU_MAX_LEVEL'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => Loc::getMessage('C_CATALOG_MENU_MAX_LEVEL'),
    'TYPE' => 'LIST',
    'DEFAULT'=>'1',
    'VALUES' => Array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
    ),
    'ADDITIONAL_VALUES'	=> 'N',
);

$arTemplateParameters['MENU_VIEW'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => Loc::getMessage('C_CATALOG_MENU_VIEW'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'settings' => Loc::getMessage('C_CATALOG_MENU_VIEW_SETTINGS'),
        'default' => Loc::getMessage('C_CATALOG_MENU_VIEW_DEFAULT'),
        'picture' => Loc::getMessage('C_CATALOG_MENU_VIEW_PICTURE'),
        'picture_with_submenu' => Loc::getMessage('C_CATALOG_MENU_VIEW_PICTURE_WITH_SUBMENU')
    ),
    'DEFAULT' => 'default'
);

$arTemplateParameters['MENU_DISPLAY_IN_ROOT'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => Loc::getMessage('C_CATALOG_MENU_DISPLAY_IN_ROOT'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'settings' => Loc::getMessage('C_CATALOG_MENU_DISPLAY_IN_FROM_SETTINGS'),
        'Y' => Loc::getMessage('C_CATALOG_MENU_DISPLAY_IN_YES'),
        'N' => Loc::getMessage('C_CATALOG_MENU_DISPLAY_IN_NO'),
    ),
    'DEFAULT' => 'N'
);

$arTemplateParameters['MENU_DISPLAY_IN_SECTION'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => Loc::getMessage('C_CATALOG_MENU_DISPLAY_IN_SECTION'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'settings' => Loc::getMessage('C_CATALOG_MENU_DISPLAY_IN_FROM_SETTINGS'),
        'Y' => Loc::getMessage('C_CATALOG_MENU_DISPLAY_IN_YES'),
        'N' => Loc::getMessage('C_CATALOG_MENU_DISPLAY_IN_NO'),
    ),
    'DEFAULT' => 'Y'
);

$arTemplateParameters['MENU_DISPLAY_IN_ELEMENT'] = array(
    'PARENT' => 'VISUAL',
    'NAME' => Loc::getMessage('C_CATALOG_MENU_DISPLAY_IN_ELEMENT'),
    'TYPE' => 'LIST',
    'VALUES' => array(
        'settings' => Loc::getMessage('C_CATALOG_MENU_DISPLAY_IN_FROM_SETTINGS'),
        'Y' => Loc::getMessage('C_CATALOG_MENU_DISPLAY_IN_YES'),
        'N' => Loc::getMessage('C_CATALOG_MENU_DISPLAY_IN_NO'),
    ),
    'DEFAULT' => 'N'
);

$arTemplateParameters['LIST_VIEW'] = array(
    'PARENT' => 'LIST_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_LIST_VIEW'),
    'TYPE' => 'LIST',
    'REFRESH' => 'Y',
    'VALUES' => array(
        'settings' => Loc::getMessage('C_CATALOG_LIST_VIEW_SETTINGS'),
        'list' => Loc::getMessage('C_CATALOG_LIST_VIEW_LINE'),
        'tile' => Loc::getMessage('C_CATALOG_LIST_VIEW_TILE'),
        'text' => Loc::getMessage('C_CATALOG_LIST_VIEW_TEXT')
    ),
    'DEFAULT' => 'tile'
);

$arTemplateParameters['LIST_DESCRIPTION_SHOW'] = array(
    'PARENT' => "LIST_SETTINGS",
    'NAME' => Loc::getMessage('C_CATALOG_LIST_DESCRIPTION_SHOW'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);

$arTemplateParameters['LIST_PROPERTIES_SHOW'] = array(
    'PARENT' => "LIST_SETTINGS",
    'NAME' => Loc::getMessage('C_CATALOG_LIST_PROPERTIES_SHOW'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);

$arTemplateParameters['LIST_QUICK_VIEW_USE'] = array(
    'PARENT' => "LIST_SETTINGS",
    'NAME' => Loc::getMessage('C_CATALOG_LIST_QUICK_VIEW_USE'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);

$arTemplateParameters['LIST_QUANTITY_SHOW'] = array(
    'PARENT' => 'LIST_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_LIST_QUANTITY_SHOW'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);

$arTemplateParameters['LIST_COUNTER_SHOW'] = array(
    'PARENT' => 'LIST_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_LIST_COUNTER_SHOW'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);

$arTemplateParameters['ROOT_DESCRIPTION_SHOW'] = array(
    'PARENT' => 'SECTIONS_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_ROOT_DESCRIPTION_SHOW'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'Y'
);

$sRootView = ArrayHelper::getValue($arCurrentValues, 'ROOT_VIEW');
$bRootChildrenUse = ArrayHelper::getValue($arCurrentValues, 'ROOT_CHILDREN_USE') === 'Y';
$sSectionView = ArrayHelper::getValue($arCurrentValues, 'SECTION_VIEW');
$bSectionChildrenUse = ArrayHelper::getValue($arCurrentValues, 'SECTION_CHILDREN_USE') === 'Y';

$arTemplateParameters['ROOT_VIEW'] = array(
    'PARENT' => 'SECTIONS_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_ROOT_VIEW'),
    'TYPE' => 'LIST',
    'REFRESH' => 'Y',
    'VALUES' => array(
        'settings' => Loc::getMessage('C_CATALOG_SECTION_VIEW_SETTINGS'),
        'list' => Loc::getMessage('C_CATALOG_SECTION_VIEW_LINE'),
        'tile' => Loc::getMessage('C_CATALOG_SECTION_VIEW_TILE'),
        'tile2' => Loc::getMessage('C_CATALOG_SECTION_VIEW_TILE2'),
        'text' => Loc::getMessage('C_CATALOG_SECTION_VIEW_TEXT')
    ),
    'DEFAULT' => 'tile'
);

$arTemplateParameters['ROOT_ROW_COUNT'] = array(
    'PARENT' => 'SECTIONS_SETTINGS',
    'NAME' => GetMessage('C_CATALOG_ROOT_ROW_COUNT'),
    'TYPE' => 'STRING',
    'ADDITIONAL_VALUES' => 'Y',
    'DEFAULT' => '5'
);

if (ArrayHelper::isIn($sRootView, array('list', 'tile')))
    $arTemplateParameters['ROOT_VIEW_DESCRIPTION_SHOW'] = array(
        'PARENT' => 'SECTIONS_SETTINGS',
        'NAME' => Loc::getMessage('C_CATALOG_ROOT_VIEW_DESCRIPTION_SHOW'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    );

$arTemplateParameters['ROOT_CHILDREN_USE'] = array(
    'PARENT' => 'SECTIONS_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_ROOT_CHILDREN_USE'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N',
    'REFRESH' => 'Y'
);

if ($bRootChildrenUse)
    $arTemplateParameters['ROOT_CHILDREN_COUNT'] = array(
        'PARENT' => 'SECTIONS_SETTINGS',
        'NAME' => Loc::getMessage('C_CATALOG_ROOT_CHILDREN_COUNT'),
        'TYPE' => 'STRING',
        'DEFAULT' => '4'
    );

$arTemplateParameters['SECTION_VIEW'] = array(
    'PARENT' => 'SECTIONS_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_SECTION_VIEW'),
    'TYPE' => 'LIST',
    'REFRESH' => 'Y',
    'VALUES' => array(
        'settings' => Loc::getMessage('C_CATALOG_SECTION_VIEW_SETTINGS'),
        'list' => Loc::getMessage('C_CATALOG_SECTION_VIEW_LINE'),
        'tile' => Loc::getMessage('C_CATALOG_SECTION_VIEW_TILE'),
        'tile2' => Loc::getMessage('C_CATALOG_SECTION_VIEW_TILE2'),
        'text' => Loc::getMessage('C_CATALOG_SECTION_VIEW_TEXT')
    ),
    'DEFAULT' => 'tile'
);

$arTemplateParameters['SECTION_ROW_COUNT'] = array(
    'PARENT' => 'SECTIONS_SETTINGS',
    'NAME' => GetMessage('C_CATALOG_SECTION_ROW_COUNT'),
    'TYPE' => 'STRING',
    'ADDITIONAL_VALUES' => 'Y',
    'DEFAULT' => '4'
);

if (ArrayHelper::isIn($sSectionView, array('list', 'tile')))
    $arTemplateParameters['SECTION_VIEW_DESCRIPTION_SHOW'] = array(
        'PARENT' => 'SECTIONS_SETTINGS',
        'NAME' => Loc::getMessage('C_CATALOG_SECTION_VIEW_DESCRIPTION_SHOW'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y'
    );

$arTemplateParameters['SECTION_CHILDREN_USE'] = array(
    'PARENT' => 'SECTIONS_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_SECTION_CHILDREN_USE'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N',
    'REFRESH' => 'Y'
);


$arTemplateParameters['PRICE_SHOW_ALL'] = array(
    'PARENT' => 'PRICES',
    'NAME' => Loc::getMessage('C_CATALOG_PRICE_SHOW_ALL'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N'
);

$arTemplateParameters['MESS_PRICE_RANGES_TITLE'] = array(
    'PARENT' => 'DETAIL_SETTINGS',
    'NAME' => GetMessage('C_CATALOG_MESS_PRICE_RANGES_TITLE'),
    'TYPE' => 'STRING',
    'DEFAULT' => GetMessage('C_CATALOG_MESS_PRICE_RANGES_TITLE_DEFAULT')
);

if ($bSectionChildrenUse)
    $arTemplateParameters['SECTION_CHILDREN_COUNT'] = array(
        'PARENT' => 'SECTIONS_SETTINGS',
        'NAME' => Loc::getMessage('C_CATALOG_SECTION_CHILDREN_COUNT'),
        'TYPE' => 'STRING',
        'DEFAULT' => '4'
    );

$arTemplateParameters['LAZY_LOAD'] = array(
    'PARENT' => 'PAGER_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_LAZY_LOAD'),
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y',
    'DEFAULT' => 'N'
);

$arTemplateParameters['CONSENT_URL'] = array(
    'PARENT' => 'URL_TEMPLATES',
    'NAME' => Loc::getMessage('C_CATALOG_CONSENT_URL'),
    'TYPE' => 'STRING'
);

if (Loader::includeModule('form')) {
    include(__DIR__.'/parameters/base.form.php');
} else if (Loader::includeModule('intec.startshop')) {
    include(__DIR__.'/parameters/lite.form.php');
}

if (Loader::includeModule('catalog') && Loader::includeModule('sale')) {
    include(__DIR__.'/parameters/base.php');
} else if (Loader::includeModule('intec.startshop')) {
    include(__DIR__.'/parameters/lite.php');
}