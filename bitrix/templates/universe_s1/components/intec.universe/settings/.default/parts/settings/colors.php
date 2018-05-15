<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var array $property
 * @var string $propertyCode
 * @var array $colors
 * @var string $wrapperClass
 */
?>
<div class="universe-settings-item <?= $wrapperClass ?>">
    <div class="universe-settings-item-title"><?= $property['name'] ?></div>
    <div class="universe-settings-item-wrapper intec-no-select">
        <ul class="settings-color-list">
            <?php foreach ($colors as $color) { ?>
                <?php $selected = $color == $property['value'] ?>
                <li class="settings-color-wrapper<?= $selected ? ' active' : null ?>">
                    <span class="settings-color jsSelectColor" style="background-color: <?= $color ?>;" data-value="<?= $color ?>">
                        <i class="icon-check glyph-icon-check"></i>
                    </span>
                </li>
            <?php } ?>
            <li class="settings-color-wrapper">
                <span class="settings-color settings-color-custom"
                      style="background-color: <?= $property['value'] ?>;">
                    <i class="color-picker-icon fa fa-eyedropper"></i>
                </span>
            </li>
        </ul>
        <input type="hidden" name="<?= $propertyCode ?>" value="<?= $property['value'] ?>" />
    </div>
</div>
