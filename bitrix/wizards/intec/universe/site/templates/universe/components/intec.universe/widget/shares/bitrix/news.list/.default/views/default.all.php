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
<div class="widget-shares-view widget-shares-view-default">
    <div class="widget-shares-view-wrapper">
        <?php foreach ($arResult['ITEMS'] as $arItem) { ?>
        <?php
            $sId = $sTemplateId.'_'.$sType.'_extend_'.$arItem['ID'];
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
                'width' => 600,
                'height' => 600
            ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

            if (!empty($sImage)) {
                $sImage = $sImage['src'];
            } else {
                $sImage = null;
            }
        ?>
            <div class="widget-shares-item <?=$arParams["COUNT_IN_ROW"]?>">
                <div class="widget-shares-item-wrapper" id="<?= $sAreaId ?>">
                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="widget-shares-item-image" style="background-image: url('<?= $sImage ?>')"></a>
                    <div class="widget-shares-item-information">
                        <div class="widget-shares-item-date">
                            <?= $sDate ?>
                        </div>
                        <div class="widget-shares-item-name">
                            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="widget-shares-item-name-wrapper">
                                <?= $arItem['NAME'] ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
