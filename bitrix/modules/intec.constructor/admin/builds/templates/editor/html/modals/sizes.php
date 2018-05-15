<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<div id="addition-sizes">
    <!-- ko with: $root.selected -->
        <div class="constructor-row" data-bind="{ with: properties }">
            <table class="additional-settings" cellpadding="0" cellspacing="0" style="width: 320px;">
                <thead>
                    <tr>
                        <th></th>
                        <th><?= GetMessage('container.settings.min') ?></th>
                        <th><?= GetMessage('container.settings.max') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach (['width', 'height'] as $size) { ?>
                        <tr>
                            <td><i class="glyph-icon-size_<?= $size ?>"></i></td>
                            <td>
                                <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                    <input type="text"
                                        class="constructor-input"
                                        data-bind="{ value: <?= $size ?>.min.value }"
                                    />
                                    <div class="constructor-input-wrapper">
                                        <select class="constructor-input" data-bind="{
                                            value: <?= $size ?>.min.measure,
                                            options: <?= $size ?>.min.measures(),
                                            bind: $root.bindings.styler
                                        }"></select>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                    <input type="text"
                                        class="constructor-input"
                                        data-bind="{ value: <?= $size ?>.max.value }"
                                    />
                                    <div class="constructor-input-wrapper">
                                        <select class="constructor-input" data-bind="{
                                            value: <?= $size ?>.max.measure,
                                            options: <?= $size ?>.max.measures(),
                                            bind: $root.bindings.styler
                                        }"></select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <? } ?>
                </tbody>
            </table>
        </div>
    <!-- /ko -->
</div>