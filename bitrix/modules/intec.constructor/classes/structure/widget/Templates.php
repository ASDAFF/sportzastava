<?php
namespace intec\constructor\structure\widget;

use intec\core\base\Collection;

/**
 * Class Templates
 * @package intec\constructor\models\template
 */
class Templates extends Collection
{
    /**
     * @inheritdoc
     */
    protected function verify($item)
    {
        return $item instanceof Template;
    }
}