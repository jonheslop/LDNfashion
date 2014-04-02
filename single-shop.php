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
	<section id="content" class="cf">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post();
			$imageID = get_post_thumbnail_id($post->ID);
			$image = wp_get_attachment_image_src($imageID, 'large');
			$shop_name = get_post_meta($post->ID, 'shop_name', true);
			$shop_address = get_post_meta($post->ID, 'shop_address', true);
			$shop_map = get_post_meta($post->ID, 'shop_map', true);
			$shop_phone = get_post_meta($post->ID, 'shop_phone', true);
			$shop_transport = get_post_meta($post->ID, 'shop_transport', true);
			$shop_opening_times = get_post_meta($post->ID, 'shop_opening_times', true); ?>
		<article class="post cf">
		<?php if ( $image ) : ?>
			<figure class="post-image wrapper">
				<img src="<?php echo $image[0]; ?>">
			</figure>
		<?php endif; ?>
			<div class="post-words wrapper">
				<header class="section_header post-header">
					<h2><?php the_title(); ?></h2>
					<p class="meta"><?php the_category(',','single'); ?> | <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time></p>
				</header>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
				<div class="shop-address">
					<header class="section_header sidebar_header">
						<h4>Shop Details</h4>
					</header>
					<p><strong>Address:</strong> <?= $shop_name; ?>, <?= $shop_address; ?>, <a href="<?= $shop_map; ?>">(map link)</a></p>
					<p><strong>Telephone:</strong> <?= $shop_phone; ?></p>
					<p><strong>Transport:</strong> <?= $shop_transport; ?></p>
					<p><strong>Opening Times:</strong> <?= $shop_opening_times; ?></p>
				</div>
			</div>
			<?php include(locate_template('parts/_sharing.php')); ?>
			<section class="post-comments wrapper">
				<?php comments_template( '', true ); ?>
			</section>
		</article>
		<?php include(locate_template('parts/_post-prev-next.php')); ?>
		<?php include(locate_template('parts/_related-posts.php')); ?>
	</section>
	<?php endwhile; ?>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>