<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<div data-bind="{
    fade: function(){ return menu.tabs.active.get() === menu.tabs.list.text; },
    with: $root.settings.text
}">
    <div class="constructor-form">
        <div class="constructor-menu-left-title"><?= GetMessage('text.settings') ?></div>
        <div class="constructor-row">
            <div class="constructor-column-6">
                <div class="constructor-form-group">
                    <div class="constructor-form-label"><?= GetMessage('text.settings.size') ?></div>
                    <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                        <input type="text" class="constructor-input" data-bind="{ value: size.value }" />
                        <div class="constructor-input-wrapper">
                            <select class="constructor-input" data-bind="{
                                value: size.measure,
                                options: size.measures(),
                                bind: $root.bindings.styler
                            }"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="constructor-column-6">
                <div class="constructor-form-group">
                    <div class="constructor-form-label"><?= GetMessage('text.settings.color') ?></div>
                    <div class="constructor-form-content constructor-input-group constructor-colorpicker-wrap">
                        <div class="constructor-input-group-addon">
                            <div class="constructor-colorpicker-button constructor-vertical-middle" data-bind="{
                                bind: function(node, bindings){ $root.bindings.colorpicker(node, bindings, color) },
                                style: { backgroundColor: color }
                            }">
                                <div class="constructor-aligner"></div>
                                <i class="fa fa-eyedropper"></i>
                            </div>
                        </div>
                        <input type="text" class="constructor-input" data-bind="value: color">
                    </div>
                </div>
            </div>
            <div class="constructor-column-12">
                <div class="constructor-form-group">
                    <div class="constructor-form-label">
                        <label>
                            <input type="checkbox" data-ui-switch="{}" data-bind="{ checked: uppercase }" />
                            <span><?= GetMessage('text.settings.uppercase') ?></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="constructor-column-6">
                <div class="constructor-form-group">
                    <div class="constructor-form-label"><?= GetMessage('text.settings.letter.spacing') ?></div>
                    <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                        <input type="text" class="constructor-input" data-bind="{
                            value: letterSpacing.value
                        }" />
                        <div class="constructor-input-wrapper">
                            <select class="constructor-input" data-bind="{
                                value: letterSpacing.measure,
                                options: letterSpacing.measures(),
                                bind: $root.bindings.styler
                            }"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="constructor-column-6">
                <div class="constructor-form-group">
                    <div class="constructor-form-label"><?= GetMessage('text.settings.line.height') ?></div>
                    <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                        <input type="text" class="constructor-input" data-bind="{
                            value: lineHeight.value
                        }" />
                        <div class="constructor-input-wrapper">
                            <select class="constructor-input" data-bind="{
                                value: lineHeight.measure,
                                options: lineHeight.measures(),
                                bind: $root.bindings.styler
                            }"></select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ko function: $root.menu.scroll.update --><!-- /ko -->
</div>