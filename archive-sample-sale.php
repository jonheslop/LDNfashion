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
			<header class="section_header sidebar_header">
				<h2><?= get_term_by('slug', get_query_var('brand'), 'brand')->name; ?> Sample Sales</h2>
			</header>
			<ul class="posts cf">
					<?php while ( have_posts() ) : the_post();
						$imageID = get_post_thumbnail_id($post->ID);
						$image = wp_get_attachment_image_src($imageID, 'index-thumb');
						$sample_sale_name = get_post_meta($post->ID, 'sample_sale_name', true);
						$sample_sale_address = get_post_meta($post->ID, 'sample_sale_address', true);
						$sample_sale_map = get_post_meta($post->ID, 'sample_sale_map', true);
						$sample_sale_phone = get_post_meta($post->ID, 'sample_sale_phone', true);
						$sample_sale_transport = get_post_meta($post->ID, 'sample_sale_transport', true);
						$sample_sale_when = get_post_meta($post->ID, 'sample_sale_when', true);
						$sample_sale_description = get_post_meta($post->ID, 'sample_sale_description', true); ?>
					<?// if ( time() > strtotime($voucher_code_start_date) && time() < strtotime($voucher_code_end_date) ) : ?>
					<li class="list-sample-sale cf">
						<? if ( $image ) : ?>
						<figure class="wrapper">
							<img src="<?= $image[0]; ?>">
						</figure>
						<? endif; ?>
						<header class="wrapper">
							<h3><a href="<?php the_permalink(); ?>"><? the_title(); ?></a></h3>
							<p><? the_content(); ?></p>
						</header>
						<div class="wrapper">
								<a href="<?= $sample_sale_map; ?>"><img src="http://maps.googleapis.com/maps/api/staticmap?size=250x100&amp;maptype=roadmap\
		&amp;markers=size:mid%7Ccolor:red%7C<?= $sample_sale_address; ?>&amp;sensor=false"></a>
							<? if ( $sample_sale_when ) : ?>
							<p><strong>When:</strong> <?= $sample_sale_when; ?></p>
							<? endif; ?>
							<? if ( $sample_sale_address ) : ?>
							<p><strong>Address:</strong> <?= $sample_sale_name; ?>,<br/><?= str_replace(',', ',<br/>', $sample_sale_address); ?>,<br/><a href="<?= $sample_sale_map; ?>">(map)</a></p>
							<? endif; ?>
							<? if ( $sample_sale_phone ) : ?>
							<p><strong>Telephone:</strong> <?= $sample_sale_phone; ?></p>
							<? endif; ?>
							<? if ( $sample_sale_transport ) : ?>
							<p><strong>Transport:</strong> <?= $sample_sale_transport; ?></p>
							<? endif; ?>
							<? if ( $sample_sale_description ) : ?>
							<p><strong>Details:</strong> <?= $sample_sale_description; ?></p>
							<? endif; ?>
						</div>
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
	        <h2><? single_cat_title(); ?></h2>
	      </header>
	        <div class="brand-description"><?= category_description(); ?></div>
	    </div>
	<p class="wrapper"><em>There are no upcoming samples sales right now</em></p>
	</section>
	<?php endif; ?>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>