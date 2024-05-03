if ($('.hero').length > 0) {
    $('#header').remove();
    $('.header').addClass('header-main');
}

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

// $('.about-nav a').on('click', function (e){
//     e.preventDefault();
//     var $this = $(this);
//     var formatsButtonData = $this.data('nav');
//     $('.about-item, .about-nav a').removeClass('active');
//     $this.addClass('active');
//     $('div [data-tab= '+formatsButtonData+']').addClass('active');
// });
$(".reviews-slider").slick({
    dots: false,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    centerMode: true,
    variableWidth: true,
    prevArrow: $('.slider-prev'),
    nextArrow: $('.slider-next'),
    responsive: [
        {
            breakpoint: 576,
            settings: {
                variableWidth: false,
                centerMode: false,
            }
        }
    ]

});
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
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
$(window).on('load', function(){
    var win = $(this); //this = window
    if (win.width() >= 992) {
        $(window).on('mousemove', function(e) {
            var w = $(window).width();
            var h = $(window).height();
            var offsetX = 0.5 - e.pageX / w;
            var offsetY = 0.5 - e.pageY / h;
            $(".layer").each(function(i, el) {
                var offset = parseInt($(el).data('offset'));
                var translate = "translate3d(" + Math.round(offsetX * offset) + "px," + Math.round(offsetY * offset) + "px, 0px)";
                $(el).css({
                    '-webkit-transform': translate,
                    'transform': translate,
                    'moz-transform': translate
                });
            });
        });
        $(".main").onepage_scroll({
            sectionContainer: "section",     // sectionContainer accepts any kind of selector in case you don't want to use section
            easing: "ease",                  // Easing options accepts the CSS3 easing animation such "ease", "linear", "ease-in",
            animationTime: 800,             // AnimationTime let you define how long each section takes to animate
            pagination: true,                // You can either show or hide the pagination. Toggle true for show, false for hide.
            updateURL: false,                // Toggle this true if you want the URL to be updated automatically when the user scroll to each page.
            beforeMove: function(index) {},  // This option accepts a callback function. The function will be called before the page moves.
            afterMove: function(index) {},   // This option accepts a callback function. The function will be called after the page moves.
            loop: false,                     // You can have the page loop back to the top/bottom when the user navigates at up/down on the first/last page.
            keyboard: true,                  // You can activate the keyboard controls
            responsiveFallback: false,        // You can fallback to normal page scroll by defining the width of the browser in which
            direction: "vertical"            // You can now define the direction of the One Page Scroll animation. Options available are "vertical" and "horizontal". The default value is "vertical".
        });
    }
});

$(".header-nav a").on('click', function (e) {
    var ths = $(this);
    var thsData = ths.data('index');
    $(".main").moveTo(thsData);
});
$(".hero-link a, .header-info a").on('click', function (e) {
    var ths = $(this);
    var thsData = ths.data('index');
    $(".main").moveTo(thsData);
});

$('.product-item.disabled a').on('click', function (e) {
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

$(document).ready(function() {
    $('.product-page__buy a').on('click', function (e) {
        var image =  $('.slider-for .slick-current img').attr('src');
        var titleSlide =  $('.product-page__type-list .slick-current .slide-title').text();
        var productPrice =  $('.product-page__price').text();
        var orderTitle =  $('.product-page__title').text();

        $('.order_title').val(orderTitle);
        $('.order_image').val(image);
        $('.order_type').val(titleSlide);
        $('.order_price').val(productPrice);
    });
    $('#checkout-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: (r) => {
                $(this).trigger('reset');
                $('.success-order').addClass('active');
                setTimeout(function(){
                    $('.success-order').removeClass('active');
                    console.log('Спасибо. Ваш заказ отправлен.');
                }, 3000);
                if(r){
                    var res = JSON.parse(r);
                }
            },
            error: function (xhr, str) {
                console.log('Возникла ошибка: ', xhr);
            }
        });
    });
});