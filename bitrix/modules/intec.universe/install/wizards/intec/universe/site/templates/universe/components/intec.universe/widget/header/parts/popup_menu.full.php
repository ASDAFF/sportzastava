<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @global CMain $APPLICATION
 * @var string $sTemplateId
 */
?>
<div class="header-content">
    <div class="intec-content">
        <div class="intec-content-wrapper intec-content-wrapper-popup">
            <div class="header-content-wrapper">
                <div class="header-content-wrapper-2">
                    <div class="header-content-wrapper-3">
                        <div class="header-content-item">
                            <div class="button-popup-menu-close intec-cl-text-hover glyph-icon-cancel"></div>
                        </div>
                        <div class="header-content-item hci-logo">
                            <a href="<?= SITE_DIR ?>" class="header-content-item-wrapper header-content-logotype intec-image">
                                <div class="intec-aligner"></div>
                                <?php $APPLICATION->IncludeComponent(
                                    'bitrix:main.include',
                                    '.default',
                                    array(
                                        'AREA_FILE_SHOW' => 'file',
                                        'PATH' => $arResult['LOGOTYPE_PATH'],
                                        'EDIT_TEMPLATE' => null
                                    ),
                                    $component
                                );?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-content">
    <div class="intec-content">
        <div class="intec-content-wrapper intec-content-wrapper-popup">
            <div class="header-content-wrapper">
                <div class="catalog-menu-popup">
                    <? $APPLICATION->IncludeComponent(
                        'bitrix:menu',
                        'popup-sitemap',
                        array(
                            'ROOT_MENU_TYPE' => $arParams['MENU_MAIN_ROOT_TYPE'],
                            'MENU_CACHE_TYPE' => 'N',
                            'MAX_LEVEL' => $arParams['MENU_MAIN_MAX_LEVEL'],
                            'MENU_CATALOG_LINK' => $arParams['MENU_CATALOG_LINK'],
                            'CHILD_MENU_TYPE' => $arParams['MENU_MAIN_CHILD_TYPE'],
                            'USE_EXT' => 'Y',
                            'DELAY' => 'N',
                            'ALLOW_MULTI_SELECT' => 'N',
                            'PROPERTY_IMAGE' => $arParams['MENU_PROPERTY_IMAGE'],
                            'DEFAULT_VIEW' => $arParams['MENU_DEFAULT_VIEW'],
                            'SECTION_VIEW' => $arParams['MENU_SECTION_VIEW'],
                            'POSITION_MENU' => $arParams['MENU_MAIN_DISPLAY_IN']
                        ),
                        $component
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</div>