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
use intec\core\helpers\JavaScript;

$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);

switch ($arParams['GRID_CATALOG_SECTIONS_COUNT']) {
    case '2': $gridStyle = "col-lg-6 col-md-6 col-sm-6 col-xs-12"; break;
    case '3': $gridStyle = "col-lg-4 col-md-6 col-sm-6 col-xs-12"; break;
    case '4': $gridStyle = 'col-lg-3 col-md-6 col-sm-6 col-xs-12'; break;
    case '6': $gridStyle = 'col-lg-2 col-md-6 col-sm-6 col-xs-12'; break;
    default : $gridStyle = "col-lg-6 col-md-6 col-sm-6 col-xs-12"; break;
}

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

if (0 < $arResult["SECTIONS_COUNT"]){?>
    <div class="intec-sections-list" id="<?= $sTemplateId ?>">
        <?foreach($arResult['SECTIONS'] as $arSection) {

            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);?>
            <div class="element-wrapper <?=$gridStyle?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                <div class="element <?=($arParams['USE_SUBSECTIONS']=='Y')?'with_subsections':''?>">
                    <a class="image intec-image" href="<?=$arSection["SECTION_PAGE_URL"]?>">
                        <div class="intec-aligner"></div>
                        <img class="align-middle" src="<?=$arSection['PICTURE']['src']?>" alt="<?=$arSection['PICTURE']['imgAlt'];?>" title="<?=$arSection['PICTURE']['imgTitle'];?>"/>
                    </a>
                    <div class="intec-section-info">
                        <div>
                            <a class="intec-section-name" href="<?=$arSection["SECTION_PAGE_URL"]?>">
                                <?=$arSection["NAME"];?>
                                <?=($arParams["COUNT_ELEMENTS"] == 'Y' && $arParams['USE_SUBSECTIONS']!='Y')?
                                    ' ('.$arSection["ELEMENT_CNT"].')':''?>
                            </a>
                        </div>
                        <?if ($arParams['USE_SUBSECTIONS'] == 'Y' && count($arSection['SUBSECTIONS']) > 0) {?>
                            <div class="intec-subsections">
                                <?foreach ($arSection['SUBSECTIONS'] as $subsection) {?>
                                    <a href="<?=$subsection['SECTION_PAGE_URL']?>" class="intec-subsection">
                                        <?=$subsection['NAME']?>
                                        <?=($arParams['COUNT_ELEMENTS'] == 'Y' && $subsection['ELEMENT_CNT']>0)?
                                            ' <span>'.$subsection['ELEMENT_CNT'].'</span>':''
                                        ?>
                                    </a>
                                <?}?>
                            </div>
                        <?}?>
                        <?if ($arParams['SECTIONS_DISPLAY_DESCRIPTION'] == 'Y' && $arParams['USE_SUBSECTIONS'] != 'Y') {?>
                            <div class="intec-section-description">
                                <?=$arSection['DESCRIPTION'];?>
                            </div>
                        <?}?>
                    </div>
                    <div class="clearfix"></div>
                    <?if ($arParams['SECTIONS_DISPLAY_DESCRIPTION'] == 'Y' && $arParams['USE_SUBSECTIONS'] == 'Y') {?>
                        <div class="intec-section-description">
                            <?=$arSection['DESCRIPTION'];?>
                        </div>
                    <?}?>
                </div>
            </div>
        <?}?>
        <div class="clearfix"></div>
    </div>
    <?if (!empty($arResult['IBLOCK']['DESCRIPTION'])){?>
        <div class="description"><?=$arResult['IBLOCK']['DESCRIPTION']?></div>';
    <?}?>
<?}?>

<script>
    (function ($, api) {
        var root = $(<?= JavaScript::toObject('#'.$sTemplateId) ?>);
        var adapt = function () {
            var $index = Math.round(root.innerWidth()/root.find('.element-wrapper').outerWidth());
            var $element = root.find('.element-wrapper');

            for (var i = 0, l = $element.length; i < l; i += $index) {
                var $maxHeight = 0;
                for (var i2 = i; i2 < i + $index; i2++) {
                    $($element[i2]).css({'height': 'auto'});
                    if ($($element[i2]).innerHeight() > $maxHeight) {
                        $maxHeight = $($element[i2]).innerHeight();
                    }
                }
                for (var i2 = i; i2 < i + $index; i2++) {
                    $($element[i2]).height($maxHeight);
                }
            }
        }

        $(window).load(adapt);
        $(window).resize(adapt);
    })(jQuery, intec);
</script>
