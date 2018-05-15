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
$bDisplayDescription = !empty($arResult['DESCRIPTION']);
$bDisplayItems = !empty($arResult['ITEMS']);
$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);
?>

<div class="services-section services-section-extend">
    <?php if ($bDisplayDescription) { ?>
        <div class="services-section-description<?= $bDisplayItems ? ' services-section-description-only' : null ?>">
            <?=$arResult['DESCRIPTION']?>
        </div>
    <?php } ?>
    <?php if ($bDisplaySections) { ?>
        <div class="services-section-items">
            <div class="services-section-items-wrapper">
                <?php $bFiresItem = true ?>
                <?php foreach ($arResult['SECTIONS'] as $arSection) { ?>
                <?php
                    $sId = $sTemplateId.'_'.$arSection['ID'];
                    $sAreaId = $this->GetEditAreaId($sId);
                    $this->AddEditAction($sId, $arSection['EDIT_LINK']);
                    $this->AddDeleteAction($sId, $arSection['DELETE_LINK']);
                    $sImage = $arSection['PICTURE'];

                    if ($arParams['IMAGES'] == 'CIRCLE')
                        $sImageClass = 'services-section-item-image-circle';

                    $sImage = CFile::ResizeImageGet($sImage, array(
                        'width' => 480,
                        'height' => 195
                    ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

                    if (!empty($sImage)) {
                        $sImage = $sImage['src'];
                    } else {
                        $sImage = null;
                    }
                ?>
                    <div class="services-section-item " style="<?if(!empty($sImageClass)) echo 'border: none; margin-bottom: 40px;';?>">
                        <div class="services-section-item-wrapper" id="<?= $sAreaId ?>">
                            <a href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="<?= (!empty($sImageClass)) ? $sImageClass : 'services-section-item-image';?>" style="background-image: url('<?= $sImage ?>')"></a>
                            <div class="services-section-item-information">
                                <div class="services-section-item-name">
                                    <a href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="intec-cl-text services-section-item-name-wrapper">
                                        <?= $arSection['NAME'] ?>
                                    </a>
                                </div>
                                <div class="services-section-item-description">
                                    <?= $arSection['DESCRIPTION'] ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <?php if ($bFiresItem) $bFiresItem = false ?>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>