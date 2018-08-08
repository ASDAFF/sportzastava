<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket",
	"basket",
	Array(
		"ACTION_VARIABLE" => "basketAction",
		"ADDITIONAL_PICT_PROP_38" => "-",
		"AUTO_CALCULATION" => "Y",
		"BASKET_IMAGES_SCALING" => "adaptive",
		"COLUMNS_LIST" => array(0=>"NAME",1=>"DISCOUNT",2=>"WEIGHT",3=>"PROPS",4=>"DELETE",5=>"DELAY",6=>"TYPE",7=>"PRICE",8=>"QUANTITY",9=>"SUM",),
		"COLUMNS_LIST_EXT" => array(0=>"PREVIEW_PICTURE",1=>"DISCOUNT",2=>"DELETE",3=>"DELAY",4=>"TYPE",5=>"SUM",),
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "basket",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONSENT_URL" => "/company/consent/",
		"CORRECT_RATIO" => "N",
		"FAST_ORDER_DELIVERY_TYPE" => "2",
		"FAST_ORDER_PAYER_TYPE" => "1",
		"FAST_ORDER_PAYMET_TYPE" => "3",
		"FAST_ORDER_PRICE_TYPE" => "1",
		"FAST_ORDER_PROPERTY_PHONE" => "3",
		"FAST_ORDER_SEND_BUTTON" => "Заказать",
		"FAST_ORDER_SHOW_COMMENT" => "Y",
		"FAST_ORDER_SHOW_PROPERTIES" => array(),
		"FAST_ORDER_TEMPLATE" => ".default",
		"FAST_ORDER_TITLE" => "Быстрый заказ",
		"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_CONVERT_CURRENCY" => "N",
		"GIFTS_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_HIDE_NOT_AVAILABLE" => "N",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_MESS_BTN_DETAIL" => "Подробнее",
		"GIFTS_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_PLACE" => "BOTTOM",
		"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
		"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"GIFTS_TEXT_LABEL_GIFT" => "Подарок",
		"HIDE_COUPON" => "N",
		"OFFERS_PROPS" => "",
		"PATH_TO_ORDER" => "/personal/basket/order.php",
		"PRICE_VAT_SHOW_VALUE" => "Y",
		"QUANTITY_FLOAT" => "N",
		"SET_TITLE" => "Y",
		"USE_FAST_ORDER" => "Y",
		"USE_GIFTS" => "Y",
		"USE_PREPAYMENT" => "N"
	)
);?><?$APPLICATION->IncludeComponent(
	"prime:gifts.cart",
	"",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "300",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>