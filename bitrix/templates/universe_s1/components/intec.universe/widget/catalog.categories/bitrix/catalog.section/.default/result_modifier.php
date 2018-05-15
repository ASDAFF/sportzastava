<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\StringHelper;
use intec\core\bitrix\Component;

/**
 * @var array $arParams
 * @var array $arResult
 */

if (!Loader::includeModule('intec.core'))
    return;

$iIBlockId = ArrayHelper::getValue($arParams, 'IBLOCK_ID');
$sPropertySection = ArrayHelper::getValue($arParams, 'PROPERTY_SECTION');
$arSections = array();

$arUrlParameters = array(
    'BASKET_URL'
);

foreach ($arUrlParameters as $sParameter) {
    $sValue = ArrayHelper::getValue($arParams, $sParameter, '');
    $sValue = StringHelper::replaceMacros($sValue, array(
        'SITE_DIR' => SITE_DIR
    ));

    $arResult[$sParameter] = $sValue;
}


if (!empty($iIBlockId) && !empty($sPropertySection)) {
    $arResult['ITEMS'] = Component::SetElementsProperties(
        $arResult['ITEMS'],
        ArrayHelper::replaceKeys(
            array(
                'PROPERTY_LABEL_NEW' => 'LABEL_NEW',
                'PROPERTY_LABEL_RECOMMEND' => 'LABEL_RECOMMEND',
                'PROPERTY_LABEL_HIT' => 'LABEL_HIT',
            ),
            $arParams
        )
    );
    
    $arProperty = CIBlockProperty::GetList(array('SORT' => 'ASC'), array(
        'IBLOCK_ID' => $iIBlockId,
        'CODE' => $sPropertySection
    ));
    $arProperty = $arProperty->Fetch();

    if (!empty($arProperty)) {
        $arPropertyEnums = array();
        $rsPropertyEnums = CIBlockPropertyEnum::GetList(array('SORT' => 'ASC'), array(
            'IBLOCK_ID' => $iIBlockId,
            'PROPERTY_ID' => $arProperty['ID']
        ));

        while ($arPropertyEnum = $rsPropertyEnums->Fetch())
            $arPropertyEnums[$arPropertyEnum['XML_ID']] = $arPropertyEnum;

        $arOrder = ArrayHelper::getKeys($arPropertyEnums);
        $arOrder = ArrayHelper::flip($arOrder);
        $arIBlockSectionsId = array();

        foreach ($arResult['ITEMS'] as &$arItem) {
            $iIBlockSectionId = ArrayHelper::getValue($arItem, 'IBLOCK_SECTION_ID');

            if (!empty($iIBlockSectionId) && !ArrayHelper::isIn($iIBlockSectionId, $arIBlockSectionsId))
                $arIBlockSectionsId[] = $iIBlockSectionId;

            // Images
            $picturePreview = ArrayHelper::getValue($arItem, 'PREVIEW_PICTURE');
            $pictureDetail = ArrayHelper::getValue($arItem, 'DETAIL_PICTURE');
            if (empty($picturePreview) && !empty($pictureDetail))
                $picturePreview = $pictureDetail;
            if (empty($pictureDetail) && !empty($picturePreview))
                $pictureDetail = $picturePreview;

            $arItem['PREVIEW_PICTURE'] = $picturePreview;
            $arItem['DETAIL_PICTURE'] = $pictureDetail;
            $arItem['PREVIEW_PICTURE_300_300'] = array();
            $arItem['DETAIL_PICTURE_300_300'] = array();

            if ($picturePreview) {
                $arItem['PREVIEW_PICTURE_300_300'] = CFile::ResizeImageGet(
                    $picturePreview,
                    array('width' => 300, 'height' => 300),
                    BX_RESIZE_IMAGE_PROPORTIONAL_ALT
                );
            }
            if ($pictureDetail) {
                $arItem['DETAIL_PICTURE_300_300'] = CFile::ResizeImageGet(
                    $pictureDetail,
                    array('width' => 300, 'height' => 300),
                    BX_RESIZE_IMAGE_PROPORTIONAL_ALT
                );
            }
        }

        $arIBlockSections = array();
        $rsIBlockSections = CIBlockSection::GetList(array('SORT' => 'ASC'), array(
            'ID' => $arIBlockSectionsId
        ));

        $rsIBlockSections->SetUrlTemplates(
            $arParams['DETAIL_URL'],
            $arParams['SECTION_URL']
        );


        if (Loader::includeModule('sale')) {
            require_once('modifiers/base.php');
        } else if (Loader::includeModule('intec.startshop')) {
            require_once('modifiers/lite.php');
        }


        usort($arSections, function ($arSection1, $arSection2) use (&$arOrder) {
            $iOrder1 = ArrayHelper::getValue($arOrder, $arSection1['CODE']);
            $iOrder2 = ArrayHelper::getValue($arOrder, $arSection2['CODE']);

            if ($iOrder1 > $iOrder2) return 1;
            if ($iOrder1 < $iOrder2) return -1;
            return 0;
        });
    }
}

$arResult['SECTIONS'] = $arSections;