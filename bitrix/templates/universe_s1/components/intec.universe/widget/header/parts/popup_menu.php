<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\JavaScript;
use intec\core\helpers\Type;

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
                            <div class="button-popup-menu-close fa fa-times intec-cl-text"></div>
                        </div>
                        <div class="header-content-item">
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
                        <?php if (true) { ?>
                            <div class="header-content-item header-content-item-full header-content-menu">
                                <div class="header-content-item-wrapper header-content-menu-wrapper">
                                    <?php include('menu.component.php') ?>
                                </div>
                            </div>
                        <?php } elseif (true) { ?>
                            <div class="header-content-item header-content-item-full">
                                <?php include('search.component.php') ?>
                            </div>
                        <?php } else { ?>
                            <div class="header-content-item header-content-item-full">
                            </div>
                        <?php }?>
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
                        'bitrix:catalog.section.list',
                        'menu_popup',
                        array(
                            'IBLOCK_TYPE' => $arParams['CATALOG_IBLOCK_TYPE'],
                            'IBLOCK_ID' => $arParams['CATALOG_IBLOCK_ID'],
                            'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                            'CACHE_TIME' => $arParams['CACHE_TIME'],
                            'CACHE_GROUPS' => $arParams['CACHE_GROUPS']
                        ),
                        $component
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</div>