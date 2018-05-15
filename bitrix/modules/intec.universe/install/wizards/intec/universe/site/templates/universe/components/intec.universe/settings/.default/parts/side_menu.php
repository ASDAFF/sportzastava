<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\constructor\models\build\Property;
use intec\constructor\models\build\Template;

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var array $property
 * @var array $group
 * @var string $propertyCode
 * @var string $templateFolder
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */
?>
<div class="universe-settings-item col-xs-12">
    <div class="universe-settings-item-title"><?= GetMessage('UNIVERSE_SETTINGS_SIDE_MENU_SETTINGS') ?></div>
    <div class="col-xs-12 universe-settings-side-menu-wrapper">
        <?php $APPLICATION->IncludeComponent(
            'bitrix:menu',
            '',
            array(
                'MAX_LEVEL' => '4',
                'USE_EXT' => 'Y',
                'DELAY' => 'N',
                'ROOT_MENU_TYPE' => $arParams['SIDE_MENU_ROOT_TYPE'],
                'CHILD_MENU_TYPE' => $arParams['SIDE_MENU_CHILD_TYPE'],
                'ALLOW_MULTI_SELECT' => 'Y',
                'MENU_CACHE_TYPE' => 'N',
                'MENU_CACHE_TIME' => '600',
                'MENU_CACHE_USE_GROUPS' => 'Y',
                'MENU_CACHE_GET_VARS' => '',
                'PROPERTY_CODE' => $propertyCode,
                'PROPERTY' => $property
            ),
            $component
        ); ?>
    </div>
</div>
