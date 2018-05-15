<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Encoding;
use intec\core\handling\Handler;
use intec\core\web\Request;
use intec\constructor\models\Build;

/**
 * @var Request $request
 * @var Build $build
 * @var mixed $response
 */

$action = $request->get('page');

if (empty($action))
    return;

$handler = new Handler(
    $build->getDirectory().DIRECTORY_SEPARATOR.'pages',
    'template\pages'
);

$handler->handle($action);