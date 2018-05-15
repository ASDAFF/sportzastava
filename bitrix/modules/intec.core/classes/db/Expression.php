<?php
namespace intec\core\db;

use intec\core\base\Object;

/**
 * Class Expression
 * @package intec\core\db
 * @since 1.0.0
 */
class Expression extends Object
{
    /**
     * @var string
     * @since 1.0.0
     */
    public $expression;
    /**
     * @var array
     * @since 1.0.0
     */
    public $params = [];


    /**
     * Constructor.
     * @param string $expression
     * @param array $params
     * @param array $config
     * @since 1.0.0
     */
    public function __construct($expression, $params = [], $config = [])
    {
        $this->expression = $expression;
        $this->params = $params;
        parent::__construct($config);
    }

    /**
     * @return string
     * @since 1.0.0
     */
    public function __toString()
    {
        return $this->expression;
    }
}
