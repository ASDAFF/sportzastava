<?$APPLICATION->IncludeComponent(
    "bitrix:menu",
    "footer",
    Array(
        "ALLOW_MULTI_SELECT" => "N",
        "ROOT_MENU_TYPE" => $arParams["FOOTER_MENU"],
        "CHILD_MENU_TYPE" => $arParams["FOOTER_CHILD_MENU"],
        "DELAY" => "N",
        "MAX_LEVEL" => "2",
        "MENU_CACHE_GET_VARS" => array(""),
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_TYPE" => "N",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "USE_EXT" => "Y"
    ),$component
);?>
<div id="bx-composite-banner"></div>
