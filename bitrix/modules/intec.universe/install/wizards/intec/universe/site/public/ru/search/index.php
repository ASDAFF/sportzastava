<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	".default", 
	array(
		"RESTART" => "Y",
		"CHECK_DATES" => "N",
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"arrFILTER" => array(
			0 => "iblock_catalogs_new",
		),
		"arrFILTER_main" => "",
		"arrFILTER_iblock_services" => array(
			0 => "all",
		),
		"arrFILTER_iblock_news" => array(
			0 => "all",
		),
		"arrFILTER_iblock_catalog" => array(
			0 => "4",
			1 => "14",
			2 => "19",
			3 => "all",
		),
		"SHOW_WHERE" => "N",
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => "15",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"USE_SUGGEST" => "N",
		"SHOW_ITEM_TAGS" => "N",
		"SHOW_ITEM_DATE_CHANGE" => "N",
		"SHOW_ORDER_BY" => "N",
		"SHOW_TAGS_CLOUD" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"NO_WORD_LOGIC" => "N",
		"FILTER_NAME" => "",
		"USE_LANGUAGE_GUESS" => "Y",
		"SHOW_RATING" => "",
		"RATING_TYPE" => "",
		"PATH_TO_USER_PROFILE" => "",
		"arrFILTER_forum" => array(
			0 => "all",
		),
		"arrFILTER_iblock_content" => array(
			0 => "1",
			1 => "2",
			2 => "3",
			3 => "7",
			4 => "8",
			5 => "9",
			6 => "10",
			7 => "11",
			8 => "12",
			9 => "16",
			10 => "17",
			11 => "18",
			12 => "all",
		),
		"arrFILTER_iblock_reviews" => array(
			0 => "6",
			1 => "13",
			2 => "15",
			3 => "all",
		),
		"arrFILTER_iblock_catalogs_new" => array(
			0 => "20",
		),
		"arrFILTER_iblock_content_new" => array(
			0 => "22",
			1 => "23",
			2 => "24",
			3 => "26",
			4 => "27",
			5 => "28",
			6 => "29",
			7 => "30",
			8 => "31",
			9 => "32",
			10 => "33",
			11 => "34",
			12 => "35",
			13 => "36",
			14 => "37",
			15 => "38",
			16 => "39",
			17 => "all",
		),
		"arrFILTER_blog" => array(
			0 => "all",
		),
		"arrFILTER_socialnetwork" => array(
			0 => "all",
		),
		"arrFILTER_socialnetwork_user" => ""
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>