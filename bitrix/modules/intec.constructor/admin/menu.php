<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?php
IncludeModuleLangFile(__FILE__);
global $USER;

use intec\Core;
use intec\core\helpers\StringHelper;
use intec\constructor\models\Build;

/**
 * @var $arUrlTemplates
 */

if (!CModule::IncludeModule('intec.core'))
    return;

if (!CModule::IncludeModule('intec.constructor'))
    return;

Core::$app->web->css->addFile(Core::getAlias('@intec/constructor/theme/css/icons.css'));

$bIsMenu = true;
include('url.php');

$builds = Build::find()->all();
/** @var Build[] $builds */
$arMenuItems = array();

foreach ($builds as $build) {
    $arMenuItems[] = array(
        'text' => $build->name,
        'url' => StringHelper::replaceMacros(
            $arUrlTemplates['builds.edit'],
            array(
                'build' => $build->id
            )
        ),
        'more_url' => array(),
        'items_id' => 'intec_constructor_build_'.$build->id,
        'icon' => 'constructor-menu-icon-build',
        'page_icon' => 'constructor-menu-icon-build',
        'items' => array(
            array(
                'text' => GetMessage('intec.constructor.menu.build.properties'),
                'url' => StringHelper::replaceMacros(
                    $arUrlTemplates['builds.properties'],
                    array(
                        'build' => $build->id
                    )
                ),
                'more_url' => array(
                    'constructor_builds_properties_edit.php?build='.$build->id,
                    'constructor_builds_properties_import.php?build='.$build->id,
                    'constructor_builds_properties_export.php?build='.$build->id
                ),
                'items_id' => 'intec_constructor_build_'.$build->id.'_properties',
                'icon' => 'constructor-menu-icon-build-properties',
                'page_icon' => 'constructor-menu-icon-build-properties',
                'items' => array()
            ),
            array(
                'text' => GetMessage('intec.constructor.menu.build.templates'),
                'url' => StringHelper::replaceMacros(
                    $arUrlTemplates['builds.templates'],
                    array(
                        'build' => $build->id
                    )
                ),
                'more_url' => array(
                    'constructor_builds_templates_edit.php?build='.$build->id,
                    'constructor_builds_templates_editor.php?build='.$build->id,
                    'constructor_builds_templates_copy.php?build='.$build->id
                ),
                'items_id' => 'intec_constructor_build_'.$build->id.'_templates',
                'icon' => 'constructor-menu-icon-build-templates',
                'page_icon' => 'constructor-menu-icon-build-templates',
                'items' => array()
            ),
            array(
                'text' => GetMessage('intec.constructor.menu.build.themes'),
                'url' => StringHelper::replaceMacros(
                    $arUrlTemplates['builds.themes'],
                    array(
                        'build' => $build->id
                    )
                ),
                'more_url' => array(
                    'constructor_builds_themes_edit.php?build='.$build->id
                ),
                'items_id' => 'intec_constructor_build_'.$build->id.'_themes',
                'icon' => 'constructor-menu-icon-build-themes',
                'page_icon' => 'constructor-menu-icon-build-themes',
                'items' => array()
            )
        )
    );
}

$arMenu = array(
    'parent_menu' => 'global_menu_services',
    'text' => GetMessage('intec.constructor.menu'),
    'icon' => "constructor-menu-icon",
    'page_icon' => 'constructor-menu-icon',
    'url' => $arUrlTemplates['builds'],
    'more_url' => array(
        'constructor_builds_import'
    ),
    'items_id' => 'intec_constructor',
    'items' => $arMenuItems
);

return $arMenu;
