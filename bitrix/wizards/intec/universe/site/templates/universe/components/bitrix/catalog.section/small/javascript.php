<?php

/**
 * @var string $componentHash
 */

?>
<script type="text/javascript">
    $(document).ready(function(){
        var root = $('#<?= $componentHash ?>');
        var slider = root.find('.owl-carousel');

        slider.owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            navText: [
                '<i class="fa fa-arrow-left intec-cl-text-hover"></i>',
                '<i class="fa fa-arrow-right intec-cl-text-hover"></i>'
            ],
            autoplay: false,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            responsive:{
                0: {items: 1},
                640: {items: 2},
                840: {items: 3},
                1000: {items: 4}
            }
        });
    });
</script>