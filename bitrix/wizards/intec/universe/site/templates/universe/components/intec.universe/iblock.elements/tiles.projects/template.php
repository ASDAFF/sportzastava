<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="projects clearfix">
    <div class="projects-items">
        <div class="projects-items-wrapper">
            <?foreach ($arResult['ITEMS'] as $arItem):?>
                <?
                    $sListPageUrl = $arElement['LIST_PAGE_URL'];
                    $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="projects-item">
                    <div class="projects-item-wrapper" id="<?= $sAreaId ?>">
                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"
                           class="projects-item-wrapper-2"
                           style="background-image: url('<?= $arItem['PREVIEW_PICTURE']["SRC"] ?>')">
                            <div class="projects-item-name">
                                <div class="projects-item-name-wrapper">
                                    <?= $arItem['NAME'] ?>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
</div>