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
        <div class="widget-shares-view widget-shares-view-blocks">
            <div class="widget-shares-view-wrapper">
                <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
                <?php
                    $sId = $sTemplateId.'_'.$sType.'_tile_'.$arItem['ID'];
                    $sAreaId = $this->GetEditAreaId($sId);
                    $this->AddEditAction($sId, $arItem['EDIT_LINK']);
                    $this->AddDeleteAction($sId, $arItem['DELETE_LINK']);
                    $sImage = null;
                    $sDate = null;
                    $sDateFrom = $arItem['DISPLAY_ACTIVE_FROM'];
                    $sDateTo = $arItem["DISPLAY_ACTIVE_TO"];

                    if (!empty($sDateFrom)) {
                        $sDate = GetMessage('W_C_SHARES_N_L_DEFAULT_DATE_FROM').' '.$sDateFrom;

                        if (!empty($sDateTo))
                            $sDate .= ' '.GetMessage('W_C_SHARES_N_L_DEFAULT_DATE_TO_SMALL').' '.$sDateTo;
                    } else if (!empty($sDateTo)) {
                        $sDate = GetMessage('W_C_SHARES_N_L_DEFAULT_DATE_TO').' '.$sDateTo;
                    }

                    if (!empty($arItem['PREVIEW_PICTURE'])) {
                        $sImage = $arItem['PREVIEW_PICTURE'];
                    } else if (!empty($arItem['DETAIL_PICTURE'])) {
                        $sImage = $arItem['DETAIL_PICTURE'];
                    }

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
                    <div class="widget-shares-element <?=$arParams["COUNT_IN_ROW"]?>">
                        <div class="widget-shares-element-wrapper" id="<?= $sAreaId ?>">
                            <a class="widget-shares-element-image" style="background-image: url('<?= $sImage ?>')" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"></a>
                            <div class="widget-shares-element-information">
                                <?php if (!empty($sDate)) { ?>
                                    <div class="widget-shares-element-date">
                                        <?= $sDate ?>
                                    </div>
                                <?php } ?>
                                <a class="widget-shares-element-name" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                    <?= $arItem['NAME'] ?>
                                </a>
                                <div class="widget-shares-element-description">
                                    <?= $arItem['PREVIEW_TEXT'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>