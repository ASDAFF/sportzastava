(function ($, api) {
    $(document).on('ready', function () {
        var adapt;
        var area;
        var container;
        var template;
        var height;

        area = $(window);
        container = $('body');
        template = container.find('.intec-template');
        template.content = template.find('.intec-template-content');
        template.footer = template.find('.intec-template-footer');

        adapt = function () {
            container.css({'height': 'auto'});
            template.footer.css({'position': ''});
            template.content.css({'padding-bottom': ''});

            if (container.height() < area.height()) {
                container.css({'height': '100%'});

                if (template.footer.size() === 1) {
                    template.footer.css({'position': 'absolute'});
                    template.content.css({'padding-bottom': template.footer.height + 'px'});
                }
            }
        };

        $(window).on('resize', adapt);
        setInterval(adapt, 250);
        adapt();
    });
})(jQuery, intec);

(function ($, api) {
    var attributes = {
        'basket': {
            'add': 'data-basket-add',
            'remove': 'data-basket-added',
            'delay': 'data-basket-delay',
            'delayed': 'data-basket-delayed',
            'in': 'data-basket-in'
        },
        'compare': {
            'add': 'data-compare-add',
            'remove': 'data-compare-added',
            'in': 'data-compare-in'
        }
    };

    var change = {
        basket: function (id, delay, state) {
            var buttons;
            var attribute = attributes.basket.in;

            buttons = {};
            buttons.common = $('[' + attributes.basket.add + '=' + id + ']')
                .add('[' + attributes.basket.remove + '=' + id + ']');

            buttons.delay = $('[' + attributes.basket.delay + '=' + id + ']')
                .add('[' + attributes.basket.delayed + '=' + id + ']');

            if (delay) {
                buttons.common.attr(attribute, 'false');
                buttons.delay.attr(attribute, state ? 'true' : 'false');
            } else {
                buttons.common.attr(attribute, state ? 'true' : 'false');
                buttons.delay.attr(attribute, state ? 'false' : 'true');
            }
        },
        compare: function (id, state) {
            var attribute = attributes.compare.in;

            $('[' + attributes.compare.add + '=' + id + ']')
                .add('[' + attributes.compare.remove + '=' + id + ']')
                .attr(attribute, state ? 'true' : 'false');
        }
    };

    var processButton = function(attrs, value){

        if (!api.isArray(attrs)) {
            attrs = [attrs];
        }

        var selectorArray = [];
        api.each(attrs, function(i, v){
            selectorArray.push('[' + v + '=' + value + ']')
        });

        var selector = selectorArray.join(', ');
        $(selector).each(function(){
            var $button = $(this);
            if ($('.loader', $button).length == 0) {
                if ($button.outerWidth() >= 100 && $button.outerHeight() >= 20) {
                    $button.append('<span class="loader bounce"><i></i><i></i><i></i></span>');
                } else {
                    $button.append('<span class="loader folding"><i></i><i></i><i></i><i></i></span>');
                }
            }
            $button.addClass('loading-container active');
        });
    };
    universe.basket.on('processed', function(e) {
        $('[' + attributes.basket.add + '], [' + attributes.basket.in + '], [' + attributes.basket.remove + '], [' + attributes.basket.delay + '], [' + attributes.basket.delayed + ']').each(function(){
            $(this).removeClass('loading-container active');
            $('.loader', this).remove();
        });
    });

    $(document).on('click', '[' + attributes.basket.add + ']', function() {
        var self = $(this),
            id = self.data('basket-add'),
            quantity = self.data('basket-quantity');

        processButton([attributes.basket.add, attributes.basket.remove], id);

        universe.basket.add({
            id: id,
            quantity: quantity
        });
    });

    $(document).on('click', '[' + attributes.basket.delay + ']', function() {
        var self = $(this);
        var id = self.data('basket-delay');

        change.basket(id, true, true);

        universe.basket.add({
            id: id,
            delay: 'Y'
        }, function(){

        });
    });

    $(document).on('click', '[' + attributes.basket.delayed + ']', function() {
        var self = $(this);
        var id = self.data('basket-delayed');

        processButton(attributes.basket.remove, id);

        universe.basket.remove({
            id: id
        });
    });

    $(document).on('click', '[' + attributes.compare.add + ']', function() {
        var self = $(this);
        var id = self.data('compare-add');
        var list = self.data('compare-list');
        var iblock = self.data('compare-iblock');

        change.compare(id, true);

        universe.compare.add({
            id: id,
            list: list,
            iblock: iblock
        });
    });

    $(document).on('click', '[' + attributes.compare.remove + ']', function() {
        var self = $(this);
        var id = self.data('compare-added');
        var list = self.data('compare-list');
        var iblock = self.data('compare-iblock');

        change.compare(id, false);

        universe.compare.remove({
            id: id,
            list: list,
            iblock: iblock
        });
    });
})(jQuery, intec);