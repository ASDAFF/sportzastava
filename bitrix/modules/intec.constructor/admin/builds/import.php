<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php') ?>
<?php
IncludeModuleLangFile(__FILE__);

global $APPLICATION;

use intec\Core;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\FileHelper;
use intec\core\helpers\Html;
use intec\core\helpers\JavaScript;
use intec\core\helpers\StringHelper;
use intec\core\web\UploadedFile;
use intec\constructor\models\Build;

/**
 * @var array $arUrlTemplates
 * @var CMain $APPLICATION
 */

if (!CModule::IncludeModule('intec.constructor'))
    return;

Core::$app->web->js->loadExtensions(['intec']);
include(Core::getAlias('@intec/constructor/module/admin/url.php'));

$request = Core::$app->request;
$error = null;
$build = new Build();

$APPLICATION->SetTitle(GetMessage('title'));

if ($request->getIsPost()) {
    $post = $request->post();
    $file = UploadedFile::getInstanceByName('file');
    $build->load($post);

    if (!empty($file) && $build->validate(['code'])) {
        $directory = FileHelper::normalizePath(Core::getAlias('@root/upload/intec/constructor'));
        $directoryData = $directory.DIRECTORY_SEPARATOR.'import';
        $path = $directory.DIRECTORY_SEPARATOR.'import.zip';

        if (FileHelper::isFile($path))
            unlink($file);

        if (!FileHelper::isDirectory($directory))
            FileHelper::createDirectory($directory);

        if (FileHelper::isDirectory($directoryData))
            FileHelper::removeDirectory($directoryData);

        if (rename($file->tempName, $path)) {
            $result = $build->importFromFile($path, $directoryData);

            if (!$result) {
                $build->remove();
                $build->delete();
            } else {
                LocalRedirect(
                    StringHelper::replaceMacros(
                        $arUrlTemplates['builds.edit'],
                        array(
                            'build' => $build->id
                        )
                    )
                );
            }
        }
    } else {
        if ($build->hasErrors()) {
            $error = ArrayHelper::getFirstValue($build->getFirstErrors());
        } else {
            $error = GetMessage('errors.file');
        }
    }
}

$menuNavigation = new CAdminContextMenu(array(
    array(
        'TEXT' => GetMessage('menu.back'),
        'ICON' => 'btn_list',
        'LINK' => $arUrlTemplates['builds']
    )
));

$tabs = new CAdminTabControl(
    'tabs',
    array(
        array(
            'DIV' => 'common',
            'TAB' => GetMessage('tabs.common'),
            'TITLE' => GetMessage('tabs.common')
        )
    )
);
?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php') ?>
<?php $menuNavigation->Show(); ?>
<?php if (!empty($error)) { ?>
    <?php CAdminMessage::ShowMessage($error) ?>
<?php } ?>
<?= Html::beginForm('', 'post', array('id' => 'page', 'enctype' => 'multipart/form-data')) ?>
    <?php $tabs->Begin() ?>
    <?php $tabs->BeginNextTab() ?>
        <tr>
            <td width="40%"><b><?= $build->getAttributeLabel('code') ?>:</b></td>
            <td width="60%">
                <?= Html::textInput($build->formName().'[code]', $build->code) ?>
            </td>
        </tr>
        <tr>
            <td width="40%"><b><?= GetMessage('fields.file') ?>:</b></td>
            <td width="60%">
                <?= Html::fileInput('file') ?>
            </td>
        </tr>
    <?php $tabs->Buttons(array('back_url' => $arUrlTemplates['builds'])) ?>
    <?php $tabs->End() ?>
<?= Html::endForm() ?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_admin.php') ?>
