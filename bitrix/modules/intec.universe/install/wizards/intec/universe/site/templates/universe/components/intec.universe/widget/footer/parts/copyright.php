<?if($arParams["FOOTER_COPYRIGHT_TEXT"]){?>
    <?$str = str_replace("#YEAR#",date("Y"),$arParams["FOOTER_COPYRIGHT_TEXT"]);?>
    <?=$str;?>
<?}?>