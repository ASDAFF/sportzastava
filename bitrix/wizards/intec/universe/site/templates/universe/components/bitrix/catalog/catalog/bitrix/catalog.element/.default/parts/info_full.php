<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/**
 * @var $APPLICATION
 * @var array $arResult
 * @var array $arParams
 * @var array $characteristics
 * @var array $videoLinks
 * @var array $hasTab
 * @var array $activeTab
 * @var array $component
 * @var array $documents
 */
?>

<div class="item-info-column">
    <?php if ($hasTab['description']) { ?>
        <div>
            <div class="item-sub-title"><?= GetMessage('TAB_DESCRIPTION') ?></div>
            <?php if ($arResult['DETAIL_TEXT_TYPE'] == 'html') {
                echo $arResult['DETAIL_TEXT'];
            } else {
                ?><p><?= $arResult['DETAIL_TEXT'] ?></p><?
            } ?>
        </div>
    <?php } ?>
    <?php if ($hasTab['characteristics']) { ?>
        <div id="anchor-characteristics">
            <div class="item-sub-title"><?= GetMessage('TAB_CHARACTERISTICS') ?></div>
            <div class="item-characteristics-full">
                <?php foreach ($characteristics as $key => $property) { ?>
                    <div class="clearfix characteristic">
                        <div class="col-xs-6 characteristic-name"><?= $property['NAME'] ?></div>
                        <div class="col-xs-6 characteristic-value"><?= $property['VALUE'] ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
    if ($hasTab['documents']) { ?>
        <div>
            <div class="item-sub-title"><?= GetMessage('TAB_DOCUMENTS') ?></div>
            <div class="row item-file-list">
                <?php foreach ($documents as $document) { ?>
                    <div class="col-xs-6 col-sm-4 col-md-2 item-file">
                        <div class="item-file-icon"></div>
                        <div class="item-file-info">
                            <a class="item-file-name" href="<?= $document['SRC'] ?>"><?= $document['ORIGINAL_NAME'] ?></a>
                            <div class="item-file-size"><?= $document['FILE_SIZE_KB'] ?> Kb</div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
    if ($hasTab['video']) { ?>
        <div>
            <div class="item-sub-title"><?= GetMessage('TAB_VIDEO') ?></div>
            <div class="row item-videos-list">
                <?php foreach ($videoLinks as $video) { ?>
                    <div class="col-md-6 col-lg-4 item-video">
                        <div class="item-video-wrap">
                            <iframe allowfullscreen frameborder="0" src="<?= $video['URL'] ?>"></iframe>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
    if ($hasTab['reviews']) { ?>
        <div class="reviews-wrap">
            <div class="item-sub-title"><?= GetMessage('TAB_REVIEWS') ?></div>
            <div class="reviews-container"></div>
        </div>
    <?php } ?>
</div>
