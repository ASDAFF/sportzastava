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

if (0 < $arResult["SECTIONS_COUNT"]){?>
    <div class="intec-sections-list-1">
        <?foreach($arResult['SECTIONS'] as $arSection) {
            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
            ?>
            <div class="<?=$gridStyle?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                <div class="element <?=($arParams['USE_SUBSECTIONS']=='Y')?'with_subsections':''?>">
                    <a class="image intec-image" href="<?=$arSection["SECTION_PAGE_URL"]?>">
                        <div class="intec-aligner"></div>
                        <img class="align-middle" src="<?=$arSection['PICTURE']['src']?>" alt="<?=$arSection['PICTURE']['imgAlt'];?>" title="<?=$arSection['PICTURE']['imgTitle'];?>"/>
                    </a>
                    <div class="intec-section-info">
                        <div>
                            <a class="intec-section-name intec-cl-text-light-hover" href="<?=$arSection["SECTION_PAGE_URL"]?>">
                                <?=$arSection["NAME"];?>
                                <?=($arParams["COUNT_ELEMENTS"] == 'Y' && $arParams['USE_SUBSECTIONS']!='Y')?
                                    ' ('.$arSection["ELEMENT_CNT"].')':''?>
                            </a>
                        </div>
                        <?if ($arParams['USE_SUBSECTIONS'] == 'Y' && count($arSection['SUBSECTIONS']) > 0) {?>
                            <div class="intec-subsections">
                                <?foreach ($arSection['SUBSECTIONS'] as $subsection) {?>
                                    <a href="<?=$subsection['SECTION_PAGE_URL']?>" class="intec-subsection intec-cl-text-light-hover">
                                        <?=$subsection['NAME']?>
                                        <?=($arParams['COUNT_ELEMENTS'] == 'Y' && $subsection['ELEMENT_CNT']>0)?
                                            ' <span class="intec-cl-text-light-hover">'.$subsection['ELEMENT_CNT'].'</span>':''
                                        ?>
                                    </a>
                                <?}?>
                            </div>
                        <?}?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        <?}?>
    </div>
<?}?>