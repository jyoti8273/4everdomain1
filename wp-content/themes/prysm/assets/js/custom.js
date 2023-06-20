(function ($) {
    'use strict';

    /*------------- preloader js --------------*/
	function loader() {
		$(window).on('load', function () {
			$('.loading-preloader').addClass('loaded');
			$("#loading").fadeOut(500);
			// Una vez haya terminado el preloader aparezca el scroll

			if ($('.loading-preloader').hasClass('loaded')) {
				// Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
				$('#loading-preloader').delay(400).queue(function () {
					$(this).remove();
				});
			}
		});
	}
	loader();

	$(document).ready(function() {
		$('.pr-widget-wrap select, .pr-footer-widget select').niceSelect();
	  });


})(jQuery);
