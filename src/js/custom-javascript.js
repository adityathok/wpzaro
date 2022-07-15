// Add your JS customizations here
jQuery(document).ready(function($) {
	if ( $(".wrapper-navbar-sticky").length ) {
		const WrapperNavbar		= $('#wrapper-navbar');
		var WrapperNavbarTop	= WrapperNavbar.height();
		if ( $("#wpadminbar").length ) {
			WrapperNavbarTop = WrapperNavbarTop + $("#wpadminbar").height();
		}
		$(window).bind('scroll', function() {
			if ($(window).scrollTop() > WrapperNavbarTop) {
				$('body').addClass('body-navbar-scrolled');
				WrapperNavbar.addClass('wrapper-navbar-scrolled');
			} else {
				$('body').removeClass('body-navbar-scrolled');
				WrapperNavbar.removeClass('wrapper-navbar-scrolled');
			}
		});
	}
});