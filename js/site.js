jQuery(document).ready(function($) {

	$('.voucher-code-button').click(function(e){
		vouchercode = $(this).data('voucher-code');
		$(this).replaceWith('<input class="voucher-code-button" value="' + vouchercode + '" disabled="disabled" />');
		// $(this).text(vouchercode);
	});

	navOffset = Math.round($('nav[role="navigation"]').offset().top);
	navHeight = $('nav[role="navigation"]').outerHeight();
	// console.log(navOffset);

	$(window).scroll(function(){
		scrollPosition = $(window).scrollTop();
		// console.log(scrollPosition);
		if ( scrollPosition >= navOffset ) {
			// console.log('its happening!');
			$('body').addClass('fixed').css('margin-top',navHeight);
		} else {
			$('body').removeClass('fixed').css('margin-top',0);
		}
	});

	// Go Slider! by http://responsiveslides.com/
	if ( $('.slides').length ) {
	    $('.slides').responsiveSlides({
		    	pager: false,
		    	nav: true,
		    	auto: false,
		    	timeout: 6000,
		    	speed: 1000,
		    	prevText: '&lang;',
		    	nextText: '&rang;'
		    });
	}

	// Top Nav show more
	$('#menu-primary-nav li:last-child').click(function(e){
		e.preventDefault();
		var $toggle = $('#menu-primary-nav li:last-child');
		var more = 'More&nbsp;&raquo;';
		var less = '&laquo;&nbsp;Less';
		$toggle.toggleClass('active');
		if ( $toggle.hasClass('active') ) {
			$toggle.find('a').html(less);
			$('#menu-primary-nav li').show();
		} else {
			$toggle.find('a').html(more);
			$('#menu-primary-nav li').attr('style','');
	}
	});

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
