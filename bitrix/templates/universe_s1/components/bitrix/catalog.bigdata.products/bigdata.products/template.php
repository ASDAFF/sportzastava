<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */
/** @global CMain $APPLICATION */

$frame = $this->createFrame()->begin("");

$injectId = $arParams['UNIQ_COMPONENT_ID'];

if (isset($arResult['REQUEST_ITEMS']))
{
	// code to receive recommendations from the cloud
	CJSCore::Init(array('ajax'));

	// component parameters
	$signer = new \Bitrix\Main\Security\Sign\Signer;
	$signedParameters = $signer->sign(
		base64_encode(serialize($arResult['_ORIGINAL_PARAMS'])),
		'bx.bd.products.recommendation'
	);
	$signedTemplate = $signer->sign($arResult['RCM_TEMPLATE'], 'bx.bd.products.recommendation');

	?>

	<span id="<?=$injectId?>"></span>

	<script type="text/javascript">
		BX.ready(function(){
			bx_rcm_get_from_cloud(
				'<?=CUtil::JSEscape($injectId)?>',
				<?=CUtil::PhpToJSObject($arResult['RCM_PARAMS'])?>,
				{
					'parameters':'<?=CUtil::JSEscape($signedParameters)?>',
					'template': '<?=CUtil::JSEscape($signedTemplate)?>',
					'site_id': '<?=CUtil::JSEscape(SITE_ID)?>',
					'rcm': 'yes'
				}
			);
		});
	</script>
	<?
	$frame->end();
	return;

	// \ end of the code to receive recommendations from the cloud
}


// regular template then
// if customized template, for better js performance don't forget to frame content with <span id="{$injectId}_items">...</span> 

if (!empty($arResult['ITEMS']))
{
	?>

	<script type="text/javascript">
	BX.message({
		CBD_MESS_BTN_BUY: '<? echo ('' != $arParams['MESS_BTN_BUY'] ? CUtil::JSEscape($arParams['MESS_BTN_BUY']) : GetMessageJS('CVP_TPL_MESS_BTN_BUY')); ?>',
		CBD_MESS_BTN_ADD_TO_BASKET: '<? echo ('' != $arParams['MESS_BTN_ADD_TO_BASKET'] ? CUtil::JSEscape($arParams['MESS_BTN_ADD_TO_BASKET']) : GetMessageJS('CVP_TPL_MESS_BTN_ADD_TO_BASKET')); ?>',
		CBD_MESS_BTN_DETAIL: '<? echo ('' != $arParams['MESS_BTN_DETAIL'] ? CUtil::JSEscape($arParams['MESS_BTN_DETAIL']) : GetMessageJS('CVP_TPL_MESS_BTN_DETAIL')); ?>',
		CBD_MESS_NOT_AVAILABLE: '<? echo ('' != $arParams['MESS_BTN_DETAIL'] ? CUtil::JSEscape($arParams['MESS_BTN_DETAIL']) : GetMessageJS('CVP_TPL_MESS_BTN_DETAIL')); ?>',
		CBD_BTN_MESSAGE_BASKET_REDIRECT: '<? echo GetMessageJS('CVP_CATALOG_BTN_MESSAGE_BASKET_REDIRECT'); ?>',
		CBD_BASKET_URL: '<? echo $arParams["BASKET_URL"]; ?>',
		CBD_ADD_TO_BASKET_OK: '<? echo GetMessageJS('CVP_ADD_TO_BASKET_OK'); ?>',
		CBD_TITLE_ERROR: '<? echo GetMessageJS('CVP_CATALOG_TITLE_ERROR') ?>',
		CBD_TITLE_BASKET_PROPS: '<? echo GetMessageJS('CVP_CATALOG_TITLE_BASKET_PROPS') ?>',
		CBD_TITLE_SUCCESSFUL: '<? echo GetMessageJS('CVP_ADD_TO_BASKET_OK'); ?>',
		CBD_BASKET_UNKNOWN_ERROR: '<? echo GetMessageJS('CVP_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
		CBD_BTN_MESSAGE_SEND_PROPS: '<? echo GetMessageJS('CVP_CATALOG_BTN_MESSAGE_SEND_PROPS'); ?>',
		CBD_BTN_MESSAGE_CLOSE: '<? echo GetMessageJS('CVP_CATALOG_BTN_MESSAGE_CLOSE') ?>'
	});
	</script>


	<h1><? echo GetMessage('CVP_TPL_MESS_RCM') ?></h1>

	<div role="tabpanel" id="" class="widget-catalog-categories-tab-content tab-pane active">
	<div class="widget-catalog-categories-slider-wrap">
	<div class="widget-catalog-categories-navigation personal">
		<div class="intec-aligner"></div>
		<div class="widget-catalog-categories-navigation-wrapper">
			<div class="widget-catalog-categories-navigation-previous" data-move="previous">
				<i class="fa fa-arrow-left intec-cl-text-hover"></i>
			</div>
			<div class="widget-catalog-categories-navigation-next" data-move="next">
				<i class="fa fa-arrow-right intec-cl-text-hover"></i>
			</div>
		</div>
	</div>

	<div class="widget-catalog-categories-slider owl-carousel personal">
	<?
	foreach ($arResult['ITEMS'] as $key => $arItem)
	{
	?>

		<div class="widget-catalog-categories-product">
			<div class="widget-catalog-categories-product-wrapper" id="<?=$arItem['ID']?>">
				<div class="widget-catalog-categories-product-substrate"></div>
				<div class="widget-catalog-categories-product-image">
					<a class="widget-catalog-categories-product-image-wrapper"
					   href="<?=$arItem['DETAIL_PAGE_URL']?>"
					   style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>')"
						>
						<div class="widget-catalog-categories-product-labels">
							<div class="widget-catalog-categories-product-labels-wrapper">
							</div>
						</div>
					</a>
				</div>
				<div class="widget-catalog-categories-product-name">
					<a class="widget-catalog-categories-product-name-wrapper"
					   href="<?=$arItem['DETAIL_PAGE_URL']?>">
						<?=$arItem['NAME']?>
					</a>
				</div>
				<div class="widget-catalog-categories-product-price">
						<span class="widget-catalog-categories-product-price-new">
						   <?=CurrencyFormat($arItem['CATALOG_PRICE_1'],$arItem['CATALOG_CURRENCY_1']);?>
						</span>
				</div>
			</div>
		</div>

	<?}?>

	</div>
	</div>
		<div class="widget-catalog-categories-dots personal"></div>
	</div>


	<script type="text/javascript">
		$(function(){
			$('.owl-carousel.personal').owlCarousel({
				'center': false,
				'loop': false,
				'stagePadding': 6,
				'nav': false,
				'dots': true,
				'dotsData': false,
				'dotsContainer': $('.widget-catalog-categories-dots.personal'),
				'responsive': {
					0: {'items': 1},
					600: {'items': 2},
					820: {'items': 3},
					1020: {'items': 4}
				}
			});

			$('.widget-catalog-categories-navigation.personal').find('[data-move]').on('click', function (event) {
				var self = $(this);
				var value = self.data('move');

				if (value == 'next') {
					$('.owl-carousel.personal').trigger('next.owl.carousel');
				} else if (value == 'previous') {
					$('.owl-carousel.personal').trigger('prev.owl.carousel');
				} else {
					$('.owl-carousel.personal').trigger('to.owl.carousel', [value])
				}
			});

		});
	</script>

<?
}

$frame->end();