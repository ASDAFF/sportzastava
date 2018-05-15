<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use intec\core\helpers\ArrayHelper;

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
?>
<div class="stuffs" id="<?= $sTemplateId ?>">
    <div class="intec-content">
        <div class="intec-content-wrapper">
            <ul class="nav nav-tabs intec-tabs">
                <?php $bSectionFirst = true ?>
                <?php foreach($arResult['SECTIONS'] as $arSection) { ?>
                    <?php if (count($arSection['ITEMS']) <= 0) continue; ?>
                    <li role="presentation"<?= $bSectionFirst ? ' class="active"' : null ?>">
                        <a href="#<?= $sTemplateId ?>-section-<?= $arSection['ID'] ?>"
                           aria-controls="<?= $sTemplateId ?>-section-<?= $arSection['ID'] ?>"
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
                         id="<?= $sTemplateId ?>-section-<?= $arSection['ID'] ?>"
                         class="tab-pane<?= $bSectionFirst ? ' active' : null ?>"
                    >
                        <div class="stuffs-section">
                            <div class="stuffs-section-wrapper">
                                <?php foreach ($arSection['ITEMS'] as $arItem) { ?>
                                <?php
                                    $sId = $sTemplateId.'_'.$sType.'_tile_'.$arItem['ID'];
                                    $sAreaId = $this->GetEditAreaId($sId);
                                    $this->AddEditAction($sId, $arItem['EDIT_LINK']);
                                    $this->AddDeleteAction($sId, $arItem['DELETE_LINK']);

                                    $sImage = null;

                                    if (!empty($arItem['PREVIEW_PICTURE'])) {
                                        $sImage = $arItem['PREVIEW_PICTURE'];
                                    } else if (!empty($arItem['DETAIL_PICTURE'])) {
                                        $sImage = $arItem['DETAIL_PICTURE'];
                                    }

                                    $sImage = CFile::ResizeImageGet($sImage, array(
                                        'width' => 400,
                                        'height' => 400
                                    ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

                                    if (!empty($sImage)) {
                                        $sImage = $sImage['src'];
                                    } else {
                                        $sImage = null;
                                    }

                                    $sPosition = ArrayHelper::getValue($arItem, ['SYSTEM_PROPERTIES', 'POSITION', 'VALUE']);
                                    $sPhone = ArrayHelper::getValue($arItem, ['SYSTEM_PROPERTIES', 'PHONE', 'VALUE']);
                                    $sSkype = ArrayHelper::getValue($arItem, ['SYSTEM_PROPERTIES', 'SKYPE', 'VALUE']);
                                    $sEmail = ArrayHelper::getValue($arItem, ['SYSTEM_PROPERTIES', 'EMAIL', 'VALUE']);
                                ?>
                                    <div class="stuffs-item">
                                        <div class="stuffs-item-wrapper" id="<?= $sAreaId ?>">
                                            <div class="stuffs-item-image" style="background-image: url('<?= $sImage ?>')"></div>
                                            <div class="stuffs-item-information">
                                                <div class="stuffs-item-name"><?= $arItem['NAME'] ?></div>
                                                <div class="stuffs-item-position"><?= $sPosition ?></div>
                                                <div class="stuffs-item-delimiter"></div>
                                                <div class="stuffs-item-phone">
                                                    <?php if (!empty($sPhone)) { ?>
                                                        <?= GetMessage('N_L_STUFFS_PHONE').': '.$sPhone ?>
                                                    <?php } ?>
                                                </div>
                                                <div class="stuffs-item-skype">
                                                    <?php if (!empty($sSkype)) { ?>
                                                        <?= GetMessage('N_L_STUFFS_SKYPE').': '.$sSkype ?>
                                                    <?php } ?>
                                                </div>
                                                <div class="stuffs-item-email">
                                                    <?php if (!empty($sEmail)) { ?>
                                                        <?= GetMessage('N_L_STUFFS_EMAIL').': '.$sEmail ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
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
</div>
