<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;
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

if (!Loader::includeModule('intec.core'))
    return;

$this->setFrameMode(true);
?>
<div class="share-list-header">
    <h2><?= GetMessage('CT_BNL_HEADER_NAME') ?></h2>
</div>
<div class="share-list">
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

        $sale = ArrayHelper::getValue($arItem, ['PROPERTIES', 'SALE', 'VALUE']);
        $period = ArrayHelper::getValue($arItem, ['PROPERTIES', 'PERIOD', 'VALUE']);
        ?>
        <div class="share-list-item">
            <div class="share-list-item-wrapper" id="<?= $this->GetEditAreaId($arItem['ID']) ?>">
                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                    <div class="share-list-item-wrapper-img"
                         style="background-image: url('<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>');">

                    </div>
                    <div class="share-list-item-wrapper-gradient"></div>
                    <div class="share-list-item-wrapper-gradient-name"></div>
                    <p class="share-list-item-wrapper-name"><?= $arItem['NAME'];?></p>
                    <p class="share-list-item-wrapper-period"><?= $period ?></p>
                    <?php if (!empty($sale)) { ?>
                        <span class="share-list-item-wrapper-sale"><?= GetMessage('CT_BNL_SALE') . $sale ?></span>
                    <?php } ?>
                </a>
            </div>
        </div>
    <?php } ?>
    <div class="clear"></div>
</div>