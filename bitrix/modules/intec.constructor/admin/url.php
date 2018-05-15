<?php

if (!isset($bIsMenu))
        IntecConstructor::Initialize();

$sUrlRoot = '/bitrix/admin';
$arUrlTemplates = array(
    'builds' => $sUrlRoot.'/constructor_builds.php?lang='.LANGUAGE_ID,
    'builds.add' => $sUrlRoot.'/constructor_builds_edit.php?lang='.LANGUAGE_ID,
    'builds.edit' => $sUrlRoot.'/constructor_builds_edit.php?build=#build#&lang='.LANGUAGE_ID,
    'builds.properties' => $sUrlRoot.'/constructor_builds_properties.php?build=#build#&lang='.LANGUAGE_ID,
    'builds.properties.add' => $sUrlRoot.'/constructor_builds_properties_edit.php?build=#build#&lang='.LANGUAGE_ID,
    'builds.properties.edit' => $sUrlRoot.'/constructor_builds_properties_edit.php?build=#build#&property=#property#&lang='.LANGUAGE_ID,
    'builds.properties.export' => $sUrlRoot.'/constructor_builds_properties_export.php?build=#build#&lang='.LANGUAGE_ID,
    'builds.properties.import' => $sUrlRoot.'/constructor_builds_properties_import.php?build=#build#&lang='.LANGUAGE_ID,
    'builds.themes' => $sUrlRoot.'/constructor_builds_themes.php?build=#build#&lang='.LANGUAGE_ID,
    'builds.themes.add' => $sUrlRoot.'/constructor_builds_themes_edit.php?build=#build#&lang='.LANGUAGE_ID,
    'builds.themes.edit' => $sUrlRoot.'/constructor_builds_themes_edit.php?build=#build#&theme=#theme#&lang='.LANGUAGE_ID,
    'builds.export' => $sUrlRoot.'/constructor_builds_export.php?build=#build#&lang='.LANGUAGE_ID,
    'builds.import' => $sUrlRoot.'/constructor_builds_import.php?lang='.LANGUAGE_ID,
    'builds.templates' => $sUrlRoot.'/constructor_builds_templates.php?build=#build#&lang='.LANGUAGE_ID,
    'builds.templates.add' => $sUrlRoot.'/constructor_builds_templates_edit.php?build=#build#&lang='.LANGUAGE_ID,
    'builds.templates.edit' => $sUrlRoot.'/constructor_builds_templates_edit.php?build=#build#&template=#template#&lang='.LANGUAGE_ID,
    'builds.templates.editor' => $sUrlRoot.'/constructor_builds_templates_editor.php?build=#build#&template=#template#&lang='.LANGUAGE_ID,
    'builds.templates.copy' => $sUrlRoot.'/constructor_builds_templates_copy.php?build=#build#&template=#template#&lang='.LANGUAGE_ID,
);

unset($sUrlRoot);