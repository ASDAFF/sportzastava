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
 * @var string $sTemplateId
 */

$arServices = $arResult['SERVICES'];

if (empty($arServices))
    return;
?>
<div class="project-section project-section-services">
    <div class="intec-content">
        <div class="intec-content-wrapper">
            <div class="project-section-title">
                <?= GetMessage('N_PROJECTS_N_D_DEFAULT_SECTION_SERVICES') ?>
            </div>
            <div class="project-services">
                <div class="project-services-wrapper">
                    <?php foreach ($arServices as $arItem) { ?>
                    <?php
                        $sImage = null;

                        if (!empty($arItem['PREVIEW_PICTURE'])) {
                            $sImage = $arItem['PREVIEW_PICTURE'];
                        } else if (!empty($arItem['DETAIL_PICTURE'])) {
                            $sImage = $arItem['DETAIL_PICTURE'];
                        }

                        $sImage = CFile::ResizeImageGet($sImage, array(
                            'width' => 220,
                            'height' => 220
                        ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

                        if (!empty($sImage)) {
                            $sImage = $sImage['src'];
                        } else {
                            $sImage = null;
                        }
                    ?>
                        <div class="project-service">
                            <div class="project-service-wrapper">
                                <div class="project-service-wrapper-2">
                                    <div class="project-service-wrapper-3">
                                        <div class="project-service-image">
                                            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="project-service-image-wrapper" style="background-image: url('<?= $sImage ?>')"></a>
                                        </div>
                                        <div class="project-service-information">
                                            <div class="project-service-information-wrapper">
                                                <?php if ($arParams['ALLOW_LINK_SERVICES'] == 'Y') { ?>
                                                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="project-service-name">
                                                        <?= $arItem['NAME'] ?>
                                                    </a>
                                                <?php } else { ?>
                                                    <div class="project-service-name">
                                                        <?= $arItem['NAME'] ?>
                                                    </div>
                                                <?php } ?>
                                                <?php if (!empty($arItem['PREVIEW_TEXT'])) { ?>
                                                    <div class="project-service-description">
                                                        <?= $arItem['PREVIEW_TEXT'] ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>