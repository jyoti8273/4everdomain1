(function ($) {
	'use strict';
	// ===  Sponsors Slider

    //Sticky 
    $(window).on("scroll", function(){
        var ScrollBarPos = $(this).scrollTop(); 
        if(ScrollBarPos > 150 ) {
            $(".pr6-header-section").addClass("pr6-header-sticky"); 
        } else {
            $(".pr6-header-section").removeClass("pr6-header-sticky");
        }
    }); 

    //Mobile Menu 
    $(".pr6-mobile-menu-btn").on("click", function(e){
        e.preventDefault(); 
        $(".pr6-mobile-navigation").addClass("pr6-mobile-menu-on");
        $(".pr6-body-overlay").addClass("pr6-body-overlay-on");
    }); 
    
    $(".pr6-mobile-menu-close").on("click", function(e){
        e.preventDefault();
        $(".pr6-mobile-navigation").removeClass("pr6-mobile-menu-on");
        $(".pr6-body-overlay").removeClass("pr6-body-overlay-on");
    });

    $(".pr6-body-overlay").on("click", function(){
        $(".pr6-mobile-navigation").removeClass("pr6-mobile-menu-on");
        $(this).removeClass("pr6-body-overlay-on");
    });

    $(".pr6-mobile-navigation li.menu-item-has-children a").each(function(){
        $(this).on("click", function(){
            $(this).siblings('ul').slideToggle();
        });
    });

	function financeBrand($scope, $) {
        $(".pr6-brand-slider").slick({
            slidesToShow: 4,
            autoplay: true, 
            arrows: false,
            responsive: [
                {
                    breakpoint: 992, 
                    settings: {
                        slidesToShow: 3,
                    }
                }, 
                {
                    breakpoint: 640, 
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ]
        });

	}
    function financecase($scope, $) {
        $(".pr6-case-vh-slider").AnimatedSlider({
            prevButton: ".prev-btn", 
            nextButton: ".next-btn",
            visibleItems: 3,
            infiniteScroll: true,
            willChangeCallback: function(obj, item) { $("#statusText").text("Will change to " + item); },
            changedCallback: function(obj, item) { $("#statusText").text("Changed to " + item); }
        });
    }

    function finanService($scope, $) {
        $(".pr6-service-slider").each(function(){
            var SrSliderLength = $(this).children().length; 
            if ( SrSliderLength > 1 ) {
                $(this).slick({
                    slidesToShow: 1, 
                    autoplay: false, 
                    speed: 1500,
                    prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-angle-left"></i></button>',
                    nextArrow: '<button type="button" class="slick-next"><i class="fas fa-angle-right"></i></button>',
                }); 
            }
        });
    }

    function financeTestimonialActive($scope, $) {
        $(".pr6-testimonial-slider").slick({
            slidesToShow: 2, 
            autoplay: true,
            vertical: true, 
            verticalSwipping: true,
            dots: true,
        });
    }
    function financepostSlideActive($scope, $) {
        $(".pr6-blog-slider").slick({
            slidesToShow: 1, 
            autoplay: true,
            speed: 1500,
            prevArrow: '<button type="button" class="prev-btn"><i class="fas fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="next-btn"><i class="fas fa-angle-right"></i></button>',

        });
    }

    function financeProgress($scope, $) {
        $(".progress-bar").ProgressBar();
    }

    function teamSocial($scope, $) {
        $(".pr6-ld-member").each(function(){
            $(this).hover(function(){
                $(this).find(".pr6-team-socials").slideToggle();
            });
            
        });
    }

    $(".pr6-vd-btn a").magnificPopup({
        type: 'iframe', 
        iframe: {
            patterns: {
              youtube: {
                index: 'youtube.com/', 
                id: 'v=',
                src: 'https://www.youtube.com/embed/%id%?autoplay=1'
              }
            }
        }
    });
	

	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/finance_brand_carousel.default', financeBrand);
        elementorFrontend.hooks.addAction('frontend/element_ready/finance_portfolio_item.default', financecase);
        elementorFrontend.hooks.addAction('frontend/element_ready/finance_skill_bar.default', financeProgress);
        elementorFrontend.hooks.addAction('frontend/element_ready/finance_team.default', teamSocial);
        elementorFrontend.hooks.addAction('frontend/element_ready/finance_testimonial.default', financeTestimonialActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/finance_post_slider.default', financepostSlideActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/finance_service.default', finanService);
    });



})(jQuery);