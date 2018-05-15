<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>
<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
    $INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
    $CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);?>
<?if ($arParams['TYPE_SEARCH_FORM'] == 'popup') {?>
    <div class="intec-search">
        <button class="header-info-button intec-search-form-btn intec-cl-text-hover">
            <i class="intec-search-icon glyph-icon-loop intec-cl-text" aria-hidden="true"></i>
            <span class="search-title intec-cl-text-hover">
			<?=GetMessage('BSF_T_SEARCH_BUTTON')?>
		</span>
        </button>
    </div>

    <div class="intec-search-form-popup">
        <div class="search-form-popup-wrap">
            <div id = "<?=$CONTAINER_ID?>" class="intec-content-wrapper">
                <form action = "<?=$arResult["FORM_ACTION"]?>" class="intec-search-form">
                    <button type="submit" class="intec-search-icon glyph-icon-loop" aria-hidden="true"></button>
                    <input id = "<?=$INPUT_ID?>" class="intec-search-input" type = "text" name = "q" value = "" maxlength="50"  autocomplete = "off" placeholder="<?=GetMessage('SEARCH_INPUT_PLACEHOLDER');?>"/>
                    <i class="fa fa-times intec-search-close" aria-hidden="true"></i>
                </form>
            </div>
        </div>
    </div>
    <div class="intec-search-form-overlay">

    </div>
    <script>
        BX.ready(function(){
            new JCTitleSearch({
                'AJAX_PAGE' : '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
                'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
                'INPUT_ID': '<?echo $INPUT_ID?>',
                'MIN_QUERY_LEN': 2
            });
        });

        $(document).on('click', '.intec-search-form-btn', function() {
            $('.intec-search-form-overlay').show();

            $('.intec-search-form-popup').animate(
                {
                    opacity: 1,
                    top: "0"
                },
                300,
                function() {
                    $('#<?=$INPUT_ID?>').focus();
                }
            );
        });
        $(document).on('click', '.intec-search-form-overlay, .intec-search-close', function() {
            $('.intec-search-input').blur();
            $('.intec-search-form-popup').animate({
                opacity: 0,
                top: "-150"
            }, 300);
            $('.intec-search-form-overlay').hide();
        });
    </script>
<?}else if ($arParams['TYPE_SEARCH_FORM'] == 'fixed_without_container'){?>
    <div class="intec-search intec-search-header-fixed">
        <button class="header-info-button intec-search-form-btn intec-cl-text-hover">
            <i class="intec-search-icon glyph-icon-loop intec-cl-hover-text" aria-hidden="true"></i>
        </button>
    </div>
<?}else if ($arParams['TYPE_SEARCH_FORM'] == 'fixed_with_container'){?>
    <div class="intec-search intec-search-header-fixed">
        <button class="header-info-button intec-search-form-btn intec-cl-text-hover">
            <i class="intec-search-icon glyph-icon-loop intec-cl-text-hover" aria-hidden="true"></i>
        </button>
    </div>
    <div class="intec-search-form-popup">
        <div class="search-form-popup-wrap">
            <div id = "<?=$CONTAINER_ID?>" class="intec-content-wrapper">
                <form action = "<?=$arResult["FORM_ACTION"]?>" class="intec-search-form">
                    <button type="submit" class="intec-search-icon glyph-icon-loop" aria-hidden="true"></button>
                    <input id = "<?=$INPUT_ID?>" class="intec-search-input" type = "text" name = "q" value = "" maxlength="50"  autocomplete = "off" placeholder="<?=GetMessage('SEARCH_INPUT_PLACEHOLDER');?>"/>
                    <i class="fa fa-times intec-search-close" aria-hidden="true"></i>
                </form>
            </div>
        </div>
    </div>
    <div class="intec-search-form-overlay">

    </div>
    <script>
        BX.ready(function(){
            new JCTitleSearch({
                'AJAX_PAGE' : '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
                'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
                'INPUT_ID': '<?echo $INPUT_ID?>',
                'MIN_QUERY_LEN': 2
            });
        });

        $(document).on('click', '.intec-search-form-btn', function() {
            $('.intec-search-form-overlay').show();
            $('.intec-search-form-popup').animate(
                {
                    opacity: 1,
                    top: "0"
                },
                300,
                function() {
                    $('#<?=$INPUT_ID?>').focus();
                }
            );
        });
        $(document).on('click', '.intec-search-form-overlay, .intec-search-close', function() {
            $('.intec-search-input').blur();
            $('.intec-search-form-popup').animate({
                opacity: 0,
                top: "-150"
            }, 300);
            $('.intec-search-form-overlay').hide();
        });
    </script>
<?} else {?>
    <div class="intec-search-normal <?=($arParams['POSITION_SEARCH']=='header')?'intec-search-normal-header':'intec-search-normal-top'?>">
        <div class="intec-search-normal-wrapper">
            <form action = "<?=$arResult["FORM_ACTION"]?>" class="intec-search-form">
                <button type="submit" class="intec-search-icon glyph-icon-loop intec-cl-text" aria-hidden="true"></button>
                <input class="intec-search-input" type = "text" name = "q" value = "" maxlength="50"  autocomplete = "off" placeholder="<?=GetMessage('SEARCH_INPUT_PLACEHOLDER_NRM');?>"/>
            </form>
        </div>
    </div>
<?}?>