<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use intec\Core;
use intec\core\helpers\FileHelper;
use intec\core\helpers\JavaScript;
use intec\core\helpers\StringHelper;
use intec\constructor\models\Build;
use intec\constructor\models\build\template\Container;

/**
 * @var array $arUrlTemplates
 * @var Build $build
 */
?>
<div id="constructor" class="constructor">
    <div class="constructor-menu constructor-menu-top no-select">
        <div class="constructor-vertical-middle constructor-menu-top-wrapper-right constructor-button-group constructor-button-size-3">
            <div class="constructor-aligner"></div>
            <a href="<?= StringHelper::replaceMacros($arUrlTemplates['builds.templates'], [
                'build' => $build->id
            ]) ?>"
               class="constructor-button constructor-button-transparent-blue"><?= GetMessage('button.exit') ?></a>
            <div class="constructor-button constructor-button-blue constructor-save-button"
                data-bind="click: save"
            ><?= GetMessage('button.save') ?></div>
        </div>
        <div class="constructor-menu-top-switches-wrap constructor-vertical-middle">
            <div class="constructor-aligner"></div>
            <label>
                <span><?= GetMessage('panel.container.control') ?></span>
                <input type="checkbox"
                    data-ui-switch="{}"
                    data-bind="checked: manageContainers"
                />
            </label>
            <label>
                <span><?= GetMessage('panel.grid.show') ?></span>
                <input type="checkbox"
                    data-ui-switch="{}"
                    data-bind="checked: grid.show"
                />
            </label>
        </div>
        <div class="constructor-menu-top-buttons-wrap"
             data-bind="css: $root.menu.tabs.active().length > 0 ? 'tab-selected' : ''">
            <div class="constructor-menu-top-button constructor-back-menu typcn typcn-arrow-left"></div>
        </div>
        <div class="constructor-vertical-middle constructor-button-group constructor-button-size-3">
            <div class="constructor-aligner"></div>
            <div class="constructor-button constructor-button-transparent-blue" data-bind="{
                css: menu.tabs.active.get() === menu.tabs.list.main ? 'hover' : '',
                click: function(){ menu.tabs.open(menu.tabs.list.main); }
            }">
                <i class="glyph-icon-settings"></i>
                <?= GetMessage('panel.widgets') ?>
            </div>
            <div class="constructor-button constructor-button-transparent-blue" data-bind="{
                css: menu.tabs.active.get() === menu.tabs.list.text ? 'hover' : '',
                click: function(){ menu.tabs.open(menu.tabs.list.text); }
            }">
                <i class="fa fa-font" style="font-size: 16px;"></i>
                <?= GetMessage('panel.text') ?>
            </div>
            <div class="constructor-button constructor-button-transparent-blue" data-bind="{
                css: menu.tabs.active.get() === menu.tabs.list.scheme ? 'hover' : '',
                click: function(){ menu.tabs.open(menu.tabs.list.scheme); }
            }">
                <i class="fa fa-paint-brush" style="font-size: 18px;"></i>
                <?= GetMessage('panel.scheme') ?>
            </div>
            <div class="constructor-button constructor-button-transparent-blue" data-bind="{
                css: menu.tabs.active.get() === menu.tabs.list.guides ? 'hover' : '',
                click: function(){ menu.tabs.open(menu.tabs.list.guides); }
            }">
                <?= GetMessage('panel.guides') ?>
            </div>
            <div class="constructor-button constructor-button-transparent-blue" data-bind="{
                css: menu.tabs.active.get() === menu.tabs.list.visual ? 'hover' : '',
                click: function(){ menu.tabs.open(menu.tabs.list.visual); }
            }">
                <?= GetMessage('panel.display') ?>
            </div>
        </div>
    </div>

    <div id="container-panel" data-bind="{
        with: $root.selected,
        css: { 'active': $root.selected() && $root.selected().hasParent() }
    }">
        <!-- ko if: hasParent -->
            <!-- ko if: getParentType() == 'absolute' -->
                <div class="panel-layer-down glyph-icon-layer_down"
                     title="<?= GetMessage('panel.layer.down') ?>"
                     data-bind="{ bind: $root.bindings.tooltip, click: layerUp }"
                ></div>
                <div class="panel-layer-up glyph-icon-layer_up"
                     title="<?= GetMessage('panel.layer.up') ?>"
                     data-bind="{ bind: $root.bindings.tooltip, click: layerDown }"
                ></div>
            <!-- /ko -->
            <!-- ko if: getParentType() != 'absolute' -->
                <div class="panel-layer-down fa fa-angle-down"
                     title="<?= GetMessage('panel.level.down') ?>"
                     data-bind="{ bind: $root.bindings.tooltip, click: layerDown }"
                ></div>
                <div class="panel-layer-up fa fa-angle-up"
                     title="<?= GetMessage('panel.level.up') ?>"
                     data-bind="{ bind: $root.bindings.tooltip, click: layerUp }"
                ></div>
            <!-- /ko -->
            <div class="panel-copy glyph-icon-copy"
                 title="<?= GetMessage('panel.copy') ?>"
                 data-bind="{ bind: $root.bindings.tooltip, click: copy }"
            ></div>
            <div class="panel-remove glyph-icon-cancel"
                 title="<?= GetMessage('panel.delete.container') ?>"
                 data-bind="{
                    bind: $root.bindings.tooltip,
                    click:
                        function() {
                            if(confirm('<?=GetMessage("container.modals.conditions.remove.confirm")?>')) {
                                remove()
                            }
                        }
                 }"
            ></div>
        <!-- /ko -->
    </div>

    <? include('html/menu/left.php') ?>
    <? include('html/modals.php') ?>

    <div class="constructor-area" data-bind="{
        css: {
            'constructor-manage-containers': $root.manageContainers,
            'active': $root.menu.tabs.active().length > 0
        },
        style: {
            fontSize: settings.text.size.summary,
            color: settings.text.color,
            lineHeight: settings.text.lineHeight.summary,
            letterSpacing: settings.text.letterSpacing.summary,
            textTransform: settings.text.uppercase() ? 'uppercase' : 'inherit'
        }
    }">
        <div class="constructor-area-wrap">
            <div class="constructor-structure" id="constructor-structure" data-bind="
                bind: function(node){
                    var $node = $(node);
                    $node.off('resize.guides').on('resize.guides', function(){
                        $root.guides.rows.space.value.valueHasMutated();
                    });
                }">
                <div class="constructor-structure-top-padding"></div>
                <!-- ko if: $root.isContainer(container()) -->
                    <div class="root" data-bind="{ template: { name: 'container', data: container } }"></div>
                <!-- /ko -->
                <!-- ko with: $root.structure.shifter -->
                    <!-- ko if: display -->
                        <div class="constructor-structure-shifter" data-bind="{
                            bind: frame,
                            style: {
                                'display': 'block'
                            }
                        }">
                            <div class="constructor-container-wrap constructor-container-panel-wrapper">
                                <div class="constructor-container-panel constructor-clearfix">
                                    <span class="constructor-container-drag-icon" data-bind="{
                                        bind: holder
                                    }"></span>
                                    <!-- ko with: container -->
                                        <span class="constructor-container-name" data-bind="{
                                            text: hasComponent() ?
                                                '<?= GetMessage('widget.component') ?>' : (
                                                    hasWidget() ?
                                                        getWidget().model().name() :
                                                        '<?= GetMessage('widget.container') ?>'
                                                )
                                        }"></span>
                                    <!-- /ko -->
                                </div>
                            </div>
                            <div class="constructor-structure-shifter-wrapper" data-bind="{
                                template: { name: 'container', data: container }
                            }"></div>
                            <div class="constructor-structure-shifter-blocker"></div>
                        </div>
                    <!-- /ko -->
                <!-- /ko -->
            </div>
        </div>
    </div>
    <!-- ko with: $root.structure.creator -->
        <!-- ko if: display -->
            <!-- ko with: object -->
                <div class="constructor-widget constructor-widget-drag" data-bind="{
                    bind: $parent.node,
                    css: 'constructor-widget-' + type()
                }">
                    <div class="constructor-widget-wrapper">
                        <div class="constructor-widget-wrapper-2">
                            <div class="constructor-widget-background"></div>
                            <div class="constructor-widget-icon" data-bind="{
                                style: {
                                    'background-image': icon.calculated
                                }
                            }"></div>
                            <div class="constructor-widget-name" data-bind="{
                                text: name
                            }"></div>
                        </div>
                    </div>
                </div>
            <!-- /ko -->
        <!-- /ko -->
    <!-- /ko -->

    <? include('html/dialogs.php') ?>

    <?/** TODO fix this */?>
    <?/*
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script type="text/javascript"
            data-bind="text: 'WebFont.load(' + JSON.stringify(settings.fonts.getFonts()) + ');'"></script>*/?>
</div>

<script id="container" type="text/html">
    <!-- ko if: $root.isContainer($data) -->
        <div class="constructor-container" data-bind="{
            bind: function (node) {
                $data.node(node);
                $data.node.zone.node(node);
            },
            attr: { id: properties.id },
            css:
                properties.class() + ' container-' + id() + (hasWidget() || hasComponent() ? ' container-type-widget' : ' container-type-container') + (node.zone.highlight() ? ' constructor-container-zone' : ''),
            style: {
                position: properties.position,
                float: properties.float,
                top: properties.top.sum,
                right: properties.right.sum,
                bottom: properties.bottom.sum,
                left: properties.left.sum,
                width: properties.width.summary,
                minWidth: properties.width.min.summary,
                maxWidth: properties.width.max.summary,
                height: properties.height.summary,
                minHeight: properties.height.min.summary,
                maxHeight: properties.height.max.summary,
                margin: properties.margin.calculated,
                marginTop: properties.margin.top.calculated,
                marginRight: properties.margin.right.calculated,
                marginBottom: properties.margin.bottom.calculated,
                marginLeft: properties.margin.left.calculated,
                padding: properties.padding.summary,
                paddingTop: properties.padding.top.calculated,
                paddingRight: properties.padding.right.calculated,
                paddingBottom: properties.padding.bottom.calculated,
                paddingLeft: properties.padding.left.calculated,
                backgroundColor: properties.background.color,
                backgroundImage: properties.background.image.calculated,
                backgroundRepeat: properties.background.repeat,
                backgroundSize: properties.background.getSize(),
                backgroundPosition: properties.background.position.calculated,
                borderWidth: properties.border.width.summary,
                borderStyle: properties.border.style,
                borderColor: properties.border.color,
                borderTopWidth: properties.border.top.width.calculated,
                borderTopStyle: properties.border.top.style.calculated,
                borderTopColor: properties.border.top.color.calculated,
                borderRightWidth: properties.border.right.width.calculated,
                borderRightStyle: properties.border.right.style.calculated,
                borderRightColor: properties.border.right.color.calculated,
                borderBottomWidth: properties.border.bottom.width.calculated,
                borderBottomStyle: properties.border.bottom.style.calculated,
                borderBottomColor: properties.border.bottom.color.calculated,
                borderLeftWidth: properties.border.left.width.calculated,
                borderLeftStyle: properties.border.left.style.calculated,
                borderLeftColor: properties.border.left.color.calculated,
                borderRadius: properties.border.radius.summary,
                borderTopLeftRadius: properties.border.top.radius.calculated,
                borderTopRightRadius: properties.border.right.radius.calculated,
                borderBottomLeftRadius: properties.border.bottom.radius.calculated,
                borderBottomRightRadius: properties.border.left.radius.calculated,
            },
        }">
            <!-- ko if: !hasParent() -->
                <div class="constructor-guides-wrap" data-bind="with: $root.guides">
                    <div class="constructor-guides-columns-wrap" data-bind="{
                        fade: columns.active,
                        style: {
                           left: columns.space.minusSum,
                           right: columns.space.minusSum
                        }
                    }">
                        <div class="constructor-guides-columns" data-bind="{
                            style: { borderSpacing: columns.space.summary() + ' 0' },
                            foreach: new function () {
                               var arr = [],
                                   columns = $data.columns.count();

                               for (var i = 0; i < columns; i++)
                                   arr.push({});

                               return arr;
                            }
                        }">
                            <div class="constructor-guides-column"></div>
                        </div>
                    </div>
                    <!-- ko function:
                        $($parent.node()).off('resize.guides').on('resize.guides', function(){
                            rows.space.value.valueHasMutated();
                        });
                    --><!-- /ko -->
                    <div class="constructor-guides-rows" data-bind="{
                        fade: rows.active,
                        foreach: new function () {
                            var arr = [], count = 100;

                            if (rows.space.measure() == 'px')
                                count = $($parent.node()).height() / rows.space.value();

                            for (var i = 0; i < count; i++)
                                arr.push({});

                            return arr;
                        }
                    }">
                        <div class="constructor-guides-row" data-bind="{
                            style: { paddingTop: $parent.rows.space.summary }
                        }"></div>
                    </div>
                </div>
            <!-- /ko -->
            <!-- ko with: node.padding -->
                <!-- ko if: visible() && $root.manageContainers() -->
                    <div class="constructor-container-padding constructor-container-padding-top" data-bind="{
                        style: { height: top.getValue() }
                    }"></div>
                    <div class="constructor-container-padding constructor-container-padding-right" data-bind="{
                        style: {
                            width: right.getValue(),
                            marginTop: top.getValue(),
                            marginBottom: bottom.getValue()
                        }
                    }"></div>
                    <div class="constructor-container-padding constructor-container-padding-bottom" data-bind="{
                        style: { height: bottom.getValue() }
                    }"></div>
                    <div class="constructor-container-padding constructor-container-padding-left" data-bind="{
                        style: {
                            width: left.getValue(),
                            marginTop: top.getValue(),
                            marginBottom: bottom.getValue()
                        }
                    }"></div>
                    <div class="constructor-container-padding-border" data-bind="{
                        style: {
                            top: top.getValue(),
                            right: right.getValue(),
                            bottom: bottom.getValue(),
                            left: left.getValue()
                        }
                    }"></div>
                <!-- /ko -->
            <!-- /ko -->
            <!-- ko with: node.margin -->
                <!-- ko if: visible() && $root.manageContainers() -->
                    <div class="constructor-container-margin constructor-container-margin-top" data-bind="{
                        style: {
                            top: '-' + top.getValue() + 'px',
                            right: '-' + right.getIndent() + 'px',
                            left: '-' + left.getIndent() + 'px',
                            marginBottom: top.getIndent() + 'px'
                        }
                    }"></div>
                    <div class="constructor-container-margin constructor-container-margin-right" data-bind="{
                        style: {
                            right: '-' + right.getValue() + 'px',
                            top: '-' + top.getValue() + 'px',
                            bottom: '-' + bottom.getValue() + 'px',
                            marginLeft: right.getIndent() + 'px'
                        }
                    }"></div>
                    <div class="constructor-container-margin constructor-container-margin-bottom" data-bind="{
                        style: {
                            right: '-' + right.getIndent() + 'px',
                            bottom: '-' + bottom.getValue() + 'px',
                            left: '-' + left.getIndent() + 'px',
                            marginTop: bottom.getIndent() + 'px'
                        }
                    }"></div>
                    <div class="constructor-container-margin constructor-container-margin-left" data-bind="{
                        style: {
                            left: '-' + left.getValue() + 'px',
                            top: '-' + top.getValue() + 'px',
                            bottom: '-' + bottom.getValue() + 'px',
                            marginRight: left.getIndent() + 'px'
                        }
                    }"></div>
                <!-- /ko -->
            <!-- /ko -->
            <div class="constructor-container-wrapper" data-bind="{
                style: {
                    top: properties.border.top.width.minusSum(),
                    right: properties.border.right.width.minusSum(),
                    bottom: properties.border.bottom.width.minusSum(),
                    left: properties.border.left.width.minusSum(),
                }
            }">
                <!-- ko with: node.size -->
                    <!-- ko if: visible() && $parent.hasParent() -->
                        <!-- ko if: $parent.getParentType() == <?= JavaScript::toObject(Container::TYPE_ABSOLUTE) ?> -->
                            <div class="constructor-container-size constructor-container-size-top" data-bind="{
                                bind: top,
                                css: { 'constructor-container-size-drag': top.drag }
                            }"></div>
                            <div class="constructor-container-size constructor-container-size-top-right" data-bind="{
                                bind: tr,
                                css: { 'constructor-container-size-drag': tr.drag }
                            }"></div>
                            <div class="constructor-container-size constructor-container-size-top-left" data-bind="{
                                bind: tl,
                                css: { 'constructor-container-size-drag': tl.drag }
                            }"></div>
                            <div class="constructor-container-size constructor-container-size-left" data-bind="{
                                bind: left,
                                css: { 'constructor-container-size-drag': left.drag }
                            }"></div>
                            <div class="constructor-container-size constructor-container-size-bottom-left" data-bind="{
                                bind: bl,
                                css: { 'constructor-container-size-drag': bl.drag }
                            }"></div>
                        <!-- /ko -->
                        <div class="constructor-container-size constructor-container-size-right" data-bind="{
                            bind: right,
                            css: { 'constructor-container-size-drag': right.drag }
                        }"></div>
                        <div class="constructor-container-size constructor-container-size-bottom-right" data-bind="{
                            bind: br,
                            css: { 'constructor-container-size-drag': br.drag }
                        }"></div>
                        <div class="constructor-container-size constructor-container-size-bottom" data-bind="{
                            bind: bottom,
                            css: { 'constructor-container-size-drag': bottom.drag }
                        }"></div>
                    <!-- /ko -->
                <!-- /ko -->
            </div>
            <div class="constructor-container-wrap constructor-container-panel-wrapper">
                <div class="constructor-container-panel constructor-clearfix">
                    <span class="constructor-container-drag-icon" data-bind="{
                        bind: node.shift.node
                    }"></span>
                    <span class="constructor-container-name" data-bind="{
                        text: hasComponent() ?
                            '<?= GetMessage('widget.component') ?>' : (
                                hasWidget() ?
                                    getWidget().model().name() :
                                    '<?= GetMessage('widget.container') ?>'
                            )
                    }"></span>
                    <span class="constructor-container-controls-buttons">
                        <i class="glyph-icon-settings_2 constructor-container-control-button-container-settings" data-bind="{
                            click: function () {
                                var tabs = $root.menu.tabs;

                                if (tabs.active.get() == tabs.list.container && $root.selected() == $data) {
                                    tabs.close(tabs.list.container);
                                } else {
                                    tabs.open(tabs.list.container);
                                }
                            }
                        }"></i>
                        <!-- ko if: hasWidget() || hasComponent() -->
                            <i class="fa fa-cog constructor-container-control-button-widget-settings" data-bind="{
                                click: function () {
                                    var tabs = $root.menu.tabs;
                                    var dialogs = $root.dialogs;

                                    if (!hasEmptyComponent()) {
                                        dialogs.list.componentProperties.open(getComponent());
                                    } else if (hasWidget()) {
                                        if (tabs.active.get() == tabs.list.widget && $root.selected() == $data) {
                                            tabs.close(tabs.list.widget);
                                        } else {
                                            tabs.open(tabs.list.widget);
                                        }
                                    }
                                }
                            }"></i>
                        <!-- /ko -->
                    </span>
                </div>
            </div>
            <div class="constructor-container-wrap">
                <div class="constructor-container-wrap-2" data-bind="{
                    style: {
                        overflow: properties.overflow.value,
                        overflowX: properties.overflow.x.calculated,
                        overflowY: properties.overflow.y.calculated,
                        borderRadius: properties.border.radius.summary,
                        borderTopLeftRadius: properties.border.top.radius.calculated,
                        borderTopRightRadius: properties.border.right.radius.calculated,
                        borderBottomLeftRadius: properties.border.bottom.radius.calculated,
                        borderBottomRightRadius: properties.border.left.radius.calculated,
                        opacity: properties.getOpacity,
                        fontSize: properties.text.size.summary,
                        color: properties.text.color,
                        textTransform: properties.text.uppercase() ? 'uppercase' : null,
                        lineHeight: properties.text.lineHeight.summary,
                        letterSpacing: properties.text.letterSpacing.summary
                    }
                }">
                    <!-- ko if: $root.grid.show() && properties.grid.type() !== 'none' && type() == 'absolute' -->
                        <!-- ko function:
                            $(node()).off('resize.grid').on('resize.grid', function(){
                                properties.grid.width.valueHasMutated();
                                properties.grid.height.valueHasMutated();
                            });
                        --><!-- /ko -->
                        <div class="constructor-container-grid-wrap">
                            <div class="constructor-container-grid-rows" data-bind="{
                                foreach: new function () {
                                    var result = [];
                                    var top = 0;
                                    var measure = null;
                                    var count = 0;
                                    var step = 1;

                                    switch (properties.grid.type()) {
                                        case 'adaptive':
                                            measure = '%';
                                            count = properties.grid.y();
                                            step = (100 / count);
                                            break;
                                        case 'fixed':
                                            measure = 'px';
                                            step = properties.grid.height();
                                            count = $(node()).height() / step;
                                            break;
                                        default:
                                            return result;
                                    }

                                    for (var i = 1; i < count; i++) {
                                        top += step;
                                        result.push(top + measure);
                                    }

                                    return result;
                                }
                            }">
                                <div class="constructor-container-grid-row"
                                     data-bind="style: {top: $data}"
                                ></div>
                            </div>
                        </div>
                        <div class="constructor-container-grid-wrap">
                            <div class="constructor-container-grid-columns" data-bind="{
                                foreach: new function () {
                                    var result = [];
                                    var top = 0;
                                    var measure = null;
                                    var count = 0;
                                    var step = 1;

                                    switch (properties.grid.type()) {
                                        case 'adaptive':
                                            measure = '%';
                                            count = properties.grid.x();
                                            step = (100 / count);
                                            break;
                                        case 'fixed':
                                            measure = 'px';
                                            step = properties.grid.width();
                                            count = $(node()).width() / step;
                                            break;
                                        default:
                                            return result;
                                    }

                                    for (var i = 1; i < count; i++) {
                                        top += step;
                                        result.push(top + measure);
                                    }

                                    return result;
                                }
                            }">
                                <div class="constructor-container-grid-column"
                                     data-bind="style: {left: $data}"
                                ></div>
                            </div>
                        </div>
                    <!-- /ko -->
                    <!-- ko if: hasComponent() -->
                        <div class="constructor-container-component" data-bind="with: element">
                            <div data-bind="html: view"></div>
                            <div class="component-clear"></div>
                            <div class="constructor-container-component-locker"></div>
                        </div>
                    <!-- /ko -->
                    <!-- ko if: hasWidget() && !hasComponent() -->
                        <div class="constructor-container-widget" data-bind="with: element">
                            <!-- ko with: structure -->
                                <div data-bind="htmlTemplate: $parent.views.template" style="width: 100%; height: 100%;"></div>
                            <!-- /ko -->
                        </div>
                    <!-- /ko -->
                    <!-- ko if: !hasComponent() && !hasWidget() -->
                        <!-- ko template: {name: 'container', foreach: containers.render } --><!-- /ko -->
                    <!-- /ko -->
                    <div class="constructor-clearfix"></div>
                </div>
            </div>
        </div>
    <!-- /ko -->
    <!-- ko if: $root.isElement($data) -->
        <!-- ko if: type() === 'indicator.position' -->
            <div class="constructor-container-indicator constructor-container-indicator-position"></div>
        <!-- /ko -->
    <!-- /ko -->
</script>