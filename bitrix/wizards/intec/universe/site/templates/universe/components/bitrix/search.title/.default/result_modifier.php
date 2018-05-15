<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;

global $USER;

$PREVIEW_WIDTH = 65;
if ($PREVIEW_WIDTH <= 0)
    $PREVIEW_WIDTH = 75;

$PREVIEW_HEIGHT = 65;
if ($PREVIEW_HEIGHT <= 0)
    $PREVIEW_HEIGHT = 75;

$arParams["PRICE_VAT_INCLUDE"] = $arParams["PRICE_VAT_INCLUDE"] !== "N";

$arCatalogs = false;

$arResult["ELEMENTS"] = array();
$arResult["SEARCH"] = array();
foreach($arResult["CATEGORIES"] as $category_id => $arCategory)
{
    foreach($arCategory["ITEMS"] as $i => $arItem)
    {
        if(isset($arItem["ITEM_ID"]))
        {
            $arResult["SEARCH"][] = &$arResult["CATEGORIES"][$category_id]["ITEMS"][$i];
            if ($arItem["MODULE_ID"] == "iblock"
                && substr($arItem["ITEM_ID"], 0, 1) !== "S")
            {
                if ($arCatalogs === false)
                {
                    $arCatalogs = array();
                    if (Loader::includeModule('catalog')) {
                        include('modifier/catalog_base.php');
                    } elseif (Loader::includeModule('intec.startshop')) {
                        include('modifier/catalog_lite.php');
                    }
                }

                if (array_key_exists($arItem["PARAM2"], $arCatalogs))
                {
                    $arResult["ELEMENTS"][$arItem["ITEM_ID"]] = $arItem["ITEM_ID"];
                }
            }
        }
    }
}

if (!empty($arResult["ELEMENTS"]) && CModule::IncludeModule("iblock"))
{
    if (Loader::includeModule('catalog')) {
        include('modifier/price_base.php');
    } elseif (Loader::includeModule('intec.startshop')) {
        include('modifier/price_lite.php');
    }
}

foreach($arResult["SEARCH"] as $i=>$arItem)
{
    switch($arItem["MODULE_ID"])
    {
        case "iblock":
            if(array_key_exists($arItem["ITEM_ID"], $arResult["ELEMENTS"]))
            {
                $arElement = &$arResult["ELEMENTS"][$arItem["ITEM_ID"]];

                    if ($arElement["PREVIEW_PICTURE"] > 0)
                        $arElement["PICTURE"] = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"], array("width"=>$PREVIEW_WIDTH, "height"=>$PREVIEW_HEIGHT), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    elseif ($arElement["DETAIL_PICTURE"] > 0)
                        $arElement["PICTURE"] = CFile::ResizeImageGet($arElement["DETAIL_PICTURE"], array("width"=>$PREVIEW_WIDTH, "height"=>$PREVIEW_HEIGHT), BX_RESIZE_IMAGE_PROPORTIONAL, true);

            }
            break;
    }

    $arResult["SEARCH"][$i]["ICON"] = true;
}

if (!empty($arSectionID)) {
    $obSection = CIBlockSection::GetList(
        array(),
        array(
            "ID" =>$arSectionID
        )
    );
    $arSectionEl = array();
    while($arSection = $obSection->Fetch()) {
        $arSectionEl[$arSection['ID']] = $arSection['NAME'];
    }
    foreach ($arResult["ELEMENTS"] as $key=>$element) {
        if (!empty($element['IBLOCK_SECTION_ID'])) {
            $arResult["ELEMENTS"][$key]['SECTION_NAME'] = $arSectionEl[$element['IBLOCK_SECTION_ID']];
        }
    }
}




