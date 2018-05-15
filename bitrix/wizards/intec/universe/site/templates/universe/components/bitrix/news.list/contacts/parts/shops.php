<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
use intec\core\helpers\Type;

/**
 * @var array $arParams
 * @var array $arResult
 * @var string $sTemplateId
 * @var Closure $getMapCoordinates
 */
?>
<div class="contacts-shops">
    <div class="contacts-title"><?= GetMessage('N_L_CONTACTS_LIST_SHOPS') ?></div>
    <div class="contacts-sections">
        <ul class="nav nav-tabs intec-tabs">
            <?php $bSectionFirst = true ?>
            <?php foreach($arResult['SECTIONS'] as $arSection) { ?>
                <?php if (count($arSection['ITEMS']) <= 0) continue; ?>
                <li role="presentation"<?= $bSectionFirst ? ' class="active"' : null ?>">
                    <a href="#contacts-<?= $sTemplateId ?>-section-<?= $arSection['ID'] ?>"
                       aria-controls="contacts-<?= $sTemplateId ?>-section-<?= $arSection['ID'] ?>"
                       role="tab"
                       data-toggle="tab"
                    ><?= $arSection['NAME'] ?></a>
                </li>
                <?php $bSectionFirst = false ?>
            <?php } ?>
        </ul>
        <div class="tab-content clearfix">
            <?php $bSectionFirst = true ?>
            <?php foreach($arResult['SECTIONS'] as $arSection) { ?>
                <?php if (count($arSection['ITEMS']) <= 0) continue; ?>
                <div role="tabpanel"
                     id="contacts-<?= $sTemplateId ?>-section-<?= $arSection['ID'] ?>"
                     class="tab-pane<?= $bSectionFirst ? ' active' : null ?>"
                >
                    <div class="contacts-shops-list">
                        <div class="contacts-shops-list-wrapper row">
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
                                        array('width' => 240, 'height' => 240),
                                        BX_RESIZE_IMAGE_PROPORTIONAL_ALT
                                    );

                                    if (Type::isArray($sImage)) {
                                        $sImage = $sImage['src'];
                                    } else {
                                        $sImage = null;
                                    }
                                }
                            ?>
                                <div class="contacts-shop col-xs-12 col-md-6 col-lg-4">
                                    <div class="contacts-shop-wrapper" id="<?= $sAreaId ?>">
                                        <div class="contacts-image">
                                            <div class="contacts-image-wrapper" style="background-image: url('<?= $sImage ?>')"></div>
                                        </div>
                                        <div class="contacts-information">
                                            <?php if (!empty($arItem['SYSTEM_PROPERTIES']['ADDRESS']['VALUE'])) { ?>
                                                <div class="contacts-address"><?= $arItem['SYSTEM_PROPERTIES']['ADDRESS']['VALUE'] ?></div>
                                            <?php } ?>
                                            <?php if (!empty($arItem['SYSTEM_PROPERTIES']['PHONE']['VALUE'])) { ?>
                                                <div class="contacts-phone">
                                                    <span><?= GetMessage('N_L_CONTACTS_LIST_SHOPS_PHONE') ?>:</span>
                                                    <span><?= $arItem['SYSTEM_PROPERTIES']['PHONE']['VALUE'] ?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if (!empty($arItem['SYSTEM_PROPERTIES']['EMAIL']['VALUE'])) { ?>
                                                <a href="mailto:<?= $arItem['SYSTEM_PROPERTIES']['EMAIL']['VALUE'] ?>" class="contacts-email intec-cl-text"><?= $arItem['SYSTEM_PROPERTIES']['EMAIL']['VALUE'] ?></a>
                                            <?php } ?>
                                            <?php if ($arParams['SHOW_MAP'] == 'Y' && !empty($arCoordinates)) { ?>
                                                <a href="#<?= $sTemplateId ?>_map"
                                                   class="contacts-on-map"
                                                   data-latitude="<?= $arCoordinates[0] ?>"
                                                   data-longitude="<?= $arCoordinates[1] ?>"
                                                ><?= GetMessage('N_L_CONTACTS_LIST_SHOPS_SHOW_ON_MAP') ?></a>
                                            <?php } ?>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php $bSectionFirst = false ?>
            <?php } ?>
        </div>
    </div>
</div>