<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="video">
	<div class="video-section">
		<div class="video-wrapper row" id="video-gallery">
			<?foreach ($arResult['ITEMS'] as $arVideo):?>
				<div class="video-tile col-xs-12 col-md-6 col-lg-4">
					<div class="video-tile-wrapper">
						<?$arFile = CFile::GetFileArray($arVideo["PREVIEW_PICTURE"]["ID"]);
						?>
						<?
						if($arVideo['PROPERTIES'][$arParams["NAME_PROP_URL_VIDEO"]]['VALUE']){
							preg_match("/https:\/\/www\.youtube\.com\/embed\/(.*)/",
								$arVideo['PROPERTIES'][$arParams["NAME_PROP_URL_VIDEO"]]['VALUE'],
								$matches);
							$img = "https://img.youtube.com/vi/{$matches[1]}/hqdefault.jpg";
						}
						?>
						<a class="one-video various"
                           data-src="<?=$arVideo['PROPERTIES'][$arParams["NAME_PROP_URL_VIDEO"]]['VALUE']?>"
                           style="background-image:url(<?=$img?>)">
							<span class="name-video">
								<?=$arVideo["NAME"]?>
							</span>
							<span class="data-video">
								<?=$arVideo["DATE_CREATE"];?>
							</span>
						</a>
					</div>
				</div>				
			<?endforeach;?>
		</div>
	</div>
</div>
<script>
    $(document).ready(function() {
        $('#video-gallery').lightGallery({
			selector: '.one-video'
		});
    });
</script>