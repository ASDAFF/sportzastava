<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<div id="addition-border-radius" style="width: 220px;">
    <!-- ko with: $root.selected -->
        <div class="constructor-four-direction-settings constructor-row" data-bind="{ with: properties.border }">
            <div class="shared-icon constructor-vertical-middle"
                title="<?= GetMessage('button.share') ?>"
                data-bind="{
                    bind: $root.bindings.tooltip,
                    event: {click: function(){ radius.isShared(radius.isShared() ? 0 : 1) }},
                    css: radius.isShared() ? 'active' : ''
                }"
            >
                <i class="glyph-icon-linked"></i>
                <i class="glyph-icon-unlinked"></i>
            </div>
            <div class="constructor-column-5">
                <div class="constructor-form-group">
                    <div class="constructor-input-group">
                        <input type="text"
                            class="constructor-input"
                            data-bind="value: top.radius.value"
                        />
                        <div class="constructor-input-group-addon">
                            <div class="constructor-border-illustration border-top border-left" data-bind="{
                                style: { borderTopLeftRadius: top.radius.calculated }
                            }"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="constructor-column-5">
                <div class="constructor-form-group">
                    <div class="constructor-input-group">
                        <div class="constructor-input-group-addon">
                            <div class="constructor-border-illustration border-top border-right" data-bind="{
                                style: { borderTopRightRadius: right.radius.calculated }
                            }"></div>
                        </div>
                        <input type="text"
                            class="constructor-input"
                            data-bind="value: right.radius.value"
                        />
                    </div>
                </div>
            </div>
            <div class="constructor-column-5">
                <div class="constructor-form-group">
                    <div class="constructor-input-group">
                        <input type="text"
                            class="constructor-input"
                            data-bind="value: left.radius.value"
                        />
                        <div class="constructor-input-group-addon">
                            <div class="constructor-border-illustration border-bottom border-left" data-bind="{
                                style: { borderBottomLeftRadius: left.radius.calculated }
                            }"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="constructor-column-5">
                <div class="constructor-form-group">
                    <div class="constructor-input-group">
                        <div class="constructor-input-group-addon">
                            <div class="constructor-border-illustration border-bottom border-right" data-bind="{
                                style: { borderBottomRightRadius: bottom.radius.calculated }
                            }"></div>
                        </div>
                        <input type="text"
                            class="constructor-input"
                            data-bind="value: bottom.radius.value"
                        />
                    </div>
                </div>
            </div>
        </div>
    <!-- /ko -->
</div>