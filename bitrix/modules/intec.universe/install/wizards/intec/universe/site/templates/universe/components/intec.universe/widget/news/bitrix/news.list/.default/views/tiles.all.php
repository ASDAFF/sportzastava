<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

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

$itemWidth = floor((100 / $arParams['LINE_COUNT_DESKTOP']) / 0.5) * 0.5;

?>
<div class="widget-news-view widget-news-view-tiles">
    <div class="widget-news-view-wrapper">
        <?php foreach ($arResult['ITEMS'] as $arItem) {
            $sId = $sTemplateId.'_'.$sType.'_extend_'.$arItem['ID'];
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
                'width' => 150,
                'height' => 150
            ), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

            if (!empty($sImage)) {
                $sImage = $sImage['src'];
            } else {
                $sImage = null;
            }
            ?>
            <div class="widget-news-item" style="width: <?= $itemWidth ?>%;">
                <div class="widget-news-item-wrapper" id="<?= $sAreaId ?>">
                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="widget-news-item-image" style="background-image: url('<?= $sImage ?>')"></a>
                    <div class="widget-news-item-information">
                        <div class="widget-news-item-date">
                            <?= $arItem['DISPLAY_ACTIVE_FROM'] ?>
                        </div>
                        <div class="widget-news-item-name">
                            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="widget-news-item-name-wrapper intec-cl-text-hover">
                                <?= $arItem['NAME'] ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
