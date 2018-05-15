<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use intec\core\helpers\Html;

/**
 * @var array $arResult
 * @var array $arParams
 */

$bShowHeader = ArrayHelper::getValue($arParams, 'HEADER_SHOW') == 'Y';
$sHeader = $bShowHeader ? ArrayHelper::getValue($arParams, 'HEADER') : null;
$bHeaderCenter = ArrayHelper::getValue($arParams, 'HEADER_CENTER') == 'Y';
$sHeaderClass = $bHeaderCenter ? ' text-center' : '';

$bDescriptionShow = ArrayHelper::getValue($arParams, 'DESCRIPTION_SHOW') == 'Y';
$sDescription = $bDescriptionShow ? ArrayHelper::getValue($arParams, 'DESCRIPTION') : null;
$bDescriptionCenter = ArrayHelper::getValue($arParams, 'DESCRIPTION_CENTER') == 'Y';
$sDescriptionClass = $bDescriptionCenter ? ' text-center' : '';

$bFirstBig = ArrayHelper::getValue($arParams, 'BIG_FIRST_BLOCK') == 'Y';

$bElementHeaderShow = ArrayHelper::getValue($arParams, 'HEADER_ELEMENT_SHOW') == 'Y';
$bElementDescriptionShow = ArrayHelper::getValue($arParams, 'DESCRIPTION_ELEMENT_SHOW') == 'Y';

?>
<div class="intec-content intec-content-visible widget-articles-content">
    <div class="intec-content-wrapper">
        <?php if ($bShowHeader && !empty($sHeader)) { ?>
            <div class="articles-header<?= $sHeaderClass ?>">
                <?= $sHeader ?>
            </div>
        <?php } ?>
        <?php if ($bDescriptionShow && !empty($sDescription)) { ?>
            <div class=" articles-description<?= $sDescriptionClass ?>">
                <?= $sDescription ?>
            </div>
        <?php } ?>
        <div class="widget-articles<?= $bFirstBig ? ' first-big' : '' ?> clearfix">
            <?php foreach ($arResult['ITEMS'] as $arItem) {

                $header = ArrayHelper::getValue($arItem, 'NAME');
                $description = ArrayHelper::getValue($arItem, 'PREVIEW_TEXT');
                $bShowDescription = $bElementDescriptionShow && !empty($description);

                $sPicture = ArrayHelper::getValue($arItem, ['PREVIEW_PICTURE', 'SRC']);
            ?>
                <?php if ($bFirstBig) { ?>
                    <div class="widget-element element-big">
                        <div class="element-wrapper">
                            <div class="element intec-cl-background">
                                <?= Html::beginTag(
                                    'a',
                                    array(
                                        'class' => 'picture',
                                        'href' => $arItem['DETAIL_PAGE_URL'],
                                        'style' => array(
                                            'background-image' => 'url('.$sPicture.')'
                                        )
                                    )
                                ) ?>
                                <?= Html::endTag('a') ?>
								<div class="fade-bg"></div>
								<div class="text-wrapper">
									<?php if ($bElementHeaderShow) { ?>
										<span class="header">
											<span>
												<?= $arItem['NAME'] ?>
											</span>
										</span>
									<?php } ?>
									<?php if ($bShowDescription ) { ?>
										<span class="description">
											<?= $description ?>
										</span>
									<?php } ?>
								</div>
                            </div>
                        </div>
                    </div>
                <?php $bFirstBig = false;
                } else { ?>
                    <div class="widget-element">
                        <div class="element-wrapper">
                            <div class="element">
                                <?= Html::beginTag(
                                    'a',
                                    array(
                                        'class' => 'picture',
                                        'href' => $arItem['DETAIL_PAGE_URL'],
                                        'style' => array(
                                            'background-image' => 'url('.$sPicture.')'
                                        )
                                    )
                                ) ?>
                                <?= Html::endTag('a') ?>

                                <?php if ($bElementHeaderShow) { ?>
                                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="header intec-cl-text-hover">
                                        <span><?= $arItem['NAME'] ?></span>
                                    </a>
                                <?php } ?>
                                <?php if ($bShowDescription) { ?>
                                    <div class="description">
                                        <?= $arItem['PREVIEW_TEXT'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
