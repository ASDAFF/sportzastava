<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

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

$gridStyle = 'col-lg-3 col-md-6 col-sm-6 col-xs-12';

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));?>

<div class="catalog-title-popup">
    <?=GetMessage('CATALOG_TITLE');?>
</div>
<?php if ($arResult["SECTIONS_COUNT"] > 0) { ?>
    <div class="intec-sections-list-popup auto-clear nano">
        <div class="nano-content">
            <?php foreach ($arResult['SECTIONS'] as $arSection) {

				if ($arSection['DEPTH_LEVEL'] == 1) {
			?>
					<div class="<?= $gridStyle ?>">
						<div class="element ">
							<div class="intec-section-info">
								<div class="section-name-wrapper">
									<a class="intec-section-name intec-cl-text-hover" href="<?= $arSection["SECTION_PAGE_URL"] ?>">
										<?= $arSection["NAME"] ?>
									</a>
									<?php if (count($arSection['SUBSECTIONS']) > 0) { ?>
										<i class="fa fa-angle-down intec-cl-background-hover"></i>
									<?php } ?>
								</div>
								<?php if (count($arSection['SUBSECTIONS']) > 0) { ?>
									<div class="intec-subsections" style="display: none">
										<?php foreach ($arSection['SUBSECTIONS'] as $subsection) { ?>
											<a href="<?= $subsection['SECTION_PAGE_URL'] ?>" class="intec-subsection intec-cl-text-hover">
												<?= $subsection['NAME'] ?>
												<?= $subsection['ELEMENT_CNT'] > 0 ? ' <span>'.$subsection['ELEMENT_CNT'].'</span>' : '' ?>
											</a>
										<?php } ?>
									</div>
								<?php } ?>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				<?php } ?>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
    <script>
        $(window).ready(function() {
            var popup_catalog_height = $(this).outerHeight() - 300;
            $('.intec-sections-list-popup').css({
                'height': popup_catalog_height+'px'
            });
        });
        $(window).resize(function() {
            var popup_catalog_height = $(this).outerHeight() - 300;
            $('.intec-sections-list-popup').css({
                'height': popup_catalog_height+'px'
            });
            $('.intec-sections-list-popup.nano').nanoScroller();
        });

        $('.fa-angle-down').on("click", function (event) {
            var container = $(this).parent();
            var sections = container.siblings('.intec-subsections');

            console.log(sections);
            sections.slideToggle(250);
        });
    </script>
<?php } ?>