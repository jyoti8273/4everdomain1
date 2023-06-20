(function ($) {
	'use strict';

    function sortableMasonry() {
        if($('.sortable-masonry').length){

            var winDow = $(window);
            // Needed variables
            var $container=$('.sortable-masonry .items-container');
            var $filter=$('.filter-btns');

            $container.isotope({
                filter:'*',
                masonry: {
                    columnWidth : '.masonry-item.col-lg-4'
                },
                animationOptions:{
                    duration:500,
                    easing:'linear'
                }
            });
            // Isotope Filter 
            $filter.find('li').on('click', function(){
                var selector = $(this).attr('data-filter');

                try {
                    $container.isotope({ 
                        filter	: selector,
                        animationOptions: {
                            duration: 500,
                            easing	: 'linear',
                            queue	: false
                        }
                    });
                } catch(err) {

                }
                return false;
            });


            winDow.bind('resize', function(){
                var selector = $filter.find('li.active').attr('data-filter');

                $container.isotope({ 
                    filter	: selector,
                    animationOptions: {
                        duration: 500,
                        easing	: 'linear',
                        queue	: false
                    }
                });
            });


            var filterItemA	= $('.filter-btns li');

            filterItemA.on('click', function(){
                var $this = $(this);
                if ( !$this.hasClass('active')) {
                    filterItemA.removeClass('active');
                    $this.addClass('active');
                }
            });
        }
    }
    sortableMasonry();

    function singleCarousleActive($scope, $) {
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

    function sponsorsActiveAg($scope, $) {
        // Sponsors Carousel
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
    //LightBox / Fancybox
	if($('.lightbox-image').length) {
		$('.lightbox-image').fancybox({
			openEffect  : 'fade',
			closeEffect : 'fade',
			helpers : {
				media : {}
			}
		});
	}

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/ag2_testimonial.default', singleCarousleActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/ag2_partner_carousle.default', sponsorsActiveAg);
    });  
    
})(jQuery);