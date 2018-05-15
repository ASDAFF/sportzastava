<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\RegExp;
use intec\core\helpers\StringHelper;
use intec\core\helpers\Type;

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
$this->setFrameMode(true);
$expression = new RegExp('^'.RegExp::escape(SITE_DIR));
$property = ArrayHelper::getValue($arParams, 'PROPERTY_CODE');
$values = ArrayHelper::getValue($arParams, ['PROPERTY', 'value']);

if (!Type::isArray($values))
    $values = [];

?>
<?php $fDraw = function ($items, $level = 0) use (&$expression, &$fDraw, &$property, &$values) { ?>
    <?php foreach ($items as $item) { ?>
    <?php
        if (!$expression->isMatch($item['LINK']))
            continue;

        $bIsIBlockSection = false;

        if (!empty($item['ITEMS'])) {
            $child = ArrayHelper::getFirstValue($item['ITEMS']);
            $bIsIBlockSection = ArrayHelper::keyExists('FROM_IBLOCK', $child['PARAMS']);
        }

        $code = $expression->replace(null, $item['LINK']);
        $code = StringHelper::replace($code, [
            '/' => '.'
        ]);
        $code = trim($code, '.');
        $value = ArrayHelper::getValue($values, $code);
        $display = ArrayHelper::getValue($value, 'display');
        $side = ArrayHelper::getValue($value, 'side');

        if ($side !== 'right')
            $side = 'left';
    ?>
        <div class="menu-settings<?= $level > 0 ? ' menu-settings-child' : null ?><?= ' menu-settings-level-'.$level ?>">
            <div class="row menu-settings-panel">
                <div class="col-xs-12 col-sm-5 menu-settings-column menu-settings-column-name"><?= $item['TEXT'] ?></div>
                <div class="col-xs-12 col-sm-5 menu-settings-column menu-settings-column-side">
                    <?php /*<label class="universe-radio-link<?= $side === 'left' ? ' checked' : null ?>">
                        <?= GetMessage('BX_MENU_SETTINGS_LEFT') ?>
                        <?= Html::radio($property.'['.$code.'][side]', $side === 'left', [
                            'class' => 'jsRadioInput',
                            'value' => 'left'
                        ]) ?>
                    </label>
                    <span class="separator"></span>
                    <label class="universe-radio-link<?= $side === 'right' ? ' checked' : null ?>">
                        <?= GetMessage('BX_MENU_SETTINGS_RIGHT') ?>
                        <?= Html::radio($property.'['.$code.'][side]', $side === 'right', [
                            'class' => 'jsRadioInput',
                            'value' => 'right'
                        ]) ?>
                    </label>*/ ?>
                </div>
                <div class="col-xs-12 col-sm-2 menu-settings-column menu-settings-column-switch">
                    <?= Html::hiddenInput($property.'['.$code.'][display]', 0) ?>
                    <?php if (!$bIsIBlockSection) { ?>
                        <?= Html::checkbox($property.'['.$code.'][display]', $display, [
                            'value' => 1,
                            'data-ui-switch' => '{}'
                        ]) ?>
                    <? } ?>
                </div>
            </div>
            <?php if (!empty($item['ITEMS'])) { ?>
                <?php $child = ArrayHelper::getFirstValue($item['ITEMS']) ?>
                <?php if (!ArrayHelper::keyExists('FROM_IBLOCK', $child['PARAMS'])) { ?>
                    <?php $fDraw($item['ITEMS'], $level + 1) ?>
                <?php } else { ?>
                    <?php foreach (['root', 'section', 'element'] as $section) { ?>
                    <?php
                        $sectionCode = $code.'.'.$section;
                        $sectionValue = ArrayHelper::getValue($values, $sectionCode);
                        $sectionDisplay = ArrayHelper::getValue($sectionValue, 'display');
                        $sectionSide = ArrayHelper::getValue($sectionValue, 'side');

                        if ($sectionSide !== 'right')
                            $sectionSide = 'left';
                    ?>
                        <div class="menu-settings menu-settings-child<?= ' menu-settings-level-'.($level + 1) ?>">
                            <div class="row menu-settings-panel">
                                <div class="col-xs-12 col-sm-5 menu-settings-column menu-settings-column-name"><?= GetMessage('BX_MENU_SETTINGS_SECTION_'.$section) ?></div>
                                <div class="col-xs-12 col-sm-5 menu-settings-column menu-settings-column-side">
                                    <?php /*<label class="universe-radio-link<?= $sectionSide === 'left' ? ' checked' : null ?>">
                                        <?= GetMessage('BX_MENU_SETTINGS_LEFT') ?>
                                        <?= Html::radio($property.'['.$sectionCode.'][side]', $sectionSide === 'left', [
                                            'class' => 'jsRadioInput',
                                            'value' => 'left'
                                        ]) ?>
                                    </label>
                                    <span class="separator"></span>
                                    <label class="universe-radio-link<?= $sectionSide === 'right' ? ' checked' : null ?>">
                                        <?= GetMessage('BX_MENU_SETTINGS_RIGHT') ?>
                                        <?= Html::radio($property.'['.$sectionCode.'][side]', $sectionSide === 'right', [
                                            'class' => 'jsRadioInput',
                                            'value' => 'right'
                                        ]) ?>
                                    </label>*/ ?>
                                </div>
                                <div class="col-xs-12 col-sm-2 menu-settings-column menu-settings-column-switch">
                                    <?= Html::hiddenInput($property.'['.$sectionCode.'][display]', 0) ?>
                                    <?= Html::checkbox($property.'['.$sectionCode.'][display]', $sectionDisplay, [
                                        'value' => 1,
                                        'data-ui-switch' => '{}'
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>
<?php } ?>
<?php if (!empty($arResult)) { ?>
    <?php $fDraw($arResult) ?>
<?php }