<?php
namespace intec\core\data\collections;

use intec\core\base\Collection;
use intec\core\helpers\Type;

class Arrays extends Collection
{
    protected function verify($item) {
        return Type::isArray($item);
    }
}