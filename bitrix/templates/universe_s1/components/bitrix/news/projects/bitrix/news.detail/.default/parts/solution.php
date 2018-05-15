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

$sSolutionBegin = ArrayHelper::getValue($arResult, ['SOLUTION', 'BEGIN']);
$arSolutionImage = ArrayHelper::getValue($arResult, ['SOLUTION', 'IMAGE']);
$sSolutionEnd = ArrayHelper::getValue($arResult, ['SOLUTION', 'END']);

if (empty($sSolutionBegin) && empty($arSolutionImage) && empty($sSolutionEnd))
    return;

?>
<div class="project-section project-section-solution">
    <?php if (!empty($sSolutionBegin)) { ?>
        <div class="project-solution project-solution-begin">
            <div class="intec-content">
                <div class="intec-content-wrapper">
                    <div class="project-section-title" style="text-align: left;">
                        <?= GetMessage('N_PROJECTS_N_D_DEFAULT_SECTION_SOLUTION') ?>
                    </div>
                    <div class="project-solution-text">
                        <?= $sSolutionBegin ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if (!empty($arSolutionImage)) { ?>
        <div class="project-solution project-solution-image">
            <div class="intec-content">
                <div class="intec-content-wrapper">
                    <img src="<?= $arSolutionImage['SRC'] ?>" class="project-solution-image-wrapper" />
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if (!empty($sSolutionEnd)) { ?>
        <div class="project-solution project-solution-end">
            <div class="intec-content">
                <div class="intec-content-wrapper">
                    <div class="project-solution-text">
                        <?= $sSolutionBegin ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>