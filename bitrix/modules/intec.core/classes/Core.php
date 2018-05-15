<?php
namespace intec;

require(__DIR__ . '/CoreBase.php');

use intec\core\CoreBase;
use intec\core\di\Container;
use intec\core\helpers\Encoding;

class Core extends CoreBase
{
}

spl_autoload_register(['intec\Core', 'autoload'], true, true);
Core::$classes = require(__DIR__.'/classes.php');
Core::$container = new Container();

global $DBType,
       $DBHost,
       $DBName,
       $DBLogin,
       $DBPassword;

(new core\base\Application([
    'id' => 'intec.core',
    'basePath' => $_SERVER['DOCUMENT_ROOT'],
    'charset' => Encoding::resolve(SITE_CHARSET),
    'components' => [
        'db' => [
            'dsn' => $DBType.':host='.$DBHost.';dbname='.$DBName,
            'username' => $DBLogin,
            'password' => $DBPassword,
            'charset' => Encoding::resolve(SITE_CHARSET, Encoding::TYPE_DATABASE)
        ]
    ]
]));

Core::setAlias('@bitrix', '@root'.BX_ROOT);
Core::setAlias('@modules', '@bitrix/modules');
Core::setAlias('@themes', '@bitrix/themes');
Core::setAlias('@templates', '@bitrix/templates');
Core::setAlias('@intec/core/module', dirname(__DIR__));
Core::setAlias('@intec/core/theme', '@themes/'.Core::$app->id);

require(__DIR__.'/web.php');