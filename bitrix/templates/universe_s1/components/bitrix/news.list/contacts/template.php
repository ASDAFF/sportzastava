<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\JavaScript;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;
use intec\constructor\models\Build;
use Bitrix\Main\Loader;

/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 */

$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);

if (!Loader::IncludeModule('intec.core'))
    return;

if ($arParams['SHOW_LIST'] == 'SETTINGS') {
    $build = Build::getCurrent();
    $page = $build->getPage();
    $properties = $page->getProperties();
    $showList = $properties->get('template_contacts');
    if (is_string($showList)) {
        $showList = strtoupper($showList);
    }
    if (in_array($showList, ['NONE', 'SHOPS', 'OFFICES'])) {
        $arParams['SHOW_LIST'] = $showList;
    }
}

$arParams['SHOW_LIST'] = ArrayHelper::isIn($arParams['SHOW_LIST'], ['SHOPS', 'OFFICES']) ? $arParams['SHOW_LIST'] : 'NONE';

$getMapCoordinates = function ($arItem) {
    if (empty($arItem['SYSTEM_PROPERTIES']['MAP']['VALUE']))
        return null;

    $arCoordinates = StringHelper::explode($arItem['SYSTEM_PROPERTIES']['MAP']['VALUE']);

    if (!empty($arCoordinates) && count($arCoordinates) == 2) {
        $arCoordinates[0] = Type::toFloat($arCoordinates[0]);
        $arCoordinates[1] = Type::toFloat($arCoordinates[1]);

        return $arCoordinates;
    }

    return null;
};
?>
<div class="contacts" id="<?= $sTemplateId ?>">
    <?php if ($arParams['SHOW_MAP'] == 'Y') { ?>
        <div class="contacts-map" id="<?= $sTemplateId ?>_map">
            <img src="<?=CFile::GetPath($arResult['PICTURE'])?>" title="<?=$arResult['NAME']?>" alt="<?=$arResult['NAME']?>">
        </div>
    <?php } ?>
    <div class="intec-content contacts-contact-wrap">
        <div class="intec-content-wrapper">
            <?php if (!empty($arResult['CONTACT'])) { ?>
                <?php $arContact = $arResult['CONTACT'] ?>
                <?php $bDisplay = !empty($arContact['SYSTEM_PROPERTIES']['ADDRESS']['VALUE']) ||
                    !empty($arContact['SYSTEM_PROPERTIES']['PHONE']['VALUE']) ||
                    !empty($arContact['SYSTEM_PROPERTIES']['PHONE_HELP']['VALUE']) ||
                    !empty($arContact['SYSTEM_PROPERTIES']['EMAIL']['VALUE']);
                ?>
                <?php if ($bDisplay) { ?>
                    <div class="contacts-contact<?= $arParams['SHOW_MAP'] == 'Y' ? ' contacts-contact-with-map' : null ?>"
                         itemscope="" itemtype="http://schema.org/Organization">
                        <div class="contacts-contact-wrapper">
                            <?php if (!empty($arContact['SYSTEM_PROPERTIES']['EMAIL']['VALUE'])) { ?>
                                <div class="contacts-contact-parameter">
                                    <div class="contacts-contact-parameter-wrapper">
                                        <div class="contacts-contact-icon-wrap">
                                            <div class="intec-aligner"></div>
                                            <div class="contacts-contact-icon" style="background-image: url('<?= $this->GetFolder().'/images/email.png' ?>')"></div>
                                        </div>
                                        <div class="contacts-contact-text-wrap">
                                            <div class="intec-aligner"></div>
                                            <div class="contacts-contact-text">
                                                <div class="contacts-contact-title">
                                                    <?= GetMessage('N_L_CONTACTS_PROPERTY_EMAIL') ?>:
                                                </div>
                                                <span itemprop="email">
                                                     <?= $arContact['SYSTEM_PROPERTIES']['EMAIL']['VALUE'] ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($arContact['SYSTEM_PROPERTIES']['PHONE']['VALUE'])) { ?>
                                <div class="contacts-contact-parameter">
                                    <div class="contacts-contact-parameter-wrapper">
                                        <div class="contacts-contact-icon-wrap">
                                            <div class="intec-aligner"></div>
                                            <div class="contacts-contact-icon" style="background-image: url('<?= $this->GetFolder().'/images/phone-old.png' ?>')"></div>
                                        </div>
                                        <div class="contacts-contact-text-wrap">
                                            <div class="intec-aligner"></div>
                                            <div class="contacts-contact-text">
                                                <div class="contacts-contact-title">
                                                    <?= GetMessage('N_L_CONTACTS_PROPERTY_PHONE') ?>:
                                                </div>
                                                <span itemprop="telephone">
                                                    <?= $arContact['SYSTEM_PROPERTIES']['PHONE']['VALUE'] ?>
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($arContact['SYSTEM_PROPERTIES']['WORK_TIME']['VALUE'])) { ?>
                                <div class="contacts-contact-parameter">
                                    <div class="contacts-contact-parameter-wrapper">
                                        <div class="contacts-contact-icon-wrap">
                                            <div class="intec-aligner"></div>
                                            <div class="contacts-contact-icon" style="background-image: url('<?= $this->GetFolder().'/images/phone.png' ?>')"></div>
                                        </div>
                                        <div class="contacts-contact-text-wrap">
                                            <div class="intec-aligner"></div>
                                            <div class="contacts-contact-text">
                                                <div class="contacts-contact-title">
                                                    <?= GetMessage('N_L_CONTACTS_PROPERTY_PHONE_HELP') ?>:
                                                </div>
                                                <span itemprop="telephone">
                                                    <? foreach($arContact['SYSTEM_PROPERTIES']['WORK_TIME']['VALUE'] as $desc => $value): ?>
                                                    <?= $arContact['SYSTEM_PROPERTIES']['WORK_TIME']['DESCRIPTION'][$desc] ?>: <?= $value ?><br>
                                                    <? endforeach; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($arContact['SYSTEM_PROPERTIES']['ADDRESS']['VALUE'])) { ?>
                                <div class="contacts-contact-parameter">
                                    <div class="contacts-contact-parameter-wrapper">
                                        <div class="contacts-contact-icon-wrap">
                                            <div class="intec-aligner"></div>
                                            <div class="contacts-contact-icon" style="background-image: url('<?= $this->GetFolder().'/images/location.png' ?>')"></div>
                                        </div>
                                        <div class="contacts-contact-text-wrap">
                                            <div class="intec-aligner"></div>
                                            <div class="contacts-contact-text" itemprop="address">
                                                <?= $arContact['SYSTEM_PROPERTIES']['ADDRESS']['VALUE'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="intec-content">
        <div class="intec-content-wrapper">
            <?php if ($arParams['SHOW_LIST'] == 'SHOPS') { ?>
                <?php require('parts/shops.php') ?>
            <?php } ?>
            <?php if ($arParams['SHOW_LIST'] == 'OFFICES') { ?>
                <?php require('parts/offices.php') ?>
            <?php } ?>
            <?php if ($arParams['SHOW_MAP'] == 'Y') { ?>
                <script type="text/javascript">
                    (function ($, api) {
                        BX.ready(function () {
                            var root = $(<?= JavaScript::toObject('#'.$sTemplateId) ?>);
                            var move;
                            var map;
                            var buttons;

                            move = function (latitude, longitude) {
                                latitude = api.toFloat(latitude);
                                longitude = api.toFloat(longitude);

                                map.panTo(new google.maps.LatLng(latitude, longitude));
                            };

                            if (window.maps) {
                                map = window.maps[<?= JavaScript::toObject($arParams['MAP_ID']) ?>];

                                if (map) {
                                    buttons = root.find('[data-latitude][data-longitude]');
                                    buttons.on('click', function (event) {
                                        var item = $(this);
                                        var anchor = item.attr('href');

                                        move(
                                            item.data('latitude'),
                                            item.data('longitude')
                                        );

                                        if (anchor) {
                                            $(window).stop().animate({
                                                scrollTop: $(anchor).offset().top
                                            }, 1000);

                                            event.preventDefault();
                                        }
                                    });
                                }
                            }
                        });
                    })(jQuery, intec)
                </script>
            <?php } ?>
            <?php if ($arParams['SHOW_FORM'] == 'Y') { ?>
                <div class="contacts-form-wrap">
                    <?php if (Loader::IncludeModule('intec.startshop')) {?>
                        <?php $APPLICATION->IncludeComponent(
                            "intec:startshop.forms.result.new",
                            "contacts",
                            array(
                                "COMPONENT_TEMPLATE" => "contacts",
                                "FORM_ID" => $arParams['WEB_FORM_ID'],
                                "AJAX_MODE" => "Y",
                                "CONSENT_URL" => $arResult['WEB_FORM_CONSENT_URL'],
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "REQUEST_VARIABLE_ACTION" => "action",
                                "FORM_VARIABLE_CAPTCHA_SID" => "CAPTCHA_SID",
                                "FORM_VARIABLE_CAPTCHA_CODE" => "CAPTCHA_CODE"
                            ),
                            $component,
                            array(
                                'HIDE_ICONS' => 'Y'
                            )
                        );?>
                    <?php } elseif (Loader::IncludeModule('form')) {?>
                        <?php $APPLICATION->IncludeComponent(
                            'bitrix:form.result.new',
                            'contacts',
                            array(
                                'WEB_FORM_ID' => $arParams['WEB_FORM_ID'],
                                'AJAX_MODE' => 'Y',
                                'IGNORE_CUSTOM_TEMPLATE' => 'N',
                                'USE_EXTENDED_ERRORS' => 'N',
                                'LIST_URL' => null,
                                'EDIT_URL' => null,
                                'SUCCESS_URL' => null,
                                'CHAIN_ITEM_TEXT' => null,
                                'CHAIN_ITEM_LINK' => null,
                                'CONSENT_URL' => $arResult['WEB_FORM_CONSENT_URL']
                            ),
                            $component,
                            array(
                                'HIDE_ICONS' => 'Y'
                            )
                        ) ?>
                    <?php }?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
