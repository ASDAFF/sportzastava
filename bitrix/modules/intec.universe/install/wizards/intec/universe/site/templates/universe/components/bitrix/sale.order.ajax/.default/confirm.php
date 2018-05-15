<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Sale;
use Bitrix\Sale\PropertyValue;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 */

if ($arParams['SET_TITLE'] == 'Y') {
	$APPLICATION->SetTitle(Loc::getMessage('SOA_ORDER_COMPLETE'));
}
$order = Sale\Order::load($arResult['ORDER']['ID']);
$propertyCollection = $order->getPropertyCollection();
$ar = $propertyCollection->getItemByOrderPropertyId($arParams['ORDER_PROP_DELIVERY']);
$deliveryAddress = null;

if (!empty($ar))
    $deliveryAddress = $ar->getValue();

?>

<div class="intec-content">
	<div class="intec-content-wrapper">
		<?php
		if (!empty($arResult['ORDER'])) {
			$user = CUser::GetByID($arResult['ORDER']['USER_ID']);
			$user = $user->Fetch();

			$delivery = \Bitrix\Sale\Delivery\Services\Manager::getById($arResult['ORDER']['DELIVERY_ID']);

			$saleBasket = CSaleBasket::GetList(
				array('ID' => 'ASC'),
				array('ORDER_ID' => $arResult['ORDER']['ID'])
			);
			$orderItems = array();
			while ($row = $saleBasket->GetNext()) {
				$orderItems[$row['PRODUCT_ID']] = $row;
			}
			unset($saleBasket);

			$items = array();
			$IBlockElements = CIBlockElement::GetList(
				array(),
				array('ID' => array_keys($orderItems))
			);
			while ($row = $IBlockElements->GetNext()) {
				$row['PREVIEW_PICTURE'] = CFile::GetFileArray($row['PREVIEW_PICTURE']);
				$row['DETAIL_PICTURE'] = CFile::GetFileArray($row['DETAIL_PICTURE']);
				$items[$row['ID']] = $row;
			}
			unset($IBlockElements);
			?>

			<table class="sale_order_full_table">
				<tr>
					<td class="sale_order_full_table_status_icon_wrap">
						<span class="intec-sale-order_status_ok_big"></span>
					</td>
					<td>
						<?= Loc::getMessage('SOA_ORDER_SUC', array(
							'#ORDER_DATE#' => $arResult['ORDER']['DATE_INSERT'],
							'#ORDER_ID#' => $arResult['ORDER']['ACCOUNT_NUMBER']
						)) ?>
						<br/><br/>
						<?php if (!empty($arResult['ORDER']['PAYMENT_ID'])) {
							echo Loc::getMessage('SOA_PAYMENT_SUC', array(
								'#PAYMENT_ID#' => $arResult['PAYMENT'][$arResult['ORDER']['PAYMENT_ID']]['ACCOUNT_NUMBER']
							));
						} ?>
						<br/><br/>
						<?= Loc::getMessage('SOA_ORDER_SUC1', array(
							'#LINK#' => $arParams['PATH_TO_PERSONAL']
						)) ?>
					</td>
				</tr>
			</table>

			<?php
			if ($arResult['ORDER']['IS_ALLOW_PAY'] === 'Y') {
				if (!empty($arResult['PAYMENT'])) {
					foreach ($arResult['PAYMENT'] as $payment) {
						if ($payment['PAID'] != 'Y') {
							if (!empty($arResult['PAY_SYSTEM_LIST'])
								&& array_key_exists($payment['PAY_SYSTEM_ID'], $arResult['PAY_SYSTEM_LIST'])
							) {
								$arPaySystem = $arResult['PAY_SYSTEM_LIST'][$payment['PAY_SYSTEM_ID']];

								if (empty($arPaySystem['ERROR'])) { ?>
									<div class="sale_order_payment_table_wrap">
										<table class="sale_order_full_table">
											<tr>
												<td class="ps_logo">
													<div class="pay_name"><?= Loc::getMessage('SOA_PAY') ?></div>
													<div class="paysystem_image"><?= CFile::ShowImage($arPaySystem['LOGOTIP'], 100, 100, 'border=0" style="width:100px"', '', false) ?></div>
													<div class="paysystem_name"><?= $arPaySystem['NAME'] ?></div>
													<br/>
												</td>
											</tr>
											<tr>
												<td>
													<?php if (strlen($arPaySystem['ACTION_FILE']) > 0 && $arPaySystem['NEW_WINDOW'] == 'Y' && $arPaySystem['IS_CASH'] != 'Y') {
														$orderAccountNumber = urlencode(urlencode($arResult['ORDER']['ACCOUNT_NUMBER']));
														$paymentAccountNumber = $payment['ACCOUNT_NUMBER'];
														?>
														<script>
															window.open('<?= $arParams['PATH_TO_PAYMENT'] ?>?ORDER_ID=<?= $orderAccountNumber ?>&PAYMENT_ID=<?= $paymentAccountNumber ?>');
														</script>
														<?= Loc::getMessage('SOA_PAY_LINK', array('#LINK#' => $arParams['PATH_TO_PAYMENT'] . '?ORDER_ID=' . $orderAccountNumber . '&PAYMENT_ID=' . $paymentAccountNumber)) ?>
														<?php if (CSalePdf::isPdfAvailable() && $arPaySystem['IS_AFFORD_PDF']) { ?>
															<br/>
															<?= Loc::getMessage('SOA_PAY_PDF', array('#LINK#' => $arParams['PATH_TO_PAYMENT'] . '?ORDER_ID=' . $orderAccountNumber . '&pdf=1&DOWNLOAD=Y')) ?>
														<?php }
													} else {
														// Payment form... SURPRISE!
														echo str_replace('sale-paysystem-yandex-button-item', 'intec-button intec-button-cl-common intec-button-md', $arPaySystem['BUFFERED_OUTPUT']);
													} ?>
												</td>
											</tr>
										</table>
									</div>
								<?php } else { ?>
									<span style="color:red;"><?= Loc::getMessage('SOA_ORDER_PS_ERROR') ?></span>
								<?php }
							} else { ?>
								<span style="color:red;"><?= Loc::getMessage('SOA_ORDER_PS_ERROR') ?></span>
							<?php }
						}
					}
				}
			} else { ?>
				<br/><strong><?= $arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR'] ?></strong>
			<?php } ?>

			<div class="intec-sale-order_info row">
				<div class="intec-sale-order_info_category col-md-4 col-xs-12">
					<div class="intec-sale-order_info_category_wrap">
						<div class="intec-sale-order_info_title"><?= Loc::GetMessage('SOA_USER_DATA') ?></div>
						<ul class="intec-sale-order_field_list">
							<li class="intec-sale-order_field">
								<span class="intec-sale-order_field_name"><?= Loc::GetMessage('STOF_NAME') ?></span>
								<span class="intec-sale-order_field_value"><?= $user['NAME'] .' '. $user['SECOND_NAME'] .' '. $user['LAST_NAME'] ?></span>
							</li>
							<li class="intec-sale-order_field">
								<span class="intec-sale-order_field_name"><?= Loc::GetMessage('SOA_PICKUP_PHONE') ?></span>
								<span class="intec-sale-order_field_value"><?= $user['PERSONAL_PHONE'] ?></span>
							</li>
							<li class="intec-sale-order_field">
								<span class="intec-sale-order_field_name"><?= Loc::GetMessage('STOF_EMAIL') ?></span>
								<span class="intec-sale-order_field_value"><?= $user['EMAIL'] ?></span>
							</li>
						</ul>
					</div>
				</div>
				<div class="intec-sale-order_info_category col-md-4 col-xs-12">
					<div class="intec-sale-order_info_category_wrap">
						<div class="intec-sale-order_info_title"><?= Loc::GetMessage('SOA_DELIVERY') ?></div>
						<div><?= $delivery['NAME'] ?></div>
						<?php if ($arResult['DELIVERY_PRICE_FORMATED']) { ?>
							<div><?= $arResult['DELIVERY_PRICE_FORMATED'] ?></div>
						<?php } ?>
					</div>
				</div>
                <?php if (!empty($deliveryAddress)) { ?>
                    <div class="intec-sale-order_info_category col-md-4 col-xs-12">
                        <div class="intec-sale-order_info_category_wrap">
                            <div class="intec-sale-order_info_title"><?= Loc::GetMessage('SOA_DELIVERY_ADDRESS') ?></div>
                            <div><?= $deliveryAddress ?></div>
                        </div>
                    </div>
                <?php } ?>
			</div>

			<div class="intec-sale-order_products">
				<table>
					<thead>
						<tr>
							<th><?= Loc::GetMessage('SOA_SUM_NAME') ?></th>
							<th><?= Loc::GetMessage('SOA_SUM_DISCOUNT') ?></th>
							<th><?= Loc::GetMessage('SOA_SUM_PRICE') ?></th>
							<th><?= Loc::GetMessage('SOA_SUM_QUANTITY') ?></th>
							<th><?= Loc::GetMessage('SOA_SUM') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($orderItems as $item) { ?>
							<tr>
								<td>
                                    <div class="hidden-header">
                                        <?= Loc::GetMessage('SOA_SUM_NAME') ?>
                                    </div>
									<a href="<?= $item['DETAIL_PAGE_URL'] ?>" target="_blank" class="intec-sale-order_product_link intec-cl-text-hover">
										<?php if ($items[$item['PRODUCT_ID']]['PREVIEW_PICTURE']['SRC']) { ?>
											<span class="intec-sale-order_product_image"
												  style="background-image: url('<?= $items[$item['PRODUCT_ID']]['PREVIEW_PICTURE']['SRC'] ?>')"></span>
										<?php } elseif ($items[$item['PRODUCT_ID']]['DETAIL_PICTURE']['SRC']) { ?>
											<span class="intec-sale-order_product_image"
												  style="background-image: url('<?= $items[$item['PRODUCT_ID']]['DETAIL_PICTURE']['SRC'] ?>')"></span>
										<?php } ?>
										<span class="intec-sale-order_product_name"><?= $item['NAME'] ?></span>
									</a>
								</td>
								<td class="intec-sale-order_product_discount<?= $item['DISCOUNT_VALUE'] ? '' : ' no-padding' ?>">
                                    <?php if (!empty($item['DISCOUNT_VALUE'])) { ?>
                                        <div class="hidden-header">
                                            <?= Loc::GetMessage('SOA_SUM_DISCOUNT') ?>
                                        </div>
                                        <?= $item['DISCOUNT_VALUE'] ?>
                                    <?php } ?>
								</td>
								<td>
                                    <div class="hidden-header">
                                        <?= Loc::GetMessage('SOA_SUM_PRICE') ?>
                                    </div>
									<span class="intec-sale-order_product_price">
										<?= CCurrencyLang::CurrencyFormat($item['PRICE'], $item['CURRENCY']) ?>
									</span>
									<span class="intec-sale-order_product_old_price">
										<?= CCurrencyLang::CurrencyFormat($item['BASE_PRICE'], $item['CURRENCY']) ?>
									</span>
								</td>
								<td class="intec-sale-order_product_quantity">
                                    <div class="hidden-header">
                                        <?= Loc::GetMessage('SOA_SUM_QUANTITY') ?>
                                    </div>
									<?= $item['QUANTITY'] ?>
								</td>
								<td class="intec-sale-order_product_sum">
                                    <div class="hidden-header">
                                        <?= Loc::GetMessage('SOA_SUM') ?>
                                    </div>
									<?= CCurrencyLang::CurrencyFormat($item['PRICE'] * $item['QUANTITY'], $item['CURRENCY']) ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

			<?php
		} else { ?>

			<b><?= Loc::getMessage('SOA_ERROR_ORDER') ?></b>

			<table class="sale_order_full_table">
				<tr>
					<td>
						<?= Loc::getMessage('SOA_ERROR_ORDER_LOST', array('#ORDER_ID#' => $arResult['ACCOUNT_NUMBER'])) ?>
						<?= Loc::getMessage('SOA_ERROR_ORDER_LOST1') ?>
					</td>
				</tr>
			</table>

		<?php } ?>
	</div>
</div>