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
<div class="services-sections services-sections-blocks">
    <?php if ($bDisplaySections) { ?>
        <div class="services-sections-items">
            <div class="services-sections-items-wrapper">
                <?php foreach ($arResult['SECTIONS'] as $arSection) { ?>
                <?php
                    $sId = $sTemplateId.'_'.$arSection['ID'];
                    $sAreaId = $this->GetEditAreaId($sId);
                    $this->AddEditAction($sId, $arSection['EDIT_LINK']);
                    $this->AddDeleteAction($sId, $arSection['DELETE_LINK']);

                    $sImage = $arSection['PICTURE'];
                    $sImageClass = 'services-sections-item-image-circle';
                    $arImageSizes = array(
                        'width' => 680,
                        'height' => 680
                    );

                    if ($arParams['IMAGES'] == 'SQUARE_SMALL')
                        $sImageClass = 'services-sections-item-image-square-small';

                    if ($arParams['IMAGES'] == 'SQUARE_BIG') {
                        $sImageClass = 'services-sections-item-image-square-big';
                        $arImageSizes = array(
                            'width' => 680,
                            'height' => 578
                        );
                    }

                    $sImage = CFile::ResizeImageGet($sImage, $arImageSizes, BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

                    if (!empty($sImage)) {
                        $sImage = $sImage['src'];
                    } else {
                        $sImage = null;
                    }
                ?>
                    <div class="services-sections-item <?= $sImageClass ?>">
                        <div class="services-sections-item-wrapper" id="<?= $sAreaId ?>">
                            <div class="services-sections-item-image">
                                <a href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="services-sections-item-image-wrapper" style="background-image: url('<?= $sImage ?>')"></a>
                            </div>
                            <div class="services-sections-item-information">
                                <div class="services-sections-item-information-name">
                                    <a href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="intec-cl-text-light-hover services-sections-item-information-name-wrapper">
                                        <?= $arSection['NAME'] ?>
                                    </a>
                                </div>
                                <?php if ($arParams['DISPLAY_DESCRIPTION'] == 'Y') { ?>
                                    <div class="services-sections-item-information-description">
                                        <?= $arSection['DESCRIPTION'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>