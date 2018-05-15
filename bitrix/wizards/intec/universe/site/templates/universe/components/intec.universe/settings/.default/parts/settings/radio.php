<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var array $property
 * @var string $propertyCode
 * @var string $wrapperClass
 * @var string $inputName
 */
?>
<div class="universe-settings-item <?= $wrapperClass ?>">
    <div class="universe-settings-item-title"><?= $property['name'] ?></div>
    <div class="universe-settings-item-wrapper intec-no-select">
        <?php foreach ($property['values'] as $key => $name) {
            $checked = $key == $property['value'];
            if (empty($inputName)) {
                $inputName = $propertyCode;
            }
            ?>
            <label class="settings-radio-label intec-button intec-button-md jsRadioItem <?= $checked ? 'checked' : '' ?>">
                <span class="settings-radio-title"><?= $name ?></span>
                <input type="radio"
                       name="<?= $inputName ?>"
                       value="<?= $key ?>"
                       class="settings-radio-input jsRadioInput"
                       <?= $checked ? 'checked' : '' ?> />
            </label>
        <?php } ?>
    </div>
</div>
