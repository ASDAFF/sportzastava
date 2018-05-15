<script type="text/javascript">
    window.universe = (function ($, api) {
        var self = {};

        self.ajax = function(action, data, callback) {
            if (!api.isFunction(callback))
                callback = function () {};

            $.ajax({
                'type': 'POST',
                'url': '<?= SITE_DIR ?>',
                'cache': false,
                'dataType': 'json',
                'data': {
                    'action': action,
                    'ajax-mode': 'Y',
                    'data': data
                },
                success: callback,
                error: function(response){
                    console.error(response);
                }
            });
        };

        self.page = function (page, query, data, callback) {
            if (!api.isFunction(callback))
                callback = function () {};

            var url = '<?= SITE_DIR ?>';

            query = api.extend({}, query, {'page': page, 'page-mode': 'Y'});
            query = $.param(query);

            url = url + '?' + query;

            $.ajax({
                'type': 'POST',
                'url': url,
                'cache': false,
                'data': data,
                'success': callback,
                'error': function (response) {
                    console.error(response);
                }
            });
        };

        self.catalog = {};

        self.fixContainer = function(selector, settings){
            if (!api.isObject(settings))
                settings = {};

            var $element = $(selector),
                top = settings.top || '20px',
                markClass = settings.markClass || 'fixed',
                width = $element.width(),
                offset = $element.offset(),
                original = $element.attr('style');

            if (api.isEmpty(original))
                original = null;

            function fixPosition () {
                if ($element.css('position') !== 'fixed') {
                    if (offset.top < $(window).scrollTop()) {
                        $element.css({
                            'position': 'fixed',
                            'z-index': 100,
                            'top': top,
                            'left': offset.left,
                            'width': width
                        });
                        $element.addClass(markClass);
                    }
                } else if (offset.top >= $(window).scrollTop()) {
                    $element.attr('style', original);
                    $element.removeClass(markClass);
                }
            }

            fixPosition();
            self.on('scroll', fixPosition);
        };

        api.extend(self, api.ext.events(self));

        $(window).scroll(function(){
            self.trigger('scroll', $(window).scrollTop(), $(window).scrollLeft());
        });

        return self;
    })(jQuery, intec);
</script>
