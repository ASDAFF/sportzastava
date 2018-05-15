<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;

$arConvertParams = array();
if ('Y' == $arParams['CONVERT_CURRENCY'])
{
    if (!CModule::IncludeModule('currency'))
    {
        $arParams['CONVERT_CURRENCY'] = 'N';
        $arParams['CURRENCY_ID'] = '';
    }
    else
    {
        $arCurrencyInfo = CCurrency::GetByID($arParams['CURRENCY_ID']);
        if (!(is_array($arCurrencyInfo) && !empty($arCurrencyInfo)))
        {
            $arParams['CONVERT_CURRENCY'] = 'N';
            $arParams['CURRENCY_ID'] = '';
        }
        else
        {
            $arParams['CURRENCY_ID'] = $arCurrencyInfo['CURRENCY'];
            $arConvertParams['CURRENCY_ID'] = $arCurrencyInfo['CURRENCY'];
        }
    }
}

$useCatalogTab = (string)\Bitrix\Main\Config\Option::get('catalog', 'show_catalog_tab_with_offers') == 'Y';

$obParser = new CTextParser;

if (is_array($arParams["PRICE_CODE"]))
    $arResult["PRICES"] = CIBlockPriceTools::GetCatalogPrices(0, $arParams["PRICE_CODE"]);
else
    $arResult["PRICES"] = array();

$arSelect = array(
    "ID",
    "IBLOCK_ID",
    "PREVIEW_TEXT",
    "PREVIEW_PICTURE",
    "DETAIL_PICTURE",
    'IBLOCK_SECTION_ID'
);
$arFilter = array(
    "IBLOCK_LID" => SITE_ID,
    "IBLOCK_ACTIVE" => "Y",
    "ACTIVE_DATE" => "Y",
    "ACTIVE" => "Y",
    "CHECK_PERMISSIONS" => "Y",
    "MIN_PERMISSION" => "R",
);
foreach($arResult["PRICES"] as $value)
{
    if (!$value['CAN_VIEW'] && !$value['CAN_BUY'])
        continue;
    $arSelect[] = $value["SELECT"];
    $arFilter["CATALOG_SHOP_QUANTITY_".$value["ID"]] = 1;
}
$arFilter["=ID"] = $arResult["ELEMENTS"];
$arResult["ELEMENTS"] = array();
$rsElements = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
$arSectionID = array();
while($arElement = $rsElements->Fetch())
{
    $arElement["PRICES"] = array();
    if ($arElement["CATALOG_TYPE"] != \Bitrix\Catalog\ProductTable::TYPE_SKU || $useCatalogTab)
        $arElement["PRICES"] = CIBlockPriceTools::GetItemPrices($arElement["IBLOCK_ID"], $arResult["PRICES"], $arElement, $arParams['PRICE_VAT_INCLUDE'], $arConvertParams);
    if($arParams["PREVIEW_TRUNCATE_LEN"] > 0)
        $arElement["PREVIEW_TEXT"] = $obParser->html_cut($arElement["PREVIEW_TEXT"], $arParams["PREVIEW_TRUNCATE_LEN"]);
    $arSectionID[] = $arElement['IBLOCK_SECTION_ID'];
    $arResult["ELEMENTS"][$arElement["ID"]] = $arElement;
}