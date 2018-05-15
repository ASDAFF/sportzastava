<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\StringHelper;
use intec\constructor\models\Build;

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!CModule::IncludeModule('intec.startshop'))
    return;

if (!Loader::includeModule('intec.core'))
    return;

if (!Loader::includeModule('intec.constructor') && !Loader::includeModule('intec.constructorlite'))
    return;

$oBuild = Build::getCurrent();
$bAgreementShow = true;

if (!empty($oBuild)) {
    $oPage = $oBuild->getPage();
    $oProperties = $oPage->getProperties();
    $bAgreementShow = $oProperties->get('inform_about_processing_personal_data');
}

$arResult['AGREEMENT'] = [
    'SHOW' => ArrayHelper::getValue($arParams, 'SHOW_AGREEMENT') == 'Y' && $bAgreementShow,
    'URL' => ArrayHelper::getValue($arParams, 'URL_AGREEMENT')
];

if ($arResult['AGREEMENT']['SHOW'] && !empty($arResult['AGREEMENT']['URL'])) {
    $arResult['AGREEMENT']['SHOW'] = true;
    $arResult['AGREEMENT']['URL'] = StringHelper::replaceMacros($arResult['AGREEMENT']['URL'], [
        'SITE_DIR' => SITE_DIR
    ]);
} else {
    $arResult['AGREEMENT']['SHOW'] = false;
    $arResult['AGREEMENT']['URL'] = null;
}