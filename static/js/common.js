$('.header-btn').on('click', function (e) {
    e.preventDefault();
    const $ths = $(this);
    $ths.toggleClass('active');
    $('.header').toggleClass('active');
});
$('.header-overlay').on('click', function (e) {
    e.preventDefault();
    const $ths = $(this);
    $('.header-btn').removeClass('active');
    $('.header').removeClass('active');
});


$(".reviews-slider").slick({
    dots: false,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    centerMode: true,
    centerPadding: '80px',
    variableWidth: true,
    prevArrow: $('.slider-prev'),
    nextArrow: $('.slider-next'),
    responsive: [
        {
            breakpoint: 992,
            settings: {
                variableWidth: false,
                slidesToShow: 3,
                centerMode: false,
            }
        },
        {
            breakpoint: 768,
            settings: {
                variableWidth: false,
                slidesToShow: 2,
                centerMode: false,
            }
        },
        {
            breakpoint: 576,
            settings: {
                variableWidth: false,
                slidesToShow: 1,
                centerMode: false,
            }
        },
    ]

});
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: false,
    swipe: false,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    variableWidth: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    arrows: false,
    dots: false,
    focusOnSelect: true

});
if($('.woocommerce-Price-amount').length > 0){
    var textPriceW =  $('.cart-collaterals .woocommerce-Price-amount bdi').html();
    $('.total-price').html(textPriceW);
}
if($('.hero').length > 0){
    $(".header-nav a").on('click', function (e) {
        e.preventDefault();
        var $this = $(this),
            headerHeight = $('.header').height(),
            thisData = $this.data('section');
        $('html, body').animate({
            scrollTop: $('#' + thisData).offset().top - 120 // Add it to the calculation here
        }, 1000);
        $('.header, .header-btn ').removeClass('active');
    });
    $(".hero-link a").on('click', function (e) {
        e.preventDefault();
        var $thisHref = $(this).attr('href'),
            headerHeight = $('.header').height();
        $('html, body').animate({
            scrollTop: $($thisHref).offset().top - 120 // Add it to the calculation here
        }, 1000);

    });
}

$('.product-item.disabled a, .about-nav a').on('click', function (e) {
    e.preventDefault();
});

function popupOpen() {
    var $popupButton = $('.btn-popup');
    $popupButton.on('click', function (e) {
        e.preventDefault();
        var $this = $(this);
        var popupButtonData = $this.data('popup');
        $('.popup').removeClass('active');
        $('div[data-popup = '+popupButtonData+']').addClass('active');
        $('body').addClass('scroll');
    });
}
popupOpen();
$('.popup-close').on('click', function (e) {
    var $this = $(this);
    $this.parent().parent().removeClass('active');
    $('.popup-overlay').removeClass('active');
    $('body').removeClass('scroll');
});
$('.popup-overlay').on('click', function (e) {
    var $this = $(this);
    $this.removeClass('active');
    $('.popup').removeClass('active');
    $('body').removeClass('scroll');
});

$(".product-reviews__title .btn-primary").on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $('.review-form').offset().top - 120 // Add it to the calculation here
    }, 1000);

});
//
// $(document).ready(function() {
//     $('.product-page__buy a').on('click', function (e) {
//         var image =  $('.slider-for .slick-current img').attr('src');
//         var titleSlide =  $('.product-page__type-list .slick-current .slide-title').text();
//         var productPrice =  $('.product-page__price').text();
//         var orderTitle =  $('.product-page__title').text();
//
//         $('.order_title').val(orderTitle);
//         $('.order_image').val(image);
//         $('.order_type').val(titleSlide);
//         $('.order_price').val(productPrice);
//     });
//     $('#checkout-form').submit(function (e) {
//         e.preventDefault();
//         $.ajax({
//             type: $(this).attr('method'),
//             url: $(this).attr('action'),
//             data: $(this).serialize(),
//             success: (r) => {
//                 $(this).trigger('reset');
//                 $('.success-order').addClass('active');
//                 setTimeout(function(){
//                     $('.success-order').removeClass('active');
//                     console.log('Спасибо. Ваш заказ отправлен.');
//                 }, 3000);
//                 if(r){
//                     var res = JSON.parse(r);
//                 }
//             },
//             error: function (xhr, str) {
//                 console.log('Возникла ошибка: ', xhr);
//             }
//         });
//     });
// });


function quantityProducts() {
    var hrefButton = $('.product-page__buy .btn-primary').attr('href');
    var idButton = $('.product-page__buy .btn-primary').attr('id');
    let $quantityArrowMinus = $(".btn-minus");
    let $quantityArrowPlus = $(".btn-plus");
    $quantityArrowMinus.click(quantityMinus);
    $quantityArrowPlus.click(quantityPlus);
    function quantityMinus() {
        let $quantityNum = $(this).siblings('.basket-quantity');
        if ($quantityNum.val() > 1) {
            $quantityNum.val(+$quantityNum.val() - 1);
            $('.product-page__buy .btn-primary').attr("href", "?add-to-cart="+idButton+"&quantity="+$quantityNum.val()+"");
        }
    }
    function quantityPlus() {
        let $quantityNum = $(this).siblings('.basket-quantity');
        $quantityNum.val(+$quantityNum.val() + 1);
        $('.product-page__buy .btn-primary').attr("href", "?add-to-cart="+idButton+"&quantity="+$quantityNum.val()+"");
    }
};
quantityProducts();