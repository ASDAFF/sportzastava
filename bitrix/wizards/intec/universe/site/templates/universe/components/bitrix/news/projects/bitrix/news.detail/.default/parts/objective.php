<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use intec\core\helpers\ArrayHelper;

/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 * @var string $sTemplateId
 */

$arProperty = ArrayHelper::getValue($arResult, ['SYSTEM_PROPERTIES', 'OBJECTIVE']);
$sObjective = null;

if (empty($arProperty))
    return;

if ($arProperty['USER_TYPE'] == 'HTML') {
    $sObjective = ArrayHelper::getValue($arProperty, ['VALUE', 'TEXT']);
} else {
    $sObjective = ArrayHelper::getValue($arProperty, 'VALUE');
}

if (empty($sObjective))
    return;

?>
<div class="project-section project-section-objective">
    <div class="intec-content">
        <div class="intec-content-wrapper">
            <div class="project-section-title">
                <?= GetMessage('N_PROJECTS_N_D_DEFAULT_SECTION_OBJECTIVE') ?>
            </div>
            <div class="project-objective">
                <?= $sObjective ?>
            </div>
        </div>
    </div>
</div>