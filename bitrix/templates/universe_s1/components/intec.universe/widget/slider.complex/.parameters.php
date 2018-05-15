<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arCurrentValues
 */

if (!CModule::IncludeModule('iblock'))
    return;

$arTemplateParameters = array();

$arIBlocksTypes = CIBlockParameters::GetIBlockTypes();
$sIBlockType = $arCurrentValues['IBLOCK_TYPE'];

$arIBlocks = array();
$arIBlocksFilter = array();
$arIBlocksFilter['ACTIVE'] = 'Y';

if (!empty($sIBlockType))
    $arIBlocksFilter['TYPE'] = $sIBlockType;

$rsIBlocks = CIBlock::GetList(array('SORT' => 'ASC'), $arIBlocksFilter);

while ($arIBlock = $rsIBlocks->Fetch())
    $arIBlocks[$arIBlock['ID']] = '['.$arIBlock['ID'].'] '.$arIBlock['NAME'];

$iIBlockId = (int)$arCurrentValues['IBLOCK_ID'];

$arPropertiesString = array();
$arPropertiesBoolean = array();
$arPropertiesFile = array();
$arPropertiesList = array();
$arIBlockProperties = array();

if (!empty($sIBlockType) && !empty($iIBlockId)) {

    $rsIBlockProperties = CIBlockProperty::GetList(array(
        'SORT' => 'ASC'
    ), array(
        'ACTIVE' => 'Y',
        'IBLOCK_ID' => $iIBlockId,
        'IBLOCK_TYPE' => $sIBlockType
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
        ) $arPropertiesBoolean[$arIBlockProperty['CODE']] = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];
        if (
            $arIBlockProperty['PROPERTY_TYPE'] == 'L' &&
            $arIBlockProperty['LIST_TYPE'] == 'L'
        ) $arPropertiesList[$arIBlockProperty['CODE']] = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];
        if (
            $arIBlockProperty['PROPERTY_TYPE'] == 'F' &&
            $arIBlockProperty['MULTIPLE'] == 'N'
        ) $arPropertiesFile[$arIBlockProperty['CODE']] = '['.$arIBlockProperty['CODE'].'] '.$arIBlockProperty['NAME'];
    }
}


//**Дополнительные баннеры
$sIBlockTypeCB = $arCurrentValues['IBLOCK_TYPE_CB'];

$arIBlocksCB = array();
$arIBlocksFilter = array();
$arIBlocksFilter['ACTIVE'] = 'Y';

if (!empty($sIBlockTypeCB))
    $arIBlocksFilter['TYPE'] = $sIBlockTypeCB;

$rsIBlocksCB = CIBlock::GetList(array('SORT' => 'ASC'), $arIBlocksFilter);

while ($arIBlock = $rsIBlocksCB->Fetch())
    $arIBlocksCB[$arIBlock['ID']] = '['.$arIBlock['ID'].'] '.$arIBlock['NAME'];

$iIBlockIdCB = (int)$arCurrentValues['IBLOCK_ID_CB'];

$arPropertiesStringCB = array();
$arPropertiesBooleanCB = array();
$arPropertiesFileCB = array();
$arPropertiesListCB = array();
$arIBlockPropertiesCB = array();
$rsIBlockElements = array();
$arIBlockElements = array();
$arElements = array();

if (!empty($sIBlockTypeCB) && !empty($iIBlockIdCB)) {

    $rsIBlockProperties = CIBlockProperty::GetList(array(
        'SORT' => 'ASC'
    ), array(
        'ACTIVE' => 'Y',
        'IBLOCK_ID' => $iIBlockIdCB,
        'IBLOCK_TYPE' => $sIBlockTypeCB
    ));

    $rsIBlockElements = CIBlockElement::GetList(
        array(
            'SORT' => 'ASC'
        ),
        array(
            'ACTIVE' => 'Y',
            'IBLOCK_ID' => $iIBlockIdCB,
            'IBLOCK_TYPE' => $sIBlockTypeCB
        )
    );

    while ($arIBlockPropertyCB = $rsIBlockProperties->Fetch()) {
        if (empty($arIBlockPropertyCB['CODE']))
            continue;

        $arIBlockPropertiesCB[$arIBlockPropertyCB['CODE']] = $arIBlockPropertyCB;

        if ($arIBlockPropertyCB['PROPERTY_TYPE'] == 'S' && $arIBlockPropertyCB['MULTIPLE'] == 'N')
            $arPropertiesStringCB[$arIBlockPropertyCB['CODE']] = '['.$arIBlockPropertyCB['CODE'].'] '.$arIBlockPropertyCB['NAME'];

        if (
            $arIBlockPropertyCB['PROPERTY_TYPE'] == 'L' &&
            $arIBlockPropertyCB['LIST_TYPE'] == 'C' &&
            $arIBlockPropertyCB['MULTIPLE'] == 'N'
        ) $arPropertiesBooleanCB[$arIBlockPropertyCB['CODE']] = '['.$arIBlockPropertyCB['CODE'].'] '.$arIBlockPropertyCB['NAME'];
        if (
            $arIBlockPropertyCB['PROPERTY_TYPE'] == 'L' &&
            $arIBlockPropertyCB['LIST_TYPE'] == 'L'
        ) $arPropertiesListCB[$arIBlockPropertyCB['CODE']] = '['.$arIBlockPropertyCB['CODE'].'] '.$arIBlockPropertyCB['NAME'];
        if (
            $arIBlockPropertyCB['PROPERTY_TYPE'] == 'F' &&
            $arIBlockPropertyCB['MULTIPLE'] == 'N'
        ) $arPropertiesFileCB[$arIBlockPropertyCB['CODE']] = '['.$arIBlockPropertyCB['CODE'].'] '.$arIBlockPropertyCB['NAME'];
    }

    while ($arIBlockElements = $rsIBlockElements->Fetch()) {
        $arElements[$arIBlockElements['ID']] = '['.$arIBlockElements['ID'].'] '.$arIBlockElements['NAME'];
    }
}


//**Основные параметры
//Тип инфоблока
$arTemplateParameters['IBLOCK_TYPE'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('SLIDER_PARAMETERS_IBLOCK_TYPE'),
    'VALUES' => $arIBlocksTypes,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);
//Инфоблок баннера
$arTemplateParameters['IBLOCK_ID'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('SLIDER_PARAMETERS_IBLOCK_ID'),
    'VALUES' => $arIBlocks,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);

//Тип инфоблока доп. баннеров
$arTemplateParameters['IBLOCK_TYPE_CB'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('SLIDER_CB_PARAMETERS_IBLOCK_TYPE'),
    'VALUES' => $arIBlocksTypes,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);

//Инфоблок доп. баннеров
$arTemplateParameters['IBLOCK_ID_CB'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'LIST',
    'NAME' => GetMessage('SLIDER_CB_PARAMETERS_IBLOCK_ID'),
    'VALUES' => $arIBlocksCB,
    'ADDITIONAL_VALUES' => 'Y',
    'REFRESH' => 'Y'
);

$arTemplateParameters['USE_SETTINGS'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('SLIDER_PARAMETERS_USE_SETTINGS'),
    'DEFAULT' => 'Y'
);

//Кол-во элементов
$arTemplateParameters['SLIDER_COUNT'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'STRING',
    'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_COUNT')
);

//Показывать только активные на данный момент элементы
$arTemplateParameters['SLIDER_ACTIVE_ELEMENTS'] = array(
    'PARENT' => 'BASE',
    'TYPE' => 'CHECKBOX',
    'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_ACTIVE_ELEMENTS')
);

//**Источник данных
if (!empty($arCurrentValues['IBLOCK_ID'])) {
//Свойство Заголовок
    $arTemplateParameters['SLIDER_PROPERTY_TITLE'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_TITLE'),
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

//Свойство Цвет текста заголовка баннера
    $arTemplateParameters['SLIDER_PROPERTY_TITLE_COLOR'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_TITLE_COLOR'),
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

//Свойство Описание
    $arTemplateParameters['SLIDER_PROPERTY_DESCRIPTION'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_DESCRIPTION'),
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

//Свойство Цвет текста описания
    $arTemplateParameters['SLIDER_PROPERTY_DESCRIPTION_COLOR'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_DESCRIPTION_COLOR'),
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

//Свойство Ссылка
    $arTemplateParameters['SLIDER_PROPERTY_LINK'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_LINK'),
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

//Свойство Открывать ссылку в новой вкладке
    $arTemplateParameters['SLIDER_PROPERTY_BLANK'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_BLANK'),
        'VALUES' => $arPropertiesBoolean,
        'ADDITIONAL_VALUES' => 'Y'
    );

//Свойство Показывать кнопку
    $arTemplateParameters['SLIDER_PROPERTY_BUTTON_SHOW'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_BUTTON_SHOW'),
        'VALUES' => $arPropertiesBoolean,
        'ADDITIONAL_VALUES' => 'Y'
    );

//Свойство Текст кнопки
    $arTemplateParameters['SLIDER_PROPERTY_BUTTON_TEXT'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_BUTTON_TEXT'),
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

//Свойство Цвет текста кнопки
    $arTemplateParameters['SLIDER_PROPERTY_BUTTON_TEXT_COLOR'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_BUTTON_TEXT_COLOR'),
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

//Свойство Цвет кнопки
    $arTemplateParameters['SLIDER_PROPERTY_BUTTON_COLOR'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_BUTTON_COLOR'),
        'VALUES' => $arPropertiesString,
        'ADDITIONAL_VALUES' => 'Y'
    );

//Свойство Расположение текста
    $arTemplateParameters['SLIDER_PROPERTY_TEXT_POSITION'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_TEXT_POSITION'),
        'VALUES' => $arPropertiesList,
        'ADDITIONAL_VALUES' => 'Y'
    );

//Свойство Картинка баннера
    $arTemplateParameters['SLIDER_PROPERTY_IMAGE'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_IMAGE'),
        'VALUES' => $arPropertiesFile,
        'ADDITIONAL_VALUES' => 'Y'
    );

//Свойство Вертикальное расположение картинки баннера
    $arTemplateParameters['SLIDER_PROPERTY_IMAGE_POSITION'] = array(
        'PARENT' => 'DATA_SOURCE',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_IMAGE_POSITION'),
        'VALUES' => $arPropertiesList,
        'ADDITIONAL_VALUES' => 'Y'
    );


//*Св-ва доп. Баннеров
    if (!empty($arCurrentValues['IBLOCK_ID_CB'])) {
//Доп. баннеры
        $arTemplateParameters['SLIDER_CB_PROPERTY_ELEMENTS'] = array(
            'PARENT' => 'DATA_SOURCE',
            'TYPE' => 'LIST',
            'NAME' => GetMessage('SLIDER_CB_PARAMETERS_SLIDER_PROPERTY_ELEMENTS'),
            'VALUES' => $arElements,
            'MULTIPLE' => 'Y',
            'ADDITIONAL_VALUES' => 'Y'
        );

//Свойство Ссылка доп. баннеров
        $arTemplateParameters['SLIDER_CB_PROPERTY_LINK'] = array(
            'PARENT' => 'DATA_SOURCE',
            'TYPE' => 'LIST',
            'NAME' => GetMessage('SLIDER_CB_PARAMETERS_SLIDER_PROPERTY_LINK'),
            'VALUES' => $arPropertiesStringCB,
            'ADDITIONAL_VALUES' => 'Y'
        );

//Свойство Открывать ссылки в новой вкладке доп. баннеров
        $arTemplateParameters['SLIDER_CB_PROPERTY_LINK_BLANK'] = array(
            'PARENT' => 'DATA_SOURCE',
            'TYPE' => 'LIST',
            'NAME' => GetMessage('SLIDER_CB_PARAMETERS_SLIDER_PROPERTY_LINK_BLANK'),
            'VALUES' => $arPropertiesBooleanCB,
            'ADDITIONAL_VALUES' => 'Y'
        );

//Свойство Открывать ссылки в новой вкладке доп. баннеров
        $arTemplateParameters['SLIDER_CB_PROPERTY_TEXT_COLOR'] = array(
            'PARENT' => 'DATA_SOURCE',
            'TYPE' => 'LIST',
            'NAME' => GetMessage('SLIDER_CB_PARAMETERS_SLIDER_PROPERTY_TEXT_COLOR'),
            'VALUES' => $arPropertiesStringCB,
            'ADDITIONAL_VALUES' => 'Y'
        );
    }

//**Внешний вид
//Включить автопрокрутку слайдов
    $arTemplateParameters['SLIDER_PROPERTY_AUTOPLAY'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'CHECKBOX',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_AUTOPLAY')
    );

//Частота смены слайдов
    $arTemplateParameters['SLIDER_PROPERTY_AUTOPLAY_DELAY'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'STRING',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_AUTOPLAY_DELAY')
    );

    if(!empty($arCurrentValues['IBLOCK_ID_CB'])) {
//Вид отображения баннеров
        $arTemplateParameters['SLIDER_CB_PROPERTY_VIEW'] = array(
            'PARENT' => 'VISUAL',
            'TYPE' => 'LIST',
            'NAME' => GetMessage('SLIDER_CB_PARAMETERS_SLIDER_PROPERTY_VIEW'),
            'VALUES' => array(
                'standart' => GetMessage('SLIDER_CB_PARAMETERS_SLIDER_PROPERTY_VIEW_STANDART'),
                'left' => GetMessage('SLIDER_CB_PARAMETERS_SLIDER_PROPERTY_VIEW_LEFT'),
                'right' => GetMessage('SLIDER_CB_PARAMETERS_SLIDER_PROPERTY_VIEW_RIGHT')
            ),
            'REFRESH' => 'Y'
        );

        if ($arCurrentValues['SLIDER_CB_PROPERTY_VIEW'] == 'left' || $arCurrentValues['SLIDER_CB_PROPERTY_VIEW'] == 'right') {
            $arTemplateParameters['SLIDER_CB_PROPERTY_COUNT'] = array(
                'PARENT' => 'VISUAL',
                'TYPE' => 'LIST',
                'NAME' => GetMessage('SLIDER_CB_PARAMETERS_SLIDER_PROPERTY_COUNT'),
                'VALUES' => array(
                    2 => '2',
                    4 => '4'
                )
            );
        } else {
            $arTemplateParameters['SLIDER_CB_PROPERTY_COUNT'] = array(
                'PARENT' => 'VISUAL',
                'TYPE' => 'LIST',
                'NAME' => GetMessage('SLIDER_CB_PARAMETERS_SLIDER_PROPERTY_COUNT'),
                'VALUES' => array(
                    4 => '4'
                )
            );
        }
    }
}

?>