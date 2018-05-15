<?if($arParams["FOOTER_SHOW_SOCIAL"]) {?>
    <div class="social-title">
        <?=GetMessage("FOOTER_SOCIAL_TITLE");?>
    </div>
    <ul class="social">
        <?if($arParams["FOOTER_VKONTACTE"]){?>
            <li>
                <a target="_blank" href="<?=$arParams["FOOTER_VKONTACTE"]?>">
                    <i class="glyph-icon-vk"></i>
                </a>
            </li>
        <?}?>
        <?if($arParams["FOOTER_FACEBOOK"]){?>
            <li>
                <a target="_blank" href="<?=$arParams["FOOTER_FACEBOOK"]?>">
                    <i class="glyph-icon-facebook"></i>
                </a>
            </li>
        <?}?>
        <?if($arParams["FOOTER_INSTAGRAM"]){?>
            <li>
                <a target="_blank" href="<?=$arParams["FOOTER_INSTAGRAM"]?>">
                    <i class="glyph-icon-instagram"></i>
                </a>
            </li>
        <?}?>
        <?if($arParams["FOOTER_TWITTER"]){?>
            <li>
                <a target="_blank" href="<?=$arParams["FOOTER_TWITTER"]?>">
                    <i class="glyph-icon-twitter"></i>
                </a>
            </li>
        <?}?>
    </ul>
<?}?>