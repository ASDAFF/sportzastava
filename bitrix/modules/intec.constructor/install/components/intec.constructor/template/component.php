<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Type;
use intec\constructor\models\build\template\Containers;
use intec\constructor\models\build\template\Container;
use intec\constructor\models\build\Template;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 */

if (!CModule::IncludeModule('intec.constructor'))
    return null;

$data = ArrayHelper::getValue($arParams, 'DATA');

/**
 * Шаблон с контейнерами компонентами и виджетами.
 * @var Template $template
 */
$template = ArrayHelper::getValue($data, 'template');

if (!$template instanceof Template)
    $template = Template::find()
        ->where(['id' => $arParams['TEMPLATE_ID']])
        ->with([
            'build',
            'containers',
            'containers.component',
            'containers.widget'
        ])
        ->one();

if (empty($template))
    return null;

$build = $template->getBuild(true);

if (empty($build))
    return null;

/**
 * Коллекция всех контейнеров шаблона.
 * @var Containers $containers
 */
$containers = ArrayHelper::getValue($data, 'containers');

if (!$containers instanceof Containers)
    $containers = $template->getContainers(true);

/**
 * Корневой контейнер.
 * @var Container $container
 */
$container = ArrayHelper::getValue($data, 'container');

if (!$container instanceof Container)
    $container = $containers->getTree($build, $template);

if (empty($container))
    return null;

$arResult['TEMPLATE'] = $template;
$arResult['CONTAINER'] = $container;
$arParams['DISPLAY'] = $arParams['DISPLAY'] == 'HEADER' ? 'HEADER' : 'FOOTER';

if ($arParams['DISPLAY'] == 'HEADER')
    $container->execute(true);

$this->IncludeComponentTemplate();

return [
    'containers' => $containers,
    'container' => $container,
    'template' => $template
];