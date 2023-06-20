(function ($) {
	'use strict';

    function servoce3CarouselActive($scope, $) {
        $('.three-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<i class="fal fa-long-arrow-left"></i>', '<i class="fal fa-long-arrow-right"></i>' ],
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

    function iconbox3CarouselActive($scope, $) {
        $('.two-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
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
    function projectB3CarouselActive($scope, $) {
        $('.two-project-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
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
    function singleItemActiveBusinesstestimo($scope, $) {
        $('.single-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav:true,
			autoplayHoverPause: true, // Stops autoplay
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<i class="fal fa-arrow-left"></i>', '<i class="fal fa-arrow-right"></i>' ],
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
    function sponsoreCarousleActive($scope, $) {
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

	function postbu3CarouselActive($scope, $) {
        $('.two-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
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
    
	
	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/business2_service_section.default', servoce3CarouselActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/business2_business_section.default', iconbox3CarouselActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/business2_rojects_section.default', projectB3CarouselActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/business2_testimonial_section.default', singleItemActiveBusinesstestimo);
        elementorFrontend.hooks.addAction('frontend/element_ready/business_v2_partners_section.default', sponsoreCarousleActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/business_v2_post_section.default', postbu3CarouselActive);
    });



})(jQuery);