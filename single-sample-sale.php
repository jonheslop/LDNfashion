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
			$sample_sale_name = get_post_meta($post->ID, 'sample_sale_name', true);
			$sample_sale_address = get_post_meta($post->ID, 'sample_sale_address', true);
			$sample_sale_map = get_post_meta($post->ID, 'sample_sale_map', true);
			$sample_sale_phone = get_post_meta($post->ID, 'sample_sale_phone', true);
			$sample_sale_transport = get_post_meta($post->ID, 'sample_sale_transport', true);
			$sample_sale_when = get_post_meta($post->ID, 'sample_sale_when', true);
			$sample_sale_description = get_post_meta($post->ID, 'sample_sale_description', true); ?>
		<article class="post cf">
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
			<? if ( $sample_sale_when ) : ?>
				<span class="partition wrapper">
					<header class="section_header sidebar_header">
						<h4>Sample Sale Details</h4>
					</header>
				</span>
				<div class="wrapper">
					<? if ( $sample_sale_description ) : ?>
					<h4 class="shop-details-title">What</h4>
					<p><?= $sample_sale_description; ?></p>
					<? endif; ?>
					<h4 class="shop-details-title">When</h4>
					<p><?= str_replace(',','<br/>', $sample_sale_when); ?></p>
					<? if ( $sample_sale_address ) : ?>
					<h4 class="shop-details-title">Where</h4>
					<p><?= $sample_sale_name; ?>,<br/><?= str_replace(',', ',<br/>', $sample_sale_address); ?>,<br/><a href="https://www.google.co.uk/maps?q=<?= $sample_sale_address; ?>">(map)</a></p>
					<? endif; ?>
					<? if ( $sample_sale_phone ) : ?>
					<h4 class="shop-details-title">Telephone</h4>
					<p><?= $sample_sale_phone; ?></p>
					<? endif; ?>
					<? if ( $sample_sale_transport ) : ?>
					<h4 class="shop-details-title">Transport</h4>
					<p><?= $sample_sale_transport; ?></p>
					<? endif; ?>
				</div>
				<div class="wrapper google_map">
					<figure>
						<a href="https://www.google.co.uk/maps?q=<?= $sample_sale_address; ?>"><img src="http://maps.googleapis.com/maps/api/staticmap?size=400x400&amp;maptype=roadmap\
&amp;markers=size:mid%7Ccolor:red%7C<?= $sample_sale_address; ?>&amp;sensor=false&amp;scale=2"></a>
					</figure>
				</div>
			<? else : ?>
				<p class="wrapper" style="font-size: 1.25em; font-style: italic;">Sorry, no sample sales right now&hellip;</p>
			<? endif; ?>
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