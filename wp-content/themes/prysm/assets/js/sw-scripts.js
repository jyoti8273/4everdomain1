(function ($) {
	'use strict';
    //===== Navigation Settings
    $(".pr3-sidebar-btn").on("click", function(){
        $(".pr3-overlay-bg").addClass('pr3-overlay-on');
        $(".pr3_sidebar_info_content").addClass("pr3-sidebar-on");
        return false;
    }); 

    $(".pr3-sidebar-info .close-menu").on("click", function(){
        $(".pr3-overlay-bg").removeClass("pr3-overlay-on");
        $(".pr3_sidebar_info_content").removeClass("pr3-sidebar-on");
    });

    $(".pr3-overlay-bg").on("click", function(){
        $(this).removeClass("pr3-overlay-on");
        $(".pr3_sidebar_info_content").removeClass("pr3-sidebar-on");
    });
    
    $(window).on("scroll", function(){
        var ScrollOffset = $(this).scrollTop();
        var HeaderOffset = $(".pr3-header-section").outerHeight();
        if ( ScrollOffset > HeaderOffset ) {
            $(".pr3-header-section").addClass("pr3-sticky-on"); 
        } else {
            $(".pr3-header-section").removeClass("pr3-sticky-on");
        }
    }); 

    $(".pr3-mobile-menu-open").on("click", function(){
        $(".pr3-mobile-menu").addClass("pr3-visible-menu");
    }); 

    $(".pr3-mobile-menu-close").on("click", function(){
        $(".pr3-mobile-menu").removeClass("pr3-visible-menu");
    });

    $(".pr3-mobile-menu .menu-item-has-children a").each(function(){
        $(this).on("click", function(){
            $(this).parent().toggleClass("submenu-icon-rotate");
            $(this).siblings("ul").slideToggle();
        });
    });

    //===== Back to top
    $(window).on('scroll', function(event) {
        if ($(this).scrollTop() > 600) {
            $('.pr3-scroll-top').fadeIn(200)
        } else {
            $('.pr3-scroll-top').fadeOut(200)
        }
    });
    $('.pr3-scroll-top').on('click', function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0,
        }, 1500);
    });

    function portfolioSlide($scope, $) {
        $(".pr3-portfolio-slider").slick({
            slidesToShow: 2,
            arrows: false,
            autoplay: true,
            speed: 2000,
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

    function swTestimonialActive($scope, $) {
        $(".pr3-tst-slider-wrapper").slick({
            autoplay: true,
            slidesToShow: 1,
            responsive: [
                {
                    breakpoint: 992, 
                    settings: {
                        slidesToShow: 2,
                    }
                }, 
                {
                    breakpoint: 700, 
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        }); 
    }
    function swBrandCarousel($scope, $) {
        $(".pr3-brand-slider").slick({
            slidesToShow: 4, 
            autoplay: true,
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>',
            responsive: [
                {
                    breakpoint: 1200, 
                    settings: {
                        slidesToShow: 3,
                    }
                }, 
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                }, 
                {
                    breakpoint: 480, 
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    }

    function swblogSlide($scope, $) {
        $(".pr3-blog-slider-wrapper").slick({
            slidesToShow: 1, 
            autoplay: true, 
            speed: 2000,
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>'
        });
    }
	

	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/sw_portfolio_item.default', portfolioSlide);
        elementorFrontend.hooks.addAction('frontend/element_ready/sw_testimonial.default', swTestimonialActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/sw_brand_carousel.default', swBrandCarousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/sw_post_carousel_slider.default', swblogSlide);
    });



})(jQuery);