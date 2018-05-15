<?php
namespace intec\constructor\models\build\template;
IncludeModuleLangFile(__FILE__);

use intec\constructor\structure\widget\Template;
use intec\constructor\structure\Widget as Model;
use intec\constructor\structure\Widgets as Models;

/**
 * Class Widget
 * @package intec\constructor\models\build\template
 */
class Widget extends Element
{
    /**
     * @var array
     */
    protected static $cache = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'constructor_builds_templates_widgets';
    }

    /**
     * @return Model|null
     */
    public function getModel()
    {
        $models = Models::all();
        return $models->get($this->code);
    }

    /**
     * @return Template|null
     */
    public function getModelTemplate()
    {
        /** @var Model $model */
        $model = $this->getModel();

        if (empty($model))
            return null;

        $template = $this->getTemplate(true);

        if (empty($template))
            return null;

        return $model->getTemplate(
            $this->template,
            $template->getBuild(true)
        );
    }

    /**
     * @return array|null
     */
    public function getData()
    {
        $template = $this->getModelTemplate();

        if (empty($template))
            return null;

        $buildTemplate = $this->getTemplate(true);

        if (empty($buildTemplate))
            return null;

        return $template->getData(
            $this->properties,
            $buildTemplate->getBuild(true),
            $buildTemplate
        );
    }

    /**
     * @inheritdoc
     */
    public function getStructure()
    {
        $structure = parent::getStructure();
        $structure['data'] = $this->getData();

        return $structure;
    }

    /**
     * @param bool $out
     * @return string|null
     */
    public function render($out = false)
    {
        $template = $this->getModelTemplate();

        if (empty($template))
            return null;

        $buildTemplate = $this->getTemplate(true);

        if (empty($buildTemplate))
            return null;

        return $template->render(
            $this->properties,
            $buildTemplate->getBuild(true),
            $buildTemplate,
            true,
            $out
        );
    }
}