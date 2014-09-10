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
<!-- 			<header class="section_header sidebar_header">
				<h2><?= get_term_by('slug', get_query_var('brand'), 'brand')->name; ?> Shops</h2>
			</header>
 -->			<ul class="posts cf">
					<?php while ( have_posts() ) : the_post();
						$imageID = get_post_thumbnail_id($post->ID);
						$image = wp_get_attachment_image_src($imageID, 'index-thumb');
						$shop_name = get_post_meta($post->ID, 'shop_name', true);
						$shop_address = get_post_meta($post->ID, 'shop_address', true);
						$shop_map = get_post_meta($post->ID, 'shop_map', true);
						$shop_phone = get_post_meta($post->ID, 'shop_phone', true);
						$shop_transport = get_post_meta($post->ID, 'shop_transport', true);
						$shop_website = get_post_meta($post->ID, 'shop_website', true);
						$shop_opening_times = get_post_meta($post->ID, 'shop_opening_times', true); ?>
					<?// if ( time() > strtotime($voucher_code_start_date) && time() < strtotime($voucher_code_end_date) ) : ?>
					<li class="cf">
					<?php if ( $image ) : ?>
						<figure class="post-image wrapper">
							<img src="<?php echo $image[0]; ?>">
						</figure>
					<?php endif; ?>
						<div class="post-words wrapper">
							<header class="section_header post-header">
								<h2><?php the_title(); ?></h2>
							</header>
							<div class="post-content">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="shop-address cf">
							<span class="partition wrapper">
								<header class="section_header sidebar_header">
									<h4>Shop Details</h4>
								</header>
							</span>
							<div class="wrapper">
								<p><strong>Address:</strong> <?= $shop_name; ?>,<br/><?= str_replace(',', ',<br/>', $shop_address); ?><br/><a href="<?= $shop_map; ?>">(map)</a></p>
								<? if ( $shop_phone ) : ?>
								<p><strong>Telephone:</strong> <?= $shop_phone; ?></p>
								<? endif; ?>
								<? if ( $shop_transport ) : ?>
								<p><strong>Transport:</strong> <?= $shop_transport; ?></p>
								<? endif; ?>
								<? if ( $shop_opening_times ) : ?>
								<p><strong>Opening Times:</strong> <?= $shop_opening_times; ?></p>
								<? endif; ?>
								<? if ( $shop_website ) : ?>
								<p><strong>Website:</strong> <?= $shop_website; ?></p>
								<? endif; ?>
							</div>
							<div class="wrapper google_map">
								<figure>
									<a href="<?= $shop_map; ?>"><img src="http://maps.googleapis.com/maps/api/staticmap?size=400x300&amp;maptype=roadmap\
			&amp;markers=size:mid%7Ccolor:red%7C<?= $shop_address; ?>&amp;sensor=false&amp;scale=2"></a>
								</figure>
							</div>
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