<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
/**
 * @var array $directions
 * @var array $lang
 */
?>
<div id="addition-border">
    <!-- ko with: $root.selected -->
        <div class="constructor-row" data-bind="{ with: properties.border }">
            <table class="additional-settings" cellpadding="0" cellspacing="0" style="width: 420px;">
                <thead>
                    <tr>
                        <th></th>
                        <th style="width: 120px;"><?= GetMessage('container.settings.border.width') ?></th>
                        <th><?= GetMessage('container.settings.border.style') ?></th>
                        <th style="width: 110px;"><?= GetMessage('container.settings.border.color') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach ($directions as $direction) { ?>
                        <tr>
                            <td>
                                <div class="constructor-icon glyph-icon-arrow_padding_<?= $direction ?>"></div>
                            </td>
                            <td>
                                <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                    <input type="text"
                                        class="constructor-input"
                                        data-bind="{ value: <?= $direction ?>.width.value }"
                                    />
                                    <div class="constructor-input-wrapper">
                                        <select class="constructor-input" data-bind="{
                                            value: <?= $direction ?>.width.measure,
                                            options: <?= $direction ?>.width.measures(),
                                            bind: $root.bindings.styler
                                        }"></select>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <select class="constructor-input" data-bind="{
                                    value: <?= $direction ?>.style.value,
                                    options: <?= $lang['border'] ?>,
                                    optionsValue: 'key',
                                    optionsText: 'value',
                                    bind: $root.bindings.styler
                                }"></select>
                            </td>
                            <td>
                                <div class="constructor-form-content constructor-input-group constructor-colorpicker-wrap">
                                    <div class="constructor-input-group-addon">
                                        <div class="constructor-colorpicker-button constructor-vertical-middle" data-bind="{
                                            bind: function(node, bindings){ $root.bindings.colorpicker(node, bindings, <?= $direction ?>.color.value); },
                                            style: { backgroundColor: <?= $direction ?>.color.value }
                                        }">
                                            <div class="constructor-aligner"></div>
                                            <i class="fa fa-eyedropper"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="constructor-input"
                                        data-bind="{ value: <?= $direction ?>.color.value }"
                                    />
                                </div>
                            </td>
                        </tr>
                    <? } ?>
                </tbody>
            </table>
        </div>
    <!-- /ko -->
</div>