<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);

?>
<div class="bx-filter <?=$templateData["TEMPLATE_CLASS"]?> <?if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL") echo "bx-filter-horizontal"?>">
    <div class="container-fluid">
        <div class="row">
            <div class="body-filter-m-click <?if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL"):?>col-sm-6 col-md-4<?else:?>col-lg-12<?endif?> bx-filter-title header-filter">
                <span><?echo GetMessage("CT_BCSF_FILTER_TITLE")?></span>
                <i data-role="prop_angle" class="fa-right-head fa fa-angle-up"></i>
            </div>
        </div>
        <form class="body-filter" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
            <?foreach($arResult["HIDDEN"] as $arItem):?>
                <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"].'_m'?>" value="<?echo $arItem["HTML_VALUE"]?>" />
            <?endforeach;?>
            <div class="row">
                <?foreach($arResult["ITEMS"] as $key=>$arItem){
                    $max_price_from_js = $arItem["VALUES"]["MAX"]['HTML_VALUE'];
                    $min_price_from_js = $arItem["VALUES"]["MIN"]['HTML_VALUE'];
                    $key = $arItem["ENCODED_ID"]+time();
                    if(isset($arItem["PRICE"])):
                        if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
                            continue;
                        $precision = 2;
                        if (Bitrix\Main\Loader::includeModule("currency"))
                        {
                            $res = CCurrencyLang::GetFormatDescription($arItem["VALUES"]["MIN"]["CURRENCY"]);
                            $precision = $res['DECIMALS'];
                        }
                        ?>
                        <div class="<?if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL"):?>col-sm-6 col-md-4<?else:?>col-lg-12<?endif?> bx-filter-parameters-box <?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>bx-active<?endif?>">
                            <span class="bx-filter-container-modef"></span>
                            <div class="bx-filter-parameters-box-title" onclick="smartFilterM.hideFilterProps(this)">
                                <i data-role="prop_angle" class="fa-left-element-filter fa fa-angle-<?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>up<?else:?>down<?endif?>"></i>
                                <span><?= GetMessage('CT_BCSF_FILTER_NAME_PRICE')?> </span>
                            </div>
                            <div class="bx-filter-block" data-role="bx_filter_block">
                                <div class="row bx-filter-parameters-box-container price-filter-padding-left">
                                    <div class="col-xs-11 bx-ui-slider-track-container">
                                        <div class="bx-ui-slider-track" id="drag_track_m_<?=$key?>">
                                            <?$precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;?>
                                            <div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;" id="colorUnavailableActive_m_<?=$key?>"></div>
                                            <div class="bx-ui-slider-pricebar-vn" style="left: 0;right: 0;" id="colorAvailableInactive_m_<?=$key?>"></div>
                                            <div class="bx-ui-slider-pricebar-v intec-cl-background intec-cl-border"  style="left: 0;right: 0;" id="colorAvailableActive_m_<?=$key?>"></div>
                                            <div class="bx-ui-slider-range" id="drag_tracker_m_<?=$key?>"  style="left: 0%; right: 0%;">
                                                <a class="bx-ui-slider-handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_m_<?=$key?>"></a>
                                                <a class="bx-ui-slider-handle right" style="right:0;" href="javascript:void(0)" id="right_slider_m_<?=$key?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 bx-filter-parameters-box-container-block bx-left">

                                        <div class="bx-filter-input-container">
                                            <div class="row">
                                                <div class="col-xs-3"><label class="filter-price"><?=GetMessage('CT_BCSF_FILTER_FROM')?></label></div>
                                                <div class="col-xs-9"><input
                                                            class="max-price" style="border:none"
                                                            type="text"
                                                            name="<?= $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                                                            id="<?= $arItem["VALUES"]["MIN"]["CONTROL_ID"].'_m'?>"
                                                            value="<?= $min_price_from_js?($min_price_from_js):'0'?>"
                                                            size="5"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 bx-filter-parameters-box-container-block bx-right">

                                        <div class="bx-filter-input-container">
                                            <div class="row">
                                                <div class="col-xs-3"><label class="filter-price"><?=GetMessage('CT_BCSF_FILTER_TO')?></label></div>
                                                <div class="col-xs-9"><input
                                                            class="max-price" style="border:none"
                                                            type="text"
                                                            name="<?= $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                                                            id="<?= $arItem["VALUES"]["MAX"]["CONTROL_ID"].'_m'?>"
                                                            value="<?= $max_price_from_js?($max_price_from_js):(int)$arItem["VALUES"]["MAX"]['VALUE']?>"
                                                    />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?$arJsParams = array(
                        "leftSlider" => 'left_slider_m_'.$key,
                        "rightSlider" => 'right_slider_m_'.$key,
                        "tracker" => "drag_tracker_m_".$key,
                        "trackerWrap" => "drag_track_m_".$key,
                        "minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"].'_m',
                        "maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"].'_m',
                        "minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
                        "maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
                        "curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
                        "curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
                        "fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
                        "fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
                        "precision" => $precision,
                        "colorUnavailableActive" => 'colorUnavailableActive_m_'.$key,
                        "colorAvailableActive" => 'colorAvailableActive_m_'.$key,
                        "colorAvailableInactive" => 'colorAvailableInactive_m_'.$key,
                    );?>
                        <script type="text/javascript">
                            BX.ready(function(){
                                window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilterM(<?=CUtil::PhpToJSObject($arJsParams)?>);
                            });
                        </script>
                    <?endif;
                }
                foreach($arResult["ITEMS"] as $key=>$arItem){
                    if(empty($arItem["VALUES"]) || isset($arItem["PRICE"]))
                        continue;
                    if ($arItem["DISPLAY_TYPE"] == "A" && ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0))
                        continue;?>
                    <div class="<?if ($arParams["FILTER_VIEW_MODE"] == "HORIZONTAL"):?>col-sm-6 col-md-4<?else:?>col-lg-12<?endif?> bx-filter-parameters-box <?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>bx-active<?endif?>">
                        <span class="bx-filter-container-modef"></span>
                        <div class="bx-filter-parameters-box-title" onclick="smartFilterM.hideFilterProps(this)">
							<span class="bx-filter-parameters-box-hint"><i data-role="prop_angle" class="fa-left-element-filter fa fa-angle-<?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>up<?else:?>down<?endif?>"></i>
                                <?=$arItem["NAME"]?>
                            </span>
                        </div>
                        <div class="bx-filter-block" data-role="bx_filter_block">
                            <div class="bx-filter-parameters-box-container <?=($arItem["DISPLAY_TYPE"]=='A')?' row price-filter-padding-left':''?>">
                                <?
                                $arCur = current($arItem["VALUES"]);
                                switch ($arItem["DISPLAY_TYPE"]){
                                    case "A":
                                        $max_price_from_js = $arItem["VALUES"]["MAX"]['HTML_VALUE'];
                                        $min_price_from_js = $arItem["VALUES"]["MIN"]['HTML_VALUE'];
                                        ?>
                                        <div class="col-xs-11 bx-ui-slider-track-container">
                                            <div class="bx-ui-slider-track" id="drag_track_m_<?=$key?>">
                                                <?$precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;?>
                                                <div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;" id="colorUnavailableActive_m_<?=$key?>"></div>
                                                <div class="bx-ui-slider-pricebar-vn" style="left: 0;right: 0;" id="colorAvailableInactive_m_<?=$key?>"></div>
                                                <div class="bx-ui-slider-pricebar-v intec-cl-background intec-cl-border"  style="left: 0;right: 0;" id="colorAvailableActive_m_<?=$key?>"></div>
                                                <div class="bx-ui-slider-range" id="drag_tracker_m_<?=$key?>"  style="left: 0%; right: 0%;">
                                                    <a class="bx-ui-slider-handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_m_<?=$key?>"></a>
                                                    <a class="bx-ui-slider-handle right" style="right:0;" href="javascript:void(0)" id="right_slider_m_<?=$key?>"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 bx-filter-parameters-box-container-block bx-left">
                                            <div class="bx-filter-input-container">
                                                <div class="row">
                                                    <div class="col-xs-3"><label class="filter-price"><?=GetMessage('CT_BCSF_FILTER_FROM')?></label></div>
                                                    <div class="col-xs-9"><input
                                                        class="max-price" style="border:none"
                                                        type="text"
                                                        name="<?= $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                                                        id="<?= $arItem["VALUES"]["MIN"]["CONTROL_ID"].'_m'?>"
                                                        value="<?= $min_price_from_js?($min_price_from_js):'0'?>"
                                                        size="5"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 bx-filter-parameters-box-container-block bx-right">
                                            <div class="bx-filter-input-container">
                                                <div class="row">
                                                    <div class="col-xs-3"><label class="filter-price"><?=GetMessage('CT_BCSF_FILTER_TO')?></label></div>
                                                    <div class="col-xs-9"><input
                                                                class="max-price" style="border:none"
                                                                type="text"
                                                                name="<?= $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                                                                id="<?= $arItem["VALUES"]["MAX"]["CONTROL_ID"].'_m'?>"
                                                                value="<?= $max_price_from_js?($max_price_from_js):(int)$arItem["VALUES"]["MAX"]['VALUE']?>"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?$arJsParams = array(
                                            "leftSlider" => 'left_slider_m_'.$key,
                                            "rightSlider" => 'right_slider_m_'.$key,
                                            "tracker" => "drag_tracker_m_".$key,
                                            "trackerWrap" => "drag_track_m_".$key,
                                            "minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"].'_m',
                                            "maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"].'_m',
                                            "minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
                                            "maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
                                            "curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
                                            "curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
                                            "fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
                                            "fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
                                            "precision" => $precision,
                                            "colorUnavailableActive" => 'colorUnavailableActive_m_'.$key,
                                            "colorAvailableActive" => 'colorAvailableActive_m_'.$key,
                                            "colorAvailableInactive" => 'colorAvailableInactive_m_'.$key,
                                        );?>
                                        <script type="text/javascript">
                                            BX.ready(function(){
                                                window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilterM(<?=CUtil::PhpToJSObject($arJsParams)?>);
                                            });
                                        </script>
                                        <?break;
                                    case "G"://CHECKBOXES_WITH_PICTURES
                                        ?>
                                    <div class="bx-filter-select-container">
                                        <div class="bx-filter-select-block">
                                            <?foreach ($arItem["VALUES"] as $val => $ar):?>
                                                <input
                                                        class="flag-color"
                                                        style="display: none"
                                                        type="checkbox"
                                                        name="<?=$ar["CONTROL_NAME"]?>"
                                                        id="<?=$ar["CONTROL_ID"].'_m'?>"
                                                        value="<?=$ar["HTML_VALUE"]?>"
                                                    <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                                />
                                                <?
                                                $class = "";
                                                if ($ar["CHECKED"])
                                                    $class.= " bx-active";
                                                if ($ar["DISABLED"])
                                                    $class.= " disabled";
                                                ?>
                                                <label for="<?=$ar["CONTROL_ID"].'_m'?>" data-role="label_<?=$ar["CONTROL_ID"].'_m'?>" class="bx-filter-param-label <?=$class?>" onclick="smartFilterM.keyup(BX('<?=CUtil::JSEscape($ar["CONTROL_ID"].'_m')?>')); BX.toggleClass(this, 'bx-active');">
                                                        <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                                                            <span class="bx-filter-btn-color-icon <? echo $ar["CHECKED"]? 'glyph-icon-check': '' ?>" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');"></span>
                                                        <?endif?>
                                                </label>
                                            <?endforeach?>
                                        </div>
                                    </div>
                                        <?
                                        break;
                                    case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS?>
                                        <div class="bx-filter-select-container">
                                            <div class="bx-filter-select-block">
                                                <?foreach ($arItem["VALUES"] as $val => $ar):?>
                                                    <?//print_r($arItem["VALUES"]);?>
                                                    <label for="<?=$ar["CONTROL_ID"].'_m'?>" data-role="label_<?=$ar["CONTROL_ID"].'_m'?>"
                                                           class="bx-filter-param-label<?=$class?>  <? echo $ar["CHECKED"]? 'label-checked': '' ?>">
                                                        <input
                                                                class="radio-color"
                                                                style="display: none"
                                                                type="radio"
                                                                name="<?=$ar["CONTROL_NAME_ALT"]?>"
                                                                id="<?=$ar["CONTROL_ID"].'_m'?>"
                                                                value="<?=$ar["HTML_VALUE_ALT"]?>"
                                                            <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                                                onclick="smartFilterM.click(this);"
                                                        />
                                                        <?if (isset($ar["FILE"]) && !empty($ar["FILE"]["SRC"])):?>
                                                            <span id="<?=$ar["CONTROL_ID"].'_m'?>" class="bx-filter-btn-color-icon <? echo $ar["CHECKED"]? 'glyph-icon-check': '' ?>" style="background-image:url('<?=$ar["FILE"]["SRC"]?>');" ></span>
                                                        <?endif?>
                                                    </label>
                                                <?endforeach?>
                                            </div>
                                        </div>
                                        <?break;
                                    default://CHECKBOXES?>
                                        <?if($arItem["CODE"] == 'BRAND' ):?>
                                            <div class="brand">
                                                <?foreach($arItem["VALUES"] as $val => $ar):?>
                                                    <div class="checkbox">
                                                        <label data-role="label_<?=$ar["CONTROL_ID"].'_m'?>" class="bx-filter-param-label <? echo $ar["DISABLED"] ? 'disabled': '' ?>" for="<? echo $ar["CONTROL_ID"].'_m' ?>">
                                                            <input
                                                                    type="checkbox"
                                                                    value="<? echo $ar["HTML_VALUE"] ?>"
                                                                    name="<? echo $ar["CONTROL_NAME"] ?>"
                                                                    id="<? echo $ar["CONTROL_ID"].'_m' ?>"
                                                                <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                                                    onclick="smartFilterM.click(this);ClickChecked(this);"
                                                            />
                                                            <span class="bx-filter-param-text"><?=$ar["VALUE"];?><?
                                                                if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
                                                                    ?>&nbsp;(<span data-role="count_<?=$ar["CONTROL_ID"].'_m'?>" ><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
                                                                endif;?>
                                                    </span>
                                                        </label>
                                                    </div>
                                                <?endforeach;?>
                                            </div>
                                        <?else:?>
                                            <?foreach($arItem["VALUES"] as $val => $ar):?>
                                                <div class="checkbox">
                                                    <label data-role="label_<?=$ar["CONTROL_ID"].'_m'?>" class="bx-filter-param-label <? echo $ar["DISABLED"] ? 'disabled': '' ?>" for="<? echo $ar["CONTROL_ID"].'_m' ?>">
                                                        <span class="bx-filter-input-checkbox">
                                                            <input
                                                                    type="checkbox"
                                                                    value="<? echo $ar["HTML_VALUE"] ?>"
                                                                    name="<? echo $ar["CONTROL_NAME"] ?>"
                                                                    id="<? echo $ar["CONTROL_ID"].'_m' ?>"
                                                                <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                                                    onclick="smartFilterM.click(this);"
                                                            />
                                                            <span class="bx-filter-param-text" ><?=$ar["VALUE"];?><?
                                                                if ($arParams["DISPLAY_ELEMENT_COUNT"] !== "N" && isset($ar["ELEMENT_COUNT"])):
                                                                    ?>&nbsp;(<span data-role="count_<?=$ar["CONTROL_ID"].'_m'?>" ><? echo $ar["ELEMENT_COUNT"]; ?></span>)<?
                                                                endif;?></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            <?endforeach;?>
                                        <?endif;?>
                                    <?}?>
                            </div>
                            <div style="clear: both"></div>
                        </div>
                    </div>
                <?}?>
            </div>
            <div class="row">
                <div class="col-xs-12 bx-filter-button-box">
                    <div class="bx-filter-block">
                        <div class="bx-filter-parameters-box-container" id="button-filter">
                            <input
                                    class="intec-button intec-button-s-6 intec-button-r-3 intec-button-cl-common"
                                    type="submit"
                                    id="set_filter_m"
                                    name="set_filter"
                                    value="<?=GetMessage("CT_BCSF_SET_FILTER")?>"
                            />
                            <input
                                    class="intec-button intec-button-s-6 intec-button-r-3 intec-button-cl-common intec-button-transparent"
                                    type="submit"
                                    id="del_filter_m"
                                    name="del_filter"
                                    value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>"
                            />

                            <div class="bx-filter-popup-result right" id="modef" style="display: inline-block; display: none;">
                                <div class='selected-text'><span class="arrow-right"></span><p class="popup-result-number"><?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span></p>'));?>
                                        <a type="button" style="float: right" class="btn-bt-reset" href="<?echo $arResult["FILTER_URL"]?>" target=""><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clb"></div>
        </form>
    </div>
</div>
<script>
    var smartFilterM = new JCSmartFilterM('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);

</script>