<?php

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

return [
    'settingsDisplay' => [
        'type' => 'list',
        'name' => Loc::getMessage('intec.universe.settings.settingsDisplay'),
        'default' => 'admin',
        'values' => [
            'none' => Loc::getMessage('intec.universe.settings.settingsDisplay.none'),
            'admin' => Loc::getMessage('intec.universe.settings.settingsDisplay.admin'),
            'all' => Loc::getMessage('intec.universe.settings.settingsDisplay.all')
        ]
    ]
];