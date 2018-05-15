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
<div class="shares-blocks clearfix">
    <?php foreach ($arResult['ITEMS'] as $arItem) {
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
        <div class="block-element">
            <div class="block-element-wrapper" id="<?= $this->GetEditAreaId($arItem['ID']) ?>">
                <div class="block-element-link intec-cl-text-hover">
                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"
                       class="block-element-img"
                       style="background-image: url('<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>')">
                        <?php if ($sale) { ?>
                            <div class="element-discount intec-cl-background">
                                <?= GetMessage('CT_BNL_SALE') . $sale ?>
                            </div>
                        <?php } ?>
                    </a>
                    <a class="element-text-name" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['NAME'] ?></a>
                </div>
                <?php if ($period) { ?>
                    <div class="block-element-text">
                        <div class="element-text-period">
                            <span class="period-icon glyph-icon-clock"></span>
                            <span class="period-text"><?= $period ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
<?= $arParams['DISPLAY_BOTTOM_PAGER'] ? $arResult['NAV_STRING'] : '' ?>

