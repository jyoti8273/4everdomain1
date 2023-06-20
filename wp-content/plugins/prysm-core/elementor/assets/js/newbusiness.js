(function ($) {
	'use strict';

	$(window).on("scroll", function(){
		var ScrollBarPos = $(this).scrollTop(); 
		if(ScrollBarPos > 150 ) {
			$(".main-header").addClass("fixed-header"); 
		} else {
			$(".main-header").removeClass("fixed-header");
		}
	}); 
	function newBusinessActive($scope, $) {
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
	function newBusinessProject($scope, $) {
		$('.single-item-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav:true,
			autoplayHoverPause: true, // Stops autoplay
			smartSpeed: 500,
			autoplay: 6000,
			navText: [ '<span class="flaticonv10-left-arrow"></span>', '<span class="flaticonv10-right-arrow"></span>' ],
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
        elementorFrontend.hooks.addAction('frontend/element_ready/newb_trusted_partner_.default', newBusinessActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/newb_business_section.default', newBusinessProject);
    });



})(jQuery);