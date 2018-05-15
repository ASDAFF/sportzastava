<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<div class="header-info-socials">
    <div class="intec-aligner"></div>
    <?if($arParams["HEADER_VK"]){?>
        <a target="_blank" href="<?=$arParams["HEADER_VK"]?>" class="header-info-social intec-cl-text-hover">
            <i class="glyph-icon-vk"></i>
        </a>
    <?}?>
    <?if($arParams["HEADER_FACEBOOK"]){?>
        <a target="_blank" href="<?=$arParams["HEADER_FACEBOOK"]?>" class="header-info-social intec-cl-text-hover">
            <i class="glyph-icon-facebook"></i>
        </a>
    <?}?>
    <?if($arParams["HEADER_INSTAGRAM"]){?>
        <a target="_blank" href="<?=$arParams["HEADER_INSTAGRAM"]?>" class="header-info-social intec-cl-text-hover">
            <i class="glyph-icon-instagram"></i>
        </a>
    <?}?>
    <?if($arParams["HEADER_TWITTER"]){?>
        <a target="_blank" href="<?=$arParams["HEADER_TWITTER"]?>" class="header-info-social intec-cl-text-hover">
            <i class="glyph-icon-twitter"></i>
        </a>
    <?}?>
</div>