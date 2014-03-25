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
			$voucher_codes = get_post_meta($post->ID, 'repeatable_fields', true); ?>
		<article class="post cf">
		<?php if ( $image ) : ?>
			<figure class="post-image wrapper">
				<img src="<?php echo $image[0]; ?>">
			</figure>
		<?php endif; ?>
			<div class="post-words wrapper">
				<header class="section_header post-header">
					<h2><?php the_title(); ?></h2>
					<p class="meta"><?php the_category(',','single'); ?> | <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> | <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?></p>
				</header>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
			</div>
			<? if ($voucher_codes) : ?>
			<ul class="list-voucher-codes wrapper cf">
				<header class="section_header sidebar_header">
					<h4><? the_title(); ?> voucher codes</h4>
				</header>
				<? foreach($voucher_codes as $voucher_code) : ?>
				<li class="list-voucher-code cf">
					<? if ( $voucher_code['image_url'] ) : ?>
					<figure class="wrapper">
						<img src="<?= $voucher_code['image_url']; ?>">
					</figure>
					<? elseif ($image) : ?>
					<figure class="wrapper">
						<img src="<?= $image; ?>">
					</figure>
					<? endif; ?>
					<header class="wrapper">
						<h3><?= $voucher_code['description']; ?></h3>
						<p class="meta">Expires: <?= $voucher_code['expires']; ?></p>
					</header>
					<div class="wrapper">
						<a target="_blank" class="voucher-code-button" data-voucher-code="<?= $voucher_code['code']; ?>" href="<?= $voucher_code['url']; ?>">Reveal code &amp; open site</a>
					</div>
					</a>
				</li>
				<? endforeach; ?>
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