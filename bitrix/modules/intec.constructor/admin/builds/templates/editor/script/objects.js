constructor.objects = (function (actions, dialogs) {
    var objects;
    var object;

    object = function (data) {
        var self = this;

        self.type = ko.computed(function () { return data.type; });
        self.code = ko.computed(function () { return data.code; });
        self.name = ko.computed(function () { return data.name; });
        self.icon = ko.computed(function () { return data.icon; });
        self.icon.calculated = ko.computed(function () {
            if (self.icon())
                return 'url(\'' + self.icon() + '\')';

            return null;
        });
        self.node = ko.observable();
        self.node.subscribe(function (node) {
            var action;
            var holder;
            var creator = constructor.structure.creator;
            var create = function (target, order) {
                var list = dialogs.componentList;
                var properties = dialogs.componentProperties;

                if (self.type() === 'component') {
                    if (!constructor.isContainer(target))
                        return;

                    if (target.hasComponent() || target.hasWidget())
                        return;

                    list.open(function (component) {
                        if (component !== null) {
                            var container = actions.create(target, 'component', order - 0.5, component.code());

                            if (constructor.isContainer(container))
                                properties.open(container.getComponent());
                        }
                    });
                } else {
                    actions.create(target, self.type(), order - 0.5, self.code());
                }
            };

            action = actions.shift();

            holder = interact(node).draggable(action({
                'start': function (event) {
                    creator.object(self);
                },
                'move': function (event) {
                    var node;
                    var area = $(document);
                    var height = area.height();
                    var width = area.width();
                    var position;

                    position = {
                        'top': event.pageY + 10,
                        'left': event.pageX + 10
                    };

                    node = $(creator.node());
                    node.css(position);

                    if (node.offset().top + node.height() > height)
                        position.top -= node.offset().top + node.height() - height;

                    if (node.offset().left + node.width() > width)
                        position.left -= node.offset().left + node.width() - width;

                    node.css(position);
                },
                'end': function (event) {
                    creator.object(null);
                    create(this.target(), this.order() - 0.5);
                }
            })).on('click', function () {
                create(constructor.selected(), 0);
            });
        });
    };

    objects = ko.observableArray([]);
    objects.add = function (data) {
        var result;

        data = api.extend({}, data);
        result = new object(data);
        objects.push(result);

        return result;
    };

    return objects;
})(constructor.actions, constructor.dialogs.list);