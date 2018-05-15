<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use intec\Core;
use intec\core\helpers\FileHelper;
use intec\constructor\structure\Widget;

Loc::loadMessages(__FILE__);

class intec_constructor extends CModule
{
    var $MODULE_ID = "intec.constructor";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $PARTNER_NAME;
    var $PARTNER_URI;

    protected $directories = [
        '@intec/constructor/module/install/theme' => '@intec/constructor/theme'
    ];

    function intec_constructor ()
    {
        /** @var array $arModuleVersion */
        require('version.php');

        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = GetMessage('intec.constructor.install.index.name');
        $this->MODULE_DESCRIPTION = GetMessage('intec.constructor.install.index.description');
        $this->PARTNER_NAME = "Intec";
        $this->PARTNER_URI = "http://intecweb.ru";
    }

    function InstallDB()
    {
        global $DB;

        $DB->Query('CREATE TABLE IF NOT EXISTS `constructor_builds` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `code` varchar(255) NOT NULL,
          `name` varchar(255) NOT NULL,
          `css` longtext,
          `less` longtext,
          `js` longtext,
          PRIMARY KEY (`id`),
          UNIQUE INDEX `UNIQUE` (`code`)
        ) ENGINE=InnoDB');

        $DB->Query('CREATE TABLE IF NOT EXISTS `constructor_builds_properties` (
          `buildId` int(11) NOT NULL,
          `code` varchar(255) NOT NULL,
          `name` varchar(255) NOT NULL,
          `sort` int(11) NOT NULL DEFAULT 500,
          `type` enum(\'boolean\',\'string\',\'integer\',\'float\',\'enum\',\'color\') NOT NULL,
          `default` longtext,
          PRIMARY KEY (`code`,`buildId`)
        ) ENGINE=InnoDB');

        $DB->Query('CREATE TABLE IF NOT EXISTS `constructor_builds_properties_enums` (
          `buildId` int(11) NOT NULL,
          `propertyCode` varchar(255) NOT NULL,
          `code` varchar(255) NOT NULL,
          `name` varchar(255) NOT NULL,
          `sort` int(11) NOT NULL DEFAULT 500,
          PRIMARY KEY (`buildId`,`propertyCode`, `code`)
        ) ENGINE=InnoDB');

        $DB->Query('CREATE TABLE IF NOT EXISTS `constructor_builds_templates` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `buildId` int(11) NOT NULL,
          `code` varchar(255) NOT NULL,
          `active` tinyint(1) NOT NULL DEFAULT 1,
          `default` tinyint(1) NOT NULL DEFAULT 0,
          `themeCode` varchar(255) DEFAULT NULL,
          `name` varchar(255) NOT NULL,
          `sort` int(11) NOT NULL,
          `condition` longtext,
          `css` longtext,
          `less` longtext,
          `js` longtext,
          `settings` longtext,
          PRIMARY KEY (`id`),
          UNIQUE INDEX `UNIQUE` (`buildId`, `code`)
        ) ENGINE=InnoDB');

        $DB->Query('CREATE TABLE IF NOT EXISTS `constructor_builds_templates_containers` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `templateId` int(11) NOT NULL,
          `parentId` int(11) DEFAULT NULL,
          `type` enum(\'normal\',\'absolute\') NOT NULL DEFAULT \'normal\',
          `display` tinyint(1) NOT NULL DEFAULT 1,
          `order` int(11) NOT NULL DEFAULT 0,
          `condition` longtext,
          `script` longtext,
          `properties` longtext,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB');

        $DB->Query('CREATE TABLE IF NOT EXISTS `constructor_builds_templates_components` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `templateId` int(11) NOT NULL,
          `containerId` int(11) NOT NULL,
          `code` varchar(255) NOT NULL,
          `template` varchar(255) DEFAULT NULL,
          `properties` longtext,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB');

        $DB->Query('CREATE TABLE IF NOT EXISTS `constructor_builds_templates_values` (
          `buildId` int(11) NOT NULL,
          `propertyCode` varchar(255) NOT NULL,
          `templateId` int(11) NOT NULL,
          `value` longtext,
          PRIMARY KEY (`buildId`, `propertyCode`,`templateId`)
        ) ENGINE=InnoDB');

        $DB->Query('CREATE TABLE IF NOT EXISTS `constructor_builds_templates_widgets` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `templateId` int(11) NOT NULL,
          `containerId` int(11) NOT NULL,
          `code` varchar(255) NOT NULL,
          `template` varchar(255) DEFAULT NULL,
          `properties` longtext,
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB');

        $DB->Query('CREATE TABLE IF NOT EXISTS `constructor_builds_themes` (
          `buildId` int(11) NOT NULL,
          `code` varchar(255) NOT NULL,
          `name` varchar(255) NOT NULL,
          `sort` int(11) NOT NULL DEFAULT 500,
          PRIMARY KEY (`code`,`buildId`)
        ) ENGINE=InnoDB');

        $DB->Query('CREATE TABLE IF NOT EXISTS `constructor_builds_themes_values` (
          `buildId` int(11) NOT NULL,
          `propertyCode` varchar(255) NOT NULL,
          `themeCode` varchar(255) NOT NULL,
          `value` longtext,
          PRIMARY KEY (`buildId`, `propertyCode`,`themeCode`)
        ) ENGINE=InnoDB');
    }

    function UnInstallDB()
    {
        global $DB;

        $DB->Query('DROP TABLE IF EXISTS
           `constructor_builds`,
           `constructor_builds_properties`,
           `constructor_builds_properties_enums`,
           `constructor_builds_templates`,
           `constructor_builds_templates_containers`,
           `constructor_builds_templates_components`,
           `constructor_builds_templates_properties`,
           `constructor_builds_templates_widgets`,
           `constructor_builds_themes`,
           `constructor_builds_themes_values`');
    }

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

        global $APPLICATION;
        parent::DoUninstall();

        $continue = $_POST['go'];
        $continue = $continue == 'Y';
        $remove = $_POST['remove'];

        if (!$continue)
            $APPLICATION->IncludeAdminFile(
                Loc::getMessage('intec.constructor.install.uninstall.title'),
                $_SERVER['DOCUMENT_ROOT'].BX_PERSONAL_ROOT.'/modules/'.$this->MODULE_ID.'/install/unstep.php'
            );

        if ($remove['database'] == 'Y')
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