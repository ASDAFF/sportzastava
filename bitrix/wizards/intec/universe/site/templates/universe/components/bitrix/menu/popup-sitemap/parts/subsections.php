<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;

/**
 * @var array $arSecondLevel
 */
?>
<?php foreach ($arSecondLevel as $arItemSL) {

    $sSectionNameSL = ArrayHelper::getValue($arItemSL, 'TEXT');
    $sSectionURLSL = ArrayHelper::getValue($arItemSL, 'LINK');
    $bHaveItems = $bHaveItems = count($arItemSL['ITEMS']) > 0;
    $arThirdLevel = $bHaveItems ? ArrayHelper::getValue($arItemSL, 'ITEMS') : null;

?>
    <div class="second-level-element">
        <div class="second-level-name">
            <a class="intec-cl-text-hover" href="<?= $sSectionURLSL ?>">
                <?= $sSectionNameSL ?>
            </a>
            <?php if ($bHaveItems) { ?>
                <span class="third-level-show intec-cl-background-hover">
                    <i class="fa fa-angle-down"></i>
                </span>
            <?php } ?>
        </div>
        <?php if ($bHaveItems) { ?>
            <div class="third-level" style="display: none">
                <?php foreach ($arThirdLevel as $arItemTL) {

                    $sSectionNameTL = ArrayHelper::getValue($arItemTL, 'TEXT');
                    $sSectionURLTL = ArrayHelper::getValue($arItemTL, 'LINK');

                ?>
                    <div class="third-level-name">
                        <a class="intec-cl-text-hover" href="<?= $sSectionURLTL ?>">
                            <?= $sSectionNameTL ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>