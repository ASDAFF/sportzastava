<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Loader;

if(Loader::includeModule("intec.startshop"))
{
    //Prices List
    $arPricesTypes = array();
    $dbPricesTypes = CStartShopPrice::GetList(array('SORT' => 'ASC'), array('ACTIVE'=>'Y'));

    while ($arPriceType = $dbPricesTypes->Fetch())
        $arPricesTypes[$arPriceType['CODE']] = '['.$arPriceType['CODE'].'] '.$arPriceType['LANG'][LANGUAGE_ID]['NAME'];

    unset($dbPricesTypes, $arPriceType);

    $arTemplateParameters["PRICE_CODE"] = array(
        "PARENT" => "PRICES",
        "NAME" => GetMessage("TP_BST_PRICE_CODE"),
        "TYPE" => "LIST",
        "MULTIPLE" => "Y",
        "VALUES" => $arPricesTypes
    );


    $arTemplateParameters['CONVERT_CURRENCY'] = array(
        'PARENT' => 'PRICES',
        'NAME' => GetMessage('TP_BST_CONVERT_CURRENCY'),
        'TYPE' => 'CHECKBOX',
        'DEFAULT' => 'N',
        'REFRESH' => 'Y',
    );

    if (isset($arCurrentValues['CONVERT_CURRENCY']) && 'Y' == $arCurrentValues['CONVERT_CURRENCY'])
    {
        $arCurrencies = array();
        $dbCurrencies = CStartShopCurrency::GetList();

        while ($arCurrency = $dbCurrencies->Fetch())
            $arCurrencies[$arCurrency['CODE']] = '['.$arCurrency['CODE'].'] '.$arCurrency['LANG'][LANGUAGE_ID]['NAME'];

        $baseCurrency = CStartShopCurrency::GetBase()->Fetch();

        unset($dbCurrencies, $arCurrency);
        $arTemplateParameters['CURRENCY_ID'] = array(
            'PARENT' => 'PRICES',
            'NAME' => GetMessage('TP_BST_CURRENCY_ID'),
            'TYPE' => 'LIST',
            'VALUES' => $arCurrencies,
            'DEFAULT' => $baseCurrency['CODE'],
            "ADDITIONAL_VALUES" => "Y",
        );
    }
}