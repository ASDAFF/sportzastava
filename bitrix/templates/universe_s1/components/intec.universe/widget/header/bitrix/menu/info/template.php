<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\JavaScript;
use intec\core\helpers\Type;

/** @var array $arParams
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
$sTemplateId = spl_object_hash($this);
?>
<?php if (!empty($arResult)) { ?>
    <div id="<?= $sTemplateId ?>" class="menu menu-header-info header-info-item">
        <div class="menu-wrapper">
            <?php foreach ($arResult as $arItem) { ?>
            <?php
                $bSelected = ArrayHelper::getValue($arItem, 'SELECTED');
                $bSelected = Type::toBoolean($bSelected);
            ?>
                <div class="menu-item<?= $bSelected ? ' menu-item-active' : null ?>">
                    <a href="<?= $arItem['LINK'] ?>" class="menu-item-text">
                        <div class="intec-aligner"></div>
                        <div class="menu-item-text-wrapper">
                            <?= $arItem['TEXT'] ?>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
    </div>
<?php } ?>