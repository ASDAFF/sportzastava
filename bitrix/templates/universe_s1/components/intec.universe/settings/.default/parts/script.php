<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var string $sTemplateId
 */
?>
<script type="text/javascript">
    $('#<?= $sTemplateId ?>').on('open', function(){
        $('.universe-settings-bg', this).fadeIn(500);
        $(this).addClass('open');
    }).on('close', function(){
        $('.universe-settings-bg', this).fadeOut(500);
        $(this).removeClass('open');
    });


    $('#<?= $sTemplateId ?> .universe-settings-button-open').on('click', function(){
        var $component = $('#<?= $sTemplateId ?>');
        if ($component.hasClass('open')) {
            $component.trigger('close');
        } else {
            $component.trigger('open');
        }

    });

    $('#<?= $sTemplateId ?> .universe-settings-bg').on('click', function(){
        $('#<?= $sTemplateId ?>').trigger('close');
    });

    $('#<?= $sTemplateId ?> .settings-color-wrapper .jsSelectColor').on('click', function(){
        var $wrapper = $(this).closest('.settings-color-wrapper'),
            $input = $wrapper.closest('.universe-settings-item-wrapper').find('input[type=hidden]');
        $wrapper.addClass('active');
        $wrapper.siblings().removeClass('active');
        $input.val($(this).data('value'));
        $input.trigger('change');
    });

    $('#<?= $sTemplateId ?> .jsRadioInput').on('change', function(){
        var $label = $(this).closest('.jsRadioItem');
        if ($(this).prop('checked')) {
            $label.addClass('checked');
            $label.siblings().removeClass('checked');
        } else {
            $label.removeClass('checked');
        }
    });

    $('#<?= $sTemplateId ?> .jsCheckboxInput').on('change', function(){
        var $label = $(this).closest('label');
        if ($(this).prop('checked')) {
            $label.addClass('checked');
        } else {
            $label.removeClass('checked');
        }
    });

    $('#<?= $sTemplateId ?> form').on('change', 'input, select, textarea',  function(){
        var $form = $(this).closest('form');
        $form.submit();
    });

    $('#<?= $sTemplateId ?> .settings-color-custom').each(function(){
        var $wrapper = $(this),
            $li = $wrapper.closest('li'),
            $input = $wrapper.closest('.universe-settings-item').find('input[type=hidden]'),
            value = $wrapper.css('background-color');

        $wrapper.ColorPicker({
            color: value,
            onSubmit: function (hsb, hex, rgb) {
                var value = '#' + hex;
                $wrapper.css({'background-color': value});
                $input.val(value);
                $input.trigger('change');
                $li.addClass('active');
                $li.siblings().removeClass('active');
            }
        });
    });

    $('#<?= $sTemplateId ?> .nano').nanoScroller();
    $('#<?= $sTemplateId ?> .universe-settings-group a').on('shown.bs.tab', function(e){
        var $component = $('#<?= $sTemplateId ?>');
        $('.nano', $component).nanoScroller();
        $('form input[name="active_tab"]', $component).val($(this).attr('aria-controls'));
    });

    intec.ui.update();
</script>