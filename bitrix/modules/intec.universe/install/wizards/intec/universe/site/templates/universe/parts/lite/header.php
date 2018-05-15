<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use intec\Core;
use intec\core\base\Collection;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\RegExp;
use intec\constructor\models\build\Template;

global $displayMenu;
global $displayBackground;

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global Collection $settings
 * @global Template $template
 */

$page = $APPLICATION->GetCurPage(false);
$displayMenu = $settings->get('menu_display') === 'Y';
$displayBreadcrumb = $page !== SITE_DIR;
$displayHeader = $page !== SITE_DIR && !RegExp::isMatchBy('/^'.RegExp::escape(SITE_DIR).'services\//i', $page);
$displayBasket = $settings->get('use_basket') === true;
$displayBasket = ArrayHelper::isIn($settings['template_menu'], [2,3,7,8,9,10,12]) && $displayBasket;
$displayBackground = $settings->get('show_bg') === true;

?>
<div class="intec-template">
    <?php if ($displayBackground) { ?>
        <div class="intec-content intec-content-visible intec-background">
            <div class="intec-content-wrapper">
    <?php } ?>
    <div class="intec-template-content">
        <div style="margin-bottom: 30px;">
            <?php $APPLICATION->ShowPanel(); ?>
            <?php if ($displayBasket) { ?>
                <?php $APPLICATION->IncludeComponent(
                    'bitrix:main.include',
                    '.default',
                    array(
                        'AREA_FILE_SHOW' => 'file',
                        'PATH' => SITE_DIR.'/include/header/basket.php'
                    ),
                    false,
                    array('HIDE_ICONS' => 'Y')
                ); ?>
            <?php } ?>
            <?php $APPLICATION->IncludeComponent(
                'bitrix:main.include',
                '.default',
                array(
                    'AREA_FILE_SHOW' => 'file',
                    'PATH' => SITE_DIR.'/include/header/base.php'
                ),
                false,
                array('HIDE_ICONS' => 'Y')
            ); ?>
            <?php if ($displayBreadcrumb) { ?>
                <div style="margin-top: 20px; padding-top: 10px; padding-bottom: 11px">
                    <?php $APPLICATION->IncludeComponent(
                        'bitrix:main.include',
                        '.default',
                        array(
                            'AREA_FILE_SHOW' => 'file',
                            'PATH' => SITE_DIR.'/include/header/breadcrumb.php'
                        ),
                        false,
                        array('HIDE_ICONS' => 'Y')
                    ); ?>
                </div>
            <?php } ?>
            <?php if ($displayHeader) { ?>
                <div style="padding-bottom: 30px">
                    <div class="intec-content">
                        <div class="intec-content-wrapper">
                            <h1 style="margin: 0">
                                <?php $APPLICATION->ShowTitle(false) ?>
                            </h1>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($displayMenu) { ?>
                <div class="intec-content intec-content-visible">
                    <div class="intec-content-wrapper">
                        <div class="intec-content-left">
                            <?php $APPLICATION->IncludeComponent(
                                'bitrix:main.include',
                                '.default',
                                array(
                                    'AREA_FILE_SHOW' => 'file',
                                    'PATH' => SITE_DIR.'/include/header/menu.php'
                                ),
                                false,
                                array('HIDE_ICONS' => 'Y')
                            ); ?>
                        </div>
                        <div class="intec-content-right">
                            <div class="intec-content-right-wrapper">
            <?php } ?>