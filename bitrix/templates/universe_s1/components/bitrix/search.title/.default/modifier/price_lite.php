<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;

$arConvertParams = array();
if ('Y' == $arParams['CONVERT_CURRENCY'])
{
    if (!CModule::IncludeModule('intec.startshop'))
    {
        $arParams['CONVERT_CURRENCY'] = 'N';
        $arParams['CURRENCY_ID'] = '';
    }
    else
    {
        $arCurrencyInfo = CStartShopCurrency::GetByID($arParams['CURRENCY_ID']);
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

$obParser = new CTextParser;

if (is_array($arParams["PRICE_CODE"])) {

    $dbArPrice = CStartShopPrice::GetList(array(), array('CODE'=> $arParams["PRICE_CODE"]));
    while ($arPrice = $dbArPrice->Fetch()) {
        $arResult["PRICES"][$arPrice['CODE']] = $arPrice;
    }
}
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
foreach ($arResult["PRICES"] as $price) {
    $arSelect[] = 'PROPERTY_STARTSHOP_PRICE_'.$price['ID'];
    $arSelect[] = 'PROPERTY_STARTSHOP_CURRENCY_'.$price['ID'];
}

$arFilter = array(
    "IBLOCK_LID" => SITE_ID,
    "IBLOCK_ACTIVE" => "Y",
    "ACTIVE_DATE" => "Y",
    "ACTIVE" => "Y",
    "CHECK_PERMISSIONS" => "Y",
    "MIN_PERMISSION" => "R",
);

$arFilter["=ID"] = $arResult["ELEMENTS"];
$arResult["ELEMENTS"] = array();
$rsElements = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
$arSectionID = array();

/*Получаем типы цен*/
$arUserGroups = explode(',', $USER->GetGroups());
$arPricesTypes = CStartShopUtil::DBResultToArray(CStartShopPrice::GetListByGroups($arUserGroups), 'ID');

if (is_array($arAvailablePricesTypes))
    foreach ($arPricesTypes as $iPriceTypeID => $arPriceType)
        if (!in_array($arPriceType['CODE'], $arParams["PRICE_CODE"]))
            unset($arPricesTypes[$iPriceTypeID]);
/**/

$propertyEnum = array();

while($arElement = $rsElements->Fetch())
{
    $arItem = array(
        "ID" => $arElement["ID"],
        "IBLOCK_ID" => $arElement["IBLOCK_ID"],
        "PREVIEW_TEXT" => $arElement["PREVIEW_TEXT"],
        "PREVIEW_PICTURE" => $arElement["PREVIEW_PICTURE"],
        "DETAIL_PICTURE" => $arElement["DETAIL_PICTURE"],
        'IBLOCK_SECTION_ID' => $arElement['IBLOCK_SECTION_ID']
    );
    $arItem['PROPERTIES'] = array();

    foreach ($arResult["PRICES"] as $price) {
        $arItem['PROPERTIES']['STARTSHOP_PRICE_'.$price['ID']] = array(
            'VALUE' => $arElement['PROPERTY_STARTSHOP_PRICE_'.$price['ID'].'_VALUE']
        );
        if (array_key_exists($arElement['PROPERTY_STARTSHOP_CURRENCY_'.$price['ID'].'_ENUM_ID'], $propertyEnum)) {
            $arItem['PROPERTIES']['STARTSHOP_CURRENCY_'.$price['ID']] = array(
                'VALUE_XML_ID' => $propertyEnum[$arElement['PROPERTY_STARTSHOP_CURRENCY_'.$price['ID'].'_ENUM_ID']]
            );
        } else {
            $property_enums = CIBlockPropertyEnum::GetList(
                array("DEF"=>"DESC", "SORT"=>"ASC"),
                array(
                    "IBLOCK_ID"=>$arResult["ELEMENTS"],
                    'ID'=> $arElement['PROPERTY_STARTSHOP_CURRENCY_'.$price['ID'].'_ENUM_ID']
                )
            );
            while($enum_fields = $property_enums->GetNext())
            {
                $propertyEnum[$arElement['PROPERTY_STARTSHOP_CURRENCY_'.$price['ID'].'_ENUM_ID']] = $enum_fields['XML_ID'];
            }
            $arItem['PROPERTIES']['STARTSHOP_CURRENCY_'.$price['ID']] = array(
                'VALUE_XML_ID' => $propertyEnum[$arElement['PROPERTY_STARTSHOP_CURRENCY_'.$price['ID'].'_ENUM_ID']]
            );
        }
        /**/
    }
    $arElement['PRICES'] = CStartShopToolsIBlock::GetPricesValues($arItem, $arPricesTypes);

    $arResult["ELEMENTS"][$arItem["ID"]] = $arElement;
}