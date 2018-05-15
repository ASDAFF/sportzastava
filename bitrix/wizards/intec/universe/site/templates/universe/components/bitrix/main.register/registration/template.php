<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>
<?if($USER->IsAuthorized()){?>
	<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>
<?} else {?>
	<div class="registration-block">
    	<div class="h2"><?=GetMessage("AUTH_REGISTER");?></div>
    	<div class="registration-info">
			<div class="registration-info-text">
				<?=GetMessage("RERISTRATION_DESCRIPTION");?>
			</div>
    	</div>
		<div class="registration-form">
			<? if (count($arResult["ERRORS"]) > 0) {

				foreach ($arResult["ERRORS"] as $key => $error) {
					if (intval($key) == 0 && $key !== 0)
						$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;" . GetMessage("REGISTER_FIELD_" . $key) . "&quot;", $error);
				}

				ShowError(implode("<br />", $arResult["ERRORS"]));
			} elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y") {	?>
				<p>
					<?=GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?>
				</p>
			<?}?>
			<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
				<? if($arResult["BACKURL"] <> '') { ?>
					<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
				<?}?>
				<?foreach ($arResult["SHOW_FIELDS"] as $FIELD) { ?>
					<?if($FIELD == "AUTO_TIME_ZONE" && $arResult["TIME_ZONE_ENABLED"] == true) { ?>
						<tr>
							<td><?echo GetMessage("main_profile_time_zones_auto")?>
								<?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?>
									<span class="starrequired">*</span>
								<?endif?>
							</td>
							<td>
								<select
									name="REGISTER[AUTO_TIME_ZONE]"
									onchange="this.form.elements['REGISTER[TIME_ZONE]'].disabled=(this.value != 'N')">
									<option value="">
										<?echo GetMessage("main_profile_time_zones_auto_def")?>
									</option>
									<option value="Y"<?=$arResult["VALUES"][$FIELD] == "Y" ? " selected=\"selected\"" : ""?>>
										<?echo GetMessage("main_profile_time_zones_auto_yes")?>
									</option>
									<option value="N"<?=$arResult["VALUES"][$FIELD] == "N" ? " selected=\"selected\"" : ""?>>
										<?echo GetMessage("main_profile_time_zones_auto_no")?>
									</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<?echo GetMessage("main_profile_time_zones_zones")?>
							</td>
							<td>
								<select name="REGISTER[TIME_ZONE]"<?if(!isset($_REQUEST["REGISTER"]["TIME_ZONE"])) echo 'disabled="disabled"'?>>
									<?foreach($arResult["TIME_ZONE_LIST"] as $tz=>$tz_name){?>
										<option
											value="<?=htmlspecialcharsbx($tz)?>"
											<?=$arResult["VALUES"]["TIME_ZONE"] == $tz ? " selected=\"selected\"" : ""?>>
											<?=htmlspecialcharsbx($tz_name)?>
										</option>
									<?}?>
								</select>
							</td>
						</tr>
					<?} else {?>
						<?switch ($FIELD){
							case "PASSWORD":
								?>
								<div class="form-group required">
									<label>
										<?=GetMessage("REGISTER_FIELD_".$FIELD)?>
									</label>
									<br/>
									<input
										type="password"
										name="REGISTER[<?=$FIELD?>]"
										value="<?=$arResult["VALUES"][$FIELD]?>"
										autocomplete="off"
										class="form-control form-control-local"
										style="height: 45px;"><br/>
								</div>
								<?if($arResult["SECURE_AUTH"]) { ?>
									<span class="bx-auth-secure"
										  id="bx_auth_secure"
										  title="<?echo GetMessage("AUTH_SECURE_NOTE")?>"
										  style="display:none">
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
								<?}
							break;

							case "CONFIRM_PASSWORD":?>
								<div class="form-group <?=$arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == 'Y' ? 'required' : ''?>">
									<label><?=GetMessage("REGISTER_FIELD_".$FIELD)?></label><br/>
									<input
										type="password"
										name="REGISTER[<?=$FIELD?>]"
										value="<?=$arResult["VALUES"][$FIELD]?>"
										autocomplete="off"
										class="form-control form-control-local"
										style="height: 45px;">
									<br/>
								</div>
							<?break;

							case "PERSONAL_GENDER":
								?><select name="REGISTER[<?=$FIELD?>]">
									<option value="">
										<?=GetMessage("USER_DONT_KNOW")?>
									</option>
									<option value="M"<?=$arResult["VALUES"][$FIELD] == "M" ? " selected=\"selected\"" : ""?>>
										<?=GetMessage("USER_MALE")?>
									</option>
									<option value="F"<?=$arResult["VALUES"][$FIELD] == "F" ? " selected=\"selected\"" : ""?>>
										<?=GetMessage("USER_FEMALE")?>
									</option>
								</select><?
							break;

							case "PERSONAL_COUNTRY":
							case "WORK_COUNTRY":
								?><select name="REGISTER[<?=$FIELD?>]"><?
								foreach ($arResult["COUNTRIES"]["reference_id"] as $key => $value)
								{
									?><option value="<?=$value?>"<?if ($value == $arResult["VALUES"][$FIELD]):?> selected="selected"<?endif?>><?=$arResult["COUNTRIES"]["reference"][$key]?></option>
								<?
								}
								?></select><?
								break;

							case "PERSONAL_PHOTO":
							case "WORK_LOGO":
								?><input size="30" type="file" name="REGISTER_FILES_<?=$FIELD?>" /><?
								break;

							case "PERSONAL_NOTES":
							case "WORK_NOTES":
								?>
								<textarea cols="30" rows="5" name="REGISTER[<?=$FIELD?>]">
									<?=$arResult["VALUES"][$FIELD]?>
								</textarea><?
								break;

							case "LOGIN":?>
								<div class="form-group <?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><?= 'required'?><?endif?>" style="display: none;">
										<label><?=GetMessage("REGISTER_FIELD_".$FIELD)?></label><br/>
										<input
											id="login-registration"
											type="text"
											name="REGISTER[<?=$FIELD?>]"
											value="<?=$arResult["VALUES"][$FIELD]?>"
											class="form-control form-control-local"
											style="height: 45px;">
										<br/>
								</div><?
							break;

							case "EMAIL":?>
								<div class="form-group <?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><?= 'required'?><?endif?>">
									<label><?=GetMessage("REGISTER_FIELD_".$FIELD)?></label><br/>
									<input
										id="email-registration"
										type="text"
										name="REGISTER[<?=$FIELD?>]"
										value="<?=$arResult["VALUES"][$FIELD]?>"
										class="form-control form-control-local" style="height: 45px;">
									<br/>
								</div><?
							break;
    					break;
						default:?>
							<div class="form-group <?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><?= 'required'?><?endif?>">
								<label><?=GetMessage("REGISTER_FIELD_".$FIELD)?></label><br/>
								<input type="text" name="REGISTER[<?=$FIELD?>]"
									   value="<?=$arResult["VALUES"][$FIELD]?>"
									   class="form-control form-control-local" style="height: 45px;">
								<br/>
							</div>
        			<?}?>
				<?}?>
			<?}?>
			<?// ********************* User properties ***************************************************?>
			<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"){?>
				<tr>
					<td colspan="2">
						<?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?>
					</td>
				</tr>
				<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField){?>
					<tr>
						<td>
							<?=$arUserField["EDIT_FORM_LABEL"]?>:<?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;?>
						</td>
						<td>
							<?$APPLICATION->IncludeComponent(
								"bitrix:system.field.edit",
								$arUserField["USER_TYPE"]["USER_TYPE_ID"],
								array(
									"bVarsFromForm" => $arResult["bVarsFromForm"],
									"arUserField" => $arUserField,
									"form_name" => "regform"),
								null,
								array("HIDE_ICONS"=>"Y")
							);?>
						</td>
					</tr>
				<?}?>
			<?}?>
			<?// ******************** /User properties ***************************************************?>

			<div class="checkbox">
				<input type="checkbox" id="agree-checkbox" checked disabled readonly>
				<label for="agree-checkbox">
					<?=GetMessage("AGREE")?>
					<a class="popup_agree">
						<?=GetMessage("PROCESSING_OF_PERSONAL_DATA")?>
					</a>
				</label>
			</div>

			<div class="input-submit">
				<input type="submit" id="register_submit" name="register_submit_button" class="intec-button intec-button-s-7 intec-button-cl-common" value="Зарегистрироваться" style="font-weight: 400;">
			</div>
		</form>
	<?}?>
</div>

<script>
	 $(document).ready(function(){
		 $(".close-popup-layer").click(function(){
			 $("#popup_agree").hide();
		 });
		 $(".popup_agree").click(function(){
			 $("#popup_agree").show();
		 })
	 })
</script>

<div id="popup_agree" class="overlay" style="display:none;">
	<div class="popup">
		<div class="content">
			<div class="h4"><?=GetMessage("REG_TITLE_POPUP");?></div>
			<hr>
			<p><?=GetMessage("REG_POPUP_MESSAGE");?></p>
		</div>
		<a class="close close-popup-layer">&times;</a>
	</div>
</div>