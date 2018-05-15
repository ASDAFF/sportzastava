<?php
namespace intec\constructor\structure;
IncludeModuleLangFile(__FILE__);

use intec\core\base\Exception;
use intec\core\base\Object;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Encoding;
use intec\core\helpers\FileHelper;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Json;
use intec\core\helpers\Type;
use intec\constructor\models\Build;
use intec\constructor\models\build\Template as BuildTemplate;
use intec\constructor\structure\widget\StructureTrait;
use intec\constructor\structure\widget\Template as WidgetTemplate;
use intec\constructor\structure\widget\Templates as WidgetTemplates;

/**
 * Class Widget
 * @property string $id
 * @property string $name
 * @property string $author
 * @property string $code
 * @property string $directory
 * @property string $descriptionPath
 * @property array $description
 * @property string $model
 * @package intec\constructor\models
 */
class Widget extends Object
{
    use StructureTrait;

    protected static $cache;

    protected $_directory;
    protected $_name;
    protected $_author;
    protected $_id;

    protected $templates = [
        'public' => null,
        'template' => []
    ];

    /**
     * Snippet constructor.
     * @param string $directory
     * @throws Exception
     */
    public function __construct($directory)
    {
        parent::__construct([]);
        $this->_directory = FileHelper::normalizePath($directory);

        if (!FileHelper::isDirectory($this->_directory))
            throw new Exception('Directory "'.$this->getDirectory().'" not exists!');

        $directory = explode(DIRECTORY_SEPARATOR, $directory);
        $pathLength = count($directory);

        if ($pathLength < 2)
            throw new Exception('Invalid path "'.$this->getDirectory().'"');

        $this->_author = $directory[$pathLength - 2];
        $this->_id = $directory[$pathLength - 1];
        $this->loadLanguage();
        $this->loadDescription();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->getAuthor().':'.$this->getId();
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
    public function getDescriptionPath()
    {
        return $this->getDirectory().DIRECTORY_SEPARATOR.'description.php';
    }

    /**
     * @return array|null
     */
    public function getDescription()
    {
        $description = null;
        $path = $this->getDescriptionPath();

        if (FileHelper::isFile($path))

            try {
                $description = include($path);
            } catch (Exception $exception) {
                $description = null;
            };

        if (!Type::isArray($description))
            $description = null;

        return $description;
    }

    /**
     * Загружает описание в виджет.
     */
    public function loadDescription()
    {
        $description = $this->getDescription();

        if ($description !== null) {
            $this->_name = ArrayHelper::getValue($description, 'name');
        }
    }

    /**
     * @return string
     */
    public function getIconPath()
    {
        return $this->getDirectory().DIRECTORY_SEPARATOR.'icon.png';
    }

    /**
     * @return bool
     */
    public function hasIcon()
    {
        return FileHelper::isFile($this->getIconPath());
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

        $data = [];
        $properties = Type::isArray($properties) ? $properties : [];

        $run = function () use (&$data, &$properties, &$build, &$template) {
            include($this->getDataPath());
        };

        if (FileHelper::isFile($this->getDataPath()))
            $run();

        $data = Type::isArray($data) ? $data : [];
        return $data;
    }

    /**
     * @param Build|null $build
     * @param bool $collection
     * @param bool $refresh
     * @return WidgetTemplates|WidgetTemplate[]
     */
    public function getTemplates($build = null, $collection = true, $refresh = false)
    {
        $result = new WidgetTemplates();
        $directory = $this->getDirectory().DIRECTORY_SEPARATOR.'templates';

        $load = function ($directory, $siteTemplate = null) {
            $result = [];
            $entries = FileHelper::getDirectoryEntries($directory, false);

            foreach ($entries as $entry) {
                $path = $directory.DIRECTORY_SEPARATOR.$entry;
                $template = new WidgetTemplate($this, $path, $siteTemplate);
                $result[$template->getCode()] = $template;
            }

            return $result;
        };

        if ($this->templates['public'] === null || $refresh) {
            $this->templates['public'] = $load($directory);
        }

        $result->setRange($this->templates['public']);

        if (!empty($build)) {
            $directory = $build->getDirectory();
            $directory .= DIRECTORY_SEPARATOR . 'widgets';
            $directory .= DIRECTORY_SEPARATOR . $this->getAuthor();
            $directory .= DIRECTORY_SEPARATOR . $this->getId();

            if (!ArrayHelper::keyExists($build->code, $this->templates['template']) || $refresh) {
                $this->templates['template'][$build->code] = $load($directory);
            }

            $result->setRange($this->templates['template'][$build->code]);
        }

        if ($collection)
            return $result;

        return $result->asArray();
    }

    /**
     * @param string $code
     * @param Build|null $build
     * @return WidgetTemplate|null
     */
    public function getTemplate($code = null, $build = null, $template = null)
    {
        if ($code === null)
            $code = '.default';

        $templates = $this->getTemplates($build);
        $template = $templates->get($code);

        return $template;
    }

    public static function install($author, $code, $directory, $replace = false)
    {
        $author = Type::toString($author);
        $code = Type::toString($code);
        $directoryFrom = Type::toString($directory);
        $directoryTo = Widgets::getDirectory();
        $replace = Type::toBoolean($replace);

        if (empty($author) || empty($code))
            return false;

        if (!FileHelper::isDirectory($directoryFrom))
            return false;

        $directoryTo .= DIRECTORY_SEPARATOR.$author.DIRECTORY_SEPARATOR.$code;

        if (FileHelper::isDirectory($directoryTo))
            if ($replace)
                FileHelper::removeDirectory($directoryTo);

        if (FileHelper::isDirectory($directoryTo))
            return false;

        if (!FileHelper::createDirectory($directoryTo))
            return false;

        FileHelper::copyDirectory($directoryFrom, $directoryTo);

        return true;
    }
}