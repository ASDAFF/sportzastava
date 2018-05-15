<?php
use intec\Core;
use intec\core\helpers\FileHelper;
use intec\core\bitrix\web\JavaScriptExtension as Extension;

$js = Core::$app->web->js;
$directory = Core::getAlias('@intec/constructor/theme');

if (FileHelper::isDirectory($directory)) {
    $js->addExtensions([
        new Extension([
            'id' => 'intec_constructor',
            'script' => $directory.'/js/constructor.js',
            'dependencies' => ['intec']
        ])
    ]);
}

CUtil::InitJSCore( array('ajax' , 'popup' ));