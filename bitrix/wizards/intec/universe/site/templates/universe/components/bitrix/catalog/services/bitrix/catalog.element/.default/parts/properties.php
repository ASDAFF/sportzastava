<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * @var array $arResult
 * @var array $arProperties
 * @var string $sHeaderProperties
 */

?>
<div class="service-properties">
    <div class="service-caption">
        <?= $sHeaderProperties ?>
    </div>
    <div class="service-properties">
        <table>
            <?php foreach ($arProperties as $property) { ?>
                <tr>
                    <td>
                        <?= $property['NAME'] ?>
                    </td>
                    <td>
                        <?php if (!is_array($property['VALUE'])) { ?>
                            <div class="value">
                                <?= $property['DISPLAY_VALUE'] ?>
                            </div>
                        <?php } else { ?>
                            <div class="value">
                                <?= implode(', ', $property['VALUE']) ?>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>