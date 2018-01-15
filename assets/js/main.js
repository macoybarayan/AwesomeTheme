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

jQuery(document).ready(function( $ ) {

	$('.with-slider .slider-wrapper ul').lightSlider({
        item:1,
        loop:true,
        speed:900,
        controls: true,
        adaptiveHeight: true,
        auto: true,
        pause: 3000
    });

    var carousel = $('.with-carousel .slider-wrapper ul').lightSlider({
        item:4,
        slideMove: 4,
        loop:true,
        speed:900,
        controls: false,
        adaptiveHeight: true,        
        auto: true,
        pause: 3000,
    });

    $('.with-carousel #goToPrevSlide').click(function(){
        carousel.goToPrevSlide(); 
    });
    $('.with-carousel #goToNextSlide').click(function(){
        carousel.goToNextSlide(); 
    });

    $('.content-slider ul').lightSlider({
        item:1,
        loop:true,
        speed:900,
        controls: true,
        adaptiveHeight: true,
        auto: true,
        pause: 3000
    });

    var modal = new Custombox.modal({
	  content: {
	    //effect: 'Fadein',
	    target: '.modal',
	    positionX: 'center',
	    positionY: 'center'
	  }
	});

	$("#view-more").click(function(){	
		modal.open();
	});

	$(".open-popup").click(function(e){	
		e.preventDefault();

		var target = $(this).attr("href");

		var faculty = new Custombox.modal({
		  content: {
		    //effect: 'Fadein',
		    target: target,
		    positionX: 'center',
		    positionY: 'center'
		  }
		});

		faculty.open();
	});

	var bg = $(".tab-heading li .active").data('bg'); 
	$("#section-seven").css("background", "url(" +bg+ ")");
	$(".tab-heading li > a").click(function(){
		if(!$(this).hasClass('active')){
			$(".tab-heading li > a").removeClass("active");
			$(this).addClass("active");

			var bg_image = $(this).data('bg');
			$("#section-seven").css("background-image", "url(" +bg_image+ ")");

			var count = $(this).data("id"); 
			$(".tab-container .tab-content").removeClass("active");
			$(".tab-container .tab-content-" + count).addClass("active");
		}
	});

	$("#contact-us").click(function(){	
		$(this).fadeOut(function(){
			$("#contact-form").slideDown();
		})
	});

	$('#join').on('click', function(e) {
	    e.preventDefault();
	    utils.scrollTo('#section-seven', 40, 'slow');
	});
});




$(window).resize(function() {
    // sticky header
    utils.stickyBar('.site-header');
});

$(window).scroll(function() {
    // sticky header
    utils.stickyBar('.site-header');
});