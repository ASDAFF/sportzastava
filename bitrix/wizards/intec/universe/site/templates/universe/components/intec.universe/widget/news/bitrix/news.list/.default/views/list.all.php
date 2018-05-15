<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

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
<div class="widget-news-view widget-news-view-list">
    <div class="widget-news-view-wrapper">
        <?php foreach ($arResult['ITEMS'] as $arItem) {
            $sId = $sTemplateId.'_'.$sType.'_extend_'.$arItem['ID'];
            $sAreaId = $this->GetEditAreaId($sId);
            $this->AddEditAction($sId, $arItem['EDIT_LINK']);
            $this->AddDeleteAction($sId, $arItem['DELETE_LINK']);
            ?>
            <div class="widget-news-item">
                <div class="widget-news-item-wrapper" id="<?= $sAreaId ?>">
                    <div class="widget-news-item-date">
                        <?= $arItem['DISPLAY_ACTIVE_FROM'] ?>
                    </div>
                    <div class="widget-news-item-name ">
                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"
                           class="widget-news-item-name-wrapper intec-cl-text-hover">
                            <?= $arItem['NAME'] ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
