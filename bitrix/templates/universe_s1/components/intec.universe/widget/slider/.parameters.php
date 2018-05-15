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

//**Внешний вид
//Включить автопрокрутку слайдов
    $arTemplateParameters['SLIDER_PROPERTY_AUTOPLAY'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'CHECKBOX',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_AUTOPLAY')
    );

//Включить автопрокрутку слайдов
    $arTemplateParameters['SLIDER_PROPERTY_AUTOPLAY_DELAY'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'STRING',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_AUTOPLAY_DELAY')
    );

//Высота баннера
    $arTemplateParameters['SLIDER_PROPERTY_HEIGHT'] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('SLIDER_PARAMETERS_SLIDER_PROPERTY_HEIGHT'),
        'VALUES' => array(
            '400' => '400px',
            '450' => '450px',
            '500' => '500px',
            '550' => '550px',
            '600' => '600px',
        ),
        'ADDITIONAL_VALUES' => 'Y'
    );
}

?>