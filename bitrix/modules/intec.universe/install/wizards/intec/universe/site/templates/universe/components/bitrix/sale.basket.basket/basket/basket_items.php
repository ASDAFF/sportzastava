<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Sale\DiscountCouponsManager;
use intec\core\helpers\JavaScript;

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

if (!empty($arResult['ERROR_MESSAGE']))
	ShowError($arResult['ERROR_MESSAGE']);

$bDelayColumn  = false;
$bDeleteColumn = false;
$bWeightColumn = false;
$bPropsColumn  = false;
$bPriceType    = false;

if ($normalCount > 0) { ?>
	<div id="basket_items_list">
		<div class="bx_ordercart_order_table_container">
			<table id="basket_items">
				<thead>
				<tr>
					<?php foreach ($arResult['GRID']['HEADERS'] as $id => $arHeader) {
						$arHeader['name'] = isset($arHeader['name']) ? (string)$arHeader['name'] : '';
						if ($arHeader['name'] == '')
							$arHeader['name'] = GetMessage('SALE_'. $arHeader['id']);
						$arHeaders[] = $arHeader['id'];

						switch ($arHeader['id']) {
							case 'TYPE':
								$bPriceType = true;
								continue 2;
							case 'PROPS':
								$bPropsColumn = true;
								break;
							case 'DELAY':
								$bDelayColumn = true;
								break;
							case 'DELETE':
								$bDeleteColumn = true;
								break;
							case 'WEIGHT':
								$bWeightColumn = true;
								break;
						}

						if (in_array($arHeader['id'], array('DELAY', 'DELETE', 'PROPS', 'TYPE'))) {
							continue;
						}
						if ($arHeader['id'] == 'NAME') { ?>
							<td class="item" colspan="2" id="col_<?= $arHeader['id']; ?>">
						<?php } elseif ($arHeader['id'] == 'PRICE') { ?>
							<td class="price" id="col_<?= $arHeader['id']; ?>">
						<?php } else { ?>
							<td class="custom" id="col_<?= $arHeader['id']; ?>">
						<?php } ?>
							<?= $arHeader['name'] ?>
						</td>
						<?php
					}

					if ($bDeleteColumn || $bDelayColumn) { ?>
						<td class="custom"></td>
					<?php } ?>
				</tr>
				</thead>

				<tbody>
				<?php foreach ($arResult['GRID']['ROWS'] as $k => $arItem) {
					if ($arItem['DELAY'] != 'N' || $arItem['CAN_BUY'] != 'Y')
						continue;
					?>
					<tr id="<?= $arItem['ID'] ?>">
						<?php
						foreach ($arResult['GRID']['HEADERS'] as $id => $arHeader) {

							if (in_array($arHeader['id'], array('DELAY', 'DELETE', 'PROPS', 'TYPE'))) // some values are not shown in the columns in this template
								continue;

							$arHeader['name'] = isset($arHeader['name']) ? (string)$arHeader['name'] : '';
							if ($arHeader['name'] == '')
								$arHeader['name'] = GetMessage('SALE_'. $arHeader['id']);

							if ($arHeader['id'] == 'NAME') {
								?>
								<td class="itemphoto">
									<div class="bx_ordercart_photo_container">
										<?
										if (strlen($arItem['PREVIEW_PICTURE_SRC']) > 0) {
											$url = $arItem['PREVIEW_PICTURE_SRC'];
										} elseif (strlen($arItem['DETAIL_PICTURE_SRC']) > 0) {
											$url = $arItem['DETAIL_PICTURE_SRC'];
										} else {
											$url = $templateFolder . '/images/no_photo.png';
										}
										?>

										<?php if (strlen($arItem['DETAIL_PAGE_URL']) > 0) { ?>
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
											<img alt="" src="<?= $arItem['BRAND'] ?>"/>
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
										<?php if ($bPropsColumn) {
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
										} ?>
									</div>
									<?php
									if (is_array($arItem['SKU_DATA']) && !empty($arItem['SKU_DATA'])) {
										foreach ($arItem['SKU_DATA'] as $propId => $arProp) {

											// if property contains images or values
											$isImgProperty = false;
											if (!empty($arProp['VALUES']) && is_array($arProp['VALUES'])) {
												foreach ($arProp['VALUES'] as $id => $arVal) {
													if (!empty($arVal['PICT']) && is_array($arVal['PICT'])
														&& !empty($arVal['PICT']['SRC'])
													) {
														$isImgProperty = true;
														break;
													}
												}
											}

											if ($isImgProperty) {
												foreach ($arProp['VALUES'] as $valueId => $arSkuValue) {
													$selected = false;

													foreach ($arItem['PROPS'] as $arItemProp) {
														if ($arItemProp['CODE'] == $arItem['SKU_DATA'][$propId]['CODE'] &&
															($arItemProp['VALUE'] == $arSkuValue['NAME'] || $arItemProp['VALUE'] == $arSkuValue['XML_ID'])
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
														if ($arItemProp['CODE'] == $arItem['SKU_DATA'][$propId]['CODE']) {
															if ($arItemProp['VALUE'] == $arSkuValue['NAME'])
																$selected = true;
														}
													}
													if ($selected) { ?>
														<div class="property">
															<span class="title"><?= $arProp['NAME'] ?>:</span>
															<span class="text"><?= $arSkuValue['NAME'] ?></span>
														</div>
														<?php
													}
												}
											}
										}
									}
									?>
								</td>
								<?php
							} elseif ($arHeader['id'] == 'QUANTITY') {

								$ratio = isset($arItem['MEASURE_RATIO']) ? $arItem['MEASURE_RATIO'] : 0;
								$max = isset($arItem['AVAILABLE_QUANTITY']) ? 'max="' . $arItem['AVAILABLE_QUANTITY'] . '"' : '';
								$useFloatQuantity = $arParams['QUANTITY_FLOAT'] == 'Y' ? true : false;
								$useFloatQuantityJS = $useFloatQuantity ? 'true' : 'false';

								if (!isset($arItem["MEASURE_RATIO"])) {
									$arItem["MEASURE_RATIO"] = 1;
								}
								?>
								<td class="custom">
									<table cellspacing="0" cellpadding="0" class="counter">
										<tr>
											<td id="basket_quantity_control">
												<div class="basket_quantity_control">
													<a href="javascript:void(0);"
													   class="minus"
													   onclick="setQuantity(<?= $arItem['ID'] ?>, <?= $arItem['MEASURE_RATIO'] ?>, 'down', <?= $useFloatQuantityJS ?>);">
														-</a>
												</div>
											</td>
											<td id="basket_quantity">
												<input
													type="text"
													size="3"
													id="QUANTITY_INPUT_<?= $arItem['ID'] ?>"
													name="QUANTITY_INPUT_<?= $arItem['ID'] ?>"
													size="2"
													maxlength="18"
													min="0"
													<?= $max ?>
													step="<?= $ratio ?>"
													value="<?= $arItem['QUANTITY'] ?>"
													onchange="updateQuantity('QUANTITY_INPUT_<?= $arItem['ID'] ?>', '<?= $arItem['ID'] ?>', <?= $ratio ?>, <?= $useFloatQuantityJS ?>)"
													/>
											</td>
											<td id="basket_quantity_control">
												<div class="basket_quantity_control">
													<a href="javascript:void(0);"
													   class="plus"
													   onclick="setQuantity(<?= $arItem["ID"] ?>, <?= $arItem["MEASURE_RATIO"] ?>, 'up', <?= $useFloatQuantityJS ?>);">
														+</a>
												</div>
											</td>
										</tr>
									</table>
									<input type="hidden"
										   id="QUANTITY_<?= $arItem['ID'] ?>"
										   name="QUANTITY_<?= $arItem['ID'] ?>"
										   value="<?= $arItem["QUANTITY"] ?>"/>
								</td>
								<?php
							} elseif ($arHeader['id'] == 'PRICE') {
								?>
								<td class="price">
									<div class="bx_ordercart_mobile_title"><?= $arHeader['name'] ?></div>
									<div class="bx_ordercart_cell_content">
										<div class="current_price" id="current_price_<?= $arItem['ID'] ?>">
											<?= $arItem['PRICE_FORMATED'] ?>
										</div>
										<div class="old_price" id="old_price_<?= $arItem['ID'] ?>">
											<?php if (floatval($arItem['DISCOUNT_PRICE_PERCENT']) > 0) {
												echo $arItem['FULL_PRICE_FORMATED'];
											} ?>
										</div>
									</div>
								</td>
								<?php
							} elseif ($arHeader['id'] == 'SUM') {
								?>
								<td class="sum" id="sum_<?= $arItem['ID'] ?>">
									<div class="bx_ordercart_mobile_title"><?= $arHeader['name'] ?></div>
									<div class="bx_ordercart_cell_content"><?= $arItem[$arHeader['id']] ?></div>
								</td>
								<?php
							} elseif ($arHeader['id'] == 'DISCOUNT') {
								?>
								<td class="custom">
									<span class="bx_ordercart_mobile_title"><?= $arHeader['name'] ?></span>
									<div id="discount_value_<?= $arItem['ID'] ?>" class="bx_ordercart_cell_content">
										<?= $arItem['DISCOUNT_PRICE_PERCENT_FORMATED'] ?>
									</div>
								</td>
								<?php
							} elseif ($arHeader['id'] == 'WEIGHT') {
								?>
								<td class="custom">
									<span class="bx_ordercart_mobile_title"><?= $arHeader['name'] ?></span>
									<div class="bx_ordercart_cell_content"><?= $arItem['WEIGHT_FORMATED'] ?></div>
								</td>
								<?php
							} else {
								?>
								<td class="custom">
									<span class="bx_ordercart_mobile_title"><?= $arHeader['name'] ?></span>
									<div class="bx_ordercart_cell_content"><?= $arItem[$arHeader['id']] ?></div>
								</td>
								<?php
							}
						}

						if ($bDelayColumn || $bDeleteColumn) { ?>
							<td class="control">
								<?php if ($bDelayColumn) { ?>
									<a class="delay-item fa fa-heart"
									   href="<?= str_replace('#ID#', $arItem['ID'], $arUrls['delay']) ?>">
										<span class="add" title="<?= GetMessage('LIKE_TEXT_DETAIL') ?>"></span>
									</a>
								<?php }

								if ($bDeleteColumn) { ?>
									<a class="delete-item fa fa-close"
									   href="<?= str_replace('#ID#', $arItem['ID'], $arUrls['delete']) ?>">
										<span class="add" title="<?= GetMessage('DELETE_TEXT_DETAIL') ?>"></span>
									</a>
								<?php } ?>
							</td>
						<?php } ?>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<input type="hidden" id="column_headers" value="<?= CUtil::JSEscape(implode($arHeaders, ',')) ?>"/>
		<input type="hidden" id="offers_props" value="<?= CUtil::JSEscape(implode($arParams['OFFERS_PROPS'], ',')) ?>"/>
		<input type="hidden" id="action_var" value="<?= CUtil::JSEscape($arParams['ACTION_VARIABLE']) ?>"/>
		<input type="hidden" id="quantity_float" value="<?= $arParams['QUANTITY_FLOAT'] ?>"/>
		<input type="hidden" id="count_discount_4_all_quantity" value="<?= $arParams['COUNT_DISCOUNT_4_ALL_QUANTITY'] == 'Y' ? 'Y' : 'N' ?>"/>
		<input type="hidden" id="price_vat_show_value" value="<?= 'Y'/*$arParams['PRICE_VAT_SHOW_VALUE'] == 'Y' ? 'Y' : 'N'*/ ?>"/>
		<input type="hidden" id="hide_coupon" value="<?= $arParams['HIDE_COUPON'] == 'Y' ? 'Y' : 'N' ?>"/>
		<input type="hidden" id="use_prepayment" value="<?= $arParams['USE_PREPAYMENT'] == 'Y' ? 'Y' : 'N' ?>"/>

		<div class="bx_ordercart_order_pay">
			<div class="row">
				<div class="col-xs-12 col-sm-6 bx_ordercart_coupon_column">
				<?php if ($arParams['HIDE_COUPON'] != 'Y') { ?>
					<div class="intec-ordercart_coupon">
						<span class="intec-ordercart-coupon_name"><?= GetMessage('STB_COUPON_PROMT') ?></span>
						<span class="intec-ordercart_coupon_wrap">
							<input type="text" class="intec-input" id="coupon" name="COUPON" value="" onchange="enterCoupon();"/>
						</span>
					</div>
				<?php } ?>
				</div>

				<div class="col-xs-12 col-sm-6 pull-right">
					<div class="intec-order-cart_sum_table">
						<div class="intec-ordercart_sum intec-order-cart_sum_row">
							<span class="intec-order-cart_sum_cell">
								<span class="intec-ordercart_sum_name"><?= GetMessage('SALE_VAT_EXCLUDED') ?></span>
							</span>
							<span class="intec-order-cart_sum_cell">
								<span class="intec-ordercart_sum_value" id="<?= $arParams['PRICE_VAT_SHOW_VALUE'] == 'Y' ? 'allSum_wVAT_FORMATED' : 'allSum_FORMATED' ?>">
									<?= str_replace(' ', "&nbsp;", $arResult['allSum_FORMATED']) ?>
								</span>
								<?php if ($arResult['allSum_FORMATED'] != $arResult['PRICE_WITHOUT_DISCOUNT']) { ?>
									<span class="intec-ordercart_sum_value intec-ordercart_discount" id="PRICE_WITHOUT_DISCOUNT">
										<?= str_replace(' ', "&nbsp;", $arResult['PRICE_WITHOUT_DISCOUNT']) ?>
									</span>
								<?php } ?>
							</span>
						</div>
                        <? if ($arParams['PRICE_VAT_SHOW_VALUE'] == 'Y') { ?>
                            <div class="intec-ordercart_sum intec-order-cart_sum_row">
                                <span class="intec-order-cart_sum_cell">
                                    <span class="intec-ordercart_sum_name"><?= GetMessage('SALE_TOTAL') ?></span>
                                </span>
                                <span class="intec-order-cart_sum_cell">
                                    <span class="intec-ordercart_sum_value" id="allSum_FORMATED">
                                        <?= str_replace(' ', "&nbsp;", $arResult['allSum_FORMATED']) ?>
                                    </span>
                                </span>
                            </div>
                        <? } ?>
					</div>
				</div>
			</div>

			<div class="bx_ordercart_order_pay_center row">
				<?php
				if (!empty($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], '/catalog/')) {
					$saleBack = $_SERVER['HTTP_REFERER'];
				} else {
					$saleBack = SITE_DIR .'catalog/';
				}
				?>
				<div class="col-xs-12 col-sm-4 sale_back_wrapper">
					<a class="intec-button intec-button-cl-default intec-button-transparent sale_back"
					   href="<?= $saleBack ?>">
						<?= GetMessage('SALE_BACK') ?></a>
				</div>
				<div class="col-xs-12 col-sm-8">
					<a class="intec-button intec-button-cl-common sale_order"
					   href="javascript:void(0)"
					   onclick="checkOut();">
						<?= GetMessage('SALE_ORDER') ?></a>
					<?php if ($arParams['USE_FAST_ORDER'] == 'Y') { ?>
						<span class="intec-button intec-button-cl-common intec-button-transparent fast_order"
							  onclick="universe.components.show(<?= JavaScript::toObject([
									'component' => 'intec.universe:sale.order.fast',
									'template' => $arParams['FAST_ORDER_TEMPLATE'],
									'parameters' => [
										'TITLE' => $arParams['FAST_ORDER_TITLE'],
										'SEND' => $arParams['FAST_ORDER_SEND_BUTTON'],
										'SHOW_COMMENT' => $arParams['FAST_ORDER_SHOW_COMMENT'],
										'PRICE_TYPE_ID' => $arParams['FAST_ORDER_PRICE_TYPE'],
										'DELIVERY_ID' => $arParams['FAST_ORDER_DELIVERY_TYPE'],
										'PAYMENT_ID' => $arParams['FAST_ORDER_PAYMET_TYPE'],
										'PERSON_TYPE_ID' => $arParams['FAST_ORDER_PAYER_TYPE'],
										'SHOW_ORDER_PROPERTIES' => $arParams['FAST_ORDER_SHOW_PROPERTIES'],
										'PROPERTY_PHONE' => $arParams['FAST_ORDER_PROPERTY_PHONE'],
										'CONSENT_URL' => $arParams['CONSENT_URL'],
										'AJAX_OPTION_ADDITIONAL' => $sTemplateId.'_FAST_ORDER'
									]
								]) ?>)">
							<?= GetMessage('SALE_FAST_ORDER') ?>
						</span>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div id="basket_items_list">
		<table>
			<tbody>
			<tr>
				<td colspan="<?= $numCells ?>" style="text-align:center;">
					<div class=""><?= GetMessage('SALE_NO_ITEMS') ?></div>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
<?php } ?>