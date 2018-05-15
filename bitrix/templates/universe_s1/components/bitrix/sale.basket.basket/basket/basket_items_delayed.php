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

$bDelayColumn  = false;
$bDeleteColumn = false;
$bWeightColumn = false;
$bPropsColumn  = false;
?>
<div id="basket_items_delayed" class="bx_ordercart_order_table_container" style="display:none;">
	<table id="delayed_items">
		<thead>
			<tr>
				<?php foreach ($arResult['GRID']['HEADERS'] as $id => $arHeader) {
					$arHeader['name'] = isset($arHeader['name']) ? (string)$arHeader['name'] : '';
					if ($arHeader['name'] == '')
						$arHeader['name'] = GetMessage('SALE_' . $arHeader['id']);

					switch ($arHeader['id']) {
						case 'TYPE':
						case 'DELAY':
							continue 2;
						case 'PROPS':
							$bPropsColumn = true;
							continue 2;
						case 'DELETE':
							$bDeleteColumn = true;
							continue 2;
						case 'WEIGHT':
							$bWeightColumn = true;
							break;
					}

					if ($arHeader['id'] == 'NAME') { ?>
						<td class="item" colspan="2">
					<?php } elseif ($arHeader['id'] == 'PRICE') { ?>
						<td class="price">
					<?php } else { ?>
						<td class="custom">
					<?php } ?>
						<?= $arHeader['name'] ?>
					</td>
				<?php }

				if ($bDeleteColumn || $bDelayColumn) { ?>
					<td class="custom"></td>
				<?php } ?>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($arResult['GRID']['ROWS'] as $k => $arItem) {

				if ($arItem['DELAY'] != 'Y' || $arItem['CAN_BUY'] != 'Y')
					continue;

				$arItem['SUM'] = CurrencyFormat($arItem['PRICE'] * $arItem['QUANTITY'], $arItem['CURRENCY']);
				?>
				<tr id="<?= $arItem['ID'] ?>">
					<?php foreach ($arResult['GRID']['HEADERS'] as $id => $arHeader) {

						if (in_array($arHeader['id'], array('PROPS', 'DELAY', 'DELETE', 'TYPE'))) // some values are not shown in columns in this template
							continue;

						$arHeader['name'] = isset($arHeader['name']) ? (string)$arHeader['name'] : '';
						if ($arHeader['name'] == '')
							$arHeader['name'] = GetMessage('SALE_'. $arHeader['id']);

						if ($arHeader['id'] == 'NAME') { ?>
							<td class="itemphoto">
								<div class="bx_ordercart_photo_container">
									<?php if (strlen($arItem["PREVIEW_PICTURE_SRC"]) > 0) {
										$url = $arItem["PREVIEW_PICTURE_SRC"];
									} elseif (strlen($arItem["DETAIL_PICTURE_SRC"]) > 0) {
										$url = $arItem["DETAIL_PICTURE_SRC"];
									} else {
										$url = $templateFolder . "/images/no_photo.png";
									}

									if (strlen($arItem['DETAIL_PAGE_URL']) > 0) { ?>
										<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
									<?php } ?>
										<div class="bx_ordercart_photo"
											 style="background-image:url('<?= $url ?>')"></div>
									<?php if (strlen($arItem['DETAIL_PAGE_URL']) > 0) { ?>
										</a>
									<?php } ?>
								</div>
								<?php if (!empty($arItem['BRAND'])) { ?>
									<div class="bx_ordercart_brand">
										<img alt="" src="<?= $arItem['BRAND'] ?>" />
									</div>
								<?php } ?>
							</td>

							<td class="item">
								<h2 class="bx_ordercart_itemtitle">
									<?php if (strlen($arItem['DETAIL_PAGE_URL']) > 0) { ?>
										<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
									<?php } ?>
										<?= $arItem['NAME'] ?>
									<?php if (strlen($arItem['DETAIL_PAGE_URL']) > 0) { ?>
										</a>
									<?php } ?>
								</h2>

								<div class="bx_ordercart_itemart">
									<?php
									if ($bPropsColumn) {
										foreach ($arItem['PROPS'] as $val) {
											if (is_array($arItem['SKU_DATA'])) {
												$bSkip = false;
												foreach ($arItem['SKU_DATA'] as $propId => $arProp) {
													if ($arProp['CODE'] == $val['CODE']) {
														$bSkip = true;
														break;
													}
												}
												if ($bSkip)
													continue;
											}
										}
									}
									?>
								</div>
								<?php if (is_array($arItem['SKU_DATA']) && !empty($arItem['SKU_DATA'])) {
									foreach ($arItem['SKU_DATA'] as $propId => $arProp) {

										// if property contains images or values
										$isImgProperty = false;
										if (!empty($arProp['VALUES']) && is_array($arProp['VALUES'])) {
											foreach ($arProp['VALUES'] as $id => $arVal) {
												if (!empty($arVal['PICT']['SRC'])) {
													$isImgProperty = true;
													break;
												}
											}
										}

										if ($isImgProperty) {
											foreach ($arProp['VALUES'] as $valueId => $arSkuValue) {
												$selected = false;
												foreach ($arItem['PROPS'] as $arItemProp) {
													if ($arItemProp['CODE'] == $arItem['SKU_DATA'][$propId]['CODE']
														&& in_array($arItemProp['VALUE'], array($arSkuValue['NAME'], $arSkuValue['XML_ID']))
													) {
														$selected = true;
													}
												}
												if ($selected) { ?>
													<div class="property">
														<span class="title"><?= $arProp['NAME'] ?>:</span>
														<img src="<?= $arSkuValue['PICT']['SRC'] ?>"/>
													</div>
												<?php }
											}
										} else {
											foreach ($arProp['VALUES'] as $valueId => $arSkuValue) {
												$selected = false;
												foreach ($arItem['PROPS'] as $arItemProp) {
													if ($arItemProp['CODE'] == $arItem['SKU_DATA'][$propId]['CODE']
														&& $arItemProp['VALUE'] == $arSkuValue['NAME']
													) {
														$selected = true;
													}
												}
												if ($selected) { ?>
													<div class="property">
														<span class="title"><?= $arProp['NAME'] ?>:</span>
														<span class="text"><?= $arSkuValue['NAME'] ?></span>
													</div>
												<? }
											}
										}
									}
								} ?>
								<input type="hidden" name="DELAY_<?= $arItem['ID'] ?>" value="Y"/>
							</td>
						<?php } elseif ($arHeader['id'] == 'QUANTITY') { ?>
							<td class="custom">
								<span class="bx_ordercart_mobile_title"><?= $arHeader['name'] ?></span>
								<div class="bx_ordercart_cell_content">
									<?php
									echo $arItem['QUANTITY'];
									if (isset($arItem['MEASURE_TEXT']))
										echo "&nbsp;" . $arItem['MEASURE_TEXT'];
									?>
								</div>
							</td>
						<?php } elseif ($arHeader['id'] == 'PRICE') { ?>
							<td class="price">
								<div class="bx_ordercart_mobile_title"><?= $arHeader['name'] ?></div>
								<div class="bx_ordercart_cell_content">
									<?php if (doubleval($arItem['DISCOUNT_PRICE_PERCENT']) > 0) { ?>
										<div class="current_price"><?= $arItem['PRICE_FORMATED'] ?></div>
										<div class="old_price"><?= $arItem['FULL_PRICE_FORMATED'] ?></div>
									<?php } else { ?>
										<div class="current_price"><?= $arItem['PRICE_FORMATED'] ?></div>
									<?php } ?>
								</div>
							</td>
						<?php } elseif ($arHeader['id'] == 'DISCOUNT') { ?>
							<td class="custom">
								<span class="bx_ordercart_mobile_title"><?= $arHeader['name'] ?></span>
								<div class="bx_ordercart_cell_content"><?= $arItem['DISCOUNT_PRICE_PERCENT_FORMATED'] ?></div>
							</td>
						<?php } elseif ($arHeader['id'] == 'WEIGHT') { ?>
							<td class="custom">
								<span class="bx_ordercart_mobile_title"><?= $arHeader['name'] ?></span>
								<div class="bx_ordercart_cell_content"><?= $arItem['WEIGHT_FORMATED'] ?></div>
							</td>
						<?php } elseif ($arHeader['id'] == 'SUM') { ?>
							<td class="sum">
								<div class="bx_ordercart_mobile_title"><?= $arHeader['name'] ?></div>
								<div class="bx_ordercart_cell_content"><?= $arItem[$arHeader['id']] ?></div>
							</td>
						<?php } else { ?>
							<td class="custom">
								<span class="bx_ordercart_mobile_title"><?= $arHeader['name'] ?></span>
								<div class="bx_ordercart_cell_content"><?= $arItem[$arHeader['id']] ?></div>
							</td>
						<?php }
					}

					if ($bDelayColumn || $bDeleteColumn) { ?>
						<td class="control">
							<a class="to-cart-item glyph-icon-cart"
							   href="<?= str_replace('#ID#', $arItem['ID'], $arUrls['add']) ?>">
								<div class="add" title="<?= GetMessage('TOCART_TEXT_DETAIL') ?>"></div>
							</a>
							<?php if ($bDeleteColumn) { ?>
								<a class="delete-item fa fa-close"
								   href="<?= str_replace('#ID#', $arItem['ID'], $arUrls['delete']) ?>">
									<div class="add" title="<?= GetMessage('DELETE_TEXT_DETAIL') ?>"></div>
								</a>
							<?php } ?>
						</td>
					<?php } ?>
				</tr>
			<?php } ?>
		</tbody>

	</table>
</div>