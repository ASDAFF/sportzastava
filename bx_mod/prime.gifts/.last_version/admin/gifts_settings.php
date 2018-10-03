<?php
$MODULE_ID = 'prime.gifts';
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$MODULE_ID."/include.php");
IncludeModuleLangFile(__FILE__);

$tabs = array(
    array("DIV" => "edit1", "TAB" => GetMessage("PRIME_GIFTS_SETTING_ONE"), "ICON"=>"main_user_edit", "TITLE"=>GetMessage("PRIME_GIFTS_SETTING_ONE")),
    array("DIV" => "edit2", "TAB" => GetMessage("PRIME_GIFTS_SETTING"), "ICON"=>"main_user_edit", "TITLE"=>GetMessage("PRIME_GIFTS_SETTING")),
);
$tabControl = new CAdminTabControl("tabControl", $tabs);
$gifts = new Gifts();

if($REQUEST_METHOD == "POST" && ($save!="" || $apply!="") && check_bitrix_sessid()){

    if(!is_array($arIMAGE))
        $arIMAGE = $_FILES["arIMAGE"];

    if($arIMAGE_del == "Y")
        $arIMAGE["del"] = $arIMAGE_del;

    $arFields = Array(
        "DESCRIPTION"		 =>	$DESCRIPTION,
        "DESCRIPTION_ONE"		 =>	$DESCRIPTION_ONE,
        "IMAGE_ID"		 => $arIMAGE,
        "GIFT_TEXT"		 => $GIFT_TEXT,
        "GIFT_TEXT_MORE"		 => $GIFT_TEXT_MORE,
        "GIFT_TEXT_MORE_FROM"		 => $GIFT_TEXT_MORE_FROM,
    );

    $res = $gifts->addSettings($arFields);
    if($res)
    {
        // если сохранение прошло удачно - перенаправим на новую страницу
        // (в целях защиты от повторной отправки формы нажатием кнопки "Обновить" в браузере)
        if ($apply != "")
            // если была нажата кнопка "Применить" - отправляем обратно на форму.
            LocalRedirect("/bitrix/admin/prime_gifts_settings.php?ID=".$ID."&mess=ok&lang=".LANG."&".$tabControl->ActiveTabParam());
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

$settings = $gifts->getSettings();
while($row = $settings->ExtractFields("str_")){
    $arValue[$row['NAME']] = $row['VALUE'];
}


$APPLICATION->SetTitle(GetMessage("PRIME_GIFTS_SETTING"));
?>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
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
    <!--Content-->
    <?
    //********************
    // первая закладка - форма редактирования баннера
    //********************
    $tabControl->BeginNextTab();
    ?>


    <tr>
        <td></span><?echo GetMessage("PRIME_YOUR_GIFT_TEXT")?></td>
        <td><input type="text" name="GIFT_TEXT" value="<?=($arValue[GIFT_TEXT]) ? $arValue[GIFT_TEXT] : GetMessage("PRIME_YOUR_GIFT_TEXT");?>" size="30" maxlength="100"></td>
    </tr>

    <tr>
        <td></span><?echo GetMessage("PRIME_YOUR_GIFT_TEXT_MORE")?></td>
        <td><input type="text" name="GIFT_TEXT_MORE" value="<?=($arValue[GIFT_TEXT_MORE]) ? $arValue[GIFT_TEXT_MORE] : GetMessage("PRIME_YOUR_GIFT_TEXT_MORE");?>" size="30" maxlength="100"></td>
    </tr>

    <tr>
        <td></span><?echo GetMessage("PRIME_YOUR_GIFT_TEXT_MORE_FROM")?></td>
        <td><input type="text" name="GIFT_TEXT_MORE_FROM" value="<?=($arValue[GIFT_TEXT_MORE_FROM]) ? $arValue[GIFT_TEXT_MORE_FROM] : GetMessage("PRIME_YOUR_GIFT_TEXT_MORE_FROM");?>" size="30" maxlength="100"></td>
    </tr>



    <?$tabControl->BeginNextTab();?>

    <tr valign="top" id="eFile">
        <td width="40%"><?=GetMessage("PRIME_GIFTS_SETTINGS_IMAGE")?></td>
        <td width="60%"><?echo CFile::InputFile("arIMAGE", 25, $arValue[IMAGE_ID]);?></td>
    </tr>
    <? if(intval($arValue[IMAGE_ID])>0):?>
        <tr valign="top" id="eFile">
            <td><input type="hidden" name="IMAGE_ID" value="<?=$arValue[IMAGE_ID]?>"/></td>
            <td width="40%"><img src="<?=CFile::GetPath($arValue[IMAGE_ID]);?>" width="300"></td>
        </tr>

    <?endif;?>

    <tr class="heading">
        <td colspan="2"><?=GetMessage("PRIME_GIFTS_SETTINGS_DESCRIPTION")?></td>
    </tr>

    <tr>

        <td colspan="2" align="center">
            <?CFileMan::AddHTMLEditorFrame(
                "DESCRIPTION",
                $arValue[DESCRIPTION],
                "DESCRIPTION_TYPE_HTML",
                "DESCRIPTION_TYPE_HTML",
                array(
                    'height' => 450,
                    'width' => '100%'
                ),
                "N",
                0,
                "",
                "",
                false,
                true,
                false,
                array()
            );?>
        </td>
    </tr>

    <tr class="heading">
        <td colspan="2"><?=GetMessage("PRIME_GIFTS_SETTINGS_DESCRIPTION_ONE")?></td>
    </tr>

    <tr>

        <td colspan="2" align="center">
            <?CFileMan::AddHTMLEditorFrame(
                "DESCRIPTION_ONE",
                $arValue[DESCRIPTION_ONE],
                "DESCRIPTION_ONE_TYPE_HTML",
                "DESCRIPTION_ONE_TYPE_HTML",
                array(
                    'height' => 450,
                    'width' => '100%'
                ),
                "N",
                0,
                "",
                "",
                false,
                true,
                false,
                array()
            );?>
        </td>
    </tr>


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
    <?echo GetMessage("REQUIRED_FIELDS_PRICE")?>
<?echo EndNote();?>
</form>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>
