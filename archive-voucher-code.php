<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
	<?php if ( have_posts() ) : ?>
	<section id="content" class="cf">
		<section class="partition wrapper cf">
		    <div class="wrapper partition page_headline">
		      <header class="post-header">
				<h2><?= get_term_by('slug', get_query_var('brand'), 'brand')->name; ?> voucher codes</h2>
		      </header>
		      	<figure class="wrapper brand-image">
		      		<? $brand_image_url = apply_filters( 'taxonomy-images-queried-term-image-url', '', array( 'image_size' => 'medium' ) );?>
	    			<? if ( $brand_image_url ) : ?>
		    			<img src="<?= $brand_image_url; ?>">
		    		<? endif; ?>
		      	</figure>
		        <div class="wrapper brand-description"><?= category_description(); ?></div>
		    </div>
			<ul class="posts cf">
					<?php while ( have_posts() ) : the_post();
						$imageID = get_post_thumbnail_id($post->ID);
						$image = wp_get_attachment_image_src($imageID, 'index-thumb');
						$voucher_code_end_date = get_post_meta($post->ID, 'voucher_code_end_date', true);
						$voucher_code_start_date = get_post_meta($post->ID, 'voucher_code_start_date', true);
						$voucher_code_terms = get_post_meta($post->ID, 'voucher_code_terms', true);
						$voucher_code_url = get_post_meta($post->ID, 'voucher_code_url', true); ?>
					<?// if ( time() > strtotime($voucher_code_start_date) && time() < strtotime($voucher_code_end_date) ) : ?>
					<li class="list-voucher-code cf">
						<? if ( $image ) : ?>
						<figure class="wrapper">
							<img src="<?= $image[0]; ?>">
						</figure>
						<? endif; ?>
						<header class="wrapper">
							<h3><? the_content(); ?></h3>
							<p class="meta">Start: <?= date('jS F Y', strtotime($voucher_code_start_date)); ?> | Expiry: <?= date('jS F Y', strtotime($voucher_code_end_date)); ?></p>
						</header>
						<div class="wrapper">
							<a target="_blank" class="voucher-code-button" data-voucher-code="<? the_title(); ?>" href="<?= $voucher_code_url; ?>">Reveal code &amp; open site</a>
						</div>
						<? if ( $voucher_code_terms != '' && $voucher_code_terms != 'Not Provided' ) : ?>
						<footer class="wrapper">
							<p><small><strong>Terms:</strong> <?= $voucher_code_terms; ?></small></p>
						</footer>
						<? endif; ?>
					</li>
					<? // endif; ?>
				<?php endwhile; ?>
			</ul>
		</section>
	</section>
	<?php else: ?>
	<section id="content" class="cf">
	    <div class="wrapper partition page_headline">
	      <header class="post-header">
				<h2><?= get_term_by('slug', get_query_var('brand'), 'brand')->name; ?> voucher codes</h2>
	      </header>
	      	<figure class="wrapper brand-image">
	      		<? $brand_image_url = apply_filters( 'taxonomy-images-queried-term-image-url', '', array( 'image_size' => 'medium' ) );?>
    			<? if ( $brand_image_url ) : ?>
	    			<img src="<?= $brand_image_url; ?>">
	    		<? endif; ?>
	      	</figure>
	        <div class="wrapper brand-description"><?= category_description(); ?></div>
	    </div>
	<p class="wrapper"><em>There are no voucher codes for this brand right now</em></p>
	</section>
	<?php endif; ?>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>