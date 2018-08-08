<?php
$MODULE_ID = 'prime.gifts';
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$MODULE_ID."/include.php");
IncludeModuleLangFile(__FILE__);
$ID = intval($ID);

$tabs = array(
    array("DIV" => "edit1", "TAB" => GetMessage("PRIME_GIFTS_TAB"), "ICON"=>"main_user_edit", "TITLE"=>GetMessage("PRIME_GIFTS_TAB")),
);
$tabControl = new CAdminTabControl("tabControl", $tabs);
$gifts = new Gifts();

if($REQUEST_METHOD == "POST" && ($save!="" || $apply!="") && check_bitrix_sessid()){

    if($ACTIVE != "Y")
        $ACTIVE = 'N';

    $SID = $_POST["SID"];
    if(!empty($SID))
        $SID = serialize($SID);
    else
        $SID = '';

    if(!is_array($arIMAGE))
        $arIMAGE = $_FILES["arIMAGE"];

    if($arIMAGE_del == "Y")
        $arIMAGE["del"] = $arIMAGE_del;

    $arFields = Array(
        "ACTIVE"		 =>	$ACTIVE,
        "SID"		     =>	$SID,
        "NAME"			 => $NAME,
        "PRICE_FROM"		 => $PRICE_FROM,
        "PRICE_TO"		 => $PRICE_TO,
        "IMAGE_ID"		 => $arIMAGE,
    );
    if($ID > 0)
    {
        $res = $gifts->Update($ID, $arFields);
    }
    else
    {
        $ID = $gifts->Add($arFields);
        $res = ($ID > 0);
    }

    if($res)
    {
        // если сохранение прошло удачно - перенаправим на новую страницу
        // (в целях защиты от повторной отправки формы нажатием кнопки "Обновить" в браузере)
        if ($apply != "")
            // если была нажата кнопка "Применить" - отправляем обратно на форму.
            LocalRedirect("/bitrix/admin/prime_gifts_edit.php?ID=".$ID."&mess=ok&lang=".LANG."&".$tabControl->ActiveTabParam());
        else
            // если была нажата кнопка "Сохранить" - отправляем к списку элементов.
            LocalRedirect("/bitrix/admin/prime_gifts_list.php?lang=".LANG);
    }
    else
    {
        if($e = $APPLICATION->GetException())
            $message = new CAdminMessage(GetMessage("BANNER_SAVE_ERROR"), $e);
    }

}

if($ID>0)
{
    $arBanner = $gifts->GetByID($ID);
    if(!$arBanner->ExtractFields("str_"))
        $ID=0;

    global $DB;

    if(!$str_SID = unserialize(htmlspecialchars_decode($str_SID)))
        $str_SID = array();
}

$APPLICATION->SetTitle(($ID>0? GetMessage("PRIME_EDIT_GIFTS").$ID : GetMessage("PRIME_ADD_GIFTS")));
?>


<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
?>

<?
$aMenu = array(
    array(
        "TEXT"=>GetMessage("PRIME_GIFTS_LIST_TITLE"),
        "TITLE"=>GetMessage("PRIME_GIFTS_LIST_TITLE"),
        "LINK"=>"prime_gifts_list.php?lang=".LANG,
        "ICON"=>"btn_list",
    ),
    array(
        "TEXT"	=> GetMessage("PRIME_GIFTS_DELETE_TITLE"),
        "TITLE"	=> GetMessage("PRIME_GIFTS_DELETE_TITLE"),
        "LINK"	=> "javascript:if(confirm('".GetMessage("BANNER_DELETE_CONFIRM")."'))window.location='prime_gifts_list.php?ID=".$ID."&lang=".LANGUAGE_ID."&sessid=".bitrix_sessid()."&action=delete';",
        "ICON"	=> "btn_delete"
    )
);

$topMenu = new CAdminContextMenu($aMenu);
$topMenu->Show();

if($_REQUEST["mess"] == "ok" && $ID>0)
    CAdminMessage::ShowMessage(array("MESSAGE"=>GetMessage("PRIME_GIFTS_SAVED"), "TYPE"=>"OK"));

if($message)
    echo $message->Show();
elseif($gifts->LAST_ERROR!="")
    CAdminMessage::ShowMessage($gifts->LAST_ERROR);
?>

<form method="POST" Action="<?echo $APPLICATION->GetCurPage()?>" ENCTYPE="multipart/form-data" name="post_form">
    <?// проверка идентификатора сессии ?>
    <?echo bitrix_sessid_post();?>
    <input type="hidden" name="lang" value="<?=LANG?>">
    <?if($ID>0 && !$bCopy):?>
        <input type="hidden" name="ID" value="<?=$ID?>">
    <?endif;?>

<?
// отобразим заголовки закладок
$tabControl->Begin();
?>
<?
//********************
// первая закладка - форма редактирования баннера
//********************
$tabControl->BeginNextTab();
?>


<!--Content-->
    <tr class="heading">
        <td colspan="2"><?echo GetMessage("PRIME_MAIN_INFO")?></td>
    </tr>

    <tr>
        <td width="40%"><label for="active"><?echo GetMessage("PRIME_GIFTS_ACTIVE")?></label></td>
        <td width="60%">
            <?
            echo InputType("checkbox", "ACTIVE", "Y", $str_ACTIVE, false, "", 'id="active"');
            ?>
        </td>
    </tr>

    <tr>
        <td width="40%"><span class="required">*</span><?echo GetMessage("PRIME_GIFTS_SITE")?></td>
        <td width="60%">
            <?
            $rsSites = CSite::GetList($by="sort", $order="desc", array("ACTIVE" => "Y"));
            while ($arSite = $rsSites->Fetch())
            {
                $checked = "";
                if($str_SID[$arSite["LID"]] == "Y")
                    $checked = "checked";
                echo "<input type='checkbox' name='SID[{$arSite["LID"]}]' $checked value='Y' id='site_{$arSite["LID"]}'/><label for='site_{$arSite["LID"]}'> [".$arSite["LID"]."] ".htmlspecialcharsbx($arSite["NAME"])."</label><br/>";
            }
            ?>
        </td>
    </tr>

    <tr>
        <td><span class="required">*</span><?echo GetMessage("PRIME_GIFTS_NAME")?></td>
        <td><input type="text" name="NAME" value="<?echo $str_NAME;?>" size="30" maxlength="100"></td>
    </tr>

    <tr class="heading">
        <td colspan="2"><?echo GetMessage("PRIME_SETTINGS_INFO")?></td>
    </tr>

    <tr>
        <td><?=GetMessage("PRIME_GIFTS_PRICE");?></td>
        <td><?echo $gifts->PricePeriod("PRICE_FROM", $str_PRICE_FROM, "PRICE_TO", $str_PRICE_TO, "post_form");?></td>
    </tr>

    <tr valign="top" id="eFile">
        <td><?=GetMessage("PRIME_GIFTS_FILE")?></td>
        <td><?echo CFile::InputFile("arIMAGE", 25, $str_IMAGE_ID);?></td>
    </tr>
    <? if(intval($str_IMAGE_ID)>0):?>
        <tr valign="top" id="eFile">
            <td><input type="hidden" name="IMAGE_ID" value="<?=$str_IMAGE_ID?>"/></td>
            <td width="40%"><img src="<?=CFile::GetPath($str_IMAGE_ID);?>" width="300"></td>
        </tr>

    <?endif;?>

<!--#Content#-->

<?
$tabControl->Buttons(
    array(
        "back_url" => "prime_gifts_list.php?lang=".LANG,
    )
);
?>

<?
$tabControl->End();
?>
<?
$tabControl->ShowWarnings("post_form", $message);
?>
<?echo BeginNote();?>
<span class="required">*</span><?echo GetMessage("REQUIRED_FIELDS")?>
<?echo EndNote();?>
</form>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>
