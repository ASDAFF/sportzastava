<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;

if (CModule::IncludeModule("intec.startshop"))
{
    $rsCatalog = CStartShopCatalog::GetList(array(), array());
    while ($ar = $rsCatalog->Fetch())
    {
        if ($ar["IBLOCK"])
            $arCatalogs[$ar["IBLOCK"]] = 1;
        else
            $arCatalogs[$ar["IBLOCK_ID"]] = 1;
    }
}