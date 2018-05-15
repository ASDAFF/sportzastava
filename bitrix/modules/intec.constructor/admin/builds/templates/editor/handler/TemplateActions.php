<?php
namespace intec\constructor\handlers;

use intec\Core;
use intec\core\base\InvalidParamException;
use intec\core\db\ActiveRecords;
use intec\core\handling\Actions;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Encoding;
use intec\core\helpers\Json;
use intec\core\helpers\Type;
use intec\constructor\models\Build;
use intec\constructor\models\build\File;
use intec\constructor\models\build\Template;
use intec\constructor\models\build\template\Component;
use intec\constructor\models\build\template\Container;
use intec\constructor\models\build\template\Containers;
use intec\constructor\models\build\template\Value as TemplateValue;
use intec\constructor\models\build\template\Widget;
use intec\constructor\models\build\Theme;
use intec\constructor\models\build\theme\Value as ThemeValue;

class TemplateActions extends Actions
{
    /**
     * @var Build
     */
    public $build;
    /**
     * @var Template
     */
    public $template;

    public function beforeAction($action)
    {
        if (parent::beforeAction($action))
        {
            global $build;
            global $template;

            $this->build = $build;
            $this->template = $template;

            return true;
        }

        return false;
    }

    public function actionSave()
    {
        $request = Core::$app->request;
        $data = $request->post('data');

        try {
            $data = Json::decode($data);
        } catch (InvalidParamException $exception) {
            return false;
        }

        if (!Type::isArray($data))
            return false;

        $data = ArrayHelper::convertEncoding($data, null, Encoding::UTF8);

        $container = ArrayHelper::getValue($data, 'container');
        $scheme = ArrayHelper::getValue($data, 'scheme');
        $settings = ArrayHelper::getValue($data, 'settings');

        /** @var Containers $containers */
        $containers = $this->template->getContainers(true);
        $containers->indexBy('id');
        $containersId = [];

        /** @var ActiveRecords $components */
        $components = $this->template->getComponents(true);
        $components->indexBy('id');

        /** @var ActiveRecords $widgets */
        $widgets = $this->template->getWidgets(true);
        $widgets->indexBy('id');

        /** @var ActiveRecords $themes */
        $themes = $this->build->getThemes(true);
        $themes->indexBy('code');

        /** @var ActiveRecords $themes */
        $properties = $this->build->getProperties(true);
        $properties->indexBy('code');

        /**
         * Сохранение контейнера.
         * @param array $data
         * @param Container|null $parent
         */
        $saveContainer = function ($data, $parent = null) use (
            &$saveContainer,
            &$saveContainerProperty,
            &$saveComponent,
            &$saveWidget,
            &$containers,
            &$containersId
        ) {
            /** @var Container $container */
            $container = null;

            $id = ArrayHelper::getValue($data, 'id');
            $type = ArrayHelper::getValue($data, 'type');
            $display = ArrayHelper::getValue($data, 'display');
            $order = ArrayHelper::getValue($data, 'order');
            $condition = ArrayHelper::getValue($data, 'condition');
            $script = ArrayHelper::getValue($data, 'script');
            $children = ArrayHelper::getValue($data, 'containers');
            $component = ArrayHelper::getValue($data, 'component');
            $widget = ArrayHelper::getValue($data, 'widget');

            if (!empty($id))
                if ($containers->exists($id))
                    $container = $containers->get($id);

            if (empty($container)) {
                $container = new Container();
                $container->templateId = $this->template->id;
            }

            $container->type = $type;
            $container->display = $display;
            $container->order = !empty($parent) ? $order : 0;
            $container->condition = $condition;
            $container->script = $script;
            $container->parentId = !empty($parent) ? $parent->id : null;
            $container->properties = ArrayHelper::getValue($data, 'properties');

            if (!$container->save()) {
                return;
            }

            $containersId[] = $container->id;

            if (!empty($component)) {
                $saveComponent($component, $container);
            } else if (!empty($widget)) {
                $saveWidget($widget, $container);
            } else if (Type::isArrayable($children)) {
                foreach ($children as $child) {
                    $saveContainer($child, $container);
                }
            }
        };

        /**
         * Сохранение компонента контейнера.
         * @param array $data
         * @param Container $parent
         */
        $saveComponent = function ($data, $parent) use (&$components) {
            /** @var Component $component */
            $component = null;

            $id = ArrayHelper::getValue($data, 'id');
            $code = ArrayHelper::getValue($data, 'code');
            $properties = ArrayHelper::getValue($data, 'properties');
            $template = ArrayHelper::getValue($data, 'template');

            if (!empty($id))
                if ($components->exists($id))
                    $component = $components->get($id);

            if (empty($component)) {
                $component = new Component();
                $component->templateId = $this->template->id;
                $component->containerId = $parent->id;
            }

            $component->code = $code;
            $component->template = $template;
            $component->properties = $properties;
            $component->save();
        };

        /**
         * Сохранение виджета контейнера.
         * @param array $data
         * @param Container $parent
         */
        $saveWidget = function ($data, $parent) use (&$widgets) {
            /** @var Component $component */
            $widget = null;

            $id = ArrayHelper::getValue($data, 'id');
            $code = ArrayHelper::getValue($data, 'code');
            $properties = ArrayHelper::getValue($data, 'properties');
            $template = ArrayHelper::getValue($data, 'template');

            if (!empty($id))
                if ($widgets->exists($id))
                    $widget = $widgets->get($id);

            if (empty($widget)) {
                $widget = new Widget();
                $widget->templateId = $this->template->id;
                $widget->containerId = $parent->id;
            }

            $widget->code = $code;
            $widget->template = $template;
            $widget->properties = $properties;
            $widget->save();
        };

        if (Type::isArray($container)) {
            $saveContainer($container);
        }

        $containers = Container::find()
            ->where(['NOT IN', 'id', $containersId])
            ->andWhere(['templateId' => $this->template->id])
            ->all();
        /** @var Containers $containers */

        /**
         * Удаление контейнеров, которых нет в полученных данных.
         * @var Container $container
         */
        foreach ($containers as $container)
            $container->delete();

        /** Сохранение настроек схемы. */
        if (Type::isArray($scheme)) {
            $themesData = ArrayHelper::getValue($scheme, 'themes');

            if (Type::isArray($themesData))
                foreach ($themesData as $themeData) {
                    $code = ArrayHelper::getValue($themeData, 'code');
                    $valuesData = ArrayHelper::getValue($themeData, 'values');

                    if ((!empty($code) && !$themes->exists($code)) || !Type::isArray($valuesData))
                        continue;

                    $theme = null;
                    $values = null;

                    if (!empty($code)) {
                        /** @var Theme $theme */
                        $theme = $themes->get($code);

                        if (!empty($theme)) {
                            $values = $theme->getValues(true);
                        } else {
                            continue;
                        }
                    } else {
                        $values = $this->template->getValues(true);
                    }

                    $values->indexBy('propertyCode');
                    /** @var ActiveRecords $values */

                    foreach ($valuesData as $valueData) {
                        $code = ArrayHelper::getValue($valueData, 'code');
                        $value = null;

                        if (!$values->exists($code)) {
                            if (empty($theme)) {
                                $value = new TemplateValue();
                                $value->templateId = $this->template->id;
                            } else {
                                $value = new ThemeValue();
                                $value->themeCode = $theme->code;
                            }

                            $value->buildId = $this->build->id;
                            $value->propertyCode = $code;
                        } else {
                            $value = $values->get($code);
                        }

                        $value->value = ArrayHelper::getValue($valueData, 'value');
                        $value->save();
                    }
                }

            $this->template->themeCode = null;
            $theme = ArrayHelper::getValue($scheme, 'theme');
            $theme = $themes->get($theme);
            /** @var Theme $theme */

            if ($theme)
                $this->template->themeCode = $theme->code;
        }

        $this->template->settings = $settings;
        $this->template->save();

        return true;
    }

    public function actionStyles()
    {
        global $APPLICATION;

        $APPLICATION->ShowAjaxHead();

        $request = Core::$app->request;
        $template = $this->template;
        $build = $this->build;
        $files = $build->getFiles();
        $themes = $template->getThemes(true);
        $themes->indexBy('code');
        $theme = $request->post('theme');
        $theme = $themes->get($theme);
        $values = $request->post('values');

        if (!Type::isArray($values))
            $values = [];

        $properties = $template->getPropertiesValues($theme);
        $properties = ArrayHelper::merge($properties, $values);

        Core::$app->web->css->addString($template->getCss());
        Core::$app->web->css->addString($template->getLess($properties));

        foreach ($files as $file)
            if ($file->getType() == File::TYPE_SCSS)
                Core::$app->web->css->addString(
                    Core::$app->web->scss->compileFile(
                        $file->getPath(),
                        null,
                        $properties
                    )
                );

        exit();
    }
}