<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use intec\Core;
use intec\core\helpers\FileHelper;
use intec\constructor\structure\Widget;

Loc::loadMessages(__FILE__);

class intec_constructorlite extends CModule
{
    var $MODULE_ID = "intec.constructorlite";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $PARTNER_NAME;
    var $PARTNER_URI;

    protected $directories = [];

    function intec_constructorlite ()
    {
        /** @var array $arModuleVersion */
        require('version.php');

        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = GetMessage('intec.constructorlite.install.index.name');
        $this->MODULE_DESCRIPTION = GetMessage('intec.constructorlite.install.index.description');
        $this->PARTNER_NAME = "Intec";
        $this->PARTNER_URI = "http://intecweb.ru";
    }

    function InstallDB() {}

    function UnInstallDB() {}

    function DoInstall()
    {
        require_once(__DIR__.'/../classes/Loader.php');

        global $APPLICATION;
        parent::DoInstall();

        $this->InstallDB();

        if (!Loader::includeModule('intec.core')) {
            $APPLICATION->IncludeAdminFile(
                GetMessage("module.install.requires"),
                __DIR__."/requires.php"
            );
            exit;
        }

        foreach ($this->directories as $directoryFrom => $directoryTo) {
            FileHelper::copyDirectory(
                Core::getAlias($directoryFrom),
                Core::getAlias($directoryTo)
            );
        }

        $directoryFrom = $this->GetInstallAdminDirectory();
        $directoryTo = Core::getAlias('@bitrix/admin');
        $entries = $this->GetInstallAdmin();

        foreach ($entries as $entry) {
            $pathTo = $directoryTo.'/'.$entry;
            $pathFrom = $directoryFrom.'/'.$entry;

            if (!FileHelper::isFile($pathTo))
                copy($pathFrom, $pathTo);
        }

        $directoryFrom = $this->GetInstallComponentsDirectory();
        $directoryTo = Core::getAlias('@bitrix/components');
        $entries = $this->GetInstallComponents();

        foreach ($entries as $entry) {
            $pathTo = $directoryTo.'/'.$entry;
            $pathFrom = $directoryFrom.'/'.$entry;

            if (!FileHelper::isDirectory($pathTo))
                FileHelper::copyDirectory($pathFrom, $pathTo);
        }

        $directory = $this->GetInstallWidgetsDirectory();
        $entries = $this->GetInstallWidgets();

        foreach ($entries as $entry) {
            Widget::install('intec.constructor', $entry, $directory.DIRECTORY_SEPARATOR.$entry, true);
        }

        RegisterModule($this->MODULE_ID);
    }

    function DoUninstall()
    {
        require_once(__DIR__.'/../classes/Loader.php');

        parent::DoUninstall();

        $this->UnInstallDB();

        DeleteDirFilesEx(BX_PERSONAL_ROOT.'/widgets/intec.constructor');

        if (!Loader::includeModule('intec.core')) {
            UnRegisterModule($this->MODULE_ID);
            return;
        }

        $directory = Core::getAlias('@bitrix/admin');
        $entries = $this->GetInstallAdmin();

        foreach ($entries as $entry) {
            $path = $directory.'/'.$entry;

            if (FileHelper::isFile($path))
                unlink($path);
        }

        $directory = Core::getAlias('@bitrix/components/intec');
        $entries = $this->GetInstallComponents();

        foreach ($entries as $entry) {
            $path = $directory.'/'.$entry;

            if (FileHelper::isDirectory($path))
                FileHelper::removeDirectory($path);
        }

        UnRegisterModule($this->MODULE_ID);
    }

    function GetInstallDirectory()
    {
        return Core::getAlias('@intec/constructor/module/install');
    }

    function GetInstallAdminDirectory()
    {
        return $this->GetInstallDirectory().'/admin';
    }

    function GetInstallAdmin()
    {
        return FileHelper::getDirectoryEntries(
            $this->GetInstallAdminDirectory(),
            false
        );
    }

    function GetInstallComponentsDirectory()
    {
        return $this->GetInstallDirectory().'/components';
    }

    function GetInstallComponents()
    {
        return FileHelper::getDirectoryEntries(
            $this->GetInstallComponentsDirectory(),
            false
        );
    }

    function GetInstallWidgetsDirectory()
    {
        return $this->GetInstallDirectory().'/widgets';
    }

    function GetInstallWidgets()
    {
        return FileHelper::getDirectoryEntries(
            $this->GetInstallWidgetsDirectory(),
            false
        );
    }
}