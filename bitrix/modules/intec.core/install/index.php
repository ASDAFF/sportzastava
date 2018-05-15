<?php
global $MESS;
require_once(__DIR__.'/../classes/Core.php');

use intec\Core;
use intec\core\helpers\FileHelper;

class intec_core extends CModule
{
    var $MODULE_ID = "intec.core";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $PARTNER_NAME;
    var $PARTNER_URI;

    protected $directories = [
        '@intec/core/module/install/theme' => '@intec/core/theme'
    ];

    function intec_core ()
    {
        $arModuleVersion = array();

        include('version.php');

        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = "Intec core";
        $this->MODULE_DESCRIPTION = 'Description';
        $this->PARTNER_NAME = "Intec";
        $this->PARTNER_URI = "http://intecweb.ru";
    }

    function InstallDB()
    {

    }

    function UnInstallDB()
    {

    }

    function DoInstall()
    {
        parent::DoInstall();
        $this->InstallDB();

        foreach ($this->directories as $directoryFrom => $directoryTo) {
            FileHelper::copyDirectory(
                Core::getAlias($directoryFrom),
                Core::getAlias($directoryTo)
            );
        }

        RegisterModule($this->MODULE_ID);
    }

    function DoUninstall()
    {
        parent::DoUninstall();
        $this->UnInstallDB();

        foreach ($this->directories as $directory) {
            $directory = Core::getAlias($directory);
            FileHelper::removeDirectory($directory);
        }

        UnRegisterModule($this->MODULE_ID);
    }
}