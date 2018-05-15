<?
namespace intec\core\bitrix;

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Type;

class Component
{
    /**
     * @param array $element Элемент, системные свойства которых необходимо установить.
     * @param array $comparison Какие свойства будут системными.
     * Вид: array(Ключ свойства => Ключ системного свойства)
     * @param \Closure|null $handler Обработчик для свойств.
     * @param string $field Поле, в котором будут храниться системные свойства.
     * @return array
     */
    public static function SetElementProperties($element, $comparison, $handler = null, $field = 'SYSTEM_PROPERTIES')
    {
        $element[$field] = [];

        foreach ($comparison as $key => $value) {
            $property = ArrayHelper::getValue($element, ['PROPERTIES', $key]);

            if (!empty($property)) {
                if (Type::isFunction($handler))
                    $property = $handler($element, $value, $property);

                $element[$field][$value] = $property;
            } else {
                $element[$field][$value] = null;
            }
        }

        return $element;
    }

    /**
     * @param array $elements Список элементов, системные свойства которых необходимо установить.
     * @param array $comparison Какие свойства будут системными.
     * Вид: array(Ключ свойства => Ключ системного свойства)
     * @param \Closure|null $handler Обработчик для свойств.
     * @param string $field Поле, в котором будут храниться системные свойства.
     * @return array
     */
    public static function SetElementsProperties($elements, $comparison, $handler = null, $field = 'SYSTEM_PROPERTIES')
    {
        $result = [];

        foreach ($elements as $elementKey => $element) {
            $result[$elementKey] = static::SetElementProperties(
                $element,
                $comparison,
                $handler,
                $field
            );
        }

        return $result;
    }
}