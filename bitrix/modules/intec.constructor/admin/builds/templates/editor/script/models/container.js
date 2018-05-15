(function (models) {
    (function (container) {
        container.on('remove', function (event, self) {
            var menuTabs = constructor.menu.tabs;
            if (menuTabs.active.get() === menuTabs.list.container) {
                menuTabs.close();
            }
            if (constructor.selected() === self) {
                constructor.selected(null);
            }
        });
        container.on('init', function (event, self, data) {
            self.node = ko.observable();
            self.getParentNode = function () {
                return self.hasParent() ? self.getParent().node() : $(self.node()).parent().get(0);
            };
            self.node.size = (function (actions, grid) {
                var size = {};
                var edges = {
                    'top': {'top': true},
                    'right': {'right': true},
                    'bottom': {'bottom': true},
                    'left': {'left': true},
                    'tr': {'top': true, 'right': true},
                    'tl': {'top': true, 'left': true},
                    'br': {'bottom': true, 'right': true},
                    'bl': {'bottom': true, 'left': true}
                };

                api.each(edges, function (name, edges) {
                    size[name] = ko.observable();
                    size[name].drag = ko.observable(false);
                    size[name].subscribe(function (node) {
                        var action = null;

                        interact(node).draggable({
                            onstart: function (event) {
                                action = new actions.resize(self, edges);
                                size[name].drag(true);
                                constructor.selected.lock();
                            },
                            onmove: function (event) {
                                action.execute(event);
                            },
                            onend: function (event) {
                                grid.correct(self);
                                size[name].drag(false);
                                action = null;
                                constructor.selected.unlock();
                            }
                        });
                    });
                });

                size.visible = ko.observable(false);

                return size;
            })(constructor.actions, constructor.grid);
            self.node.padding = (function (actions) {
                var padding = {};
                var sides = ['top', 'right', 'bottom', 'left'];
                var properties = self.properties;

                api.each(sides, function (index, side) {
                    var object = {};
                    var update = function () {
                        properties.padding.value();
                        properties.padding.measure();
                        properties.padding.summary();
                        properties.padding[side].value();
                        properties.padding[side].measure();
                        properties.padding[side].summary();
                        properties.width.summary();
                        properties.height.summary();
                    };

                    object.getValue = function () {
                        update();

                        var node = $(self.node());
                        var value = api.toInteger(node.css('padding-' + side));

                        return value + 'px';
                    };

                    padding[side] = object;
                });

                padding.visible = ko.observable(false);

                return padding;
            })(constructor.actions);
            self.node.margin = (function (actions) {
                var margin = {};
                var sides = ['top', 'right', 'bottom', 'left'];
                var properties = self.properties;

                api.each(sides, function (index, side) {
                    var object = ko.observable();
                    var update = function () {
                        properties.margin.value();
                        properties.margin.measure();
                        properties.margin.summary();
                        properties.margin.isAuto();
                        properties.margin[side].value();
                        properties.margin[side].measure();
                        properties.margin[side].summary();
                        properties.margin[side].isAuto();
                        properties.border.width.summary();
                        properties.border.style();
                        properties.border[side].width.summary();
                        properties.border[side].style.value();
                        properties.width.summary();
                        properties.height.summary();
                    };

                    object.getValue = function () {
                        update();

                        var node = $(self.node());
                        var value = api.toInteger(node.css('margin-' + side));

                        return value + object.getIndent();
                    };
                    object.getIndent = function () {
                        update();

                        var node = $(self.node());

                        return api.toInteger(
                            node.css('border-' + side + '-width')
                        );
                    };

                    margin[side] = object;
                });

                margin.visible = ko.observable(false);

                return margin;
            })(constructor.actions);
            self.node.shift = (function (actions) {
                var shift = {};
                var action = actions.shift();

                shift.node = ko.observable();
                shift.current = function () {
                    if (action.current())
                        return true;

                    if (self.hasParent())
                        return self.getParent().node.shift.current();

                    return false;
                };
                shift.node.subscribe(function (node) {
                    if (!self.hasParent())
                        return;

                    var parent;
                    var holder;
                    var shifter = constructor.structure.shifter;

                    holder = interact(node).draggable(action({
                        'start': function (event) {
                            parent = self.parent();
                            constructor.selected(null);
                            self.parent(null);
                            self.order(self.order() - 0.5);
                            shifter.container(self);
                        },
                        'move': function (event) {
                            var height;
                            var offset;
                            var size;
                            var position;
                            var nodes = {
                                'root': constructor.nodes.structure,
                                'frame': $(shifter.frame()),
                                'holder': $(shifter.holder())
                            };

                            position = {};
                            position.top = event.pageY - nodes.root.offset().top - 17 + nodes.root.scrollTop();
                            position.left = event.pageX - nodes.holder.offset().left;
                            height = nodes.root.prop('scrollHeight');

                            nodes.frame.css({
                                'top': position.top,
                                'left': position.left
                            });

                            offset = nodes.holder.offset();
                            size = {
                                width: nodes.holder.width(),
                                height: nodes.holder.height()
                            };

                            position.top += offset.top + (size.height / 2) - (event.pageY - nodes.root.offset().top);
                            position.left -= offset.left + (size.width / 2) - event.pageX;

                            if (position.top + nodes.frame.height() + 20 >= height)
                                position.top -= position.top + nodes.frame.height() - height + 22;

                            nodes.frame.css({
                                'top': position.top,
                                'left': position.left
                            });
                        },
                        'end': function () {
                            shifter.container(null);

                            if (action.target()) {
                                self.order(action.indicator().order() - 0.5);
                                self.parent(action.target());
                            } else {
                                self.parent(parent);
                            }

                            self.parent().containers.order();
                            parent = null;
                        }
                    }));
                });

                return shift;
            })(constructor.actions);
            self.node.zone = (function (actions) {
                var zone = {};
                var highlight;
                var action = actions.shift;
                var target;

                highlight = function (state) {
                    target().node.zone.highlight(state);
                };

                target = function () {
                    if (self.hasWidget() || self.hasComponent())
                        return self.getParent();

                    return self;
                };

                zone.node = ko.observable();
                zone.node.subscribe(function (node) {
                    if (self.node.shift.current())
                        return;

                    interact(node).dropzone({
                        ondragenter: function (event) {
                            if (!action.active())
                                return;

                            highlight(true);
                            action.target(target());
                        },
                        ondragleave: function (event) {
                            if (!action.active())
                                return;

                            highlight(false);
                            action.target(null);
                        },
                        ondrop: function () {
                            if (!action.active())
                                return;

                            highlight(false);
                        }
                    });
                });
                zone.highlight = ko.observable();

                return zone;
            })(constructor.actions);

            self.elements = (function () {
                var object;

                object = ko.observableArray();
                object.order = function () {
                    object.sort(function(left, right){
                        return left.order() == right.order() ? 0 : (left.order() < right.order() ? -1 : 1)
                    });
                };

                return object;
            })();

            (function () {
                self.containers.render = ko.computed(function () {
                    var result;

                    result = ko.observableArray();
                    self.elements.order();

                    api.each(self.containers(), function (position, container) {
                        api.each(self.elements(), function (index, element) {
                            if (position >= element.order() && !result.has(element))
                                result.push(element);
                        });

                        result.push(container);
                    });

                    api.each(self.elements(), function (index, element) {
                        if (!result.has(element))
                            result.push(element);
                    });

                    return result();
                });
            })();
        });
    })(models.container);
})(constructor.models);