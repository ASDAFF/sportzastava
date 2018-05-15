<div class="widget-icons-settings">
    <div class="constructor-row">
        <div class="constructor-form-group">
            <div class="constructor-form-label">
                <span><?= $this->getMessage('settings.header') ?></span>
                <span
                    style="margin-left: 5px;"
                    title="<?= $this->getMessage('settings.header.switch') ?>"
                    data-bind="{ bind: $root.bindings.tooltip }"
                >
                    <input type="checkbox" data-bind="{
                        bind: ko.models.switch(),
                        checked: header.show
                    }" />
                </span>
            </div>
            <div class="constructor-form-content">
                <input type="text" class="constructor-input constructor-input-block" data-bind="{
                    value: header.value
                }" />
            </div>
        </div>
    </div>
    <div class="constructor-row">
        <div class="constructor-form-group">
            <div class="constructor-form-content">
                <div class="constructor-button constructor-button-block constructor-button-blue constructor-button-size-2 constructor-button-font-12" data-bind="{
                    click: dialogs.items.open
                }" style="text-align: center;"><?= $this->getMessage('settings.icons.edit') ?></div>
            </div>
        </div>
    </div>
    <div class="constructor-row">
        <div class="constructor-form-group">
            <div class="constructor-form-label"><?= $this->getMessage('settings.icons.count') ?></div>
            <div class="constructor-form-content">
                <input class="constructor-input constructor-input-block" type="text" data-bind="{
                    value: count
                }" />
            </div>
        </div>
    </div>
    <? foreach (['caption', 'description'] as $item) { ?>
    <!-- ko with: <?= $item ?> -->
        <div class="constructor-row" style="margin-top: 10px;">
            <div class="constructor-form-group">
                <div class="constructor-form-label">
                    <span><?= $this->getMessage('settings.'.$item) ?></span>
                </div>
                <div class="constructor-form-content" style="padding-top: 12px;">
                    <div class="constructor-column-6">
                        <div class="widget-icons-font widget-icons-font-left">
                            <div class="widget-icons-font-button constructor-vertical-middle" data-bind="{
                                css: { 'widget-icons-font-button-active': style.bold },
                                click: style.bold.switch
                            }">
                                <div class="constructor-aligner"></div>
                                <i class="fa fa-bold"></i>
                            </div>
                            <div class="widget-icons-font-button constructor-vertical-middle" data-bind="{
                                css: { 'widget-icons-font-button-active': style.italic },
                                click: style.italic.switch
                            }">
                                <div class="constructor-aligner"></div>
                                <i class="fa fa-italic"></i>
                            </div>
                            <div class="widget-icons-font-button constructor-vertical-middle" data-bind="{
                                css: { 'widget-icons-font-button-active': style.underline },
                                click: style.underline.switch
                            }">
                                <div class="constructor-aligner"></div>
                                <i class="fa fa-underline"></i>
                            </div>
                        </div>
                    </div>
                    <div class="constructor-column-6" data-bind="{ with: text }">
                        <div class="widget-icons-font widget-icons-font-right">
                            <div class="widget-icons-font-button constructor-vertical-middle" data-bind="{
                                css: { 'widget-icons-font-button-active': align.value() === align.values()[0] },
                                click: function () { align.value(align.values()[0]); }
                            }">
                                <div class="constructor-aligner"></div>
                                <i class="fa fa-align-left"></i>
                            </div>
                            <div class="widget-icons-font-button constructor-vertical-middle" data-bind="{
                                css: { 'widget-icons-font-button-active': align.value() === align.values()[1] },
                                click: function () { align.value(align.values()[1]); }
                            }">
                                <div class="constructor-aligner"></div>
                                <i class="fa fa-align-center"></i>
                            </div>
                            <div class="widget-icons-font-button constructor-vertical-middle" data-bind="{
                                css: { 'widget-icons-font-button-active': align.value() === align.values()[2] },
                                click: function () { align.value(align.values()[2]); }
                            }">
                                <div class="constructor-aligner"></div>
                                <i class="fa fa-align-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="constructor-clearfix"></div>
            <div style="padding-top: 15px;">
                <div class="constructor-column-6">
                    <div class="constructor-form-group" data-bind="{ with: text }">
                        <div class="constructor-form-label">
                            <span><?= $this->getMessage('settings.size') ?></span>
                        </div>
                        <div class="constructor-form-content constructor-input-group constructor-input-group-measures">
                            <input type="text" class="constructor-input" data-bind="{ value: size.value }">
                            <div class="constructor-input-wrapper">
                                <select class="constructor-input" data-bind="{
                                    value: size.measure,
                                    options: size.measures,
                                    bind: $root.bindings.styler
                                }"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="constructor-column-6">
                    <div class="constructor-form-group" data-bind="{ with: text }">
                        <div class="constructor-form-label">
                            <span><?= $this->getMessage('settings.color') ?></span>
                        </div>
                        <div class="constructor-form-content constructor-input-group constructor-colorpicker-wrap">
                            <div class="constructor-input-group-addon">
                                <div class="constructor-colorpicker-button constructor-vertical-middle" data-bind="{
                                            bind: ko.models.colorpicker({}, color),
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
            </div>
            <div class="constructor-clearfix"></div>
            <div class="constructor-form-group" style="padding-top: 10px;">
                <div class="constructor-form-label">
                    <span><?= $this->getMessage('settings.opacity') ?></span>
                    <span style="float: right;" data-bind="{ text: opacity.display }"></span>
                </div>
                <div class="constructor-form-content">
                    <div class="constructor-slider" data-bind="{
                        bind: ko.models.slider({
                            'min': 0,
                            'max': 100,
                            'step': 1
                        }, opacity)
                    }"></div>
                </div>
            </div>
        </div>
    <!-- /ko -->
    <? } ?>
    <div class="constructor-row" data-bind="{ with: background }">
        <div class="constructor-form-group">
            <div class="constructor-form-label">
                <span><?= $this->getMessage('settings.background') ?></span>
                <span
                    style="margin-left: 5px;"
                    title="<?= $this->getMessage('settings.background.switch') ?>"
                    data-bind="{ bind: $root.bindings.tooltip }"
                >
                    <input type="checkbox" data-bind="{
                        bind: ko.models.switch(),
                        checked: show
                    }" />
                </span>
            </div>
        </div>
        <div class="constructor-form-group">
            <div class="constructor-form-label">
                <span><?= $this->getMessage('settings.color') ?></span>
            </div>
            <div class="constructor-form-content constructor-input-group constructor-colorpicker-wrap">
                <div class="constructor-input-group-addon">
                    <div class="constructor-colorpicker-button constructor-vertical-middle" data-bind="{
                        bind: ko.models.colorpicker({}, color),
                        style: { backgroundColor: color }
                    }">
                        <div class="constructor-aligner"></div>
                        <i class="fa fa-eyedropper"></i>
                    </div>
                </div>
                <input type="text" class="constructor-input constructor-colorpicker-input" data-bind="{ value: color }">
            </div>
        </div>
        <div class="constructor-form-group" style="padding-top: 10px;">
            <div class="constructor-form-label">
                <span><?= $this->getMessage('settings.rounding') ?></span>
            </div>
            <div class="constructor-border-radius-line-wrap constructor-clearfix">
                <i class="constructor-icon glyph-icon-squere_evolution"></i>
                <div class="constructor-border-radius-global-value" data-bind="{
                    text: rounding.summary
                }"></div>
                <div class="constructor-slider" data-bind="{
                    bind: ko.models.slider({
                        'min': 0,
                        'max': 100,
                        'step': 1
                    }, rounding.value)
                }"></div>
            </div>
        </div>
        <div class="constructor-form-group">
            <div class="constructor-form-content">
                <div class="constructor-four-direction-settings constructor-row">
                    <div class="shared-icon constructor-vertical-middle" title="" data-bind="{
                        bind: $root.bindings.tooltip,
                        event: {click: rounding.shared.switch },
                        css: {
                            'active': rounding.shared
                        }
                    }">
                        <i class="glyph-icon-linked"></i>
                        <i class="glyph-icon-unlinked"></i>
                    </div>
                    <div class="constructor-column-5">
                        <div class="constructor-form-group">
                            <div class="constructor-input-group">
                                <input type="text" class="constructor-input" data-bind="{ value: rounding.top.value }">
                                <div class="constructor-input-group-addon">
                                    <div class="constructor-border-illustration border-top border-left" data-bind="{
                                        style: { borderTopLeftRadius: rounding.top.calculated }
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
                                        style: { borderTopRightRadius: rounding.right.calculated }
                                    }"></div>
                                </div>
                                <input type="text" class="constructor-input" data-bind="value: rounding.right.value">
                            </div>
                        </div>
                    </div>
                    <div class="constructor-column-5">
                        <div class="constructor-form-group">
                            <div class="constructor-input-group">
                                <input type="text" class="constructor-input" data-bind="value: rounding.left.value">
                                <div class="constructor-input-group-addon">
                                    <div class="constructor-border-illustration border-bottom border-left" data-bind="{
                                        style: { borderBottomLeftRadius: rounding.left.calculated }
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
                                        style: { borderBottomRightRadius: rounding.bottom.calculated }
                                    }"></div>
                                </div>
                                <input type="text" class="constructor-input" data-bind="value: rounding.bottom.value">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="constructor-clearfix"></div>
        <div class="constructor-form-group">
            <div class="constructor-form-label">
                <span><?= $this->getMessage('settings.opacity') ?></span>
                <span style="float: right;" data-bind="{ text: opacity.display }"></span>
            </div>
            <div class="constructor-form-content">
                <div class="constructor-slider" data-bind="{
                    bind: ko.models.slider({
                        'min': 0,
                        'max': 100,
                        'step': 1
                    }, opacity)
                }"></div>
            </div>
        </div>
    </div>
    <div class="widget-icons-dialogs">
        <div class="constructor-dialog widget-icons-dialog-icons" data-bind="{ bind: dialogs.items }">
            <div class="constructor-dialog-wrapper">
                <div class="constructor-dialog-header">
                    <div class="constructor-dialog-content-wrap">
                        <div class="constructor-dialog-content">
                            <div class="constructor-dialog-content-wrapper">
                                <div class="constructor-dialog-content-wrapper-2">
                                    <div class="constructor-dialog-title">
                                        <?= $this->getMessage('settings.icons.edit') ?>
                                    </div>
                                    <div class="constructor-dialog-container"></div>
                                    <div class="constructor-dialog-buttons">
                                        <button class="constructor-dialog-button glyph-icon-cancel" data-bind="{
                                            click: dialogs.items.close
                                        }"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="constructor-dialog-body">
                    <div class="constructor-dialog-content-wrap">
                        <div class="constructor-dialog-content">
                            <div class="widget-icons-items">
                                <!-- ko foreach: items -->
                                    <div class="widget-icons-item">
                                        <div class="widget-icons-item-wrapper">
                                            <div class="widget-icons-item-wrapper-2 constructor-vertical-middle">
                                                <div class="widget-icons-item-icon" data-bind="{
                                                    style: {
                                                        backgroundImage: image.calculated
                                                    }
                                                }"></div>
                                                <div class="constructor-aligner"></div>
                                                <div class="widget-icons-buttons">
                                                    <div class="widget-icons-button" data-bind="{
                                                        click: function () {
                                                            $parent.dialogs.item.selected($data);
                                                            $parent.dialogs.item.open();
                                                        }
                                                    }">
                                                        <i class="glyph-icon-settings"></i>
                                                    </div>
                                                    <div class="widget-icons-delimiter">
                                                        <div class="widget-icons-line"></div>
                                                    </div>
                                                    <div class="widget-icons-button" style="width: 14px; height: 14px; font-size: 14px;" data-bind="{
                                                        click: function () { (function () {
                                                            $parent.items.remove($data);
                                                        })(); }
                                                    }">
                                                        <i class="glyph-icon-cancel"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- /ko -->
                                <div class="widget-icons-item widget-icons-item-add" data-bind="{
                                    click: function () { (function () {
                                        items.add();
                                    })(); }
                                }">
                                    <div class="widget-icons-item-wrapper">
                                        <div class="widget-icons-item-wrapper-2 constructor-vertical-middle">
                                            <div class="constructor-aligner"></div>
                                            <div class="widget-icons-content">
                                                <div class="widget-icons-content-icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <div class="widget-icons-content-text">
                                                    <?= $this->getMessage('settings.icons.add') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="constructor-dialog widget-icons-dialog widget-icons-dialog-icon" data-bind="{ bind: dialogs.item }">
            <div class="constructor-dialog-wrapper">
                <div class="constructor-dialog-header">
                    <div class="constructor-dialog-content-wrap">
                        <div class="constructor-dialog-content">
                            <div class="constructor-dialog-content-wrapper">
                                <div class="constructor-dialog-content-wrapper-2">
                                    <div class="constructor-dialog-title">
                                        <?= $this->getMessage('settings.icon.edit') ?>
                                    </div>
                                    <div class="constructor-dialog-container"></div>
                                    <div class="constructor-dialog-buttons">
                                        <button class="constructor-dialog-button glyph-icon-cancel" data-bind="{
                                            click: dialogs.item.close
                                        }"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="constructor-dialog-body" data-bind="{ with: dialogs.item.selected }">
                    <div class="constructor-dialog-content-wrap">
                        <div class="constructor-dialog-content">
                            <div class="widget-icons-item">
                                <div class="widget-icons-content">
                                    <div class="widget-icons-icon">
                                        <div class="widget-icons-icon-wrapper" data-bind="{
                                            style: {
                                                backgroundImage: image.calculated
                                            }
                                        }"></div>
                                    </div>
                                    <div class="widget-icons-buttons">
                                        <div class="constructor-button constructor-button-blue constructor-button-size-2 constructor-button-font-12 widget-icons-button-select" data-bind="{
                                            click: function () {
                                                $root.dialogs.list.gallery.open(function (data) {
                                                    image(data.value);
                                                    return true;
                                                });
                                            }
                                        }">
                                            <?= $this->getMessage('settings.icon.image.select') ?>
                                        </div>
                                        <div class="constructor-button constructor-button-transparent-default constructor-button-size-2 constructor-button-font-12 widget-icons-button-remove" data-bind="{
                                            click: function () {
                                                image(null);
                                            }
                                        }">
                                            <?= $this->getMessage('settings.icon.image.remove') ?>
                                        </div>
                                        <div class="widget-icons-fields" style="margin-top: 15px;">
                                            <div class="widget-icons-fields-wrapper">
                                                <div class="widget-icons-field">
                                                    <div class="widget-icons-field-wrapper">
                                                        <div class="widget-icons-label">
                                                            <?= $this->getMessage('settings.icon.field.image') ?>
                                                        </div>
                                                        <div class="widget-icons-control">
                                                            <input class="widget-icons-input" type="text" data-bind="{ value: image }">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="constructor-clearfix"></div>
                                </div>
                                <div class="widget-icons-fields">
                                    <div class="widget-icons-fields-wrapper">
                                        <div class="widget-icons-field">
                                            <div class="widget-icons-field-wrapper">
                                                <div class="widget-icons-label">
                                                    <?= $this->getMessage('settings.icon.field.caption') ?>
                                                </div>
                                                <div class="widget-icons-control">
                                                    <input class="widget-icons-input" type="text" data-bind="{ value: name }">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-icons-field">
                                            <div class="widget-icons-label">
                                                <?= $this->getMessage('settings.icon.field.description') ?>
                                            </div>
                                            <div class="widget-icons-control">
                                                <textarea class="widget-icons-input" data-bind="{ value: description }" style="height: 80px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="widget-icons-field">
                                            <div class="widget-icons-label">
                                                <?= $this->getMessage('settings.icon.field.link') ?>
                                            </div>
                                            <div class="widget-icons-control">
                                                <input class="widget-icons-input" type="text" data-bind="{ value: link }">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>