
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
		    	auto: true,
		    	timeout: 6000,
		    	speed: 1000,
		    	prevText: '&lang;',
		    	nextText: '&rang;'
		    });
	}

	// Top Nav show more
	$('#menu-primary-navigation li:last-child').click(function(e){
		e.preventDefault();
		var $toggle = $('#menu-primary-navigation li:last-child');
		var more = 'More &raquo;';
		var less = '&laquo; Less';
		$toggle.toggleClass('active');
		if ( $toggle.hasClass('active') ) {
			$toggle.find('a').html(less);
			$('#menu-primary-navigation li').show();
		} else {
			$toggle.find('a').html(more);
			$('#menu-primary-navigation li').attr('style','');
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
});
jQuery(window).resize(function($){
	if ( jQuery('.equalHeights').length ) {
		jQuery('.equalHeights').children().attr('style','');
		jQuery('.equalHeights').equalHeights();
	}
});
