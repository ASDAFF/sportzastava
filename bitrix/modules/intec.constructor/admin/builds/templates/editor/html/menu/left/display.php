<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<div data-bind="{
    fade: function () { return menu.tabs.active.get() === menu.tabs.list.visual; }
}">
    <div class="constructor-form">
        <div class="constructor-form-wrap">
            <div class="constructor-menu-left-title"><?= GetMessage('display.settings') ?></div>
            <div class="constructor-row">
                <div class="constructor-form-group">
                    <div class="constructor-form-label"><?= GetMessage('display.settings.site') ?></div>
                    <div class="constructor-form-content">
                        <select class="constructor-input constructor-input-block" data-bind="{
                            value: $root.environment.site,
                            options: $root.environment.sites,
                            optionsText: function (site) { return '[' + site.id() + '] ' + site.name(); },
                            bind: $root.bindings.styler
                        }"></select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>