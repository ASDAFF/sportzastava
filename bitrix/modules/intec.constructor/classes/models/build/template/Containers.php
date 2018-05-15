<?php
namespace intec\constructor\models\build\template;

use intec\core\helpers\Type;
use intec\core\db\ActiveRecords;
use intec\core\helpers\ArrayHelper;
use intec\constructor\models\Build;
use intec\constructor\models\build\Template;

/**
 * Class Containers
 * @package intec\constructor\models\build\template
 */
class Containers extends ActiveRecords
{
    /**
     * @inheritdoc
     */
    protected function verify($item)
    {
        return $item instanceof Container;
    }

    /**
     * Возвращает корневой контейнер.
     * @return Container|null
     */
    public function getRootContainer() {
        /** @var Container[] $containers */
        $containers = $this->asArray();
        /** @var Container $container */
        $container = null;

        foreach ($containers as $container) {
            if ($container->parentId == null)
                break;

            $container = null;
        }

        return $container;
    }

    /**
     * Заполняет все зависимости и формирует дерево.
     * Началом дерева является корневой контейнер.
     * Все объекты клонированы. Могут использоваться отдельно.
     * @param Build|null $build
     * @param Template|null $template
     * @return Container|null
     */
    public function getTree($build = null, $template = null)
    {
        $containers = clone $this;
        $containers->indexBy('id');
        $container = $this->getRootContainer();

        if (empty($container))
            return null;

        if (!$template instanceof Template)
            $template = $container->getTemplate(true);

        if (empty($template))
            return null;

        if (!$build instanceof Build)
            $build = $template->getBuild(true);

        if (empty($build))
            return null;

        $template->populateRelation('build', $build);

        /** Клонируем корневой контейнер */
        $container = clone $container;

        /**
         * Функция для построения дерева контейнеров.
         * Также привязывает все зависимые элементы.
         * @param Container $container
         * @param Container|null $parent
         */
        $function = function ($container, $parent = null) use (&$function, &$template, &$containers) {
            /** Привязываем шаблон к контейнеру */
            $container->populateRelation('template', $template);
            /** Привязываем родителя к контейнеру */
            $container->populateRelation('parent', $parent);
            /** Указываем, что дочерних контейнеров пока нет */
            $container->populateRelation('containers', []);

            $component = $container->getComponent(true);
            $widget = $container->getWidget(true);

            if (!empty($component)) {
                /** Клонируем компонент */
                $component = clone $component;
                /** Привязываем шаблон к компоненту */
                $component->populateRelation('template', $template);
                /** Привязываем контейнер к компоненту */
                $component->populateRelation('container', $container);
            }

            $container->populateRelation('component', $component);

            if (!empty($widget)) {
                /** Клонируем виджет */
                $widget = clone $widget;
                /** Привязываем шаблон к виджету */
                $widget->populateRelation('template', $template);
                /** Привязываем контейнер к виджету */
                $widget->populateRelation('container', $container);
            }

            $container->populateRelation('widget', $widget);

            /** Если нет компонента и виджета, можно искать дочерние контейнеры */
            if (empty($component) && empty($widget)) {
                $children = [];

                /**
                 * Идем по всем контейнерам шаблона и ищем дочерние элементы.
                 * @var int $key
                 * @var Container $child
                 */
                foreach ($containers as $key => $child)
                    /** Если $child является потомком $container */
                    if ($child->parentId == $container->id) {
                        /** Удаляем $child из общего списка контейнеров */
                        unset($containers[$key]);

                        /** Клонируем дочерний контейнер */
                        $child = clone $child;

                        /** Проделываем те-же операции для дочернего контейнера */
                        $function($child, $container);
                        $children[$child->id] = $child;
                    }

                /** Указываем найденные дочерние контейнеры */
                $container->populateRelation('containers', $children);
            }
        };

        $function($container);
        return $container;
    }
}