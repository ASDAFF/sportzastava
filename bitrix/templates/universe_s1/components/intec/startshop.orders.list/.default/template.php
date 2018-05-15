<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?$this->setFrameMode(true);?>
<div class="order-list-default">
    <div class="order-list-default-header">
        <div class="order-list-default-text">
            <?=GetMessage("SOL_CURRENT_ORDERS");?>
        </div>
        <div class="clearfix"></div>
    </div>
    <?$frame = $this->createFrame()->begin();?>
        <div class="order-list-default-items">
            <div class="order-list-default-items-wrapper" data-role="items">
                <?if (!empty($arResult['ORDERS'])) {?>
                    <?foreach ($arResult['ORDERS'] as $iKey => $arOrder) {?>
                        <div class="order-list-default-item" data-role="item">
                            <div class="order-list-default-item-header" data-role="button">
                                <div class="order-list-default-item-header-wrapper">
                                    <div class="order-list-default-item-header-parts">
                                        <div class="order-list-default-item-header-part" style="margin-right: 25px;">
                                            <?=GetMessage("SOL_ORDER");?>
                                        </div>
                                        <div class="order-list-default-item-header-part">
                                            #<?=$arOrder["ID"]?>
                                        </div>
                                        <div class="order-list-default-item-header-part">
                                            <?=GetMessage("SOL_FROM");?> <?=$arOrder["DATE_CREATE"]?>
                                        </div>
                                        <div class="order-list-default-item-header-part">
                                           <?=GetMessage("SOL_ORDER_SUM");?> <?=$arOrder["AMOUNT"]["PRINT_VALUE"]?>
                                        </div>
                                    </div>
                                    <div class="order-list-default-item-header-indicator">
                                        <div class="intec-aligner"></div>
                                        <div class="order-list-default-item-header-icon order-list-default-item-header-icon-active fa fa-angle-up"></div>
                                        <div class="order-list-default-item-header-icon order-list-default-item-header-icon-inactive fa fa-angle-down"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-list-default-item-content" data-role="content" style="display:none">
                                <div class="order-list-default-item-content-wrapper">
                                    <div class="order-list-default-item-content-left">
                                        <div class="order-list-default-item-content-payment">
                                            <?=GetMessage("SOL_PAY");?>
                                            <span class="order-list-default-item-content-state">
                                                <?if($arOrder["PAYED"] == "Y"){?>
                                                    <?=GetMessage("SOL_PAYED");?>
                                                <?}else{?>
                                                    <?=GetMessage("SOL_NOT_PAYED");?>
                                                <?}?>
                                            </span>
                                        </div>
                                        <div class="order-list-default-item-content-blocks">
                                            <div class="order-list-default-item-content-block">
                                                <div class="order-list-default-item-content-properties">
                                                    <div class="order-list-default-item-content-property">
                                                        <?=GetMessage("SOL_STATUS")?>: <?=$arOrder["STATUS"]["LANG"][LANGUAGE_ID]['NAME']?>                                                            </div>
                                                    <div class="order-list-default-item-content-property">
                                                        <?=GetMessage("SOL_SUM");?> <?=$arOrder["AMOUNT"]["PRINT_VALUE"]?>                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-list-default-item-content-right">
                                        <div class="order-list-default-item-content-blocks">
                                            <div class="order-list-default-item-content-block order-list-default-item-content-delivery">
                                                <div class="order-list-default-item-content-properties">
                                                    <div class="order-list-default-item-content-property">
                                                       <?=GetMessage("SOL_DELIVERY")?>: <?=$arOrder["DELIVERY"]["LANG"][LANGUAGE_ID]['NAME']?>
                                                    </div>
                                                    <?if($arOrder["DELIVERY"]["PRICE"]) { ?>
                                                        <div class="order-list-default-item-content-property">
                                                            <?=GetMessage("SOL_PRICE")?>: <?=$arOrder["DELIVERY"]["PRICE"]?>
                                                            <?//TODO: брать валюту по-умолчанию из модуля?>
                                                            <?=GetMessage("SOL_RUB");?>
                                                        </div>
                                                    <?}?>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="order-list-default-item-content-buttons">
                                    <div class="order-list-default-item-content-wrapper">
                                        <div class="order-list-default-item-content-left">
                                            <a href="<?=$arOrder['ACTIONS']['VIEW']?>" class="intec-button intec-button-s-7 intec-button-cl-common">
                                                <?=GetMessage("SOL_DETAIL_ORDER");?>
                                            </a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?}?>
                <?}?>
            </div>
        </div>
        <script>
            $(".order-list-default-item-header").click(function(){
               $(this).next().slideToggle();
                $(this).parent().toggleClass("order-list-default-item-active");
            });
        </script>
    <?$frame->end();?>
</div>
