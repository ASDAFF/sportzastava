<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 */

Loader::includeModule('intec.core');

$sPriceFrom = Loc::getMessage('CATALOG_COMPARE_PRICE_FROM');

$arElementID = [];

/** Обработка изображений */
foreach ($arResult['ITEMS'] as $elementKey => $arElement) {
    /** @var array $arElementID - Список ID элементов */
    $arElementID[] = $arElement['ID'] == $arElement['~ID'] ? $arElement['ID'] : $arElement['~ID'];

    $picture = [];

    $arPreviewPicture = ArrayHelper::getValue($arElement, 'PREVIEW_PICTURE');
    $arDetailPicture = ArrayHelper::getValue($arElement, 'DETAIL_PICTURE');
    $sName = ArrayHelper::getValue($arElement, 'NAME');
    $sTitle = ArrayHelper::getValue($arElement, ['IPROPERTY_VALUES', 'ELEMENT_PREVIEW_PICTURE_FILE_TITLE']);
    $sAlt = ArrayHelper::getValue($arElement, ['IPROPERTY_VALUES', 'ELEMENT_PREVIEW_PICTURE_FILE_ALT']);

    $sImgTitle = !empty($sTitle) ? $sTitle : $sName;
    $sImgAlt = !empty($sAlt) ? $sAlt : $sName;

    if (!empty($arPreviewPicture)) {
        $picture = CFile::ResizeImageGet(
            $arPreviewPicture['ID'],
            array(
                'width' => 195,
                'height' => 195,
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT
            )
        );
    } elseif (!empty($arDetailPicture))  {
        $picture = CFile::ResizeImageGet(
            $arDetailPicture['ID'],
            array(
                'width' => 195,
                'height' => 195,
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT
            )
        );
    } else {
        $picture['src'] = SITE_TEMPLATE_PATH.'/images/noimg/no-img.png';
        $sImgTitle = $sName;
        $sImgAlt = $sName;
    }

    $picture['imgTitle'] = $sImgTitle;
    $picture['imgAlt'] = $sImgAlt;

    $arResult['ITEMS'][$elementKey]['PICTURE'] = $picture;
}
unset($picture, $arPreviewPicture, $arDetailPicture, $sName, $sTitle, $sAlt, $sImgTitle, $sImgAlt);

if (Loader::includeModule('catalog')) {
    include('modifiers/base.php');
} else if (Loader::includeModule('intec.startshop')) {
    include('modifiers/lite.php');
}