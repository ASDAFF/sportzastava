<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if(!empty($arResult["CATEGORIES"])):?>
    <div class="title-search-result nano">
        <div class="nano-content">
            <?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>
                <?foreach($arCategory["ITEMS"] as $i => $arItem):?>
                    <a href="<?=$arItem["URL"]?>" class="bx_item_block">
                        <div class="search-form-popup-wrap">
                            <table class="search-form-popup-table">
                                <tr>
                                    <?if($category_id === "all"):?>
                                        <td class="title-search-all-td" colspan="3"><span class="title-search-all"><?=GetMessage('SEARCH_RESULT_ALL')?></span></td>
                                    <?elseif(isset($arResult["ELEMENTS"][$arItem["ITEM_ID"]])):
                                        $arElement = $arResult["ELEMENTS"][$arItem["ITEM_ID"]];
                                        ?>
                                        <?if (is_array($arElement["PICTURE"])){?>
                                        <td class="search-item-img">
                                            <img align="left" src="<?echo $arElement["PICTURE"]["src"]?>" width="<?echo $arElement["PICTURE"]["width"]?>" height="<?echo $arElement["PICTURE"]["height"]?>">
                                        </td>
                                    <?}?>
                                        <td class="search-item-info">
                                            <div class="search-item-name">
                                                <?=$arItem["NAME"]?>
                                            </div>
                                            <div class="search-item-section-name">
                                                <?=$arElement["SECTION_NAME"]?>
                                            </div>
                                        </td>
                                        <td class="search-item-price">
                                            <?foreach($arElement["PRICES"] as $code=>$arPrice):?>
                                                <?if(!isset($arPrice["CAN_ACCESS"]) || $arPrice["CAN_ACCESS"]):?>
                                                    <?if( isset($arPrice["DISCOUNT_VALUE"]) && ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"])):?>
                                                        <div class="search-item-new-price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></div><div class="search-item-old-price"><?=$arPrice["PRINT_VALUE"]?></div>
                                                    <?else:?><div class="search-item-new-price"><?=$arPrice["PRINT_VALUE"]?></div><?endif;?>
                                                <?endif;?>
                                            <?endforeach;?>
                                        </td>
                                    <?else:?>
                                        <td class="title-search-more" colspan="3"><span><?echo $arItem["NAME"]?></span></td>
                                    <?endif;?>
                                </tr>
                            </table>
                        </div>
                    </a>
                <?endforeach;?>
            <?endforeach;?>
        </div>
    </div>
<?endif;
?>
<script>
    $('.title-search-result.nano').nanoScroller();
</script>
