(function ($) {
	'use strict';
	$(".navSidebar-button.sidemenu-btn").on("click", function(){
		$(".pr2-overlay-bg").addClass('pr2-overlay-on');
		$(".pr2_sidebar_info_content").addClass("pr2-sidebar-on");
		return false;
	}); 
	//Parallax Scene for Icons
	if($('.parallax-scene-1').length){
		var scene = $('.parallax-scene-1').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-2').length){
		var scene = $('.parallax-scene-2').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-3').length){
		var scene = $('.parallax-scene-3').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-4').length){
		var scene = $('.parallax-scene-4').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	

	$('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
		e.preventDefault();
		var target = $($(this).attr('data-tab'));
		
		if ($(target).is(':visible')){
			return false;
		}else{
			target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
			$(this).addClass('active-btn');
			target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
			target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
			$(target).fadeIn(300);
			$(target).addClass('active-tab');
		}
	});

    function contPartnerCarousal($scope, $) {
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
    function galleryCarousle($scope, $) {
        $('.gallery-carousel').owlCarousel({
			//animateOut: 'fadeOut',
    		//animateIn: 'fadeIn',
			loop:true,
			margin:30,
			nav:true,
			center:true,
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
    function constTestimonialActive($scope, $) {
		var $sync3 = $(".client-testimonial-carousel"),
		$sync4 = $(".client-thumbs-carousel"),
		flag = false,
		duration = 500;

		$sync3
			.owlCarousel({
				loop:true,
				items: 1,
				margin: 0,
				nav: true,
				navText: [ '<span class="flaticonv10-left-arrow"></span>', '<span class="flaticonv10-right-arrow"></span>' ],
				dots: true,
				autoplay: true,
				autoplayTimeout: 5000
			})
			.on('changed.owl.carousel', function (e) {
				if (!flag) {
					flag = false;
					$sync4.trigger('to.owl.carousel', [e.item.index, duration, true]);
					flag = false;
				}
			});

		$sync4
			.owlCarousel({
				loop:true,
				margin:20,
				items: 1,
				nav: false,
				navText: [ '<span class="icon flaticonv10-left-arrow-2"></span>', '<span class="icon flaticonv10-right-arrow-1"></span>' ],
				dots: false,
				center: false,
				autoplay: true,
				autoplayTimeout: 5000,
				responsive: {
					0:{
						items:1,
						autoWidth: false
					},
					400:{
						items:1,
						autoWidth: false
					},
					600:{
						items:1,
						autoWidth: false
					},
					1000:{
						items:1,
						autoWidth: false
					},
					1200:{
						items:1,
						autoWidth: false
					}
				},
			})
			
	.on('click', '.owl-item', function () {
		$sync3.trigger('to.owl.carousel', [$(this).index(), duration, true]);
	})
	.on('changed.owl.carousel', function (e) {
		if (!flag) {
			flag = true;		
			$sync3.trigger('to.owl.carousel', [e.item.index, duration, true]);
			flag = false;
		}
	});
    }
    
	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/cont_trusted_partner.default', contPartnerCarousal);
        elementorFrontend.hooks.addAction('frontend/element_ready/const_project_slider.default', galleryCarousle);
        elementorFrontend.hooks.addAction('frontend/element_ready/const_testimonials.default', constTestimonialActive);
    });



})(jQuery);