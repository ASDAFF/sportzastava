<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\constructor\models\build\Property;

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var Property $property
 * @var string $propertyCode
 */

$wrapperClass = 'col-xs-12';
$itemClass = 'col-xs-12 col-sm-6';

switch ($propertyCode) {

    # ---------- Color ----------
    case 'color':
        $colors = array('#69102F', '#E05615', '#383B47', '#074D90', '#D03349', '#1E8988', '#5BCAB2', '#352ca6', '#F78E16', '#8DC6C7', '#772056', '#838ED9', '#143A52', '#81AE64', '#FF6F3C', '#F5B553', '#388E3C', '#44558F', '#2BB3C0', '#303481', '#0065ff', '#3498DB', '#C50000');
        include('settings/colors.php');
        break;
    case 'bg_color':
        $wrapperClass = 'col-xs-12 col-sm-6';
        $colors = array('#fff', '#c8c8cd');
        include('settings/colors_bg.php');
        break;

    # ---------- Radio ----------
    case 'site_width':
    case 'search_mode':
    case 'font_size_titles':
    case 'font_size':
    case 'smart_filter':
    case 'catalog_detail':
    case 'default_products_view':
    case 'mobile_menu_type':
    case 'template_mobile_shares_widget':
    case 'use_regionality_on':
    case 'view_regions':
    case 'basket_type':
    case 'basket_color':
    case 'footer_theme':
        include('settings/radio.php');
        break;

    # ---------- Checkbox ----------
    case 'inform_about_processing_personal_data':
        include('settings/checkbox.php');
        break;
    case 'show_bg':
        $wrapperClass = 'col-xs-12 col-sm-6';
        include('settings/checkbox.php');
        break;
    case 'use_fixed_mobile_header':
    case 'use_fixed_header':
    case 'use_quick_view_in_catalog':
    case 'use_quick_view_in_basket':
    case 'use_offer_title':
    case 'use_product_sum':
    case 'use_delimiter_element':
    case 'show_sections_icons_in_menu':
    case 'use_quick_view':
    case 'use_fixed_header_product':
    case 'show_side_menu_on_product_page':
    case 'show_products_in_catalog_section':
    case 'use_basket':
    case 'show_flying_basket_when_add_product':
    case 'show_print_button_on_create_order_page':
    case 'fio_in_one_field':
    case 'login_equal_email':
    case 'use_regionality':
    case 'footer_show_feedback':
        include('settings/checkbox_inline.php');
        break;
    case 'side_menu':
    case 'catalog_detail_image':
        include('settings/checkbox_list.php');
        break;

    # ---------- Templates ----------
    case 'template_menu_inner':
    case 'template_main_page':
    case 'template_catalog_root':
    case 'template_catalog_section':
    case 'template_catalog_product':
    case 'banners_position':
    case 'template_blog':
    case 'template_product_catalog':
    case 'template_contacts':
    case 'template_about':
    case 'template_certificates':
    case 'template_service_page':
    case 'template_reviews':
    case 'template_news':
    case 'template_news_section':
    case 'template_categories':
    case 'template_services_catalog':
    case 'template_services_root':
    case 'template_services_section':
    case 'template_banner':
    case 'template_shares_widget':
    case 'template_shares_section':
    case 'template_shares_page':
    case 'template_rubrics':
    case 'template_mobile_news':
    case 'template_mobile_services':
    case 'template_mobile_reviews':
    case 'template_articles':
        include('settings/templates.php');
        break;
    case 'template_fixed_header':
    case 'template_menu':
    case 'template_footer':
    case 'template_mobile_header':
        $itemClass = 'col-xs-12';
        include('settings/templates.php');
        break;
    case 'template_mobile_menu_show':
    case 'template_mobile_catalog_sections':
    case 'template_mobile_catalog':
    case 'template_mobile_products':
    case 'template_mobile_collections':
    case 'template_mobile_blog':
        $itemClass = 'col-xs-12 col-sm-6 col-md-4';
        include('settings/templates.php');
        break;
    case 'template_basket_icon':
        $itemClass = 'col-xs-6 col-sm-4 col-md-3';
        include('settings/templates.php');
        break;
    case 'font_family':
        include('settings/radio_font.php');
        break;

    default:
        ?>
        <div class="universe-settings-item <?= $wrapperClass ?>">
            <div class="universe-settings-item-title"><?= $property->name ?></div>
            <div class="universe-settings-item-wrapper"><? var_dump($property) ?></div>
        </div>
        <?php
        break;
}
