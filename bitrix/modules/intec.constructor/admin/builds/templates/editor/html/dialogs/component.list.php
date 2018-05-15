<div class="constructor-dialog constructor-component-list" data-bind="{
    bind: dialogs.list.componentList,
    with: dialogs.list
}">
    <div class="constructor-dialog-wrapper">
        <div class="constructor-dialog-header">
            <div class="constructor-dialog-content-wrap">
                <div class="constructor-dialog-content">
                    <div class="constructor-dialog-content-wrapper">
                        <div class="constructor-dialog-content-wrapper-2">
                            <div class="constructor-dialog-title">
                                <?= GetMessage('container.modals.component.list.form-title') ?>
                            </div>
                            <div class="constructor-dialog-container">
                                <div class="constructor-dialog-search">
                                    <div class="constructor-icon search-icon"></div>
                                    <input
                                        type="text"
                                        class="constructor-dialog-search-input"
                                        placeholder="<?= GetMessage('container.modals.gallery.search') ?>"
                                        data-bind="{
                                            value: componentList.data.filter,
                                            valueUpdate: 'keyup'
                                        }"
                                    />
                                </div>
                            </div>
                            <div class="constructor-dialog-buttons">
                                <button class="constructor-dialog-button glyph-icon-window" data-bind="{
                                    click: componentList.expanded.switch
                                }"></button>
                                <button class="constructor-dialog-button glyph-icon-cancel" data-bind="{
                                    click: componentList.close
                                }"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="constructor-dialog-body" data-bind="{
            with: componentList.data
        }">
            <div class="constructor-dialog-content-wrap">
                <div class="constructor-dialog-content">
                    <div class="constructor-dialog-loader" data-bind="{
                        visible: updating
                    }">
                        <div class="constructor-loader constructor-loader-1"></div>
                    </div>
                    <div class="component-list" data-bind="{
                        visible: !updating()
                    }">
                        <div class="component-list-content">
                            <!-- ko foreach: sections -->
                                <div class="component-list-section component-list-root-section">
                                    <div class="component-list-section-name component-list-root-section-name" data-bind="{
                                        text: name() || code(),
                                        css: {
                                            'component-list-section-active': active
                                        },
                                        click: function () {
                                            active(!active());
                                        }
                                    }"></div>
                                    <div class="component-list-section-structure" data-bind="{
                                        if: active
                                    }">
                                        <div class="component-list-section-sections" data-bind="{
                                            template: {
                                                name: 'component-list-section',
                                                foreach: sections.visible
                                            }
                                        }"></div>
                                        <ul class="component-list-section-components component-list-component-ul" data-bind="{
                                            template: {
                                                name: 'component-list-component',
                                                foreach: components.visible
                                            }
                                        }"></ul>
                                    </div>
                                </div>
                            <!-- /ko -->
                        </div>
                    </div>
                    <script id="component-list-section" type="text/html">
                        <div class="component-list-section">
                            <div class="component-list-section-name component-list-child-section-name" data-bind="{
                                text: name() || code(),
                                css: {
                                    'component-list-section-active': active
                                },
                                click: function () {
                                    active(!active());
                                }
                            }"></div>
                            <div class="component-list-section-structure" data-bind="{
                                if: active
                            }">
                                <div class="component-list-section-sections" data-bind="{
                                    template: {
                                        name: 'component-list-section',
                                        foreach: sections.visible
                                    }
                                }"></div>
                                <ul class="component-list-section-components component-list-component-ul" data-bind="{
                                    template: {
                                        name: 'component-list-component',
                                        foreach: components.visible
                                    }
                                }"></ul>
                            </div>
                        </div>
                    </script>
                    <script id="component-list-component" type="text/html">
                        <li class="component-list-component-name" data-bind="{
                            css: {
                                'component-list-component-active': selected
                            },
                            click: select
                        }">
                            <div class="component-list-marker"></div>
                            <div class="component-list-component-name-value" data-bind="{
                                text: name
                            }"></div>
                        </li>
                    </script>
                </div>
            </div>
        </div>
        <div class="constructor-dialog-footer">
            <div class="constructor-dialog-content-wrap">
                <div class="constructor-dialog-content constructor-button-group constructor-button-size-3 constructor-button-font-14">
                    <div class="constructor-button constructor-button-blue constructor-save-button" data-bind="{
                        click: componentList.save
                    }">
                        <?= GetMessage('container.modals.component.list.button-save') ?>
                    </div>
                    <div class="constructor-button constructor-button-transparent-blue" data-bind="{
                        click: componentList.close
                    }">
                        <?= GetMessage('container.modals.component.list.button-cancel') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>