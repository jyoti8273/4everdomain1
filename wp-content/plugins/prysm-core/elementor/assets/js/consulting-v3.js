(function ($) {
	'use strict';


	

    function conv3ServiceActive($scope, $) {
        // Services Carousel
        $('.services-carousel').owlCarousel({
            //animateOut: 'fadeOut',
            //animateIn: 'fadeIn',
            loop:true,
            margin:30,
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
                    items:2
                },
                800:{
                    items:2
                },
                1024:{
                    items:3
                },
                1200:{
                    items:3
                }
            }
        });  
    }
    function caseCarousaleActive($scope, $) {
        $('.case-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
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
					items:2
				},
				1024:{
					items:2
				},
				1200:{
					items:2
				}
			}
		}); 
    }
    function accordionActive($scope, $) {
        $(".accordion-box-two").on('click', '.acc-btn', function() {
			
			var outerBox = $(this).parents('.accordion-box-two');
			var target = $(this).parents('.accordion');
			
			if($(this).hasClass('active')!==true){
				$(outerBox).find('.accordion .acc-btn').removeClass('active');
			}
			
			if ($(this).next('.acc-conten').is(':visible')){
				return false;
			}else{
				$(this).addClass('active');
				$(outerBox).children('.accordion').removeClass('active-block');
				$(outerBox).find('.accordion').children('.acc-conten').slideUp(300);
				target.addClass('active-block');
				$(this).next('.acc-conten').slideDown(300);	
			}
		});	
    }

    function conv3testimonialActive($scope, $) {
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
    function sponnsoreCarouselActive($scope, $) {
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
    
	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/constv3_service_section.default', conv3ServiceActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/constv3_casestudy_section.default', caseCarousaleActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/constv3_faq_section.default', accordionActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/constv3_testimonial_section.default', conv3testimonialActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/constv3_sponcore_section.default', sponnsoreCarouselActive);
    });



})(jQuery);