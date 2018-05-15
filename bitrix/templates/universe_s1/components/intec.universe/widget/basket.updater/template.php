<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\JavaScript;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 */

$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);

$data = array(
    'basket' => $arResult['BASKET'],
    'compare' => $arResult['COMPARE']
)
?>
<?php $oFrame = $this->createFrame() ?>
<?php $oFrame->begin() ?>
<div id="<?= $sTemplateId ?>" style="display: none">
    <script type="text/javascript">
        (function ($, api) {
            var root;
            var data;
            var update;
            var updated;
            var run;
            var attributes;
            var attribute;

            attribute = function (name) {
                var self = {};

                self.getName = function () { return name; };
                self.getSelector = function (value) {
                    if (value)
                        return '[' + self.getName() + '=' + value + ']';

                    return '[' + self.getName() + ']';
                };

                return self;
            };

            attributes = {};
            attributes.basket = {};
            attributes.basket.add = attribute('data-basket-add');
            attributes.basket.added = attribute('data-basket-added');
            attributes.basket.delay = attribute('data-basket-delay');
            attributes.basket.delayed = attribute('data-basket-delayed');
            attributes.basket.in = attribute('data-basket-in');
            attributes.compare = {};
            attributes.compare.add = attribute('data-compare-add');
            attributes.compare.added = attribute('data-compare-added');
            attributes.compare.in = attribute('data-compare-in');

            root = $(<?= JavaScript::toObject('#'.$sTemplateId) ?>);
            data = <?= JavaScript::toObject($data) ?>;
            run = function () {
                $(attributes.basket.add.getSelector())
                    .add(attributes.basket.added.getSelector())
                    .add(attributes.basket.delay.getSelector())
                    .add(attributes.basket.delayed.getSelector())
                    .attr(attributes.basket.in.getName(), 'false');

                api.each(data.basket, function (index, item) {
                    var nodes;

                    if (!item.delay) {
                        nodes = $(attributes.basket.add.getSelector(item.id))
                            .add(attributes.basket.added.getSelector(item.id));
                    } else {
                        nodes = $(attributes.basket.delay.getSelector(item.id))
                            .add(attributes.basket.delayed.getSelector(item.id));
                    }

                    nodes.attr(attributes.basket.in.getName(), 'true');
                });

                $(attributes.compare.add.getSelector())
                    .add(attributes.compare.added.getSelector())
                    .attr(attributes.compare.in.getName(), 'false');

                api.each(data.compare, function (index, item) {
                    $(attributes.compare.add.getSelector(item))
                        .add(attributes.compare.added.getSelector(item))
                        .attr(attributes.compare.in.getName(), 'true');
                });
            };
            updated = false;
            update = function () {
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

            <?php if ($arParams['BASKET_UPDATE'] == 'Y') { ?>
                universe.basket.once('update', update);
            <?php } ?>
            <?php if ($arParams['COMPARE_UPDATE'] == 'Y') { ?>
                universe.compare.once('update', update);
            <?php } ?>

            BX.addCustomEvent("onFrameDataReceived" , function () {
                if (updated)
                    return;

                run();
            });

            BX.ready(function() {
                if (updated)
                    return;

                run();
            });
        })(jQuery, intec);
    </script>
</div>
<?php $oFrame->end() ?>
