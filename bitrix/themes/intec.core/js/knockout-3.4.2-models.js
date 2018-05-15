(function (api) {
    var $ = api.$;

    ko.models = {};
    ko.models.switch = function (settings, node) {
        var self;
        var model;

        self = ko.observable(null);
        settings = api.extend({}, settings);

        self.subscribe(function (node) {
            if (model) model.destroy();
            model = new api.ui.controls.switch(node, settings);
        });

        self(node);

        return self;
    };

    if (api.isDeclared($.ui)) {
        ko.models.dialog = function (settings, node) {
            var self;
            var methods;

            self = ko.observable(null);
            api.extend(self, api.ext.events(self));

            settings = api.extend({
                modal: false,
                create: function (event, ui) {
                    self.trigger('create', event, ui);
                },
                open: function (event, ui) {
                    self.trigger('open', event, ui);
                },
                focus: function (event, ui) {
                    self.trigger('focus', event, ui);
                },
                dragStart: function (event, ui) {
                    self.trigger('dragStart', event, ui);
                },
                drag: function (event, ui) {
                    self.trigger('drag', event, ui);
                },
                dragStop: function (event, ui) {
                    self.trigger('dragStop', event, ui);
                },
                resizeStart: function (event, ui) {
                    self.trigger('resizeStart', event, ui);
                },
                resize: function (event, ui) {
                    self.trigger('resize', event, ui);
                },
                resizeStop: function (event, ui) {
                    self.trigger('resizeStop', event, ui);
                },
                beforeClose: function (event, ui) {
                    self.trigger('close', event, ui);
                },
                close: function (event, ui) {
                    self.trigger('close', event, ui);
                }
            }, settings, {
                autoOpen: false
            });

            self.subscribe(function (node) {
                $(node).dialog(settings);
            });

            self.getNode = function () {
                return $(self());
            };

            methods = [
                'close', 'destroy',
                'instance', 'isOpen',
                'moveToTop', 'open',
                'widget'
            ];

            api.each(methods, function (i, method) {
                self[method] = function () {
                    return $(self()).dialog(method);
                };
            });

            self.option = function (name, value) {
                return $(self()).dialog('option', name, value);
            };

            self(node);

            return self;
        };
        ko.models.slider = function (settings, property, node) {
            var self;
            var methods;
            var busy;

            if (!ko.isObservable(property))
                return null;

            self = ko.observable(null);
            busy = false;
            api.extend(self, api.ext.events(self));
            settings = api.extend({
                'min': 0,
                'max': 100,
                'step': 1,
                'range': 'min',
                'value': property(),
                'classes': {
                    'ui-slider': 'constructor-slider',
                    'ui-slider-handle': 'constructor-slider-handle',
                    'ui-slider-range': 'constructor-slider-range'
                },
                'change': function (event, ui) {
                    self.trigger('change', event, ui);
                },
                'create': function (event, ui) {
                    self.trigger('create', event, ui);
                },
                'slide': function (event, ui) {
                    if (!busy) {
                        busy = true;
                        property(ui.value);
                        busy = false;
                    }

                    self.trigger('slide', event, ui);
                },
                'start': function (event, ui) {
                    self.trigger('start', event, ui);
                },
                'stop': function (event, ui) {
                    self.trigger('stop', event, ui);
                }
            }, settings);

            self.subscribe(function (node) {
                $(node).slider(settings);

                property.subscribe(function (value) {
                    if (!$.contains(document, node)) {
                        this.dispose();
                        return;
                    }

                    if (!busy) {
                        busy = true;
                        $(node).slider('value', value);
                        busy = false;
                    }
                });
            });

            methods = [
                'destroy', 'disable',
                'enable', 'instance',
                'option', 'value',
                'values', 'widget'
            ];

            api.each(methods, function (i, method) {
                self[method] = function (value) {
                    if (!api.isUndefined(value)) {
                        return $(self()).slider(method, value);
                    }

                    return $(self()).slider(method);
                };
            });

            self(node);

            return self;
        }
    }

    if (api.isDeclared($.fn.ColorPicker)) {
        ko.models.colorpicker = function (settings, property, node) {
            var self;
            var parse;

            if (!ko.isObservable(property))
                return null;

            self = ko.observable(null);
            settings = api.extend({}, settings);
            parse = function (value) {
                if (api.isString(value)) {
                    return api.toString(value).slice(1);
                }

                return '';
            };

            self.subscribe(function (node) {
                $(node).ColorPicker(api.extend({}, settings, {
                    'color': parse(property()),
                    'onSubmit': function (hsb, hex, rgb) {
                        if (api.isFunction(settings.onSubmit))
                            settings.onSubmit.apply(this, arguments);

                        property('#' + hex);
                    }
                }));

                property.subscribe(function (value) {
                    if (!$.contains(document, node)) {
                        this.dispose();
                        return;
                    }

                    $(node).ColorPickerSetColor(parse(value));
                });
            });

            self(node);

            return self;
        }
    }

    if (api.isDeclared($.fn.nanoScroller)) {
        ko.models.scroll = function (settings, node) {
            var self = ko.observable();

            settings = api.extend({}, settings);

            self.subscribe(function (node) {
                $(node).nanoScroller(settings);
            });

            self.subscribe(function () {
                $(self()).nanoScroller({destroy: true});
            }, self, 'beforeChange');

            self.update = function () {
                $(self()).nanoScroller();
            };

            self.scrollTo = function (element) {
                $(self()).nanoScroller({scrollTo: $(element)});
            };

            self(node);

            return self;
        };
    }

    if (api.isDeclared(CKEDITOR)) {
        ko.models.ckeditor = function (settings, property, node) {
            var self = ko.observable();
            var busy = false;
            var editor;

            if (!ko.isObservable(property))
                return null;

            settings = api.extend({}, settings);

            self.subscribe(function (node) {
                editor = CKEDITOR.replace(node);
                editor.setData(property());
                editor.on('change', function () {
                    if (!busy) {
                        busy = true;
                        property(editor.getData());
                        busy = false;
                    }
                });

                property.subscribe(function (value) {
                    if (!$.contains(document, node)) {
                        this.dispose();
                        return;
                    }

                    if (editor && !busy) {
                        busy = true;
                        editor.setData(value);
                        busy = false;
                    }
                });
            });

            self.getEditor = function () {
                return editor;
            };

            self(node);

            return self;
        }
    }

    if (api.isDeclared(window.CodeMirror)) {
        ko.models.codeMirror = function (settings, property, node) {
            var self = ko.observable();
            var busy = false;
            var editor;

            settings = api.extend({
                'theme': 'dracula',
                'lineNumbers': true
            }, settings);

            self.subscribe(function (node) {
                editor = CodeMirror.fromTextArea(node, settings);

                if (ko.isObservable(property)) {
                    var value = property();

                    if (!api.isString(value))
                        value = '';

                    editor.doc.setValue(value);
                    editor.on('change', function () {
                        if (!busy) {
                            busy = true;
                            property(editor.doc.getValue());
                            busy = false;
                        }
                    });

                    property.subscribe(function (value) {
                        if (!$.contains(document, node)) {
                            this.dispose();
                            return;
                        }

                        if (editor && !busy) {
                            busy = true;

                            if (!api.isString(value))
                                value = '';

                            editor.doc.setValue(value);
                            busy = false;
                        }
                    });
                }
            });

            self.getEditor = function () {
                return editor;
            };

            self(node);

            return self;
        }
    }
})(intec);