<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

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
 */

$this->setFrameMode(true);
?>
<div class="news-detail news-default-news-detail-default">
    <?php if ($arParams['DISPLAY_DATE'] == 'Y' && !empty($arResult['DISPLAY_ACTIVE_FROM'])) { ?>
        <div class="news-detail-date">
            <?= $arResult['DISPLAY_ACTIVE_FROM'] ?>
        </div>
    <?php } ?>
    <div class="news-detail-content">
        <?php if ($arParams['DISPLAY_PREVIEW_TEXT'] == 'Y' && !empty($arResult['PREVIEW_TEXT'])) { ?>
            <div class="news-detail-text news-detail-text-preview">
                <?= $arResult['PREVIEW_TEXT'] ?>
            </div>
        <?php } ?>
        <?php if (!empty($arResult['DETAIL_PICTURE'])) { ?>
            <div class="news-detail-image" style="background-image: url('<?= $arResult['DETAIL_PICTURE']['SRC'] ?>')"></div>
        <?php } ?>
        <?php if (!empty($arResult['DETAIL_TEXT'])) { ?>
            <div class="news-detail-text news-detail-text-detail">
                <?= $arResult['DETAIL_TEXT'] ?>
            </div>
            <div class="news-detail-delimiter"></div>
        <?php } ?>
        <?php if (!empty($arParams['BACK_URL'])) { ?>
            <a class="news-detail-back" href="<?= $arParams['BACK_URL'] ?>">
                <div class="news-detail-back-icon" style="background-image: url('<?= $this->GetFolder().'/images/back.png' ?>')"></div>
                <div class="news-detail-back-text">
                    <?= GetMessage('N_DEFAULT_N_D_DEFAULT_BACK') ?>
                </div>
            </a>
        <?php } ?>
    </div>
    <?php if ($arResult['DISPLAY_READ_ALSO']) { ?>
        <div class="news-detail-read-also">
            <?php $APPLICATION->IncludeComponent(
                'bitrix:news.list',
                'news.'.($arParams['VIEW_READ_ALSO'] == 'blocks' ? 'blocks' : 'tile'),
                array(
                    'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                    'NEWS_COUNT' => $arParams['VIEW_READ_ALSO'] == 'blocks' ? 3 : 4,
                    'LINE_COUNT' => $arParams['VIEW_READ_ALSO'] == 'blocks' ? 3 : 4,
                    'SORT_BY1' => 'SORT',
                    'SORT_ORDER1' => 'ASC',
                    'FIELD_CODE' => $arParams['FIELD_CODE'],
                    'PROPERTY_CODE' => $arParams['PROPERTY_CODE'],
                    'DETAIL_URL' => $arParams['DETAIL_URL'],
                    'SECTION_URL' => $arParams['SECTION_URL'],
                    'IBLOCK_URL' => $arParams['IBLOCK_URL'],
                    'SET_TITLE' => 'N',
                    'SET_LAST_MODIFIED' => 'N',
                    'SET_STATUS_404' => 'N',
                    'SHOW_404' => 'N',
                    'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
                    'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                    'CACHE_TIME' => $arParams['CACHE_TIME'],
                    'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                    'CACHE_FILTER' => $arParams['CACHE_FILTER'],
                    'DISPLAY_TOP_PAGER' => 'N',
                    'DISPLAY_BOTTOM_PAGER' => 'N',
                    'PAGER_SHOW_ALWAYS' => 'N',
                    'DISPLAY_DATE' => 'Y',
                    'DISPLAY_NAME' => 'Y',
                    'DISPLAY_PICTURE' => 'Y',
                    'DISPLAY_TITLE' => 'Y',
                    'TITLE' => GetMessage('N_DEFAULT_N_D_DEFAULT_READ_ALSO_TITLE'),
                    'ACTIVE_DATE_FORMAT' => $arParams['ACTIVE_DATE_FORMAT'],
                    'FILTER_NAME' => $arResult['FILTER_NAME']
                ),
                $component
            ) ?>
        </div>
    <?php } ?>
</div>