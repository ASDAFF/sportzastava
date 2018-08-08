<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

use Bitrix\Main\Loader,
	Bitrix\Main,
	Bitrix\Sale,
	Bitrix\Sale\Fuser,
	Bitrix\Iblock;




$basket = \Bitrix\Sale\Basket::loadItemsForFUser(
	\Bitrix\Sale\Fuser::getId(),
	\Bitrix\Main\Context::getCurrent()->getSite()
);


if($price = $basket->getPrice()){

	$arResult = array();

	CModule::IncludeModule("prime.gifts");
	$Gifts = new Gifts();

	$gResultMax = $Gifts->getSettingsMorePrice($price);
	if($rowMax = $gResultMax->Fetch())
	{
		$price = $rowMax['PRICE_FROM'] - $price;
	}


	$gResult = $Gifts->getSettings();
	while ($row = $gResult->Fetch())
	{
		$arResult[$row['NAME']] = str_replace("#PRICE#",CurrencyFormat($price,"RUB"),$row['VALUE']);

		if($row['NAME'] == 'IMAGE_ID')
		$arResult['SRC'] = CFile::GetPath($row['VALUE']);
	}

	if($arResult)
	$this->includeComponentTemplate();

}


