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
						<br/><br/>
						<div class=""><b><?=Loc::getMessage("SOA_PAY") ?></b></div>
						<div class="paysystem_name"><?=$arResult['PAYMENT'][$arResult['ORDER']['PAYMENT_ID']]['PAY_SYSTEM_NAME'] ?></div>
					</td>
				</tr>
			</table>

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