// functions
var utils = {
    scrollTo : function(elem, offset, speed) {
        $('html,body').animate({scrollTop: $(elem).offset().top - offset}, speed);
    },
    stickyBar : function(selector) {
        // sticky header
        $(selector).sticky({
            topSpacing: 0,
            zIndex: 9999,
        });
    }
}

$('input[data-key=confirm_user_password]').attr('placeholder', 'Confirm Password');

$(window).on('resize load', function() {
    if($(window).width() <= 640){ 
        $('.rpt_plan').find('.rpt_price').addClass('rpt_price_style_2');
        $('.rpt_plan').find('.rpt_price').removeClass('rpt_price');        
    }
});

$(window).on('resize load', function() {
    // sticky header
    utils.stickyBar('.site-header');
});

$(window).scroll(function() {
    // sticky header
    utils.stickyBar('.site-header');
});