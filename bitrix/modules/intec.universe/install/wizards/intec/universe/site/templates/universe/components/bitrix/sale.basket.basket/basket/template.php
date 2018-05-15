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

$this->setFrameMode(true);
$frame = $this->createFrame()->begin();
$curPage = $APPLICATION->GetCurPage() .'?'. $arParams['ACTION_VARIABLE'] .'=';
$sTemplateId = spl_object_hash($this);
$arUrls = array(
	'delete' => $curPage .'delete&id=#ID#',
	'delay' => $curPage .'delay&id=#ID#',
	'add' => $curPage .'add&id=#ID#',
);
unset($curPage);

$arBasketJSParams = array(
	'SALE_DELETE' => GetMessage('SALE_DELETE'),
	'SALE_DELAY' => GetMessage('SALE_DELAY'),
	'SALE_TYPE' => GetMessage('SALE_TYPE'),
	'TEMPLATE_FOLDER' => $templateFolder,
	'DELETE_URL' => $arUrls['delete'],
	'DELAY_URL' => $arUrls['delay'],
	'ADD_URL' => $arUrls['add']
);
?>

<script type="text/javascript">
	var basketJSParams = <?= CUtil::PhpToJSObject($arBasketJSParams); ?>
</script>

<?php
$APPLICATION->AddHeadScript($templateFolder .'/script.js');

if (strlen($arResult['ERROR_MESSAGE']) <= 0)
{
	$normalCount = count($arResult['ITEMS']['AnDelCanBuy']);
	$normalHidden = $normalCount == 0 ? 'style="display:none;"' : '';

	$delayCount = count($arResult['ITEMS']['DelDelCanBuy']);
	$delayHidden = $delayCount == 0 ? 'style="display:none;"' : '';

	$subscribeCount = count($arResult['ITEMS']['ProdSubscribe']);
	$subscribeHidden = $subscribeCount == 0 ? 'style="display:none;"' : '';

	$naCount = count($arResult['ITEMS']['nAnCanBuy']);
	$naHidden = $naCount == 0 ? 'style="display:none;"' : '';
	?>
	<div class="intec-content">
		<div class="intec-content-wrapper">
			<div id="warning_message">
				<?php if (!empty($arResult['WARNING_MESSAGE']) && is_array($arResult['WARNING_MESSAGE'])) {
					foreach ($arResult['WARNING_MESSAGE'] as $v)
						ShowError($v);
				} ?>
			</div>
			<form method="post" action="<?= POST_FORM_ACTION_URI ?>" name="basket_form" id="basket_form" class="basket-switch">
				<div id="basket_form_container">
					<div class="bx_ordercart uni-tabs">
						<div class="bx_ordercart-unit-tabs-wrapper clearfix">
							<div class="bx_sort_container tabs">
								<a href="javascript:void(0)" id="basket_toolbar_button" class="current tab" onclick="showBasketItemsList()">
									<?= GetMessage('SALE_BASKET_ITEMS') ?>
									<div id="normal_count" class="flat" style="display:none;">&nbsp;(<?= $normalCount ?>)</div>
								</a>
								<a href="javascript:void(0)" id="basket_toolbar_button_delayed" class="tab" onclick="showBasketItemsList(2)" <?=$delayHidden?>>
									<?= GetMessage('SALE_BASKET_ITEMS_DELAYED') ?>
									<div id="delay_count" class="flat">&nbsp;(<?= $delayCount ?>)</div>
								</a>
								<a href="javascript:void(0)" id="basket_toolbar_button_subscribed" class="tab" onclick="showBasketItemsList(3)" <?=$subscribeHidden?>>
									<?= GetMessage('SALE_BASKET_ITEMS_SUBSCRIBED') ?>
									<div id="subscribe_count" class="flat">&nbsp;(<?= $subscribeCount ?>)</div>
								</a>
								<a href="javascript:void(0)" id="basket_toolbar_button_not_available" class="tab" onclick="showBasketItemsList(4)" <?=$naHidden?>>
									<?= GetMessage('SALE_BASKET_ITEMS_NOT_AVAILABLE') ?>
									<div id="not_available_count" class="flat">&nbsp;(<?= $naCount ?>)</div>
								</a>
							</div>
							<span class="intec-button intec-button-cl-default intec-button-transparent intec-button-w-icon jsClearBasket">
								<i class="intec-button-icon glyph-icon-cancel"></i>
								<span class="intec-button-text"><?= GetMessage('SALE_CLEAR') ?></span>
							</span>
						</div>
						<?php
						include($_SERVER['DOCUMENT_ROOT'] . $templateFolder .'/basket_items.php');
						include($_SERVER['DOCUMENT_ROOT'] . $templateFolder .'/basket_items_delayed.php');
						include($_SERVER['DOCUMENT_ROOT'] . $templateFolder .'/basket_items_subscribed.php');
						include($_SERVER['DOCUMENT_ROOT'] . $templateFolder .'/basket_items_not_available.php');
						?>
					</div>
				</div>
				<input type="hidden" name="BasketOrder" value="BasketOrder" />
				<!-- <input type="hidden" name="ajax_post" id="ajax_post" value="Y"> -->
			</form>
		</div>
	</div>
<?php
} else { ?>
    <div class="intec-content">
        <div class="intec-content-wrapper">
            <? ShowError($arResult['ERROR_MESSAGE']) ?>
        </div>
    </div>
<?php }

$frame->end();
?>