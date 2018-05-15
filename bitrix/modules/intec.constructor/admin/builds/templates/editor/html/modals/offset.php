<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
/**
 * @var array $directions
 */
?>
<div id="addition-offset" style="width: 350px;">
    <!-- ko with: $root.selected -->
        <!-- ko with: properties -->
            <div class="constructor-form-label">
                <?= GetMessage('container.settings.positioning') ?>
            </div>
            <div class="constructor-four-direction-settings constructor-position-settings constructor-row">
                <? foreach ($directions as $direction) { ?>
                    <div class="constructor-column-5">
                        <div class="constructor-form-group">
                            <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                <div class="constructor-input-group-addon constructor-input-group-without-bg">
                                    <div class="glyph-icon-arrow_offset_<?= $direction ?>"></div>
                                </div>
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: <?= $direction ?>.value }"
                                />
                                <div class="constructor-input-wrapper">
                                    <select class="constructor-input" data-bind="{
                                        value: <?= $direction ?>.measure,
                                        options: <?= $direction ?>.measures(),
                                        bind: $root.bindings.styler
                                    }"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
                <!-- ko function: intec.ui.update --><!-- /ko -->
            </div>
            <div class="constructor-form-label"><?= GetMessage('container.settings.margin') ?></div>
            <div class="constructor-four-direction-settings constructor-row">
                <div class="shared-icon constructor-vertical-middle"
                    title="<?= GetMessage('button.share') ?>"
                    data-bind="{
                        bind: $root.bindings.tooltip,
                        event: {click: function(){ margin.isShared(margin.isShared() ? 0 : 1) }},
                        css: margin.isShared() ? 'active' : ''
                    }">
                    <i class="glyph-icon-linked"></i>
                    <i class="glyph-icon-unlinked"></i>
                </div>
                <? foreach ($directions as $direction) { ?>
                    <div class="constructor-column-5">
                        <div class="constructor-form-group">
                            <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                <div class="constructor-input-group-addon">
                                    <div class="constructor-icon glyph-icon-arrow_margin_<?= $direction ?>"></div>
                                </div>
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: margin.<?= $direction ?>.value }"
                                />
                                <div class="constructor-input-wrapper">
                                    <select class="constructor-input" data-bind="{
                                        value: margin.<?= $direction ?>.measure,
                                        options: margin.<?= $direction ?>.measures(),
                                        bind: $root.bindings.styler
                                    }"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
            <div class="constructor-form-label" style="margin-top: 10px;">
                <?= GetMessage('container.settings.padding') ?>
            </div>
            <div class="constructor-four-direction-settings constructor-row">
                <div class="shared-icon constructor-vertical-middle"
                    title="<?= GetMessage('button.share') ?>"
                    data-bind="{
                        bind: $root.bindings.tooltip,
                        event: {click: function(){ padding.isShared(padding.isShared() ? 0 : 1) }},
                        css: padding.isShared() ? 'active' : ''
                    }">
                    <i class="glyph-icon-linked"></i>
                    <i class="glyph-icon-unlinked"></i>
                </div>
                <? foreach ($directions as $direction) { ?>
                    <div class="constructor-column-5">
                        <div class="constructor-form-group">
                            <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                <div class="constructor-input-group-addon">
                                    <div class="constructor-icon glyph-icon-arrow_padding_<?= $direction ?>"></div>
                                </div>
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: padding.<?= $direction ?>.value }"
                                />
                                <div class="constructor-input-wrapper">
                                    <select class="constructor-input" data-bind="{
                                        value: padding.<?= $direction ?>.measure,
                                        options: padding.<?= $direction ?>.measures(),
                                        bind: $root.bindings.styler
                                }"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        <!-- /ko -->
    <!-- /ko -->
</div>