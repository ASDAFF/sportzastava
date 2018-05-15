<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class intec_universe extends CModule
{
    var $MODULE_ID = 'intec.universe';
    var $MODULE_CLASS;
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $PARTNER_NAME;
    var $PARTNER_URI;
    var $MODULE_GROUP_RIGHTS = "Y";
    var $DEPENDENCIES = [
        'intec.core'
    ];

    function intec_universe()
    {
        $arModuleVersion = array();

        include('version.php');

        $this->MODULE_CLASS = 'IntecUniverse';
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->MODULE_NAME = Loc::getMessage('intec.universe.installer.name');
        $this->MODULE_DESCRIPTION = Loc::getMessage('intec.universe.installer.description');
        $this->PARTNER_NAME = 'Intec';
        $this->PARTNER_URI = 'http://www.intecweb.ru';
    }

    function InstallDB() { return true; }
    function UnInstallDB() { return true; }

    function GetDirectory()
    {
        return $_SERVER['DOCUMENT_ROOT'].BX_PERSONAL_ROOT.'/modules/'.$this->MODULE_ID;
    }

    function InstallFiles()
    {
        CopyDirFiles($this->GetDirectory().'/install/components', $_SERVER['DOCUMENT_ROOT'].BX_PERSONAL_ROOT.'/components', true, true);
        CopyDirFiles($this->GetDirectory().'/install/modules', $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT.'/modules', true, true);
        return true;
    }

    function UnInstallFiles()
    {
        DeleteDirFilesEx(BX_PERSONAL_ROOT.'/components/intec.universe');
        DeleteDirFilesEx(BX_PERSONAL_ROOT.'/wizards/intec/universe');
        return true;
    }

    function InstallModules()
    {
        include($this->GetDirectory().'/install/procedures/InstallModules.php');
    }

    function UnInstallModules()
    {
        include($this->GetDirectory().'/install/procedures/UnInstallModules.php');
    }

    function DoInstall()
    {
        global $APPLICATION;

        foreach ($this->DEPENDENCIES as $DEPENDENCY)
            if (!Loader::includeModule($DEPENDENCY)) {
                $APPLICATION->IncludeAdminFile(
                    Loc::getMessage('intec.universe.installer.modules.title'),
                    $_SERVER['DOCUMENT_ROOT'] . BX_PERSONAL_ROOT . '/modules/' . $this->MODULE_ID . '/install/modules.php'
                );

                exit();
            }

        $this->InstallFiles();
        $this->InstallDB();
        $this->InstallEvents();
        $this->InstallModules();

        RegisterModule($this->MODULE_ID);

        $APPLICATION->IncludeAdminFile(
            Loc::getMessage('intec.universe.installer.install.title'),
            $_SERVER['DOCUMENT_ROOT'].BX_PERSONAL_ROOT.'/modules/'.$this->MODULE_ID.'/install/step.php'
        );
    }

    function DoUninstall()
    {
        global $APPLICATION;

        $continue = $_POST['go'];
        $continue = $continue == 'Y';

        if (!$continue)
            $APPLICATION->IncludeAdminFile(
                Loc::getMessage('intec.universe.installer.uninstall.title'),
                $_SERVER['DOCUMENT_ROOT'].BX_PERSONAL_ROOT.'/modules/'.$this->MODULE_ID.'/install/unstep.1.php'
            );

        $this->UnInstallDB();
        $this->UnInstallFiles();
        $this->UnInstallEvents();
        $this->UnInstallModules();

        UnRegisterModule($this->MODULE_ID);

        $APPLICATION->IncludeAdminFile(
            Loc::getMessage('intec.universe.installer.uninstall.title'),
            $_SERVER['DOCUMENT_ROOT'].BX_PERSONAL_ROOT.'/modules/'.$this->MODULE_ID.'/install/unstep.2.php'
        );
    }
}