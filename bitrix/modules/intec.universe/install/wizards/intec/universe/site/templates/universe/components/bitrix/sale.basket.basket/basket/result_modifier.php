<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

$arResult['COMPONENT_HASH'] = 'sections_'. spl_object_hash($this);


# ---------- sort fields ----------
$fieldsPriorities = array(
    'NAME',
    'PROPS',
    'WEIGHT',
    'DISCOUNT',
    'PRICE',
    'QUANTITY',
    'SUM'
);
$withPriorities = array();
$withoutPriorities = array();
foreach ($arResult['GRID']['HEADERS'] as $k => $val) {
    $search = array_search($val['id'], $fieldsPriorities);
    if ($search !== false) {
        $withPriorities[$search] = $val;
    } else {
        $withoutPriorities[] = $val;
    }
}
ksort($withPriorities);
$arResult['GRID']['HEADERS'] = array_merge($withPriorities, $withoutPriorities);
unset($fieldsPriorities, $withPriorities, $withoutPriorities);