<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use intec\core\helpers\Html;
use intec\core\helpers\JavaScript;

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
 * @var string $sType
 */
?>
<div class="intec-content">
    <div class="intec-content-wrapper">
        <div class="widget-services-view widget-services-view-default">
            <div class="widget-services-view-wrapper">
                <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
                <?php
                    $sId = $sTemplateId.'_'.$sType.'_default_'.$arItem['ID'];
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
                        'width' => 300,
                        'height' => 300
                    ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

                    if (!empty($sImage)) {
                        $sImage = $sImage['src'];
                    } else {
                        $sImage = null;
                    }
                ?>
                    <div class="widget-services-element">
                        <div class="widget-services-element-wrapper" id="<?= $sAreaId ?>">
                            <div class="widget-services-element-image">
                                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="widget-services-element-image-wrapper" style="background-image: url('<?= $sImage ?>')"></a>
                            </div>
                            <a class="widget-services-element-name" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                <?= $arItem['NAME'] ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>