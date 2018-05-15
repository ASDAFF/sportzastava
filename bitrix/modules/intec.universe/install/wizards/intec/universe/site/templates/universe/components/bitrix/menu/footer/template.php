<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 */
$this->setFrameMode(true);?>
<?if (!empty($arResult)){?>
	<?$i = 0;?>
	<div class="footer-menu">
		<?foreach($arResult as $arItem) {?>
			<?if($i > 2) {
				break;
			}
			$i++;?>
			<div class="root-item">
				<a href="<?=$arItem["LINK"]?>" class="root-link intec-cl-text <?=$arItem["SELECTED"]?"active":""?>">
					<?=$arItem["TEXT"];?>
				</a>
				<?if($arItem["ITEMS"]) {?>
					<ul class="child-menu">
						<?foreach($arItem["ITEMS"] as $child) { ?>
							<li class="child-item">
								<a href="<?=$child["LINK"]?>" class="child-link intec-cl-text-hover <?=$child["SELECTED"]?"active":""?>">
									<?=$child["TEXT"]?>
								</a>
							</li>
						<?}?>
					</ul>
				<?}?>
			</div>
		<?}?>
	</div>
<?}?>