<?php
/**
 * The template for displaying Category Archive pages
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
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Latest Sample Sale</h4>
			</header>
			<ul class="posts cf equalHeights">
				<?php query_posts($query_string.'&posts_per_page=1&post_type=sample-sale'); ?>
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
				<li class="post-thumb cf">
					<?php if ( $image ) : ?>
					<a href="<?php the_permalink(); ?>">
						<figure class="post-image">
							<img src="<?php echo $image[0]; ?>">
						</figure>
					</a>
					<?php endif; ?>
						<header class="section_header post-thumb-header">
							<h2><?php the_title(); ?></h2>
						</header>
							<? if ( $sample_sale_when ) : ?>
							<p><strong>When:</strong> <?= $sample_sale_when; ?></p>
							<? endif; ?>
							<? if ( $sample_sale_address ) : ?>
							<p><strong>Address:</strong> <?= $sample_sale_name; ?>, <?= $sample_sale_address; ?>, <a href="<?= $sample_sale_map; ?>">(map)</a></p>
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
					<figure class="brand-map">
						<a href="<?= $sample_sale_map; ?>"><img src="http://maps.googleapis.com/maps/api/staticmap?size=300x200&amp;maptype=roadmap\
&amp;markers=size:mid%7Ccolor:red%7C<?= $sample_sale_address; ?>&amp;sensor=false&amp;scale=2"></a>
					</figure>
				</li>
			<?php endwhile; ?>
			</ul>
		</section>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Shops</h4>
			</header>
			<ul class="posts cf equalHeights">
				<?php query_posts($query_string.'&posts_per_page=1&post_type=shop'); ?>
				<?php while ( have_posts() ) : the_post();
					$imageID = get_post_thumbnail_id($post->ID);
					$image = wp_get_attachment_image_src($imageID, 'index-thumb');
					$shop_name = get_post_meta($post->ID, 'shop_name', true);
					$shop_address = get_post_meta($post->ID, 'shop_address', true);
					$shop_map = get_post_meta($post->ID, 'shop_map', true);
					$shop_phone = get_post_meta($post->ID, 'shop_phone', true);
					$shop_transport = get_post_meta($post->ID, 'shop_transport', true);
					$shop_opening_times = get_post_meta($post->ID, 'shop_opening_times', true); ?>
				<li class="post-thumb cf">
					<?php if ( $image ) : ?>
					<a href="<?php the_permalink(); ?>">
						<figure class="post-image">
							<img src="<?php echo $image[0]; ?>">
						</figure>
					</a>
					<?php endif; ?>
						<header class="section_header post-thumb-header">
							<h2><?php the_title(); ?></h2>
						</header>
							<p><strong>Address:</strong> <?= $shop_name; ?>, <?= $shop_address; ?> <a href="<?= $shop_map; ?>">(map)</a></p>
							<? if ( $shop_phone ) : ?>
							<p><strong>Telephone:</strong> <?= $shop_phone; ?></p>
							<? endif; ?>
							<? if ( $shop_transport ) : ?>
							<p><strong>Transport:</strong> <?= $shop_transport; ?></p>
							<? endif; ?>
							<? if ( $shop_opening_times ) : ?>
							<p><strong>Opening Times:</strong> <?= $shop_opening_times; ?></p>
							<? endif; ?>
					<figure class="brand-map">
						<a href="<?= $sample_sale_map; ?>"><img src="http://maps.googleapis.com/maps/api/staticmap?size=300x200&amp;maptype=roadmap\
&amp;markers=size:mid%7Ccolor:red%7C<?= $shop_address; ?>&amp;sensor=false&amp;scale=2"></a>
					</figure>
				</li>
			<?php endwhile; ?>
			</ul>
		</section>
		<section class="partition brand_news wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Latest News</h4>
			</header>
			<ul class="posts cf equalHeights">
				<?php query_posts($query_string.'&posts_per_page=3&post_type=post'); ?>
				<?php while ( have_posts() ) : the_post();
					$imageID = get_post_thumbnail_id($post->ID);
					$image = wp_get_attachment_image_src($imageID, 'index-thumb'); ?>
				<li class="post-thumb cf">
				<a href="<?php the_permalink(); ?>">€
					<?php if ( $image ) : ?>
						<figure class="post-image">
							<img src="<?php echo $image[0]; ?>">
						</figure>
					<?php endif; ?>
						<header class="section_header post-thumb-header">
							<h4><?php the_title(); ?></h4>
						</header>
					</a>
				</li>
			<?php endwhile; ?>
			</ul>
		</section>
	</section>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>