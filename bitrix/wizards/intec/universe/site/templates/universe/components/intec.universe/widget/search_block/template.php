<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 */

$this->setFrameMode(true);?>
<div class="intec-content">
    <div class="intec-content-wrapper">
        <div class="search_block-widget clearfix">
            <div class="col-1 col">
                <div class="search-img">

                </div>
                <div class="title-search">
                    <?=$arParams["TITLE_SEARCH"]?>
                </div>
            </div>
            <div class="col-2 col">
                <form action=" <?=$arParams["PAGE_SEARCH"]?>" method="GET">
                    <div class="search">
                        <input name="q" type="text" placeholder="<?=GetMessage("SEARCH_BLOCK_SEARCH");?>">
                        <button class="glyph-icon-loop intec-cl-text"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>