<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Type;

/**
 * @var array $arParams
 * @var array $arResult
 * @var string $sTemplateId
 * @var Closure $getMapCoordinates
 */
?>
<div class="contacts-offices">
    <div class="contacts-title"><?= GetMessage('N_L_CONTACTS_LIST_OFFICES') ?></div>
    <div class="contacts-description"><?= GetMessage('N_L_CONTACTS_LIST_OFFICES_DESCRIPTION') ?></div>
    <div class="contacts-sections">
        <?php foreach($arResult['SECTIONS'] as $arSection) { ?>
            <?php if (count($arSection['ITEMS']) <= 0) continue; ?>
            <div class="contacts-section">
                <div class="contacts-section-title"><?= $arSection['NAME'] ?></div>
                <div class="contacts-offices-list">
                    <div class="contacts-offices-list-wrapper">
                        <?php foreach ($arSection['ITEMS'] as $arItem) { ?>
                        <?php
                            $sId = $sTemplateId.'_'.$arItem['ID'];
                            $sAreaId = $this->GetEditAreaId($sId);
                            $arCoordinates = $getMapCoordinates($arItem);
                            $sImage = null;

                            $this->AddEditAction($sId, $arItem['EDIT_LINK']);
                            $this->AddDeleteAction($sId, $arItem['DELETE_LINK']);

                            if (!empty($arItem['PREVIEW_PICTURE'])) {
                                $sImage = CFile::ResizeImageGet(
                                    $arItem['PREVIEW_PICTURE'],
                                    array('width' => 360, 'height' => 245),
                                    BX_RESIZE_IMAGE_PROPORTIONAL_ALT
                                );

                                if (Type::isArray($sImage)) {
                                    $sImage = $sImage['src'];
                                } else {
                                    $sImage = null;
                                }
                            }
                        ?>
                            <div class="contacts-office">
                                <div class="contacts-office-wrapper" id="<?= $sAreaId ?>">
                                    <div class="contacts-image" style="background-image: url('<?= $sImage ?>')"></div>
                                    <div class="contacts-information">
                                        <?php if (!empty($arItem['SYSTEM_PROPERTIES']['ADDRESS']['VALUE'])) { ?>
                                            <div class="contacts-information-section contacts-address">
                                                <div class="contacts-information-title">
                                                    <i class="glyph-icon-location_2 intec-cl-text icon-contacts"></i>
                                                    <div class="contacts-information-text">
                                                        <?= GetMessage('N_L_CONTACTS_LIST_OFFICES_ADDRESS') ?>:
                                                    </div>
                                                </div>
                                                <div class="contacts-information-content">
                                                    <?= $arItem['SYSTEM_PROPERTIES']['ADDRESS']['VALUE'] ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($arItem['SYSTEM_PROPERTIES']['WORK_TIME']['VALUE']) && Type::isArray($arItem['SYSTEM_PROPERTIES']['WORK_TIME']['VALUE'])) { ?>
                                            <div class="contacts-information-section contacts-work-time">
                                                <div class="contacts-information-title">
                                                    <i class="period-icon glyph-icon-clock intec-cl-text icon-contacts"></i>
                                                    <div class="contacts-information-text">
                                                        <?= GetMessage('N_L_CONTACTS_LIST_OFFICES_WORK_TIME') ?>:
                                                    </div>
                                                </div>
                                                <div class="contacts-information-content">
                                                    <?php foreach ($arItem['SYSTEM_PROPERTIES']['WORK_TIME']['VALUE'] as $key => $time) { ?>
                                                        <?php $sDescription = ArrayHelper::getValue($arItem['SYSTEM_PROPERTIES']['WORK_TIME']['DESCRIPTION'], $key); ?>
                                                        <div class="contacts-work-time">
                                                            <?= !empty($sDescription) ? $sDescription.': '.$time : $time ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($arItem['SYSTEM_PROPERTIES']['EMAIL']['VALUE']) || !empty($arItem['SYSTEM_PROPERTIES']['PHONE']['VALUE'])) { ?>
                                            <div class="contacts-information-section contacts-contacts">
                                                <div class="contacts-information-title">
                                                    <i class="glyph-icon-mail intec-cl-text icon-contacts"></i>
                                                    <div class="contacts-information-text">
                                                        <?= GetMessage('N_L_CONTACTS_LIST_OFFICES_CONTACTS') ?>:
                                                    </div>
                                                </div>
                                                <div class="contacts-information-content">
                                                    <?php if (!empty($arItem['SYSTEM_PROPERTIES']['PHONE']['VALUE'])) { ?>
                                                        <div class="contacts-phone">
                                                            <?= GetMessage('N_L_CONTACTS_LIST_OFFICES_PHONE') ?>: <?= $arItem['SYSTEM_PROPERTIES']['PHONE']['VALUE'] ?>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (!empty($arItem['SYSTEM_PROPERTIES']['EMAIL']['VALUE'])) { ?>
                                                        <div class="contacts-email">
                                                            <a href="mailto:<?= $arItem['SYSTEM_PROPERTIES']['EMAIL']['VALUE'] ?>" class="contacts-email">
                                                                <?= $arItem['SYSTEM_PROPERTIES']['EMAIL']['VALUE'] ?>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($arParams['SHOW_MAP'] == 'Y' && !empty($arCoordinates)) { ?>
                                            <a href="#<?= $sTemplateId ?>_map"
                                               class="contacts-information-on-map"
                                               data-latitude="<?= $arCoordinates[0] ?>"
                                               data-longitude="<?= $arCoordinates[1] ?>"
                                            ><?= GetMessage('N_L_CONTACTS_LIST_OFFICES_SHOW_ON_MAP') ?></a>
                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>