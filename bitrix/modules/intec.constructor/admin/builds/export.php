<? require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php'); ?>
<?php
if (!CModule::IncludeModule('intec.constructor'))
    return;

use intec\Core;
use intec\core\helpers\FileHelper;
use intec\constructor\models\Build;

$request = Core::$app->request;
$build = $request->get('build');

/** @var Build $build */
$build = Build::findOne($build);

if (!$build)
    return;

if (!extension_loaded('zip'))
    return;

if (ini_get('zlib.output_compression'))
    ini_set('zlib.output_compression', 'Off');

$directory = Core::getAlias('@root/upload/intec/constructor');

if (!FileHelper::isDirectory($directory))
    FileHelper::createDirectory($directory);

if (FileHelper::isDirectory($directory)) {
    $path = $directory.DIRECTORY_SEPARATOR.'export.zip';

    if (FileHelper::isFile($path))
        unlink($path);

    if ($build->exportToFile($path)) {
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header('Content-Disposition: attachment; filename=Template.zip');
        header('Content-Transfer-Encoding: binary');
        header("Content-Length: ".filesize($path));
        readfile($path);
    }
}

exit();