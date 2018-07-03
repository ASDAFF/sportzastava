<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(!CModule::IncludeModule("smart.banner"))
    return false;

Nb_class::statUpdate($_REQUEST['ID'],$_REQUEST['FIELD_BANNER']);
