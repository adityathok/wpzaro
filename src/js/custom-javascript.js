// Add your JS customizations here
jQuery(document).ready(function ($) {
	if ($(".wrapper-navbar-sticky").length) {
		const WrapperNavbar = $('#wrapper-navbar');
		var WrapperNavbarTop = WrapperNavbar.height();
		if ($("#wpadminbar").length) {
			WrapperNavbarTop = WrapperNavbarTop + $("#wpadminbar").height();
		}
		$(window).bind('scroll', function () {
			if ($(window).scrollTop() > WrapperNavbarTop) {
				$('body').addClass('body-navbar-scrolled');
				WrapperNavbar.addClass('wrapper-navbar-scrolled');
			} else {
				$('body').removeClass('body-navbar-scrolled');
				WrapperNavbar.removeClass('wrapper-navbar-scrolled');
			}
		});
	}
	$(document).on('click', '.scroll-to-top', function () {
		window.scrollTo(0, 0);
	});
	if ($(".scroll-to-top").length) {
		$(window).bind('scroll', function () {
			var hWindow = $(window).height();
			if ($(window).scrollTop() > WrapperNavbarTop) {
				$('.footer-scrolltotop').show(200);
			} else {
				$('.footer-scrolltotop').hide(200);
			}
		});
	}
});