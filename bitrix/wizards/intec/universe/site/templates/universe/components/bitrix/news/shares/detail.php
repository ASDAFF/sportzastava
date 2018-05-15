<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use intec\constructor\models\Build;

/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 */

$this->setFrameMode(true);

if ($arParams['HEAD_PICTURE_TYPE'] == 'SETTINGS') {
	$build = Build::getCurrent();
	$page = $build->getPage();
	$properties = $page->getProperties();

	$arParams['HEAD_PICTURE_TYPE'] = 'FULL_PICTURE';
	switch ($properties->get('template_shares_page')) {
		case 1:
			$arParams['HEAD_PICTURE_TYPE'] = 'NOT_FULL_PICTURE';
			break;
		case 2:
			$arParams['HEAD_PICTURE_TYPE'] = 'FULL_PICTURE';
			break;
	}
    if ($arParams['USE_BASKET'] == 'settings') {
        switch ($properties->get('use_basket')) {
            case 1:
                $arParams['USE_BASKET'] = 'Y';
                break;
            default:
                $arParams['USE_BASKET'] = 'N';
                break;
        }
    }
}

$template = $arParams['PROPERTY_DETAIL_TEMPLATE'];
?>
<div class="intec-content">
	<div class="intec-content-wrapper">
		<?$ElementID = $APPLICATION->IncludeComponent(
			"bitrix:news.detail",
            $template,
			Array(
				"ID_OF_BLOCK_FOR_CONDITIONS" => $arParams["ID_OF_BLOCK_FOR_CONDITIONS"],
				"TYPE_OF_BLOCK_FOR_CONDITIONS" => $arParams["TYPE_OF_BLOCK_FOR_CONDITIONS"],
				"PROPERTY_OF_BLOCK_FOR_CONDITIONS" => $arParams["PROPERTY_OF_BLOCK_FOR_CONDITIONS"],
				"HEAD_PICTURE_TYPE" => $arParams["HEAD_PICTURE_TYPE"],
				"IBLOCK_TYPE_FOR_SALE" => $arParams["IBLOCK_TYPE_FOR_SALE"],
				"IBLOCK_TYPE_ID_SALE" => $arParams["IBLOCK_TYPE_ID_SALE"],
				"PROPERTY_RECOMENDATIONS" => $arParams["PROPERTY_RECOMENDATIONS"],
				"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
				"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
				"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
				"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
				"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
				"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"META_KEYWORDS" => $arParams["META_KEYWORDS"],
				"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
				"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
				"SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
				"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
				"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
				"SET_TITLE" => $arParams["SET_TITLE"],
				"MESSAGE_404" => $arParams["MESSAGE_404"],
				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"SHOW_404" => $arParams["SHOW_404"],
				"FILE_404" => $arParams["FILE_404"],
				"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
				"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
				"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
				"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
				"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
				"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
				"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
				"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
				"CHECK_DATES" => $arParams["CHECK_DATES"],
				"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
				"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
				"USE_SHARE" => $arParams["USE_SHARE"],
				"SHARE_HIDE" => $arParams["SHARE_HIDE"],
				"PROPERTY_PRICE_CODE_SALE" => $arParams['PROPERTY_PRICE_CODE_SALE'],
				"PROPERTY_SHOW_FORM" => $arParams['PROPERTY_SHOW_FORM'],
				"PROPERTY_FORM_ID" => $arParams['PROPERTY_FORM_ID'],
				"PROPERTY_IBLOCK_TYPE_ICONS" => $arParams['PROPERTY_IBLOCK_TYPE_ICONS'],
				"PROPERTY_IBLOCK_ID_ICONS" => $arParams['PROPERTY_IBLOCK_ID_ICONS'],
				"PROPERTY_FOR_ICONS" => $arParams['PROPERTY_FOR_ICONS'],
				"PROPERTY_IBLOCK_TYPE_PROMO" => $arParams['PROPERTY_IBLOCK_TYPE_PROMO'],
				"PROPERTY_IBLOCK_ID_PROMO" => $arParams['PROPERTY_IBLOCK_ID_PROMO'],
                "PROPERTY_FOR_PROMO" => $arParams['PROPERTY_FOR_PROMO'],
				"PROPERTY_IBLOCK_TYPE_TEASER" => $arParams['PROPERTY_IBLOCK_TYPE_TEASER'],
                "PROPERTY_IBLOCK_ID_TEASER" => $arParams['PROPERTY_IBLOCK_ID_TEASER'],
                "PROPERTY_FOR_TEASER" => $arParams['PROPERTY_FOR_TEASER'],
				"PROPERTY_IBLOCK_TYPE_OVERVIEWS" => $arParams['PROPERTY_IBLOCK_TYPE_OVERVIEWS'],
				"PROPERTY_IBLOCK_ID_OVERVIEWS" => $arParams['PROPERTY_IBLOCK_ID_OVERVIEWS'],
				"PROPERTY_OVERVIEWS_LINK" => $arParams['PROPERTY_OVERVIEWS_LINK'],
                "PROPERTY_IBLOCK_TYPE_PHOTO" => $arParams['PROPERTY_IBLOCK_TYPE_PHOTO'],
                "PROPERTY_IBLOCK_ID_PHOTO" => $arParams['PROPERTY_IBLOCK_ID_PHOTO'],
                "PROPERTY_IBLOCK_TYPE_SECTION" => $arParams['PROPERTY_IBLOCK_TYPE_SECTION'],
                "PROPERTY_IBLOCK_ID_SECTION" => $arParams['PROPERTY_IBLOCK_ID_SECTION'],
                "PROPERTY_FOR_SECTION" => $arParams['PROPERTY_FOR_SECTION'],
				"PROPERTY_SECTION_HEADER" => $arParams['PROPERTY_SECTION_HEADER'],
				"PROPERTY_PHOTO_PROPERTIES" => $arParams['PROPERTY_PHOTO_PROPERTIES'],
				"PROPERTY_IBLOCK_TYPE_SERVICES" => $arParams['PROPERTY_IBLOCK_TYPE_SERVICES'],
				"PROPERTY_IBLOCK_ID_SERVICES" => $arParams['PROPERTY_IBLOCK_ID_SERVICES'],
                "PROPERTY_FOR_OVERVIEWS" => $arParams['PROPERTY_FOR_OVERVIEWS'],
                "PROPERTY_FOR_PHOTO" => $arParams['PROPERTY_FOR_PHOTO'],
				"PROPERTY_FOR_SERVICES" => $arParams['PROPERTY_FOR_SERVICES'],
				"PROPERTY_TEASER_HEADER" => $arParams['PROPERTY_TEASER_HEADER'],
				"PROPERTY_FOR_PERIOD" => $arParams['PROPERTY_FOR_PERIOD'],
				"SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
				"SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
				"PROPERTY_BASKET_URL" => $arParams['PROPERTY_BASKET_URL'],
				"SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
				"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
				"ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
				'STRICT_SECTION_CHECK' => (isset($arParams['STRICT_SECTION_CHECK']) ? $arParams['STRICT_SECTION_CHECK'] : ''),
                'USE_COMMON_CURRENCY' => $arParams['USE_COMMON_CURRENCY'],
                'CURRENCY' => $arParams['CURRENCY'],
				'FORM_TEXT' => $arParams['FORM_TEXT'],
                'ORDER_PRODUCT_WEB_FORM' => $arParams['ORDER_PRODUCT_WEB_FORM'],
                'PROPERTY_FORM_ORDER_PRODUCT' => $arParams['PROPERTY_FORM_ORDER_PRODUCT'],
                'USE_BASKET' => $arParams['USE_BASKET'],
			),
			$component
		);?>
	</div>
</div>

