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
$this->setFrameMode(true);
?>
<div class="photo-gallery-section clearfix">
    <?foreach($arResult["ITEMS"] as $arItem){
        if($arResult["USER_HAVE_ACCESS"]){
            if(is_array($arItem["PICTURE"])){
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
                ?>
                <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="photo-gallery-section-item-wrapper" data-src="<?= $arItem["PICTURE"]["SRC"]?>">
                    <div class="photo-gallery-section-item-wrapper-wrapper2" style="background-image: url('<?=$arItem["PICTURE"]["SRC"]?>');">
                        <img class="photo-section-item-wrapper-img"
                             src="<?= $arItem["PICTURE"]["SRC"]?>"
                             alt="<?= $arItem["PICTURE"]["ALT"]?>"
                             title="<?= $arItem["PICTURE"]["TITLE"]?>"
                        />
                        <span class="photo-gallery-section-item-search-plus fa fa-search-plus"></span>
                    </div>
                </div>
            <?}?>
        <?}?>
    <?}?>
</div>
<?if(count($arResult["ITEMS"])):?>
    <div class="btn-block">
        <a href="<?=$arParams["SECTION_TOP_URL"]?>"
           class="intec-button intec-button-s-2 intec-button-cl-default intec-button-transparent photo-section-list-sections-a">
            <span class="photo-section-list-sections-a-read-more-angle fa fa-angle-left"></span>
            <span class="photo-section-btn-list-sections"><?= GetMessage('CT_BPS_ELEMENT_RETURN_ALBUM');?></span>
        </a>
    </div>
<?endif;?>

<script>
    $('.photo-gallery-section').lightGallery({
        animateThumb: false,
        thumbnail: true
    });
</script>