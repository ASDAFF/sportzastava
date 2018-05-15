<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use intec\core\helpers\JavaScript;

$colors = [
    '#f24841', '#00ad5d', '#00b7f4',
    '#4758a5', '#f655a0', '#7c7c7c',
    '#fa917a', '#c1de97', '#75cbc5',
    '#68cef8', '#6958a4', '#006756',
    '#c83f69', '#b29e8a', '#303f4c'
];
?>
<div data-bind="
    fade: function(){ return menu.tabs.active.get() === menu.tabs.list.scheme; }
 ">
    <div class="constructor-form">
        <div class="constructor-form-wrap">
            <div class="constructor-menu-left-title"><?= GetMessage('scheme.settings') ?></div>
            <div class="constructor-row">
                <div class="constructor-form-group">
                    <div class="constructor-form-label"><?= GetMessage('scheme.settings.theme') ?></div>
                    <div class="constructor-form-content">
                        <select class="constructor-input" data-bind="{
                           value: scheme.themes.selected,
                           options: scheme.themes,
                           optionsText: 'name',
                           bind: $root.bindings.styler
                        }"></select>
                    </div>
                </div>
            </div>
            <!-- ko with: scheme.themes.selected -->
                <div class="constructor-row">
                    <!-- ko foreach: $root.scheme.properties -->
                        <div class="constructor-property-wrapper">
                            <div class="constructor-form-group">
                                <div class="constructor-form-label">
                                    <div style="float: right;">
                                        <input type="checkbox" data-bind="{
                                            bind: ko.models.switch(),
                                            checked: active,
                                            click: function(){
                                                if (!active()) {
                                                    $parent.values.get(code(), true).value(null);
                                                }
                                                return true;
                                            }
                                        }" />
                                    </div>
                                    <span data-bind="text: name"></span>
                                </div>
                                <div class="constructor-form-content constructor-colors-list constructor-row" data-bind="{
                                    slide: active,
                                    with: $parent.values.get(code(), true)
                                }">
                                    <? foreach ($colors as $color) { ?>
                                        <div class="constructor-column-2">
                                            <div class="constructor-colorpicker-wrap">
                                                <div class="constructor-colorpicker-button constructor-vertical-middle" style="background: <?= $color ?>" data-bind="{
                                                    click: function(){ value('<?= $color ?>') },
                                                    css: value() == '<?= $color ?>' ? 'active' : ''
                                                }">
                                                    <div class="constructor-aligner"></div>
                                                    <i class="glyph-icon-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    <? } ?>
                                    <div class="constructor-column-2">
                                        <div class="constructor-colorpicker-wrap">
                                            <div class="constructor-colorpicker-button constructor-vertical-middle" data-bind="{
                                                bind: function(node, bindings){
                                                    $root.bindings.colorpicker(node, bindings, value);
                                                },
                                                style: { backgroundColor: value }
                                            }">
                                                <div class="constructor-aligner"></div>
                                                <i class="fa fa-eyedropper"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /ko -->
                </div>
            <!-- /ko -->
        </div>
    </div>
    <!-- ko function: $root.menu.scroll.update --><!-- /ko -->
</div>