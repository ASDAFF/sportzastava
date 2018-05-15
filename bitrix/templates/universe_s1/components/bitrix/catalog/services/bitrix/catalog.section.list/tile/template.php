<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
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

$bDisplaySections = !empty($arResult['SECTIONS']);
$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);
?>

<div class="services-sections services-sections-tile">
    <?php if ($bDisplaySections) { ?>
        <div class="services-sections-items services-sections-items-<?= $arParams['LINE_COUNT'] ?>">
            <div class="services-sections-items-wrapper">
                <?php foreach ($arResult['SECTIONS'] as $arSection) { ?>
                <?php
                    $sId = $sTemplateId.'_'.$arSection['ID'];
                    $sAreaId = $this->GetEditAreaId($sId);
                    $this->AddEditAction($sId, $arSection['EDIT_LINK']);
                    $this->AddDeleteAction($sId, $arSection['DELETE_LINK']);
                    $sImage = $arSection['PICTURE'];

                    $sImage = CFile::ResizeImageGet($sImage, array(
                        'width' => 680,
                        'height' => 540
                    ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

                    if (!empty($sImage)) {
                        $sImage = $sImage['src'];
                    } else {
                        $sImage = null;
                    }
                ?>
                    <div class="services-sections-item">
                        <div class="services-sections-item-wrapper" id="<?= $sAreaId ?>">
                            <a href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="services-sections-item-wrapper-2" style="background-image: url('<?= $sImage ?>')">
                                <div class="services-sections-item-background"></div>
                                <div class="services-sections-item-information">
                                    <div class="services-sections-item-name">
                                        <div class="services-sections-item-name-wrapper intec-cl-background ">
                                            <div class="services-sections-item-name-wrapper-2 ">
                                                <?= $arSection['NAME'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="services-sections-item-description">
                                        <?= $arSection['DESCRIPTION'] ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>