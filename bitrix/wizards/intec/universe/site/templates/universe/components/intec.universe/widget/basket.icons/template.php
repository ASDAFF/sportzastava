<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\JavaScript;
use intec\core\net\Url;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 */

$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);

$oFrame = $this->createFrame();
$oFrame->begin();
?>
    <div id="<?= $sTemplateId ?>" class="sale-icons">
        <?php if ($arResult['SHOW_COMPARE']) { ?>
            <a href="<?= $arParams['URL_COMPARE'] ?>"
               class="sale-icons-item intec-cl-text-hover <?= $arResult['COMPARE_COUNT'] > 0 ? 'active' : '' ?>">
                <span class="sale-icons-icon-wrap">
                    <span class="sale-icons-icon glyph-icon-compare"></span>
                </span>
                <?php if ($arResult['COMPARE_COUNT'] > 0) { ?>
                    <span class="sale-icons-count"><?= $arResult['COMPARE_COUNT'] ?></span>
                <?php } ?>
            </a>
        <?php } ?>
        <?php if ($arResult['SHOW_DELAY']) {
            $delayUrl = new Url($arResult['URL_BASKET']);
            $delayUrl->getQuery()->setRange(['delay' => 'y']);
            ?>
            <a href="<?= $delayUrl->build() ?>"
               class="sale-icons-item intec-cl-text-hover <?= $arResult['DELAYED_COUNT'] > 0 ? 'active' : '' ?>">
                <span class="sale-icons-icon-wrap">
                    <span class="sale-icons-icon glyph-icon-heart"></span>
                </span>
                <?php if ($arResult['DELAYED_COUNT'] > 0) { ?>
                    <span class="sale-icons-count"><?= $arResult['DELAYED_COUNT'] ?></span>
                <?php } ?>
            </a>
        <?php } ?>
        <?php if ($arResult['SHOW_BASKET']) { ?>
            <a href="<?= $arResult['URL_BASKET'] ?>"
               class="sale-icons-item intec-cl-text-hover <?= $arResult['BASKET_COUNT'] > 0 ? 'active' : '' ?>">
                <span class="sale-icons-icon-wrap">
                    <span class="sale-icons-icon glyph-icon-cart"></span>
                </span>
                <?php if ($arResult['BASKET_COUNT'] > 0) { ?>
                    <span class="sale-icons-count"><?= $arResult['BASKET_COUNT'] ?></span>
                <?php } ?>
            </a>
        <?php } ?>
        <?php if (!defined('EDITOR')) { ?>
            <script type="text/javascript">
                (function ($, api) {
                    $(document).ready(function () {
                        var root = $(<?= JavaScript::toObject('#'.$sTemplateId) ?>);
                        var updated = false;
                        var update = function () {
                            if (updated)
                                return;

                            updated = true;
                            universe.components.get(<?= JavaScript::toObject([
                                'component' => $component->getName(),
                                'template' => $this->getName(),
                                'parameters' => ArrayHelper::merge(
                                    $arParams,
                                    ['AJAX_MODE' => 'N']
                                )
                            ]) ?>, function (result) {
                                root.replaceWith(result);
                            });
                        };

                        universe.basket.once('update', update);
                        universe.compare.once('update', update);
                    });
                })(jQuery, intec);
            </script>
        <?php } ?>
    </div>
<?php $oFrame->beginStub(); ?>
    <div class="sale-icons">
        <?php if ($arResult['SHOW_COMPARE']) { ?>
            <a href="<?= $arParams['URL_COMPARE'] ?>" class="sale-icons-item">
                <span class="sale-icons-icon-wrap">
                    <span class="sale-icons-icon glyph-icon-compare"></span>
                </span>
            </a>
        <?php } ?>
        <?php if ($arResult['SHOW_DELAY']) {
            $delayUrl = new Url($arResult['URL_BASKET']);
            $delayUrl->getQuery()->setRange(['delay' => 'y']);
            ?>
            <a href="<?= $delayUrl->build() ?>" class="sale-icons-item">
                <span class="sale-icons-icon-wrap">
                    <span class="sale-icons-icon glyph-icon-heart"></span>
                </span>
            </a>
        <?php } ?>
        <?php if ($arResult['SHOW_BASKET']) { ?>
            <a href="<?= $arResult['URL_BASKET'] ?>" class="sale-icons-item">
                <span class="sale-icons-icon-wrap">
                    <span class="sale-icons-icon glyph-icon-cart"></span>
                </span>
            </a>
        <?php } ?>
    </div>
<?php $oFrame->end(); ?>