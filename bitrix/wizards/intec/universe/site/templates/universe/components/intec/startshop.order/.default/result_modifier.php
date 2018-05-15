<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 */

$arDefaultParams = array(
    'USE_ADAPTABILITY' => 'N',
    'USE_ITEMS_PICTURES' => 'Y',
    'USE_BUTTON_BASKET' => 'N',
    'URL_BASKET' => '',
    'VERIFY_CONSENT_TO_PROCESSING_PERSONAL_DATA' => 'N',
    'URL_RULES_OF_PERSONAL_DATA_PROCESSING' => ''
);

$arParams = array_merge($arDefaultParams, $arParams);

$arParams['USE_BUTTON_BASKET'] = $arParams['USE_BUTTON_BASKET'] == 'Y' && !empty($arParams['URL_BASKET']) ? 'Y' : 'N';
$arParams['VERIFY_CONSENT_TO_PROCESSING_PERSONAL_DATA'] = $arParams['VERIFY_CONSENT_TO_PROCESSING_PERSONAL_DATA'] == 'Y' && !empty($arParams['URL_RULES_OF_PERSONAL_DATA_PROCESSING']) ? 'Y' : 'N';

if ($arParams['USE_ITEMS_PICTURES'] == 'Y') {
    foreach ($arResult['ITEMS'] as &$arItem) {
        $arItem['PICTURE'] = CStartShopToolsIBlock::GetItemPicture($arItem, 200, 200, true);

        if (empty($arItem['PICTURE']))
            $arItem['PICTURE']['SRC'] = $this->GetFolder() . '/images/image.empty.png';
    }
}