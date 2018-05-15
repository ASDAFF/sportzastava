<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\Core;
use intec\core\base\InvalidParamException;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\FileHelper;
use intec\core\helpers\Json;
use intec\core\helpers\Type;
use intec\constructor\Module as Constructor;
use intec\constructor\models\Build;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CUser $USER
 */

if (defined('EDITOR'))
    return;

$request = Core::$app->request;
$session = Core::$app->session;
$build = Build::getCurrent();
$template = null;
$templates = [];

$bSaved = false;
$bHandle = $arParams['HANDLE'] == 'Y';
$bIsAdmin = $USER->IsAdmin();
$sSessionKey = ArrayHelper::getValue($arParams, 'SESSION_PROPERTY', 'settings');

if (empty($build))
    return;

if (!Constructor::isLite()) {
    $template = $build->getTemplate();
    $templates = $build->getTemplates(true);
}

$properties = $build->getMetaValue('settings');

/**
 * @param array $property
 * @param mixed $value
 * @return mixed
 */
$bring = function ($property, $value) {
    if ($property['type'] === 'list') {
        if (!ArrayHelper::keyExists($value, $property['values']))
            return $property['default'];
    } else if ($property['type'] == 'boolean') {
        if ($value === null)
            return $property['default'];

        return Type::toBoolean($value);
    }

    return $value;
};

$file = Core::getAlias('@root').SITE_DIR.'.settings.json';
$values = $session->get($sSessionKey);

if ($bIsAdmin || empty($values)) {
    $values = FileHelper::getFileData($file);

    try {
        $values = Json::decode($values);
    } catch (InvalidParamException $exception) {}
}

if (!Type::isArray($values))
    $values = [];

foreach ($properties as $code => $property) {
    $properties[$code]['value'] = $bring(
        $property,
        ArrayHelper::getValue($values, $code)
    );
}

if ($request->post('universeSettingsAjax') == 'Y')
    $bSaved = true;

if ($bHandle)
    if ($bSaved) {
        $post = $request->post();

        foreach ($properties as $code => $property) {
            $value = ArrayHelper::getValue($post, $code);
            $value = $bring($property, $value);
            $properties[$code]['value'] = $value;
        }
    }

$values = [];

foreach ($properties as $code => $property) {
    if ($request->post('default_settings') == 'Y' && $code != 'use_global_settings' && ArrayHelper::keyExists($code, $defaultSettings)) {
        $values[$code] = ArrayHelper::getValue($defaultSettings, $code);
    } else {
        $values[$code] = $property['value'];
    }
}

if ($bHandle)
    if ($bSaved)
        if ($bIsAdmin) {
            FileHelper::setFileData($file, Json::encode($values));
        } else {
            $session->set($sSessionKey, $values);
        }

$arResult['BUILD'] = $build;
$arResult['TEMPLATE'] = $template;
$arResult['TEMPLATES'] = $templates;
$arResult['PROPERTIES'] = $properties;
$arResult['VALUES'] = [];
$arResult['SAVED'] = $bSaved;
$arResult['HANDLE'] = $bHandle;

$this->IncludeComponentTemplate();
$templateValues = ArrayHelper::getValue($arResult, 'VALUES');

if (Type::isArray($templateValues))
    $values = ArrayHelper::merge($values, $templateValues);

return $values;