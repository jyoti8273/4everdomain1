(function ($) {
	'use strict';


	function b4SliderActive($scope, $) {
        //Client Testimonial Carousel
        if ($('.client-testimonial-carousel').length && $('.client-thumbs-carousel').length) {

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
                        navText: [ '<span class="flaticon-left-arrow"></span>', '<span class="flaticon-right-arrow"></span>' ],
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
                        navText: [ '<span class="icon flaticon-left-arrow-2"></span>', '<span class="icon flaticon-right-arrow-1"></span>' ],
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
    function b4ProjecyActive($scope, $) {
        // Project Carousel
        if ($('.project-carousel-two').length) {
            $('.project-carousel-two').owlCarousel({
                //animateOut: 'fadeOut',
                //animateIn: 'fadeIn',
                loop:true,
                margin:30,
                nav:true,
                //autoplayHoverPause: true, // Stops autoplay
                smartSpeed: 500,
                autoplay: 6000,
                navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
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
    function b4TestimonialActive($scope, $) {
        // Three Item Carousel
        if ($('.three-item-carousel').length) {
            $('.three-item-carousel').owlCarousel({
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

    function b4AccordionActive($scope, $) {
        // Accordion Box
        if($('.accordion-box-three').length){
            $(".accordion-box-three").on('click', '.acc-btn', function() {
                
                var outerBox = $(this).parents('.accordion-box-three');
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
        elementorFrontend.hooks.addAction('frontend/element_ready/bus4_slider_widget.default', b4SliderActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/bus4_project_section.default', b4ProjecyActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/bus4_testimonial.default', b4TestimonialActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/bus4_faq_widget.default', b4AccordionActive);
    });



})(jQuery);