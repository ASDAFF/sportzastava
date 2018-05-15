<?php
use Bitrix\Main\Loader;
use intec\Core;

if (Loader::includeModule('intec.core')) {
    Core::setAlias('@widgets', '@bitrix/widgets');
    Core::setAlias('@intec/constructor', __DIR__);
    Core::setAlias('@intec/constructor/module', dirname(__DIR__));
    Core::setAlias('@intec/constructor/theme', '@themes/intec.constructor');

    require(__DIR__.'/web.php');
}