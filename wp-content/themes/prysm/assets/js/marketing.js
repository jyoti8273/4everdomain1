(function ($) {
	'use strict';
    
    $('.open_mobile_menu').on("click", function() {
        $('.mobile_menu_wrap').toggleClass("mobile_menu_on");
    });
    $('.open_mobile_menu').on('click', function () {
        $('body').toggleClass('mobile_menu_overlay_on');
    });

    //===== Back to top
    $(window).on('scroll', function(event) {
        if ($(this).scrollTop() > 600) {
            $('.scrollup-mr').fadeIn(200)
        } else {
            $('.scrollup-mr').fadeOut(200)
        }
    });
    $('.scrollup-mr').on('click', function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0,
        }, 1500);
    });

    jQuery('.video_box').magnificPopup({
        disableOn: 200,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });

    if($('.wow').length){
        var wow = new WOW(
        {
            boxClass:     'wow',
            animateClass: 'animated',
            offset:       0,
            mobile:       true,
            live:         true
        }
        );
        wow.init();
    }

    jQuery(window).on('scroll', function() {
        if (jQuery(window).scrollTop() > 250) {
            jQuery('.pr-mark-main-header').addClass('sticky-on')
        } else {
            jQuery('.pr-mark-main-header').removeClass('sticky-on')
        }
    })
    $(".pr20-sidebar-menu-open").on("click", function(){
        $(".pr20_sidebar_info_content").addClass('pr20-sidebar-on');
        $(".pr20-body-overlay").addClass("pr20-body-overlay-on");
    });

    $(".pr20_sidebar_info_content .close-menu").on("click", function(){
        $(".pr20_sidebar_info_content").removeClass("pr20-sidebar-on");
        $(".pr20-body-overlay").removeClass("pr20-body-overlay-on");
    });

    function mrTestimonialActive($scope, $) {
        $('.pr-mark-testimonial-slider').slick({
            arrow: false,
            dots: true,
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            ]
        });
    }
	function mablogPostSlider($scope, $) {
        $('.pr-mark-blog-slider').slick({
            arrow: false,
            dots: true,
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            ]
        });
    }
    function marProjectSlider($scope, $) {
        $('.pr-mark-case-slider').slick({
            arrow: false,
            dots: true,
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            ]
        });
    }

	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/ma_testimonial_content.default', mrTestimonialActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/ma_blog_post_carousel.default', mablogPostSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/ma_projects_item.default', marProjectSlider);
    });



})(jQuery);