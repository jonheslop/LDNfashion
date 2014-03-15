<footer class="share-links wrapper">
	<header class="section_header sidebar_header">
		<h4>Share this</h4>
	</header>
	<ul class="cf">
		<li>
		<a href="https://twitter.com/share" class="twitter-share-button" data-text="" data-count="vertical" data-url="<?= the_permalink(); ?>" data-counturl="<?= the_permalink(); ?>">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</li>
		<li>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=197891740280631";
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-share-button" data-href="<?= the_permalink(); ?>" data-type="box_count"></div>
		</li>
		<li>
			<div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div>
		</li>
	</ul>
</footer>