<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Статьи");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => "26",
		"NEWS_COUNT" => "20",
		"USE_SEARCH" => "N",
		"IBLOCK_TYPE_SERVICES" => "",
		"IBLOCK_ID_SERVICES" => "",
		"ALLOW_LINK_SERVICES" => "N",
		"IBLOCK_TYPE_REVIEWS" => "",
		"IBLOCK_ID_REVIEWS" => "",
		"ALLOW_LINK_REVIEWS" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"PROPERTY_GALLERY" => "",
		"PROPERTY_OBJECTIVE" => "SYSTEM_LINK",
		"PROPERTY_SERVICES" => "SYSTEM_READ_ALSO",
		"PROPERTY_IMAGES" => "",
		"PROPERTY_SOLUTION_BEGIN" => "SYSTEM_LINK",
		"PROPERTY_SOLUTION_IMAGE" => "",
		"PROPERTY_SOLUTION_END" => "SYSTEM_LINK",
		"DISPLAY_FORM_ORDER" => "N",
		"DISPLAY_FORM_ASK" => "N",
		"DETAIL_URL_SERVICES" => "",
		"PAGE_URL_REVIEWS" => "",
		"DETAIL_URL_REVIEWS" => "",
		"SEF_MODE" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_TITLE" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"USE_PERMISSIONS" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "SYSTEM_TARGET",
			1 => "SYSTEM_SHOW_MAIN",
			2 => "SYSTEM_SIZE",
			3 => "SYSTEM_LINK",
			4 => "SYSTEM_READ_ALSO",
			5 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_LIST_TAB_ALL" => "N",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DESCRIPTION_DETAIL_PROPERTIES" => "",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Статьи",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"USE_LIST_DATE_FILTER" => "N",
		"DISPLAY_LIST_PICTURE" => "Y",
		"DISPLAY_LIST_PREVIEW_TEXT" => "Y",
		"VIEW_LIST" => "settings",
		"DISPLAY_DETAIL_PICTURE" => "Y",
		"DISPLAY_DETAIL_PREVIEW_TEXT" => "N",
		"DISPLAY_DETAIL_DATE" => "Y",
		"DISPLAY_DETAIL_READ_ALSO" => "N",
		"SEF_FOLDER" => "/company/articles/",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_ID#/",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>