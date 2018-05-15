<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="intec-content">
    <div class="intec-content-wrapper">
        <div class="personal-block">
            <h2>
                <?=GetMessage('USER_INFO_TITLE')?>
            </h2>

            <?=ShowError($arResult["strProfileError"]);?>

            <?if ($arResult['DATA_SAVED'] == 'Y')
                echo ShowNote(GetMessage('PROFILE_DATA_SAVED'));
            ?>

            <div class="personal-form">
                <form class="capital personal" method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>?" enctype="multipart/form-data">
                    <?=$arResult["BX_SESSION_CHECK"]?>
                    <input type="hidden" name="lang" value="<?=LANG?>" />
                    <input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

                    <div class="form-group required">
                        <label for="NAME"><?=GetMessage('NAME')?></label><br>
                        <input class="form-control form-control-local-person" type="text" id="NAME" placeholder="<?=GetMessage('NAME')?>" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" />
                    </div>

                    <div class="form-group required">
                        <label for="LAST_NAME"><?=GetMessage('LAST_NAME')?></label>
                        <input class="form-control form-control-local-person" type="text" id="LAST_NAME" placeholder="<?=GetMessage('LAST_NAME')?>" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" />
                    </div>

                    <div class="form-group required">
                        <label for="LOGIN"><?=GetMessage('LOGIN')?></label>
                        <input class="form-control form-control-local-person" required type="text" id="LOGIN" placeholder="<?=GetMessage('LOGIN')?>" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"]?>" />
                    </div>

                    <div class="form-group required">
                        <label for="EMAIL"><?=GetMessage('EMAIL')?></label>
                        <input class="form-control form-control-local-person" required type="email" id="EMAIL" placeholder="<?=GetMessage('EMAIL')?>" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"]?>" />
                    </div>

                    <div class="form-group required">
                        <label for="PERSONAL_PHONE"><?=GetMessage('USER_PHONE')?></label>
                        <input class="form-control form-control-local-person" type="text" id="PERSONAL_PHONE" placeholder="<?=GetMessage('USER_PHONE')?>" name="PERSONAL_PHONE" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>" />
                    </div>
                    <br>
                    <br>
                    <input type="submit" id="personal_submit" name="save" class="intec-button intec-button-s-7 intec-button-cl-common" value="<?=GetMessage('SAVE_ALL')?>" style="font-weight: 400;" >
                    <a href="<?=$arParams["USER_URL_CHANGE_PSW"]?>"
                       class="intec-button intec-button-s-7 intec-button-cl-default intec-button-transparent">
                        <?=GetMessage('CHANGE_PASSWORD')?>
                    </a>

                </form>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
