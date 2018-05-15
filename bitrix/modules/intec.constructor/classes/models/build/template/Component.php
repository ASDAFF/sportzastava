<?php
namespace intec\constructor\models\build\template;
IncludeModuleLangFile(__FILE__);

use intec\core\db\ActiveRecord;
use intec\core\db\ActiveQuery;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Json;

/**
 * Class Component
 * @package intec\constructor\models\build\template
 */
class Component extends Element
{
    /**
     * @var array
     */
    protected static $cache = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'constructor_builds_templates_components';
    }

    /**
     * Отрисовывает виджет.
     * @param bool $out
     * @return null|string
     */
    public function render($out = false)
    {
        /** @var \CMain $APPLICATION */
        global $APPLICATION;

        $result = null;

        if (!$out)
            ob_start();

        $APPLICATION->IncludeComponent(
            $this->code,
            $this->template,
            $this->properties,
            false,
            array(
                'HIDE_ICON' => 'Y'
            ));

        if (!$out) {
            $result = ob_get_contents();
            ob_end_clean();
        }

        return $result;
    }
}