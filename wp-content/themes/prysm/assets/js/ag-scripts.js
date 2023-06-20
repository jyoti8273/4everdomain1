(function ($) {
	'use strict';

    $('.open_mobile_menu').on("click", function() {
        $('.mobile_menu_wrap').toggleClass("mobile_menu_on");
    });
    $('.open_mobile_menu').on('click', function () {
        $('body').toggleClass('mobile_menu_overlay_on');
    });
    if($('.mobile_menu li.menu-item-has-children ul').length){
        $('.mobile_menu li.menu-item-has-children').append('<div class="dropdown-btn"><span class="fas fa-caret-right"></span></div>');
        $('.mobile_menu li.menu-item-has-children .dropdown-btn').on('click', function() {
            $(this).prev('ul').slideToggle(500);
        });
    }
    $(".dropdown-btn").on("click", function () {
        $(this).toggleClass("toggle-open");
    });


    //===== Back to top
    $(window).on('scroll', function(event) {
        if ($(this).scrollTop() > 600) {
            $('.scrollup').fadeIn(200)
        } else {
            $('.scrollup').fadeOut(200)
        }
    });
    $('.scrollup').on('click', function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0,
        }, 1500);
    });

    function agServiceSlider($scope, $) {
        $('#pr-an-service-slide').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            ]
        });
    }
    function agTeamSlider($scope, $) {
        $('.pr-an-team-slider').slick({
            arrow: true,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: ".team-left_arrow",
            nextArrow: ".team-right_arrow",
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
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
            }
            ]
        });
    }

    function agProjectSlide($scope, $) {
        $('.pr-an-project-slider').slick({
            arrow: true,
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            prevArrow: ".project-left_arrow",
            nextArrow: ".project-right_arrow",
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
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            ]
        });
    }

    function agBlogSlide($scope, $) {
        $('.pr-an-blog-slider').slick({
            arrow: true,
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: ".blg-an-left_arrow",
            nextArrow: ".blg-an-right_arrow",
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
            }
            ]
        });
    }
	

	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/ag_service_item.default', agServiceSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/ag_team.default', agTeamSlider);
        elementorFrontend.hooks.addAction('frontend/element_ready/ag_portfolio.default', agProjectSlide);
        elementorFrontend.hooks.addAction('frontend/element_ready/ag_blog_grid.default', agBlogSlide);
    });



})(jQuery);