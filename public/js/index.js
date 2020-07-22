$(window).on("load", function () {
    "use strict";
    $(".loader").fadeOut(800);
    $('.side-menu').removeClass('opacity-0');
});

jQuery($=> {
    "use strict";
    let $window = $(window);
    let body = $("body");
    let $root = $("html, body");
    $(body).append('<a href="#" class="back-top"><i class="fa fa-angle-up"></i></a>');
        let amountScrolled = 700;
        let backBtn = $("a.back-top");
        $window.on("scroll", function () {
            if ($window.scrollTop() > amountScrolled) {
                backBtn.addClass("back-top-visible");
            } else {
                backBtn.removeClass("back-top-visible");
            }
        });
        backBtn.on("click", function () {
            $root.animate({
                scrollTop: 0
            }, 700);
            return false;
        });
        $("a.pagescroll").on("click", function (event) {
            event.preventDefault();
            let action = $(this.hash).offset().top;
            if($(this).hasClass('scrollupto')){
                action-=45;
            }
            $("html,body").animate({
                scrollTop: action
            }, 1200);
        });
});