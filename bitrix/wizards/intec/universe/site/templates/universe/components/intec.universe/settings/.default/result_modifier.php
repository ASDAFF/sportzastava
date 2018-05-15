<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\Core;
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\RegExp;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;

$request = Core::$app->request;

$arResult['ACTIVE_TAB'] = 'global';

if ($arResult['SAVED'])
    $arResult['ACTIVE_TAB'] = $request->post('active_tab', $arResult['ACTIVE_TAB']);


/**
 * @global $APPLICATION
 * @global $USER
 * @var array $arParams
 * @var array $arResult
 */

$arResult['GROUPS'] = array(
    'global' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_GLOBAL'),
        'properties' => array(
            'color',
            'show_bg',
            'bg_color',
            'site_width',
            'search_mode',
            //'side_menu', //invalid
            //'template_menu_inner', //invalid
            'font_size_titles',
            'font_size',
            'font_family',
            'inform_about_processing_personal_data'
        )
    ),
    'main' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_MAIN'),
        'properties' => array(
            'template_main_page'
        )
    ),
    'header' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_HEADER'),
        'properties' => array(
            'template_menu',
            'use_fixed_header',
            'template_mobile_header',
            'use_fixed_mobile_header'
        )
    ),
    /*'regions' => array( //invalid
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_REGIONS'),
        'properties' => array(
            'use_regionality',
            'use_regionality_on',
            'view_regions'
        )
    ),*/
    'catalog' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_CATALOG'),
        'properties' => array(
            //'smart_filter', //invalid
            //'catalog_detail', //invalid
            'catalog_detail_image',
            'default_products_view',
            //'use_quick_view_in_catalog', //invalid
            //'use_offer_title', //invalid
            //'use_product_sum', //invalid
            'use_delimiter_element',
            'show_sections_icons_in_menu',
            'use_quick_view',
            'use_fixed_header_product',
            //'show_side_menu_on_product_page', //invalid
            //'show_products_in_catalog_section', //invalid
            'template_catalog_root',
            'template_catalog_section',
            'template_catalog_product'
        )
    ),
    'services' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_SERVICES'),
        'properties' => array(
            'template_services_root',
            'template_services_section',
            'template_service_page'
        )
    ),
    'basket' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_BASKET'),
        'properties' => array(
            //'basket_type', //invalid
            //'basket_color', //invalid
            //'template_basket_icon', // invalid
            //'use_quick_view_in_basket', //invalid
            'use_basket',
            'show_flying_basket_when_add_product',
            //'show_print_button_on_create_order_page' //invalid
        )
    ),
    'sections' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_SECTIONS'),
        'properties' => array(
            'template_shares_section',
            'template_shares_page',
            //'template_blog', //invalid
            'template_contacts',
            'template_news_section',
            //'template_about', //invalid
            'template_certificates'
        )
    ),
    'footer' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_FOOTER'),
        'properties' => array(
            'footer_show_feedback',
            'footer_theme',
            'template_footer'
        )
    ),
    /*'banners' => array( //invalid
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_BANNERS'),
        'properties' => array(
            'banners_position'
        )
    ),*/
    'mobile' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_MOBILE'),
        'properties' => array(
            //'mobile_menu_type', //invalid
            //'template_mobile_menu_show', //invalid
            'template_mobile_catalog_sections',
            'template_mobile_catalog',
            'template_mobile_products',
            'template_mobile_collections',
            'template_mobile_blog',
            'template_mobile_services'
        )
    ),
    'cabinet' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_CABINET'),
        'properties' => array(
            'fio_in_one_field',
            'login_equal_email'
        )
    ),
    'templates' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_GROUP_TEMPLATES'),
        'properties' => array()
    )
);

if ($arResult['HANDLE']) {
    $values = ArrayHelper::getValue($arResult, ['PROPERTIES', 'menu_display_in', 'value']);

    if (!Type::isArray($values))
        $values = [];

    $arResult['VALUES']['menu_display'] = 'N';
    $path = '/' . Core::$app->request->getPathInfo();
    $path = RegExp::replaceBy('/^' . RegExp::escape(SITE_DIR) . '/', null, $path);
    $path = StringHelper::replace($path, [
        '/' => '.'
    ]);
    $path = trim($path, '.');

    foreach ($values as $key => $value) {
        $display = ArrayHelper::getValue($value, 'display');
        $display = Type::toBoolean($display);

        if (RegExp::isMatchBy('/^'.RegExp::escape($key).'/', $path))
            $arResult['VALUES']['menu_display'] = $display ? 'Y' : 'N';
    }
}

$arResult['MAIN_BLOCKS'] = array(
    'main_banner' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_MAIN_BANNER'),
        'template' => 'template_banner'
    ),
    'icons' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_ICONS'),
    ),
    'categories' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_CATEGORIES'),
        'template' => 'template_categories'
    ),
    'rubric' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_RUBRIC'),
        'template' => 'template_rubrics'
    ),
    'photogallery' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_PHOTOGALLERY'),
    ),
    'products' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_PRODUCTS'),
        'mobile_template' => 'template_mobile_products'
    ),
    'reviews' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_REVIEWS'),
        'template' => 'template_reviews',
        'mobile_template' => 'template_mobile_reviews'
    ),
    'services' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_SERVICES'),
        'template' => 'template_services_catalog',
        'mobile_template' => 'template_mobile_services'
    ),
    'news' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_NEWS'),
        'template' => 'template_news',
        'mobile_template' => 'template_mobile_news'
    ),
    'shares' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_SHARES'),
        'template' => 'template_shares_widget',
        'mobile_template' => 'template_mobile_shares_widget'
    ),
    'about' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_ABOUT')
    ),
    'brands' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_BRANDS')
    ),
    'articles' => array(
        'name' => GetMessage('UNIVERSE_SETTINGS_BLOCK_ARTICLES'),
        'template' => 'template_articles'
    )
);