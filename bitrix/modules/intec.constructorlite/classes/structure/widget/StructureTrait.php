<?php
namespace intec\constructor\structure\widget;

use intec\Core;
use intec\core\base\Exception;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\FileHelper;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;
use intec\constructor\models\Build;
use intec\constructor\models\build\Template;

trait StructureTrait
{
    protected $_messages = [];

    /**
     * @return string
     */
    public function getDataPath()
    {
        return $this->getDirectory().DIRECTORY_SEPARATOR.'data.php';
    }

    /**
     * @return string
     */
    public function getHandlerPath()
    {
        return $this->getDirectory().DIRECTORY_SEPARATOR.'handler.php';
    }

    /**
     * @return bool
     */
    public function hasHandler()
    {
        return FileHelper::isFile($this->getHandlerPath());
    }

    /**
     * @param array $properties
     * @param array $parameters
     * @param Build $build
     * @param Template $template
     * @return array|mixed
     */
    public function handle($properties = [], $parameters = [], $build = null, $template = null)
    {
        if (!Type::isArrayable($properties))
            $properties = [];

        if (!Type::isArrayable($parameters))
            $parameters = [];

        $handle = function () use (&$properties, &$parameters, &$build, &$template) {
            include($this->getHandlerPath());
        };

        if ($this->hasHandler()) {
            return $handle();
        }

        return [];
    }

    /**
     * @return string
     */
    public function getHeadersPath()
    {
        return $this->getDirectory().DIRECTORY_SEPARATOR.'headers.php';
    }

    /**
     * @return bool
     */
    public function hasHeaders()
    {
        return FileHelper::isFile($this->getHeadersPath());
    }

    /**
     *
     */
    public function includeHeaders()
    {
        if ($this->hasStyle())
            Core::$app->web->css->addFile($this->getStylePath());

        if ($this->hasScript())
            Core::$app->web->js->addFile($this->getScriptPath());

        $include = function () {
            include($this->getHeadersPath());
        };

        if ($this->hasHeaders())
            $include();
    }

    /**
     * @return string
     */
    public function getModelPath()
    {
        return $this->getDirectory().DIRECTORY_SEPARATOR.'model.js';
    }

    /**
     * @return bool
     */
    public function hasModel()
    {
        return FileHelper::isFile($this->getModelPath());
    }

    /**
     * @return string
     */
    public function getModel()
    {
        $model = '';
        $path = $this->getModelPath();

        if ($this->hasModel())
            $model = FileHelper::getFileData($path);

        return $model;
    }

    /**
     * @return string
     */
    public function getSettingsPath()
    {
        return $this->getDirectory().DIRECTORY_SEPARATOR.'settings.php';
    }

    /**
     * @return bool
     */
    public function hasSettings()
    {
        return FileHelper::isFile($this->getSettingsPath());
    }

    /**
     * @return string
     */
    public function getSettings()
    {
        $render = function () {
            include($this->getSettingsPath());
        };

        ob_start();

        if (FileHelper::isFile($this->getSettingsPath()))
            $render();

        $settings = ob_get_contents();
        ob_end_clean();
        return $settings;
    }

    /**
     * @return string
     */
    public function getScriptPath()
    {
        return $this->getDirectory().DIRECTORY_SEPARATOR.'script.js';
    }

    /**
     * @return bool
     */
    public function hasScript()
    {
        return FileHelper::isFile($this->getScriptPath());
    }

    /**
     * @return string
     */
    public function getStylePath()
    {
        return $this->getDirectory().DIRECTORY_SEPARATOR.'style.css';
    }

    /**
     * @return bool
     */
    public function hasStyle()
    {
        return FileHelper::isFile($this->getStylePath());
    }

    /**
     * @param string $language
     * @return string
     */
    public function getLanguagePath($language = LANGUAGE_ID)
    {
        return $this->getDirectory().DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR.$language.'.php';
    }

    /**
     * @param string $language
     * @return array
     */
    public function getLanguageMessages($language = LANGUAGE_ID)
    {
        $path = $this->getLanguagePath($language);
        $messages = [];

        if (FileHelper::isFile($path)) {
            $messages = include($path);
        }

        if (!Type::isArray($messages))
            $messages = [];

        return $messages;
    }

    /**
     * @param string $language
     */
    public function loadLanguage($language = LANGUAGE_ID)
    {
        $this->_messages = $this->getLanguageMessages($language);
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        return $this->_messages;
    }

    /**
     * @param string $code
     * @param array $macros
     * @param string $tagStart
     * @param string $tagEnd
     * @return string|null
     */
    public function getMessage($code, $macros = [], $tagStart = '#', $tagEnd = '#')
    {
        if (ArrayHelper::keyExists($code, $this->_messages)) {
            $message = $this->_messages[$code];

            if (!empty($macros)) {
                return StringHelper::replaceMacros(
                    $message,
                    $macros,
                    $tagStart,
                    $tagEnd
                );
            }

            return $message;
        }

        return null;
    }
}