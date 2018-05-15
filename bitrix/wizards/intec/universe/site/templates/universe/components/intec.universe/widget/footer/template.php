<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die() ?>
<?php

/**
 * @var $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);
?>
<div class="widget-footer clearfix <?=$arParams["FOOTER_BLACK"]=="Y"?"dark":"";?>" id="<?= $sTemplateId ?>">
    <div class="intec-content">
        <div class="intec-content-wrapper">
            <div class="<?=$arParams["FOOTER_DESIGN"]?>">
                <?if(!$arParams["FOOTER_DESIGN"] || $arParams["FOOTER_DESIGN"] == "TYPE_1") {?>
                    <div class="first-col">
                        <? include('parts/phone.php') ?>
                        <? include('parts/feedback.php') ?>
                        <? include('parts/email.php') ?>
                        <? include('parts/address.php') ?>
                    </div>
                    <div class="second-col">
                        <? include('parts/menu.php') ?>
                    </div>
                    <div class="third-col">
                        <? include('parts/search.php') ?>
                        <? include('parts/social.php') ?>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="bottom-footer row clearfix">
                        <div class="copyright-text col-md-4 col-xs-12">
                            <? include('parts/copyright.php') ?>
                        </div>
                        <div class="logo col-md-4 col-xs-12 text-center">
                            <? include('parts/logo.php') ?>
                        </div>
                        <?if($arParams['FOOTER_PAYSYSTEM'] == "Y"){?>
                            <div class="paysystem <?=$arParams["FOOTER_PAYSYSTEM_TYPE"]?> col-md-4 col-xs-12">
                                <? include('parts/paysystem.php') ?>
                            </div>
                        <?}?>
                    </div>
                <?}?>
                <?if($arParams["FOOTER_DESIGN"] == 'TYPE_2') {?>
                    <div class="first-col">
                        <?if($arParams['FOOTER_PAYSYSTEM'] == "Y"){?>
                            <div class="paysystem <?=$arParams["FOOTER_PAYSYSTEM_TYPE"]?>">
                                <? include('parts/paysystem.php') ?>
                            </div>
                        <?}?>
                        <div class="copyright-text">
                            <? include('parts/copyright.php') ?>
                        </div>
                    </div>
                    <div class="second-col">
                        <? include('parts/menu.php') ?>
                    </div>
                    <div class="third-col">
                        <? include('parts/phone.php') ?>
                        <? include('parts/feedback-link.php') ?>
                        <br>
                        <br>
                        <? include('parts/social.php') ?>
                        <br>
                        <div class="logo text-right">
                            <? include('parts/logo.php') ?>
                        </div>
                    </div>
                <?}?>
                <?if($arParams["FOOTER_DESIGN"] == 'TYPE_3') {?>
                    <div class="first-col">
                        <? include('parts/menu.php') ?>
                    </div>
                    <div class="second-col">
                        <? include('parts/search.php') ?>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <? include('parts/phone.php') ?>
                                <? include('parts/feedback.php') ?>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <? include('parts/email.php') ?>
                                <? include('parts/address.php') ?>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <hr>
                    <div class="bottom-footer row clearfix">
                        <div class="copyright-text col-md-4 col-xs-12">
                            <? include('parts/copyright.php') ?>
                        </div>
                        <div class="logo col-md-4 col-xs-12 text-center">
                            <? include('parts/social.php') ?>
                        </div>
                        <?if($arParams['FOOTER_PAYSYSTEM'] == "Y"){?>
                            <div class="paysystem <?=$arParams["FOOTER_PAYSYSTEM_TYPE"]?> col-md-4 col-xs-12">
                                <? include('parts/paysystem.php') ?>
                            </div>
                        <?}?>
                    </div>
                <?}?>
                <?if($arParams["FOOTER_DESIGN"] == 'TYPE_4') {?>
                    <div class="first-col">
                        <? include('parts/menu.php') ?>
                    </div>
                    <div class="second-col">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <? include('parts/email.php') ?>
                                <? include('parts/address.php') ?>
                            </div>
                            <div class="col-md-6 col-xs-12" style="text-align:right">
                                <? include('parts/phone.php') ?>
                                <? include('parts/feedback.php') ?>
                            </div>
                        </div>
                        <br><br>
                        <?if($arParams['FOOTER_PAYSYSTEM'] == "Y"){?>
                            <div class="paysystem <?=$arParams["FOOTER_PAYSYSTEM_TYPE"]?>">
                                <? include('parts/paysystem.php') ?>
                            </div>
                        <?}?>
                    </div>
                    <div style="clear:both"></div>
                    <hr>
                    <div class="bottom-footer row clearfix">
                        <div class="copyright-text col-md-4 col-xs-12">
                            <? include('parts/copyright.php') ?>
                        </div>
                        <div class="logo col-md-4 col-xs-12 text-center">
                            <? include('parts/social.php') ?>
                        </div>
                        <div class=" col-md-4 col-xs-12 logo" style="text-align:right">
                            <? include('parts/logo.php') ?>
                        </div>
                    </div>
                <?}?>
                <?if($arParams["FOOTER_DESIGN"] == 'TYPE_5') {?>
                    <div class="first-col">
                        <? include('parts/menu.php') ?>
                    </div>
                    <div class="second-col">
                        <? include('parts/search.php') ?>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <? include('parts/email.php') ?>
                                <? include('parts/address.php') ?>
                            </div>
                            <div class="col-md-6 col-xs-12" style="text-align:right">
                                <? include('parts/phone.php') ?>
                                <? include('parts/feedback.php') ?>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <hr>
                    <div class="bottom-footer row clearfix">
                        <div class="copyright-text col-md-4 col-xs-12">
                            <? include('parts/copyright.php') ?>
                        </div>
                        <div class="logo col-md-4 col-xs-12 text-center logo">
                            <? include('parts/logo.php') ?>
                        </div>
                        <?if($arParams['FOOTER_PAYSYSTEM'] == "Y"){?>
                            <div class="paysystem <?=$arParams["FOOTER_PAYSYSTEM_TYPE"]?> col-md-4 col-xs-12">
                                <? include('parts/paysystem.php') ?>
                            </div>
                        <?}?>
                    </div>
                <?}?>
            </div>
        </div>
    </div>
</div>
