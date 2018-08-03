<?php
global $MESS;
$strPath2Lang = str_replace("\\", "/", __FILE__);
$strPath2Lang = substr($strPath2Lang, 0, strlen($strPath2Lang)-strlen("/install/index.php"));
include(GetLangFileName($strPath2Lang."/lang/", "/install/index.php"));

Class prime_smartbanners extends CModule
{
    var $MODULE_ID = "prime.smartbanners";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function prime_smartbanners()
    {
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }
        else
        {
            //$this->MODULE_VERSION = COMPRESSION_VERSION;
            //$this->MODULE_VERSION_DATE = COMPRESSION_VERSION_DATE;
        }

        $this->MODULE_NAME = GetMessage("NB_MODULE_NAME");
        $this->MODULE_DESCRIPTION = GetMessage("NB_MODULE_DESC");
        $this->PARTNER_NAME = GetMessage("NB_PARTNER_NAME");;
        $this->PARTNER_URI = "https://prime-ltd.su/";
    }

    function InstallDB($arParams = array())
    {
        global $DB, $APPLICATION, $errors;
        $errors = $DB->RunSQLBatch($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/db/".strtolower($DB->type)."/install.sql");
        if (!empty($errors))
        {
            $APPLICATION->ThrowException(implode("", $errors));
            return false;
        }
        return true;
    }

    function UnInstallDB($arParams = array())
    {
        global $APPLICATION, $DB, $errors;
        $errors = $DB->RunSQLBatch($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/db/".strtolower($DB->type)."/uninstall.sql");
        if (!empty($errors))
        {
            $APPLICATION->ThrowException(implode("", $errors));
            return false;
        }
        return true;
    }

    function InstallEvents()
    {
        return true;
    }

    function UnInstallEvents()
    {
        return true;
    }

    function InstallFiles($arParams = array())
    {
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/components", $_SERVER["DOCUMENT_ROOT"]."/bitrix/components/", True, True);
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/admin", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin");
        copyDirFiles($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$this->MODULE_ID.'/install/themes', $_SERVER['DOCUMENT_ROOT'] . '/bitrix/themes', true, true);
        return true;
    }

    function UnInstallFiles($arParams = array())
    {
        global $APPLICATION,$DB;
        if (is_dir($p = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$this->MODULE_ID.'/install/components'))
        {
            if ($dir = opendir($p))
            {
                while (false !== $item = readdir($dir))
                {
                    if ($item == '..' || $item == '.' || !is_dir($p0 = $p.'/'.$item))
                        continue;

                    $dir0 = opendir($p0);
                    while (false !== $item0 = readdir($dir0))
                    {
                        if ($item0 == '..' || $item0 == '.')
                            continue;
                        DeleteDirFilesEx('/bitrix/components/'.$item.'/'.$item0);
                    }
                    closedir($dir0);
                }
                closedir($dir);
            }
        }
        DeleteDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/admin", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin");
        return true;
    }



    function DoInstall()
    {
        global $APPLICATION,$errors;
        $errors = false;
        $this->InstallFiles();
        $this->InstallDB();
        RegisterModule($this->MODULE_ID);
        RegisterModuleDependences("main", "OnEpilog",$this->MODULE_ID, "Nb_class", "ShowBanner");
        $APPLICATION->IncludeAdminFile(GetMessage("NB_INSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/step.php");
    }

    function DoUninstall()
    {
        global $APPLICATION, $DB, $errors, $step;
        $this->UnInstallFiles();
        $this->UnInstallDB();
        UnRegisterModule($this->MODULE_ID);
        UnRegisterModuleDependences("main", "OnEpilog",$this->MODULE_ID, "Nb_class", "ShowBanner");
        $APPLICATION->IncludeAdminFile(GetMessage("MOD_UNINST_OK"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/unstep.php");
    }
}

?>