<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $APPLICATION
 * @var array $arResult
 * @var array $arParams
 * @var array $characteristics
 * @var array $hasTab
 * @var array $activeTab
 * @var array $component
 */

$displayProp = false;
?>



    <div class="properties-list-wrapper">

        <ul class="properties-list-custom clearfix">
            <li class="col-xs-12 col-md-12">
                <span>Официальный дилер <?=$characteristics['SYSTEM_BRAND']['DISPLAY_VALUE']?></span>
            </li>
            <li class="col-xs-12 col-md-12">
                <span>Доставка бесплатно в город <?=$characteristics['SYSTEM_BRAND']['CITY']?> <a href="javascript:void(0)"><?=$characteristics['SYSTEM_BRAND']['DAY_PLUS']?> или позже</a></span>
            </li>

            <li class="col-xs-12 col-md-12">
                <span>Видели дешевле? <a href="javascript:void(0)" data-action="call">Сообщите нам!</a></span>
            </li>
        </ul>
        <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
        <script src="//yastatic.net/share2/share.js"></script>
        <div class="ya-share2" style="margin: 10px auto;" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter" data-size="s"></div>

    </div>
