<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="reviews landing-1">
    <?
        $arMainElements = array();
        $arAdditionalElements = array();

        $arMainElements = $arResult['ITEMS'];
        
        $bFirst = true;
    ?>
    <div class="reviews-main">
        <?foreach ($arMainElements as $arReview):?>
            <div class="reviews-review<?=$bFirst ? ' reviews-review-first' : ''?>">
                <div class="review-picture-block">
                    <?if (!empty($arReview['PREVIEW_PICTURE'])):?>
                        <div class="reviews-review-image"
                             style="background-image:url(<?=$arReview['PREVIEW_PICTURE']["SRC"]?>)">
                            <img src="<?=$arReview['PREVIEW_PICTURE']["SRC"]?>" style="display:none;" />
                        </div>
                    <?endif;?>
					<div class="picture-text-block">
						<div class="reviews-review-information-author solid_text">
							<?=$arReview['PROPERTIES'][$arParams["NAME_PROP_AUTOR_REVIEW"]]['VALUE']?>
						</div>
						<div class="reviews-review-information-company">
							<?=$arReview['PROPERTIES'][$arParams["NAME_PROP_COMPANY_REVIEW"]]['VALUE']?>
						</div>
					</div>
				</div>
                <div class="reviews-review-information">
                    <div class="reviews-review-information-description">
                        <?=$arReview['PREVIEW_TEXT']?>
                    </div>
                </div>
                <div class="reviews-clear"></div>
            </div>
            <?$bFirst ? $bFirst = false : false?>
        <?endforeach;?>
    </div>
    <?if (!empty($arAdditionalElements) && empty($arParams['LINK_TO_ELEMENTS'])):?>
        <div class="reviews-hideable">
            <?foreach ($arAdditionalElements as $arReview):?>
               <div class="reviews-review<?=$bFirst ? ' reviews-review-first' : ''?>">
                <div class="review-picture-block">
					<div class="reviews-review-image">
						<?if (!empty($arReview['PICTURE'])):?>
							<div class="uni-image">
								<div class="uni-aligner-vertical"></div>
								<img src="<?=$arReview['PICTURE']?>" />
							</div>
						<?endif;?>
					</div>
					<div class="picture-text-block">
						<div class="reviews-review-information-author solid_text">
							<?=$arReview['PROPERTIES']['autor']['VALUE']?>
						</div>
						<div class="reviews-review-information-company">
							<?=$arReview['PROPERTIES']['company']['VALUE']?>
						</div>
					</div>
				</div>
                <div class="reviews-review-information">
                    <div class="reviews-review-information-description">
                        <?=$arReview['PREVIEW_TEXT']?>
                    </div>
                </div>
                <div class="reviews-clear"></div>
            </div>
            <?endforeach;?>
        </div>
        <div class="uni-indents-vertical indent-25"></div>
        <div class="reviews-buttons">
            <div class="reviews-buttons-more">
                <div class="reviews-buttons-more-text">
                    <?=GetMessage("REVIEWS_BUTTONS_MORE_TEXT")?>
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('.reviews.landing-1 .reviews-buttons .reviews-buttons-more').click(function(){
                            var $oAdditionalButton = $(this);
                            var $oAdditionalImages = $(this).parent().parent().children('.reviews-hideable');
                            
                            if ($oAdditionalImages.css('display') == 'none')
                            {
                                $oAdditionalImages.css({'display':'block', 'height':'auto'});
                                var $sHeight = $oAdditionalImages.height();
                                $oAdditionalImages.css('height', '0px');
                                $oAdditionalImages.stop().animate({'height':$sHeight + 'px'}, 500, function(){
                                    $oAdditionalImages.css('height', 'auto');
                                    $oAdditionalButton.addClass('ui-state-active');
                                });
                            }
                            else
                            {
                                $oAdditionalImages.stop().animate({'height':'0px'}, 500, function(){
                                    $oAdditionalImages.css('height', 'auto');
                                    $oAdditionalImages.css('display', 'none');
                                    $oAdditionalButton.removeClass('ui-state-active');
                                });
                                
                            }
                        })
                    })
                </script>
            </div>
        </div>
    <?endif;?>
    <?if (!empty($arParams['LINK_TO_ELEMENTS'])):?>
        <div class="uni-indents-vertical indent-15"></div>
        <div class="reviews-buttons">
            <a class="reviews-buttons-more-link" href="<?=$arParams['LINK_TO_ELEMENTS']?>">
                <div class="reviews-buttons-more-link-text">
                    <?=GetMessage("REVIEWS_BUTTONS_MORE_TEXT")?>
                </div>
            </a>
        </div>
    <?endif;?>
</div>