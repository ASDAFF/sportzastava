<ul>
    <?if($arParams["FOOTER_ALFABANK"] == "Y") {?>
        <li class="alfabank"></li>
    <?}?>
    <?if($arParams["FOOTER_SBERBANK"] == "Y") {?>
        <li class="sberbank"></li>
    <?}?>
    <?if($arParams["FOOTER_QIWI"] == "Y"){?>
        <li class="qiwi"></li>
    <?}?>
    <?if($arParams["FOOTER_YANDEX_MONEY"] == "Y") {?>
        <li class="yandex-money"></li>
    <?}?>
    <?if($arParams["FOOTER_VISA"]) {?>
        <li class="visa"></li>
    <?}?>
    <?if($arParams["FOOTER_MASTERCARD"]) {?>
        <li class="mastercard"></li>
    <?}?>
</ul>
