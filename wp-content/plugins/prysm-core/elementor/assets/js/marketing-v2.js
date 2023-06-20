(function ($) {
	'use strict';

    function portfolioFilterActive($scope, $) {
        $('.filter-list').mixItUp({});
    }

    function marketingServiceActive($scope, $) {
        $('.services-carousel-two').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav:true,
			autoplayHoverPause: true, // Stops autoplay
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="fal fa-long-arrow-left"></span>', '<span class="fal fa-long-arrow-right"></span>' ],
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
    function marketingsponcoreActive($scope, $) {
        $('.sponsors-carousel-three').owlCarousel({
			loop:true,
			margin:30,
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
    function pricingTableActive($scope, $) {
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
    function testimonialActive($scope, $) {
        $('.single-item-carousel-testimonial').owlCarousel({
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


	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/mgv2_service_section.default', marketingServiceActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/mgv2_clients_section.default', marketingsponcoreActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/mgv2_postrolfio_section.default', portfolioFilterActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/mgv2_pricing_table_section.default', pricingTableActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/mgv2_testimonial_section.default', testimonialActive);
    });



})(jQuery);