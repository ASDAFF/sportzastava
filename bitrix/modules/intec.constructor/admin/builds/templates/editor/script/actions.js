constructor.actions = (function (models, grid) {
    var actions = {};

    actions.create = (function () {
        var action;

        action = function (target, type, order, code) {
            var container = null;

            if (!constructor.isContainer(target))
                return;

            if (target.hasComponent() || target.hasWidget())
                return;

            if (type === 'container' || type === 'component' || type === 'widget') {
                container = new constructor.models.container({
                    'type': 'normal',
                    'order': order,
                    'display': true
                });

                if (target.type() === 'absolute') {
                    container.properties.width.value(100);
                    container.properties.width.measure('%');
                }
            }

            if (api.isString(code))
                if (type === 'component') {
                    container.element(new constructor.models.component({
                        'code': code
                    }));
                } else if (type === 'widget') {
                    container.element(new constructor.models.widget({
                        'code': code
                    }));
                }

            if (container) {
                target.addContainer(container);
                target.containers.order();
                constructor.selected(container);
                grid.correct(container);
            }

            return container;
        };

        return action;
    })();
    actions.resize = (function () {
        var action;

        action = function (container, edges) {
            var self = this;

            self.execute = function (event) {
                var node = $(container.node());
                var parent = container.getParent();
                var offset = node.offset();
                var properties = container.properties;
                var values = {};
                var modifiers = {};

                values.top = properties.top.value();
                values.right = properties.right.value();
                values.bottom = properties.bottom.value();
                values.left = properties.left.value();
                values.width = properties.width.value();
                values.height = properties.height.value();
                values.parent = {
                    width: parent ? $(parent.node()).width() : node.parent().width(),
                    height: parent ? $(parent.node()).height() : node.parent().height()
                };

                modifiers.horizontal = edges.left ? -1 : 1;
                modifiers.vertical = edges.top ? -1 : 1;

                offset = node.offset();

                if (event.dx != 0 && (edges.left || edges.right)) {
                    if (properties.bind.horizontal()) {
                        if (!edges.left)
                            if (properties.bottom.measure() == '%') {
                                values.right += -event.dx / values.parent.width * 100;
                            } else {
                                values.right += -event.dx;
                            }

                    } else {
                        if (values.width == null) {
                            values.width = event.pageX - offset.left;
                        }

                        if (properties.width.measure() == '%') {
                            values.width += event.dx / values.parent.width * 100 * modifiers.horizontal;
                        } else {
                            values.width += event.dx * modifiers.horizontal;
                        }
                    }

                    if (edges.left) {
                        if (properties.left.measure() == '%') {
                            values.left += event.dx / values.parent.width * 100;
                        } else {
                            values.left += event.dx;
                        }
                    }
                }

                if (event.dy != 0 && (edges.top || edges.bottom)) {
                    if (properties.bind.vertical()) {
                        if (!edges.top)
                            if (properties.bottom.measure() == '%') {
                                values.bottom += -event.dy / values.parent.height * 100;
                            } else {
                                values.bottom += -event.dy;
                            }
                    } else {
                        if (values.height == null) {
                            values.height = event.pageY - offset.top;
                        }

                        if (properties.height.measure() == '%') {
                            values.height += event.dy / values.parent.height * 100 * modifiers.vertical;
                        } else {
                            values.height += event.dy * modifiers.vertical;
                        }
                    }

                    if (edges.top) {
                        if (properties.top.measure() == '%') {
                            values.top += event.dy / values.parent.height * 100;
                        } else {
                            values.top += event.dy;
                        }
                    }
                }

                if (values.width >= 0 || properties.bind.horizontal()) {
                    if (properties.bind.horizontal()) {
                        properties.right.value(values.right);
                    } else {
                        properties.width.value(values.width);
                    }

                    if (values.width != 0 || properties.bind.horizontal())
                        properties.left.value(values.left);
                }

                if (values.height >= 0 || properties.bind.vertical()) {
                    if (properties.bind.vertical()) {
                        properties.bottom.value(values.bottom);
                    } else {
                        properties.height.value(values.height);
                    }

                    if (values.height != 0 || properties.bind.vertical())
                        properties.top.value(values.top);
                }
            }
        };

        return action;
    })();
    actions.shift = (function () {
        var action;
        var active = false;
        var indicator = new models.element({
            'type': 'indicator.position',
            'order': 0
        });

        action = function () {
            var self;
            var current = false;
            var target = ko.observable();
            var actions = {};
            var subscription;
            var scroller = (function () {
                var scroller;
                var interval;
                var structure = constructor.nodes.structure;
                var scroll = function (side, delay, value, callback) {
                    if (!scroller.isScroll())
                        interval = window.setInterval(function () {
                            var result;

                            result = structure.scrollTop();

                            if (side === 'top') {
                                result = result - value;
                            } else {
                                result = result + value;
                            }

                            structure.scrollTop(result);

                            if (api.isFunction(callback))
                                callback.call(scroller);
                        }, delay);
                };

                interval = null;
                scroller = {};
                scroller.top = function (callback) { scroll('top', 20, 10, callback); };
                scroller.bottom = function (callback) { scroll('bottom', 20, 10, callback); };
                scroller.stop = function () {
                    if (scroller.isScroll()) {
                        window.clearInterval(interval);
                        interval = null;
                    }
                };
                scroller.isScroll = function () { return interval !== null };

                return scroller;
            })();

            actions.drag = function (event, callback) {
                if (active)
                    return;

                active = true;
                current = true;
                target(null);

                subscription = action.target.subscribe(function () {
                    if (action.target.valid()) {
                        target(action.target());
                    } else {
                        target(null);
                    }
                });

                interact.dynamicDrop(true);

                if (api.isFunction(callback))
                    callback.call(self, event);
            };
            actions.move = function (event, callback) {
                if (active && !current)
                    return;

                if (target()) {
                    var setted = false;
                    var containers = target().containers();

                    api.each(containers , function (index, container) {
                        var node;

                        node = container.node();
                        node = $(node);

                        if (node.offset().top + (node.height() / 2) > event.pageY) {
                            indicator.order(index);
                            setted = true;
                            return false;
                        }
                    });

                    if (!setted)
                        indicator.order(containers.length);
                }

                if (event.pageY < 114) {
                    scroller.top(function () {
                        actions.move(event, callback);
                    });
                } else if (event.pageY > $(window).height() - 50) {
                    scroller.bottom(function () {
                        actions.move(event, callback);
                    });
                } else {
                    scroller.stop();
                }

                if (api.isFunction(callback))
                    callback.call(self, event);
            };
            actions.drop = function (event, callback) {
                if (active && !current)
                    return;

                scroller.stop();

                subscription.dispose();
                action.target(null);

                current = false;
                active = false;

                interact.dynamicDrop(false);

                if (api.isFunction(callback))
                    callback.call(self, event);
            };

            self = function (callbacks) {
                return {
                    onstart: function (event) {
                        actions.drag(event, callbacks.start);
                        actions.move(event, callbacks.move);
                    },
                    onmove: function (event) {
                        actions.move(event, callbacks.move);
                    },
                    onend: function (event) {
                        actions.move(event, callbacks.move);
                        actions.drop(event, callbacks.end);
                    }
                }
            };

            self.current = function () { return current; };
            self.indicator = function () { return indicator; };
            self.order = function () { return indicator.order(); };
            self.target = ko.computed(function () { return target(); });

            return self;
        };

        action.active = function () { return active; };
        action.indicator = function () { return indicator; };
        action.target = ko.observable();
        action.target.valid = function () {
            return constructor.isContainer(action.target());
        };

        action.target.subscribe(function () {
             if (action.target.valid())
                 action.target().elements.remove(indicator);
        }, null, 'beforeChange');

        action.target.subscribe(function () {
            if (action.target.valid())
                action.target().elements.push(indicator);
        });

        return action;
    })();

    /*actions.drop = function (newParnet, container) {
        if (!container || !newParnet || newParnet.hasComponent() || newParnet.hasWidget()) {
            return;
        }

        if (container != newParnet && container.getParent() != newParnet && container.getChildren().indexOf(newParnet) == -1) {
            container.setParent(newParnet);
            container.properties.top.value(null);
            container.properties.right.value(null);
            container.properties.bottom.value(null);
            container.properties.left.value(null);
            constructor.grid.correct.size(container);
            constructor.selected(container);
            newParnet.containers.order();
            return container;
        }

        return false;
    };

    actions.create = function (parent, containerType, widgetCode) {
        var container = null;

        if (parent.hasComponent() || parent.hasWidget()) {
            return;
        }

        if (containerType) { // add new container
            var containerProperties = {
                type: parent.type(),
                properties: {}
            };
            if (parent.type() == 'absolute') {
                containerProperties.properties.width = {value: 100, measure: '%'};
            }
            if (containerType != 'widget') {
                containerProperties.properties.height = {value: 30, measure: 'px'};
            }
            container = new constructor.models.container(containerProperties);

            parent.addContainer(container);
            parent.containers.order();

            if (!constructor.selected.isLocked())
                constructor.selected(container);

            switch (containerType) {
                case 'component':
                    container.setComponent(new constructor.models.component());
                    constructor.dialogs.list.componentList.open();
                    break;
                case 'widget':
                    if (!api.isEmpty(widgetCode)) {
                        container.setWidget(new constructor.models.widget({
                            code: widgetCode,
                            properties: {}
                        }));
                    } else {
                        console.error('Widget code don\'t declared in actions.create');
                    }
                    break;
            }
        }

        if (container) {
            constructor.grid.correct.size(container);
            return container;
        }

        return false;
    };

    actions.drag = {
        container: null,
        create: function(parent){
            if (!api.isEmpty(this.container)) {
                this.remove();
            }
            this.container = constructor.models.container({
                properties: {
                    width: {value: 100, measure: 'px'},
                    height: {value: 50, measure: 'px'},
                    background: {color: 'red'}
                }
            });
            if (parent.addContainer(this.container)) {
                return this.container;
            } else {
                return false;
            }
        },
        remove: function(){
            if (!api.isEmpty(this.container)) {
                this.container.remove();
                this.container = null;
            }
        }
    };*/

    return actions;
})(constructor.models, constructor.grid);