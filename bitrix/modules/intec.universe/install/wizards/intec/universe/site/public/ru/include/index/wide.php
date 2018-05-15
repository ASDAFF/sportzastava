<?php

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\constructor\models\Build;

/**
 * @global CMain $APPLICATION
 */

$properties = Build::getCurrent()->getPage()->getProperties();
$blocks = $properties->get('main_blocks');
$banner = ArrayHelper::getValue($blocks, ['templates', 'main_banner']);

$widget['code'] = 'main_banner';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['display'] = $widget['display'] && $banner != 5;
$widget['style'] = [];
$widget['template'] = null;

if ($banner == 1) {
    $widget['template'] = 'slider';
} else {
    $widget['template'] = 'slider.complex';
    $widget['style'] = [
        'padding-top' => '20px',
        'padding-bottom' => '20px',
        'background-color' => '#f8f9fb'
    ];
}

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
    <?php if ($widget['template'] == 'slider') { ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "slider",
            array(
                "IBLOCK_TYPE" => "#BANNERS_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#BANNERS_IBLOCK_ID#",
                "SLIDER_COUNT" => "",
                "SLIDER_ACTIVE_ELEMENTS" => "Y",
                "SLIDER_PROPERTY_TITLE" => "HEADER",
                "SLIDER_PROPERTY_TITLE_COLOR" => "TITLE_TEXT_COLOR",
                "SLIDER_PROPERTY_DESCRIPTION" => "DESCRIPTION",
                "SLIDER_PROPERTY_DESCRIPTION_COLOR" => "DESCRIPTION_TEXT_COLOR",
                "SLIDER_PROPERTY_LINK" => "LINK",
                "SLIDER_PROPERTY_BLANK" => "NEW_TAB",
                "SLIDER_PROPERTY_BUTTON_SHOW" => "BUTTON_SHOW",
                "SLIDER_PROPERTY_BUTTON_TEXT" => "BUTTON_TEXT",
                "SLIDER_PROPERTY_BUTTON_TEXT_COLOR" => "BUTTON_TEXT_COLOR",
                "SLIDER_PROPERTY_BUTTON_COLOR" => "BUTTON_COLOR",
                "SLIDER_PROPERTY_TEXT_POSITION" => "POSITION",
                "SLIDER_PROPERTY_IMAGE" => "BANNER_IMG",
                "SLIDER_PROPERTY_IMAGE_POSITION" => "BANNER_IMG_POSITION",
                "SLIDER_PROPERTY_AUTOPLAY" => "Y",
                "SLIDER_PROPERTY_AUTOPLAY_DELAY" => "5000",
                "SLIDER_PROPERTY_HEIGHT" => "600",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "0"
            ),
            false
        ); ?>
    <?php } else { ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "slider.complex",
            array(
                "IBLOCK_TYPE" => "#BANNERS_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#BANNERS_IBLOCK_ID#",
                "SLIDER_COUNT" => "",
                "SLIDER_ACTIVE_ELEMENTS" => "Y",
                "SLIDER_PROPERTY_TITLE" => "HEADER",
                "SLIDER_PROPERTY_TITLE_COLOR" => "TITLE_TEXT_COLOR",
                "SLIDER_PROPERTY_DESCRIPTION" => "DESCRIPTION",
                "SLIDER_PROPERTY_DESCRIPTION_COLOR" => "DESCRIPTION_TEXT_COLOR",
                "SLIDER_PROPERTY_LINK" => "LINK",
                "SLIDER_PROPERTY_BLANK" => "NEW_TAB",
                "SLIDER_PROPERTY_BUTTON_SHOW" => "BUTTON_SHOW",
                "SLIDER_PROPERTY_BUTTON_TEXT" => "BUTTON_TEXT",
                "SLIDER_PROPERTY_BUTTON_TEXT_COLOR" => "BUTTON_TEXT_COLOR",
                "SLIDER_PROPERTY_BUTTON_COLOR" => "BUTTON_COLOR",
                "SLIDER_PROPERTY_TEXT_POSITION" => "POSITION",
                "SLIDER_PROPERTY_IMAGE" => "BANNER_IMG",
                "SLIDER_PROPERTY_IMAGE_POSITION" => "BANNER_IMG_POSITION",
                "SLIDER_PROPERTY_AUTOPLAY" => "Y",
                "SLIDER_PROPERTY_AUTOPLAY_DELAY" => "5000",
                "SLIDER_PROPERTY_HEIGHT" => "500",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "0",
                "IBLOCK_TYPE_CB" => "#BANNERS_SMALL_IBLOCK_TYPE#",
                "IBLOCK_ID_CB" => "#BANNERS_SMALL_IBLOCK_ID#",
                "SLIDER_CB_PROPERTY_ELEMENTS" =>  array(
                    0 => "#BANNERS_SMALL_BANNERS_IDS_1#",
                    1 => "#BANNERS_SMALL_BANNERS_IDS_2#",
                    2 => "#BANNERS_SMALL_BANNERS_IDS_3#",
                    3 => "#BANNERS_SMALL_BANNERS_IDS_4#"
                ),
                "SLIDER_CB_PROPERTY_LINK" => "LINK",
                "SLIDER_CB_PROPERTY_LINK_BLANK" => "LINK_BLANK",
                "SLIDER_CB_PROPERTY_TEXT_COLOR" => "TEXT_COLOR",
                "SLIDER_CB_PROPERTY_VIEW" => "left",
                "SLIDER_CB_PROPERTY_COUNT" => "4"
            ),
            false
        ); ?>
    <?php } ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);

$widget['code'] = 'icons';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['style'] = [
    'padding-top' => '35px',
    'padding-bottom' => '10px',
    'background-color' => '#f8f9fb'
];

if ($banner != 1 && $banner != 5)
    $widget['style'] = [
        'padding-top' => '20px'
    ];

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "icons",
            array(
                "IBLOCK_TYPE" => "#ICONS_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#ICONS_IBLOCK_ID#",
                "SECTIONS_ID" => array(
                    0 => "",
                    1 => "",
                ),
                "ELEMENTS_ID" => array(
                    0 => "",
                    1 => "",
                ),
                "ELEMENTS_COUNT" => "4",
                "SHOW_HEADER" => "N",
                "HEADER" => "",
                "HEADER_POSITION" => "center",
                "LINE_ELEMENTS_COUNT" => "4",
                "VIEW" => "left-float",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "0",
                "PROPERTY_USE_LINK" => "USE_LINK",
                "PROPERTY_LINK" => "LINK",
                "FONT_SIZE_HEADER" => "14",
                "FONT_STYLE_HEADER" => "italic",
                "FONT_STYLE_HEADER_BOLD" => "N",
                "FONT_STYLE_HEADER_ITALIC" => "N",
                "FONT_STYLE_HEADER_UNDERLINE" => "N",
                "HEADER_TEXT_POSITION" => "left",
                "HEADER_TEXT_COLOR" => "",
                "BACKGROUND_COLOR_ICON" => "",
                "BACKGROUND_OPACITY_ICON" => "",
                "BACKGROUND_BORDER_RADIUS" => "",
                "TARGET_BLANK" => "N",
                "FONT_SIZE_DESCRIPTION" => "14",
                "FONT_STYLE_DESCRIPTION_BOLD" => "N",
                "FONT_STYLE_DESCRIPTION_ITALIC" => "N",
                "FONT_STYLE_DESCRIPTION_UNDERLINE" => "N",
                "DESCRIPTION_TEXT_POSITION" => "left",
                "DESCRIPTION_TEXT_COLOR" => ""
            ),
            false
        ); ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);

$widget['code'] = 'categories';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['style'] = [
    'margin-top' => '30px'
];

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "categories",
            array(
                "IBLOCK_TYPE" => "#PRODUCTS_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#PRODUCTS_IBLOCK_ID#",
                "DISPLAY_TITLE" => "Y",
                "DISPLAY_DESCRIPTION" => "N",
                "SECTION_COUNT_ELEMENTS" => "Y",
                "VIEW" => "list",
                "GRID_CATALOG_ROOT_SECTIONS_COUNT" => "3",
                "USE_SUBSECTIONS_SECTIONS" => "Y",
                "COUNT_SUBSECTIONS_SECTIONS" => "3",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "0",
                "ID_CATEGORIES" => array(
                    0 => "#PRODUCTS_CATEGORIES_IDS_1#",
                    1 => "#PRODUCTS_CATEGORIES_IDS_2#",
                    2 => "#PRODUCTS_CATEGORIES_IDS_3#",
                    3 => "#PRODUCTS_CATEGORIES_IDS_4#",
                    4 => "#PRODUCTS_CATEGORIES_IDS_5#",
                    5 => "#PRODUCTS_CATEGORIES_IDS_6#",
                ),
                "TITLE" => "Популярные категории",
                "ALIGHT_HEADER" => "center"
            ),
            false
        ); ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);

$widget['code'] = 'rubric';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['style'] = [
    'padding-top' => '20px'
];

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "sections",
            array(
                "IBLOCK_TYPE" => "#BANNERS_CATEGORIES_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#BANNERS_CATEGORIES_IBLOCK_ID#",
                "ITEMS_LIMIT" => "4",
                "DISPLAY_TITLE" => "Y",
                "DISPLAY_DESCRIPTION" => "Y",
                "PROPERTY_LINK" => "SYSTEM_LINK",
                "PROPERTY_TARGET" => "SYSTEM_TARGET",
                "PROPERTY_SHOW_STICKER" => "SYSTEM_SHOW_STICK",
                "PROPERTY_STICKER" => "SYSTEM_STICK",
                "SORT_BY1" => "",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "",
                "SORT_ORDER2" => "ASC",
                "DESKTOP_TEMPLATE" => "puzzle",
                "MOBILE_TEMPLATE" => "one_column",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "0",
                "TITLE" => "Рубрики",
                "ALIGHT_HEADER" => "center",
                "DESCRIPTION" => "Описание очень важно для этого вида отображения. Пожалуйста, заполните его. Описание очень важно для этого вида отображения. Пожалуйста, заполните его.",
                "MAIN_ELEMENT" => "4",
                "PROPERTY_SIZE" => "SYSTEM_SIZE"
            ),
            false
        ); ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);

$widget['code'] = 'photogallery';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['style'] = [
    'margin-top' => '40px'
];

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "photo",
            array(
                "IBLOCK_TYPE" => "#PHOTO_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#PHOTO_IBLOCK_ID#",
                "ALIGHT_HEADER" => "center",
                "SHOW_TITLE" => "Y",
                "TITLE" => "Фотогалерея",
                "SHOW_DETAIL_LINK" => "N",
                "USE_CAROUSEL" => "N",
                "COLUMNS_COUNT" => "4",
                "ITEMS_LIMIT" => "8",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "0"
            ),
            false
        ); ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);

$widget['code'] = 'products';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['style'] = [
    'margin-top' => '60px',
    'padding-top' => '20px',
    'padding-bottom' => '40px',
    'background-color' => '#f8f9fb'
];

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "catalog.categories",
            array(
                "IBLOCK_TYPE" => "#PRODUCTS_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#PRODUCTS_IBLOCK_ID#",
                "ITEMS_LIMIT" => "20",
                "PRICE_CODE" => array(
                    0 => "BASE",
                ),
                "PROPERTY_LABEL_NEW" => "SYSTEM_NEW",
                "PROPERTY_LABEL_RECOMMEND" => "SYSTEM_RECOMMEND",
                "PROPERTY_LABEL_HIT" => "SYSTEM_HIT",
                "DISPLAY_DISCOUNT" => "Y",
                "PROPERTY_SECTION" => "SYSTEM_CATEGORY",
                "OFFERS_PROPERTY_CODE" => array(
                    0 => "",
                    1 => "SIZE",
                    2 => "COLORS",
                    3 => "",
                ),
                "VIEW_DESKTOP" => "default.desktop",
                "VIEW_MOBILE" => "default.mobile",
                "DISPLAY_TITLE" => "N",
                "TITLE" => "Супер распродажа этой осени",
                "TITLE_ALIGN" => "center",
                "SHOW_DESCRIPTION" => "N",
                "COUNT_ELEMENT_IN_ROW" => "four",
                "SECTION_URL" => "",
                "DETAIL_URL" => "",
                "BASKET_URL" => "#SITE_DIR#personal/basket/",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "0",
                "CONSENT_URL" => "#SITE_DIR#company/consent/"
            ),
            false
        ); ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);

$widget['code'] = 'services';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['style'] = [
    'margin-top' => '40px'
];

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "services",
            array(
                "IBLOCK_TYPE" => "#SERVICES_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#SERVICES_IBLOCK_ID#",
                "ITEMS_LIMIT" => "4",
                "PROPERTY_DISPLAY" => "SYSTEM_SHOW_ON_MAIN",
                "DISPLAY_TITLE" => "Y",
                "TITLE" => "Услуги",
                "ALIGHT_TEXT" => "center",
                "DISPLAY_DESCRIPTION" => "Y",
                "DESCRIPTION" => "Описание очень важно для этого вида отображения. Пожалуйста, заполните его.",
                "DISPLAY_BUTTON_ALL" => "Y",
                "VIEW_DESKTOP" => "tile.all",
                "VIEW_MOBILE" => "tile.all",
                "PAGE_URL" => "#SITE_DIR#services/",
                "SECTION_URL" => "",
                "DETAIL_URL" => "",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "0"
            ),
            false
        ); ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);

$widget['code'] = 'news';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['style'] = [
    'margin-top' => '50px',
    'padding-top' => '30px',
    'padding-bottom' => '50px',
    'background-color' => '#f8f9fb'
];

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "news",
            array(
                "IBLOCK_TYPE" => "#NEWS_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#NEWS_IBLOCK_ID#",
                "ITEMS_LIMIT" => "",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "ASC",
                "SORT_ORDER2" => "ASC",
                "DATE_FORMAT" => "j F Y",
                "DISPLAY_TITLE" => "Y",
                "TITLE" => "Новости",
                "ALIGN_TITLE" => "center",
                "DISPLAY_DESCRIPTION" => "N",
                "VIEW_DESKTOP" => "extend.all",
                "VIEW_MOBILE" => "extend.all",
                "DETAIL_URL" => "",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "0"
            ),
            false
        ); ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);

$widget['code'] = 'articles';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['style'] = [
    'margin-top' => '40px',
    'background-size' => 'auto'
];

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "articles",
            array(
                "IBLOCK_TYPE" => "#ARTICLES_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#ARTICLES_IBLOCK_ID#",
                "ELEMENTS_ID" => [],
                "ELEMENTS_COUNT" => 3,
                "HEADER_SHOW" => "Y",
                "HEADER_CENTER" => "N",
                "HEADER" => "Статьи",
                "DESCRIPTION_SHOW" => "Y",
                "DESCRIPTION_CENTER" => "N",
                "DESCRIPTION" => "В нашем каталоге представлены последние линейки спецтехники, систем Закажите консультацию по любому товару у наших специалистов или соберите свой заказ прямо на сайте. Мы подготовим для вас индивидуальное коммерческое предложение и вышлем персональный блок бонусов и скидок.",
                "BIG_FIRST_BLOCK" => "Y",
                "HEADER_ELEMENT_SHOW" => "Y",
                "DESCRIPTION_ELEMENT_SHOW" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => 0
            ),
            false
        ); ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);

$widget['code'] = 'shares';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['style'] = [
    'margin-top' => '40px'
];

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "shares",
            array(
                "IBLOCK_TYPE" => "#SHARES_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#SHARES_IBLOCK_ID#",
                "ITEMS_LIMIT" => "5",
                "PROPERTY_DISPLAY" => "SYSTEM_SHOW_ON_MAIN",
                "SORT_BY1" => "TIMESTAMP_X",
                "SORT_ORDER1" => "DESC",
                "SORT_BY2" => "ASC",
                "SORT_ORDER2" => "ASC",
                "DATE_FORMAT" => "j F Y",
                "DISPLAY_TITLE" => "Y",
                "TITLE" => "Акции",
                "ALIGN_TITLE" => "center",
                "DISPLAY_DESCRIPTION" => "N",
                "VIEW_DESKTOP" => "default.all",
                "COUNT_IN_ROW" => "five",
                "VIEW_MOBILE" => "default.all",
                "DETAIL_URL" => "",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "0"
            ),
            false
        ); ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);

$widget['code'] = 'reviews';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['style'] = [
    'margin-top' => '50px',
    'padding-top' => '30px',
    'padding-bottom' => '30px',
    'background-color' => '#f8f9fb'
];

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "reviews",
            array(
                "IBLOCK_TYPE" => "#REVIEWS_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#REVIEWS_IBLOCK_ID#",
                "ITEMS_LIMIT" => "4",
                "PROPERTY_DISPLAY" => "SYSTEM_SHOW_BLOCK",
                "DISPLAY_TITLE" => "Y",
                "TITLE" => "Отзывы",
                "ALIGN_TITLE" => "left",
                "DISPLAY_BUTTON_ALL" => "Y",
                "VIEW_DESKTOP" => "slider.all",
                "VIEW_MOBILE" => "slider.all",
                "PAGE_URL" => "#SITE_DIR#company/reviews/",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "0"
            ),
            false
        ); ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);

$widget['code'] = 'about';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['style'] = [
    'margin-top' => '50px'
];

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
        <?php $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            ".default",
            array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => "#SITE_MACROS#include/company.php",
                "EDIT_TEMPLATE" => ""
            ),
            false
        ); ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);

$widget['code'] = 'brands';
$widget['display'] = ArrayHelper::getValue($blocks, ['active', $widget['code']], 'Y') === 'Y';
$widget['style'] = [
    'margin-top' => '50px'
];

if ($widget['display']) { ?>
    <?= Html::beginTag('div', ['style' => $widget['style']]) ?>
        <?php $APPLICATION->IncludeComponent(
            "intec.universe:widget",
            "brands",
            array(
                "IBLOCK_TYPE" => "#BRANDS_IBLOCK_TYPE#",
                "IBLOCK_ID" => "#BRANDS_IBLOCK_ID#",
                "ITEMS_LIMIT" => "",
                "DISPLAY_TITLE" => "N",
                "SHOW_DESCRIPTION" => "N",
                "COUNT_ELEMENT_IN_ROW" => "6",
                "AUTOPLAY" => "N",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "0"
            ),
            false
        ); ?>
    <?= Html::endTag('div') ?>
<?php }

unset($widget);