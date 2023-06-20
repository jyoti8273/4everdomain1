(function ($) {
	'use strict';

    function webaActivePostSlide($scope, $) {
        // News Carousel
		if ($('.news-carousel').length) {
			$('.news-carousel').owlCarousel({
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
    }
	function webaActiveTestimonial($scope, $) {
		//Client Testimonial Carousel
		if ($('.client-testimonial-carousel-two').length && $('.client-thumbs-carousel-two').length) {

			var $sync3 = $(".client-testimonial-carousel-two"),
				$sync4 = $(".client-thumbs-carousel-two"),
				flag = false,
				duration = 500;

				$sync3
					.owlCarousel({
						loop:true,
						items: 1,
						margin: 0,
						nav: true,
						navText: [ '<span class="fal fa-long-arrow-left"></span>', '<span class="fal fa-long-arrow-right"></span>' ],
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
						margin:0,
						items: 1,
						nav: false,
						navText: [ '<span class="icon fal fa-long-arrow-left"></span>', '<span class="icon fal fa-long-arrow-right"></span>' ],
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
	}
	function webaAccordionActive($scope, $) {
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
	function webAgencyClientPartner($scope, $) {
		// Sponsors Carousel Four
		if ($('.sponsors-carousel-four').length) {
			$('.sponsors-carousel-four').owlCarousel({
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
						items:5
					}
				}
			});    		
		}
	}


	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/weba_blog_grid.default', webaActivePostSlide);
        elementorFrontend.hooks.addAction('frontend/element_ready/weba_testimonial.default', webaActiveTestimonial);
        elementorFrontend.hooks.addAction('frontend/element_ready/weba_faq.default', webaAccordionActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/weba_partner_carousle.default', webAgencyClientPartner);
    });



})(jQuery);