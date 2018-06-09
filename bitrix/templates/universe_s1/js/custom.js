

$('.readmore').readmore({
    speed: 200,
    maxHeight: 150,
    moreLink: '<div style="margin-top: 20px" class="intec-about-company-more"><a href="" class="intec-button intec-button-md intec-button-cl-common intec-button-transparent">Подробнее</a></div>',
    lessLink: '<div class="intec-about-company-more"><a href="" class="intec-button intec-button-md intec-button-cl-common intec-button-transparent">Скрыть</a></div>',
});

$('.intec-min-button-compare.add').click(function(){
    $(this).closest('.catalog-section-element').find('.element-img img').effect("transfer", { to: $('.flying-basket_buttons_wrap a[href="\/catalog\/compare.php"]'), className: "transfer_class" }, 800);
    var img = $('<img />', {
        src: $(this).closest('.catalog-section-element').find('.element-img img').attr('src')
    });
    $('.transfer_class').html(img);
});



