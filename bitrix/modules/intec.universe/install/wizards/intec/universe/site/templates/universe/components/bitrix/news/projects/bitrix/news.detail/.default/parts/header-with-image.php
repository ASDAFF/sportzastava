<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\JavaScript;
use intec\core\helpers\RegExp;
use intec\core\helpers\Type;

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
 * @var array $arForms
 */
?>
<div class="project-header">
    <div class="intec-content">
        <div class="intec-content-wrapper clearfix">
            <div class="project-description">
                <?php if (!empty($arResult['PREVIEW_TEXT'])) { ?>
                    <div class="project-description-text">
                        <?= $arResult['PREVIEW_TEXT'] ?>
                    </div>
                <?php } ?>
                <?php if (!empty($sImage)) { ?>
                    <div class="project-image project-image-adaptive">
                        <img src="<?= $sImage ?>" />
                        <div class="intec-aligner"></div>
                    </div>
                <?php } ?>
                <div class="project-description-items">
                    <div class="project-description-items-wrapper">
                        <?php if (Type::isArray($arDescriptionProperties)) { ?>
                            <?php $iCount = 0 ?>
                            <?php foreach ($arDescriptionProperties as $sPropertyCode) { ?>
                                <?php
                                if ($iCount > 4)
                                    break;

                                $arProperty = ArrayHelper::getValue($arResult, ['PROPERTIES', $sPropertyCode]);

                                if (empty($arProperty))
                                    continue;

                                $sName = ArrayHelper::getValue($arProperty, 'NAME');
                                $sValue = ArrayHelper::getValue($arProperty, 'VALUE');

                                if (empty($sValue))
                                    continue;

                                $sName = Html::encode($sName);

                                if (RegExp::isMatchBy('/^http(s)?\\:\\/\\//', $sValue)) {
                                    $sValue = Html::a($sValue, $sValue, [
                                        'target' => '_blank'
                                    ]);
                                } else {
                                    $sValue = Html::encode($sValue);
                                }
                                ?>
                                <div class="project-description-item">
                                    <div class="project-description-item-title">
                                        <?= $sName ?>
                                    </div>
                                    <div class="project-description-item-text">
                                        <?= $sValue ?>
                                    </div>
                                </div>
                                <?php $iCount++ ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="project-description-buttons">
                    <div class="project-description-buttons-wrapper">
                        <?php if (!empty($arForms['ORDER'])) { ?>
                            <div class="project-description-button-wrap">
                                <div class="intec-button intec-button-block intec-button-cl-common intec-button-lg" onclick="universe.forms.show(<?= JavaScript::toObject($arForms['ORDER']) ?>)">
                                    <?= GetMessage('N_PROJECTS_N_D_DEFAULT_BUTTON_ORDER') ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (!empty($arForms['ASK'])) { ?>
                            <div class="project-description-button-wrap">
                                <div class="intec-button intec-button-block intec-button-cl-default intec-button-lg intec-button-transparent" onclick="universe.forms.show(<?= JavaScript::toObject($arForms['ASK']) ?>)">
                                    <?= GetMessage('N_PROJECTS_N_D_DEFAULT_BUTTON_ASK') ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if (!empty($sImage)) { ?>
                <div class="project-image">
                    <img src="<?= $sImage ?>" />
                    <div class="intec-aligner"></div>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
