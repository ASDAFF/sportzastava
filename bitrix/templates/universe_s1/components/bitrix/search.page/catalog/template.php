<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>
<? if($arParams["SHOW_TAGS_CLOUD"] == "Y") {
    $arCloudParams = Array(
        "SEARCH" => $arResult["REQUEST"]["~QUERY"],
        "TAGS" => $arResult["REQUEST"]["~TAGS"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
        "arrFILTER" => $arParams["arrFILTER"],
        "SORT" => $arParams["TAGS_SORT"],
        "PAGE_ELEMENTS" => $arParams["TAGS_PAGE_ELEMENTS"],
        "PERIOD" => $arParams["TAGS_PERIOD"],
        "URL_SEARCH" => $arParams["TAGS_URL_SEARCH"],
        "TAGS_INHERIT" => $arParams["TAGS_INHERIT"],
        "FONT_MAX" => $arParams["FONT_MAX"],
        "FONT_MIN" => $arParams["FONT_MIN"],
        "COLOR_NEW" => $arParams["COLOR_NEW"],
        "COLOR_OLD" => $arParams["COLOR_OLD"],
        "PERIOD_NEW_TAGS" => $arParams["PERIOD_NEW_TAGS"],
        "SHOW_CHAIN" => "N",
        "COLOR_TYPE" => $arParams["COLOR_TYPE"],
        "WIDTH" => $arParams["WIDTH"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "RESTART" => $arParams["RESTART"],
    );

    if(is_array($arCloudParams["arrFILTER"]))
    {
        foreach($arCloudParams["arrFILTER"] as $strFILTER)
        {
            if($strFILTER=="main")
            {
                $arCloudParams["arrFILTER_main"] = $arParams["arrFILTER_main"];
            }
            elseif($strFILTER=="forum" && IsModuleInstalled("forum"))
            {
                $arCloudParams["arrFILTER_forum"] = $arParams["arrFILTER_forum"];
            }
            elseif(strpos($strFILTER,"iblock_")===0)
            {
                foreach($arParams["arrFILTER_".$strFILTER] as $strIBlock)
                    $arCloudParams["arrFILTER_".$strFILTER] = $arParams["arrFILTER_".$strFILTER];
            }
            elseif($strFILTER=="blog")
            {
                $arCloudParams["arrFILTER_blog"] = $arParams["arrFILTER_blog"];
            }
            elseif($strFILTER=="socialnetwork")
            {
                $arCloudParams["arrFILTER_socialnetwork"] = $arParams["arrFILTER_socialnetwork"];
            }
        }
    }
    $APPLICATION->IncludeComponent("bitrix:search.tags.cloud", ".default", $arCloudParams, $component, array("HIDE_ICONS" => "Y"));
}
    ?>
<div class="intec-search-page">
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
</div>

