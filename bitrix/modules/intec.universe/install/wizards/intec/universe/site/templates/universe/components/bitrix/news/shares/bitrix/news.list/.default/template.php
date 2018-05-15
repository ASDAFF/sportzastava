<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use intec\core\helpers\ArrayHelper;

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
?>
<div class="share-list">
    <?php foreach($arResult['ITEMS'] as $arItem) {
        $this->AddEditAction(
            $arItem['ID'],
            $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT')
        );
        $this->AddDeleteAction(
            $arItem['ID'],
            $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'),
            array('CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))
        );

        $period = ArrayHelper::getValue($arItem, array('PROPERTIES', $arParams['PROPERTY_FOR_PERIOD'], 'VALUE'));
        $sale = ArrayHelper::getValue($arItem, array('PROPERTIES', $arParams['PROPERTY_FOR_SALE_PERCENT'], 'VALUE'));
        ?>
        <div class="share-list-item">
            <div class="share-list-item-wrapper" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                    <div class="share-list-item-wrapper-img"
                         style="background-image: url('<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>');">
                    </div>
                    <div class="share-list-item-wrapper-gradient"></div>
                    <div class="share-list-item-wrapper-gradient-name"></div>
                    <p class="share-list-item-wrapper-name"><?= $arItem['NAME'] ?></p>
                    <?php if ($period) {?>
                        <p class="share-list-item-wrapper-period"><?= $period ?></p>
                    <?php } ?>

                    <?php if ($sale) {?>
                        <span class="share-list-item-wrapper-sale intec-cl-background">
                            <?= GetMessage('CT_BNL_SALE') . $sale ?>
                        </span>
                    <? } ?>
                </a>
            </div>
        </div>
    <?php } ?>
    <div style="clear:both"></div>
</div>

<?= $arParams['DISPLAY_BOTTOM_PAGER'] ? $arResult['NAV_STRING'] : '' ?>