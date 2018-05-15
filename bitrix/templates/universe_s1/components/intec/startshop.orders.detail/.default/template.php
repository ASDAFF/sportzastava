<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?$this->setFrameMode(true);?>
<div class="sale-order-detail">
    <?$frame = $this->createFrame()->begin();?>
        <?if (!empty($arResult)){?>
            <a class="sale-order-detail-back-to-list-link-up intec-button intec-button-cl-default intec-button-transparent intec-button-md" href="<?=$arParams["LIST_PAGE_URL"]?>">
                <i class="intec-arrow-icon fa fa-angle-left"></i>
                <?=GetMessage("SOD_RETURN_TO_LIST")?>
            </a>


            <div class="col-md-12 col-sm-12 col-xs-12 sale-order-detail-general">
                <div class="row">
                    <div class="col-md-8 col-xs-12 sale-order-detail-general-head">
                        <span class="sale-order-detail-general-item">
                            <?=GetMessage("SOD_ORDER_NUMBER");?><?=$arResult['ID']?> <?=GetMessage("SOD_ORDER_FROM");?> <?=$arResult["DATE_CREATE"]?>, <?=count($arResult["ITEMS"]);?> <?=GetMessage("SOD_PRODUCT_SUM")?><?=$arResult["AMOUNT"]["PRINT_VALUE"]?>
                        </span>
                    </div>
                </div>

                <div class="row sale-order-detail-about-order sale-order-detail-block">
                    <div class="col-md-12 col-sm-12 col-xs-12 sale-order-detail-about-order-container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 sale-order-detail-about-order-title">
                                <h3 class="sale-order-detail-about-order-title-element">
                                    <?=GetMessage("SOD_INFORMATION_ABOUT_ORDER");?>
                                </h3>
                            </div>
                        </div>
                        <?foreach($arResult["PROPERTIES"] as $prop) {
                            if($prop["USER_FIELD"] == "NAME") {
                                $name = $prop["VALUE"];
                            }
                            if($prop["USER_FIELD"] == "LAST_NAME") {
                                $last_name = $prop["VALUE"];
                            }
                        }?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 sale-order-detail-about-order-inner-container">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 sale-order-detail-about-order-inner-container-name">
                                        <div class="sale-order-detail-about-order-inner-container-name-title">
                                            <?=GetMessage("SOD_FIO");?>											</div>
                                        <div class="sale-order-detail-about-order-inner-container-name-detail">
                                            <?=$last_name?> <?=$name?>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 sale-order-detail-about-order-inner-container-status">
                                        <div class="sale-order-detail-about-order-inner-container-status-title">
                                            <?=GetMessage("SOD_STATUS")?>
                                        </div>
                                        <div class="sale-order-detail-about-order-inner-container-status-detail">
                                            <?=$arResult["STATUS"]["LANG"][LANGUAGE_ID]["NAME"]?>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-6 sale-order-detail-about-order-inner-container-price">
                                        <div class="sale-order-detail-about-order-inner-container-price-title">
                                            <?=GetMessage("SOD_SUM");?>
                                        </div>
                                        <div class="sale-order-detail-about-order-inner-container-price-detail">
                                            <?=$arResult['AMOUNT']['PRINT_VALUE']?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?
                global $USER;
                $id_user = $USER->GetID();
                $user = CUser::GetByID($id_user);
                $arUser = $user->Fetch();
                ?>
                <div class="row sale-order-detail-user-information sale-order-detail-block">
                    <div class="col-md-12 col-sm-12 col-xs-12 sale-order-detail-payment-options-title">
                        <h3 class="sale-order-detail-payment-options-title-element">
                            <?=GetMessage("SOD_INFORMATION");?>
                        </h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 sale-order-detail-about-order-inner-container-details">
                        <ul class="sale-order-detail-about-order-inner-container-details-list row">
                            <li class="sale-order-detail-about-order-inner-container-list-item col-md-3 col-sm-4 col-xs-6">
                                <?=GetMessage("SOD_LOGIN");?>
                                <div class="sale-order-detail-about-order-inner-container-list-item-element">
                                    <?=$arUser["LOGIN"]?>
                                </div>
                            </li>
                            <?foreach($arResult["PROPERTIES"] as $prop){?>
                                <li class="sale-order-detail-about-order-inner-container-list-item col-md-3 col-sm-4 col-xs-6">
                                    <?=$prop["LANG"][LANGUAGE_ID]["NAME"]?>:
                                    <div class="sale-order-detail-about-order-inner-container-list-item-element">
                                        <?=$prop["VALUE"]?>
                                    </div>
                                </li>
                            <?}?>
                        </ul>
                    </div>
                </div>

                <div class="row sale-order-detail-payment-options sale-order-detail-block">
                    <div class="col-md-12 col-sm-12 col-xs-12 sale-order-detail-payment-options-container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 sale-order-detail-payment-options-title">
                                <h3 class="sale-order-detail-payment-options-title-element">
                                    <?=GetMessage("SOD_PAY_INFO");?>
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 sale-order-detail-payment-options-inner-container">
                                <?if (!empty($arResult['PAYMENT'])):?>
                                    <div class="startshop-orders-detail-section">
                                        <div class="startshop-orders-detail-section-content">
                                            <ul class="sale-order-detail-about-order-inner-container-details-list row">
                                                <li class="sale-order-detail-about-order-inner-container-list-item col-md-3 col-sm-4 col-xs-6">
                                                    <?=GetMessage('SOD_DEFAULT_SECTION_PROPERTY_PAYMENT')?>:
                                                    <div class="sale-order-detail-about-order-inner-container-list-item-element">
                                                        <?=$arResult['PAYMENT']['LANG'][LANGUAGE_ID]['NAME']?>
                                                    </div>
                                                </li>
                                                <li class="sale-order-detail-about-order-inner-container-list-item col-md-3 col-sm-4 col-xs-6">
                                                    <?=GetMessage('SOD_DEFAULT_SECTION_PROPERTY_PAYED')?>:
                                                    <div class="sale-order-detail-about-order-inner-container-list-item-element">
                                                        <?=$arResult['PAYED'] == 'Y' ? GetMessage('SOD_DEFAULT_SECTION_PROPERTY_PAYED_YES') : GetMessage('SOD_DEFAULT_SECTION_PROPERTY_PAYED_NO')?>
                                                    </div>
                                                </li>
                                                <?if (!empty($arResult['PAYMENT']['HANDLER']) && $arResult['PAYED'] != 'Y' && $arResult['STATUS']['CAN_PAY'] == 'Y' && $arResult['PAYMENT']['ACTIVE'] == 'Y') {?>
                                                    <li class="sale-order-detail-about-order-inner-container-list-item col-md-3 col-sm-4 col-xs-6">
                                                        <div class="sale-order-detail-about-order-inner-container-list-item-element">
                                                            <?CStartShopPayment::ShowPayForm($arResult['PAYMENT']['ID'], array(
                                                                "BUTTON_NAME" => GetMessage('SOD_DEFAULT_SECTION_PROPERTY_PAYMENT_BUTTON')." (".$arResult['AMOUNT']['PRINT_VALUE'].")",
                                                                "BUTTON_CLASS" => "btn-theme sale-order-detail-payment-options-methods-button-element active-button intec-button intec-button-cl-common intec-button-md",
                                                                "ORDER_ID" => $arResult['ID'],
                                                                "ORDER_SUM" => CStartShopCurrency::Convert($arResult['~AMOUNT'], $arResult['~CURRENCY'], $arResult['PAYMENT']['CURRENCY']),
                                                                "ORDER_ITEMS" => array_keys($arResult["ITEMS"]),
                                                                "CULTURE" => LANGUAGE_ID
                                                            ))?>
                                                        </div>
                                                    </li>
                                                <?}?>
                                            </ul>

                                        </div>
                                    </div>
                                <?endif;?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row sale-order-detail-payment-options-order-content sale-order-detail-block">
                    <div class="col-md-12 col-sm-12 col-xs-12 sale-order-detail-payment-options-order-content-container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 sale-order-detail-payment-options-order-content-title">
                                <h3 class="sale-order-detail-payment-options-order-content-title-element">
                                    <?=GetMessage("SOD_LIST_PROD");?>
                                </h3>
                            </div>
                            <div class="sale-order-detail-order-section bx-active">
                                <div class="sale-order-detail-order-section-content container-fluid">
                                    <div class="sale-order-detail-order-table-fade sale-order-detail-order-table-fade-right">
                                        <div style="width: 100%; overflow-x: auto; overflow-y: hidden;">
                                            <div class="sale-order-detail-order-item-table">
                                                <div class="sale-order-detail-order-item-tr hidden-sm hidden-xs">
                                                    <div class="sale-order-detail-order-item-td" style="padding-bottom: 5px;">
                                                        <div class="sale-order-detail-order-item-td-title">
                                                            <?=GetMessage("SOD_NAME_PROD");?>
                                                        </div>
                                                    </div>
                                                    <div class="sale-order-detail-order-item-td sale-order-detail-order-item-properties bx-text-right" style="padding-bottom: 5px;">
                                                        <div class="sale-order-detail-order-item-td-title">
                                                            <?=GetMessage("SOD_PRICE_PROD");?>
                                                        </div>
                                                    </div>
                                                    <div class="sale-order-detail-order-item-nth-4p1"></div>
                                                    <div class="sale-order-detail-order-item-td sale-order-detail-order-item-properties bx-text-right" style="padding-bottom: 5px;">
                                                        <div class="sale-order-detail-order-item-td-title">
                                                            <?=GetMessage("SOD_COUNT_PROD");?>
                                                        </div>
                                                    </div>
                                                    <div class="sale-order-detail-order-item-td sale-order-detail-order-item-properties bx-text-right" style="padding-bottom: 5px;">
                                                        <div class="sale-order-detail-order-item-td-title">
                                                            <?=GetMessage("SOD_SUMMA_PROD");?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?foreach ($arResult['ITEMS'] as $iKey => $arItem) {?>
                                                    <div class="sale-order-detail-order-item-tr sale-order-detail-order-basket-info sale-order-detail-order-item-tr-first">
                                                        <div class="sale-order-detail-order-item-td" style="min-width: 300px;">
                                                            <div class="sale-order-detail-order-item-block clearfix">
                                                                <div class="sale-order-detail-order-item-img-block">
                                                                    <?if($arItem["ELEMENT"]["PREVIEW_PICTURE"]){?>
                                                                        <?$arFile = CFile::GetFileArray($arItem["ELEMENT"]["PREVIEW_PICTURE"])?>
                                                                        <div class="sale-order-detail-order-item-imgcontainer" style="background-image: url(<?=$arFile["SRC"]?>)">
                                                                        </div>
                                                                    <?}?>
                                                                </div>
                                                                <div class="sale-order-detail-order-item-content">
                                                                    <div class="sale-order-detail-order-item-title">
                                                                        <?=$arItem["NAME"];?>
                                                                        <?if($arItem["ELEMENT"]["STARTSHOP"]["OFFER"]["PROPERTIES"]){?>
                                                                            <?foreach($arItem["ELEMENT"]["STARTSHOP"]["OFFER"]["PROPERTIES"] as $prop){?>
                                                                                <div class="sale-order-detail-order-item-prop">
                                                                                    <?=$prop["NAME"]?>: <?=$prop["VALUE"]["TEXT"]?>
                                                                                </div>
                                                                            <?}?>
                                                                        <?}?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sale-order-detail-order-item-td sale-order-detail-order-item-properties bx-text-right">
                                                            <div class="sale-order-detail-order-item-td-title col-xs-7 col-sm-5 visible-xs visible-sm">
                                                                <?=GetMessage("SOD_PRICE_PROD");?>
                                                            </div>
                                                            <div class="sale-order-detail-order-item-td-text">
                                                                <span class="bx-price"><?=$arItem["PRICE"]["PRINT_VALUE"];?></span>
                                                            </div>
                                                        </div>
                                                        <div class="sale-order-detail-order-item-nth-4p1"></div>
                                                        <div class="sale-order-detail-order-item-td sale-order-detail-order-item-properties bx-text-right">
                                                            <div class="sale-order-detail-order-item-td-title col-xs-7 col-sm-5 visible-xs visible-sm">
                                                                <?=GetMessage("SOD_COUNT_PROD");?>
                                                            </div>
                                                            <div class="sale-order-detail-order-item-td-text">
                                                                    <span><?=$arItem["QUANTITY"]?></span>
                                                            </div>
                                                        </div>
                                                        <div class="sale-order-detail-order-item-td sale-order-detail-order-item-properties bx-text-right">
                                                            <div class="sale-order-detail-order-item-td-title col-xs-7 col-sm-5 visible-xs visible-sm">Сумма</div>
                                                            <div class="sale-order-detail-order-item-td-text">
                                                                <span class="bx-price all"><?=$arItem["AMOUNT"]["PRINT_VALUE"];?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?}?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--sale-order-detail-general-->

            <div></div>
            <a class="sale-order-detail-back-to-list-link-down intec-button intec-button-cl-default intec-button-transparent intec-button-md" href="<?=$arParams["LIST_PAGE_URL"]?>">
                <i class="intec-arrow-icon fa fa-angle-left"></i>
                <?=GetMessage("SOD_RETURN_TO_LIST");?>
            </a>
        <?}?>
    <?$frame->beginStub();?>
    <div class="startshop-orders-detail-notify startshop-orders-detail-notify-red">
        <div class="startshop-orders-detail-notify-wrapper">
            <?=GetMessage('SOD_DEFAULT_NOTIFY_ORDDER_NOT_EXISTS')?>
        </div>
    </div>
    <?$frame->end();?>
</div>
