<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $APPLICATION
 * @var array $arResult
 * @var array $arParams
 * @var array $characteristics
 * @var array $hasTab
 * @var array $activeTab
 * @var array $component
 */

if ($hasTab['characteristics']) {
    $tempCharacteristics = $characteristics;
    $firstCharacteristics = array_splice($tempCharacteristics, 0, 6);
    ?>
    <div class="properties-list-wrapper">
        <ul class="properties-list clearfix">
            <?php foreach ($firstCharacteristics as $key => $property) { ?>
                <?php if (!empty($property['VALUE']) || !empty($property['VALUE_WORD'])) { ?>
                    <?php if (!is_array($property['VALUE'])) {?>
                        <li class="col-xs-12 col-md-6">
                            <span><?= $property['NAME'] ?> - <?=$property['DISPLAY_VALUE'].';'?>
                        </li>
                    <?php } else {?>
                        <li class="col-xs-12 col-md-6">
                                    <span><?= $property['NAME'] ?> - <?=implode(', ', $property['VALUE']).';'?>
                        </li>
                    <?php }
                }
            }?>
        </ul>
        <div class="show-all-characteristics"
             onclick="document.location.href='<?=$arParams["DETAIL_PAGE_URL"]?>#anchor-characteristics';return false;">
            <?= GetMessage('ALL_CHARACTERISTICS') ?>
        </div>
    </div>
    <?php
    unset($tempCharacteristics, $firstCharacteristics);
}
?>