<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог товаров");?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"catalog", 
	array(
        "IBLOCK_TYPE" => "#PRODUCTS_IBLOCK_TYPE#",
        "IBLOCK_ID" => "#PRODUCTS_IBLOCK_ID#",
        "VIDEO_IBLOCK_TYPE" => "#VIDEO_IBLOCK_TYPE#",
        "VIDEO_IBLOCK_ID" => "#VIDEO_IBLOCK_ID#",
        "SERVICES_IBLOCK_TYPE" => "#SERVICES_IBLOCK_TYPE#",
        "SERVICES_IBLOCK_ID" => "#SERVICES_IBLOCK_ID#",
        "REVIEWS_IBLOCK_TYPE" => "#PRODUCTS_REVIEWS_IBLOCK_TYPE#",
        "REVIEWS_IBLOCK_ID" => "#PRODUCTS_REVIEWS_IBLOCK_ID#",
        "FEEDBACK_FORM_ID" => "#FORMS_QUESTION_ID#",
        "PRODUCT_FORM_ID" => "#FORMS_PRODUCT_ID#",
        "HIDE_NOT_AVAILABLE" => "N",
        "HIDE_NOT_AVAILABLE_OFFERS" => "N",
        "PROPERTY_PICTURES" => "SYSTEM_IMAGES",
        "PROPERTY_ARTICLE" => "SYSTEM_ARTICLE",
        "PROPERTY_BRAND" => "SYSTEM_BRAND",
        "PROPERTY_IS_NEW" => "SYSTEM_NEW",
        "PROPERTY_IS_POPULAR" => "SYSTEM_HIT",
        "PROPERTY_IS_RECOMMENDATION" => "SYSTEM_RECOMMEND",
        "PROPERTY_DOCUMENTS" => "SYSTEM_DOCUMENTS",
        "PROPERTY_PRODUCTS_ASSOCIATED" => "SYSTEM_ASSOCIATED",
        "PROPERTY_PRODUCTS_RECOMMENDED" => "SYSTEM_RECOMMENDED",
        "PROPERTY_VIDEO" => "VIDEO",
        "VIDEO_PROPERTY_LINK" => "LINK",
        "PROPERTY_SERVICES" => "SYSTEM_RELATED_SERVICES",
        "SERVICES_PROPERTY_PRICE" => "SYSTEM_PRICE",
        "REVIEWS_PROPERTY_LINK" => "products_id",
        "REVIEWS_MAIL_EVENT" => "",
        "REVIEWS_CAPTCHA_USE" => "Y",
        "PRODUCT_FORM_PROPERTY_PRODUCT" => "#FORMS_PRODUCT_FIELDS_PRODUCT_ID#",
        "DETAIL_VIEW" => "settings",
        "MENU_TYPE_ROOT" => "left",
        "MENU_TYPE_CHILD" => "left",
        "MENU_MAX_LEVEL" => "4",
        "MENU_VIEW" => "settings",
        "MENU_DISPLAY_IN_ROOT" => "settings",
        "MENU_DISPLAY_IN_SECTION" => "settings",
        "MENU_DISPLAY_IN_ELEMENT" => "settings",
        "USER_CONSENT" => "N",
        "USER_CONSENT_ID" => "0",
        "USER_CONSENT_IS_CHECKED" => "Y",
        "USER_CONSENT_IS_LOADED" => "N",
        "CONSENT_URL" => "#SITE_DIR#company/consent/",
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "#SITE_DIR#catalog/",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "SHOW_TOP_ELEMENTS" => "",
        "USE_MAIN_ELEMENT_SECTION" => "N",
        "DETAIL_STRICT_SECTION_CHECK" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_TITLE" => "Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "ADD_ELEMENT_CHAIN" => "Y",
        "DISABLE_INIT_JS_IN_COMPONENT" => "",
        "TOP_ELEMENT_COUNT" => "",
        "TOP_LINE_ELEMENT_COUNT" => "",
        "TOP_ELEMENT_SORT_FIELD" => "",
        "TOP_ELEMENT_SORT_ORDER" => "",
        "TOP_ELEMENT_SORT_FIELD2" => "",
        "TOP_ELEMENT_SORT_ORDER2" => "",
        "TOP_PROPERTY_CODE" => "",
        "QUANTITY_MARKERS_USE" => "N",
        "BASKET_USE" => "settings",
        "FAST_ORDER_USE" => "Y",
        "FAST_ORDER_TEMPLATE" => ".default",
        "FAST_ORDER_PRICE_TYPE" => "1",
        "FAST_ORDER_PAYER" => "1",
        "FAST_ORDER_PROPERTIES" => array(
            0 => "5",
            1 => "",
        ),
        "FAST_ORDER_DELIVERY" => "2",
        "FAST_ORDER_PAYMENT" => "2",
        "FAST_ORDER_TITLE" => "Купить в 1 клик!",
        "FAST_ORDER_BUTTON" => "Купить в 1 клик!",
        "FAST_ORDER_PROPERTY_PHONE" => "",
        "FAST_ORDER_COMMENT_SHOW" => "Y",
        "FAST_ORDER_AGREEMENT_SHOW" => "Y",
        "FAST_ORDER_AGREEMENT_URL" => "#SITE_DIR#company/consent/",
        "USE_FILTER" => "Y",
        "FILTER_NAME" => "",
        "FILTER_FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_PROPERTY_CODE" => array(
            0 => "WEIGTH",
            1 => "DISPLAY",
            2 => "LENGTH",
            3 => "QUANTITY_OF_STRIPS",
            4 => "POWER",
            5 => "SETTINGS",
            6 => "SCOPE",
            7 => "PROCREATOR",
            8 => "SEASON",
            9 => "SYSTEM_RELATED_SERVICES",
            10 => "COMPOSITION",
            11 => "TYPE",
            12 => "PATTERN",
            13 => "ENERGY_CONSUMPTION",
            14 => "",
        ),
        "FILTER_PRICE_CODE" => array(
            0 => "BASE",
        ),
        "USE_REVIEW" => "N",
        "ACTION_VARIABLE" => "action",
        "PRODUCT_ID_VARIABLE" => "id",
        "USE_COMPARE" => "Y",
        "PRICE_CODE" => array(
            0 => "BASE",
        ),
        "USE_PRICE_COUNT" => "N",
        "SHOW_PRICE_COUNT" => "1",
        "PRICE_VAT_INCLUDE" => "Y",
        "PRICE_VAT_SHOW_VALUE" => "N",
        "CONVERT_CURRENCY" => "N",
        "BASKET_URL" => "#SITE_DIR#personal/basket/",
        "USE_PRODUCT_QUANTITY" => "N",
        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "PRODUCT_PROPERTIES" => array(
        ),
        "SECTION_COUNT_ELEMENTS" => "Y",
        "SECTION_TOP_DEPTH" => "1",
        "ROOT_DESCRIPTION_SHOW" => "Y",
        "ROOT_VIEW" => "settings",
        "ROOT_ROW_COUNT" => "5",
        "ROOT_CHILDREN_USE" => "Y",
        "ROOT_CHILDREN_COUNT" => "4",
        "SECTION_VIEW" => "settings",
        "SECTION_ROW_COUNT" => "4",
        "SECTION_CHILDREN_USE" => "Y",
        "SECTION_CHILDREN_COUNT" => "4",
        "PAGE_ELEMENT_COUNT" => "30",
        "LINE_ELEMENT_COUNT" => "3",
        "ELEMENT_SORT_FIELD" => "sort",
        "ELEMENT_SORT_ORDER" => "asc",
        "ELEMENT_SORT_FIELD2" => "id",
        "ELEMENT_SORT_ORDER2" => "desc",
        "LIST_PROPERTY_CODE" => array(
            0 => "WEIGTH",
            1 => "DISPLAY",
            2 => "LENGTH",
            3 => "QUANTITY_OF_STRIPS",
            4 => "POWER",
            5 => "SETTINGS",
            6 => "SCOPE",
            7 => "PROCREATOR",
            8 => "SEASON",
            9 => "SYSTEM_RELATED_SERVICES",
            10 => "COMPOSITION",
            11 => "TYPE",
            12 => "PATTERN",
            13 => "ENERGY_CONSUMPTION",
            14 => "",
        ),
        "INCLUDE_SUBSECTIONS" => "A",
        "LIST_META_KEYWORDS" => "-",
        "LIST_META_DESCRIPTION" => "-",
        "LIST_BROWSER_TITLE" => "-",
        "SECTION_BACKGROUND_IMAGE" => "-",
        "LIST_SORT_PRICE_CODE" => "",
        "LIST_VIEW" => "settings",
        "LIST_DESCRIPTION_SHOW" => "Y",
        "LIST_PROPERTIES_SHOW" => "Y",
        "LIST_QUICK_VIEW_USE" => "Y",
        "LIST_QUANTITY_SHOW" => "Y",
        "LIST_COUNTER_SHOW" => "Y",
        "DETAIL_PROPERTY_CODE" => array(
            0 => "WEIGTH",
            1 => "DISPLAY",
            2 => "LENGTH",
            3 => "QUANTITY_OF_STRIPS",
            4 => "POWER",
            5 => "SETTINGS",
            6 => "SCOPE",
            7 => "PROCREATOR",
            8 => "SEASON",
            9 => "SYSTEM_RELATED_SERVICES",
            10 => "COMPOSITION",
            11 => "TYPE",
            12 => "PATTERN",
            13 => "ENERGY_CONSUMPTION",
            14 => "",
        ),
        "DETAIL_META_KEYWORDS" => "-",
        "DETAIL_META_DESCRIPTION" => "-",
        "DETAIL_BROWSER_TITLE" => "-",
        "DETAIL_SET_CANONICAL_URL" => "N",
        "SECTION_ID_VARIABLE" => "SECTION_ID",
        "DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
        "DETAIL_BACKGROUND_IMAGE" => "-",
        "SHOW_DEACTIVATED" => "N",
        "DETAIL_HEADER_FIXED" => "N",
        "DETAIL_PICTURE_POPUP" => "SETTINGS",
        "DETAIL_PICTURE_LOOP" => "SETTINGS",
        "DETAIL_BRAND_USE" => "Y",
        "DETAIL_QUANTITY_SHOW" => "Y",
        "DETAIL_COUNTER_SHOW" => "Y",
        "FEEDBACK_FORM_SHOW" => "Y",
        "FEEDBACK_FORM_TEXT" => "Подробно расскажем о наших товарах, видах и стоимости доставки, подготовим индивидуальное предложение для оптовых клиентов!",
        "LINK_IBLOCK_TYPE" => "",
        "LINK_IBLOCK_ID" => "",
        "LINK_PROPERTY_SID" => "",
        "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
        "USE_ALSO_BUY" => "N",
        "USE_GIFTS_DETAIL" => "Y",
        "USE_GIFTS_SECTION" => "Y",
        "USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
        "GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
        "GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
        "GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
        "GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
        "GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "4",
        "GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
        "GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
        "GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
        "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
        "GIFTS_SHOW_OLD_PRICE" => "Y",
        "GIFTS_SHOW_NAME" => "Y",
        "GIFTS_SHOW_IMAGE" => "Y",
        "GIFTS_MESS_BTN_BUY" => "Выбрать",
        "GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
        "GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
        "GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
        "USE_STORE" => "N",
        "PAGER_TEMPLATE" => ".default",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Товары",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "LAZY_LOAD" => "Y",
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",
        "FILE_404" => "",
        "COMPATIBLE_MODE" => "Y",
        "USE_ELEMENT_COUNTER" => "Y",
        "DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
        "COMPARE_NAME" => "compare",
        "COMPARE_FIELD_CODE" => array(
            0 => "PREVIEW_PICTURE",
            1 => "DETAIL_PICTURE",
        ),
        "COMPARE_PROPERTY_CODE" => array(
            0 => "WEIGTH",
            1 => "DISPLAY",
            2 => "LENGTH",
            3 => "QUANTITY_OF_STRIPS",
            4 => "POWER",
            5 => "SETTINGS",
            6 => "SCOPE",
            7 => "PROCREATOR",
            8 => "SEASON",
            9 => "SYSTEM_RELATED_SERVICES",
            10 => "COMPOSITION",
            11 => "TYPE",
            12 => "PATTERN",
            13 => "ENERGY_CONSUMPTION",
            14 => "",
        ),
        "COMPARE_ELEMENT_SORT_FIELD" => "sort",
        "COMPARE_ELEMENT_SORT_ORDER" => "asc",
        "DISPLAY_ELEMENT_SELECT_BOX" => "N",
        "DETAIL_DESCRIPTION_SHOW" => "Y",
        "FILTER_OFFERS_FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_OFFERS_PROPERTY_CODE" => array(
            0 => "",
            1 => "",
        ),
        "COMPARE_OFFERS_FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "COMPARE_OFFERS_PROPERTY_CODE" => array(
            0 => "",
            1 => "",
        ),
        "OFFERS_CART_PROPERTIES" => array(
            0 => "235",
        ),
        "TOP_OFFERS_FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "TOP_OFFERS_PROPERTY_CODE" => array(
            0 => "",
            1 => "",
        ),
        "TOP_OFFERS_LIMIT" => "5",
        "LIST_OFFERS_FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "LIST_OFFERS_PROPERTY_CODE" => array(
            0 => "",
            1 => "",
        ),
        "LIST_OFFERS_LIMIT" => "5",
        "DETAIL_OFFERS_FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "DETAIL_OFFERS_PROPERTY_CODE" => array(
            0 => "235",
            1 => "",
        ),
        "OFFERS_SORT_FIELD" => "sort",
        "OFFERS_SORT_ORDER" => "asc",
        "OFFERS_SORT_FIELD2" => "id",
        "OFFERS_SORT_ORDER2" => "desc",
        "OFFERS_PROPERTY_PICTURES" => "SYSTEM_PICTURES",
        "SEF_URL_TEMPLATES" => array(
            "sections" => "",
            "section" => "#SECTION_ID#/",
            "element" => "#SECTION_ID#/#ELEMENT_ID#/",
            "compare" => "compare.php?action=#ACTION_CODE#",
            "smart_filter" => "#SECTION_ID#/filter/#SMART_FILTER_PATH#/apply/",
        ),
        "VARIABLE_ALIASES" => array(
            "compare" => array(
                "ACTION_CODE" => "action",
            ),
        )
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
