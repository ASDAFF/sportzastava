<?php
namespace intec\core\data\presets;

use intec\Core;
use intec\core\base\Collection;
use intec\core\base\NotSupportedException;
use intec\core\base\Object;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\FileHelper;

abstract class Presets extends Collection
{
    protected static $instance;

    /**
     * Возвращает директорию с пресетами.
     * @throws NotSupportedException
     * @return string
     */
    public static function getDirectory()
    {
        throw new NotSupportedException();
    }

    /**
     * Возвращает экземпляр коллекции.
     * @return Presets
     */
    public static function getInstance($refresh = false)
    {
        $refresh = $refresh || static::$instance === null;

        if ($refresh) {
            $instance = new static();
            $directory = static::getDirectory();
            $entries = FileHelper::getDirectoryEntries($directory, false, '/');

            foreach ($entries as $entry) {
                $path = $directory.'/'.$entry;

                if (FileHelper::isFile($path)) {
                    $preset = new Preset($path);
                    $instance->set($preset->code, $preset);
                }
            }

            static::$instance = $instance;
        }

        return static::$instance;
    }

    /**
     * @inheritdoc
     */
    public function verify($item)
    {
        return $item instanceof Preset;
    }
}