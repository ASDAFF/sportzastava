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

$iSubItemsLimit = ArrayHelper::getValue($arParams, 'SECTION_VIEW_SUBSECTION_COUNT');
$iSubItemsLimit = !empty($iSubItemsLimit) ? $iSubItemsLimit : 3;

$isDefaultMenu = ($arParams['POSITION_MENU'] == 'default') ? true : false;
$isTransparent = ($isDefaultMenu && $arParams['DEFAULT_VIEW'] == 'transparent') ? true : false;
?>
<?php $fDraw = function ($arItem, $iLevel, $bIsIBlock = false) use (&$fDraw, &$arParams, &$arResult, &$iSubItemsLimit) { ?>
<?php
    $arItems = $arItem['ITEMS'];

    if ($bIsIBlock) {
        include('parts/section.php');
    } else {
        include('parts/default.php');
    }
?>

<?php } ?>
<?php if (!empty($arResult)) { ?>
    <div id="<?= $sTemplateId ?>" class="menu menu-horizontal intec-cl-background <?=($isTransparent)?'menu-horizontal-transparent':''?>" data-role="menu">
        <div class="intec-content">
            <div class="intec-content-wrapper">
                <div class="menu-wrapper" data-role="items">
                    <?php foreach ($arResult as $arItem) { ?>
                    <?php
                        $bIsIBlock = false;

                        if (!empty($arItem['ITEMS'])) {
                            $bIsIBlock = ArrayHelper::getFirstValue($arItem['ITEMS']);
                            $bIsIBlock = ArrayHelper::getValue($bIsIBlock, ['PARAMS', 'FROM_IBLOCK']);
                            $bIsIBlock = Type::toBoolean($bIsIBlock);
                        }

                        $bSelected = ArrayHelper::getValue($arItem, 'SELECTED');
                        $bSelected = Type::toBoolean($bSelected);
                    ?>
                        <div class="menu-item<?= $bIsIBlock ? ' menu-item-section' : ' menu-item-default' ?><?= $bSelected ? ' menu-item-active intec-cl-text intec-cl-background-light' : null ?> intec-cl-background-light-hover <?=($isDefaultMenu && !$isTransparent)?'intec-cl-border-light menu-item-border':''?> <?=(!$isDefaultMenu)?'intec-cl-text-hover':''?>" data-role="item">
                            <a href="<?= $arItem['LINK'] ?>" class="menu-item-text <?=($arItem['IS_CATALOG'] == 'Y' && $isDefaultMenu)?'menu-item-catalog-text':''?>">
                                <?if ($arItem['IS_CATALOG'] == 'Y' && $isDefaultMenu) {?>
                                    <span class="menu-catalog-icon glyph-icon-menu-icon_2 <?=($isTransparent)?'intec-cl-text':''?>"></span>
                                    <span class="menu-item-arrow-down fa fa-angle-down <?=($isTransparent)?'intec-cl-text':''?>"></span>
                                <?}?>
                                <div class="intec-aligner"></div>
                                <div class="menu-item-text-wrapper <?=(!$isDefaultMenu)?'intec-cl-text-hover':''?> <?=($isTransparent)?'intec-cl-text':''?>">
                                    <?= Html::encode($arItem['TEXT']) ?>
                                </div>
                            </a>
                            <?php if (!empty($arItem['ITEMS'])) {
                                $fDraw($arItem, 1, $bIsIBlock);
                            } ?>
                        </div>
                    <?php } ?>
                    <div class="menu-item menu-item-default menu-item-more intec-cl-background-light-hover <?=($isDefaultMenu && !$isTransparent)?'intec-cl-border-light menu-item-border':''?>" data-role="more">
                        <a class="menu-item-text">
                            <div class="intec-aligner"></div>
                            <div class="menu-item-text-wrapper <?=($isTransparent)?'intec-cl-text':''?>">...</div>
                        </a>
                        <?php $fDraw(array(
                            'TEXT' => '...',
                            'LINK' => null,
                            'ITEMS' => $arResult
                        ), 1, false) ?>
                    </div>
                </div>
                <div class="clearfix"></div>
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
                        'more': '[data-role=more]'
                    };
                    var classes = {
                        'adapted': 'menu-adapted',
                        'initialized': 'menu-initialized',
                        'visible': 'menu-submenu-visible',
                        'right': 'menu-submenu-right'
                    };
                    var menu;
                    var adapt;

                    if (root.is(selectors.menu)) {
                        menu = root;
                    } else {
                        menu = root.find(selectors.menu).eq(0);
                    }

                    /**
                     * Возвращает элемент, содержащий все пункты указанного меню.
                     * Значение параметра submenu:
                     * - селектор или jQuery - возвращать элемент указанного меню.
                     * - false - возвращать элементы всех меню.
                     */
                    menu.getItemsWrappers = function (submenu) {
                        if (!submenu) {
                            return menu
                                .find(selectors.items);
                        }

                        if (menu.get(0) === submenu.get(0)) {
                            submenu = menu;
                        } else {
                            submenu = menu
                                .find(submenu);
                        }

                        return submenu
                            .find(selectors.items)
                            .eq(0);
                    };

                    /**
                     * Возвращает элементы меню.
                     * Значение параметра submenu:
                     * - селектор или jQuery - возвращать элементы определенного меню.
                     * - false - возвращать все элементы.
                     */
                    menu.getItems = function (submenu) {
                        if (!submenu) {
                            return menu
                                .find(selectors.item);
                        }

                        return menu
                            .getItemsWrappers(submenu)
                            .children(selectors.item);
                    };

                    /**
                     * Возвращает меню.
                     * Значение параметра item:
                     * - селектор или объект jQuery - возвращает меню элемента.
                     * - false - возвращать все меню.
                     */
                    menu.getMenu = function (item) {
                        if (item)
                            return menu
                                .find(item)
                                .find(selectors.menu)
                                .eq(0);

                        return menu
                            .find(selectors.menu);
                    };

                    /** Управление содержимым "Еще" */
                    menu.more = {};
                    /** Возвращает элемент меню "Еще" */
                    menu.more.getItem = function () {
                        return menu
                            .find(selectors.more);
                    };
                    /** Возвращает меню элемента "Еще" */
                    menu.more.getMenu = function () {
                        return menu.getMenu(menu.more.getItem());
                    };
                    /** Добавляет элементы (jQuery коллекция) в меню "Еще" */
                    menu.more.add = function (add) {
                        var items;

                        add = $(add);
                        items = menu.getItems(menu.more.getMenu());
                        add.each(function () {
                            var self = $(this);
                            var item = items.eq(self.index());

                            self.hide();
                            item.show();
                        });
                    };
                    /** Удаляет элементы (jQuery коллекция) из меню "Еще" */
                    menu.more.remove = function (remove) {
                        var items;

                        remove = $(remove);
                        items = menu.getItems(menu.more.getMenu());
                        remove.each(function () {
                            var self = $(this);
                            var item = items.eq(self.index());

                            self.show();
                            item.hide();
                        });
                    };

                    /** Правила адаптивности */
                    adapt = {};
                    /** Адаптация положения подменю */
                    adapt.menu = function () {
                        var submenu = menu.getMenu().filter('[data-visible=true]');
                        var wrapper = menu.getItemsWrappers(menu);
                        var width = wrapper.width();
                        var right = false;

                        submenu.each(function () {
                            var self = $(this);
                            var offset = {};

                            self.removeClass(classes.right);

                            offset.start = function () { return self.offset().left - wrapper.offset().left };
                            offset.end = function () { return offset.start() + self.width(); };

                            if (offset.end() > width)
                                right = true;

                            if (right) {
                                self.addClass(classes.right);

                                if (offset.start() < 0) {
                                    self.removeClass(classes.right);
                                    right = false;
                                }
                            }
                        });
                    };
                    /** Адаптация элементов корневого меню */
                    adapt.items = function () {
                        var items = {};
                        var width = {};
                        var wrapper = menu.getItemsWrappers(menu);

                        menu.removeClass(classes.adapted);
                        items.all = menu.getItems(menu);
                        items.visible = $([]);
                        items.hidden = $([]);

                        width.available = wrapper.width() - menu.more.getItem().show().width();
                        width.total = 0;

                        menu.more.remove(items.all);
                        items.all.each(function () {
                            var item = $(this);

                            item.css('width', 'auto');
                            width.total += item.width();

                            if (width.total < width.available) {
                                items.visible = items.visible.add(item);
                            } else {
                                items.hidden = items.hidden.add(item);
                            }
                        });

                        if (items.hidden.size() > 0) {
                            menu.more.add(items.hidden);
                        } else {
                            menu.more.getItem().hide();
                            width.available = wrapper.width();
                        }

                        menu.addClass(classes.adapted);

                        width.total = 0;
                        items.visible.each(function () {
                            width.total += $(this).width();
                        }).each(function () {
                            var item = $(this);
                            var size = Math.floor((width.available / 100) * (item.width() / width.total) * 100);

                            item.css('width', size + 'px');
                        });
                    };

                    /** События наведения мыши на пунктах меню */
                    menu.getItems().add(menu.more.getItem()).on('mouseenter', function (event) {
                        var item = $(this);
                        var submenu;

                        submenu = menu.getMenu(item);
                        submenu.show().addClass(classes.visible).stop().animate({
                            'opacity': 1
                        }, 300);
                        submenu.attr('data-visible', 'true');
                        adapt.menu();

                        event.preventDefault();
                    }).on('mouseleave', function (event) {
                        var item = $(this);
                        var submenu;

                        submenu = menu.getMenu(item);
                        submenu.stop().removeClass(classes.visible).animate({
                            'opacity': 0
                        }, 50, function () {
                            adapt.menu();
                            submenu.removeAttr('data-visible');
                            submenu.hide();
                        });

                        event.preventDefault();
                    });

                    $(window).on('resize', function () {
                        adapt.items();
                        adapt.menu();
                    });

                    menu.addClass(classes.initialized);
                    adapt.items();
                });
            })(jQuery, intec);
        </script>
    </div>
<?php } ?>