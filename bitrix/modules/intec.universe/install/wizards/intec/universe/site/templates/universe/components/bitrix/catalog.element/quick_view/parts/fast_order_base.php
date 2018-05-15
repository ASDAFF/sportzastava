<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Type\Collection;
use Bitrix\Currency\CurrencyTable;
use Bitrix\Iblock;
use Bitrix\Main\Loader;
use Bitrix\Main\Context;
use Bitrix\Sale\Basket;
use Bitrix\Sale\Fuser;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\JavaScript;
?>
$(document).on('click', '.intec-item-detail .jsFastOrder', function(){
    var parameters;
    var itemId = $('.intec-item-detail').data('offer-id');
    var $itemQuantityInput = $(this).closest('.block-' + itemId).find('input.item-quantity-input');

    parameters = <?= JavaScript::toObject(array(
        'TITLE' => $arParams['FAST_ORDER_TITLE'],
        'SEND' => $arParams['FAST_ORDER_SEND_BUTTON'],
        'SHOW_COMMENT' => $arParams['FAST_ORDER_SHOW_COMMENT'],
        'PRICE_TYPE_ID' => $arParams['FAST_ORDER_PRICE_TYPE'],
        'DELIVERY_ID' => $arParams['FAST_ORDER_DELIVERY_TYPE'],
        'PAYMENT_ID' => $arParams['FAST_ORDER_PAYMET_TYPE'],
        'PERSON_TYPE_ID' => $arParams['FAST_ORDER_PAYER_TYPE'],
        'SHOW_ORDER_PROPERTIES' => $arParams['FAST_ORDER_SHOW_PROPERTIES'],
        'PROPERTY_PHONE' => $arParams['FAST_ORDER_PROPERTY_PHONE'],
        'AJAX_OPTION_ADDITIONAL' => $sTemplateId.'_FAST_ORDER'
    )) ?>;
    parameters.PRODUCT_ID = itemId;

    if ($itemQuantityInput) {
        parameters.PRODUCT_QUANTITY = $itemQuantityInput.val();
    }

    universe.components.show({
        component: 'intec.universe:sale.order.fast',
        template: '<?= $arParams['FAST_ORDER_TEMPLATE'] ?>',
        parameters: parameters,
        settings: {
            width: 800
        }
    });
});
