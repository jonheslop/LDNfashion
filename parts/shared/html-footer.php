	<script type="text/javascript">
	  window.___gcfg = {lang: 'en-GB'};

	  (function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/platform.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=197891740280631";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<?php if (is_home()) : ?>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/responsiveslides.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jQuery.equalHeights.js"></script>
	<?php endif; ?>
	<?php if (is_single()) : ?>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.fitvids.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.video').fitVids();
			});
		</script>
	<?php endif; ?>
	<?php wp_footer(); ?>
	</body>
</html>