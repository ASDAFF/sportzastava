<?php
namespace intec\constructor\models\build\template;
IncludeModuleLangFile(__FILE__);

use intec\Core;
use intec\core\db\ActiveRecord;
use intec\core\db\ActiveQuery;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\Inflector;
use intec\core\helpers\Type;
use intec\constructor\base\Exchangeable;
use intec\constructor\models\build\ConditionsTrait;
use intec\constructor\models\build\ConditionsInterface;
use intec\constructor\models\build\Template;
use intec\constructor\models\build\template\container\StyleBackgroundTrait;
use intec\constructor\models\build\template\container\StyleBorderColorTrait;
use intec\constructor\models\build\template\container\StyleBorderRadiusTrait;
use intec\constructor\models\build\template\container\StyleBorderStyleTrait;
use intec\constructor\models\build\template\container\StyleBorderTrait;
use intec\constructor\models\build\template\container\StyleBorderWidthTrait;
use intec\constructor\models\build\template\container\StyleFloatTrait;
use intec\constructor\models\build\template\container\StyleMarginTrait;
use intec\constructor\models\build\template\container\StyleOpacityTrait;
use intec\constructor\models\build\template\container\StyleOverflowTrait;
use intec\constructor\models\build\template\container\StylePaddingTrait;
use intec\constructor\models\build\template\container\StylePositionTrait;
use intec\constructor\models\build\template\container\StyleSideTrait;
use intec\constructor\models\build\template\container\StyleSizeTrait;
use intec\constructor\models\build\template\container\StyleTextTrait;

/**
 * Class Container
 * @property int $id
 * @property int $templateId
 * @property int $parentId
 * @property string $type
 * @property int $display
 * @property int $order
 * @property array $properties
 * @property array $condition
 * @property string $script
 * @property string $idAttribute
 * @property string $classAttribute
 * @property array $style
 * @property int|float|string|null $styleTop
 * @property int|float|string|null $styleRight
 * @property int|float|string|null $styleBottom
 * @property int|float|string|null $styleLeft
 * @property int|float|string|null $styleMargin
 * @property int|float|string|null $styleMarginTop
 * @property int|float|string|null $styleMarginRight
 * @property int|float|string|null $styleMarginBottom
 * @property int|float|string|null $styleMarginLeft
 * @property string $styleMarginSummary
 * @property int|float|string|null $stylePadding
 * @property int|float|string|null $stylePaddingTop
 * @property int|float|string|null $stylePaddingRight
 * @property int|float|string|null $stylePaddingBottom
 * @property int|float|string|null $stylePaddingLeft
 * @property string $stylePaddingSummary
 * @property int|float|string|null $styleWidth
 * @property int|float|string|null $styleHeight
 * @property string|null $styleBackgroundColor
 * @property array $styleAttribute
 * @package intec\constructor\models\build\template
 */
class Container extends ActiveRecord implements Exchangeable, ConditionsInterface
{
    use ConditionsTrait;
    use StyleBackgroundTrait;
    use StyleBorderColorTrait;
    use StyleBorderRadiusTrait;
    use StyleBorderStyleTrait;
    use StyleBorderTrait;
    use StyleBorderWidthTrait;
    use StyleFloatTrait;
    use StyleMarginTrait;
    use StyleOpacityTrait;
    use StyleOverflowTrait;
    use StylePaddingTrait;
    use StylePositionTrait;
    use StyleSideTrait;
    use StyleSizeTrait;
    use StyleTextTrait;

    /**
     * @var array
     */
    protected static $cache = [];

    /**
     * Тип контейнера
     */
    const TYPE_NORMAL = 'normal';       // обычный
    const TYPE_ABSOLUTE = 'absolute';   // абсолютный

    /**
     * Возвращает список доступных типов.
     * @return array
     */
    public static function getTypes()
    {
        return [
            static::TYPE_NORMAL => GetMessage('intec.constructor.models.template.container.type.normal'),
            static::TYPE_ABSOLUTE => GetMessage('intec.constructor.models.template.container.type.absolute')
        ];
    }

    /**
     * Возвращает список доступных значений типов.
     * @return array
     */
    public static function getTypesValues()
    {
        $values = static::getTypes();
        $values = ArrayHelper::getKeys($values);
        return $values;
    }

    /**
     * Сторона
     */
    const STYLE_SIDE_TOP = 'top';           // верхняя
    const STYLE_SIDE_RIGHT = 'right';       // правая
    const STYLE_SIDE_BOTTOM = 'bottom';     // нижняя
    const STYLE_SIDE_LEFT = 'left';         // левая

    /**
     * Возвращает список сторон стилей.
     * @return array
     */
    public static function getStyleSides()
    {
        return [
            static::STYLE_SIDE_TOP => GetMessage('intec.constructor.models.template.container.style.side.top'),
            static::STYLE_SIDE_RIGHT => GetMessage('intec.constructor.models.template.container.style.side.right'),
            static::STYLE_SIDE_BOTTOM => GetMessage('intec.constructor.models.template.container.style.side.bottom'),
            static::STYLE_SIDE_LEFT => GetMessage('intec.constructor.models.template.container.style.side.left')
        ];
    }

    /**
     * Возвращает список значений сторон стилей.
     * @return array
     */
    public static function getStyleSidesValues()
    {
        $values = static::getStyleSides();
        return ArrayHelper::getKeys($values);
    }

    /**
     * Размещение
     */
    const STYLE_FLOAT_NONE = 'none';    // нет
    const STYLE_FLOAT_RIGHT = 'right';  // справа
    const STYLE_FLOAT_LEFT = 'left';    // слева

    /**
     * Возвращает список параметра стилей float.
     * @return array
     */
    public static function getStyleFloats()
    {
        return [
            static::STYLE_FLOAT_NONE => GetMessage('intec.constructor.models.template.container.style.float.none'),
            static::STYLE_FLOAT_RIGHT => GetMessage('intec.constructor.models.template.container.style.float.right'),
            static::STYLE_FLOAT_LEFT => GetMessage('intec.constructor.models.template.container.style.float.left')
        ];
    }

    /**
     * Возвращает список значений параметра стилей float.
     * @return array
     */
    public static function getStyleFloatsValues()
    {
        $values = static::getStyleFloats();
        $values = ArrayHelper::getKeys($values);
        return $values;
    }

    /**
     * Стиль рамки
     */
    const STYLE_BORDER_STYLE_NONE = 'none';         // нет
    const STYLE_BORDER_STYLE_DOTTED = 'dotted';     // точечный
    const STYLE_BORDER_STYLE_DASHED = 'dashed';     // пунктирный
    const STYLE_BORDER_STYLE_SOLID = 'solid';       // сплошной
    const STYLE_BORDER_STYLE_DOUBLE = 'double';     // двойной сплошной
    const STYLE_BORDER_STYLE_GROOVE = 'groove';     // с границей
    const STYLE_BORDER_STYLE_RIDGE = 'ridge';       // с ребром
    const STYLE_BORDER_STYLE_INSET = 'inset';       // с верхним ребром
    const STYLE_BORDER_STYLE_OUTSET = 'outset';     // с нижним ребром

    /**
     * Возвращает список параметра стилей border-style.
     * @return array
     */
    public static function getStyleBorderStyles()
    {
        return [
            static::STYLE_BORDER_STYLE_NONE => GetMessage('intec.constructor.models.template.container.style.border.style.none'),
            static::STYLE_BORDER_STYLE_DOTTED => GetMessage('intec.constructor.models.template.container.style.border.style.dotted'),
            static::STYLE_BORDER_STYLE_DASHED => GetMessage('intec.constructor.models.template.container.style.border.style.dashed'),
            static::STYLE_BORDER_STYLE_SOLID => GetMessage('intec.constructor.models.template.container.style.border.style.solid'),
            static::STYLE_BORDER_STYLE_DOUBLE => GetMessage('intec.constructor.models.template.container.style.border.style.double'),
            static::STYLE_BORDER_STYLE_GROOVE => GetMessage('intec.constructor.models.template.container.style.border.style.groove'),
            static::STYLE_BORDER_STYLE_RIDGE => GetMessage('intec.constructor.models.template.container.style.border.style.ridge'),
            static::STYLE_BORDER_STYLE_INSET => GetMessage('intec.constructor.models.template.container.style.border.style.inset'),
            static::STYLE_BORDER_STYLE_OUTSET => GetMessage('intec.constructor.models.template.container.style.border.style.outset')
        ];
    }

    /**
     * Возвращает список значений параметра стилей border-style.
     * @return array
     */
    public static function getStyleBorderStylesValues()
    {
        $values = static::getStyleBorderStyles();
        $values = ArrayHelper::getKeys($values);
        return $values;
    }

    /**
     * Границы
     */
    const STYLE_OVERFLOW_VISIBLE = 'visible';   // видимые
    const STYLE_OVERFLOW_HIDDEN = 'hidden';     // спрятанные
    const STYLE_OVERFLOW_SCROLL = 'scroll';     // с прокруткой
    const STYLE_OVERFLOW_AUTO = 'auto';         // автоматически
    const STYLE_OVERFLOW_INHERIT = 'inherit';   // как у родителя

    /**
     * Возвращает список параметра стилей overflow.
     * @return array
     */
    public static function getStyleOverflows()
    {
        return [
            static::STYLE_OVERFLOW_VISIBLE => GetMessage('intec.constructor.models.template.container.style.overflow.visible'),
            static::STYLE_OVERFLOW_HIDDEN => GetMessage('intec.constructor.models.template.container.style.overflow.hidden'),
            static::STYLE_OVERFLOW_SCROLL => GetMessage('intec.constructor.models.template.container.style.overflow.scroll'),
            static::STYLE_OVERFLOW_AUTO => GetMessage('intec.constructor.models.template.container.style.overflow.auto'),
            static::STYLE_OVERFLOW_INHERIT => GetMessage('intec.constructor.models.template.container.style.overflow.inherit')
        ];
    }

    /**
     * Возвращает список значений параметра стилей overflow.
     * @return array
     */
    public static function getStyleOverflowsValues()
    {
        $values = static::getStyleOverflows();
        $values = ArrayHelper::getKeys($values);
        return $values;
    }

    /**
     * Повторения
     */
    const STYLE_BACKGROUND_REPEAT_INHERIT = 'inherit';   // По родителю
    const STYLE_BACKGROUND_REPEAT_REPEAT = 'repeat';     // Повторять
    const STYLE_BACKGROUND_REPEAT_REPEAT_X = 'repeat-x';     // Повторять по-горизонтали
    const STYLE_BACKGROUND_REPEAT_REPEAT_Y = 'repeat-y';         // Повторять по-вертикали
    const STYLE_BACKGROUND_REPEAT_NO_REPEAT = 'no-repeat';   // Не повторять

    /**
     * Возвращает список параметра стилей background-repeat.
     * @return array
     */
    public static function getStyleBackgroundRepeats()
    {
        return [
            static::STYLE_BACKGROUND_REPEAT_INHERIT => GetMessage('intec.constructor.models.template.container.style.background-repeat.inherit'),
            static::STYLE_BACKGROUND_REPEAT_REPEAT => GetMessage('intec.constructor.models.template.container.style.background-repeat.repeat'),
            static::STYLE_BACKGROUND_REPEAT_REPEAT_X => GetMessage('intec.constructor.models.template.container.style.background-repeat.repeat-x'),
            static::STYLE_BACKGROUND_REPEAT_REPEAT_Y => GetMessage('intec.constructor.models.template.container.style.background-repeat.repeat-y'),
            static::STYLE_BACKGROUND_REPEAT_NO_REPEAT => GetMessage('intec.constructor.models.template.container.style.background-repeat.no-repeat')
        ];
    }

    /**
     * Возвращает список значений параметра стилей background-repeat.
     * @return array
     */
    public static function getStyleBackgroundRepeatsValues()
    {
        $values = static::getStyleBackgroundRepeats();
        $values = ArrayHelper::getKeys($values);
        return $values;
    }

    /**
     * @return Containers
     */
    public static function find()
    {
        return Core::createObject(ContainerQuery::className(), [get_called_class()]);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'constructor_builds_templates_containers';
    }

    /**
     * @inheritdoc
     */
    public function afterDelete()
    {
        parent::afterDelete();

        $children = $this->getContainers(true);
        $component = $this->getComponent(true);
        $widget = $this->getWidget(true);

        foreach ($children as $child) {
            /** @var Container $child */
            $child->delete();
        }

        if ($component) {
            $component->delete();
        }

        if ($widget) {
            $widget->delete();
        }
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'properties' => [
                'class' => 'intec\core\behaviors\FieldArray',
                'attribute' => 'properties'
            ],
            'condition' => [
                'class' => 'intec\core\behaviors\FieldArray',
                'attribute' => 'condition'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $typesValues = static::getTypesValues();

        return [
            [['templateId', 'parentId', 'order'], 'integer'],
            [['type', 'properties', 'script'], 'string'],
            [['display'], 'boolean', 'strict' => false],
            [['type'], 'default', 'value' => self::TYPE_NORMAL],
            [['type'], 'in', 'range' => $typesValues],
            [['display'], 'default', 'value' => 1],
            [['order'], 'default', 'value' => 0],
            [['templateId', 'type', 'display', 'order'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => GetMessage('intec.constructor.models.template.container.attributes.labels.id'),
            'templateId' => GetMessage('intec.constructor.models.template.container.attributes.labels.templateId'),
            'parentId' => GetMessage('intec.constructor.models.template.container.attributes.labels.parentId'),
            'type' => GetMessage('intec.constructor.models.template.container.attributes.labels.type'),
            'display' => GetMessage('intec.constructor.models.template.container.attributes.labels.display'),
            'order' => GetMessage('intec.constructor.models.template.container.attributes.labels.order'),
        ];
    }

    /**
     * Выполняет скрипт контейнера.
     * @param bool $withChildren Выполнять у дочерних контейнеров.
     */
    public function execute($withChildren = false)
    {
        if (!empty($this->script)) {
            try {
                eval($this->script);
            } catch (\Exception $exception) {}
        }

        if ($withChildren) {
            $containers = $this->getContainers(true);

            foreach ($containers as $container)
                $container->execute(true);
        }
    }

    /**
     * Определяет, отображается ли контейнер при заданных параметрах, или нет.
     * @param string|null $directory
     * @param string|null $path
     * @param string|null $url
     * @param array|null $parametersGet
     * @param array|null $parametersPage
     * @param array|null $parametersTemplate
     * @return bool
     */
    public function isDisplayed($directory = null, $path = null, $url = null, $parametersGet = null, $parametersPage = null, $parametersTemplate = null)
    {
        if (!$this->display)
            return false;

        return $this->isConditioned(
            $directory,
            $path,
            $url,
            $parametersGet,
            $parametersPage,
            $parametersTemplate
        );
    }

    /**
     * Реляция. Возвращает шаблон к которому принадлежит контейнер.
     * @param bool $result
     * @return Template|ActiveQuery|null
     */
    public function getTemplate($result = false)
    {
        return $this->relation(
            'template',
            $this->hasOne(Template::className(), ['id' => 'templateId']),
            $result
        );
    }

    /**
     * Реляция. Возвращает дочерние контейнеры.
     * @param bool $result
     * @param bool $collection
     * @return Container[]|ActiveQuery|null
     */
    public function getContainers($result = false, $collection = true)
    {
        return $this->relation(
            'containers',
            $this->hasMany(static::className(), ['parentId' => 'id']),
            $result,
            $collection
        );
    }

    /**
     * Возвращает корневой контейнер.
     * @return Container
     */
    public function getRoot()
    {
        $parent = $this->getParent(true);

        if (!empty($parent))
            return $parent->getRoot();

        return $this;
    }

    /**
     * Реляция. Возвращает родительский контейнер.
     * @param bool $result
     * @return Container|ActiveQuery|null
     */
    public function getParent($result = false)
    {
        return $this->relation(
            'parent',
            $this->hasOne(static::className(), ['id' => 'parentId']),
            $result
        );
    }

    /**
     * Возвращает значение свойства по ключу.
     * @param string $key
     * @return null
     */
    public function getProperty($key)
    {
        $key = explode('.', $key);
        return ArrayHelper::getValue($this->properties, $key);
    }

    /**
     * Возвращает все свойства.
     * @return array
     */
    public function getProperties()
    {
        if (Type::isArray($this->properties))
            return $this->properties;

        return [];
    }

    /**
     * Устанавливает значение свойства по ключу.
     * @param string $key
     * @param string $value
     * @return bool
     */
    public function setProperty($key, $value)
    {
        $key = explode('.', $key);
        $properties = $this->properties;
        $result = ArrayHelper::setValue($properties, $key, $value, false);
        $this->properties = $properties;
        return $result;
    }

    /**
     * Устанавливает несколько значений.
     * @param array $values
     * @return bool
     */
    public function setProperties($values)
    {
        $changed = false;

        if (!Type::isArrayable($values))
            return false;

        foreach ($values as $key => $value)
            $changed = $this->setProperty($key, $value) || $changed;

        return $changed;
    }

    /**
     * Удаляет значение свойства по ключу.
     * @param string $key
     */
    public function removeProperty($key)
    {
        $key = explode('.', $key);
        ArrayHelper::unsetValue($this->properties, $key);
    }

    /**
     * Удаляет значения свойств по ключам.
     * @param $keys
     */
    public function removeProperties($keys)
    {
        if (!Type::isArrayable($keys))
            return;

        foreach ($keys as $key)
            $this->removeProperty($key);
    }

    /**
     * Реляция. Возвращает компонент данного контейнера.
     * @param bool $result
     * @return Component|ActiveQuery|null
     */
    public function getComponent($result = false)
    {
        return $this->relation(
            'component',
            $this->hasOne(Component::className(), ['containerId' => 'id']),
            $result
        );
    }

    /**
     * Проверяет, существует ли у контейнера компонент.
     * @return bool
     */
    public function hasComponent()
    {
        $component = $this->getComponent(true);
        return !empty($component);
    }

    /**
     * Реляция. Возвращает виджет данного контейнера.
     * @param bool $result
     * @return Component|ActiveQuery|null
     */
    public function getWidget($result = false)
    {
        return $this->relation(
            'widget',
            $this->hasOne(Widget::className(), ['containerId' => 'id']),
            $result
        );
    }

    /**
     * Проверяет, существует ли у контейнера виджет.
     * @return bool
     */
    public function hasWidget()
    {
        $widget = $this->getWidget(true);
        return !empty($widget);
    }

    /**
     * Возвращает структуру контейнера.
     * @return array
     */
    public function getStructure()
    {
        $structure = [];
        $structure['id'] = $this->id;
        $structure['type'] = $this->type;
        $structure['display'] = Type::toBoolean($this->display);
        $structure['order'] = $this->order;
        $structure['condition'] = $this->condition;
        $structure['script'] = $this->script;
        $structure['properties'] = $this->properties;
        $structure['component'] = null;
        $structure['widget'] = null;
        $structure['conatainers'] = [];

        if ($this->hasComponent()) {
            $component = $this->getComponent(true);
            $structure['component'] = $component->getStructure();
        } else if ($this->hasWidget()) {
            $widget = $this->getWidget(true);
            $structure['widget'] = $widget->getStructure();
        } else {
            $containers = $this->getContainers(true);
            /** @var Containers $containers */
            $containers->sortBy('order');

            /** @var Container $container */
            foreach ($containers as $container)
                $structure['containers'][] = $container->getStructure();
        }

        return $structure;
    }

    /**
     * Возвращает идентификатор контейнера.
     * @return string|null
     */
    public function getIdAttribute()
    {
        return $this->getProperty('id');
    }

    /**
     * Устанавливает идентификатор контейнера.
     * @param string|null $value
     * @return string|null
     */
    public function setIdAttribute($value)
    {
        return $this->setProperty('id', $value);
    }

    /**
     * Возвращает класс контейнера.
     * @return string|null
     */
    public function getClassAttribute()
    {
        return $this->getProperty('class');
    }

    /**
     * Устанавливает класс контейнера.
     * @param string|null $value
     * @return string|null
     */
    public function setClassAttribute($value)
    {
        return $this->setProperty('class', $value);
    }

    /**
     * Возвращает значение свойства с единицей измерения.
     * @param string $property
     * @param bool $asArray
     * @param array $measures
     * @return string|null
     */
    protected function getPropertyMeasured($property, $asArray = false, $measures = ['px', '%'])
    {
        $value = $this->getProperty($property.'.value');
        $measure = $this->getProperty($property.'.measure');

        if (!ArrayHelper::isIn($measure, $measures))
            $measure = ArrayHelper::getFirstValue($measures);

        if (Type::isNumeric($value)) {
            if ($asArray) {
                return [
                    'value' => $value,
                    'measure' => $measure
                ];
            }

            return $value.$measure;
        }

        if ($asArray) {
            return [
                'value' => null,
                'measure' => null
            ];
        }

        return null;
    }

    /**
     * Устанавливает значение свойства с единицей измерения.
     * @param string $property
     * @param int|float $value
     * @param string $measure
     * @param array $measures
     * @return bool
     */
    protected function setPropertyMeasured($property, $value, $measure, $measures = ['px', '%'])
    {
        $changed = false;

        if ($value !== false) {
            if (Type::isNumeric($value)) {
                $value = Type::toFloat($value);
                $changed = $this->setProperty($property . '.value', $value);
            } else {
                $changed = $this->setProperty($property . '.value', null);
                $this->setProperty($property.'.measure', null);
            }
        }

        if ($measure !== false) {
            if ($measure === null) {
                $changed = $this->setProperty($property.'.measure', null) || $changed;
            } else {
                if (!ArrayHelper::isIn($measure, $measures))
                    $measure = ArrayHelper::getFirstValue($measures);

                $changed = $this->setProperty($property.'.measure', $measure) || $changed;
            }
        }

        return $changed;
    }

    /**
     * Создает название из свойства css свойство объекта.
     * @param string $name
     * @return string
     */
    protected function getStylePropertyName($name)
    {
        return 'Style'.Inflector::id2camel($name, '-');
    }

    /**
     * Возвращает значение свойства по названию css свойства.
     * @param string $name
     * @return mixed|null
     */
    public function getStyleProperty($name)
    {
        if (!$this->canGetStyleProperty($name))
            return null;

        $name = 'get'.$this->getStylePropertyName($name);
        $class = new \ReflectionClass(static::className());
        $method = $class->getMethod($name);

        return $method->invoke($this);
    }

    /**
     * Устанавливает значение свойства по названию css свойства.
     * @param string $name
     * @param mixed $arguments
     * @return mixed|null
     */
    public function setStyleProperty($name, $arguments)
    {
        if (!$this->canSetStyleProperty($name))
            return false;

        $name = 'set'.$this->getStylePropertyName($name);
        $class = new \ReflectionClass(static::className());
        $method = $class->getMethod($name);
        $parameters = $method->getParameters();
        $value = null;

        if (count($parameters) === 1) {
            if (Type::isArrayable($arguments)) {
                $value = [ArrayHelper::getFirstValue($arguments)];
            } else {
                $value = [$arguments];
            }
        } else if (Type::isArrayable($arguments)) {
            $value = [];

            foreach ($parameters as $parameter) {
                if (ArrayHelper::keyExists($parameter->getName(), $arguments)) {
                    $value[] = $arguments[$parameter->getName()];
                    continue;
                } else if ($parameter->isDefaultValueAvailable()) {
                    $value[] = $parameter->getDefaultValue();
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }

        return $method->invokeArgs($this, $value);
    }

    /**
     * Проверяет наличие css свойства в контейнере.
     * @param string $name
     * @return bool
     */
    public function hasStyleProperty($name)
    {
        return $this->canSetStyleProperty($name) || $this->canGetStyleProperty($name);
    }

    /**
     * Проверяет, возможно ли установить css свойство.
     * @param string $name
     * @return bool
     */
    public function canSetStyleProperty($name)
    {
        return $this->canGetProperty(
            $this->getStylePropertyName($name),
            false, false
        );
    }

    /**
     * Проверяет, возможно ли считать css свойство.
     * @param string $name
     * @return bool
     */
    public function canGetStyleProperty($name)
    {
        return $this->canGetProperty(
            $this->getStylePropertyName($name),
            false, false
        );
    }

    /**
     * Возвращает стили для контейнера.
     * @return array
     */
    public function getStyle()
    {
        $result = [];
        $result['position'] = $this->getStylePosition();
        $result['top'] = $this->getStyleTop();
        $result['right'] = $this->getStyleRight();
        $result['bottom'] = $this->getStyleBottom();
        $result['left'] = $this->getStyleLeft();
        $result['width'] = $this->getStyleWidth();
        $result['min-width'] = $this->getStyleMinWidth();
        $result['max-width'] = $this->getStyleMaxWidth();
        $result['height'] = $this->getStyleHeight();
        $result['min-height'] = $this->getStyleMinHeight();
        $result['max-height'] = $this->getStyleMaxHeight();
        $result['float'] = $this->getStyleFloat();
        $result['opacity'] = $this->getStyleOpacity();
        $result['overflow'] = null;
        $result['overflow-x'] = $this->getStyleOverflowX();
        $result['overflow-y'] = $this->getStyleOverflowY();
        $result['color'] = $this->getStyleColor();
        $result['font-size'] = $this->getStyleFontSize();
        $result['line-height'] = $this->getStyleLineHeight();
        $result['letter-spacing'] = $this->getStyleLetterSpacing();
        $result['text-transform'] = $this->getStyleTextTransform();

        if ($result['overflow-x'] === null || $result['overflow-y'] === null)
            $result['overflow'] = $this->getStyleOverflow();

        if ($this->getStyleMargin()) {
            $result['margin'] = $this->getStyleMarginSummary();
        } else {
            $result['margin-top'] = $this->getStyleMarginTop();
            $result['margin-right'] = $this->getStyleMarginRight();
            $result['margin-bottom'] = $this->getStyleMarginBottom();
            $result['margin-left'] = $this->getStyleMarginLeft();
        }

        if ($this->getStylePadding()) {
            $result['padding'] = $this->getStylePaddingSummary();
        } else {
            $result['padding-top'] = $this->getStylePaddingTop();
            $result['padding-right'] = $this->getStylePaddingRight();
            $result['padding-bottom'] = $this->getStylePaddingBottom();
            $result['padding-left'] = $this->getStylePaddingLeft();
        }

        $result['background-color'] = $this->getStyleBackgroundColor();
        $result['background-position'] = $this->getStyleBackgroundPosition();
        $result['background-size'] = $this->getStyleBackgroundSize();
        $result['background-repeat'] = $this->getStyleBackgroundRepeat();

        if ($this->getStyleBackgroundImage()) {
            $result['background-image'] = 'url(\''.$this->getStyleBackgroundImage().'\')';
        }

        if ($this->getStyleBorderRadius()) {
            $result['border-radius'] = $this->getStyleBorderRadiusSummary();
        } else {
            $result['border-top-left-radius'] = $this->getStyleBorderTopLeftRadius();
            $result['border-top-right-radius'] = $this->getStyleBorderTopRightRadius();
            $result['border-bottom-right-radius'] = $this->getStyleBorderBottomRightRadius();
            $result['border-bottom-left-radius'] = $this->getStyleBorderBottomLeftRadius();
        }

        if ($this->getStyleBorder()) {
            $result['border'] = $this->getStyleBorder();
        } else {
            $result['border-width'] = $this->getStyleBorderWidth();
            $result['border-style'] = $this->getStyleBorderStyle();
            $result['border-color'] = $this->getStyleBorderColor();
        }

        if ($this->getStyleBorderTop()) {
            $result['border'] = $this->getStyleBorderTop();
        } else {
            $result['border-top-width'] = $this->getStyleBorderTopWidth();
            $result['border-top-style'] = $this->getStyleBorderTopStyle();
            $result['border-top-color'] = $this->getStyleBorderTopColor();
        }

        if ($this->getStyleBorderRight()) {
            $result['border-right'] = $this->getStyleBorderRight();
        } else {
            $result['border-right-width'] = $this->getStyleBorderRightWidth();
            $result['border-right-style'] = $this->getStyleBorderRightStyle();
            $result['border-right-color'] = $this->getStyleBorderRightColor();
        }

        if ($this->getStyleBorderBottom()) {
            $result['border-bottom'] = $this->getStyleBorderBottom();
        } else {
            $result['border-bottom-width'] = $this->getStyleBorderBottomWidth();
            $result['border-bottom-style'] = $this->getStyleBorderBottomStyle();
            $result['border-bottom-color'] = $this->getStyleBorderBottomColor();
        }

        if ($this->getStyleBorderLeft()) {
            $result['border-left'] = $this->getStyleBorderLeft();
        } else {
            $result['border-left-width'] = $this->getStyleBorderLeftWidth();
            $result['border-left-style'] = $this->getStyleBorderLeftStyle();
            $result['border-left-color'] = $this->getStyleBorderLeftColor();
        }

        foreach ($result as $key => $value)
            if ($value === null)
                unset($result[$key]);

        return $result;
    }

    /**
     * Возвращает стили для контейнера в виде строки.
     * @return string
     */
    public function getStyleAttribute()
    {
        return Html::cssStyleFromArray($this->getStyle());
    }

    /**
     * @inheritdoc
     */
    public function export()
    {
        $result = $this->toArray();

        unset($result['id']);
        unset($result['templateId']);
        unset($result['parentId']);

        $result['component'] = null;
        $result['widget'] = null;
        $result['containers'] = [];

        if ($this->hasComponent()) {
            $component = $this->getComponent(true);
            $result['component'] = $component->export();
        } else if ($this->hasWidget()) {
            $widget = $this->getWidget(true);
            $result['widget'] = $widget->export();
        } else {
            $containers = $this->getContainers(true);

            foreach ($containers as $container)
                $result['containers'][] = $container->export();
        }

        return $result;
    }

    /**
     * Импортирует модель из массива.
     * @param array $data Данные для импорта в массиве.
     * @return bool
     */
    public function import($data)
    {
        $dataComponent = ArrayHelper::getValue($data, 'component');
        $dataWidget = ArrayHelper::getValue($data, 'widget');
        $dataContainers = ArrayHelper::getValue($data, 'containers');

        foreach ($this->attributes() as $attribute) {
            if ($attribute === 'id' || $attribute === 'templateId' || $attribute === 'parentId')
                continue;

            $this->setAttribute($attribute, null);
        }

        unset($data['id']);
        unset($data['templateId']);
        unset($data['parentId']);

        $this->load($data, '');
        $this->condition = ArrayHelper::getValue($data, 'condition');
        $this->properties = ArrayHelper::getValue($data, 'properties');

        if (!$this->save())
            return false;

        if ($this->hasComponent()) {
            $component = $this->getComponent(true);
            $component->delete();
        } else if ($this->hasWidget()) {
            $widget = $this->getComponent(true);
            $widget->delete();
        } else {
            $containers = $this->getContainers(true);

            /** @var Container $container */
            foreach ($containers as $container)
                $container->delete();
        }

        $component = null;
        $widget = null;
        $containers = [];

        if (Type::isArray($dataComponent)) {
            $component = new Component();
            $component->templateId = $this->templateId;
            $component->containerId = $this->id;

            if (!$component->import($dataComponent))
                $component = null;
        } else if (Type::isArray($dataWidget)) {
            $widget = new Widget();
            $widget->templateId = $this->templateId;
            $widget->containerId = $this->id;

            if (!$widget->import($dataWidget))
                $widget = null;
        } else if (Type::isArray($dataContainers)) {
            foreach ($dataContainers as $dataContainer) {
                $container = new static();
                $container->templateId = $this->templateId;
                $container->parentId = $this->id;
                $container->populateRelation('component', null);
                $container->populateRelation('widget', null);
                $container->populateRelation('containers', []);

                if ($container->import($dataContainer))
                    $containers[] = $container;
            }
        }

        $this->populateRelation('component', $component);
        $this->populateRelation('widget', $widget);
        $this->populateRelation('containers', $containers);

        return true;
    }
}