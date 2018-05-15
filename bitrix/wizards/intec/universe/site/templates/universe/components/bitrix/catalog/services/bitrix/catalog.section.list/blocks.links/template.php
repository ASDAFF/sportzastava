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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));?>

<?if (0 < $arResult["SECTIONS_COUNT"]):?>
    <?if ($arParams['VIEW_MODE'] == 'MENU'):?>
        <ul class="menu">
            <?foreach ($arResult['SECTIONS'] as &$arSection):?>
                <?$arButtons = CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], 0, $arSection['ID']);
                $this->AddEditAction($arSection['ID'], $arButtons['edit']['edit_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_CHANGE'));
                $this->AddDeleteAction($arSection['ID'], $arButtons['edit']['delete_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_DELETE'), $arSectionDeleteParams);?>

                <div class="element <?=$arSection['ID'] == $arResult['SECTION']['ID'] ? ' selected' : ''?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                    <li class="element-menu"><a href="<? echo $arSection["SECTION_PAGE_URL"]; ?>"><? echo $arSection["NAME"];?></a></li>
                </div>
            <?endforeach;?>
        </ul>
    <?elseif ($arParams['VIEW_MODE'] == 'TEXT'):?>
        <div class="services-sections-list uni_parent_col text">
            <?foreach ($arResult['SECTIONS'] as &$arSection):?>
                <?$arButtons = CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], 0, $arSection['ID']);

                $this->AddEditAction($arSection['ID'], $arButtons['edit']['edit_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_CHANGE'));
                $this->AddDeleteAction($arSection['ID'], $arButtons['edit']['delete_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_DELETE'), $arSectionDeleteParams);?>
                <div class="element uni_col uni-50" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                    <div class="content">
                        <a href="<? echo $arSection["SECTION_PAGE_URL"]; ?>">
                            <div class="name"><? echo $arSection["NAME"];?></div>
                            <div class="description"><? echo $arSection["DESCRIPTION"];?></div>
                        </a>
                    </div>
                </div>
            <?endforeach;?>
            <div class="description"><?=$arResult['IBLOCK']['DESCRIPTION']?></div>
        </div>
    <?else:?>
        <div class="container-catalog  <?if($arParams['SHOW_EXTEND_IMAGE'] == 'CIRCLE'):?><?= 'circle'?><?endif;?>">
            <?
            $count_border = 1;
            $arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID']);
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), false);
            $arSec = array();
            while($arR = $res->GetNext())
                $arSec[$arR['IBLOCK_SECTION_ID']][] = $arR['NAME'];

            foreach ($arResult['SECTIONS'] as &$arSection):?>
                <?$picture = array();
                $picture['src'] = SITE_TEMPLATE_PATH."/images/noimg/no-img.png";
                if (!empty($arSection['PICTURE']))
                    $picture = CFile::ResizeImageGet($arSection['PICTURE']['ID'], array('width' => 500, 'height' => 500, BX_RESIZE_IMAGE_PROPORTIONAL_ALT));
                $arButtons = CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], 0, $arSection['ID']);
                $this->AddEditAction($arSection['ID'], $arButtons['edit']['edit_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_CHANGE'));
                $this->AddDeleteAction($arSection['ID'], $arButtons['edit']['delete_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_DELETE'), $arSectionDeleteParams);?>
                <div class="element-catalog" <?if($arResult['SECTIONS_COUNT'] == $count_border):?><?= 'style="border-bottom: none;"'?><?endif;?> id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                    <div class="img-element">
                        <a href="<? echo $arSection["SECTION_PAGE_URL"]; ?>"><img class="" src="<?=$picture['src']?>"></a>
                    </div>
                    <div class="description-element ">
                        <a class="intec-cl-text" href="<? echo $arSection["SECTION_PAGE_URL"]; ?>"><? echo $arSection["NAME"];?></a>
                        <ul class="ul-list-catalog">
                            <?foreach ($arSec as $key => $arValue) {
                                foreach ($arValue as $value){
                                    if ($arSection['~ID'] == $key) {
                                        ?>
                                        <li class="intec-cl-text">
                                            <span><?= $value ?></span>
                                        </li>
                                    <?
                                    }
                                }
                            }?>
                        </ul>
                    </div>
                </div>

                <?$count_border++;?>
            <?endforeach;?>
        </div>
    <?endif;?>
<?endif;?>