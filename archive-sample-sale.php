<?php
/**
 * The Template for displaying all single posts
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
		<?php if ( have_posts() ) while ( have_posts() ) : the_post();
			$imageID = get_post_thumbnail_id($post->ID);
			$image = wp_get_attachment_image_src($imageID, 'large'); ?>
	<section id="content" class="cf">
		<article class="post cf">
		<?php if ( $image ) : ?>
			<figure class="post-image wrapper">
				<img src="<?php echo $image[0]; ?>">
			</figure>
		<?php endif; ?>
		    <div class="partition page_headline">
		      <header class="post-header wrapper" style="width: 100%;">
		        <h2><? single_cat_title(); ?></h2>
		      </header>
		        <div class="wrapper brand-description"><?= category_description(); ?></div>
<?			$sample_sale_name = get_post_meta($post->ID, 'sample_sale_name', true);
			$sample_sale_address = get_post_meta($post->ID, 'sample_sale_address', true);
			$sample_sale_map = get_post_meta($post->ID, 'sample_sale_map', true);
			$sample_sale_phone = get_post_meta($post->ID, 'sample_sale_phone', true);
			$sample_sale_transport = get_post_meta($post->ID, 'sample_sale_transport', true);
			$sample_sale_when = get_post_meta($post->ID, 'sample_sale_when', true);
			$sample_sale_description = get_post_meta($post->ID, 'sample_sale_description', true); ?>
					<? if ( $sample_sale_when ) : ?>
			<div class="shop-address cf">
				<span class="partition wrapper">
					<header class="section_header sidebar_header">
						<h4>Sample Sale Details</h4>
					</header>
				</span>
				<div class="wrapper">
					<p><strong>When:</strong> <?= $sample_sale_when; ?></p>
					<? if ( $sample_sale_address ) : ?>
					<p><strong>Address:</strong> <?= $sample_sale_name; ?>,<br/><?= str_replace(',', ',<br/>', $sample_sale_address); ?>,<? if ( $sample_sale_map ) : ?><br/><a href="<?= $sample_sale_map; ?>">(map)</a><? endif; ?></p>
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
					<? if ( $sample_sale_address ) : ?>
				<div class="wrapper google_map">
					<figure>
						<a href="<?= $sample_sale_map; ?>"><img src="http://maps.googleapis.com/maps/api/staticmap?size=400x300&amp;maptype=roadmap\
&amp;markers=size:mid%7Ccolor:red%7C<?= $sample_sale_address; ?>&amp;sensor=false&amp;scale=2"></a>
					</figure>
				</div>
				<? endif; ?>
			</div>
					<? endif; ?>
			<?php include(locate_template('parts/_sharing.php')); ?>
		<?php include(locate_template('parts/_post-prev-next.php')); ?>
		<?php include(locate_template('parts/_related-posts.php')); ?>
	<?php endwhile; ?>
		</article>
		    </div>
	</section>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>