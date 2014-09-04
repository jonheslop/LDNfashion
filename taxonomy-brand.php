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
	    <div class="wrapper partition page_headline">
	      <header class="post-header">
	        <h2><? single_cat_title(); ?></h2>
	      </header>
	    </div>
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
					$shop_website = get_post_meta($post->ID, 'shop_website', true);
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
							<? if ( $shop_website ) : ?>
							<p><strong>Website:</strong> <?= $shop_website; ?></p>
							<? endif; ?>
					<figure class="brand-map">
						<a href="<?= $sample_sale_map; ?>"><img src="http://maps.googleapis.com/maps/api/staticmap?size=300x200&amp;maptype=roadmap\
&amp;markers=size:mid%7Ccolor:red%7C<?= $shop_address; ?>&amp;sensor=false&amp;scale=2"></a>
					</figure>
				</li>
			<?php endwhile; ?>
			</ul>
		</section>
		<section class="partition brand_news cf">
			<div class="header_wrap wrapper">
				<header class="section_header sidebar_header">
					<h4>Latest Voucher Codes</h4>
				</header>
			</div>
			<ul class="list-voucher-codes wrapper cf">
				<?php query_posts($query_string.'&posts_per_page=-1&post_type=voucher-code'); ?>
				<?php while ( have_posts() ) : the_post();
					$imageID = get_post_thumbnail_id($post->ID);
					$image = wp_get_attachment_image_src($imageID, 'index-thumb');
					$voucher_code_end_date = get_post_meta($post->ID, 'voucher_code_end_date', true);
					$voucher_code_start_date = get_post_meta($post->ID, 'voucher_code_start_date', true);
					$voucher_code_terms = get_post_meta($post->ID, 'voucher_code_terms', true);
					$voucher_code_url = get_post_meta($post->ID, 'voucher_code_url', true); ?>
				<? if ( time() > strtotime($voucher_code_start_date) && time() < strtotime($voucher_code_end_date) ) : ?>
				<li class="list-voucher-code cf">
					<? if ( $image ) : ?>
					<figure class="wrapper">
						<img src="<?= $image[0]; ?>">
					</figure>
					<? endif; ?>
					<header class="wrapper">
						<h3><? the_content(); ?></h3>
						<p class="meta">Starts: <?= date('jS F', strtotime($voucher_code_start_date)); ?> | Expires: <?= date('jS F', strtotime($voucher_code_end_date)); ?></p>
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
				<? endif; ?>
			<?php endwhile; ?>
			</ul>
		</section>
		<section class="partition brand_news cf">
		<div class="header_wrap wrapper">
			<header class="section_header sidebar_header">
				<h4>Latest News</h4>
			</header>
		</div>
			<ul class="posts cf equalHeights">
				<?php query_posts($query_string.'&posts_per_page=3&post_type=post'); ?>
				<?php while ( have_posts() ) : the_post();
					$imageID = get_post_thumbnail_id($post->ID);
					$image = wp_get_attachment_image_src($imageID, 'index-thumb'); ?>
				<li class="post-thumb wrapper cf">
				<a href="<?php the_permalink(); ?>">
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