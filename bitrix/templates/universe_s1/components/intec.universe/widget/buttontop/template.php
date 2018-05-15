<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

$this->setFrameMode(true);
$sTemplateId = spl_object_hash($this);
?>
<?php if (!defined('EDITOR')) { ?>
<div class="widget-button-top">
    <div class="button_top intec-cl-background intec-cl-background-light-hover">

    </div>
</div>

<script>
    $(window).scroll(function() {
        if($(this).scrollTop() > 800) {
            $('.button_top').fadeIn();
        }
        else {
            $('.button_top').fadeOut();
        }
    })
    $('.button_top').click(function() {
        $('body, html').animate({
            scrollTop: 0
        }, 600);
    });
</script>
<style>
    .widget-button-top .button_top {
        border-radius:<?=$arParams["RADIUS"]?$arParams["RADIUS"]:0;?>px;
    }
</style>
<?php } else { ?>
    <div class="constructor-element-stub">
        <div class="constructor-element-stub-wrapper">
            <?= GetMessage('WBT_TITLE') ?>
        </div>
    </div>
<?php } ?>
