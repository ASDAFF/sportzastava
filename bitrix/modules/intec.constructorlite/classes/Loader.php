<?php
use Bitrix\Main\Loader;
use intec\Core;

if (Loader::includeModule('intec.core') && !Loader::includeModule('intec.constructor')) {
    Core::setAlias('@widgets', '@bitrix/widgets');
    Core::setAlias('@intec/constructor', __DIR__);
    Core::setAlias('@intec/constructor/module', dirname(__DIR__));
    Core::setAlias('@intec/constructor/theme', '@themes/intec.constructor');
}