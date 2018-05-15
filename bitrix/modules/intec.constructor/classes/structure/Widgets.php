<?php
namespace intec\constructor\structure;

use intec\Core;
use intec\core\base\Collection;
use intec\core\helpers\FileHelper;

/**
 * Class Widgets
 * @package intec\constructor\models\template
 */
class Widgets extends Collection
{
    protected static $cache = null;

    /**
     * @return string
     */
    public static function getDirectory()
    {
        return Core::getAlias('@widgets');
    }

    /**
     * @param bool $collection
     * @param bool $refresh
     * @return Widgets|Widget[]
     */
    public static function all($collection = true, $refresh = false)
    {
        $directory = static::getDirectory();

        if (static::$cache === null || $refresh) {
            $result = [];
            $authors = FileHelper::getDirectoryEntries($directory, false);

            foreach ($authors as $author) {
                $path = $directory.DIRECTORY_SEPARATOR.$author;
                $widgets = FileHelper::getDirectoryEntries($path, false);

                foreach ($widgets as $widget) {
                    $path = $directory.DIRECTORY_SEPARATOR.$author.DIRECTORY_SEPARATOR.$widget;
                    $widget = new Widget($path);
                    $result[$widget->getCode()] = $widget;
                }
            }

            static::$cache = $result;
        }

        if ($collection) {
            return new static(static::$cache);
        }
        return static::$cache;
    }

    /**
     * @inheritdoc
     */
    protected function verify($item = [])
    {
        return $item instanceof Widget;
    }
}