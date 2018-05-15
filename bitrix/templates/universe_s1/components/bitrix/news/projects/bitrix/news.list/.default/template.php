<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

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
<div class="projects">
    <ul class="nav nav-tabs intec-tabs projects-tabs">
        <?php $bSectionFirst = true ?>
        <?php foreach ($arResult['SECTIONS'] as $arSection) { ?>
            <?php if (count($arSection['ITEMS']) <= 0) continue; ?>
            <li role="presentation"<?= $bSectionFirst ? ' class="active"' : null ?>">
                <a href="#projects-<?= $sTemplateId ?>-section-<?= $arSection['ID'] ?>"
                   aria-controls="projects-<?= $sTemplateId ?>-section-<?= $arSection['ID'] ?>"
                   role="tab"
                   data-toggle="tab"
                ><?= $arSection['NAME'] ?></a>
            </li>
            <?php $bSectionFirst = false ?>
        <?php } ?>
    </ul>
    <div class="tab-content clearfix projects-tab-container">
        <?php $bSectionFirst = true ?>
        <?php foreach ($arResult['SECTIONS'] as $arSection) { ?>
            <?php if (count($arSection['ITEMS']) <= 0) continue; ?>
            <div role="tabpanel"
                 id="projects-<?= $sTemplateId ?>-section-<?= $arSection['ID'] ?>"
                 class="tab-pane<?= $bSectionFirst ? ' active' : null ?> project-tab"
            >
                <div class="projects-items">
                    <div class="projects-items-wrapper">
                        <?php foreach($arSection['ITEMS'] as $arItem) { ?>
                        <?php
                            $sId = $sTemplateId.'_desktop_default_'.$arItem['ID'];
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
                                'width' => 380,
                                'height' => 248
                            ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

                            if (!empty($sImage)) {
                                $sImage = $sImage['src'];
                            } else {
                                $sImage = null;
                            }
                        ?>
                            <div class="projects-item">
                                <div class="projects-item-wrapper" id="<?= $sAreaId ?>">
                                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="projects-item-wrapper-2" style="background-image: url('<?= $sImage ?>')">
                                        <div class="projects-item-name">
                                            <div class="projects-item-name-wrapper">
                                                <?= $arItem['NAME'] ?>
                                            </div>
                                        </div>
                                    </a>
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
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
