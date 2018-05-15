<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\Type;
use intec\constructor\models\build\Template;
use intec\constructor\models\build\template\Container;
use intec\constructor\models\build\template\Component;
use intec\constructor\models\build\template\Widget as TemplateWidget;
use intec\constructor\structure\Widget as WidgetModel;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);

/** @var Template $template */
$template = $arResult['TEMPLATE'];
/** @var Container $container */
$container = $arResult['CONTAINER'];

$isHeader = $arParams['DISPLAY'] == 'HEADER';
$isFooter = $arParams['DISPLAY'] == 'FOOTER';
$flag = false;

/**
 * @param Container $container
 * @return bool
 */
$draw = function ($container) use (&$draw, &$flag, &$isHeader, &$isFooter) {
    if (!$container->isDisplayed())
        return true;

    $id = $container->getIdAttribute();
    $class = $container->getClassAttribute();
    $style = $container->getStyleAttribute();

    if ($isHeader || ($isFooter && $flag)) {
        echo Html::beginTag('div', array(
            'id' => $id,
            'class' => 'container-'.$container->id.($class ? ' ' . $class : null),
            'style' => $style
        ));
    }

    if ($container->hasComponent()) {
        /** @var Component $component */
        $component = $container->getComponent(true);

        if ($isHeader || $isFooter && $flag) {
            $component->render(true);
        }
    } else if ($container->hasWidget()) {
        /** @var TemplateWidget $widget */
        $widget = $container->getWidget(true);

        if ($widget->code == 'intec.constructor:content') {
            if ($isHeader)
                return false;

            if (!$flag)
                $flag = true;
        } else if ($isHeader || $isFooter && $flag) {
            $model = $widget->getModel();
            $template = $widget->getModelTemplate();

            if (!empty($model) && !empty($template)) {
                $model->includeHeaders();
                $template->includeHeaders();
                $widget->render(true);
            }
        }
    } else {
        $children = $container->getContainers(true, false);
        ArrayHelper::multisort($children, 'order');

        foreach ($children as $child)
            if (!$draw($child, $container))
                return false;
    }

    if ($isHeader || ($isFooter && $flag)) {
        echo Html::endTag('div');
    }

    return true;
};

$draw($container);