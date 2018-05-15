<?php
namespace intec\core\bitrix\web;

use intec\Core;
use intec\core\base\Object;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\FileHelper;
use intec\core\helpers\Type;

/**
 * Расширение JavScript.
 * Class JavaScriptExtension
 * @package intec\core\bitrix\web
 */
class JavaScriptExtension extends Object
{
    /**
     * Идентификатор расширения.
     * @var string
     */
    public $id;
    /**
     * Путь до скрипта.
     * @var string
     */
    public $script;
    /**
     * Путь до стиля.
     * @var string
     */
    public $style;
    /**
     * Зависимости расширения.
     * @var array
     */
    public $dependencies = [];

    public function init()
    {
        $this->normalize();
    }

    /**
     * Проверяет расширение на корректность.
     * @return bool Расширение корректно.
     */
    public function verify()
    {
        if (empty($this->id))
            return false;

        if (empty($this->script))
            return false;

        $this->script = FileHelper::getRelativePath(
            $this->script,
            Core::getAlias('@root'),
            '/'
        );

        if (!empty($this->style))
            $this->style = FileHelper::getRelativePath(
                $this->style,
                Core::getAlias('@root'),
                '/'
            );

        $this->normalize();

        return true;
    }

    /**
     * Нормализует пути и зависимости.
     */
    public function normalize() {
        $this->script = Core::getAlias($this->script);
        $this->style = Core::getAlias($this->style);

        if (!Type::isArray($this->dependencies))
            $this->dependencies = [];
    }

    /**
     * Преобразует в расширение CJSCore.
     * @return array
     */
    public function toCJSExtension()
    {
        $this->normalize();

        $array = [];
        $array['js'] = $this->script;

        if (!empty($this->style))
            $array['css'] = $this->style;

        if (!empty($this->dependencies))
            $array['rel'] = $this->dependencies;

        return $array;
    }

    /**
     * Импортирует из расширения CJSCore
     * @param string $id Идентификатор.
     * @param array $array Массив из CJSCore.
     */
    public function fromCJSExtension($id, $array)
    {
        $this->id = $id;
        $this->script = ArrayHelper::getValue($array, 'js');
        $this->style = ArrayHelper::getValue($array, 'css');
        $this->dependencies = ArrayHelper::getValue($array, 'rel');
        $this->normalize();
    }
}