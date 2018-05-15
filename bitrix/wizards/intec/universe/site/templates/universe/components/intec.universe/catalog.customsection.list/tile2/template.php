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

switch (intval($arParams['GRID_CATALOG_SECTIONS_COUNT'])) {
    case 2: $gridStyle = "col col-2"; break;
    case 3: $gridStyle = "col col-3"; break;
    case 4: $gridStyle = "col col-4"; break;
    case 5: $gridStyle = "col col-5"; break;
    case 6: $gridStyle = "col col-6"; break;
    default : $gridStyle = "col col-3"; break;
}
$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
if ($arResult["SECTIONS_COUNT"] > 0){?>
    <div class="intec-sections-tile-1">
        <?foreach($arResult['SECTIONS'] as $arSection) {
            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
            ?>
            <div class="<?=$gridStyle?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                <div class="element element-shadow intec-cl-text-light-hover clearfix">
                    <a class="image-wrap" href="<?=$arSection["SECTION_PAGE_URL"]?>">
                        <div class="image intec-image">
                            <div class="valign"></div>
                            <img src="<?=$arSection['PICTURE']['src']?>" alt="<?=$arSection['PICTURE']['imgAlt'];?>" title="<?=$arSection['PICTURE']['imgTitle'];?>"/>
                        </div>
                    </a>
                    <div class="intec-section-info <?=($arParams['USE_SUBSECTIONS'] != 'Y')?'without_submenu':''?>">
                        <a class="intec-section-name intec-cl-text-hover " href="<?=$arSection["SECTION_PAGE_URL"]?>">
                            <?=$arSection["NAME"];?> <?=$arParams["COUNT_ELEMENTS"]?' ('.$arSection["ELEMENT_CNT"].')':''?>
                        </a>
                    </div>
                </div>
            </div>
        <?}?>
    </div>
    <?if (!empty($arResult['IBLOCK']['DESCRIPTION'])){?>
        <div class="description"><?=$arResult['IBLOCK']['DESCRIPTION']?></div>';
    <?}?>
<?}?>
