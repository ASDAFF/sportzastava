<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

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

?>
<a class="share-back-link intec-cl-text intec-cl-text-light-hover" href="<?= $arResult['LIST_PAGE_URL'] ?>">
    <span class="back-link-icon fa fa-angle-left"></span>
    <span class="back-link-text"><?= GetMessage('ALL_SHARE') ?></span>
</a>
<?php if ($arParams['USE_SHARE'] == 'Y') { ?>
    <div class="share-social-block">
        <span class="social-block-header"><?= GetMessage('FOLLOW') ?></span>
        <div class="social-detail-share">
            <?php $APPLICATION->IncludeComponent(
                "bitrix:main.share",
                "flat",
                array(
                    "HANDLERS" => $arParams["SHARE_HANDLERS"],
                    "PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
                    "PAGE_TITLE" => $arResult["~NAME"],
                    "SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
                    "SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
                    "HIDE" => $arParams["SHARE_HIDE"],
                ),
                $component,
                array("HIDE_ICONS" => "Y")
            ); ?>
        </div>
    </div>
<?php } ?>
