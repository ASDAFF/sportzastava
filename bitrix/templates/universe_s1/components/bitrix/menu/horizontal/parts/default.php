<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\Type;

/**
 * @var array $arParams
 * @var array $arResult
 * @var string $sImage
 * @var int $iLevel
 * @var array $arItem
 * @var array $arItems
 */

$bFirstItem = true;
?>
<div class="menu-submenu menu-submenu-catalog menu-submenu-<?= $iLevel ?>" data-role="menu">
    <div class="menu-submenu-wrapper" data-role="items">
        <?php foreach ($arItems as $arItem) { ?>
        <?php
            $bSelected = ArrayHelper::getValue($arItem, 'SELECTED');
            $bSelected = Type::toBoolean($bSelected);
        ?>
            <div class="menu-submenu-item<?= $bSelected ? ' menu-submenu-item-active' : null ?>" data-role="item">
                <?= Html::beginTag('a', array(
                    'class' => 'menu-submenu-item-text intec-cl-text-hover'.($bSelected ? ' intec-cl-text' : null),
                    'href' => $arItem['LINK']
                )); ?>
                    <?= Html::encode($arItem['TEXT']) ?>
                <?= Html::endTag('a') ?>
                <?php if (!empty($arItem['ITEMS'])) { ?>
                    <div class="menu-submenu-item-arrow fa fa-angle-right"></div>
                <?php } ?>
                <?php if (!empty($arItem['ITEMS'])) $fDraw($arItem, $iLevel + 1) ?>
            </div>
            <?php $bFirstItem = false ?>
        <?php } ?>
    </div>
</div>