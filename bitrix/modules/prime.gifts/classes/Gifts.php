<?php
use Bitrix\Main,
    Bitrix\Sale;
IncludeModuleLangFile(__FILE__);


class Gifts
{

    var $TABLE_NAME= "b_prime_gifts";
    var $MODULE_ID = "prime.gifts";
    var $SQL_FIELDS = array(
        "ID",
        "SID",
        "NAME",
        "ACTIVE",
        "PRICE_FROM",
        "PRICE_TO",
        "IMAGE_ID"
    );

    function GetPeriodGifts($sum){
        $sql = "SELECT * FROM $this->TABLE_NAME WHERE ACTIVE = 'Y' AND PRICE_FROM <= $sum AND PRICE_TO >= $sum";
        global $DB;
        return $DB->Query($sql,false);
    }

    function GetMaxGifts($sum){
        $sql = "SELECT * FROM $this->TABLE_NAME WHERE ACTIVE = 'Y' AND PRICE_FROM = (SELECT PRICE_FROM FROM $this->TABLE_NAME WHERE PRICE_FROM >= $sum LIMIT 1)";
        global $DB;
        return $DB->Query($sql,false);
    }

    function GetList($arSort = Array("NAME"=>"ASC"),$arFilter=Array(),$arSelect = Array())
    {
        if(is_array($arSelect))
        {
            if(empty($arSelect))
            $arSelect = $this->SQL_FIELDS;
        }
        else
            $arSelect = array("ID","NAME");

        $selectFields = implode(",", $arSelect);

        if(!is_array($arSort) || empty($arSort))
            $arSort = array("SORT"=>"ASC");
        foreach($arSort as $order=>$by)
        {
            $order = $order." ".$by;
            break;
        }

        if(is_array($arFilter) && count($arFilter)>0)
        {
            foreach ($arFilter as $colName => $colValue)
            {
                if(substr($colName, 0, 1) == "!")
                {
                    $eq = "<>";
                    $colName = str_replace("!", "", $colName);
                }
                else
                    $eq = "=";
                $whereFields[]= "$colName $eq '$colValue'";
            }
            if(count($whereFields)>0)
                $where = implode(" AND ", $whereFields);
        }
        $sql = "SELECT $selectFields FROM $this->TABLE_NAME";
        if(strlen($where)>0)
            $sql .= " WHERE $where";
        if(strlen($order)>0)
            $sql .= " ORDER BY $order";
        global $DB;
        return $DB->Query($sql,false);

    }

    function PricePeriod($sFromName, $sFromVal, $sToName, $sToVal, $field_input="class=\"typeinput\"", $size="10")
    {
        $str = "";
        $ds = "";

        $str .=
            GetMessage("PRIME_GIFTS_FROM").
            '<input '.$ds.' '.$field_input.' type="text" name="'.$sFromName.'" id="'.$sFromName.'" size="'.$size.'" value="'.htmlspecialcharsbx($sFromVal).'" /> '."\n".
            GetMessage("PRIME_GIFTS_TO").
            '<input '.$field_input.' type="text" name="'.$sToName.'" id="'.$sToName.'" size="'.$size.'" value="'.htmlspecialcharsbx($sToVal).'" /> '."\n";
        return '<span style="white-space: nowrap;">'.$str.'</span>';
    }


    function Add(&$arFields)
    {
        if(!$this->requireField($arFields))
            return false;

        global $DB;
        $arFields["IMAGE_ID"] = $this->SaveFile($arFields["IMAGE_ID"]);
        return $ID = $DB->Add($this->TABLE_NAME,$arFields);
    }

    function Update($ID,$arFields)
    {
        if(!$this->requireField($arFields))
            return false;

        global $DB;
        $ID = intval($ID);
        if($arFields["IMAGE_ID"]){
            $arFields["IMAGE_ID"] = $this->SaveFile($arFields["IMAGE_ID"],$ID);
        }
        $strUpdate = $DB->PrepareUpdate($this->TABLE_NAME, $arFields);
        if($strUpdate!="")
        {
            $strSql = "UPDATE $this->TABLE_NAME SET ".$strUpdate." WHERE ID=".$ID;
            $DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
        }
        return true;
    }

    function SaveFile($arImage,$ID = 0)
    {
        if (is_array($arImage))
        {
            $arImage["MODULE_ID"] = $this->MODULE_ID;

            if ($ID>0)
            {
                global $DB;

                $rsBanner= $DB->Query("SELECT IMAGE_ID FROM ".$this->TABLE_NAME." WHERE ID='$ID'", false, "<b>Error in </b><br/>File: ".__FILE__."<br/>Line: ".__LINE__."<br/>");
                if($arBanner = $rsBanner->Fetch())
                {
                    $arImage["old_file"] = $arBanner["IMAGE_ID"];
                }

            }

            if (strlen($arImage["name"])>0 || strlen($arImage["del"])>0)
            {
                $fileID = CFile::SaveFile($arImage, $arImage["MODULE_ID"]);
                if (intval($fileID)>0)
                    return intval($fileID);
                else
                    return "";
            }
            elseif($arImage["old_file"]>0)
            {
                return $arImage["old_file"];
            }
        }
        return "";
    }


    function Delete($ID)
    {
        global $DB,$strError;
        $ID = intval($ID);
        if($ID>0)
        {
            $sql = "SELECT ID,IMAGE_ID FROM $this->TABLE_NAME WHERE ID = '$ID'";
            $Banner = $DB->Query($sql, false, "File: ".__FILE__."<br/>Line:".__LINE__);
            if ($Banner = $Banner->Fetch())
            {
                if($Banner["IMAGE_ID"]>0)
                    CFile::Delete($Banner["IMAGE_ID"]);
                $strSql = "DELETE FROM $this->TABLE_NAME WHERE ID = '{$Banner["ID"]}'";
                $DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
                return true;
            }
        }
        return false;

    }

    function addSettings($arFields){
        global $DB;

        if (is_array($arFields["IMAGE_ID"]))
        {
            $arImage = $arFields["IMAGE_ID"];
            $arImage["MODULE_ID"] = $this->MODULE_ID;

            if (strlen($arImage["name"])>0 || strlen($arImage["del"])>0)
            {
                $fileID = CFile::SaveFile($arImage, $arImage["MODULE_ID"]);

                if (intval($fileID)>0)
                    $arFields["IMAGE_ID"] = intval($fileID);
                else
                    $arFields["IMAGE_ID"] = "NAN";
            }

        }

        foreach($arFields as $field => $value){
            if($value!="" and !is_array($value))
            {
                $strSql = "UPDATE b_prime_gifts_settings SET VALUE = '$value' WHERE NAME = '$field'";
                $DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
            }
        }
        return true;
    }

    function getSettings(){
        $sql = "SELECT * FROM b_prime_gifts_settings";
        global $DB;
        return $DB->Query($sql,false);
    }

    function getSettingsMorePrice($sum = false){
        $sql = "SELECT PRICE_FROM FROM $this->TABLE_NAME WHERE PRICE_FROM >= $sum LIMIT 1";
        global $DB;
        return $DB->Query($sql,false);
    }

    function copyRow($ID){

        $ID = intval($ID);
        if($ID>0)
        {
            unset($this->SQL_FIELDS[0]);
            $sql = "SELECT ".implode(',',$this->SQL_FIELDS)." FROM $this->TABLE_NAME WHERE ID=".$ID;
            global $DB;
            $resData = $DB->Query($sql,false);
            while($res = $resData->NavNext(true, "f_")){
                return $ID = $DB->Add($this->TABLE_NAME,$res);
            }
        }
    }


    function GetByID($ID)
    {
        $ID = intval($ID);
        if($ID>0)
        {
            $sql = "SELECT ".implode(',',$this->SQL_FIELDS)." FROM $this->TABLE_NAME WHERE ID=".$ID;
            global $DB;
            return $DB->Query($sql,false);
        }
    }

    function UpdateActive($ID,$arFields){
        global $DB;
        $ID = intval($ID);
        $strUpdate = $DB->PrepareUpdate($this->TABLE_NAME, $arFields);
        if($strUpdate!="")
        {
            $strSql = "UPDATE $this->TABLE_NAME SET ".$strUpdate." WHERE ID=".$ID;
            $DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
        }
        return true;
    }

    function requireField(&$arFields){

        global $DB, $APPLICATION, $USER;
        $this->LAST_ERROR = "";

        if(is_set($arFields, "NAME") && strlen($arFields["NAME"])<=0)
            $this->LAST_ERROR .= GetMessage("PRIME_GIFTS_BAD_NAME")."<br>";
        if(is_set($arFields, "SID") && strlen($arFields["SID"])<=0)
            $this->LAST_ERROR .= GetMessage("PRIME_GIFTS_BAD_SITE")."<br>";
        $strRes = CFile::CheckImageFile($arFields["IMAGE_ID"], 0, 0, 0,array("IMAGE"),false,false);
        if (strlen($strRes)>0)
            $this->LAST_ERROR .= GetMessage("PRIME_GIFTS_BAD_IMAGE")."<br>";

        if(strlen($this->LAST_ERROR)>0)
            return false;
        else
            return true;

    }

    function SendOrder(Main\Event $event){
        if($gift = $_SESSION['PRIME_GIFTS_CHANGE'][Main\Context::getCurrent()->getSite()][Sale\Fuser::getId()]){
            $order = $event->getParameter("ENTITY");
            $order->setField('COMMENTS', GetMessage("PRIME_GIFTS").$gift);
            $event->addResult(
                new Main\EventResult(
                    Main\EventResult::SUCCESS, $order
                )
            );
        }
        unset($_SESSION['PRIME_GIFTS_CHANGE'][Main\Context::getCurrent()->getSite()][Sale\Fuser::getId()]);
    }

}