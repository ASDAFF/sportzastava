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

$bSearchDisplay =
    $arParams['DISPLAY_SEARCH'] == 'Y' &&
    $arParams['TYPE_SEARCH'] == 'normal' &&
    $arParams['POSITION_SEARCH'] == 'header' &&
    (
        $arParams['MENU_MAIN_DISPLAY'] != 'Y' ||
        $arParams['MENU_MAIN_DISPLAY_IN'] != 'header'
    );

$bCompareDisplay =
    $arParams['COMPARE_DISPLAY'] == 'Y' &&
    !empty($arParams['COMPARE_CODE']) &&
    !empty($arParams['COMPARE_IBLOCK_ID']);

$bBasketDisplay =
    $arParams['BASKET_DISPLAY'] == 'Y';

$bBasketDelayDisplay =
    $arParams['BASKET_DELAY_DISPLAY'] == 'Y';

$bIconsDisplay =
    $bCompareDisplay ||
    $bBasketDisplay ||
    $bBasketDelayDisplay;

?>
<div id="header-fixed" class="header-fixed">
    <div class="header-content">
        <div class="intec-content intec-content-primary">
            <div class="intec-content-wrapper">
                <div class="header-content-wrapper">
                   <div class="header-content-wrapper-2">
                        <div class="header-content-wrapper-3">
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
                            <div class="header-content-item header-content-item-full header-content-menu">
                                <div class="header-content-item-wrapper header-content-menu-wrapper">
                                    <?php include('menu_fixed.component.php') ?>
                                </div>
                            </div>
                            <div class="header-content-item">
                                <?php include('search_fixed.component.php')?>
                            </div>
                            <?php if ($bIconsDisplay) { ?>
                                <div class="header-content-item">
                                    <div class="header-content-item-wrapper header-content-sale">
                                        <?php $APPLICATION->IncludeComponent(
                                            'intec.universe:widget',
                                            'basket.icons',
                                            array(
                                                'SHOW_COMPARE' => $bCompareDisplay ? 'Y' : 'N',
                                                'SHOW_BASKET' => $bBasketDisplay ? 'Y' : 'N',
                                                'SHOW_DELAY' => $bBasketDelayDisplay ? 'Y' : 'N',
                                                'URL_BASKET' => $arResult['BASKET_URL'],
                                                'URL_COMPARE' => $arResult['COMPARE_URL'],
                                                'COMPARE_CODE' => $arParams['COMPARE_CODE'],
                                                'COMPARE_IBLOCK_ID' => $arParams['COMPARE_IBLOCK_ID']
                                            ),
                                            $component
                                        ); ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?if($arParams["AUTH_DISPLAY"] == "Y"){?>
                                <div class="header-content-item">
                                    <?php $APPLICATION->IncludeComponent(
                                        'bitrix:system.auth.form',
                                        '.default',
                                        array(
                                            'LOGIN_URL' => $arResult['LOGIN_URL'],
                                            'PROFILE_URL' => $arResult['PROFILE_URL'],
                                            'FORGOT_PASSWORD_URL' => $arResult['FORGOT_PASSWORD_URL'],
                                            'REGISTER_URL' => $arResult['REGISTER_URL'],
                                            'FIXED' => 'Y'
                                        ),
                                        $component
                                    ) ?>
                                </div>
                            <?}?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>