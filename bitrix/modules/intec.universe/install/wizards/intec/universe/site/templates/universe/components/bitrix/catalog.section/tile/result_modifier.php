<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use intec\core\helpers\StringHelper;

/**
 * @var array $arParams
 */

if (!Loader::includeModule('intec.core'))
    return;

$sPriceFrom = Loc::getMessage('PRICE_FROM');

/** Коды свойств маркеров */
$sPopularCode = ArrayHelper::getValue($arParams, 'PROPERTY_IS_POPULAR');
$sNewCode = ArrayHelper::getValue($arParams, 'PROPERTY_IS_NEW');
$sRecommendationCode = ArrayHelper::getValue($arParams, 'PROPERTY_IS_RECOMMENDATION');

/** Путь к корзине */
$sBasketUrl = trim(ArrayHelper::getValue($arParams, 'BASKET_URL'));
$sBasketUrl = StringHelper::replaceMacros($sBasketUrl, ['SITE_DIR' => SITE_DIR]);

if (Loader::includeModule('catalog')) {
    include(__DIR__.'/modifiers/base.php');
} else if (Loader::includeModule('intec.startshop')) {
    include(__DIR__.'/modifiers/lite.php');
}