<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

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

$arrConditions = array();
foreach ($arParams['ARR_ID_IBLOCK'] as $conditionOfShare)
    foreach($arResult['ITEMS'] as $condition)
        if($condition['ID'] == $conditionOfShare)
            $arrConditions[] = $condition;
?>
<div class="share-conditions">
    <div class="share-container">
        <div class="share-condition-name">
            <?= GetMessage('CONDITIONS_NAME')?>
        </div>
        <div class="share-elements">
            <?foreach ($arrConditions as $arItem):?>
                <div class="share-element-wrapper">
                    <div class="share-element">
                        <img class="share-element-img" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>">
                        <div class="share-element-name">
                            <?= $arItem['NAME'] ?>
                        </div>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
</div>