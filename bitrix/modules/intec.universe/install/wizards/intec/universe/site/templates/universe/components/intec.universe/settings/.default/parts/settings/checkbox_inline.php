<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var array $property
 * @var string $propertyCode
 * @var string $wrapperClass
 * @var string $sTemplateId
 */
?>
<div class="universe-settings-item universe-settings-type-checkbox-inline <?= $wrapperClass ?>">
    <div class="universe-settings-item-wrapper intec-no-select">
        <input type="hidden" name="<?= $propertyCode ?>" value="0" />
        <input type="checkbox"
               id="<?= $sTemplateId .'_'. $propertyCode ?>"
               name="<?= $propertyCode ?>"
               value="1"
               data-ui-switch="{classes: {control: 'api-ui-switch-control api-ui-lg'}}"
            <?= $property['value'] ? 'checked' : '' ?> />
    </div>
    <div class="universe-settings-item-title">
        <label for="<?= $sTemplateId .'_'. $propertyCode ?>"><?= $property['name'] ?></label>
    </div>
</div>