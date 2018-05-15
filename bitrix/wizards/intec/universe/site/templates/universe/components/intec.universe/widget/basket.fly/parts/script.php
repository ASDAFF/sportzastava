<?php

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\JavaScript;

/**
 * @var $APPLICATION
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 * @var array $arParams
 * @var array $arResult
 * @var string $sTemplateId
 */
?>
<script type="text/javascript">

    // Open/close flying basket
    $('#<?= $arResult['COMPONENT_HASH'] ?>').on('flyingBasket', function(e, data){
        var $wrapper = $(this),
            $content = $('.flying-basket_content_wrap', $wrapper),
            $active = $('.flying-basket_content.show', $wrapper),
            animateTime = 500,
            action = '';

        if (intec.isObject(data)) {
            action = data.action;
            var $target = data.target;
        } else {
            action = data;
        }

        switch (action) {
            case 'open':
                if (!intec.isEmpty($target)) {
                    $target.addClass('show');
                    if ($active) {
                        $active.removeClass('show');
                    }

                    $content.stop()
                        .animate({width: $target.outerWidth()}, animateTime, 'swing', function(){
                            $content.addClass('show');
                            $wrapper.addClass('show');
                        });
                } else {
                    console.error("$target isn't specified in flyingBasket event");
                }
                break;
            case 'close':
                $content.animate({width: 0}, animateTime, 'swing', function(){
                    $content.removeClass('show');
                    $wrapper.removeClass('show');
                    $active.removeClass('show');
                });
                break;
        }
    });

    $('#<?= $arResult['COMPONENT_HASH'] ?> .flying-basket_buttons_wrap span.flying-basket_button').on('click', function(){
        var $wrapper = $('#<?= $arResult['COMPONENT_HASH'] ?>'),
            $content = $('.flying-basket_content_wrap', $wrapper),
            $active = $('.flying-basket_content.show', $wrapper),
            target = $(this).data('target'),
            $target = $('.flying-basket_content.' + target, $wrapper);

        if (!$content.hasClass('show') || !$active.hasClass(target)) {
            $wrapper.trigger('flyingBasket', {action: 'open', 'target': $target});
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            $('.flying-basket_content_wrap > .'+ target).addClass('show');
        } else {
            $wrapper.trigger('flyingBasket', 'close');
        }
    });
    $('#<?= $arResult['COMPONENT_HASH'] ?>').on('click', '.flying-basket_close', function(){
        var $wrapper = $('#<?= $arResult['COMPONENT_HASH'] ?>');
        $wrapper.trigger('flyingBasket', 'close');
        $('.flying-basket_button', $wrapper).removeClass('active');
    });

<?php if (!defined('EDITOR')) { ?>
    $(document).ready(function(){
        <?php if (!empty($arResult['WEB_FORM'])) { ?>
            universe.forms.get(<?= JavaScript::toObject([
                'id' => $arResult['WEB_FORM']['ID'],
                'template' => '.default',
                'parameters' => [
                    'AJAX_OPTION_ADDITIONAL' => $arResult['COMPONENT_HASH'].'_FORM',
                    'CONSENT_URL' => $arParams['URL_CONSENT']
                ]
            ]) ?>, function(response){
                $('#<?= $arResult['COMPONENT_HASH'] ?> .flying-basket_form_container').html(response);
            });

            $('#<?= $arResult['COMPONENT_HASH'] ?> .jsShowForm').on('click', function(){
                universe.forms.show(<?= JavaScript::toObject([
                    'id' => $arResult['WEB_FORM']['ID'],
                    'template' => '.default',
                    'parameters' => [
                        'AJAX_OPTION_ADDITIONAL' => $arResult['COMPONENT_HASH'].'_FORM_POPUP',
                        'CONSENT_URL' => $arParams['URL_CONSENT']
                    ]
                ]) ?>);
            });
        <?php } ?>

        // Change quantity
        $('#<?= $arResult['COMPONENT_HASH'] ?> .quantity-wrapper').control(
            'numeric',
            {
                selectors: {
                    increment: '.quantity-up',
                    decrement: '.quantity-down',
                    input: '.quantity-value'
                }
            },
            function(configuration, instance){
                if (instance !== null) {
                    var productId = this.closest('[data-product-id]').data('product-id');
                    var timeout;

                    instance.on('change', function(event, value){
                        clearTimeout(timeout);
                        timeout = setTimeout(function(){
                            universe.basket.setQuantity({
                                id: productId,
                                quantity: value
                            });
                        }, 1000);
                    });
                }
            });
    });

    $('#<?= $arResult['COMPONENT_HASH'] ?>').on('click', '.delay-item, .delete-item, .add-item', function(){
        var $itemWrapper = $(this).closest('[data-product-id]'),
            productId = $itemWrapper.data('product-id'),
            quantity = $('.quantity-value', $itemWrapper).val(),
            data = {
                id: productId
            };

        if (quantity) {
            data.quantity = quantity;
        }

        if ($(this).hasClass('delay-item')) {
            data.delay = 'Y';
            universe.basket.add(data);
        } else if ($(this).hasClass('delete-item')) {
            universe.basket.remove(data);
        } else if ($(this).hasClass('add-item')) {
            universe.basket.add(data);
        }
    });

    $('#<?= $arResult['COMPONENT_HASH'] ?>').on('click', '.flying-basket_clear, .flying-basket_clear_delay', function(){
        if ($(this).hasClass('flying-basket_clear')) {
            universe.basket.clear({basket: 'Y'});
        } else if ($(this).hasClass('flying-basket_clear_delay')) {
            universe.basket.clear({delay: 'Y'});
        }
    });

    (function ($, api) {
        $(document).ready(function () {
            var root = $(<?= JavaScript::toObject('#'.$arResult['COMPONENT_HASH']) ?>),
                data = <?= JavaScript::toObject(array(
                    'component' => $component->getName(),
                    'template' => $this->getName(),
                    'parameters' => ArrayHelper::merge(
                        $arParams,
                        array(
                            'AJAX_MODE' => 'N',
                            'IS_OPENED' => 'N',
                            'ACTIVE_TAB' => 'flying-basket_content_basket'
                        )
                    )
                )) ?>,
                updated = false,
                update = function (isAdd) {
                    if (updated)
                        return;

                    if (api.isEmpty(isAdd)) {
                        isAdd = false;
                    }

                    var target = $('.flying-basket_buttons_wrap .flying-basket_button.active', root).data('target');
                    if (target) {
                        data.parameters.ACTIVE_TAB = target;
                    }

                    if (root.hasClass('show') || isAdd) {
                        data.parameters.IS_OPENED = 'Y';
                    }

                    updated = true;
                    universe.components.get(data, function (result) {
                        var scrollElementSelector = '.' + target + ' .flying-basket_table_products_wrapper';
                        var scrollTop = $(scrollElementSelector, root).scrollTop();

                        root = $(result).replaceAll(root);

                        $(scrollElementSelector, root).scrollTop(scrollTop);
                    });
                };

            <?php if ($arParams['OPEN_AFTER_ADD'] == 'Y') { ?>
                universe.basket.once('add', function(event, data){
                    if (data.delay !== 'Y')
                        update(true);
                });
            <?php } ?>
            universe.basket.once('update', function(){ update(false); });
            universe.compare.once('update', function(){ update(false); });
        });
    })(jQuery, intec);
<?php } ?>
</script>
