<?if($arParams["FOOTER_SHOW_SEARCH"]){?>
    <form action="<?=$arResult["FOOTER_SHOW_SEARCH_PATH"];?>" method = "GET">
        <div class="footer-search">
            <input name="q" type="text" placeholder="<?=GetMessage("FOOTER_SEARCH");?>">
            <button class="glyph-icon-loop"></button>
        </div>
    </form>
<?}?>