<?if($arParams["FOOTER_LOGO"]){?>
    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => SITE_DIR."include/logo.php",
        )
    );?>
<?}?>