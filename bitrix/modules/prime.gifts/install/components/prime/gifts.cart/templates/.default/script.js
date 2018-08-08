
function SetGifts(Gifts,User,Site){

    BX.ajax({
        url: '/bitrix/components/prime/gifts.cart/ajax.php',
        data: {'name':Gifts,'user':User,'site':Site},
        method: 'POST',
        dataType: 'html',
        timeout: 30,
        async: true,
        processData: true,
        scriptsRunFirst: true,
        emulateOnload: true,
        start: true,
        cache: false,
    });

}