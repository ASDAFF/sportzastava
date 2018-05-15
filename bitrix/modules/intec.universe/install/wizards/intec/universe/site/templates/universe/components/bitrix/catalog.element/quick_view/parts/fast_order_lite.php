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

    parameters = <?= JavaScript::toObject(array(
        'TITLE' => $arParams['FAST_ORDER_TITLE'],
        'SEND' => $arParams['FAST_ORDER_SEND_BUTTON'],
        'CURRENCY' => $arParams['CURRENCY'],
        'DELIVERY' => $arParams['FAST_ORDER_DELIVERY'],
        'PAYMENT' => $arParams['FAST_ORDER_PAYMENT'],
        'STATUS' => $arParams['FAST_ORDER_STATUS'],
        'SHOW_PROPERTIES' => $arParams['FAST_ORDER_SHOW_PROPERTIES'],
        'SHOW_AGREEMENT' => $arParams['FAST_ORDER_SHOW_AGREEMENT'],
        'URL_AGREEMENT' => $arParams['FAST_ORDER_URL_AGREEMENT'],
        'AJAX_OPTION_ADDITIONAL' => $sTemplateId.'_FAST_ORDER'
    )) ?>;

    var $itemDetail = $('.intec-item-detail'),
    $quantityInput = $('.item-quantity-input', $itemDetail);
    parameters.PRODUCT = $itemDetail.data('offer-id');
    parameters.PRODUCT_QUANTITY = 1;
    if ($quantityInput) {
        parameters.PRODUCT_QUANTITY = $quantityInput.val();
    }

    universe.components.show({
        component: 'intec.universe:oneclickbuy',
        template: '<?= $arParams['FAST_ORDER_TEMPLATE'] ?>',
        parameters: parameters,
        settings: {
            width: 800
        }
    });
});
