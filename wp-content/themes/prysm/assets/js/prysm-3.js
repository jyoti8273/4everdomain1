(function ($) {
	'use strict';

    //Sticky 
    $(window).on("scroll", function(){
        var ScrollBarPos = $(this).scrollTop(); 
        if(ScrollBarPos > 150 ) {
            $(".pr5-header-section").addClass("pr5-header-sticky"); 
        } else {
            $(".pr5-header-section").removeClass("pr5-header-sticky");
        }
    }); 

    //Mobile Menu 
    $(".pr5-mobile-menu-open a").on("click", function(e){
        e.preventDefault(); 
        $(".pr5-mobile-navigation").addClass("pr5-mobile-menu-on");
        $(".pr5-body-overlay").addClass("pr5-body-overlay-on");
    }); 
    
    $(".pr5-mobile-menu-close").on("click", function(e){
        e.preventDefault();
        $(".pr5-mobile-navigation").removeClass("pr5-mobile-menu-on");
        $(".pr5-body-overlay").removeClass("pr5-body-overlay-on");
    });

    $(".pr5-body-overlay").on("click", function(){
        $(".pr5-mobile-navigation").removeClass("pr5-mobile-menu-on");
        $(this).removeClass("pr5-body-overlay-on");
    });

    $(".pr5-mobile-navigation li.menu-item-has-children a").each(function(){
        $(this).on("click", function(){
            $(this).siblings('ul').slideToggle();
        });
    });

	// ===  Sponsors Slider
	function blog3SlideActive($scope, $) {
		$(".pr5-blog-slider").slick({
            slidesToShow: 3,
            arrows: false, 
            dots: true,
            responsive: [
                {
                    breakpoint: 992, 
                    settings: {
                        slidesToShow: 2,
                    }
                }, 
                {
                    breakpoint: 740, 
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

	}
	function testimonialActive($scope, $) {
		$(".pr5-testimonial-slider").slick({
            slidesToShow: 2, 
            prevArrow: '<button type="button" class="prev-btn"><i class="fas fa-arrow-left"></i></button>',
            nextArrow: '<button type="button" class="next-btn"><i class="fas fa-arrow-right"></i></button>',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
	}

    $(".pr5-play-btn a").magnificPopup({
        type: 'iframe', 
        iframe: {
            patterns: {
              youtube: {
                index: 'youtube.com/',
          
                id: 'v=', 
                src: 'https://www.youtube.com/embed/%id%?autoplay=1'
              },
          
            },
            srcAction: 'iframe_src', 
        }
    });
    function projectCmScroll($scope, $) {
        $(window).on("load", function(){
            $(".pr5-project-left ul").mCustomScrollbar();
        });
    }

    function projectSlider($scope, $) {
        $(".pr5-tab-content-slider").each(function(){
            var ItemCount = $(this).children().length; 
            if( ItemCount > 2 ) {
                $(this).slick({
                    slidesToShow: 2,
                    autoplay: true,
                    dots: false, 
                    arrows: false,
                    speed: 1500,
                    responsive : [
                        {
                            breakpoint: 640, 
                            settings: {
                                slidesToShow: 1,
                            }
                        }
                    ]
                });
            }
        });

    }

	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/blog-grid-slide-3.default', blog3SlideActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/prysm3_work_testimonial.default', testimonialActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/prysm3_portfolio.default', projectCmScroll);
        elementorFrontend.hooks.addAction('frontend/element_ready/prysm3_portfolio.default', projectSlider);
    });



})(jQuery);