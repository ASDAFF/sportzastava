<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @global CMain $APPLICATION
 * @var string $sTemplateId
 */

?>
<?php if ($arParams['MENU_MAIN_DISPLAY'] == 'Y' && $arParams['MENU_MAIN_DISPLAY_IN'] == 'default') { ?>
    <div class="header-menu">
        <?php include('menu.component.php') ?>
    </div>
<?php } ?>