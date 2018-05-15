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

$displayProp = false;
foreach ($characteristics as $property) {
    if (!empty($property['VALUE']))
        $displayProp = true;
}

if ($hasTab['characteristics'] && $displayProp) {
    $tempCharacteristics = $characteristics;
    $firstCharacteristics = array_splice($tempCharacteristics, 0, 6);
    ?>
    <div class="properties-list-wrapper">
        <ul class="properties-list clearfix">
            <?php foreach ($firstCharacteristics as $key => $property) { ?>
                <li class="col-xs-12 col-md-6">
                    <span><?= $property['NAME'] ?> - <?= $property['DISPLAY_VALUE'] ?>;</span>
                </li>
            <?php } ?>
        </ul>
        <div class="show-all-characteristics"
             onclick="
                 $(document).scrollTo('#anchor-characteristics', 500);
                 $('[href=\'#tab-characteristics\']').tab('show');">
            <?= GetMessage('ALL_CHARACTERISTICS') ?>
        </div>
    </div>
    <?php
    unset($tempCharacteristics, $firstCharacteristics);
}