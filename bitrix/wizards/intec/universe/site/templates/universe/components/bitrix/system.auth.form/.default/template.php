<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<?CJSCore::Init(array("popup"));?>
<div class="bx_auth clearfix">
	<?if ($arResult["FORM_TYPE"] == "login"){ ?>
        <?$arPopupParameters = array(
            'Url' => $this->GetFolder().'/ajax.php',
            'Width' => '724',
            'Height' => '386',
            'Data' => array(
                'UrlBack' => $arResult['BACKURL'],
                'UrlRegister' => $arResult['AUTH_REGISTER_URL'],
                'UrlProfile' => $arParams['PROFILE_URL'],
                'UrlAuthorize' => $arResult['AUTH_URL'],
                'UrlForgotPassword' => $arResult['AUTH_FORGOT_PASSWORD_URL'],
                'UrlLogin' => $arResult['AUTH_LOGIN_URL'],
                'SiteID' => SITE_ID
            )
        )?>
		<a class="personal_cabinet hover_link" href="javascript:void(0)" onclick="Popups.Authorize(<?=CUtil::PhpToJSObject($arPopupParameters)?>)"><?=GetMessage("PERSONAL_CABINET")?></a>
		<!--noindex-->
			<?/*<a class="personal_cabinet hover_link pers_mobile" href="javascript:void(0)" onclick="Popups.Authorize(<?=CUtil::PhpToJSObject($arPopupParameters)?>)"></a>*/?>
		<!--/noindex-->
	<?} else {?>
		<?
            $sName = trim($USER->GetFullName());
            
            if (strlen($sName) <= 0)
                $sName = $USER->GetLogin();
		?>
		<a class="login" href="<?=$arParams['PROFILE_URL']?>"><?=htmlspecialcharsbx($sName);?></a>
		<a class="logout" href="<?=$APPLICATION->GetCurPageParam("logout=yes", array("logout"))?>"><?=GetMessage("AUTH_LOGOUT")?></a>
	<?}?>
</div>