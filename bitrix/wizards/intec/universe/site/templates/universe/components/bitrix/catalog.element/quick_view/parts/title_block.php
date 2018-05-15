<div class="title-block clearfix">
    <div class="title-element">
        <?=$arResult["NAME"];?>
    </div>
    <div class="go-category">
        <a onclick="document.location.href='<?=$arResult["SECTION_PAGE_URL"]?>';return false;"><?=GetMessage("CT_PRODUCTS_IN_CATEGORY");?></a>
        <i class="fa fa-angle-right">
        </i>
    </div>
</div>