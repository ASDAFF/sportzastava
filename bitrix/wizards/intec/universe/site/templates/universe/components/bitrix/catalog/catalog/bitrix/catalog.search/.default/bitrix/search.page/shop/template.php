<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div class="search-page">
    <form action="" method="get">
        <input type="hidden" name="tags" value="<?=$arResult["REQUEST"]["TAGS"]?>" />
        <input type="hidden" name="how" value="<?=$arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
        <table class="search-form">
            <tbody><tr>
                <td class="search-form-input">
                    <?if($arParams["USE_SUGGEST"] === "Y"):
                        if(strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"]))
                        {
                            $arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
                            $obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
                            $obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
                        }
                        ?>
                        <?$APPLICATION->IncludeComponent(
                        "bitrix:search.suggest.input",
                        "",
                        array(
                            "NAME" => "q",
                            "VALUE" => $arResult["REQUEST"]["~QUERY"],
                            "INPUT_SIZE" => -1,
                            "DROPDOWN_SIZE" => 10,
                            "FILTER_MD5" => $arResult["FILTER_MD5"],
                        ),
                        $component, array("HIDE_ICONS" => "Y")
                    );?>
                    <?else:?>
                        <input class="search-query" type="text" placeholder="<?=GetMessage('CT_PLACEHOLDER')?>" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" />
                    <?endif;?>
                </td>
                <td  class="search-form-button">
                    <button class="search-button intec-button intec-button-w-icon intec-button-cl-common intec-cl-background intec-cl-border" type="submit" value="<?echo GetMessage("CT_BSP_GO")?>">
                        <i class="intec-button-icon glyph-icon-loop" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody></table>
    </form>
<br />

<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
	?>
	<div class="search-language-guess">
		<?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
	</div><br /><?
endif;?>
</div>