<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
/**
 * @var array $directions
 * @var array $lang
 */
?>
<div id="addition-background" style="width:300px;">
    <!-- ko with: $root.selected -->
        <div class="constructor-row" data-bind="{ with: properties.background }">
            <div class="constructor-form-group">
                <div class="constructor-form-label"><?= GetMessage('container.settings.background.repeat') ?></div>
                <div class="constructor-form-content">
                    <select class="constructor-input" data-bind="{
                        value: repeat,
                        options: <?= $lang['repeat'] ?>,
                        optionsValue: 'key',
                        optionsText: 'value',
                        bind: $root.bindings.styler
                    }">
                        <? foreach (['inherit', 'repeat', 'repeat-x', 'repeat-y', 'no-repeat'] as $value) { ?>
                            <option value="<?= $value ?>"><?= GetMessage('container.settings.background.repeat.'. $value) ?></option>
                        <? } ?>
                    </select>
                </div>
            </div>
            <? foreach (['top', 'left'] as $direction) { ?>
                <div class="constructor-column-6">
                    <div class="constructor-form-group">
                        <div class="constructor-form-label"><?= GetMessage('container.settings.background.position.'. $direction) ?></div>
                        <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                            <input type="text"
                                class="constructor-input"
                                data-bind="{ value: position.<?= $direction ?>.value }"
                            />
                            <div class="constructor-input-wrapper">
                                <select class="constructor-input" data-bind="{
                                    value: position.<?= $direction ?>.measure,
                                    options: position.<?= $direction ?>.measures(),
                                    bind: $root.bindings.styler
                                }"></select>
                            </div>
                        </div>
                    </div>
                </div>
            <? } ?>
            <div class="constructor-form-group">
                <div class="constructor-form-label">
                    <?= GetMessage('container.settings.background.size') ?>
                </div>
                <div class="constructor-form-content">
                    <select class="constructor-input" data-bind="{ value: size.type, bind: $root.bindings.styler }">
                        <? foreach (['auto', 'cover', 'contain', 'custom'] as $val) { ?>
                            <option value="<?= $val ?>"><?= GetMessage('container.settings.background.size.'. $val) ?></option>
                        <? } ?>
                    </select>
                </div>
            </div>
            <div data-bind="{ visible: size.type() == 'custom' }">
                <? foreach (['width', 'height'] as $axis) { ?>
                    <div class="constructor-column-6">
                        <div class="constructor-form-group" data-bind="{ with: size }">
                            <div class="constructor-form-label"><?= GetMessage('container.settings.background.size.'. $axis) ?></div>
                            <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: <?= $axis ?>.value }"
                                />
                                <div class="constructor-input-wrapper">
                                    <select class="constructor-input" data-bind="{
                                        value: <?= $axis ?>.measure,
                                        options: <?= $axis ?>.measures(),
                                        bind: $root.bindings.styler
                                    }"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    <!-- /ko -->
</div>
