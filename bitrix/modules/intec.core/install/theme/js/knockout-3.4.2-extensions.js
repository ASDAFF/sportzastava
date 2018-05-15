(function (api) {
    var $ = api.$;

    ko.isObservableArray = function (object) {
        if (!ko.isObservable(object))
            return false;

        return object.__proto__ === ko.observableArray.fn;
    };

    (function () {
        var handlers;
        var bindings;

        handlers = ko.bindingHandlers;
        bindings = ko.virtualElements.allowedBindings;

        handlers.bind = {
            init: function (element, valueAccessor, allBindings, viewModel) {
                var value = null;

                if (api.isFunction(valueAccessor))
                    value = valueAccessor();

                if (api.isFunction(value)) {
                    var bindings = {};
                    if (api.isFunction(allBindings))
                        bindings = allBindings();

                    value(element, bindings, viewModel);
                }
            }
        };

        handlers.checked.initOriginal = ko.bindingHandlers.checked.init;
        handlers.checked.init = function (element, valueAccessor, allBindings) {
            ko.bindingHandlers.checked.initOriginal.apply(this, arguments);

            var isCheckbox = element.type == "checkbox",
                isRadio = element.type == "radio";

            if (!isCheckbox && !isRadio)
                return;

            ko.computed(function () {
                ko.utils.unwrapObservable(valueAccessor());
                $(element).trigger('change');
            }, null, { disposeWhenNodeIsRemoved: element });
        };

        bindings.function = true;
        handlers.function = {
            init: function (element, valueAccessor) {
                var value = valueAccessor();

                if (api.isFunction(value))
                    value();
            }
        };

        handlers.htmlTemplate = {
            init: function () {
                return { 'controlsDescendantBindings': false };
            },
            update: function (element, valueAccessor) {
                ko.utils.setHtml(element, valueAccessor());
            }
        };
    })();

    // Subscribe without triggering observable
    ko.observable.fn.filter = function(callback) {
        var self = this;
        var notifier = self.notifySubscribers;

        if (api.isBoolean(callback)) {
            self.filtering = callback;
            return self;
        }

        if (!api.isFunction(callback)) return this;

        self.filtering = false;
        self.notifySubscribers = function() {
            if (!self.filtering)
                notifier.apply(this, arguments);
        };

        self.subscribe(function () {
            self.filtering = true;
            callback.apply(self, arguments);
            self.filtering = false;
        });

        return self;
    };

    ko.observableArray.fn.find = function (callback) {
        var list = this;
        var founded = [];

        if (!api.isFunction(callback))
            return templates;

        api.each(list(), function (index, item) {
            var result = callback.call(list, index, item);
            if (result) founded.push(item);
        });

        return founded;
    };

    ko.observableArray.fn.findOne = function (callback) {
        var list = this;
        var founded = null;

        if (!api.isFunction(callback))
            return widget;

        api.each(list(), function (index, item) {
            var result = callback.call(list, index, item);
            if (result) {
                founded = item;
                return false;
            }
        });

        return founded;
    };

    ko.observableArray.fn.has = function (object) {
        return this.indexOf(object) >= 0
    };

    // Set value type on observable
    // bool empty - if value can be null
    ko.observable.fn.type = function(type, empty) {
        this.filter(function (value) {
            if (empty) {
                if (api.isEmpty(value) && !api.isNull(value)) {
                    this.filter(false);
                    this(null);
                    this.filter(true);
                    return;
                }

                if (api.isNull(value))
                    return;
            }

            this(api.to(value, type));
        });

        return this;
    };

    // Range values from MIN to MAX
    // callback('min' || 'max') - return false for stop checking
    ko.observable.fn.range = function(min, max, callback) {

        var self = this,
            callbackIsFunction = api.isFunction(callback);

        self.filter(function (value) {

            // ----- Minimum -----
            if (!(callbackIsFunction && callback('min') === false)) {
                var minVal = min;
                if (ko.isObservable(minVal))
                    minVal = min();

                if (!api.isEmpty(minVal) && minVal !== Infinity && value < minVal)
                    self(minVal);
            }

            // ----- Maximum -----
            if (!(callbackIsFunction && callback('max') === false)) {
                var maxVal = max;
                if (ko.isObservable(maxVal))
                    maxVal = max();

                if (!api.isEmpty(maxVal) && maxVal !== Infinity && value > maxVal)
                    self(maxVal);
            }

        });

        if (ko.isObservable(min)) {
            min.filter(function(){
                self.valueHasMutated()
            });
        }
        if (ko.isObservable(max)) {
            max.filter(function(){
                self.valueHasMutated()
            });
        }

        return self;
    };
})(intec);