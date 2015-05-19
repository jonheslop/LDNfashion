function navHeightFix() {
	var navHeight = jQuery('nav[role="navigation"]').outerHeight();
	jQuery('body').css('margin-top',navHeight);
}

jQuery(document).ready(function($) {

	// Initialize Blazy
	var bLazy = new Blazy({
		success: function(ele){
			// Image has loaded
			// console.log('loaded',ele);
			if ( jQuery('.equalHeights').length ) {
				jQuery('.equalHeights').children().attr('style','');
				jQuery('.equalHeights').equalHeights();
			}
		}
	});

	navHeightFix();

	$('.menuToggle').click(function(e){
		e.preventDefault();
		$(this).parent().find('ul').first().slideToggle();
	});
	if ( $(window).width() < 1024 ) {
		$('.menu-item-has-children > a').one('click', function(e){
			e.preventDefault();
			$(this).parent().find('ul').first().slideToggle();
		});
	}

	$('.voucher-code-button').click(function(e){
		vouchercode = $(this).data('voucher-code');
		$(this).replaceWith('<input class="voucher-code-button" value="' + vouchercode + '" disabled="disabled" />');
		// $(this).text(vouchercode);
	});

	// Go Slider! by http://responsiveslides.com/
	if ( $('.slides').length ) {
	    $('.slides').responsiveSlides({
		    	pager: false,
		    	nav: true,
		    	auto: true,
		    	timeout: 6000,
		    	speed: 1000,
		    	prevText: '&#9001;',
		    	nextText: '&#9002;'
		    });
	}

	// Top Nav show more
	// $('#menu-primary-nav li:last-child').click(function(e){
	// 	e.preventDefault();
	// 	var $toggle = $('#menu-primary-nav li:last-child');
	// 	var more = 'More&nbsp;&raquo;';
	// 	var less = '&laquo;&nbsp;Less';
	// 	$toggle.toggleClass('active');
	// 	if ( $toggle.hasClass('active') ) {
	// 		$toggle.find('a').html(less);
	// 		$('#menu-primary-nav li').show();
	// 	} else {
	// 		$toggle.find('a').html(more);
	// 		$('#menu-primary-nav li').attr('style','');
	// }
	// });

});

jQuery(window).load(function($){
	if ( jQuery('.equalHeights').length ) {
		jQuery('.equalHeights').equalHeights();
	}
	if ( jQuery('.index_ad_high').length ) {
		jQuery('.index_ad_high').css('min-height','');
	}
	if ( jQuery('.slides').length ) {
		if ( jQuery(window).width() > 888 ) {
			jQuery('.slides').css({'width' : jQuery('.slides').width(), 'height' : jQuery('.slides').height()}).addClass('loaded');
		} else {
			jQuery('.slides').removeAttr('style').removeClass('loaded');
		}
	}

});
jQuery(window).resize(function($){

	navHeightFix();

	if ( jQuery('.equalHeights').length ) {
		jQuery('.equalHeights').children().attr('style','');
		jQuery('.equalHeights').equalHeights();
	}

	if ( jQuery('.slides').length ) {
		var resizetimeout;
		jQuery('.slides').removeAttr('style').removeClass('loaded');
		function resized(){
			if ( jQuery(window).width() > 888 ) {
				jQuery('.slides').css({'width' : jQuery('.slides').width(), 'height' : jQuery('.slides').height()}).addClass('loaded');
			} else {
				jQuery('.slides').removeAttr('style').removeClass('loaded');
			}
		}
		clearTimeout(resizetimeout);
		resizetimeout = setTimeout(function() {
			resized();
		}, 100);
	}

});
