<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arCurrentValues
 */

if (!CModule::IncludeModule('iblock'))
    return;

$iBlockTypes = CIBlockParameters::GetIBlockTypes();
$sIBlockType = $arCurrentValues['IBLOCK_TYPE'];
$iIBlockId = $arCurrentValues['IBLOCK_ID'];

if (!empty($sIBlockType) && !empty($iIBlockId)) {

    $arPropertiesString = array();
    $arPropertiesBoolean = array();
    $arPropertiesFile = array();
    $arPropertiesList = array();
    $arIBlockProperties = array();
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

    $arTemplateParameters = array(
        'PROPERTY_TITLE' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_TITLE'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_TITLE_TEXT_COLOR' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_TITLE_TEXT_COLOR'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_DESCRIPTION' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_DESCRIPTION'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_DESCRIPTION_TEXT_COLOR' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_DESCRIPTION_TEXT_COLOR'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_LINK' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_LINK'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_LINK_TARGET' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_LINK_TARGET'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesBoolean,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_BUTTON_SHOW' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_BUTTON_SHOW'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesBoolean,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_BUTTON_TEXT' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_BUTTON_TEXT'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_BUTTON_TEXT_COLOR' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_BUTTON_TEXT_COLOR'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_BUTTON_COLOR' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_BUTTON_COLOR'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesString,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_POSITION' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_POSITION'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesList,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IMAGE' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_IMAGE'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesFile,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IMAGE_POSITION' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_IMAGE_POSITION'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesList,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'AUTOPLAY' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_AUTOPLAY'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'N'
        ),
        'AUTOPLAY_DELAY' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_AUTOPLAY_DELAY'),
            'TYPE' => 'STRING',
        ),
        /*'PROPERTY_BANNER_HEIGHT' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('N_L_SLIDER_PARAMETERS_PROPERTY_BANNER_HEIGHT'),
            'TYPE' => 'LIST',
            'VALUES' => array(
                '400' => '400px',
                '450' => '450px',
                '500' => '500px',
                '550' => '550px',
                '600' => '600px'
            ),
            'ADDITIONAL_VALUES' => 'Y'
        )*/
    );

    //Тип инфоблока доп. баннеров
    $arTemplateParameters['IBLOCK_TYPE_COMPLEX_BANNER'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('IBLOCK_TYPE_COMPLEX_BANNER'),
        'TYPE' => 'LIST',
        'VALUES' => $iBlockTypes,
        'REFRESH' => 'Y',
        'ADDITIONAL_VALUES' => 'Y'
    );

    //Инфоблок доп. баннеров
    $arCBanner = array();
    $iBlockIdCBanner = CIBlock::GetList(
        array('SORT' => 'ASC'),
        array('TYPE' => $arCurrentValues['IBLOCK_TYPE_COMPLEX_BANNER'])
    );
    while ($arr = $iBlockIdCBanner->Fetch())
        $arCBanner[$arr['ID']] = '[' . $arr["CODE"] . ']' . $arr['NAME'];
    unset($arr, $iBlockIdCBanner);
    $arTemplateParameters['IBLOCK_ID_COMPLEX_BANNER'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('IBLOCK_ID_COMPLEX_BANNER'),
        'TYPE' => 'LIST',
        'VALUES' => $arCBanner,
        'ADDITIONAL_VALUES' => 'Y',
        'REFRESH' => 'Y'
    );

    $CBPropsString = array();
    $CBPropsBool = array();
    $CBProperties = CIBlockProperty::GetList(
        array('SORT' => 'ASC'),
        array(
            'IBLOCK_TYPE' => $arCurrentValues['IBLOCK_TYPE_COMPLEX_BANNER'],
            'IBLOCK_ID' => $arCurrentValues['IBLOCK_ID_COMPLEX_BANNER'],
            'ACTIVE' => 'Y'
        )
    );
    while ($propCB = $CBProperties->Fetch()) {
        if ($propCB['PROPERTY_TYPE'] == 'S') {
            $CBPropsString[$propCB['CODE']] = '['.$propCB['CODE'].'] '.$propCB['NAME'];
        }
        if ($propCB['PROPERTY_TYPE'] == 'L' &&
            $propCB['LIST_TYPE'] == 'C' &&
            $propCB['MULTIPLE'] == 'N')
        {
            $CBPropsBool[$propCB['CODE']] = '['.$propCB['CODE'].'] '.$propCB['NAME'];
        }
    }

    //Свойство "Ссылка"
    $arTemplateParameters['PROPERTY_COMPLEX_BANNER_LINK'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('PROPERTY_COMPLEX_BANNER_LINK'),
        'TYPE' => 'LIST',
        'VALUES' => $CBPropsString
    );

    //Свойство "Открывать ссылки в новом окне"
    $arTemplateParameters['PROPERTY_COMPLEX_BANNER_LINK_BLANK'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('PROPERTY_COMPLEX_BANNER_LINK_BLANK'),
        'TYPE' => 'LIST',
        'VALUES' => $CBPropsBool
    );

    //Цвет текста баннера
    $arTemplateParameters['PROPERTY_COMPLEX_BANNER_TEXT_COLOR'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('PROPERTY_COMPLEX_BANNER_TEXT_COLOR'),
        'TYPE' => 'LIST',
        'VALUES' => $CBPropsString
    );

    //Вид отображения баннеров
    $arTemplateParameters['COMPLEX_BANNER_VIEW'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('COMPLEX_BANNER_VIEW'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            'standart' => GetMessage('COMPLEX_BANNER_VIEW_STANDART'),
            'left' => GetMessage('COMPLEX_BANNER_VIEW_LEFT'),
            'right' => GetMessage('COMPLEX_BANNER_VIEW_RIGHT')
        ),
        'REFRESH' => 'Y'
    );

    //Количество баннеров
    if ($arCurrentValues['COMPLEX_BANNER_VIEW'] == 'left' ||
        $arCurrentValues['COMPLEX_BANNER_VIEW'] == 'right') {

        $arTemplateParameters['COMPLEX_BANNER_COUNT'] = array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('COMPLEX_BANNER_COUNT'),
            'TYPE' => 'LIST',
            'VALUES' => array(
                4 => '4',
                2 => '2'
            )
        );

    } else {

        $arTemplateParameters['COMPLEX_BANNER_COUNT'] = array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('COMPLEX_BANNER_COUNT'),
            'TYPE' => 'LIST',
            'VALUES' => array(
                4 => '4'
            )
        );

    }

    //Доп. баннеры
    $arCBannerElements = array();
    $arFilter = array(
        'IBLOCK_TYPE' => $arCurrentValues['IBLOCK_TYPE_COMPLEX_BANNER'],
        'IBLOCK_ID' => $arCurrentValues['IBLOCK_ID_COMPLEX_BANNER'],
        'ACTIVE' => 'Y'
    );
    $elements = CIBlockElement::GetList(
        array(),
        $arFilter,
        false,
        false,
        array()
    );
    while ($arr = $elements->Fetch())
        $arCBannerElements[$arr['ID']] = '['.$arr['ID'].'] '.$arr['NAME'];
    unset ($arr, $elements, $arFilter);
    $arTemplateParameters['COMPLEX_BANNER_ELEMENTS'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('COMPLEX_BANNER_ELEMENTS'),
        'TYPE' => 'LIST',
        'MULTIPLE' => 'Y',
        'VALUES' => $arCBannerElements
    );


}