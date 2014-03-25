
	jQuery(document).ready(function($) {

		$('.voucher-code-button').click(function(e){
			vouchercode = $(this).data('voucher-code');
			$(this).replaceWith('<input class="voucher-code-button" value="' + vouchercode + '" disabled="disabled" />');
			// $(this).text(vouchercode);
		});

	});

