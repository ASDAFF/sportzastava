<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
/**
 * @var array $arCurrentValues
 */

if (!CModule::IncludeModule('iblock'))
    return;

$iIBlockId = $arCurrentValues['IBLOCK_ID'];

$arTemplateParameters = array(
    'USE_LIST_DATE_FILTER' => array(
        'PARENT' => 'LIST_SETTINGS',
        'NAME' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_USE_DATE_FILTER'),
        'TYPE' => 'CHECKBOX'
    ),
    'DISPLAY_LIST_PICTURE' => array(
        'PARENT' => 'LIST_SETTINGS',
        'NAME' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_DISPLAY_PICTURE'),
        'TYPE' => 'CHECKBOX'
    ),
    'DISPLAY_LIST_PREVIEW_TEXT' => array(
        'PARENT' => 'LIST_SETTINGS',
        'NAME' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_DISPLAY_PREVIEW_TEXT'),
        'TYPE' => 'CHECKBOX'
    ),
    'DISPLAY_DETAIL_PICTURE' => array(
        'PARENT' => 'DETAIL_SETTINGS',
        'NAME' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_DISPLAY_PICTURE'),
        'TYPE' => 'CHECKBOX'
    ),
    'DISPLAY_DETAIL_PREVIEW_TEXT' => array(
        'PARENT' => 'DETAIL_SETTINGS',
        'NAME' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_DISPLAY_PREVIEW_TEXT'),
        'TYPE' => 'CHECKBOX'
    ),
    'DISPLAY_DETAIL_DATE' => array(
        'PARENT' => 'DETAIL_SETTINGS',
        'NAME' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_DISPLAY_DATE'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'Y',
    ),
    'DISPLAY_DETAIL_READ_ALSO' => array(
        'PARENT' => 'DETAIL_SETTINGS',
        'NAME' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_DISPLAY_READ_ALSO'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'N',
        'REFRESH' => 'Y'
    )
);

if ($arCurrentValues['USE_LIST_DATE_FILTER'] == 'Y') {
    $arTemplateParameters['PARAMETER_LIST_DATE_FILTER'] = array(
        'PARENT' => 'LIST_SETTINGS',
        'NAME' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_PARAMETER_DATE_FILTER'),
        'TYPE' => 'STRING',
        'DEFAULT' => 'date'
    );
}

if ($arCurrentValues['DISPLAY_DETAIL_READ_ALSO'] == 'Y') {
    if (!empty($iIBlockId)) {
        $arProperties = array();
        $arPropertiesElements = array();
        $rsProperties = CIBlockProperty::GetList(array('SORT' => 'ASC'), array(
            'IBLOCK_ID' => $iIBlockId,
            'ACTIVE' => 'Y'
        ));

        while ($arProperty = $rsProperties->Fetch()) {
            if (empty($arProperty['CODE']))
                continue;

            $sPropertyName = '['.$arProperty['CODE'].'] '.$arProperty['NAME'];
            $arProperties[$arProperty['CODE']] = $arProperty;

            if ($arProperty['PROPERTY_TYPE'] == 'E') {
                $arPropertiesElements[$arProperty['CODE']] = $sPropertyName;
            }
        }

        $arTemplateParameters['PROPERTY_DETAIL_READ_ALSO'] = array(
            'PARENT' => 'DETAIL_SETTINGS',
            'NAME' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_PROPERTY_READ_ALSO'),
            'TYPE' => 'LIST',
            'VALUES' => $arPropertiesElements,
            'ADDITIONAL_VALUES' => 'Y'
        );
    }

    $arTemplateParameters['VIEW_DETAIL_READ_ALSO'] = array(
        'PARENT' => 'DETAIL_SETTINGS',
        'NAME' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_VIEW_READ_ALSO'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            'tile' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_VIEW_READ_ALSO_TILE'),
            'blocks' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_VIEW_READ_ALSO_BLOCKS')
        )
    );
}

$arTemplateParameters['VIEW_LIST'] = array(
    'PARENT' => 'LIST_SETTINGS',
    'NAME' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_VIEW'),
    'TYPE' => 'LIST',
    'REFRESH' => 'Y',
    'VALUES' => array(
        'settings' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_VIEW_SETTINGS'),
        'news.tile' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_VIEW_TILE'),
        'news.list' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_VIEW_LIST'),
        'news.blocks.2' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_VIEW_BLOCKS')
    )
);

if ($arCurrentValues['VIEW_LIST'] == 'news.tile' || $arCurrentValues['VIEW_LIST'] == 'news.blocks.2') {
    $arLineCounts = array();
    $iLineCount = 0;

    if ($arCurrentValues['VIEW_LIST'] == 'news.tile') {
        $arLineCounts[3] = 3;
        $arLineCounts[4] = 4;
        $iLineCount = 4;
    } else {
        $arLineCounts[4] = 4;
        $arLineCounts[5] = 5;
        $iLineCount = 5;
    }

    $arTemplateParameters['VIEW_LIST_LINE_COUNT'] = array(
        'PARENT' => 'LIST_SETTINGS',
        'NAME' => GetMessage('N_DEFAULT_N_D_DEFAULT_PARAMETERS_VIEW_LINE_COUNT'),
        'TYPE' => 'LIST',
        'VALUES' => $arLineCounts,
        'DEFAULT' => $iLineCount
    );
}