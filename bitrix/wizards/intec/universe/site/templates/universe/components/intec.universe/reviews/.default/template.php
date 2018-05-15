<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $APPLICATION
 * @var $arParams array
 * @var $arResult array
 */
use intec\constructor\models\Build;

$capCode = htmlspecialchars($APPLICATION->CaptchaGetCode());

CJSCore::Init(array('ajax'));

$oBuild = Build::getCurrent();
if (!empty($oBuild)) {
	$oPage = $oBuild->getPage();
	$oProperties = $oPage->getProperties();
	$personal_data = $oProperties->get('inform_about_processing_personal_data');
}
?>
<div class="reviews-box" id="<?= $arResult['COMPONENT_HASH'] ?>">

	<a href="#reviews-form"
	   class="button intec-bt-button button-big"
	   data-toggle="collapse"><?= GetMessage('WRITE_REVIEW') ?></a>

	<?php if (!empty($arResult['FROM_RESULT'])) { ?>
		<br><br>
		<div class="reviews-form-result result-status-<?= $arResult['FORM_RESULT_STATUS'] ?>">
			<?= $arResult['FROM_RESULT'] ?>
		</div>
	<?php } ?>
	<div id="reviews-form"
		 class="form collapse <?=$_REQUEST["NAME"]||$_REQUEST["PREVIEW_TEXT"]?"in":""?>" aria-expanded="false">
		<form action="<?= $APPLICATION->GetCurPageParam() ?>" method="post">
			<div class="row">
				<div class="label"><?= GetMessage('NAME') ?> <span class="needed">*</span></div>
				<div class="control">
					<input type="text"
						   name="NAME"
						   class="control-text"
						   value="<?=$_REQUEST["NAME"]?$_REQUEST["NAME"]:""?>" />
				</div>
			</div>
			<div class="row">
				<div class="label"><?= GetMessage('DESCRIPTION') ?> <span class="needed">*</span></div>
				<div class="control">
					<textarea class="control-text" name="PREVIEW_TEXT" style="height: 100px"><?=$_REQUEST["PREVIEW_TEXT"]?$_REQUEST["PREVIEW_TEXT"]:""?></textarea>
				</div>
			</div>
			<?php if ($arParams['USE_CAPTCHA'] == 'Y') { ?>
				<div class="row">
					<div class="control label">
						<input type="hidden" name="CAPTCHA_SID" value="<?= $capCode ?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?= $capCode ?>"
							 width="180" height="40" />
					</div>
					<div class="control">
						<input name="CAPTCHA" type="text" value="" size="40" class="control-text" />
					</div>
				</div>
			<?php } ?>
			<?if($personal_data){?>
				<div class="consent">
					<div class="intec-contest-checkbox checked" style="margin-right: 5px; float: left;"></div>
					<?=GetMessage("SOF_CONTEST");?>
				</div>
			<?}?>
			<div class="row control">
				<input type="submit"
					   class="button right intec-bt-button button-big"
					   name="submit"
					   value="<?= GetMessage('SEND_REVIEW') ?>" />
			</div>
		</form>
	</div>

	<div class="reviews">
		<?php foreach ($arResult['ELEMENTS'] as $arElement) { ?>
			<div class="review">
				<div class="avatar"></div>
				<div class="info">
					<div class="name"><?= $arElement['NAME'] ?></div>
					<div class="date"><?= date('d.m.Y', $arElement['DATE_CREATE_UNIX']) ?></div>
				</div>
				<div class="description">
					<?= $arElement['PREVIEW_TEXT'] ?>
				</div>
				<div class="clear"></div>
			</div>
		<?php } ?>
	</div>
</div>