<?php
namespace intec\core\data\collections;

use intec\core\base\Collection;
use intec\core\helpers\Type;

class Strings extends Collection
{
    protected function verify($item) {
        return Type::isString($item);
    }

    /**
     * Объеденяет строку.
     *
     * @param string $glue
     * @return string
     */
    public function join($glue = '') {
        return implode($glue, $this->items);
    }
}