(function ($, api) {
    var control;
    var controls;
    var signature;

    signature = function () {};
    signature.instance = new signature();
    control = function (constructor, destructor) {
        var control;
        var wrapper;

        control = function (settings, node) {
            var self;
            var base;

            self = this;
            base = {};
            base.events = api.ext.events(self);
            node = $(node);

            if (node.size() !== 1)
                node = null;

            if (api.isFunction(constructor))
                constructor.call(self, base, settings, node);

            self.on = function (event, callback) {
                base.events.on(event, callback);
                return self;
            };
            self.once = function (event, callback) {
                base.events.off(event, callback);
                return self;
            };
            self.off = function (event, callback) {
                base.events.off(events, callback);
                return self;
            };
            self.destruct = function () {
                if (api.isFunction(destructor))
                    destructor.call(self, base, node);
            };
        };
        control.prototype = signature.instance;

        wrapper = function (settings, nodes) {
            return new control(settings, nodes);
        };
        wrapper.is = function (object) {
              return object instanceof control;
        };

        return wrapper;
    };
    controls = {};
    controls.is = function (object) {
        return object instanceof signature;
    };

    /**
     * Numeric control
     * Parameters:
     *  settings: {
     *      bounds: {
     *          maximum: false|float|integer,
     *          minimum: false|float|integer
     *      },
     *      step: float|integer,
     *      value: float|integer,
     *      selectors: {
     *          increment: string|Element|jQuery,
     *          decrement: string|Element|jQuery,
     *          input: string|Element|jQuery
     *      }
     *  },
     *  node: string|Element|jQuery
     **/
    controls.numeric = control(function (base, settings, node) {
        var self;

        self = this;
        base.settings = api.extend({
            'bounds': {
                'maximum': false,
                'minimum': false
            },
            'step': 1,
            'value': 0,
            'selectors': {
                'increment': '[data-type="button"][data-action="increment"]',
                'decrement': '[data-type="button"][data-action="decrement"]',
                'input': '[data-type="input"]'
            }
        }, settings);
        settings = base.settings;

        settings.bounds.maximum = settings.bounds.maximum !== false ? api.toFloat(settings.bounds.maximum) : false;
        settings.bounds.minimum = settings.bounds.minimum !== false ? api.toFloat(settings.bounds.minimum) : false;
        settings.step = api.toFloat(settings.step);
        settings.value = api.toFloat(settings.value);

        if (api.isNaN(settings.bounds.maximum)) settings.bounds.maximum = 0;
        if (api.isNaN(settings.bounds.minimum)) settings.bounds.minimum = 0;
        if (api.isNaN(settings.step)) settings.step = 1;
        if (api.isNaN(settings.value)) settings.value = 1;

        if (settings.step <= 0)
            settings.step = 1;

        self.set = function (value, callback) {
            var decimals;

            value = api.toFloat(value);
            decimals = Math.count.decimals(settings.step);

            if (api.isNaN(value))
                if (settings.bounds.minimum !== false) {
                    value = settings.bounds.minimum;
                } else {
                    value = 0;
                }

            value = api.toFloat(value.toFixed(decimals));

            if (settings.bounds.maximum !== false)
                if (value > settings.bounds.maximum)
                    value = settings.bounds.maximum;

            if (settings.bounds.minimum !== false)
                if (value < settings.bounds.minimum)
                    value = settings.bounds.minimum;

            if (value % settings.step !== 0)
                value = settings.step * Math.round(value / settings.step);

            base.events.trigger('change', value);

            if (api.isFunction(callback))
                callback.call(self, value);

            settings.value = value;

            return self;
        };
        self.get = function () {
            return settings.value;
        };
        self.reset = function () {
            self.set(settings.value);
            return self;
        };
        self.increment = function (callback) {
            var value;

            self.set(self.get() + settings.step);
            value = self.get();
            base.events.trigger('increment', value);

            if (api.isFunction(callback))
                callback.call(self, value);

            return self;
        };
        self.decrement = function (callback) {
            var value;

            self.set(self.get() - settings.step);
            value = self.get();
            base.events.trigger('decrement', value);

            if (api.isFunction(callback))
                callback.call(self, value);

            return self;
        };

        if (node !== null) {
            var nodes;
            var locked;

            locked = false;
            nodes = {};
            nodes.increment = node.find(settings.selectors.increment);
            nodes.decrement = node.find(settings.selectors.decrement);
            nodes.input = node.find(settings.selectors.input);

            nodes.input.handler = function () {
                if (!locked) self.set(nodes.input.val());
            };
            nodes.input.on('change', nodes.input.handler);
            nodes.decrement.handler = function () {
                self.increment();
            };
            nodes.increment.on('click', nodes.decrement.handler);
            nodes.decrement.handler = function () {
                self.decrement();
            };
            nodes.decrement.on('click', nodes.decrement.handler);

            base.events.on('change', function (event, value) {
                locked = true;
                nodes.input.val(value);
                locked = false;
            });

            base.nodes = nodes;
            self.reset();
        }
    }, function (base, node) {
        var nodes;

        if (node !== null) {
            nodes = base.nodes;
            nodes.input.off('change', nodes.input.handler);
            nodes.increment.off('click', nodes.increment.handler);
            nodes.decrement.off('click', nodes.decrement.handler);
        }
    });

    api.controls = controls;

    $(document).ready(function () {
        (function ($) {
            $.fn.extend({
                'control': function (control, settings, callback) {
                    if (control === true) {
                        this.each(function () {
                            node = $(this);
                            instance = node.data('control');

                            if (control.is(instance)) {
                                instance.destroy();
                                node.removeData('control');
                            }
                        });

                        return;
                    }

                    if (!api.isString(control)) {
                        control = this.data('control');

                        if (controls.is(control))
                            return control;

                        return null;
                    }

                    if (control === 'is')
                        return null;

                    control = controls[control];

                    if (!api.isFunction(control))
                        return null;

                    this.each(function () {
                        var node;
                        var instance;
                        var configuration;

                        node = $(this);
                        instance = node.data('control');

                        if (control.is(instance))
                            return;

                        configuration = api.extend({}, settings, node.data('settings'));

                        if (api.isFunction(callback))
                            callback.call(node, configuration, null);

                        instance = control(configuration, node);

                        if (api.isFunction(callback))
                            callback.call(node, configuration, instance);

                        node.data('control', instance);
                    });

                    return this;
                }
            })
        })(jQuery);
    });
})(jQuery, intec);