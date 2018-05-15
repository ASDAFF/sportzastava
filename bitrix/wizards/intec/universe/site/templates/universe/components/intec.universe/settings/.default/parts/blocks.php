<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var array $groups
 * @var string $templateFolder
 */

$blocksI = 0;
?>
<div class="universe-settings-item col-xs-12">
    <div class="universe-settings-item-title"><?= GetMessage('UNIVERSE_SETTINGS_BLOCKS') ?></div>
    <div class="col-xs-12 universe-settings-blocks-wrapper">
        <?php foreach ($groups as $blockKey => $block) {
            $isActive = ArrayHelper::getValue($arResult, ['PROPERTIES', 'main_blocks', 'value', 'active', $blockKey]) == 'Y';
            ?>
            <div class="row blocks-row">
                <div class="col-xs-8 blocks-column column-name"><?= ++$blocksI ?>. <?= $block['name'] ?></div>
                <div class="col-xs-4 blocks-column column-checkbox">
                    <input type="hidden" name="main_blocks[active][<?= $blockKey ?>]" value="N" />
                    <input type="checkbox"
                           name="main_blocks[active][<?= $blockKey ?>]"
                           value="Y"
                           data-ui-switch="{}"
                           <?= $isActive ? 'checked' : '' ?> />
                </div>
                <?php if ($isActive) { ?>
                    <div class="col-xs-12 blocks-templates-wrapper">
                        <?php if (!empty($arResult['PROPERTIES'][$block['template']])) {
                            $inputName = 'main_blocks[templates]['. $blockKey .']';
                            $propertyCode = $block['template'];
                            $property = $arResult['PROPERTIES'][$block['template']];
                            $property['value'] = ArrayHelper::getValue($arResult, ['PROPERTIES', 'main_blocks', 'value', 'templates', $blockKey]);
                            ?>
                            <div class="universe-settings-sub-title"><?= GetMessage('UNIVERSE_SETTINGS_VIEW_TYPE_DESKTOP') ?></div>
                            <div class="row">
                                <?php include('settings_item.php'); ?>
                            </div>
                        <?php } ?>
                        <?php if (!empty($arResult['PROPERTIES'][$block['mobile_template']])) {
                            $inputName = 'main_blocks[mobile_templates]['. $blockKey .']';
                            $propertyCode = $block['mobile_template'];
                            $property = $arResult['PROPERTIES'][$block['mobile_template']];
                            $property['value'] = ArrayHelper::getValue($arResult, ['PROPERTIES', 'main_blocks', 'value', 'mobile_templates', $blockKey]);
                            ?>
                            <div class="universe-settings-sub-title"><?= GetMessage('UNIVERSE_SETTINGS_VIEW_TYPE_MOBILE') ?></div>
                            <div class="row">
                                <?php include('settings_item.php'); ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>
