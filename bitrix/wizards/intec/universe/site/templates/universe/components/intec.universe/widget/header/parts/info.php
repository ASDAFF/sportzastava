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

$bMenuDisplay =
    $arParams['MENU_INFO_DISPLAY'] == 'Y';

$bSearchDisplay =
    $arParams['DISPLAY_SEARCH'] == 'Y' &&
    $arParams['POSITION_SEARCH'] == 'top';

$bLocationDisplay =
    $arParams['LOCATION_DISPLAY'] == 'Y' &&
    !empty($arParams['LOCATION']) &&
    $arParams['POSITION_STICKERS'] != 'header';

$bMailDisplay =
    $arParams['MAIL_DISPLAY'] == 'Y' &&
    !empty($arParams['MAIL']) &&
    $arParams['POSITION_STICKERS'] != 'header';

$arPhones = ArrayHelper::getValue($arParams, 'PHONE');

if (!Type::isArray($arPhones))
    $arPhones = [];

$sPhone = ArrayHelper::getFirstValue($arParams['PHONE']);
$bPhoneDisplay =
    $arParams['PHONE_DISPLAY'] == 'Y' &&
    $arParams['PHONE_DISPLAY_IN'] == 'default' &&
    !empty($sPhone) &&
    $arParams['POSITION_STICKERS'] != 'header';

$bStickersDisplay =
    $bLocationDisplay ||
    $bMailDisplay ||
    $bPhoneDisplay;

$bAuthDisplay =
    $arParams['AUTH_DISPLAY'] == 'Y' &&
    $arParams['POSITION_AUTH'] == 'top';

$bSocialDisplay =
    $arParams["HEADER_SHOW_SOCIAL"] == 'Y' &&
    (
        $arParams["HEADER_VK"] ||
        $arParams["HEADER_FACEBOOK"] ||
        $arParams["HEADER_INSTAGRAM"] ||
        $arParams["HEADER_TWITTER"]
    );
$bSocialPosition = $arParams['POSITION_HEADER_SOCIAL'];

$bDisplay =
    $bMenuDisplay ||
    $bLocationDisplay ||
    $bMailDisplay ||
    $bPhoneDisplay ||
    $bAuthDisplay ||
    $bSearchDisplay ||
    $bSocialDisplay;
?>
<?php if ($bDisplay) { ?>
    <div class="header-info">
        <div class="intec-content intec-content-visible">
            <div class="intec-content-wrapper">
                <div class="header-info-left">
                    <?php if ($bMenuDisplay) { ?>
                        <?php $APPLICATION->IncludeComponent(
                            'bitrix:menu',
                            'info',
                            array(
                                'ROOT_MENU_TYPE' => $arParams['MENU_INFO_ROOT_TYPE'],
                                'MENU_CACHE_TYPE' => 'N',
                                'MAX_LEVEL' => $arParams['MENU_INFO_MAX_LEVEL'],
                                'CHILD_MENU_TYPE' => $arParams['MENU_INFO_CHILD_TYPE'],
                                'USE_EXT' => 'Y',
                                'DELAY' => 'N',
                                'ALLOW_MULTI_SELECT' => 'N'
                            ),
                            $component
                        ); ?>
                    <?php } ?>
                </div>
                <?php if ($bStickersDisplay && $arParams['POSITION_STICKERS'] == 'top_left') { ?>
                    <div class="header-info-left">
                        <? include('info_stickers.php') ?>
                    </div>
                <?php } ?>
                <?php if ($bSocialDisplay && $bSocialPosition == 'default') { ?>
                    <div class="header-info-left">
                        <? include('social.php') ?>
                    </div>
                <?php } ?>
                <div class="header-info-right">
                    <?php if ($bSearchDisplay) {?>
                        <?php include('search.component.php') ?>
                    <?php }?>
                    <?php if ($bAuthDisplay) { ?>
                        <?php $APPLICATION->IncludeComponent(
                            'bitrix:system.auth.form',
                            '.default',
                            array(
                                'LOGIN_URL' => $arResult['LOGIN_URL'],
                                'PROFILE_URL' => $arResult['PROFILE_URL'],
                                'FORGOT_PASSWORD_URL' => $arResult['FORGOT_PASSWORD_URL'],
                                'REGISTER_URL' => $arResult['REGISTER_URL']
                            ),
                            $component
                        ) ?>
                    <?php } ?>
                </div>
                <?php if ($bStickersDisplay && $arParams['POSITION_STICKERS'] == 'top_right') { ?>
                    <div class="header-info-right">
                        <? include('info_stickers.php') ?>
                    </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php } ?>