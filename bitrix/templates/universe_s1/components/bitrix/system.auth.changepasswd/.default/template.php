<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="intec-content">
	<div class="intec-content-wrapper">
		<div class="bx-auth bx-changepsw">
			<?ShowMessage($arParams["~AUTH_RESULT"]);?>
			<form method="post" action="<?=$arResult["AUTH_FORM"]?>" name="bform">
				<?if (strlen($arResult["BACKURL"]) > 0) { ?>
					<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
				<?}?>
				<input type="hidden" name="AUTH_FORM" value="Y">
				<input type="hidden" name="TYPE" value="CHANGE_PWD">

				<div class="form-group">
					<label><?=GetMessage("AUTH_LOGIN")?><span class="starrequired">*</span>:</label>
					<input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" class="form-control form-control-local" />
				</div>
				<div class="form-group">
					<label><?=GetMessage("AUTH_CHECKWORD")?><span class="starrequired">*</span>:</label>
					<input type="text" maxlength="50" name="USER_CHECKWORD"  value="<?=$arResult["USER_CHECKWORD"]?>" class="form-control form-control-local" />
				</div>
				<div class="form-group">
					<label><?=GetMessage("AUTH_NEW_PASSWORD_REQ")?><span class="starrequired">*</span>:</label>
					<input type="password" name="USER_PASSWORD" maxlength="50" value="<?=$arResult["USER_PASSWORD"]?>" class="form-control form-control-local" autocomplete="off" />
					<?if($arResult["SECURE_AUTH"]) {?>
						<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
							<div class="bx-auth-secure-icon"></div>
						</span>
						<noscript>
							<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
								<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
							</span>
						</noscript>
						<script type="text/javascript">
							document.getElementById('bx_auth_secure').style.display = 'inline-block';
						</script>
					<?}?>
				</div>
				<div class="form-group">
					<label><?=GetMessage("AUTH_NEW_PASSWORD_CONFIRM")?><span class="starrequired">*</span>:</label>
					<input type="password" name="USER_CONFIRM_PASSWORD" maxlength="50" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="form-control form-control-local" autocomplete="off" />
				</div>
				<?if($arResult["USE_CAPTCHA"]) {?>
					<div class="form-group">
						<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
					</div>
					<div class="form-group">
						<label><?echo GetMessage("system_auth_captcha")?><span class="starrequired">*</span>:</label>
						<input type="text" name="captcha_word" maxlength="50" value="" class="form-control form-control-local"/>
					</div>
				<?}?>
				<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
				<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>
				<br>
				<input type="submit" name="change_pwd" value="<?=GetMessage("AUTH_CHANGE")?>" class="reg-button intec-button intec-button-s-7 intec-button-cl-common" />
				<br><br>
				<p>
					<a href="<?=$arResult["AUTH_AUTH_URL"]?>"><?=GetMessage("AUTH_AUTH")?></a>
				</p>
			</form>
			<script type="text/javascript">
				document.bform.USER_LOGIN.focus();
			</script>
		</div>
	</div>
</div>