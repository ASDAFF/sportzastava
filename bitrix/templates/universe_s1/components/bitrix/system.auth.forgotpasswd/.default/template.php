<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="intec-content">
	<div class="intec-content-wrapper">
		<div class="forgot_psw_page">
			<div class="bx_forgotpassword_page">
				<?ShowMessage($arParams["~AUTH_RESULT"]);?>
				<div class="h4"><?=GetMessage("AUTH_FORGOT_PASSWORD");?></div>
				<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
					<?if (strlen($arResult["BACKURL"]) > 0):?>
						<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
					<?endif;?>
					<input type="hidden" name="AUTH_FORM" value="Y">
					<input type="hidden" name="TYPE" value="SEND_PWD">

					<div class="description">
						<?=GetMessage("AUTH_FORGOT_PASSWORD_1")?>
					</div>
					<br>
					<div class="form-group">
							<label><?=GetMessage("AUTH_EMAIL")?></label>
							<br>
							<input type="text" name="USER_EMAIL" maxlength="255" class="form-control form-control-local" />
					</div>
					<input type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" class="intec-button intec-button-s-7 intec-button-cl-common"/>
					<br>
					<br>
					<a class="intec-cl-text" href="<?=$arResult["AUTH_AUTH_URL"]?>"><?=GetMessage("AUTH_AUTH")?></a>
					<div class="clear"></div>
				</form>
			</div>
			<script type="text/javascript">
				document.bform.USER_LOGIN.focus();
			</script>
		</div>
	</div>
</div>


