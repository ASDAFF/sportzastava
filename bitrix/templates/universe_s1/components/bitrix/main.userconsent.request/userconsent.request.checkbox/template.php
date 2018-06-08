<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
$config = \Bitrix\Main\Web\Json::encode($arResult['CONFIG']);
?>
<label data-bx-user-consent="<?=htmlspecialcharsbx($config)?>" class="main-user-consent-request">
	<input type="checkbox" style="display: unset" value="Y" <?=($arParams['IS_CHECKED'] ? 'checked' : '')?> name="<?=htmlspecialcharsbx($arParams['INPUT_NAME'])?>">
	<a><?=htmlspecialcharsbx($arResult['INPUT_LABEL'])?></a>
</label>