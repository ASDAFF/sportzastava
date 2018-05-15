<?php
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;
use intec\constructor\models\Build;
use intec\constructor\models\build\Template;
use intec\constructor\structure\Widget;

/**
 * @var array $properties
 * @var array $data
 * @var Build $build
 * @var Template $template
 * @var Widget $this
 */

$data['type'] = ArrayHelper::getValue($properties, 'type');
$data['type'] = ArrayHelper::fromRange(['image', 'text'], $data['type']);

if ($data['type'] == 'image') {
    $image = ArrayHelper::getValue($properties, 'image');

    if (!Type::isArray($image))
        $image = [];

    $data['image'] = ArrayHelper::merge([
        'url' => null,
        'width' => [
            'value' => null,
            'measure' => 'px'
        ],
        'height' => [
            'value' => null,
            'measure' => 'px'
        ],
        'proportions' => false
    ], $image);

    foreach (['width', 'height'] as $dimension) {
        if (empty($data['image'][$dimension]['value'])) {
            $data['image'][$dimension] = '100%';
        } else {
            $data['image'][$dimension] = $data['image'][$dimension]['value'].$data['image'][$dimension]['measure'];
        }
    }

    if (!empty($data['image']['url'])) {
        $data['image']['url'] = StringHelper::replaceMacros($data['image']['url'], [
            'TEMPLATE' => $build->getDirectory(false, true, '/')
        ]);
    }

    $image['proportions'] = Type::toBoolean($image['proportions']);
} else {
    $data['text'] = ArrayHelper::getValue($properties, 'text');
}