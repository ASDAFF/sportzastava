<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 */

?>
<script>
    // Delete property from compare
    $(document).on('click', '.bx_compare .data_table_props tr td:first-of-type i', function(){
        var idProp = $(this).data('id-prop');
        $(this).closest('tr').addClass('tr-property-invisible');

        var colnum = $(this).closest('tr').prevAll("tr").length;
        console.log(colnum);
        $('.frame.props').find("tr:eq(" + (colnum) + ")").addClass('tr-property-invisible');

        $('.bx_filtren_container .property[data-id-prop='+idProp+']').addClass('property-visible');

        return false;
    });
    // Add property in compare
    $(document).on('click', '.bx_filtren_container .property', function(){
        var idProp = $(this).data('id-prop');
        $(this).removeClass('property-visible');

        $('.bx_compare .data_table_props tr td:first-of-type i[data-id-prop='+idProp+']').closest('tr').removeClass('tr-property-invisible');

        return false;
    });

    // Delete product from compare
    $(document).on('click', '.compare-item .remove_compare', function(){
        var product_id = $(this).closest('.compare-item').data('product-id');

        var colnum = $(this).closest("td").prevAll("td").length;
        $(this).closest("td").remove();
        $(".data_table_props").find("tr").find("td:eq(" + (colnum+1) + ")").remove();


        if ($('.frame.top .compare_view td').length <= 0) {
            $('#bx_catalog_compare_block').remove();
            $('.compare-result-empty').show();
        } else {
            initSly();
        }

        universe.compare.remove({
            id: product_id,
            list: '<?=$arParams['NAME']?>',
            iblock: '<?=$arParams['IBLOCK_ID']?>'
        }, function(response){

        });

        return false;
    });

    // Clear compare
    $(document).on('click', '.compare-result-clear', function(){
        $('#bx_catalog_compare_block').remove();
        $('.compare-result-empty').show();

        universe.compare.clear({
            list: '<?=$arParams['NAME']?>',
        }, function(response){
            $.ajax({
                type: 'POST',
                url: '',
                cache: false,
                data: {
                    ajax_action: 'Y'
                }
            });
        });

        return false;
    });

    // hover tr
    $(document).on({
            mouseenter: function () {
                var colnum = $(this).prevAll("tr").length;
                $(this).addClass('prop_hover');
                $('.frame.props').find("tr:eq(" + (colnum) + ")").addClass('prop_hover');
            },
            mouseleave: function () {
                var colnum = $(this).prevAll("tr").length;
                $(this).removeClass('prop_hover');
                $('.frame.props').find("tr:eq(" + (colnum) + ")").removeClass('prop_hover');
            }
        },
        '.prop_title_table tr');

    $(document).on({
            mouseenter: function () {
                var colnum = $(this).prevAll("tr").length;
                $(this).addClass('prop_hover');
                $('.prop_title_table').find("tr:eq(" + (colnum) + ")").addClass('prop_hover');
            },
            mouseleave: function () {
                var colnum = $(this).prevAll("tr").length;
                $(this).removeClass('prop_hover');
                $('.prop_title_table').find("tr:eq(" + (colnum) + ")").removeClass('prop_hover');
            }
        },
        '.frame.props tr');
</script>

<script>
    function initSly(){

        $('.wrapp_scrollbar').show();

        var $frame  = $(document).find('.frame');
        var $slidee = $frame.children('ul').eq(0);
        var $wrap   = $frame.parent();

        // Call Sly on frame
        $frame.sly({
            horizontal: 1,
            itemNav: "basic",
            smart: 1,
            mouseDragging: 0,
            touchDragging: 0,
            releaseSwing: 1,
            startAt: 1,
            scrollBar: $(".scrollbar"),
            scrollBy: 1,
            speed: 1000,
            elasticBounds: 0,
            //easing:"swing",
            dragHandle: 1,
            dynamicHandle: 1,
            clickBar: 0,
            forward: $(".forward"),
            backward: $(".backward")
        });
        $frame.sly('reload');

        if ($('.frame.top').outerWidth() > $('.frame.top .wraps')[0].scrollWidth) {
            $('.wrapp_scrollbar').hide();
        }

        var arrayTR = $('.frame.props .data_table_props tr');
        $('.compare_view.clone tr').each(function(index) {
            var trHeight = $(this).innerHeight();
            $(arrayTR[index]).height(trHeight);
        });
    }

    function createTableCompare(originalTable, appendDiv){
        var clone = originalTable.clone().removeAttr('id').addClass('clone');
        appendDiv.append(clone);
    }

    $(document).ready(function(){
        createTableCompare($('.data_table_props'), $('.prop_title_table'));
        initSly();
    });
    $(window).resize(function() {
        initSly();
    });
</script>

