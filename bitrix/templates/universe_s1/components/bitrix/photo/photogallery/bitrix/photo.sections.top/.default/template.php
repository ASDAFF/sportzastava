<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;

/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @var CBitrixComponentTemplate $this
 * @var CBitrixComponent $component
 */

$this->setFrameMode(true);

?>
<div class="photo-sections clearfix">
    <?php foreach($arResult["SECTIONS"] as $arSection) {

        $this->AddEditAction('section_'.$arSection['ID'], $arSection['ADD_ELEMENT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "ELEMENT_ADD"), array('ICON' => 'bx-context-toolbar-create-icon'));
        $this->AddEditAction('section_'.$arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
        $this->AddDeleteAction('section_'.$arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BPS_SECTION_DELETE_CONFIRM')));

        $sSectionUrl = ArrayHelper::getValue($arSection, 'SECTION_PAGE_URL');
        $sName = ArrayHelper::getValue($arSection, 'NAME');
        $sPicture = ArrayHelper::getValue($arSection, 'PICTURE');
        $sItemsCount = ArrayHelper::getValue($arSection, 'ITEMS_COUNT');

        $arStyle = [
            'class' => 'section-element intec-cl-background-hover',
            'style' => [
                'background-image' => 'url('.$sPicture.')'
            ]
        ];

    ?>
        <div class="section-element-wrapper">
            <?= Html::beginTag('div', $arStyle) ?>
                <a href="<?= $sSectionUrl ?>" class="element-fade"></a>
                <div class="element-name">
                    <?= $sName ?>
                </div>
                <?php if (!empty($arSection['ITEMS'])) { ?>
                    <div class="element-count">
                        <i class="glyph-icon-landscape"></i>
                        <?= $sItemsCount ?>
                    </div>
                <?php } ?>
            <?= Html::endTag('div') ?>
        </div>
    <?php } ?>
</div>
