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
			$voucher_code_end_date = get_post_meta($post->ID, 'voucher_code_end_date', true);
			$voucher_code_start_date = get_post_meta($post->ID, 'voucher_code_start_date', true);
			$voucher_code_terms = get_post_meta($post->ID, 'voucher_code_terms', true);
			$voucher_code_url = get_post_meta($post->ID, 'voucher_code_url', true);
			$brand = wp_get_post_terms($post->ID, 'brand');
			$voucher_type = wp_get_post_terms($post->ID,'voucher-type'); ?>
			<?php // Starkers_Utilities::print_a($brand) ?>
		<article class="post cf">
			<div class="post-words wrapper">
				<header class="section_header post-header">
					<h2><?php echo $brand[0]->name; ?> voucher codes</h2>
				</header>
			</div>
			<? if ( time() > strtotime($voucher_code_start_date) && time() < strtotime($voucher_code_end_date) ) : ?>
			<ul class="list-voucher-codes wrapper cf">
				<li class="list-voucher-code cf">
					<figure class="wrapper">
					<? $brand_image_object = apply_filters( 'taxonomy-images-get-terms', '', array(
							'taxonomy' => 'brand',
							'term_args' => array(
								'slug' => $brand[0]->slug,
							)
					) );
					$brand_image_id = $brand_image_object[0]->image_id;
					$brand_image = wp_get_attachment_image_src($brand_image_object[0]->image_id);
					// Starkers_Utilities::print_a($brand_image_url[0]->image_id); ?>
					<? if ( $image ) : ?>
						<img src="<?= $image[0]; ?>">
					<? elseif ( $brand_image ) : ?>
						<img src="<?= $brand_image[0]; ?>">
					<? endif; ?>
						<? if ($voucher_type) : ?>
							<figcaption class="voucher-type-<?= $voucher_type[0]->slug; ?>"><?= $voucher_type[0]->name; ?></figcaption>
						<? endif; ?>
					</figure>
					<header class="wrapper">
						<h3><? the_content(); ?></h3>
						<p class="meta">Expires: <?= date('jS F', strtotime($voucher_code_end_date)); ?></p>
					</header>
					<div class="wrapper">
						<a target="_blank" class="voucher-code-button" data-voucher-code="<? the_title(); ?>" href="<?= $voucher_code_url; ?>">Reveal code &amp; open site</a>
					</div>
					<? if ( $voucher_code_terms != '' ) : ?>
					<footer class="wrapper">
						<p><small><strong>Terms:</strong> <?= $voucher_code_terms; ?></small></p>
					</footer>
					<? endif; ?>
				</li>
			</ul>
			<? endif; ?>
			<?php include(locate_template('parts/_sharing.php')); ?>
		</article>
		<?php include(locate_template('parts/_post-prev-next.php')); ?>
	</section>
	<?php endwhile; ?>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>