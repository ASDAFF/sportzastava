<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
\Bitrix\Main\Loader::includeModule("intec.core");
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
$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT'])) {
    $navParams =  array(
        'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
        'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
        'NavNum' => $arResult['NAV_RESULT']->NavNum
    );
} else {
    $navParams = array(
        'NavPageCount' => 1,
        'NavPageNomer' => 1,
        'NavNum' => $this->randString()
    );
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;
$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
    $showTopPager = $arParams['DISPLAY_TOP_PAGER'];
    $showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
    $showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}
?>
<div class="description uni-text-default uni_col uni-100<?=empty($arResult['ITEMS'])?' only':''?>">
    <?=$arResult['DESCRIPTION']?>
</div>
<div class="clear"></div>
<!-- items-container -->
<div class="container-catalog" data-entity="<?=$containerName?>">
    <?
    $count_border = 1;

    $arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), false);
    $arSec = array();
    $i = 0;
    while($arR = $res->GetNext()) {
        $arSec[$i] = array($arR['IBLOCK_SECTION_ID'] => $arR['NAME']);
        $i++;
    }

    foreach ($arResult['ITEMS'] as &$arElement) {
        $picture = array();
        $picture['src'] = SITE_TEMPLATE_PATH."/images/noimg/no-img.png";

        if (!empty($arElement['PREVIEW_PICTURE']))
        {
            $picture = CFile::ResizeImageGet($arElement['PREVIEW_PICTURE']['ID'], array('width' => 500, 'height' => 500, BX_RESIZE_IMAGE_PROPORTIONAL_ALT));
        }
        else if (!empty($arElement['DETAIL_PICTURE']))
        {
            $picture = CFile::ResizeImageGet($arElement['DETAIL_PICTURE']['ID'], array('width' => 500, 'height' => 500, BX_RESIZE_IMAGE_PROPORTIONAL_ALT));
        }


        $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div class="element-catalog"
             style="<?=$arResult['SECTIONS_COUNT'] == $count_border?'border-bottom: none;':""?>
                    <?=count($arResult['ITEMS']) == 1?'width: unset;':''?>"
             data-entity="items-row"
             id="<?=$this->GetEditAreaId($arSection['ID']);?>">
            <div class="img-element">
                <a href="<? echo $arElement["DETAIL_PAGE_URL"]; ?>">
                    <img class="" src="<?=$picture['src']?>">
                </a>
            </div>
            <div class="description-element">
                <a href="<? echo $arElement["DETAIL_PAGE_URL"]; ?>">
                    <? echo $arElement["NAME"];?>
                </a>
                <ul class="ul-list-catalog">
                    <? foreach ($arSec as $s) {
                        foreach ($s as $key => $value) {
                            if ($arElement['~ID'] == $key) {?>
                                <li>
                                    <span>
                                        <?=$value?>
                                    </span>
                                </li>
                            <?}
                        }
                    }?>
                </ul>
                <a class="read-more" href="<? echo $arElement["DETAIL_PAGE_URL"]; ?>">
                    <span class="read-more-span-word">
                        <?=GetMessage("BLOCKS_READ_MORE");?>
                    </span>
                    <span class="read-more-span-cursor  fa fa-angle-right">

                    </span>
                </a>
            </div>
        </div>
        <?$count_border++;?>
        <?
    }
    ?>
    <div class="clear"></div>
</div>
<!-- items-container -->

<?if ($showLazyLoad){ ?>
    <div class="row bx-<?=$arParams['TEMPLATE_THEME']?>">
        <div class="show-more show-more-btn intec-cl-text"
             data-use="show-more-<?=$navParams['NavNum']?>">
            <i class="glyph-icon-show-more intec-cl-background"></i>
            <?=$arParams['MESS_BTN_LAZY_LOAD']?>
        </div>
    </div>
<? }
if ($showBottomPager) {?>
    <div data-pagination-num="<?=$navParams['NavNum']?>">
        <!-- pagination-container -->
        <?=$arResult['NAV_STRING']?>
        <!-- pagination-container -->
    </div>
    <?
}?>
<?
$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<script>
    BX.message({
        BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
        BASKET_URL: '<?=$arParams['BASKET_URL']?>',
        ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
        TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
        TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
        TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
        BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
        BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
        BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
        BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
        COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
        COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
        COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
        PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
        RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
        RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
        BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
        BTN_MESSAGE_LAZY_LOAD: '<?=$arParams['MESS_BTN_LAZY_LOAD']?>',
        BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER')?>',
        SITE_ID: '<?=SITE_ID?>'
    });
    var <?=$obName?> = new JCCatalogSectionComponent({
        siteId: '<?=CUtil::JSEscape(SITE_ID)?>',
        componentPath: '<?=CUtil::JSEscape($componentPath)?>',
        navParams: <?=CUtil::PhpToJSObject($navParams)?>,
        deferredLoad: false, // enable it for deferred load
        initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
        bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
        lazyLoad: !!'<?=$showLazyLoad?>',
        loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
        template: '<?=CUtil::JSEscape($signedTemplate)?>',
        ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'])?>',
        parameters: '<?=CUtil::JSEscape($signedParams)?>',
        container: '<?=$containerName?>'
    });
</script>



