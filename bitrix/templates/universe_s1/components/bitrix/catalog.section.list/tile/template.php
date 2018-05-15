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

switch ($arParams['GRID_CATALOG_SECTIONS_COUNT']) {
    case '2': $gridStyle = "col-lg-6 col-md-6 col-sm-6 col-xs-6"; break;
    case '3': $gridStyle = "col-lg-4 col-md-4 col-sm-4 col-xs-6"; break;
    case '4': $gridStyle = "col-lg-3 col-md-3 col-sm-4 col-xs-6"; break;
    default : $gridStyle = "col-lg-3 col-md-3 col-sm-4 col-xs-6"; break;
}
$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
if ($arResult["SECTIONS_COUNT"] > 0){?>
    <div class="intec-sections-tile row auto-clear">
        <?foreach($arResult['SECTIONS'] as $arSection) {

            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);?>
            <div class="<?=$gridStyle?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                <div class="element <?=($arParams['USE_SUBSECTIONS'] != 'Y')?'element-shadow':''?>">
                    <a class="image-wrap" href="<?=$arSection["SECTION_PAGE_URL"]?>">
                        <div class="image intec-image">
                            <div class="valign"></div>
                            <img src="<?=$arSection['PICTURE']['src']?>" alt="<?=$arSection['PICTURE']['imgAlt'];?>" title="<?=$arSection['PICTURE']['imgTitle'];?>"/>
                        </div>
                    </a>
                    <div class="intec-section-info <?=($arParams['USE_SUBSECTIONS'] != 'Y')?'without_submenu':''?>">
                        <a class="intec-section-name intec-cl-text-dark-hover intec-cl-text" href="<?=$arSection["SECTION_PAGE_URL"]?>">
                            <?=$arSection["NAME"];?> <?=$arParams["COUNT_ELEMENTS"]?' ('.$arSection["ELEMENT_CNT"].')':''?>
                        </a>
                        <?if ($arParams['USE_SUBSECTIONS'] == 'Y' && !empty($arSection['SUBSECTIONS'])) {?>
                            <div class="intec-section-subsections">
                                <?foreach ($arSection['SUBSECTIONS'] as $subsection) {?>
                                    <a href="<?=$subsection['SECTION_PAGE_URL']?>" class="intec-section-subsection">
                                        <?=$subsection['NAME']?>
                                        <?=($arParams['COUNT_ELEMENTS']== 'Y' && $subsection['ELEMENT_CNT']>0)?' ('.$subsection['ELEMENT_CNT'].')':'' ?>
                                    </a>
                                <?}?>
                            </div>
                        <?}?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        <?}?>
        <div class="clearfix"></div>
    </div>
    <?if (!empty($arResult['IBLOCK']['DESCRIPTION'])){?>
        <div class="description"><?=$arResult['IBLOCK']['DESCRIPTION']?></div>';
    <?}?>
<?}?>
