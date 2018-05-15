<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @global CMain $APPLICATION
 * @var string $sTemplateId
 */

$bAuthDisplay = $arParams['AUTH_MOBILE_DISPLAY'] == 'Y';
$bBasketDisplay = $arParams['BASKET_MOBILE_DISPLAY'] == 'Y';
$bSearchDisplay = $arParams['DISPLAY_SEARCH'] == 'Y';

$bIconsDisplay =
    $bAuthDisplay ||
    $bBasketDisplay ||
    $bSearchDisplay;
?>
<div class="header-panel<?= $bIconsDisplay ? ' header-panel-with-icons' : null ?><?= $arParams['MOBILE_VIEW'] == 'colored' ? ' header-panel-colored intec-cl-background intec-cl-border' : null ?>">
    <div class="header-panel-item header-panel-menu">
        <?php $APPLICATION->IncludeComponent(
            'bitrix:menu',
            'mobile',
            array(
                'ROOT_MENU_TYPE' => $arParams['MENU_MOBILE_ROOT_TYPE'],
                'MENU_CACHE_TYPE' => 'N',
                'MAX_LEVEL' => $arParams['MENU_MOBILE_MAX_LEVEL'],
                'CHILD_MENU_TYPE' => $arParams['MENU_MOBILE_CHILD_TYPE'],
                'USE_EXT' => 'Y',
                'DELAY' => 'N',
                'ALLOW_MULTI_SELECT' => 'N',
                'MOBILE_VIEW' => $arParams['MOBILE_VIEW']
            ),
            $component
        ); ?>
    </div>
    <div class="header-panel-item header-panel-logotype<?= $arParams['MOBILE_LOGOTYPE_CENTERED'] == 'Y' ? ' header-panel-logotype-center' : null ?>">
        <div class="header-panel-logotype-wrapper">
            <a href="<?= SITE_DIR ?>" class="header-panel-logotype-wrapper-2 intec-image">
                <div class="intec-aligner"></div>
                <?php $APPLICATION->IncludeComponent(
                    'bitrix:main.include',
                    '.default',
                    array(
                        'AREA_FILE_SHOW' => 'file',
                        'PATH' => $arResult['LOGOTYPE_MOBILE_PATH'],
                        'EDIT_TEMPLATE' => null
                    ),
                    $component
                );?>
            </a>
        </div>
    </div>
    <?php if ($bIconsDisplay) { ?>
        <div class="header-panel-item header-panel-icons">
            <div class="header-panel-icons-wrapper">
                <div class="intec-aligner"></div>

                <?php if ($bAuthDisplay) { ?>
                    <?php $APPLICATION->IncludeComponent(
                        'bitrix:system.auth.form',
                        'mobile',
                        array(
                            'LOGIN_URL' => $arResult['LOGIN_URL'],
                            'PROFILE_URL' => $arResult['PROFILE_URL'],
                            'FORGOT_PASSWORD_URL' => $arResult['FORGOT_PASSWORD_URL'],
                            'REGISTER_URL' => $arResult['REGISTER_URL'],
                            'MOBILE_VIEW' => $arParams['MOBILE_VIEW'],
                            'PROFILE_DISPLAY' => $arParams['AUTH_MOBILE_PROFILE_DISPLAY'],
                            'LOGIN_DISPLAY' => $arParams['AUTH_MOBILE_LOGIN_DISPLAY'],
                            'LOGOUT_DISPLAY' => $arParams['AUTH_MOBILE_LOGOUT_DISPLAY']
                        ),
                        $component
                    ) ?>
                <?php } ?>
                <?php if ($bSearchDisplay) {?>
                    <a href="<?=$arResult['SEARCH_PAGE']?>" class="header-panel-icon intec-cl-text">
                        <i class="glyph-icon-loop"></i>
                    </a>
                <?php }?>
                <?php if ($bBasketDisplay) { ?>
                    <a href="<?= $arResult['BASKET_URL'] ?>" class="header-panel-icon<?= $arParams['MOBILE_VIEW'] == 'default' ? ' intec-cl-text' : null ?>">
                        <i class="glyph-icon-cart"></i>
                    </a>
                <?php } ?>
            </div>
        </div>
        <script>
            $(document).ready(positionLogotype);
            $(window).resize(positionLogotype);

            function positionLogotype() {
                var widthIcon = $('.header-mobile .header-panel-item.header-panel-icons').outerWidth();
                if (widthIcon > 0) {
                    $('.header-panel-item.header-panel-logotype').css({
                        'margin-right': widthIcon+20
                    });
                }
            }
        </script>
    <?php } ?>
    <div class="clearfix"></div>
</div>
