<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\constructor\models\Build;

/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var CBitrixComponent $component
 */

$this->setFrameMode(true);

$build = Build::getCurrent();
$page = $build->getPage();
$properties = $page->getProperties();
$templateCertificates = $properties->get('template_certificates');
if ($arParams['DESKTOP_TEMPLATE'] == 'settings') {
    if (in_array($templateCertificates, ['list', 'tiles'])) {
        $arParams['DESKTOP_TEMPLATE'] = $templateCertificates;
    } else {
        $arParams['DESKTOP_TEMPLATE'] = 'list';
    }
}
?>
<div id="<?= $arResult['COMPONENT_HASH'] ?>" class="intec-content intec-content-visible">
    <div class="intec-certificates desktop-template template-<?= $arParams['DESKTOP_TEMPLATE'] ?>">
        <?php if ($arParams['DISPLAY_TOP_PAGER']) {
            echo $arResult['NAV_STRING'];
        } ?>
        <div class="intec-certificates_list">
            <?php foreach ($arResult['ITEMS'] as $item) {
                $itemData = $item['CUSTOM_DATA'];
                ?>
                <div class="intec-certificates_item clearfix">
                    <div class="intec-certificates_wrap" data-src="<?= $itemData['DETAIL_IMAGE'] ?>">
                        <div class="intec-certificates_image"
                             data-src="<?= $itemData['DETAIL_IMAGE'] ?>"
                             style="background-image: url('<?= $itemData['PREVIEW_IMAGE'] ?>');">
                            <img src="<?= $itemData['PREVIEW_IMAGE'] ?>" />
                        </div>
                        <div class="intec-certificates_name"><?= $item['NAME'] ?></div>
                        <div class="intec-certificates_description"><?= $item['PREVIEW_TEXT'] ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php if ($arParams['DISPLAY_BOTTOM_PAGER']) {
            echo $arResult['NAV_STRING'];
        } ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        <?php switch ($arParams['DESKTOP_TEMPLATE']) {
            case 'tiles':
                ?>
                $('#<?= $arResult['COMPONENT_HASH'] ?> .intec-certificates_list').lightGallery({
                    selector: '.intec-certificates_wrap',
                    autoplay: false,
                    share: false
                });
                <?php
                 break;
            case 'list':
                ?>
                $('#<?= $arResult['COMPONENT_HASH'] ?> .intec-certificates_list').lightGallery({
                    selector: '.intec-certificates_image',
                    autoplay: false,
                    share: false
                });
                <?php
                break;
        } ?>
    });
</script>
