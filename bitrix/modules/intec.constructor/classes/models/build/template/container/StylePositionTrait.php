<?php
namespace intec\constructor\models\build\template\container;

trait StylePositionTrait
{
    /**
     * Возвращает свойство position для css.
     * @return string
     */
    public function getStylePosition()
    {
        $parent = $this->getParent(true);

        if ($this->type == static::TYPE_ABSOLUTE) {
            $position = 'relative';
        } else {
            $position = null;
        }

        if ($parent)
            if ($parent->type == static::TYPE_ABSOLUTE)
                $position = 'absolute';

        return $position;
    }
}