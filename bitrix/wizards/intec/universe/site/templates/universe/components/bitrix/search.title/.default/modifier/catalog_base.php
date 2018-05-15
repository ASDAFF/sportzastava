<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;

if (CModule::IncludeModule("catalog"))
{
    $rsCatalog = CCatalog::GetList(array(
        "sort" => "asc",
    ));
    while ($ar = $rsCatalog->Fetch())
    {
        if ($ar["PRODUCT_IBLOCK_ID"])
            $arCatalogs[$ar["PRODUCT_IBLOCK_ID"]] = 1;
        else
            $arCatalogs[$ar["IBLOCK_ID"]] = 1;
    }
}