<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use intec\core\helpers\JavaScript;
use intec\constructor\structure\Widgets;

/**
 * @var Widgets $widgets
 */
?>
<div class="constructor-menu constructor-menu-left"
     data-bind="css: menu.tabs.active().length > 0 ? 'active' : ''">
    <div class="constructor-menu-wrap">
        <div class="nano" data-bind="bind: menu.scroll">
            <div class="nano-content">
                <? include('left/main.php') ?>
                <? include('left/container.php') ?>
                <? include('left/widget.php') ?>
                <? include('left/text.php') ?>
                <? include('left/scheme.php') ?>
                <? include('left/display.php') ?>

                <div data-bind="
                        with: $root.guides,
                        fade: function(){ return menu.tabs.active.get() === menu.tabs.list.guides; }
                     ">
                    <div class="constructor-form">
                        <div class="constructor-menu-left-title"><?= GetMessage('guides.settings') ?></div>
                        <div class="constructor-row">
                            <div class="constructor-column-12 no-select">
                                <div class="constructor-form-group">
                                    <div class="constructor-form-label">
                                        <?= GetMessage('guides.settings.columns') ?>
                                        <input type="checkbox"
                                               data-ui-switch="{}"
                                               data-bind="checked: columns.active" />
                                    </div>
                                </div>
                            </div>
                            <div class="constructor-clearfix" data-bind="slide: columns.active">
                                <div class="constructor-column-6">
                                    <div class="constructor-form-group">
                                        <div class="constructor-form-label"><?= GetMessage('guides.settings.columns.count') ?></div>
                                        <div class="constructor-form-content">
                                            <input type="text"
                                                   class="constructor-input"
                                                   data-bind="value: columns.count" />
                                        </div>
                                    </div>
                                </div>
                                <div class="constructor-column-6">
                                    <div class="constructor-form-group">
                                        <div class="constructor-form-label"><?= GetMessage('guides.settings.columns.space') ?></div>
                                        <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                            <input type="text"
                                                   class="constructor-input"
                                                   data-bind="value: columns.space.value" />
                                            <div class="constructor-input-wrapper">
                                                <select class="constructor-input"
                                                        data-bind="
                                                           value: columns.space.measure,
                                                           options: columns.space.measures(),
                                                           bind: $root.bindings.styler
                                                        "></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="constructor-column-12 no-select">
                                <div class="constructor-form-group">
                                    <div class="constructor-form-label">
                                        <?= GetMessage('guides.settings.rows') ?>
                                        <input type="checkbox"
                                               data-ui-switch="{}"
                                               data-bind="checked: rows.active" />
                                    </div>
                                </div>
                            </div>
                            <div class="constructor-clearfix" data-bind="slide: rows.active">
                                <div class="constructor-column-6">
                                    <div class="constructor-form-group">
                                        <div class="constructor-form-label"><?= GetMessage('guides.settings.rows.space') ?></div>
                                        <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                            <input type="text"
                                                   class="constructor-input"
                                                   data-bind="value: rows.space.value" />
                                            <div class="constructor-input-wrapper">
                                                <select class="constructor-input"
                                                        data-bind="
                                                           value: rows.space.measure,
                                                           options: rows.space.measures(),
                                                           bind: $root.bindings.styler
                                                        "></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ko function: $root.menu.scroll.update --><!-- /ko -->
                </div>
            </div>
        </div>
    </div>
</div>