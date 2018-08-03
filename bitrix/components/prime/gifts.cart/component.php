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


if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 300;

$arParams["ACTIVE_DATE_FORMAT"] = trim($arParams["ACTIVE_DATE_FORMAT"]);
if(strlen($arParams["ACTIVE_DATE_FORMAT"])<=0)
	$arParams["ACTIVE_DATE_FORMAT"] = $DB->DateFormatToPHP(CSite::GetDateFormat("SHORT"));



$basket = \Bitrix\Sale\Basket::loadItemsForFUser(
	\Bitrix\Sale\Fuser::getId(),
	\Bitrix\Main\Context::getCurrent()->getSite()
);

if($price = $basket->getPrice()){

	$arResult = array();

	$arResult['USER_ID'] = Fuser::getId();
	$arResult['SITE_ID'] = SITE_ID;

	$arResult['SUM_FROM'] = $price;

	CModule::IncludeModule("prime.gifts");
	$Gifts = new Gifts();

	$gResult = $Gifts->GetPeriodGifts($price);
	while ($row = $gResult->Fetch())
	{
		$arResult['ITEM'][$row['ID']] = $row;
		$arResult['ITEM'][$row['ID']]['SRC'] = CFile::GetPath($row['IMAGE_ID']);
		$arResult['ITEM'][$row['ID']]['SID'] = array_keys(unserialize(htmlspecialchars_decode($row['SID'])));
	}

	$gResultMax = $Gifts->GetMaxGifts($price);
	while ($rowMax = $gResultMax->Fetch())
	{
		$arResult['ITEM_MAX'][$rowMax['ID']] = $rowMax;
		$arResult['ITEM_MAX'][$rowMax['ID']]['SRC'] = CFile::GetPath($rowMax['IMAGE_ID']);
		$arResult['ITEM_MAX'][$rowMax['ID']]['SID'] = array_keys(unserialize(htmlspecialchars_decode($rowMax['SID'])));

		$arResult['SUM_TO'] = $rowMax['PRICE_FROM'];
	}
	$arResult['SUM_ADD'] = $arResult['SUM_TO'] - $arResult['SUM_FROM'];

	if($arResult['ITEM'])
	$this->includeComponentTemplate();

}


