<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var array $property
 * @var string $propertyCode
 * @var string $wrapperClass
 * @var string $templateFolder
 * @var string $inputName
 */

$previewsPath = $templateFolder .'/images/preview/';
?>
<div class="universe-settings-item <?= $wrapperClass ?>">
    <div class="universe-settings-item-title"><?= $property['name'] ?></div>
    <div class="universe-settings-item-wrapper row intec-no-select">
        <?php foreach ($property['values'] as $key => $name) {
            $checked = $key == $property['value'];
            if (empty($inputName)) {
                $inputName = $propertyCode;
            }
            ?>
            <div class="jsRadioItem <?= $itemClass ?>">
                <label class="settings-template-label <?= $checked ? 'checked' : '' ?>">
                    <img src="<?= $previewsPath . str_replace('template_', '', $propertyCode) .'_'. $key ?>.png"
                         alt="<?= $name ?>"
                         class="settings-template-image" />
                    <span class="settings-template-title"><?= $name ?></span>
                    <input type="radio"
                           name="<?= $inputName ?>"
                           value="<?= $key ?>"
                           class="settings-template-input jsRadioInput"
                           <?= $checked ? 'checked' : '' ?> />
                </label>
            </div>
        <?php } ?>
    </div>
</div>
