(function ($) {
	'use strict';
	// ===  Sponsors Slider

    $(".pr20-mobile-menu-open").on("click", function(){
        $(".pr20-mobile-menu-wrapper").addClass("pr20-mobile-menu-visible");
        $(".pr20-body-overlay").addClass("pr20-body-overlay-on");
    }); 

    $(".pr20-mobile-menu-close").on("click", function(){
        $(".pr20-mobile-menu-wrapper").removeClass("pr20-mobile-menu-visible");
        $(".pr20-body-overlay").removeClass("pr20-body-overlay-on");
    });

    $(".pr20-body-overlay").on("click", function(){
        $(".pr20-mobile-menu-wrapper").removeClass("pr20-mobile-menu-visible"); 
        $(".pr20_sidebar_info_content").removeClass("pr20-sidebar-on");
        $(this).removeClass("pr20-body-overlay-on");
    });

    //Mobile Menu 
    $(".pr20-mobile-menu-btn").on("click", function(e){
        e.preventDefault(); 
        $(".pr20-mobile-navigation").addClass("pr20-mobile-menu-on");
        $(".pr20-body-overlay").addClass("pr20-body-overlay-on");
    }); 
    
    $(".pr20-mobile-menu-close").on("click", function(e){
        e.preventDefault();
        $(".pr20-mobile-navigation").removeClass("pr20-mobile-menu-on");
        $(".pr20-body-overlay").removeClass("pr20-body-overlay-on");
    });

    $(".pr20-body-overlay").on("click", function(){
        $(".pr20-mobile-navigation").removeClass("pr20-mobile-menu-on");
        $(this).removeClass("pr20-body-overlay-on");
    });

    $(".pr20-mobile-navigation li.menu-item-has-children a").each(function(){
        $(this).on("click", function(){
            $(this).siblings('ul').slideToggle();
        });
    });

    //Sticky 
    $(window).on("scroll", function(){
        var scrollBarOffset = $(this).scrollTop();
        if (scrollBarOffset > 150){
            $(".pr20-header-area").addClass("pr20-sticky-on"); 
        } else {
            $(".pr20-header-area").removeClass("pr20-sticky-on");
        }
    });

    //Sidebar Info 
    $(".pr20-sidebar-menu-open").on("click", function(){
        $(".pr20_sidebar_info_content").addClass('pr20-sidebar-on');
        $(".pr20-body-overlay").addClass("pr20-body-overlay-on");
    });

    $(".pr20_sidebar_info_content .close-menu").on("click", function(){
        $(".pr20_sidebar_info_content").removeClass("pr20-sidebar-on");
        $(".pr20-body-overlay").removeClass("pr20-body-overlay-on");
    });

    function counterBox($scope, $) {
        $(window).on("load", function(){
            $(".pr20-counter").counterUp({
                time: 1500,
            });
        });
    }
    function ittestimonialActive($scope, $) {
        $(".pr20-testimonial-slider").slick({
            slidesToShow: 1, 
            arrows: false, 
            dots: true,
        }); 
    }

    $('[data-background]').each(function() {
        $(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
    });

    $(".pr20-video-project a").magnificPopup({
        type: 'iframe', 
        iframe: {
            patterns: {
              youtube: {
                index: 'youtube.com/', 
                id: 'v=',
                src: 'https://www.youtube.com/embed/%id%?autoplay=1'
              }
            }
        }
    });
	

	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/its_counterbox_box.default', counterBox);
        elementorFrontend.hooks.addAction('frontend/element_ready/its_testimonial.default', ittestimonialActive);
    });



})(jQuery);