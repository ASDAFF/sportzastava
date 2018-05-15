<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\constructor\models\build\Property;
use intec\constructor\models\build\Template;

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var Property $property
 * @var array $group
 * @var string $propertyCode
 * @var string $templateFolder
 */

/** @var Template[] $templates */
$templates = $arResult['TEMPLATES'];
$currentTemplate = $arResult['TEMPLATE'];

$templateUrlPattern = '/bitrix/admin/constructor_builds_templates_editor.php?build=%d&template=%d&lang=ru';
$editorLink = sprintf($templateUrlPattern, $arResult['TEMPLATE']->buildId, $arResult['TEMPLATE']->id);
?>
<div class="col-xs-12 universe-description-wrapper">
    <div class="universe-settings-item-title"><?= $group['name'] ?></div>
    <div class="universe-templates-list">
        <?php foreach ($templates as $template) { ?>
            <div class="row">
                <div class="col-xs-6 column-name">
                    <span class="icon-wrapper">
                        <?php if ($currentTemplate && $currentTemplate->id == $template->id) { ?>
                            <i class="glyph-icon-check"></i>
                        <?php } ?>
                    </span>
                    <span class=""><?= $template->name ?></span>
                </div>
                <div class="col-xs-6 column-link">
                    <a class="intec-button intec-button-link"
                       href="<?= sprintf($templateUrlPattern, $template->buildId, $template->id) ?>">
                        <?= GetMessage('UNIVERSE_SETTINGS_GO_TO_SETTINGS') ?>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="description-image-wrapper">
        <img src="<?= $templateFolder .'/images/book.png' ?>" alt="" class="description-image" />
    </div>
    <div class="description-button-center">
        <a href="<?= $editorLink ?>"
           target="_blank"
           class="intec-button intec-button-cl-common intec-button-lg intec-button-w-icon">
            <i class="intec-button-icon glyph-icon-settings_2"></i>
            <span class="intec-button-text"><?= GetMessage('UNIVERSE_SETTINGS_GO_TO_EDITOR') ?></span>
        </a>
    </div>
    <div class="description-wrapper">
        <?= GetMessage('UNIVERSE_SETTINGS_DESCRIPTION') ?>
    </div>
    <div class="description-bottom-buttons">
        <button name="clear_settings"
                class="intec-button intec-button-cl-default intec-button-lg intec-button-transparent intec-button-w-icon">
            <i class="intec-button-icon glyph-icon-cancel"></i>
            <span class="intec-button-text"><?= GetMessage('UNIVERSE_SETTINGS_CLEAR_SETTINGS') ?></span>
        </button>
        <a href="<?= $editorLink ?>"
           target="_blank"
           class="intec-button intec-button-cl-common intec-button-lg intec-button-w-icon">
            <i class="intec-button-icon glyph-icon-settings_2"></i>
            <span class="intec-button-text"><?= GetMessage('UNIVERSE_SETTINGS_GO_TO_EDITOR') ?></span>
        </a>
    </div>
</div>
<?php
unset($editorLink, $templates, $templateUrlPattern);