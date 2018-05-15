<?php
namespace intec\constructor\models\build\template;
IncludeModuleLangFile(__FILE__);

use intec\core\db\ActiveRecord;
use intec\core\db\ActiveQuery;
use intec\constructor\base\Exchangeable;
use intec\constructor\models\build\Template;
use intec\core\helpers\ArrayHelper;

/**
 * Class Widget
 * @property int $id
 * @property int $templateId
 * @property int $containerId
 * @property string $code
 * @property string $template
 * @property array $properties
 * @package intec\constructor\models\build\template
 */
abstract class Element extends ActiveRecord implements Exchangeable
{
    /**
     * @var array
     */
    protected static $cache = [];

    public function behaviors()
    {
        return [
            'properties' => [
                'class' => 'intec\core\behaviors\FieldArray',
                'attribute' => 'properties'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'templateId' => ['templateId', 'integer'],
            'containerId' => ['containerId', 'integer'],
            'code' => ['code', 'string', 'max' => 255],
            'template' => ['template', 'string', 'max' => 255],
            'required' => [['templateId', 'containerId', 'code'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => GetMessage('intec.constructor.models.template.element.attributes.labels.id'),
            'templateId' => GetMessage('intec.constructor.models.template.element.attributes.labels.templateId'),
            'containerId' => GetMessage('intec.constructor.models.template.element.attributes.labels.containerId'),
            'component' => GetMessage('intec.constructor.models.template.element.attributes.labels.component'),
            'template' => GetMessage('intec.constructor.models.template.element.attributes.labels.template'),
        ];
    }

    /**
     * Реляция. Возвращает шаблон к которому принадлежит элемент.
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
     * Реляция. Возвращает контейнер виджета.
     * @param bool $result
     * @return Container|ActiveQuery|null
     */
    public function getContainer($result = false)
    {
        return $this->relation(
            'container',
            $this->hasOne(Container::className(), ['id' => 'containerId']),
            $result
        );
    }

    /**
     * Возвращает структуру в виде массива.
     * @return array
     */
    public function getStructure()
    {
        $structure = [];
        $structure['id'] = $this->id;
        $structure['code'] = $this->code;
        $structure['template'] = $this->template;
        $structure['properties'] = $this->properties;

        return $structure;
    }

    /**
     * Отрисовывает содержимое элемента и возвращает его в виде строки.
     * @return string
     */
    public abstract function render();

    /**
     * @inheritdoc
     */
    public function export()
    {
        $result = $this->toArray();

        unset($result['id']);
        unset($result['templateId']);
        unset($result['containerId']);

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function import($data)
    {
        foreach ($this->attributes() as $attribute) {
            if ($attribute === 'id' || $attribute === 'templateId' || $attribute === 'containerId')
                continue;

            $this->setAttribute($attribute, null);
        }

        unset($data['id']);
        unset($data['templateId']);
        unset($data['containerId']);

        $this->load($data, '');
        $this->properties = ArrayHelper::getValue($data, 'properties');

        return $this->save();
    }
}