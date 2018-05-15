<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?$APPLICATION->ShowAjaxHead();?>
<div class="login_form_under">
	<?$APPLICATION->IncludeComponent("bitrix:system.auth.authorize", "",
		array(
			"BACKURL" => $_POST['UrlBack'],
			"AUTH_REGISTER_URL" => $_POST["UrlRegister"],
            "AUTH_FORGOT_PASSWORD_URL" => $_POST['UrlForgotPassword'],
            "PROFILE_URL" => $_POST['UrlProfile'],
		),
		false
	);?>
</div>