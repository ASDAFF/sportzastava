<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

$rsForms = CForm::GetList($by = 'SORT', $order = 'ASC', array(
    'ACTIVE' => 'Y'
), ($filtered = false));

$arForms = array();

while ($arForm = $rsForms->GetNext()) {
    $arForms[$arForm['ID']] = '[' . $arForm['ID'] . '] ' . $arForm['NAME'];
}

if ($arCurrentValues['FEEDBACK'] == "Y") {
    $arTemplateParameters["FEEDBACK_FORM_ID"] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('C_SERVICES_PARAMETER_ELEMENT_NAME_FEEDBACK_FORM_ID'),
        'DEFAULT_VALUE' => "",
        "VALUES" => $arForms,
    );
}

if ($arCurrentValues['SERVICES'] == "Y") {
    $arTemplateParameters["SERVICES_FORM_ID"] = array(
        'PARENT' => 'VISUAL',
        'TYPE' => 'LIST',
        'NAME' => GetMessage('C_SERVICES_PARAMETER_ELEMENT_NAME_SERVICE_FORM_ID'),
        'DEFAULT_VALUE' => "SERVICES",
        "VALUES" => $arForms,
        'REFRESH' => 'Y'
    );
}

if ($arCurrentValues['SERVICES'] == "Y") {
    if(!empty($arCurrentValues["SERVICES_FORM_ID"])) {
        $arFormFields = array();
        $rsFormFields = CFormField::GetList(
            $arCurrentValues["SERVICES_FORM_ID"],
            'N',
            $by = null,
            $asc = null,
            array(
                'ACTIVE' => 'Y'
            ),
            ($filtered = false)
        );

        while ($arFormField = $rsFormFields->GetNext()) {

            $rsFormAnswers = CFormAnswer::GetList(
                $arFormField['ID'],
                $sort = '',
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

        $arTemplateParameters["PROPERTY_FORM_ORDER_SERVICE"] = array(
            'PARENT' => 'VISUAL',
            'TYPE' => 'LIST',
            'NAME' => GetMessage('PROPERTY_FORM_ORDER_SERVICE'),
            'DEFAULT_VALUE' => "SERVICES",
            "VALUES" => $arFormFields,
            'REFRESH' => 'Y'
        );
    }
}