<?php
namespace intec\constructor\models;
IncludeModuleLangFile(__FILE__);

use Bitrix\Iblock\PropertyIndex\QueryBuilder;
use intec\Core;
use intec\core\base\InvalidParamException;
use intec\core\db\ActiveRecord;
use intec\core\db\ActiveRecords;
use intec\core\db\ActiveQuery;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Encoding;
use intec\core\helpers\FileHelper;
use intec\core\helpers\Json;
use intec\core\helpers\RegExp;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;
use intec\constructor\base\Exchangeable;
use intec\constructor\models\build\File;
use intec\constructor\models\build\Gallery;
use intec\constructor\models\build\Page;
use intec\constructor\models\build\Property;
use intec\constructor\models\build\Template;
use intec\constructor\models\build\Theme;
use ZipArchive;

/**
 * Class Build
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $css
 * @property string $less
 * @property string $js
 * @package intec\constructor\models
 */
class Build extends ActiveRecord implements Exchangeable
{
    /**
     * @var array
     */
    protected static $cache = [];
    /**
     * Текущая сборка.
     * @var Build
     */
    protected static $current;

    /**
     * Мета-информация сборки.
     * @var array|null
     */
    protected $_meta = null;
    /**
     * Текущая страница.
     * @var Page
     */
    protected $_page;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'constructor_builds';
    }

    public function afterDelete()
    {
        parent::afterDelete();

        /** @var ActiveRecords $themes */
        $themes = $this->getThemes(true);

        /** @var Theme $theme */
        foreach ($themes as $theme)
            $theme->delete();

        /** @var ActiveRecords $properties */
        $properties = $this->getProperties(true);

        /** @var Property $property */
        foreach ($properties as $property)
            $property->delete();
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->getAttribute('code') !== $this->getOldAttribute('code'))
                if (!$this->isExists() && $this->isExists(true))
                    rename(
                        $this->getDirectory(true),
                        $this->getDirectory()
                    );

            return true;
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'string', 'max' => 255],
            [['css', 'less', 'js'], 'string'],
            [['code'], 'match', 'pattern' => '/^[A-Za-z0-9_-]*$/'],
            [['code'], 'unique'],
            [['name', 'code'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => GetMessage('intec.constructor.models.build.attributes.labels.id'),
            'code' => GetMessage('intec.constructor.models.build.attributes.labels.code'),
            'name' => GetMessage('intec.constructor.models.build.attributes.labels.name'),
            'themeId' => GetMessage('intec.constructor.models.build.attributes.labels.themeId'),
            'css' => GetMessage('intec.constructor.models.build.attributes.labels.css'),
            'less' => GetMessage('intec.constructor.models.build.attributes.labels.less'),
            'js' => GetMessage('intec.constructor.models.build.attributes.labels.js')
        ];
    }

    /**
     * Возвращает текущую сборку в соответствии с шаблоном сайта.
     * @return Build|null
     */
    public static function getCurrent()
    {
        if (static::$current === null) {
            static::$current = static::find()
                ->where(['code' => SITE_TEMPLATE_ID])
                ->one();

            if (static::$current === null)
                static::$current = false;
        }

        if (static::$current === false)
            return null;

        return static::$current;
    }

    /**
     * Реляция. Возвращает шаблон по умолчанию.
     * @param bool $result
     * @return Template|ActiveQuery|null
     */
    public function getDefaultTemplate($result = false)
    {
        return $this->relation(
            'defaultTemplate',
            $this->hasOne(Template::className(), ['buildId' => 'id'])
                ->where(['default' => 1]),
            $result
        );
    }

    /**
     * Возвращает путь до сборки.
     * @param bool $old
     * @param bool $relative
     * @param string $separator
     * @return string|null
     */
    public function getDirectory($old = false, $relative = false, $separator = DIRECTORY_SEPARATOR)
    {
        if ($this->isNewRecord)
            return null;

        if (!$relative) {
            return FileHelper::normalizePath(Core::getAlias('@templates/'.($old ?
                $this->getOldAttribute('code') :
                $this->getAttribute('code'))
            ), $separator);
        } else {
            return FileHelper::normalizePath('/bitrix/templates/'.($old ?
                $this->getOldAttribute('code') :
                $this->getAttribute('code')
            ), $separator);
        }
    }

    /**
     * Возвращает мета-данные шаблона.
     * @param bool $reset
     * @return array|mixed
     */
    public function getMeta($reset = false)
    {
        if ($this->_meta === null || $reset) {
            $directory = $this->getDirectory();
            $path = $directory . DIRECTORY_SEPARATOR . 'meta.php';
            $this->_meta = [];

            if (FileHelper::isFile($path))
                $this->_meta = include($path);
        }

        return $this->_meta;
    }

    /**
     * Возвращает значение мета-переменной шаблона.
     * @param string|array $key
     * @param bool $reset
     * @return mixed|null
     */
    public function getMetaValue($key, $reset = false)
    {
        $meta = $this->getMeta($reset);
        return ArrayHelper::getValue($meta, $key);
    }

    /**
     * Возвращает текущую страницу.
     * @param bool $reset
     * @return Page
     */
    public function getPage($reset = false)
    {
        if ($this->_page === null || $reset) {
            $directory = SITE_DIR;
            $path = Core::$app->request->getScriptUrl();
            $path = RegExp::replaceBy(
                '/^'.RegExp::escape($directory).'/',
                '',
                $path
            );

            $this->_page = new Page($this, $path, $directory);
        }

        return $this->_page;
    }

    /**
     * Возвращает файлы шаблона.
     * @return File[]
     */
    public function getFiles()
    {
        $meta = $this->getMeta();
        $files = ArrayHelper::getValue($meta, 'files');
        $result = [];

        if (Type::isArray($files)) {
            $types = File::getTypesValues();

            foreach ($files as $file) {
                $path = ArrayHelper::getValue($file, 'path');
                $path = Type::toString($path);
                $type = ArrayHelper::getValue($file, 'type');
                $type = Type::toString($type);

                if (empty($path))
                    continue;

                if (!ArrayHelper::isIn($type, $types))
                    continue;

                $file = new File($this, $type, $path);

                if ($file->isExists())
                    $result[] = $file;
            }
        }

        return $result;
    }

    /**
     * Реляция. Возвращает свойства, связанные со сборкой.
     * @param bool $result
     * @param bool $collection
     * @return Property[]|ActiveRecords|ActiveQuery|null
     */
    public function getProperties($result = false, $collection = true)
    {
        return $this->relation(
            'properties',
            $this->hasMany(Property::className(), ['buildId' => 'id']),
            $result,
            $collection
        );
    }

    /**
     * Реляция. Возвращает шаблоны, связанные со сборкой.
     * @param bool $result
     * @param bool $collection
     * @return Template[]|ActiveRecords|ActiveQuery|null
     */
    public function getTemplates($result = false, $collection = true)
    {
        return $this->relation(
            'templates',
            $this->hasMany(Template::className(), ['buildId' => 'id']),
            $result,
            $collection
        );
    }

    /**
     * Возвращает шаблон, подходящий под условия.
     * @param string|null $directory Текущая директория сайта.
     * @param string|null $path Текущий путь.
     * @param string|null $url Текущий адрес Url.
     * @param array|null $parametersGet Параметры запроса.
     * @param array|null $parametersPage Параметры страницы.
     * @return Template|null
     */
    public function getTemplate($directory = null, $path = null, $url = null, $parametersGet = null, $parametersPage = null)
    {
        $templates = $this->getTemplates(true);
        /** @var ActiveRecords $template */
        $templates->sortBy('sort', SORT_ASC);
        $result = null;

        /** @var Template $template */
        foreach ($templates as $template)
            if ($template->active == 1)
                if ($template->isConditioned($directory, $path, $url, $parametersGet, $parametersPage)) {
                    $result = $template;
                    break;
                } else if ($template->default == 1) {
                    $result = $template;
                }

        return $result;
    }

    /**
     * Реляция. Возвращает темы, связанные со сборкой.
     * @param bool $result
     * @param bool $collection
     * @return Theme[]|ActiveRecords|ActiveQuery|null
     */
    public function getThemes($result = false, $collection = true)
    {
        return $this->relation(
            'themes',
            $this->hasMany(Theme::className(), ['buildId' => 'id']),
            $result,
            $collection
        );
    }

    /**
     * Возвращает экземпляр галереи для сборки.
     * @return Gallery
     */
    public function getGallery()
    {
        return new Gallery($this);
    }

    /**
     * Создает шаблон Bitrix, используемый сборкой.
     * @return bool
     */
    public function create()
    {
        if ($this->isNewRecord)
            return false;

        $directoryFrom = Core::getAlias('@intec/constructor/module/template');
        $directoryTo = $this->getDirectory();

        if (FileHelper::isDirectory($directoryTo))
            return false;

        if (!FileHelper::createDirectory($directoryTo, 0775, true))
            return false;

        $rules = [
            'ID' => $this->id,
            'CODE' => $this->code,
            'NAME' => $this->name
        ];

        $deploy = function ($directoryFrom, $directoryTo) use (&$deploy, &$rules) {
            $entries = FileHelper::getDirectoryEntries($directoryFrom, false);

            foreach ($entries as $entry) {
                $pathFrom = $directoryFrom.'/'.$entry;
                $pathTo = $directoryTo.'/'.$entry;

                if (FileHelper::isFile($pathFrom)) {
                    $data = FileHelper::getFileData($pathFrom);
                    $data = StringHelper::replaceMacros($data, $rules);

                    if (FileHelper::isFile($pathTo)) {
                        unlink($pathTo);
                    }

                    FileHelper::setFileData($pathTo, $data);
                } else if (FileHelper::isDirectory($pathFrom)) {
                    if (!FileHelper::isDirectory($pathTo))
                        FileHelper::createDirectory($pathTo, 0777, true);

                    if (FileHelper::isDirectory($pathTo))
                        $deploy($pathFrom, $pathTo);
                }
            }
        };

        $deploy($directoryFrom, $directoryTo);

        return true;
    }

    /**
     * Проверяет существование шаблона Bitrix.
     * @param bool $old
     * @return bool
     */
    public function isExists($old = false)
    {
        if ($this->isNewRecord)
            return false;

        $directory = $this->getDirectory($old);

        if ($directory === null)
            return false;

        return FileHelper::isDirectory($directory);
    }

    /**
     * Создает шаблон Bitrix, если его не существует.
     * @return bool
     */
    public function checkout()
    {
        if ($this->isExists()) {
            return true;
        }

        return $this->create();
    }

    /**
     * Удаляет файлы шаблона Bitrix.
     * @return bool
     */
    public function remove()
    {
        if ($this->isNewRecord)
            return false;

        $directory = $this->getDirectory(true);

        if ($this->isExists(true))
            FileHelper::removeDirectory($directory);

        return !FileHelper::isDirectory($directory);
    }

    /**
     * @inheritdoc
     */
    public function export()
    {
        $result = $this->toArray();

        unset($result['id']);
        unset($result['code']);

        $result['properties'] = [];
        $result['templates'] = [];
        $result['themes'] = [];
        $result['version'] = '1.0';

        /** @var ActiveRecords $properties */
        $properties = $this->getProperties(true);

        /** @var Property $property */
        foreach ($properties as $property)
            $result['properties'][] = $property->export();

        /** @var  $templates */
        $templates = $this->getTemplates(true);

        /** @var Template $template */
        foreach ($templates as $template)
            $result['templates'][] = $template->export();

        /** @var ActiveRecords $themes */
        $themes = $this->getThemes(true);

        /** @var Theme $theme */
        foreach ($themes as $theme)
            $result['themes'][] = $theme->export();

        return $result;
    }

    /**
     * Экспортирует сборку в Json строку.
     * @return string
     */
    public function exportToJson()
    {
        $result = ArrayHelper::convertEncoding(
            $this->export(),
            Encoding::UTF8,
            Core::$app->charset
        );

        return Json::encode($result);
    }

    /**
     * Экспортирует сборку в архив.
     * Помещает туда также шаблон Bitrix со всеми файлами.
     * @param $path
     * @return bool
     */
    public function exportToFile($path)
    {
        if (!extension_loaded('zip'))
            return false;

        $path = FileHelper::normalizePath($path);

        if (FileHelper::isFile($path))
            return false;

        $directory = FileHelper::getEntryDirectory($path);

        if (!FileHelper::isDirectory($directory))
            FileHelper::createDirectory($directory);

        if (!FileHelper::isDirectory($directory))
            return false;

        $archive = new ZipArchive();

        if (!$archive->open($path, ZipArchive::CREATE))
            return false;

        $archive->addFromString('build.json', $this->exportToJson());
        $directory = $this->getDirectory(true);

        $pack = function($prefix = null, $parent = null) use (&$pack, &$archive, $directory) {
            if ($parent !== null)
                $directory = $directory.DIRECTORY_SEPARATOR.$parent;

            $entries = FileHelper::getDirectoryEntries($directory, false);

            foreach ($entries as $entry) {
                $path = $directory.DIRECTORY_SEPARATOR.$entry;
                $pathRelative = $parent === null ? $entry : $parent.DIRECTORY_SEPARATOR.$entry;
                $pathLocal = $prefix === null ? $pathRelative : $prefix.DIRECTORY_SEPARATOR.$pathRelative;

                if (FileHelper::isFile($path)) {
                    $archive->addFile($path, $pathLocal);
                } else if (FileHelper::isDirectory($path)) {
                    $archive->addEmptyDir($pathLocal);
                    $pack($prefix, $pathRelative);
                }
            }
        };

        $pack('template');
        $archive->close();

        return true;
    }

    /**
     * @inheritdoc
     */
    public function import($data)
    {
        $dataProperties = ArrayHelper::getValue($data, 'properties');
        $dataTemplates = ArrayHelper::getValue($data, 'templates');
        $dataThemes = ArrayHelper::getValue($data, 'themes');

        unset($data['id']);
        unset($data['code']);
        unset($data['properties']);
        unset($data['templates']);
        unset($data['themes']);
        unset($data['version']);

        foreach ($this->attributes() as $attribute) {
            if ($attribute === 'id' || $attribute === 'code')
                continue;

            $this->setAttribute($attribute, null);
        }

        $this->load($data, '');

        if (!$this->validate())
            return false;

        $clean = [];
        $clean['properties'] = $this->getProperties(true);
        $clean['templates'] = $this->getTemplates(true);
        $clean['themes'] = $this->getThemes(true);

        foreach ($clean as $items) {
            foreach ($items as $item) {
                /** @var ActiveRecord $item */
                $item->delete();
            }
        }

        unset($clean);

        $this->save(false);

        $properties = [];
        $templates = [];
        $themes = [];

        if (Type::isArray($dataProperties))
            foreach ($dataProperties as $dataProperty) {
                $property = new Property();
                $property->buildId = $this->id;
                $property->populateRelation('enums', []);

                if ($property->import($dataProperty))
                    $properties[] = $property;
            }

        if (Type::isArray($dataTemplates))
            foreach ($dataTemplates as $dataTemplate) {
                $template = new Template();
                $template->buildId = $this->id;
                $template->populateRelation('containers', []);
                $template->populateRelation('values', []);

                if ($template->import($dataTemplate))
                    $templates[] = $template;
            }

        if (Type::isArray($dataThemes))
            foreach ($dataThemes as $dataTheme) {
                $theme = new Theme();
                $theme->buildId = $this->id;
                $theme->populateRelation('values', []);

                if ($theme->import($dataTheme))
                    $themes[] = $theme;
            }

        $this->populateRelation('properties', $properties);
        $this->populateRelation('templates', $templates);
        $this->populateRelation('themes', $themes);

        return true;
    }

    public function importFromJson($data)
    {
        try {
            $data = Json::decode($data);
        } catch (InvalidParamException $exception) {
            return false;
        }

        if (!Type::isArray($data))
            return false;

        $data = ArrayHelper::convertEncoding(
            $data,
            Core::$app->charset,
            Encoding::UTF8
        );

        return $this->import($data);
    }

    public function importFromFile($path, $directory)
    {
        if (!extension_loaded('zip'))
            return false;

        $path = FileHelper::normalizePath($path);

        if ($directory === null) {
            $directory = $path;
        } else {
            $directory = FileHelper::normalizePath($directory);
        }

        if (!FileHelper::isFile($path))
            return false;

        if (FileHelper::isDirectory($directory))
            return false;

        if (!FileHelper::createDirectory($directory))
            return false;

        $archive = new ZipArchive();

        if (!$archive->open($path)) {
            FileHelper::removeDirectory($directory);
            return false;
        }

        $archive->extractTo($directory);
        $archive->close();

        $pathData = $directory.DIRECTORY_SEPARATOR.'build.json';

        if (!FileHelper::isFile($pathData)) {
            FileHelper::removeDirectory($directory);
            return false;
        }

        $data = FileHelper::getFileData($pathData);
        $result = $this->importFromJson($data);

        if (!$result) {
            FileHelper::removeDirectory($directory);
            return false;
        }

        $directoryFromTemplate = $directory.DIRECTORY_SEPARATOR.'template';
        $directoryToTemplate = $this->getDirectory();

        if (FileHelper::isDirectory($directoryToTemplate))
            FileHelper::removeDirectory($directoryToTemplate);

        $result = rename($directoryFromTemplate, $directoryToTemplate);
        FileHelper::removeDirectory($directory);

        return $result;
    }
}