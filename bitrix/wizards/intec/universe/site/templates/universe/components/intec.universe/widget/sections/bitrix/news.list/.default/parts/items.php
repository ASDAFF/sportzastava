<?php

/**
 * @global $APPLICATION
 * @var $arResult
 * @var $arParams
 */
?>

<div class="intec-news-sections_items clearfix">
    <?php foreach ($arResult['ITEMS'] as $item) {
        $itemData = $item['CUSTOM_DATA'];
        $sImage = null;
        if(!$mobile){
            $sId = $sTemplateId.'_'.$item['ID'];
            $sAreaId = $this->GetEditAreaId($sId);
            $this->AddEditAction($sId, $item['EDIT_LINK']);
            $this->AddDeleteAction($sId, $item['DELETE_LINK']);
        }
        ?>
        <div class="intec-news-sections_item size-<?= $itemData['SIZE'] ?> <?=$arParams["COUNT_IN_ROW"]?>"
             <?if($sAreaId && !$mobile){?>
                id="<?=$sAreaId?>"
             <?}?>
        >
            <a href="<?= $itemData['LINK'] ? $itemData['LINK'] : 'javascript:;' ?>"
                <?= $itemData['TARGET'] == "Y" ? 'target="_blank"' : '' ?>
                class="intec-news-sections_item_wrap">
                <span class="intec-news-sections_image_wrapper">
                    <span class="intec-news-sections_image" style="<?= $itemData['IMAGE'] ? 'background-image: url(\''. $itemData['IMAGE'] .'\');' : '' ?>">

                    </span>
                </span>
                <?php if ($itemData['SHOW_STICKER']) { ?>
                    <span class="intec-news-sections_discount_stick">
                        <span><?= $itemData['STICKER'] ?></span>
                    </span>
                <?php } ?>
                <span class="intec-news-sections_name_wrap">
                    <span class="intec-news-sections_name"><?= $item['NAME'] ?></span>
                </span>
            </a>
        </div>
    <?php } ?>
</div>