<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;

/**
 * @var $arResult
 */

$this->setFrameMode(true);

$componentHash = spl_object_hash($this);

$sTitle = ArrayHelper::getValue($arResult, ['VIEW_PARAMETERS', 'TITLE']);

if (!empty($arResult['ITEMS'])) { ?>
    <div class="item-bind-items" id="<?= $componentHash ?>">
        <?php if (!empty($sTitle)) { ?>
            <div class="item-sub-title">
                <?= $sTitle ?>
            </div>
        <?php } ?>
        <div class="item-bind-items-list owl-carousel">
            <?php foreach ($arResult['ITEMS'] as $arItem) {

                $sDetail = ArrayHelper::getValue($arItem, 'DETAIL_PAGE_URL');
                $sPictureSrc = ArrayHelper::getValue($arItem, ['PREVIEW_PICTURE', 'SRC']);
                $sName = ArrayHelper::getValue($arItem, 'NAME');
                $sPrice = ArrayHelper::getValue($arItem, ['MIN_PRICE', 'PRINT_DISCOUNT_VALUE']);

                $arPictureAttributes = [
                    'class' => 'item-bind-image',
                    'href' => $sDetail,
                    'style' => [
                        'background-image' => 'url('.$sPictureSrc.')'
                    ]
                ];

            ?>
                <div class="item-bind-item clearfix">
                    <?= Html::tag('a', '', $arPictureAttributes) ?>
                    <div class="item-bind-info">
                        <a href="<?= $sDetail ?>" class="item-bind-name">
                            <?= $sName ?>
                        </a>
                        <?php if (!empty($sPrice)) { ?>
                            <div class="item-bind-price">
                                <?= $sPrice ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include('javascript.php');
}