<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

use intec\core\helpers\ArrayHelper;

/**
 * @var $APPLICATION
 * @var array $arResult
 * @var array $arParams
 * @var array $component
 * @var array $currentOffer
 */

$listSKU = ArrayHelper::getValue($arResult, 'SKU_PROPS');
?>

<?php if (!empty($listSKU)) { ?>
    <div class="sku-container">
        <?php foreach ($listSKU as $key => $property) {
            if ($property['VALUES_COUNT'] <= 0)
                continue;

            if (!in_array($property['SHOW_MODE'], ['PICT', 'PICTURE'])) {
                $propertyStyle = 'text';
            } else {
                $propertyStyle = strtolower($arParams['OFFERS_PROPERTIES_MODE']);
            }
            ?>
            <div class="sku-property sku-type-<?= $propertyStyle ?>"
                 data-property-code="<?= $key ?>">
                <div class="sku-property-name"><?= $property['NAME'] ?></div>
                <ul class="sku-property-values">
                    <?php foreach ($property['VALUES'] as $value) {
                        if ($value['NAME'] == '-') // TODO fix this shit
                            continue;

                        $propertyValue = ArrayHelper::getValue($value, 'XML_ID', $value['ID']);
                        ?>
                        <li class="sku-property-value intec-no-select"
                            <?= $propertyStyle == 'color' ? 'title="'. $value['NAME'] .'"' : '' ?>
                            data-property-value="<?= $propertyValue ?>">
                            <span class="sku-property-value-name"><?= $value['NAME'] ?></span>
                            <span class="sku-property-value-image"
                                  style="<? if (!empty($value['PICT']['SRC'])) { ?>
                                      background-image: url('<?= $value['PICT']['SRC'] ?>');
                                  <? } ?>"></span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
<?php } ?>