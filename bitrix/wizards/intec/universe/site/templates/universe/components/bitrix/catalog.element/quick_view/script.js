(function ($, api) {

    $(document).ready(function(){

        // TODO images must be 75px X 75px regardless of window size
        $('.intec-item-detail .slider .owl-carousel').owlCarousel({
            loop: false,
            margin: 20,
            nav: false,
            responsive:{
                0: { items: 2 },
                600: { items: 3 },
                800: { items: 4 },
                1000: { items: 5 },
                1200: { items: 6 }
            }
        });

        // Light gallery
        $('.intec-item-detail .item-bigimage-container.light-gallery').on('showGallery', function(){
            var $component =$('.intec-item-detail'),
                $mainImage = $('.item-bigimage-wrap', $component),
                mainImageSrc = $mainImage.attr('href'),
                currentOffer = $component.data('offer-id'),
                gallerySelector = '#item-offer-'+ currentOffer,
                dynamicGallery = [],
                $images,
                index = 0;

            if ($(gallerySelector).length > 0) {
                $images = $(gallerySelector + ' [data-src]', $component);
            } else {
                if ($('.item-default-images', $component).length > 0) {
                    $images = $('.item-default-images [data-src]', $component);
                    gallerySelector = '.item-default-images';
                } else {
                    $images = $('.slider-container [data-src]', $component);
                    gallerySelector = '.slider-container';
                }
            }

            var images = [];
            $images.each(function(){
                var image = $(this).data('src');
                if (image) {
                    images.push(image);
                }
            });

            if (images.indexOf(mainImageSrc) < 0) {
                dynamicGallery.push({src: mainImageSrc, thumb: mainImageSrc});
            }

            api.each(images, function(i, image){
                var newItem = {src: image, thumb: image};
                dynamicGallery.push(newItem);
                if (mainImageSrc == image) {
                    index = dynamicGallery.length - 1;
                }
            });

            var $gallery = $(gallerySelector, $component);
            if ($gallery.length) {
                $gallery.lightGallery({
                        share: false,
                        dynamic: true,
                        dynamicEl: dynamicGallery,
                        index: index
                    })
                    .off('onAfterOpen.lg')
                    .on('onAfterOpen.lg', function (event) {
                        $gallery.data('lightGallery').slide(index);
                    });
            } else {
                $('.item-bigimage-wrap', $component).lightGallery({
                    share: false,
                    dynamic: false,
                    index: index
                });
            }
        });

        $('.intec-item-detail .item-bigimage-wrap').on('click', function(){
            $('.intec-item-detail .item-bigimage-container.light-gallery').trigger('showGallery');
        });

        // When main image changed
        $('.intec-item-detail .item-bigimage').on('changeImage', function(event, width, height){
            var $img = $(this),
                imgSrc = $img.attr('src'),
                $wrap = $img.closest('.item-bigimage-wrap'),
                duration = 120; // duration animation

            // if lightGallery on
            if ($wrap.closest('.item-bigimage-container').hasClass('light-gallery')) {
                $wrap.attr('href', imgSrc);
            }

            // if zoom on
            if ($img.is('.zoom')) {
                $wrap.trigger('zoom.destroy');
                $img.off('mouseover');
                $img.off('mouseleave');

                if ($(window).width() > 720 && intec.isEmpty(width) && intec.isEmpty(height) || ($wrap.width() < width || $wrap.height() < height)) {
                    $wrap.zoom({
                        url: imgSrc,
                        duration: duration
                    });

                    $wrap.on('mouseover', function () {
                        $img.stop().fadeOut(duration)
                    }).on('mouseleave', function () {
                        $img.stop().fadeIn(duration);
                    });
                }
            }
        }).trigger('changeImage');

        // Choose main image from additional images
        $(document).on('click', '.intec-item-detail .slider .slider-item', function(){
            var $this = $(this),
                $wrapper = $(this).closest('.intec-item-detail'),
                imageSrc = $('.slider-image', $this).data('src'),
                $img = $('.item-bigimage', $wrapper);

            $this.closest('.slider').find('.slider-item').removeClass('active');
            $img.attr('src', imageSrc);
            $this.addClass('active');

            $img.trigger('changeImage');
        });

        // Choose product offer
        $(document).on('click', '.intec-item-detail .sku-property-value', function(){
            var $value = $(this),
                propertyCode = $value.closest('[data-property-code]').data('property-code'),
                propertyValue = $value.data('property-value');

            if ($value.is('.disabled, .active'))
                return;

            $value.addClass('active');
            $value.siblings().removeClass('active');

            offers.setCurrentOfferByPropertyValue(propertyCode, propertyValue);
        });

        //universe.fixContainer('.intec-item-detail .item-bigimage-container');
    });

})(jQuery, intec);