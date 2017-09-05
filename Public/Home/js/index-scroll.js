 $(function(){
    var rightFixed = $(".right-fixed").offset().top;
    var rightb = $('.right-bb').offset().top;
    $(window).scroll(function(){
        t0 = $(document).scrollTop();
        if(t0>rightb){
            $(".right-fixed").fadeIn();
        }
        if(t0<rightb){
            $(".right-fixed").fadeOut();
        }
    });
})