<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var array $property
 * @var string $propertyCode
 * @var string $wrapperClass
 */
?>
<div class="universe-settings-item <?= $wrapperClass ?>">
    <div class="universe-settings-item-title"><?= $property['name'] ?></div>
    <div class="universe-settings-item-wrapper intec-no-select">
        <?php foreach ($property['values'] as $key => $name) {
            $checked = ArrayHelper::getValue($property['value'], $key) == 1;
            ?>
            <label class="settings-checkbox-label intec-button intec-button-md <?= $checked ? 'checked' : '' ?>">
                <span class="settings-checkbox-title"><?= $name ?></span>
                <input type="hidden" name="<?= $propertyCode ?>[<?= $key ?>]" value="0" />
                <input type="checkbox"
                       name="<?= $propertyCode ?>[<?= $key ?>]"
                       value="1"
                       class="settings-checkbox-input jsCheckboxInput"
                       <?= $checked ? 'checked' : '' ?> />
            </label>
        <?php } ?>
    </div>
</div>