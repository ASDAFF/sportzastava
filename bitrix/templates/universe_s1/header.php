<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use Bitrix\Main\Loader;

use intec\Core;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\FileHelper;
use intec\core\helpers\Json;
use intec\core\helpers\StringHelper;
use intec\constructor\Module as Constructor;
use intec\constructor\models\Build;
use intec\constructor\models\build\File;
use intec\constructor\models\build\Template;

$loaded = Loader::includeModule('intec.core');
$loaded = Loader::includeModule('intec.universe') && $loaded;
$loaded = (
    Loader::includeModule('intec.constructor') ||
    Loader::includeModule('intec.constructorlite')
) && $loaded;

if (!$loaded)
    return;

global $APPLICATION;
global $USER;
global $settings;
global $template;
global $part;

IntecUniverse::Initialize();

$request = Core::$app->request;
$build = Build::getCurrent();

if (empty($build))
    return;

require('helper/functions.php');

$displaySettings = IntecUniverse::SettingsDisplay(null, SITE_ID);
$settings = $APPLICATION->IncludeComponent(
    'intec.universe:settings',
    '.default',
    array(
        'SESSION_PROPERTY' => 'settings',
        'HANDLE' => 'Y'
    ),
    false,
    array('HIDE_ICONS' => 'Y')
);

$page = $build->getPage();
$page->getProperties()->setRange($settings);
$settings = $page->getProperties();
$page->execute(['state' => 'loading']);

/** @var Template $template */
$template = $build->getTemplate();

if (empty($template))
    return;

if (!Constructor::isLite())
    $template->populateRelation('build', $build);

$files = $build->getFiles();
$directory = $build->getDirectory();
$part = Constructor::isLite() ? 'lite' : 'base';

Core::$app->web->js->loadExtensions(['jquery', 'intec_core', 'intec_core_controls', 'ajax', 'popup']);
Core::$app->web->css->addFile($directory.'/js/plugins/bootstrap/css/style.css');
Core::$app->web->css->addFile($directory.'/js/plugins/bootstrap/css/theme.css');
Core::$app->web->css->addFile($directory.'/js/plugins/jquery.ui/style.css');
Core::$app->web->css->addFile($directory.'/js/plugins/jquery.colorpicker/style.css');
Core::$app->web->css->addFile($directory.'/js/plugins/jquery.nanoscroller/style.css');
Core::$app->web->css->addFile($directory.'/fonts/font-awesome/css/font-awesome.css');
Core::$app->web->css->addFile($directory.'/fonts/p22underground/style.css');
Core::$app->web->css->addFile($directory.'/fonts/glyphter/style.css');
Core::$app->web->css->addFile($directory.'/fonts/typicons/style.css');
Core::$app->web->css->addFile($directory.'/css/public.css');
Core::$app->web->js->addFile($directory.'/js/plugins/jquery.2.2.4.min.js');
Core::$app->web->js->addFile($directory.'/js/plugins/bootstrap/js/script.js');
Core::$app->web->js->addFile($directory.'/js/plugins/jquery.ui/script.js');
Core::$app->web->js->addFile($directory.'/js/plugins/jquery.colorpicker/script.js');
Core::$app->web->js->addFile($directory.'/js/plugins/jquery.nanoscroller/script.min.js');
Core::$app->web->js->addFile($directory.'/js/plugins/jquery.mousewheel.min.js');
Core::$app->web->js->addFile($directory.'/js/plugins/picturefill.min.js');
Core::$app->web->js->addFile($directory.'/js/plugins/jquery.zoom.min.js');
Core::$app->web->js->addFile($directory.'/js/plugins/jquery.scrollTo.min.js');
Core::$app->web->js->addFile($directory.'/js/plugins/sly.min.js');
Core::$app->web->js->addFile($directory.'/js/plugins/readmore.js');
Core::$app->web->js->addFile($directory.'/js/plugins/jquery.maskinput.js');

$page->execute(['state' => 'loaded']);
$files = ArrayHelper::merge($files, [
    new File($build, File::TYPE_JAVASCRIPT, 'js/basket.js'),
    new File($build, File::TYPE_JAVASCRIPT, 'js/compare.js'),
    new File($build, File::TYPE_JAVASCRIPT, 'js/catalog.js'),
    new File($build, File::TYPE_JAVASCRIPT, 'js/common.js'),
    new File($build, File::TYPE_JAVASCRIPT, 'js/forms.js'),
    new File($build, File::TYPE_JAVASCRIPT, 'js/components.js')
]);

if (FileHelper::isFile($directory.'/css/custom.css'))
    $files[] = new File($build, File::TYPE_CSS, 'css/custom.css');

if (FileHelper::isFile($directory.'/css/custom.scss'))
    $files[] = new File($build, File::TYPE_SCSS, 'css/custom.scss');

if (FileHelper::isFile($directory.'/js/custom.js'))
    $files[] = new File($build, File::TYPE_JAVASCRIPT, 'js/custom.js');

if ($request->getIsAjax() && $request->getIsPost() && $request->post('ajax-mode') == 'Y') {
    $response = null;
    include('ajax.php');
    echo StringHelper::convert(Json::encode($response));
    exit();
}

if ($request->get('page-mode') == 'Y') {
    $response = null;
    include('pages.php');

    if ($response !== null)
        echo StringHelper::convert($response);

    exit();
}

$properties = $template->getPropertiesValues();

foreach ($settings as $key => $value)
    if (!$properties->exists($key))
        $properties->set($key, $value);

if (FileHelper::isFile($directory.'/parts/custom/start.php'))
    include($directory.'/parts/custom/start.php')

?><!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
    <head>
        <?php if (FileHelper::isFile($directory.'/parts/custom/header.start.php')) include($directory.'/parts/custom/header.start.php') ?>
        <title><?php $APPLICATION->ShowTitle() ?></title>
        <?php $APPLICATION->ShowHead() ?>
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="/favicon.png">
        <?php include($directory.'/js/universe.php') ?>
        <?php /** @var File $file */ ?>
        <?php foreach ($files as $file) { ?>
            <?php if ($file->getType() == File::TYPE_JAVASCRIPT) { ?>
                <script type="text/javascript" src="<?= $file->getPath(true, '/', true) ?>"></script>
            <?php } else if ($file->getType() == File::TYPE_CSS) { ?>
                <link rel="stylesheet" href="<?= $file->getPath(true, '/', true) ?>" />
            <?php } else if ($file->getType() == File::TYPE_SCSS) { ?>
                <style type="text/css"><?= Core::$app->web->scss->compileFile($file->getPath(), null, $properties->asArray(), true) ?></style>
            <?php } ?>
        <?php } ?>
        <?php if (!Constructor::isLite()) { ?>
            <style type="text/css"><?= $template->getCss() ?></style>
            <style type="text/css"><?= $template->getLess() ?></style>
            <script type="text/javascript"><?= $template->getJs() ?></script>
        <?php } ?>
        <?php if (FileHelper::isFile($directory.'/parts/custom/header.end.php')) include($directory.'/parts/custom/header.end.php') ?>
    </head>
    <body class="public intec-adaptive">
        <?php if (FileHelper::isFile($directory.'/parts/custom/body.start.php')) include($directory.'/parts/custom/body.start.php') ?>
        <?php $APPLICATION->IncludeComponent(
            'intec.universe:widget',
            'basket.updater',
            array(
                'BASKET_UPDATE' => 'Y',
                'COMPARE_UPDATE' => 'Y',
                'COMPARE_NAME' => 'compare',
                'CACHE_TYPE' => 'N'
            ),
            false,
            array('HIDE_ICONS' => 'Y')
        ); ?>
        <?php if ($displaySettings == 'all' || $displaySettings == 'admin' && $USER->IsAdmin()) { ?>
            <?php $APPLICATION->IncludeComponent(
                'intec.universe:settings',
                '.default',
                array(
                    'SESSION_PROPERTY' => 'settings',
                    'SIDE_MENU_ROOT_TYPE' => 'top',
                    'SIDE_MENU_CHILD_TYPE' => 'left'
                ),
                false,
                array(
                    'HIDE_ICONS' => 'N'
                )
            ); ?>
        <? } ?>
        <?php include($directory.'/parts/'.$part.'/header.php'); ?>