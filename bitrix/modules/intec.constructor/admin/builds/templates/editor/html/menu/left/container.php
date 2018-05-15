<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $lang
 */
?>
<div data-bind="{
    fade: function(){ return menu.tabs.active.get() === menu.tabs.list.container; },
    with: $root.selected
}">
    <div class="constructor-form">
        <div class="constructor-form-wrap">
            <div class="constructor-menu-left-title">
                <?= GetMessage('container.settings') ?>
            </div>
            <div class="constructor-form-component-settings" data-bind="{ visible: !hasEmptyComponent() }">
                <span class="glyph-icon-settings show-additional-modal"
                    style="cursor: pointer;"
                    title="<?=GetMessage('widget.settings')?>"
                    data-bind="{
                        click: $root.dialogs.list.componentProperties.open,
                        bind: $root.bindings.tooltip
                    }"
                ></span>
            </div>
            <div class="constructor-form-component-settings" data-bind="{ visible: hasWidget() }">
                <span class="glyph-icon-settings show-additional-modal"
                    style="cursor: pointer;"
                    title="<?=GetMessage('widget.settings')?>"
                    data-bind="{
                        click: function () {
                            $root.menu.tabs.open($root.menu.tabs.list.widget)
                        },
                        bind: $root.bindings.tooltip
                    }"
                ></span>
            </div>
            <div class="constructor-row">
                <div class="constructor-form-group" data-bind="{
                    visible: !hasComponent() || !hasWidget()
                }">
                    <div class="constructor-form-label">
                        <?= GetMessage('container.settings.type') ?>
                    </div>
                    <div class="constructor-form-content">
                        <select class="constructor-input constructor-input-block" data-bind="{
                            value: type,
                            options: <?= $lang['type'] ?>,
                            optionsValue: 'key',
                            optionsText: 'value',
                            bind: $root.bindings.styler
                        }"></select>
                    </div>
                </div>
            </div>
            <div class="constructor-row">
                <div class="constructor-form-group" data-bind="{
                    visible: type() == 'normal'
                }">
                    <div class="constructor-form-label">
                        <?= GetMessage('container.settings.float') ?>
                    </div>
                    <div class="constructor-form-content">
                        <select class="constructor-input constructor-input-block" data-bind="{
                            value: properties.float,
                            options: <?= $lang['float'] ?>,
                            optionsValue: 'key',
                            optionsText: 'value',
                            bind: $root.bindings.styler
                        }"></select>
                    </div>
                </div>
            </div>
            <div class="constructor-row">
                <div class="constructor-form-group">
                    <div class="constructor-form-label">
                        <span style="float:right;" data-bind="{ text: properties.getOpacityPercent() }"></span>
                        <span>
                            <?= GetMessage('container.settings.opacity') ?>
                        </span>
                    </div>
                    <div class="constructor-form-content">
                        <div data-bind="{
                            bind: function (node, bindings) {
                                $root.bindings.slider(node, bindings, properties.opacity, 0, 1, 0.01);
                            }
                        }"></div>
                    </div>
                </div>
            </div>
            <div class="constructor-row" data-bind="{ if: hasParent() }">
                <div class="constructor-form-group">
                    <div class="constructor-form-label">
                        <label>
                            <span style="margin-right: 10px;">
                                <input type="checkbox" data-bind="{
                                    bind: ko.models.switch(),
                                    checked: display
                                }" />
                            </span>
                            <span><?= GetMessage('container.settings.display') ?></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="constructor-row" data-bind="{ if: hasParent() }">
                <div class="constructor-form-group">
                    <div class="constructor-button constructor-button-block constructor-button-blue constructor-button-size-2 constructor-button-font-16"
                        data-bind="{ click: $root.dialogs.list.conditions.open }"
                        style="text-align: center;"
                    ><?= GetMessage('container.settings.conditions') ?></div>
                </div>
            </div>
            <div class="constructor-row">
                <div class="constructor-form-group">
                    <div class="constructor-button constructor-button-block constructor-button-blue constructor-button-size-2 constructor-button-font-16" data-bind="{
                        click: function () {
                            $root.dialogs.list.script.open($data);
                        }
                    }" style="text-align: center;">
                        <?= GetMessage('container.settings.script') ?>
                    </div>
                </div>
            </div>
        </div>
        <div data-bind="{
            bind: function (node, bindings) {
                $root.bindings.accordion(node, bindings, {
                    header: '> .constructor-property-wrapper > .constructor-property-title',
                    classes: {
                        'ui-accordion-header': 'constructor-property-title'
                    },
                    activate: function (event, ui) {
                        $root.menu.scroll.update();
                        $('> .nano-content', $root.menu.scroll()).scrollTo($(ui.newHeader), 300);
                    }
                });
            }
        }">
            <div class="constructor-property-wrapper">
                <div class="constructor-property-title">
                    <?= GetMessage('container.settings.attributes') ?>
                </div>
                <div class="constructor-row">
                    <div class="constructor-form-group">
                        <div class="constructor-form-label">
                            <?= GetMessage('container.settings.id') ?>
                        </div>
                        <div class="constructor-form-content">
                            <input type="text"
                               class="constructor-input"
                               data-bind="{ value: properties.id }"
                            />
                        </div>
                    </div>
                    <div class="constructor-form-group">
                        <div class="constructor-form-label">
                            <?= GetMessage('container.settings.class') ?>
                        </div>
                        <div class="constructor-form-content">
                            <input type="text"
                                class="constructor-input"
                                data-bind="{ value: properties.class }"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="constructor-property-wrapper">
                <div class="constructor-property-title">
                    <?= GetMessage('container.settings.sizes') ?>
                    <span class="glyph-icon-settings show-additional-modal" data-bind="{
                        bind: function (node, bindings) {
                            $root.bindings.showAdditional(node, bindings, '#addition-sizes');
                        }
                    }"></span>
                </div>
                <div class="constructor-row">
                    <div class="constructor-column-6">
                        <div class="constructor-form-group" data-bind="{
                            visible: !properties.bind.horizontal()
                        }">
                            <div class="constructor-form-label">
                                <?= GetMessage('container.settings.width') ?>
                            </div>
                            <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: properties.width.value }"
                                />
                                <div class="constructor-input-wrapper">
                                    <select class="constructor-input" data-bind="{
                                        value: properties.width.measure,
                                        options: properties.width.measures(),
                                        bind: $root.bindings.styler
                                    }"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="constructor-column-6">
                        <div class="constructor-form-group"
                             data-bind="{ visible: !properties.bind.vertical() }">
                            <div class="constructor-form-label">
                                <?= GetMessage('container.settings.height') ?>
                            </div>
                            <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: properties.height.value }"
                                />
                                <div class="constructor-input-wrapper">
                                    <select class="constructor-input" data-bind="{
                                        value: properties.height.measure,
                                        options: properties.height.measures(),
                                        bind: $root.bindings.styler
                                    }"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="constructor-property-wrapper" data-bind="{
                with: properties,
                visible: type() == 'absolute'
            }">
                <div class="constructor-property-title">
                    <?= GetMessage('container.settings.grid') ?>
                </div>
                <div>
                    <div class="constructor-radius-input-group">
                        <? foreach (['none', 'adaptive', 'fixed'] as $value) { ?>
                            <label class="no-select">
                                <input type="radio"
                                    class="constructor-radio"
                                    value="<?= $value ?>"
                                    data-ui-switch="{ classes: { wrap: 'api-ui-switch api-ui-radio' } }"
                                    data-bind="{ checked: grid.type }"
                                />
                                <?= GetMessage('container.settings.grid.type.' . $value) ?>
                            </label>
                        <? } ?>
                    </div>
                    <div class="constructor-form-group" data-bind="{ visible: grid.type() == 'adaptive' }">
                        <div class="constructor-form-content constructor-row">
                            <div class="constructor-column-5">
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: grid.x }"
                                />
                            </div>
                            <div class="constructor-column-2 constructor-column-separator">x</div>
                            <div class="constructor-column-5">
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: grid.y }"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="constructor-form-group" data-bind="{ visible: grid.type() == 'fixed' }">
                        <div class="constructor-form-content constructor-row">
                            <div class="constructor-column-5">
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: grid.width }"
                                />
                            </div>
                            <div class="constructor-column-2 constructor-column-separator">x</div>
                            <div class="constructor-column-5">
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: grid.height }"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="constructor-form-label-list"
                         data-bind="{ visible: grid.type() !== 'none' }">
                        <div class="constructor-form-label">
                            <input type="checkbox"
                                data-ui-switch="{}"
                                data-bind="{ checked: grid.correct.width }"
                            />
                            <span>
                                <?= GetMessage('container.settings.grid.correct.width') ?>
                            </span>
                        </div>
                        <div class="constructor-form-label">
                            <input type="checkbox"
                                data-ui-switch="{}"
                                data-bind="{ checked: grid.correct.height }"
                            />
                            <span>
                                <?= GetMessage('container.settings.grid.correct.height') ?>
                            </span>
                        </div>
                    </div>
                    <!-- ko function: intec.ui.update --><!-- /ko -->
                </div>
            </div>
            <div class="constructor-property-wrapper" data-bind="{ with: properties }">
                <div class="constructor-property-title">
                    <?= GetMessage('container.settings.offset') ?>
                    <span class="glyph-icon-settings show-additional-modal" data-bind="{
                        bind: function (node, bindings) {
                            $root.bindings.showAdditional(node, bindings, '#addition-offset');
                        }
                    }"></span>
                </div>
                <div class="constructor-row">
                    <div class="constructor-form-group">
                        <div class="constructor-form-label">
                            <?= GetMessage('container.settings.margin') ?>
                            <span style="margin-left: 5px;"
                                title="<?= GetMessage('container.settings.margin.auto') ?>"
                                data-bind="{ bind: $root.bindings.tooltip }"
                            >
                                <input type="checkbox"
                                    data-ui-switch="{}"
                                    data-bind="{ checked: margin.isAuto }"
                                />
                            </span>
                        </div>
                        <div data-bind="{ slide: function () { return !margin.isAuto(); } }">
                            <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: margin.value }"
                                />
                                <div class="constructor-input-wrapper">
                                    <select class="constructor-input" data-bind="{
                                        value: margin.measure,
                                        options: margin.measures(),
                                        bind: $root.bindings.styler
                                    }"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="constructor-form-group">
                        <div class="constructor-form-label">
                            <?= GetMessage('container.settings.padding') ?>
                        </div>
                        <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                            <input type="text"
                                class="constructor-input"
                                data-bind="{ value: padding.value }"
                            />
                            <div class="constructor-input-wrapper">
                                <select class="constructor-input" data-bind="{
                                    value: padding.measure,
                                    options: padding.measures(),
                                    bind: $root.bindings.styler
                                }"></select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="constructor-property-wrapper" data-bind="{ with: properties.background }">
                <div class="constructor-property-title">
                    <?= GetMessage('container.settings.background') ?>
                    <span class="glyph-icon-settings show-additional-modal" data-bind="{
                        bind: function (node, bindings) {
                            $root.bindings.showAdditional(node, bindings, '#addition-background');
                        }
                    }"></span>
                </div>
                <div>
                    <div class="constructor-row">
                        <div class="constructor-form-group">
                            <div class="constructor-form-label"><?= GetMessage('container.settings.background.color') ?></div>
                            <div class="constructor-form-content constructor-input-group constructor-colorpicker-wrap">
                                <div class="constructor-input-group-addon">
                                    <div class="constructor-colorpicker-button constructor-vertical-middle" data-bind="{
                                        bind: function (node, bindings) {
                                            $root.bindings.colorpicker(node, bindings, color);
                                        },
                                        style: { backgroundColor: color }
                                    }">
                                        <div class="constructor-aligner"></div>
                                        <i class="fa fa-eyedropper"></i>
                                    </div>
                                </div>
                                <input type="text"
                                    class="constructor-input constructor-colorpicker-input"
                                    data-bind="{ value: color }"
                                />
                            </div>
                        </div>
                        <div class="constructor-form-group">
                            <div class="constructor-form-label">
                                <?= GetMessage('container.settings.background.image') ?>
                            </div>
                            <div class="constructor-form-content constructor-settings-background-image-wrapper" style="text-align: center;">
                                <div class="constructor-button constructor-button-block constructor-button-blue constructor-button-size-2 constructor-button-font-16"
                                    onclick="$(this).parent().find('.constructor-image-chooser').trigger('click')"
                                ><?= GetMessage('container.settings.background.image.load') ?></div>
                                <div class="constructor-button constructor-button-block constructor-button-blue constructor-button-size-2 constructor-button-font-16"
                                    data-bind="{ click: function () {
                                        $root.dialogs.list.gallery.open(function (data) {
                                            image.url(data.value);
                                            return true;
                                        });
                                    }}"
                                ><?= GetMessage('container.settings.background.image.gallery') ?></div>
                                <input class="constructor-image-chooser" type="file" accept="image/*"
                                    data-bind="{ event: { change: image.load } }"
                                />
                                <div class="constructor-background-image-wrapper"
                                     data-bind="css: {'has-image': image.url}">
                                    <div class="constructor-background-image" data-bind="{
                                        style: {
                                            backgroundImage: image.calculated,
                                            backgroundRepeat: repeat,
                                            backgroundSize: getSize(),
                                            backgroundPosition: position.calculated
                                        }
                                    }"></div>
                                </div>
                                <div style="text-align: left;">
                                    <input type="text"
                                        class="constructor-input"
                                        style="width: 100%;"
                                        placeholder="<?= GetMessage('container.settings.background.image.url.placeholder') ?>"
                                        data-bind="{ value: image.url }"
                                    />
                                </div>
                                <div class="constructor-button constructor-button-default constructor-button-size-2 constructor-button-font-16" data-bind="{
                                    click: image.delete
                                }"><?= GetMessage('container.settings.background.image.delete') ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="constructor-property-wrapper" data-bind="{ with: properties.border }">
                <div class="constructor-property-title">
                    <?= GetMessage('container.settings.border') ?>
                    <span class="glyph-icon-settings show-additional-modal" data-bind="{
                        bind: function (node, bindings) {
                            $root.bindings.showAdditional(node, bindings, '#addition-border');
                        }
                    }"></span>
                </div>
                <div class="constructor-row">
                    <div class="constructor-column-6">
                        <div class="constructor-form-group">
                            <div class="constructor-form-label"><?= GetMessage('container.settings.border.width') ?></div>
                            <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: width.value }"
                                />
                                <div class="constructor-input-wrapper">
                                    <select class="constructor-input" data-bind="{
                                        value: width.measure,
                                        options: width.measures(),
                                        bind: $root.bindings.styler
                                    }"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="constructor-column-6">
                        <div class="constructor-form-group">
                            <div class="constructor-form-label"><?= GetMessage('container.settings.border.color') ?></div>
                            <div class="constructor-form-content constructor-input-group constructor-colorpicker-wrap">
                                <div class="constructor-input-group-addon">
                                    <div class="constructor-colorpicker-button constructor-vertical-middle" data-bind="{
                                        bind: function(node, bindings){
                                            $root.bindings.colorpicker(node, bindings, color);
                                        },
                                        style: { backgroundColor: color }
                                    }">
                                        <div class="constructor-aligner"></div>
                                        <i class="fa fa-eyedropper"></i>
                                    </div>
                                </div>
                                <input type="text"
                                    class="constructor-input"
                                    data-bind="{ value: color }"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="constructor-column-12">
                        <div class="constructor-form-group">
                            <div class="constructor-form-label">
                                <?= GetMessage('container.settings.border.style') ?>
                            </div>
                            <div class="constructor-form-content">
                                <select class="constructor-input" data-bind="{
                                    value: style,
                                    options: <?= $lang['border'] ?>,
                                    optionsValue: 'key',
                                    optionsText: 'value',
                                    bind: $root.bindings.styler
                                }"></select>
                            </div>
                        </div>
                    </div>
                    <div class="constructor-column-12">
                        <div class="constructor-form-group">
                            <div class="constructor-form-label">
                                <?= GetMessage('container.settings.border.radius.title') ?>
                                <span class="glyph-icon-settings show-additional-modal" data-bind="{
                                    bind: function (node, bindings) {
                                        $root.bindings.showAdditional(node, bindings, '#addition-border-radius');
                                    }
                                }"></span>
                            </div>
                            <div class="constructor-border-radius-line-wrap constructor-clearfix">
                                <i class="constructor-icon glyph-icon-squere_evolution"></i>
                                <div class="constructor-border-radius-global-value" data-bind="{
                                    text: radius.print
                                }"></div>
                                <div data-bind="{
                                    bind: function (node, bindings) {
                                        $root.bindings.slider(node, bindings, radius.value, 0, 100, 1);
                                    }
                                }"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="constructor-property-wrapper">
                <div class="constructor-property-title">
                    <?= GetMessage('container.settings.overflow.title') ?>
                </div>
                <div data-bind="{ with: properties.overflow }">
                    <div class="constructor-row">
                        <div class="constructor-form-group">
                            <div class="constructor-form-label">
                                <?= GetMessage('container.settings.overflow') ?>
                            </div>
                            <div class="constructor-form-content">
                                <select class="constructor-input" data-bind="{
                                    value: value,
                                    options: <?= $lang['overflow'] ?>,
                                    optionsValue: 'key',
                                    optionsText: 'value',
                                    bind: $root.bindings.styler
                                }"></select>
                            </div>
                        </div>
                        <? foreach (['x', 'y'] as $axis) { ?>
                            <div class="constructor-form-group">
                                <div class="constructor-form-label"><?= GetMessage('container.settings.overflow.'. $axis) ?></div>
                                <div class="constructor-form-content">
                                    <select class="constructor-input" data-bind="{
                                        value: <?= $axis ?>.value,
                                        options: <?= $lang['overflow'] ?>,
                                        optionsValue: 'key',
                                        optionsText: 'value',
                                        bind: $root.bindings.styler
                                    }"></select>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
            <div class="constructor-property-wrapper">
                <div class="constructor-property-title">
                    <?= GetMessage('container.settings.text') ?>
                </div>
                <div data-bind="{ with: properties.text }">
                    <div class="constructor-row">
                        <div class="constructor-column-6">
                            <div class="constructor-form-group">
                                <div class="constructor-form-label"><?= GetMessage('text.settings.size') ?></div>
                                <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                                    <input type="text"
                                        class="constructor-input"
                                        data-bind="{ value: size.value }"
                                    />
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
                                            bind: function (node, bindings) {
                                                $root.bindings.colorpicker(node, bindings, color);
                                            },
                                            style: { backgroundColor: color }
                                        }">
                                            <div class="constructor-aligner"></div>
                                            <i class="fa fa-eyedropper"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="constructor-input" data-bind="{ value: color }">
                                </div>
                            </div>
                        </div>
                        <div class="constructor-column-12">
                            <div class="constructor-form-group">
                                <div class="constructor-form-label">
                                    <label>
                                        <span style="margin-right: 10px;">
                                            <input type="checkbox" data-bind="{
                                                bind: ko.models.switch(),
                                                checked: uppercase
                                            }" />
                                        </span>
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
            </div>
        </div>
    </div>
    <!-- ko function: $root.menu.scroll.update --><!-- /ko -->
</div>