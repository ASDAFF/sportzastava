<?php
namespace intec\core\data\presets;

use intec\Core;
use intec\core\base\Collection;
use intec\core\base\Exception;
use intec\core\base\InvalidParamException;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Encoding;
use intec\core\helpers\FileHelper;
use intec\core\helpers\Json;
use intec\core\helpers\Type;

/**
 * Класс, представляющий набор настроек.
 * Class Preset
 * @property string $name Наименование набора.
 * @property string $code Код набора. Только для чтения.
 * @property bool $isSystem Является системным набором. Только для чтения.
 * @package intec\universe
 */
class Preset extends Collection
{
    /**
     * Название набора.
     * @var string
     */
    protected $_name;

    /**
     * Код набора.
     * @var string
     */
    protected $_code;

    /**
     * Является системным.
     * @var bool
     */
    protected $_isSystem = false;

    /**
     * Путь до пресета.
     * @var string
     */
    protected $_path;

    /**
     * @param string $code
     * @param string $presets
     * @return Preset|null
     */
    public static function create($code, $presets)
    {
        if (empty($code))
            return null;

        $reflection = new \ReflectionClass($presets);

        if ($reflection === null)
            return null;

        if (!$reflection->isSubclassOf(Presets::className()))
            return null;

        /** @var Presets $presets */

        $instance = $presets::getInstance(true);
        $directory = $presets::getDirectory();

        if ($instance->exists($code))
            return null;

        $path = $directory.'/'.$code.'.json';
        $preset = new Preset($path);
        $instance->set($preset->getCode(), $preset);

        return $preset;
    }

    /**
     * Preset constructor.
     * @param string $path
     */
    public function __construct($path)
    {
        $path = FileHelper::normalizePath($path);
        $code = FileHelper::getFileNameWithoutExtension($path);

        if (empty($path))
            throw new InvalidParamException('Path cannot be empty');

        if (empty($code))
            throw new Exception('Code cannot be empty');

        $this->_path = $path;
        $this->_code = $code;
        $this->load();

        parent::__construct([]);
    }

    /**
     * Устанавливает название набора.
     * @param $value
     * @return Preset
     */
    public function setName($value)
    {
        $this->_name = $value;

        return $this;
    }

    /**
     * Возвращает название набора.
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Возвращает код набора.
     * @return string
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * Является ли набор системным.
     * @return bool
     */
    public function getIsSystem()
    {
        return $this->_isSystem;
    }

    /**
     * Возвращает путь до файла набора.
     * @param string $ds
     * @return string
     */
    public function getPath($ds = DIRECTORY_SEPARATOR)
    {
        $path = $this->_path;
        $path = FileHelper::normalizePath($path, $ds);

        return $path;
    }

    /**
     * Удаляет файл набора.
     * @return bool
     */
    public function delete()
    {
        if ($this->getIsSystem())
            return false;

        $path = $this->getPath();

        if (FileHelper::isFile($path))
            unlink($path);

        return !FileHelper::isFile($path);
    }

    /**
     * Загружает данные из файла.
     * @return bool
     */
    public function load()
    {
        return static::loadFrom($this->getPath());
    }

    /**
     * Загружает пресет из другого файла.
     * @param $path
     * @return bool
     */
    public function loadFrom($path)
    {
        $path = FileHelper::normalizePath($path);

        if ($this->getIsSystem() && $path !== $this->getPath())
            return false;

        $data = FileHelper::getFileData($path);

        if (!empty($data)) {
            try {
                $data = Json::decode($data);
            } catch (InvalidParamException $exception) {
                $data = null;
            }

            if (Type::isArray($data)) {
                $data = ArrayHelper::convertEncoding($data, Encoding::getDefault(), Encoding::UTF8);
                $name = ArrayHelper::getValue($data, 'name');
                $isSystem = ArrayHelper::getValue($data, 'isSystem');
                $values = ArrayHelper::getValue($data, 'values');

                if (!empty($name))
                    $this->_name = $name;

                if ($isSystem)
                    $this->_isSystem = true;

                $this->setRange($values);

                return true;
            }
        }

        return false;
    }

    /**
     * Сохраняет пресет в файл.
     * @return bool
     */
    public function save()
    {
        return $this->saveTo($this->getPath());
    }

    /**
     * Сохранить пресет в указанный файл.
     * @param $path
     * @return bool
     */
    public function saveTo($path)
    {
        $path = FileHelper::normalizePath($path);
        $isSystem = $this->getIsSystem();

        if ($isSystem && $path === $this->getPath())
            return false;

        $data = [];
        $data['name'] = $this->_name;
        $data['isSystem'] = false;
        $data['values'] = $this->asArray();
        $data = ArrayHelper::convertEncoding($data, Encoding::UTF8, Encoding::getDefault());
        $data = Json::encode($data);

        FileHelper::setFileData($path, $data);

        return FileHelper::isFile($path);
    }

    /**
     * Проверяет, существует ли файл пресета.
     * @return bool
     */
    public function isExists()
    {
        return FileHelper::isFile($this->getPath());
    }
}