<?php
namespace intec\core\data\collections;

use intec\core\base\Collection;
use intec\core\helpers\Type;

class Scalars extends Collection
{
    protected function verify($item) {
        return Type::isScalar($item);
    }
}