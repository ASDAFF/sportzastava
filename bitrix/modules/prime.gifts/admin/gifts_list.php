<?php
$MODULE_ID = 'prime.gifts';
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$MODULE_ID."/include.php");
IncludeModuleLangFile(__FILE__);

$TableID = "b_prime_gifts"; // ID таблицы
$oSort = new CAdminSorting($TableID, "NAME", "desc");
$itemAdmin = new CAdminList($TableID, $oSort);

if($itemAdmin->EditAction())
{
    foreach($FIELDS as $ID=>$arFields)
    {
        $DB->StartTransaction();
        $ID = trim($ID);

        $Gifts = new Gifts();
        if(!$Gifts->Update($ID, $arFields))
        {
            $itemAdmin->AddUpdateError(GetMessage("SAVE_ERROR").$ID.": ".$oGifts->LAST_ERROR, $ID);
            $DB->Rollback();
        }
        $DB->Commit();
    }
}

if(($arID = $itemAdmin->GroupAction()))
{
    if($_REQUEST['action_target']=='selected')
    {
        $Data = new Gifts();
        $resData = $Data->GetList();
        while($arResult = $resData->Fetch())
            $arID[] = $arResult['ID'];
    }

    foreach($arID as $ID)
    {
        if(strlen($ID)<=0)
            continue;
        $ID = IntVal($ID);

        $Gifts = new Gifts();

        switch($_REQUEST['action'])
        {
            case "delete":
                @set_time_limit(0);
                $DB->StartTransaction();
                if(!$Gifts->Delete($ID))
                {
                    $DB->Rollback();
                    $itemAdmin->AddGroupError(GetMessage("ban_del_err"), $ID);
                }
                $DB->Commit();
                break;
            case "copy":
                if(!$Gifts->copyRow($ID))
                {
                    $DB->Rollback();
                    $itemAdmin->AddGroupError(GetMessage("ban_del_err"), $ID);
                }
                break;
            case "activate":
            case "deactivate":
                $Data = new Gifts();
                if(($resData = $Data->GetByID($ID)) && ($arFields = $resData->Fetch()))
                {
                    $arFields["ACTIVE"]=($_REQUEST['action']=="activate"?"Y":"N");
                    if(!$Data->UpdateActive($ID, $arFields))
                        $itemAdmin->AddGroupError(GetMessage("SAVE_ERROR").$Data->LAST_ERROR, $ID);
                }
                else
                    $itemAdmin->AddGroupError(GetMessage("SAVE_ERROR")." ".GetMessage("NO_BANNER"), $ID);
                break;
        }
    }
}



$gifts = new Gifts();
$resData = $gifts->GetList(array($by=>$order));

$resData = new CAdminResult($resData, $TableID);
$resData->NavStart();
$itemAdmin->AddHeaders(array(
    array("id"     =>"ID",
        "content"  =>"ID",
        "sort"     =>"ID",
        "default"  =>true,
    ),
    array(  "id"   =>"NAME",
        "content"  =>GetMessage("COL_NAME"),
        "sort"     =>"NAME",
        "default"  =>true,
    ),
    array(  "id"   =>"ACTIVE",
        "content"  =>GetMessage("COL_ACTIVE"),
        "sort"     =>"ACTIVE",
        "default"  =>true,
    ),
    array(  "id"   =>"SID",
        "content"  =>GetMessage("COL_SID"),
        "sort"     =>"SID",
        "default"  =>true,
    ),
    array(  "id"   =>"PRICE_FROM",
        "content"  =>GetMessage("COL_PRICE_FROM"),
        "sort"     =>"PRICE_FROM",
        "default"  =>true,
    ),
    array(  "id"   =>"PRICE_TO",
        "content"  =>GetMessage("COL_PRICE_TO"),
        "sort"     =>"PRICE_TO",
        "default"  =>true,
    ),
    array(  "id"   =>"IMAGE_ID",
        "content"  =>GetMessage("COL_IMAGE_ID"),
        "sort"     =>"IMAGE_ID",
        "default"  =>true,
    ),
));


while($res = $resData->NavNext(true, "f_")) {

    $row =& $itemAdmin->AddRow($f_ID, $res);
    $row->AddInputField("NAME", array("size"=>40));
    $row->AddViewField("NAME", '<a href="prime_gifts_edit.php?ID='.$f_ID.'&lang='.LANG.'">'.$f_NAME.'</a>');
    $row->AddCheckField("ACTIVE");
    $row->AddViewField("SID",htmlspecialcharsbx(implode("\n",array_keys(unserialize(htmlspecialchars_decode($f_SID))))));
    $row->AddViewField("IMAGE_ID", '<img src="'.CFile::GetPath($f_IMAGE_ID).'" style="max-width:100px;max-height:100px;">');

    $arActions = Array();

    // редактирование элемента
    $arActions[] = array(
        "ICON"=>"edit",
        "DEFAULT"=>true,
        "TEXT"=>GetMessage("REK_EDIT"),
        "ACTION"=>$itemAdmin->ActionRedirect("prime_gifts_edit.php?ID=".$f_ID)
    );

    $arActions[] = array("SEPARATOR"=>true);

    $arActions[] = array(
        "ICON" =>  "copy",
        "TEXT" =>  GetMessage("COPY"),
        "ACTION"=> $itemAdmin->ActionDoGroup($f_ID, "copy")
    );

    $arActions[] = array("SEPARATOR"=>true);

    $arActions[] = array(
        "ICON" => "delete",
        "TEXT" => GetMessage("REK_DEL"),
        "ACTION" => "if(confirm('".GetMessage('REK_DEL_CONF')."')) ".$itemAdmin->ActionDoGroup($f_ID, "delete")
    );


    if(is_set($arActions[count($arActions)-1], "SEPARATOR"))
        unset($arActions[count($arActions)-1]);
    $row->AddActions($arActions);

}


$itemAdmin->AddGroupActionTable(Array(
    "delete"=>GetMessage("MAIN_ADMIN_LIST_DELETE"), // удалить выбранные элементы
    "activate"=>GetMessage("MAIN_ADMIN_LIST_ACTIVATE"), // активировать выбранные элементы
    "deactivate"=>GetMessage("MAIN_ADMIN_LIST_DEACTIVATE"), // деактивировать выбранные элементы
));

$addbtn = array(
    array(
        "TEXT" => GetMessage("PRIME_GIFTS_ADD"),
        "LINK"=>"prime_gifts_edit.php?lang=".LANG,
        "TITLE"=>GetMessage("PRIME_GIFTS_ADD"),
        "ICON"=>"btn_new",
    ),
);
$itemAdmin->AddAdminContextMenu($addbtn);

$itemAdmin->CheckListMode();
$APPLICATION->SetTitle(GetMessage("GIFTS_LIST_TITLE"));
?>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
?>

<?
$itemAdmin->DisplayList();
?>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>
