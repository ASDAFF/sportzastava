<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\constructor\Module as Constructor;

/**
 * @global $APPLICATION
 * @global CUser $USER
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);

if ($arResult['HANDLE'])
    return;

$templateFolder = $this->GetFolder();
$sTemplateId = spl_object_hash($this);

$oFrame = $this->createFrame();
$oFrame->begin();
?>
<div id="<?= $sTemplateId ?>" class="universe-settings <?= $arResult['SAVED'] ? 'open' : '' ?>">
    <div class="universe-settings-button-open-wrapper">
        <div class="universe-settings-button-open intec-no-select">
            <i class="universe-settings-button-open-icon glyph-icon-settings"></i>
        </div>
    </div>
    <div class="universe-settings-bg" style="<?= $arResult['SAVED'] ? 'display: block;' : '' ?>"></div>
    <div class="universe-settings-modal">
        <form method="post">
            <?php if ($USER->IsAdmin()) {
                $useGlobalSettings = $arResult['PROPERTIES']['use_global_settings'];
                ?>
                <div class="bottom-panel clearfix">
                    <div class="col-xs-4">
                        <button class="intec-button intec-button-lg intec-button-cl-default intec-button-transparent intec-button-w-icon"
                                name="default_settings"
                                type="submit"
                                value="Y">
                            <i class="intec-button-icon fa fa-refresh"></i>
                            <span class="intec-button-text"><?= GetMessage('UNIVERSE_SETTINGS_DEFAULT') ?></span>
                        </button>
                    </div>
                    <div class="col-xs-8">
                        <div class="universe-settings-item universe-settings-type-checkbox-inline col-xs-12">
                            <div class="universe-settings-item-wrapper intec-no-select">
                                <input type="hidden" name="use_global_settings" value="0">
                                <input type="checkbox"
                                       id="<?= $sTemplateId ?>_use_global_settings"
                                       name="use_global_settings"
                                       value="1"
                                       data-ui-switch="{classes: {control: 'api-ui-switch-control api-ui-lg'}}"
                                       <?= $useGlobalSettings['value'] ? 'checked' : '' ?>>
                            </div>
                            <div class="universe-settings-item-title">
                                <label for="<?= $sTemplateId ?>_use_global_settings"><?= $useGlobalSettings['name'] ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="nano">
                <div class="nano-content">
                    <div class="universe-settings-modal-wrapper">
                        <div class="universe-settings-groups">
                            <ul class="universe-settings-groups-list" role="tablist">
                                <?php foreach ($arResult['GROUPS'] as $key => $group) { ?>
                                    <?php
                                    if ($key == 'templates')
                                        if (Constructor::isLite())
                                            continue;
                                    ?>
                                    <li class="universe-settings-group group-<?= $key ?> <?= $key == $arResult['ACTIVE_TAB'] ? 'active' : '' ?>"
                                        role="presentation">
                                        <a href="#<?= $key ?>"
                                           aria-controls="<?= $key ?>"
                                           role="tab"
                                           data-toggle="tab">
                                            <i class="universe-settings-group-icon"></i>
                                            <span class="universe-settings-group-name"><?= $group['name'] ?></span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="universe-settings-list">
                            <input type="hidden" name="universeSettingsAjax" value="Y" />
                            <input type="hidden" name="active_tab" value="<?= $arResult['ACTIVE_TAB'] ?>" />
                            <div class="tab-content">
                                <?php foreach ($arResult['GROUPS'] as $groupKey => $group) { ?>
                                    <?php
                                    if ($groupKey == 'templates')
                                        if (Constructor::isLite())
                                            continue;
                                    ?>
                                    <div id="<?= $groupKey ?>"
                                         class="universe-settings-wrapper row tab-pane <?= $groupKey == $arResult['ACTIVE_TAB'] ? 'active' : '' ?>"
                                         role="tabpanel">
                                        <?php

                                        if ($groupKey == 'templates') {
                                            include('parts/templates.php');
                                        } else if (empty($group['properties'])) {
                                            ?>
                                            <div class="no-settings col-xs-12">
                                                <?= GetMessage('UNIVERSE_SETTINGS_EMPTY_GROUP') ?>
                                            </div>
                                            <?php
                                        } else {
                                            foreach ($group['properties'] as $propertyCode) {
                                                if (empty($arResult['PROPERTIES'][$propertyCode])) {
                                                    continue;
                                                }

                                                $property = $arResult['PROPERTIES'][$propertyCode];
                                                $inputName = null;
                                                include('parts/settings_item.php');
                                            }
                                        }

                                        if ($groupKey == 'global') {
                                            $propertyCode = 'menu_display_in';
                                            $property = $arResult['PROPERTIES'][$propertyCode];
                                            include('parts/side_menu.php');
                                        } else if ($groupKey == 'main') {
                                            $groups = $arResult['MAIN_BLOCKS'];
                                            include('parts/blocks.php');
                                        }
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php include('parts/script.php'); ?>
</div>
<? $oFrame->end(); ?>