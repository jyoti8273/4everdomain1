(function ($) {
	'use strict';

    //LightBox / Fancybox
	// Sponsors Carousel
    function lawSpncorCarousleActive($scope, $) {
        if ($('.sponsors-carousel').length) {
            $('.sponsors-carousel').owlCarousel({
                loop:true,
                margin:0,
                nav:true,
                rtl: true,
                smartSpeed: 500,
                autoplay: 4000,
                navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:2
                    },
                    600:{
                        items:3
                    },
                    800:{
                        items:4
                    },
                    1024:{
                        items:5
                    }
                }
            });    		
        }
	}
    function lawTestimonialeActive($scope, $) {
        // Single Item Carousel
        if ($('.single-item-carousel').length) {
            $('.single-item-carousel').owlCarousel({
                //animateOut: 'fadeOut',
                //animateIn: 'fadeIn',
                loop:true,
                margin:0,
                nav:true,
                autoplayHoverPause: true, // Stops autoplay
                smartSpeed: 500,
                autoplay: 6000,
                navText: [ '<span class="flaticon-left-arrow"></span>', '<span class="flaticon-right-arrow"></span>' ],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    800:{
                        items:1
                    },
                    1024:{
                        items:1
                    },
                    1200:{
                        items:1
                    }
                }
            });    		
        }
	}

    function lawFaqActive($scope, $) {
        // Accordion Box
        if($('.accordion-box-two').length){
            $(".accordion-box-two").on('click', '.acc-btn', function() {
                
                var outerBox = $(this).parents('.accordion-box-two');
                var target = $(this).parents('.accordion');
                
                if($(this).hasClass('active')!==true){
                    $(outerBox).find('.accordion .acc-btn').removeClass('active');
                }
                
                if ($(this).next('.acc-content').is(':visible')){
                    return false;
                }else{
                    $(this).addClass('active');
                    $(outerBox).children('.accordion').removeClass('active-block');
                    $(outerBox).find('.accordion').children('.acc-content').slideUp(300);
                    target.addClass('active-block');
                    $(this).next('.acc-content').slideDown(300);	
                }
            });	
        }
	}

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/law_partner_carousle.default', lawSpncorCarousleActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/law_testimonial.default', lawTestimonialeActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/law_faq.default', lawFaqActive);
    });  
    
})(jQuery);