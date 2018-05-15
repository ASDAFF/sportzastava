<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use intec\core\helpers\ArrayHelper;

/**
 * @var array $arTemplateParameters
 * @var array $arCurrentValues
 *
 * @var array $arIBlocksTypes
 * @var array $arIBlocks
 * @var array $arIBlocksByTypes
 * @var array $arProperties
 */

$arForms = [];
$rsForms = CForm::GetList(
    $by = 'sort',
    $order = 'asc',
    array(),
    $filtered = false
);

while ($arForm = $rsForms->GetNext())
    $arForms[$arForm['ID']] = '['.$arForm['ID'].'] '.$arForm['NAME'];

unset($arForm);
unset($rsForms);

$bFeedbackFormShow = ArrayHelper::getValue($arCurrentValues, 'FEEDBACK_FORM_SHOW') === 'Y';
$iProductFormId = ArrayHelper::getValue($arCurrentValues, 'PRODUCT_FORM_ID');

$arTemplateParameters['FEEDBACK_FORM_ID'] = array(
    'PARENT' => 'BASE',
    'NAME' => Loc::getMessage('C_CATALOG_FEEDBACK_FORM_ID'),
    'TYPE' => 'LIST',
    'VALUES' => $arForms,
    'REFRESH' => 'Y',
    'DEFAULT' => 'N'
);

$arTemplateParameters['FEEDBACK_FORM_SHOW'] = array(
    'PARENT' => 'DETAIL_SETTINGS',
    'NAME' => Loc::getMessage('C_CATALOG_FEEDBACK_FORM_SHOW'),
    'TYPE' => 'CHECKBOX',
    'REFRESH' => 'Y',
    'DEFAULT' => 'N'
);

if ($bFeedbackFormShow)
    $arTemplateParameters['FEEDBACK_FORM_TEXT'] = array(
        'PARENT' => 'DETAIL_SETTINGS',
        'NAME' => Loc::getMessage('C_CATALOG_FEEDBACK_FORM_TEXT'),
        'TYPE' => 'STRING'
    );

$arTemplateParameters['PRODUCT_FORM_ID'] = array(
    'PARENT' => 'BASE',
    'NAME' => Loc::getMessage('C_CATALOG_PRODUCT_FORM_ID'),
    'TYPE' => 'LIST',
    'VALUES' => $arForms,
    'REFRESH' => 'Y',
    'DEFAULT' => 'N'
);

if (!empty($iProductFormId)) {
    $arFormFields = array();
    $rsFormFields = CFormField::GetList(
        $iProductFormId,
        'N',
        $by = null,
        $order = null,
        array(
            'ACTIVE' => 'Y'
        ),
        $filtered = false
    );

    while ($arFormField = $rsFormFields->GetNext()) {
        $rsFormAnswers = CFormAnswer::GetList(
            $arFormField['ID'],
            $by = '',
            $order = '',
            array(),
            $filtered = false
        );

        while ($arFormAnswer = $rsFormAnswers->GetNext()) {
            $sType = $arFormAnswer['FIELD_TYPE'];

            if (empty($sType))
                continue;

            $sId = 'form_'.$sType.'_'.$arFormAnswer['ID'];
            $arFormFields[$sId] = '['.$arFormAnswer['ID'].'] '.$arFormField['TITLE'];
        }
    }

    $arTemplateParameters['PRODUCT_FORM_PROPERTY_PRODUCT'] = array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => Loc::getMessage('C_CATALOG_PRODUCT_FORM_PROPERTY_PRODUCT'),
        'TYPE' => 'LIST',
        'VALUES' => $arFormFields,
        'DEFAULT' => 'N'
    );
}