<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;
use intec\core\helpers\ArrayHelper;

/**
 * @var array $arCurrentValues
 */

if (!Loader::includeModule('iblock') || !Loader::includeModule('intec.core'))
    return;


$relationProperties = array();
$sectionProperties = array();
$iBlockProp = array();
$iBlockTypes = array();
$arIBlockSale = array();
$arIBlockConditions = array();
$webFormsList = array();
$arIcons = array();
$arPromo = array();
$arTeaser = array();
$arOverviews = array();
$videoProperty = array();
$arPhoto = array();
$arSection = array();
$arServices = array();
$arPricesTypes = array();
$arCurrencies = array();


if (Loader::includeModule('catalog')) {
    require_once('parameters/base.php');
} else if (Loader::includeModule('intec.startshop')) {
    require_once('parameters/lite.php');
}

$arTemplateParameters['USE_BASKET'] = array(
    'PARENT' => 'ADDITIONAL_SETTINGS',
    'NAME' => GetMessage('C_SHARES_USE_BASKET'),
    'TYPE' => 'LIST',
    'DEFAULT' => 'settings',
    'VALUES' => array(
        'settings' => GetMessage('C_SHARES_USE_BASKET_FROM_SETTINGS'),
        'Y'        => GetMessage('C_SHARES_USE_BASKET_YES'),
        'N'        => GetMessage('C_SHARES_USE_BASKET_NO'),
    )
);

if (!empty($arCurrentValues['IBLOCK_TYPE']) && !empty($arCurrentValues['IBLOCK_ID'])) {

    // All IBlocks
    $IBlocks = array();
    $IBlocksByTypes = array();
    $rsIBlocks = CIBlock::GetList(
        array('SORT' => 'ASC'),
        array()
    );
    while ($row = $rsIBlocks->Fetch()) {
        $IBlocks[$row['ID']] = $IBlocksByTypes[$row['IBLOCK_TYPE_ID']][$row['ID']] = '[' . $row['ID'] . '] ' . $row['NAME'];
    }
    unset($rsIBlocks);


    // Properties of main IBLOCK
    $properties = CIBlockProperty::GetList(
        array('sort' => 'asc'),
        array(
            'ACTIVE' => 'Y',
            'IBLOCK_TYPE' => $arCurrentValues['IBLOCK_TYPE'],
            'IBLOCK_ID' => $arCurrentValues['IBLOCK_ID'],
        )
    );
    while ($propFields = $properties->Fetch()) {
        $propName = '[' . $propFields['CODE'] . ']' . $propFields['NAME'];

        $iBlockProp[$propFields['CODE']] = $propName;
        switch ($propFields['PROPERTY_TYPE']) {
            case 'E':
                $relationProperties[$propFields['CODE']] = $propName;
                break;
            case 'G':
                $sectionProperties[$propFields['CODE']] = $propName;
                break;
        }
    }
    unset($propFields, $properties);

    // IBlocks types
    $iBlockTypes = CIBlockParameters::GetIBlockTypes();

    // IBLOCK_ID for catalog elements
    if (!empty($arCurrentValues['IBLOCK_TYPE_FOR_SALE'])) {
        $arIBlockSale = ArrayHelper::getValue($IBlocksByTypes, $arCurrentValues['IBLOCK_TYPE_FOR_SALE'], array());
    }

    // IBLOCK for conditions
    if (!empty($arCurrentValues['TYPE_OF_BLOCK_FOR_CONDITIONS'])) {
        $arIBlockConditions = ArrayHelper::getValue($IBlocksByTypes, $arCurrentValues['TYPE_OF_BLOCK_FOR_CONDITIONS'], array());
    }

    if ($arCurrentValues['PROPERTY_DETAIL_TEMPLATE'] == 'extended') {

        // IBLOCK for icons
        if (!empty($arCurrentValues['PROPERTY_IBLOCK_TYPE_ICONS'])) {
            $arIcons = ArrayHelper::getValue($IBlocksByTypes, $arCurrentValues['PROPERTY_IBLOCK_TYPE_ICONS'], array());
        }

        // IBLOCK for promo
        if (!empty($arCurrentValues['PROPERTY_IBLOCK_TYPE_PROMO'])) {
            $arPromo = ArrayHelper::getValue($IBlocksByTypes, $arCurrentValues['PROPERTY_IBLOCK_TYPE_PROMO'], array());
        }

        // IBLOCK for teaser
        if (!empty($arCurrentValues['PROPERTY_IBLOCK_TYPE_TEASER'])) {
            $arTeaser = ArrayHelper::getValue($IBlocksByTypes, $arCurrentValues['PROPERTY_IBLOCK_TYPE_TEASER'], array());
        }

        // IBLOCK for video
        if (!empty($arCurrentValues['PROPERTY_IBLOCK_TYPE_OVERVIEWS'])) {
            $arOverviews = ArrayHelper::getValue($IBlocksByTypes, $arCurrentValues['PROPERTY_IBLOCK_TYPE_OVERVIEWS'], array());
        }

        // IBLOCK for photo
        if (!empty($arCurrentValues['PROPERTY_IBLOCK_TYPE_PHOTO'])) {
            $arPhoto = ArrayHelper::getValue($IBlocksByTypes, $arCurrentValues['PROPERTY_IBLOCK_TYPE_PHOTO'], array());
        }

        // IBLOCK for sections
        if (!empty($arCurrentValues['PROPERTY_IBLOCK_TYPE_SECTION'])) {
            $arSection = ArrayHelper::getValue($IBlocksByTypes, $arCurrentValues['PROPERTY_IBLOCK_TYPE_SECTION'], array());
        }

        // IBLOCK for services
        if (!empty($arCurrentValues['PROPERTY_IBLOCK_TYPE_SERVICES'])) {
            $arServices = ArrayHelper::getValue($IBlocksByTypes, $arCurrentValues['PROPERTY_IBLOCK_TYPE_SERVICES'], array());
        }

        // Video IBLOCK link property
        if (!empty($arCurrentValues['PROPERTY_IBLOCK_ID_OVERVIEWS'])) {
            $properties = CIBlockProperty::GetList(
                array("sort" => "asc"),
                array(
                    "ACTIVE" => "Y",
                    "IBLOCK_ID" => $arCurrentValues['PROPERTY_IBLOCK_ID_OVERVIEWS']
                )
            );
            while ($propFields = $properties->GetNext()) {
                $videoProperty[$propFields["CODE"]] = '[' . $propFields["CODE"] . ']' . $propFields["NAME"];
            }
            unset($propFields, $properties);
        }
    }
}



/** ---------- DATA_SOURCE ---------- */
$arTemplateParameters += array(
    'PROPERTY_FOR_PERIOD' => array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('PROPERTY_FOR_PERIOD'),
        'TYPE' => 'LIST',
        'VALUES' => $iBlockProp,
        'ADDITIONAL_VALUES' => 'Y'
    ),
    'PROPERTY_FOR_SALE_PERCENT' => array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('PROPERTY_FOR_SALE_PERCENT'),
        'TYPE' => 'LIST',
        'VALUES' => $iBlockProp,
        'ADDITIONAL_VALUES' => 'Y'
    ),
    'PROPERTY_RECOMENDATIONS' => array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('PROPERTY_RECOMENDATIONS'),
        'TYPE' => 'LIST',
        'VALUES' => $relationProperties
    ),
    'PROPERTY_OF_BLOCK_FOR_CONDITIONS' => array(
        'PARENT' => 'DATA_SOURCE',
        'NAME' => GetMessage('PROPERTY_OF_BLOCK_FOR_CONDITIONS'),
        'TYPE' => 'LIST',
        'VALUES' => $relationProperties,
    )
);
if ($arCurrentValues['PROPERTY_DETAIL_TEMPLATE'] == 'extended') {
    $arTemplateParameters += array(
        'PROPERTY_FOR_ICONS' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('PROPERTY_FOR_ICONS'),
            'TYPE' => 'LIST',
            'VALUES' => $relationProperties,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_FOR_PROMO' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('PROPERTY_FOR_PROMO'),
            'TYPE' => 'LIST',
            'VALUES' => $relationProperties,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_FOR_TEASER' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('PROPERTY_FOR_TEASER'),
            'TYPE' => 'LIST',
            'VALUES' => $relationProperties,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_TEASER_HEADER' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('PROPERTY_TEASER_HEADER'),
            'TYPE' => 'LIST',
            'VALUES' => $iBlockProp,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_FOR_OVERVIEWS' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('PROPERTY_FOR_OVERVIEWS'),
            'TYPE' => 'LIST',
            'VALUES' => $relationProperties,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_OVERVIEWS_LINK' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('PROPERTY_OVERVIEWS_LINK'),
            'TYPE' => 'LIST',
            'VALUES' => $videoProperty,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_FOR_PHOTO' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('PROPERTY_FOR_PHOTO'),
            'TYPE' => 'LIST',
            'REFRESH' => 'Y',
            'VALUES' => $relationProperties,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_FOR_SECTION' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('PROPERTY_FOR_SECTION'),
            'TYPE' => 'LIST',
            'VALUES' => $sectionProperties,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_SECTION_HEADER' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('PROPERTY_SECTION_HEADER'),
            'TYPE' => 'LIST',
            'VALUES' => $iBlockProp,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_FOR_SERVICES' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('PROPERTY_FOR_SERVICES'),
            'TYPE' => 'LIST',
            'VALUES' => $relationProperties,
            'ADDITIONAL_VALUES' => 'Y'
        )
    );
}
/** ---------- /DATA_SOURCE ---------- */


/** ---------- DETAIL_SETTINGS ---------- */
if ($arCurrentValues['PROPERTY_DETAIL_TEMPLATE'] == 'extended') {
    $arTemplateParameters['PROPERTY_SHOW_FORM'] = array(
        'PARENT' => 'DETAIL_SETTINGS',
        'NAME' => GetMessage('PROPERTY_SHOW_FORM'),
        'TYPE' => 'CHECKBOX',
        'REFRESH' => 'Y'
    );
    if ($arCurrentValues['PROPERTY_SHOW_FORM'] == 'Y') {
        $arTemplateParameters['PROPERTY_FORM_ID'] = array(
            'PARENT' => 'DETAIL_SETTINGS',
            'NAME' => GetMessage('PROPERTY_FORM_ID'),
            'TYPE' => 'LIST',
            'VALUES' => $webFormsList,
            'ADDITIONAL_VALUES' => 'Y',
            'REFRESH' => 'Y'
        );
        if ($arCurrentValues['PROPERTY_FORM_ID']) {
            $arTemplateParameters += array(
                'FORM_TEXT' => array(
                    'PARENT' => 'DETAIL_SETTINGS',
                    'NAME' => GetMessage('PROPERTY_FORM_TEXT'),
                    'TYPE' => 'STRING',
                )
            );

        }
    }
}
$arTemplateParameters['USE_SHARE'] = array(
    'PARENT' => 'DETAIL_SETTINGS',
    'NAME' => GetMessage('T_IBLOCK_DESC_NEWS_USE_SHARE'),
    'TYPE' => "CHECKBOX",
    'MULTIPLE' => 'N',
    'VALUE' => 'Y',
    'DEFAULT' =>'N',
    'REFRESH'=> 'Y',
);
if ($arCurrentValues['USE_SHARE'] == 'Y') {
    $arTemplateParameters += array(
        'SHARE_HIDE' => array(
            'PARENT' => 'DETAIL_SETTINGS',
            'NAME' => GetMessage('T_IBLOCK_DESC_NEWS_SHARE_HIDE'),
            'TYPE' => 'CHECKBOX',
            'VALUE' => 'Y',
            'DEFAULT' => 'N'
        ),
        'SHARE_TEMPLATE' => array(
            'PARENT' => 'DETAIL_SETTINGS',
            'NAME' => GetMessage('T_IBLOCK_DESC_NEWS_SHARE_TEMPLATE'),
            'DEFAULT' => '',
            'TYPE' => 'STRING',
            'MULTIPLE' => 'N',
            'COLS' => 25,
            'REFRESH'=> 'Y',
        )
    );

    $shareComponentTemlate = trim($arCurrentValues['SHARE_TEMPLATE']);
    if (strlen($shareComponentTemlate) <= 0) {
        $shareComponentTemlate = false;
    }

    include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/components/bitrix/main.share/util.php');

    $arHandlers = __bx_share_get_handlers($shareComponentTemlate);

    $arTemplateParameters += array(
        'SHARE_HANDLERS' => array(
            'PARENT' => 'DETAIL_SETTINGS',
            'NAME' => GetMessage('T_IBLOCK_DESC_NEWS_SHARE_SYSTEM'),
            'TYPE' => 'LIST',
            'MULTIPLE' => 'Y',
            'VALUES' => $arHandlers['HANDLERS'],
            'DEFAULT' => $arHandlers['HANDLERS_DEFAULT']
        ),
        'SHARE_SHORTEN_URL_LOGIN' => array(
            'PARENT' => 'DETAIL_SETTINGS',
            'NAME' => GetMessage('T_IBLOCK_DESC_NEWS_SHARE_SHORTEN_URL_LOGIN'),
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ),
        'SHARE_SHORTEN_URL_KEY' => array(
            'PARENT' => 'DETAIL_SETTINGS',
            'NAME' => GetMessage('T_IBLOCK_DESC_NEWS_SHARE_SHORTEN_URL_KEY'),
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        )
    );
}
/** ---------- /DETAIL_SETTINGS ---------- */


/** ---------- BASE ---------- */
$arTemplateParameters += array(
    'PROPERTY_LIST_TEMPLATE' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('PROPERTY_LIST_TEMPLATE'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            'settings' => GetMessage('PROPERTY_LIST_TEMPLATE_SETTINGS'),
            '.default' => GetMessage('PROPERTY_LIST_TEMPLATE_DEFAULT'),
            'blocks' => GetMessage('PROPERTY_LIST_TEMPLATE_BLOCKS'),
            'news.list' => GetMessage('PROPERTY_LIST_TEMPLATE_LIST')
        )
    ),
    'HEAD_PICTURE_TYPE' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('HEAD_PICTURE_TYPE_TMP'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            'SETTINGS' => GetMessage('HEAD_PICTURE_TYPE_TMP_SETTINGS'),
            'FULL_PICTURE' => GetMessage('HEAD_PICTURE_TYPE_TMP_FULL'),
            'NOT_FULL_PICTURE' => GetMessage('HEAD_PICTURE_TYPE_TMP_NOT_FULL')
        ),
        'DEFAULT' => 'NOT_FULL_PICTURE'
    ),
    'PROPERTY_DETAIL_TEMPLATE' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('PROPERTY_DETAIL_TEMPLATE'),
        'TYPE' => 'LIST',
        'VALUES' => array(
            '.default' => GetMessage('PROPERTY_DETAIL_TEMPLATE_DEFAULT'),
            'extended' => GetMessage('PROPERTY_DETAIL_TEMPLATE_EXTENDED')
        ),
        'REFRESH' => 'Y'
    ),
    'PROPERTY_BASKET_URL' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('PROPERTY_BASKET_URL'),
        'TYPE' => 'STRING'
    ),
    'PROPERTY_PRICE_CODE_SALE' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('PROPERTY_PRICE_CODE_SALE'),
        'TYPE' => 'LIST',
        'MULTIPLE' => 'Y',
        'VALUES' => $arPricesTypes
    ),
    'IBLOCK_TYPE_FOR_SALE' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('NAME_TYPE_OF_BLOCK'),
        'TYPE' => 'LIST',
        'VALUES' => $iBlockTypes,
        'REFRESH'=> 'Y',
    ),
    'IBLOCK_TYPE_ID_SALE' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('NAME_ID_OF_BLOCK'),
        'TYPE' => 'LIST',
        'VALUES' => $arIBlockSale,
    ),
    'TYPE_OF_BLOCK_FOR_CONDITIONS' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('TYPE_OF_BLOCK_FOR_CONDITIONS'),
        'TYPE' => 'LIST',
        'VALUES' => $iBlockTypes,
        'REFRESH'=> 'Y',
    ),
    'ID_OF_BLOCK_FOR_CONDITIONS' => array(
        'PARENT' => 'BASE',
        'NAME' => GetMessage('ID_OF_BLOCK_FOR_CONDITIONS'),
        'TYPE' => 'LIST',
        'VALUES' => $arIBlockConditions,
        'REFRESH' => 'Y',
    )
);
if ($arCurrentValues['PROPERTY_DETAIL_TEMPLATE'] == 'extended') {
    $arTemplateParameters += array(
        'PROPERTY_IBLOCK_TYPE_ICONS' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_TYPE_ICONS'),
            'TYPE' => 'LIST',
            'VALUES' => $iBlockTypes,
            'REFRESH' => 'Y',
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_ID_ICONS' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_ID_ICONS'),
            'TYPE' => 'LIST',
            'VALUES' => $arIcons,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_TYPE_PROMO' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_TYPE_PROMO'),
            'TYPE' => 'LIST',
            'VALUES' => $iBlockTypes,
            'REFRESH' => 'Y',
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_ID_PROMO' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_ID_PROMO'),
            'TYPE' => 'LIST',
            'VALUES' => $arPromo,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_TYPE_TEASER' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_TYPE_TEASER'),
            'TYPE' => 'LIST',
            'VALUES' => $iBlockTypes,
            'REFRESH' => 'Y',
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_ID_TEASER' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_ID_TEASER'),
            'TYPE' => 'LIST',
            'VALUES' => $arTeaser,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_TYPE_OVERVIEWS' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_TYPE_OVERVIEWS'),
            'TYPE' => 'LIST',
            'VALUES' => $iBlockTypes,
            'REFRESH' => 'Y',
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_ID_OVERVIEWS' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_ID_OVERVIEWS'),
            'TYPE' => 'LIST',
            'VALUES' => $arOverviews,
            'REFRESH' => 'Y',
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_TYPE_PHOTO' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_TYPE_PHOTO'),
            'TYPE' => 'LIST',
            'VALUES' => $iBlockTypes,
            'REFRESH' => 'Y',
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_ID_PHOTO' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_ID_PHOTO'),
            'TYPE' => 'LIST',
            'VALUES' => $arPhoto,
            'REFRESH' => 'Y',
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_TYPE_SECTION' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_TYPE_SECTION'),
            'TYPE' => 'LIST',
            'VALUES' => $iBlockTypes,
            'REFRESH' => 'Y',
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_ID_SECTION' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_ID_SECTION'),
            'TYPE' => 'LIST',
            'VALUES' => $arSection,
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_TYPE_SERVICES' => array(
            'PARENT' => 'BASE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_TYPE_SERVICES'),
            'TYPE' => 'LIST',
            'VALUES' => $iBlockTypes,
            'REFRESH' => 'Y',
            'ADDITIONAL_VALUES' => 'Y'
        ),
        'PROPERTY_IBLOCK_ID_SERVICES' => array(
            'PARENT' => 'DATA_SOURCE',
            'NAME' => GetMessage('PROPERTY_IBLOCK_ID_SERVICES'),
            'TYPE' => 'LIST',
            'VALUES' => $arServices,
            'REFRESH' => 'Y',
            'ADDITIONAL_VALUES' => 'Y'
        )
    );
}
/** ---------- /BASE ---------- */