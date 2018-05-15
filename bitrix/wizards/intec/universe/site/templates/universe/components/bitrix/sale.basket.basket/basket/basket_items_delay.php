<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixBasketComponent $component
 */

?>
<b><?= GetMessage('SALE_OTLOG_TITLE') ?></b>
<br/><br/>

<table class="sale_basket_basket data-table">
	<tr>
		<?php
		if (in_array('NAME', $arParams['COLUMNS_LIST'])) { ?>
			<th align="center"><?= GetMessage('SALE_NAME')?></th>
		<?php }

		if (in_array('PROPS', $arParams['COLUMNS_LIST'])) { ?>
			<th align="center"><?= GetMessage('SALE_PROPS')?></th>
		<?php }

		if (in_array('PRICE', $arParams['COLUMNS_LIST'])) { ?>
			<th align="center"><?= GetMessage('SALE_PRICE')?></th>
		<?php }

		if (in_array('TYPE', $arParams['COLUMNS_LIST'])) { ?>
			<th align="center"><?= GetMessage('SALE_PRICE_TYPE')?></th>
		<?php }

		if (in_array('QUANTITY', $arParams['COLUMNS_LIST'])) { ?>
			<th align="center"><?= GetMessage('SALE_QUANTITY')?></th>
		<?php }

		if (in_array('DELETE', $arParams['COLUMNS_LIST'])) { ?>
			<th align="center"><?= GetMessage('SALE_DELETE')?></th>
		<?php }

		if (in_array('DELAY', $arParams['COLUMNS_LIST'])) { ?>
			<th align="center"><?= GetMessage('SALE_OTLOG')?></th>
		<?php }

		if (in_array('WEIGHT', $arParams['COLUMNS_LIST'])) { ?>
			<th align="center"><?= GetMessage('SALE_WEIGHT')?></th>
		<?php } ?>
	</tr>
	<?php foreach($arResult['ITEMS']['DelDelCanBuy'] as $arBasketItems) { ?>
		<tr>
			<?php if (in_array('NAME', $arParams['COLUMNS_LIST'])) { ?>
				<td>
					<?php if (strlen($arBasketItems['DETAIL_PAGE_URL']) > 0) { ?>
						<a href="<?= $arBasketItems['DETAIL_PAGE_URL'] ?>">
					<?php } ?>
						<b><?= $arBasketItems['NAME'] ?></b>
					<?php if (strlen($arBasketItems['DETAIL_PAGE_URL']) > 0) { ?>
						</a>
					<?php } ?>
				</td>
			<?php }

			if (in_array('PROPS', $arParams['COLUMNS_LIST'])) { ?>
				<td>
					<?php foreach($arBasketItems['PROPS'] as $val) {
						echo $val['NAME'] .': '. $val['VALUE'] .'<br />';
					} ?>
				</td>
			<?php }

			if (in_array('PRICE', $arParams['COLUMNS_LIST'])) { ?>
				<td align="right"><?= $arBasketItems['PRICE_FORMATED'] ?></td>
			<?php }

			if (in_array('TYPE', $arParams['COLUMNS_LIST'])) { ?>
				<td><?= $arBasketItems['NOTES'] ?></td>
			<?php }

			if (in_array('QUANTITY', $arParams['COLUMNS_LIST'])) { ?>
				<td align="center"><?= $arBasketItems['QUANTITY'] ?></td>
			<?php }

			if (in_array('DELETE', $arParams['COLUMNS_LIST'])) { ?>
				<td align="center"><input type="checkbox" name="DELETE_<?= $arBasketItems['ID'] ?>" value="Y" /></td>
			<?php }

			if (in_array('DELAY', $arParams['COLUMNS_LIST'])) { ?>
				<td align="center"><input type="checkbox" name="DELAY_<?= $arBasketItems['ID'] ?>" value="Y" checked /></td>
			<?php }

			if (in_array('WEIGHT', $arParams['COLUMNS_LIST'])) { ?>
				<td align="right"><?= $arBasketItems['WEIGHT_FORMATED'] ?></td>
			<?php } ?>
		</tr>
	<?php } ?>
</table>
<br />

<div width="30%">
	<input type="submit" value="<?= GetMessage('SALE_REFRESH')?>" name="BasketRefresh" /><br />
	<small><?= GetMessage('SALE_REFRESH_DESCR')?></small><br />
</div>
<br />