<?php
namespace intec\constructor\structure\widget;
IncludeModuleLangFile(__FILE__);

use intec\Core;
use intec\core\base\Exception;
use intec\core\base\Object;
use intec\core\helpers\FileHelper;
use intec\core\helpers\Type;
use intec\constructor\structure\Widget;
use intec\constructor\models\Build;
use intec\constructor\models\build\Template as BuildTemplate;

/**
 * Class Template
 * @property string $code
 * @property string $directory
 * @property Build $build
 * @property string $scriptPath
 * @property string $stylePath
 * @property string $viewsPath
 * @property string $model
 * @property Widget $widget
 * @package intec\constructor\models\widget
 */
class Template extends Object
{
    use StructureTrait {
        getSettings as protected getSettingsTrait;
        getMessage as protected getMessageTrait;
    }

    protected $_widget;
    protected $_directory;
    protected $_code;
    protected $_build;

    /**
     * Template constructor.
     * @param Widget $widget
     * @param string|null $directory
     * @param Build $build
     * @throws Exception
     */
    public function __construct($widget, $directory, $build = null)
    {
        parent::__construct([]);

        if (!($widget instanceof Widget))
            throw new Exception('Error creating template without Snippet');

        if (!($build instanceof Build))
            $build = null;

        $directory = FileHelper::normalizePath($directory);

        if (empty($directory))
            throw new Exception('Directory parameter cannot be empty!');

        $code = $directory;
        $code = explode(DIRECTORY_SEPARATOR, $code);
        $code = end($code);

        $this->_code = $code;
        $this->_directory = $directory;
        $this->_widget = $widget;
        $this->_build = $build;

        if (!FileHelper::isDirectory($directory))
            throw new Exception('Template "'.$code.'" not exists');

        $this->loadLanguage();
    }

    /**
     * @return Widget
     */
    public function getWidget()
    {
        return $this->_widget;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * @return Build|null
     */
    public function getBuild()
    {
        return $this->_build;
    }

    /**
     * @return string
     */
    public function getDirectory()
    {
        return $this->_directory;
    }

    /**
     * @return string
     */
    public function getViewsPath()
    {
        return $this->getDirectory().DIRECTORY_SEPARATOR.'views';
    }

    /**
     * @param array $properties
     * @param Build $build
     * @param BuildTemplate $template
     * @return array
     */
    public function getData($properties = [], $build = null, $template = null)
    {
        if (!$template instanceof BuildTemplate)
            return null;

        if (!$build instanceof Build)
            $build = $template->getBuild(true);

        if (!$build instanceof Build)
            return null;

        $data = $this->getWidget()->getData($properties, $build, $template);
        $properties = Type::isArray($settings) ? $settings : [];

        $run = function () use (&$data, &$properties, &$build, &$template) {
            include($this->getDataPath());
        };

        if (FileHelper::isFile($this->getDataPath()))
            $run();

        $data = Type::isArray($data) ? $data : [];
        return $data;
    }

    /**
     * @return string
     */
    public function getSettings()
    {
        $settings = $this->getWidget()->getSettings();
        $settings .= $this->getSettingsTrait();

        return $settings;
    }

    /**
     * @inheritdoc
     */
    public function getMessage($code, $macros = [], $tagStart = '#', $tagEnd = '#')
    {
        $message = $this->getMessageTrait(
            $code,
            $macros,
            $tagStart,
            $tagEnd
        );

        if ($message === null) {
            return $this->getWidget()->getMessage(
                $code,
                $macros,
                $tagStart,
                $tagEnd
            );
        }

        return $message;
    }

    /**
     * Отрисовывает виджет.
     * @param array $properties
     * @param Build $build
     * @param BuildTemplate $template
     * @param bool $static
     * @param bool $out
     * @return null|string
     */
    public function render($properties = [], $build = null, $template = null, $static = true, $out = false)
    {
        if (!$template instanceof BuildTemplate)
            return null;

        if (!$build instanceof Build)
            $build = $template->getBuild(true);

        if (!$build instanceof Build)
            return null;

        $data = $this->getData($properties, $build, $template);
        $path = $this->getViewsPath();

        if ($static) {
            $path .= DIRECTORY_SEPARATOR.'static.php';
        } else {
            $path .= DIRECTORY_SEPARATOR.'dynamic.php';
        }

        $result = null;
        $render = function () use ($path, &$data, &$properties, &$build, &$template) {
            include($path);
        };

        if (!$out)
            ob_start();

        if (FileHelper::isFile($path))
            $render();

        if (!$out) {
            $result = ob_get_contents();
            ob_end_clean();
        }

        return $result;
    }
}