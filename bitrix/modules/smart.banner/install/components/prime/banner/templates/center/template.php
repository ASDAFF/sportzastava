<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var $this CBitrixComponentTemplate */
?>

<div class="prime-banner-center" id="show-<?=$arResult['ID']?>">
    <span class="close-p-center" onclick="closeBannerCenter(this)">&times;</span>
    <a href="<?=$arResult['URL']?>"
       <?if($arResult['OPEN_NEW_WINDOW'] == "Y"):?>target="_blank"<?endif;?>
       <?if($arResult['URL']):?>onclick="statBannerCenter('CLICKS');closeBannerCenter(this);"<?endif;?>
        >
        <img src="<?=$arResult['IMAGE']?>" alt="<?=$arResult['NAME']?>" title="<?=$arResult['NAME']?>">
    </a>
</div>
<div class="prime-window-bgr" id="prime-window-bgr"></div>

<script>

    <?if($arResult['SHOW_OUT_SITE'] == "Y"):?>
    var alert_flag = true;
    document.onmouseout = handler;
    function handler(event){
        if (event.clientY < 0) {
            if (alert_flag) {
                document.getElementById('show-<?=$arResult['ID']?>').style.display='block';
                document.getElementById('prime-window-bgr').style.display='block';
                showBannerCenter();
                alert_flag = false;
            }
        }
    }
    <?endif;?>

    function statBannerCenter(FIELD){
        BX.ajax({
            url: '<?=$templateFolder.'/ajax.php';?>',
            data: {
                ID : <?=$arResult['ID']?>,
                FIELD_BANNER : FIELD
            },
            method: 'POST',
            dataType: 'json',
            timeout: 30,
            async: true,
            processData: true,
            scriptsRunFirst: true,
            emulateOnload: true,
            start: true,
            cache: false,
        });
    }

    function closeBannerCenter(El){
        document.cookie = 'primeBannerClose-<?=$arResult['ID']?>=true';
        document.getElementById('show-<?=$arResult['ID']?>').style.opacity='0';
        document.getElementById('prime-window-bgr').style.opacity='0';
        setTimeout(function(){
            document.getElementById('show-<?=$arResult['ID']?>').style.display='none';
            document.getElementById('prime-window-bgr').style.display='none';
        }, 1000);
    }


    function showBannerCenter() {
        statBannerCenter("SHOWS");
        document.getElementById('show-<?=$arResult['ID']?>').style.opacity='1';
        document.getElementById('prime-window-bgr').style.opacity='1';
    }
    setTimeout(showBannerCenter, <?=$arResult['PAUSE'];?>);

</script>


