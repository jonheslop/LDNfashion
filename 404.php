<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section role="main" class="container">
	<section id="content" class="cf">
		<header class="header_404 section_header">
			<h2>Page not found, <span>here&rsquo;s a cat gif instead</span></h2>
		</header>
		<? $getGIFS = 'http://api.giphy.com/v1/gifs/random?api_key=dc6zaTOxFJmzC&tag=cat';
		$gifs = json_decode(file_get_contents($getGIFS));
		?>
		<figure>
			<img src="<?= $gifs->data->image_url; ?>">
		</figure>
	</section>
	<aside id="sidebar" class="cf">
		<section class="sidebar_section wrapper">
			<header class="section_header sidebar_header">
				<h4>Search LDNfashion</h4>
			</header>
			<?php get_search_form(); ?>
		</section>
	</aside>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>