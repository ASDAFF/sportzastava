<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php
use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;
use intec\core\helpers\JavaScript;
use intec\core\helpers\Type;

/** @var array $arParams
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
 */
$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);
?>
<?php $fDraw = function ($arItem, $iLevel) use (&$fDraw, &$arParams, &$arResult) { ?>
<?php
    $arItems = $arItem['ITEMS'];
?>
    <div class="menu-submenu menu-submenu-<?= $iLevel ?>" data-role="menu">
        <div class="menu-submenu-wrapper" data-role="items">
            <div class="menu-submenu-item menu-submenu-item-back" data-role="back">
                <div class="menu-submenu-item-text">
                    <?= GetMessage('W_HEADER_M_MOBILE_BACK') ?>
                </div>
            </div>
            <a href="<?= $arItem['LINK'] ?>" class="menu-submenu-item menu-submenu-item-title" data-role="item">
                <div class="menu-submenu-item-text">
                    <?= $arItem['TEXT'] ?>
                </div>
            </a>
            <?php foreach ($arItems as $arItem) { ?>
            <?php
                $bSelected = ArrayHelper::getValue($arItem, 'SELECTED');
                $bSelected = Type::toBoolean($bSelected);
                $arItems = $arItem['ITEMS'];
                $bHasItems = !empty($arItems);
            ?>
                <?= Html::beginTag($bHasItems ? 'div' : 'a', array(
                    'href' => !$bHasItems ? $arItem['LINK'] : null,
                    'class' => 'menu-submenu-item'.($bSelected ? ' menu-submenu-item-active' : null),
                    'data-role' => 'item'
                )) ?>
                    <div class="menu-submenu-item-wrapper">
                        <div class="menu-submenu-item-text<?= $bSelected ? ' intec-cl-text' : null ?>">
                            <?= $arItem['TEXT'] ?>
                        </div>
                        <?php if ($bHasItems) { ?>
                            <div class="menu-submenu-item-pointer">
                                <div class="intec-aligner"></div>
                                <i class="fa fa-angle-right"></i>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if ($bHasItems) $fDraw($arItem, $iLevel + 1) ?>
                <?= Html::endTag($bHasItems ? 'div' : 'a') ?>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<?php if (!empty($arResult)) { ?>
    <div id="<?= $sTemplateId ?>" class="menu menu-header-mobile">
        <div class="menu-button" data-role="button">
            <div class="intec-aligner"></div>
            <div class="menu-button-icon glyph-icon-menu-icon"></div>
            <div class="menu-button-icon menu-button-icon-active glyph-icon-cancel"></div>
        </div>
        <div class="menu-wrapper" data-role="menu">
            <div class="menu-wrapper-2" data-role="items">
                <?php foreach ($arResult as $arItem) { ?>
                <?php
                    $bSelected = ArrayHelper::getValue($arItem, 'SELECTED');
                    $bSelected = Type::toBoolean($bSelected);
                    $arItems = $arItem['ITEMS'];
                    $bHasItems = !empty($arItems);
                ?>
                    <?= Html::beginTag($bHasItems ? 'div' : 'a', array(
                        'href' => !$bHasItems ? $arItem['LINK'] : null,
                        'class' => 'menu-item'.($bSelected ? ' menu-item-active' : null),
                        'data-role' => 'item'
                    )) ?>
                        <div class="menu-item-wrapper">
                            <div class="menu-item-text<?= $bSelected ? ' intec-cl-text' : null ?>">
                                <?= $arItem['TEXT'] ?>
                            </div>
                            <?php if ($bHasItems) { ?>
                                <div class="menu-item-pointer">
                                    <div class="intec-aligner"></div>
                                    <i class="fa fa-angle-right"></i>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if ($bHasItems) $fDraw($arItem, 1) ?>
                    <?= Html::endTag($bHasItems ? 'div' : 'a') ?>
                <?php } ?>
            </div>
        </div>
        <script type="text/javascript">
            (function ($, api) {
                $(document).ready(function () {
                    var root = $(<?= JavaScript::toObject('#'.$sTemplateId) ?>);
                    var selectors = {
                        'menu': '[data-role=menu]',
                        'item': '[data-role=item]',
                        'items': '[data-role=items]',
                        'back': '[data-role=back]'
                    };
                    var classes = {
                        'initialized': 'menu-initialized',
                        'visible': 'menu-submenu-visible',
                        'active': 'menu-button-active'
                    };
                    var menu;
                    var actions;
                    var locked = false;

                    actions = {};
                    actions.open = function (item) {
                        if (locked)
                            return;

                        var current;
                        var next;

                        item = $(item);
                        current = item.closest(selectors.menu);
                        current.removeClass(classes.visible);
                        next = item.find(selectors.menu).eq(0);
                        next.addClass(classes.visible);
                        next.css('left', '-100%')
                            .show()
                            .stop()
                            .animate({
                                'left': 0
                            }, 500);
                    };
                    actions.close = function (item, forward) {
                        if (locked)
                            return;

                        var current;
                        var prev;

                        item = $(item);

                        if (forward) {
                            current = item.find(selectors.menu).eq(0);
                            prev = item.closest(selectors.menu);
                        } else {
                            current = item.closest(selectors.menu);
                            prev = item.parents(selectors.menu).eq(1);
                        }

                        current.removeClass(classes.visible);
                        prev.addClass(classes.visible);
                        current.css('left', 0)
                            .stop()
                            .animate({
                                'left': '-100%'
                            }, 500, function () {
                                current.hide().css('left', 0);
                            });
                    };
                    actions.adapt = function () {
                        var height = $(window).height();
                        if ($('.header-mobile').is('.header-fixed-menu')) {
                            var offset = menu.position().top;
                        } else {
                            var offset = menu.offset().top;
                        }

                        menu.height(height - offset);
                    };

                    if (root.is(selectors.menu)) {
                        menu = root;
                    } else {
                        menu = root.find(selectors.menu).eq(0);
                    }

                    menu.find(selectors.item).on('click', function (event) {
                        var item;

                        item = $(this);

                        if (item.is('a') || locked) {
                            locked = true;
                            return true;
                        }

                        actions.open(item);
                        event.preventDefault();
                        return false;
                    });
                    menu.find(selectors.back).on('click', function (event) {
                        var item;

                        item = $(this);

                        if (item.is('a') || locked) {
                            locked = true;
                            return true;
                        }

                        actions.close(item);
                        event.preventDefault();
                        return false;
                    });

                    root.find('[data-role=button]').on('click', function () {
                        var self = $(this);

                        if (self.hasClass(classes.active)) {
                            self.removeClass(classes.active);
                            actions.close(root, true);
                            $('html, body').css({
                                'overflow': '',
                                'height': ''
                            });
                        } else {
                            self.addClass(classes.active);
                            actions.open(root);
                            actions.adapt();
                            if ($('.header-mobile').is('.header-fixed-menu')) {
                                $('html, body').css({
                                    'overflow': 'hidden'
                                });
                            } else {
                                $('html, body').css({
                                    'overflow': 'hidden',
                                    'height': '100%'
                                }).scrollTop(0);
                            }
                        }
                    });

                    $(window).resize(actions.adapt);

                    menu.addClass(classes.initialized);
                })
            })(jQuery, intec)
        </script>
    </div>
<?php } ?>