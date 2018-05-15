<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
?>
<?=ShowError($arResult["strProfileError"]);?>
<div class="intec-content">
    <div class="intec-content-wrapper">
        <div class="personal-block">
            <h2><?=GetMessage('NAME_CHANGE')?></h2>
            <?
            if ($arResult['DATA_SAVED'] == 'Y')
            echo ShowNote(GetMessage('PROFILE_DATA_SAVED'));
            ?>
            <div class="personal-form">
                <form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>?" enctype="multipart/form-data">
                    <?=$arResult["BX_SESSION_CHECK"]?>
                    <input type="hidden" name="lang" value="<?=LANG?>" />
                    <input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
                    <input type="hidden" name="LOGIN" value=<?=$arResult["arUser"]["LOGIN"]?> />
                    <input type="hidden" name="EMAIL" value=<?=$arResult["arUser"]["EMAIL"]?> />
                    <div class="form-group required">
                        <label for="NEW_PASSWORD"><?=GetMessage('NEW_PASSWORD_REQ')?></label>
                        <input type="password" class="form-control form-control-local" name="NEW_PASSWORD" value="" autocomplete="off" placeholder="<?=GetMessage('NEW_PASSWORD_REQ')?>:" />
                    </div>
                    <div class="form-group required">
                        <label for="NEW_PASSWORD_CONFIRM"><?=GetMessage('NEW_PASSWORD_CONFIRM')?></label>
                        <input type="password" class="form-control form-control-local" name="NEW_PASSWORD_CONFIRM" placeholder="<?=GetMessage('NEW_PASSWORD_CONFIRM')?>" value="" autocomplete="off" />
                    </div>
                    <input type="submit" id="personal_submit" name="save" class="intec-button intec-button-s-7 intec-button-cl-common" value="<?=GetMessage('MAIN_SAVE')?>" style="font-weight: 400;" >
                </form>
            </div>
        </div>
    </div>
</div>


