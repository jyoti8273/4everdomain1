(function ($) {
	'use strict';

    function serviceCarousleActive($scope, $) {
        $('.services-carousel-three').owlCarousel({
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
    function sponsorsCarousleActive($scope, $) {
        $('.sponsors-carousel-two').owlCarousel({
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
					items:5
				},
				1024:{
					items:6
				}
			}
		}); 
    }
    function testimonialCarousleActive($scope, $) {
        $('.testimonial-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav:true,
			//autoplayHoverPause: true, // Stops autoplay
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

    function projectCarousleActive($scope, $) {
        $('.gallery-carousel-two').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			center:true,
			//autoplayHoverPause: true, // Stops autoplay
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="flaticon-left-arrow"></span>', '<span class="flaticon-right-arrow"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1,
					center:false,
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
    
	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/constv4_service_section.default', serviceCarousleActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/constv4_partners_section.default', sponsorsCarousleActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/constv4_testimonial_section.default', testimonialCarousleActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/constv4_project_section.default', projectCarousleActive);
    });



})(jQuery);