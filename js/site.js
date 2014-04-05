
jQuery(document).ready(function($) {

	$('.voucher-code-button').click(function(e){
		vouchercode = $(this).data('voucher-code');
		$(this).replaceWith('<input class="voucher-code-button" value="' + vouchercode + '" disabled="disabled" />');
		// $(this).text(vouchercode);
	});

	navOffset = Math.round($('nav[role="navigation"]').offset().top);
	navHeight = $('nav[role="navigation"]').outerHeight();
	console.log(navOffset);

	$(window).scroll(function(){
		scrollPosition = $(window).scrollTop();
		console.log(scrollPosition);
		if ( scrollPosition >= navOffset ) {
			console.log('its happening!');
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

});

jQuery(window).load(function($){
	if ( $('.equalHeights').length ) {
		$('.equalHeights').equalHeights();
	}
	if ( $('.index_ad_high').length ) {
		$('.index_ad_high').css('min-height','');
	}
});
