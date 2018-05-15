<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

$arForms = array();
$dbForms = CStartShopForm::GetList();

while ($arForm = $dbForms->Fetch())
    $arForms[$arForm['ID']] = '['.$arForm['ID'].'] '.(!empty($arForm['LANG'][LANGUAGE_ID]['NAME']) ? $arForm['LANG'][LANGUAGE_ID]['NAME'] : $arForm['CODE']);

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
        $rsFormFields = CStartShopFormProperty::GetList(
            array(),array('FORM' => $arCurrentValues["SERVICES_FORM_ID"])

        );

        while ($arFormField = $rsFormFields->GetNext()) {
            $arFormFields[$arFormField['ID']] = '['.$arFormField['ID'].'] '.$arFormField['LANG']['ru']['NAME'];
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