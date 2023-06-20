(function ($) {
	'use strict';

        $(".header-cta-btn .sidemenu-btn").on("click", function(){
            $(".pr2-overlay-bg").addClass('pr2-overlay-on');
            $(".pr2_sidebar_info_content").addClass("pr2-sidebar-on");
            return false;
        }); 

        $(".pr2-sidebar-info .close-menu").on("click", function(){
            $(".pr2-overlay-bg").removeClass("pr2-overlay-on");
            $(".pr2_sidebar_info_content").removeClass("pr2-sidebar-on");
        });

        $(".pr2-overlay-bg").on("click", function(){
            $(this).removeClass("pr2-overlay-on");
            $(".pr2_sidebar_info_content").removeClass("pr2-sidebar-on");
        });

        jQuery(window).on('scroll', function() {
            if (jQuery(window).scrollTop() > 250) {
                jQuery('.main-header-area').addClass('sticky-on')
            } else {
                jQuery('.main-header-area').removeClass('sticky-on')
            }
        })
        $('.str-open_mobile_menu').on("click", function() {
            $('.str-mobile_menu_wrap').toggleClass("mobile_menu_on");
        });
        $('.str-open_mobile_menu').on('click', function () {
            $('body').toggleClass('mobile_menu_overlay_on');
        });
        if($('.str-mobile_menu li.menu-item-has-children ul').length){
            $('.str-mobile_menu li.menu-item-has-children').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
            $('.str-mobile_menu li.menu-item-has-children .dropdown-btn').on('click', function() {
                $(this).prev('ul').slideToggle(500);
            });
        }
        
        $(window).on("scroll", function(){
            var scrollBarOffset = $(this).scrollTop();
            if( scrollBarOffset > 300 ){
                $(".pr2-scroll-top").fadeIn();
            } else {
                $(".pr2-scroll-top").fadeOut();
            }
        }); 
        $(window).on("load", function(){
            $(".pr2-achivement-contents .counterup").counterUp({
                time: 1500,
            });
        });
const header = document.querySelector("header.main-header.new_header");
const toggleClass = "is-sticky";

window.addEventListener("scroll", () => {
  const currentScroll = window.pageYOffset;
  if (currentScroll > 50) {
    header.classList.add(toggleClass);
  } else {
    header.classList.remove(toggleClass);
  }
});
	// ===  Sponsors Slider
		$(".pr2-blog-slider").slick({
            slidesToShow: 3, 
            responsive : [
                {
                    breakpoint: 991, 
                    settings: {
                        slidesToShow: 2,
                    }
                },

                {
                    breakpoint: 680, 
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

})(jQuery);