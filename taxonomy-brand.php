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
	        <div class="brand-description"><?= category_description(); ?></div>
	    </div>
		<?php query_posts($query_string.'&posts_per_page=10&post_type=sample-sale'); ?>
		<?php if ( have_posts() ) : ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Latest <a href="/samplesales/<?= get_query_var('brand'); ?>"><? single_cat_title(); ?> Sample Sales</a></h4>
			</header>
			<ul class="posts brand-lists cf">
				<?php while ( have_posts() ) : the_post();
					$imageID = get_post_thumbnail_id($post->ID);
					$image = wp_get_attachment_image_src($imageID, 'index-thumb');
					$sample_sale_name = get_post_meta($post->ID, 'sample_sale_name', true);
					$sample_sale_address = get_post_meta($post->ID, 'sample_sale_address', true);
					$sample_sale_when = get_post_meta($post->ID, 'sample_sale_when', true);
					$sample_sale_description = get_post_meta($post->ID, 'sample_sale_description', true); ?>
				<li>
					<p><?= $sample_sale_name; ?> <em><?= $sample_sale_when; ?></em><br/><?= $sample_sale_address; ?><br/>
					<small><a href="<?php the_permalink(); ?>">Learn more&nbsp;&raquo;</a></small></p>
				</li>
			<?php endwhile; ?>
			</ul>
		</section>
		<?php endif; ?>
		<?php query_posts($query_string.'&posts_per_page=-1&post_type=voucher-code'); ?>
		<?php if ( have_posts() ) : ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Latest <a href="/vouchercodes/<?= get_query_var('brand'); ?>">Latest <? single_cat_title(); ?> Voucher Codes</a></h4>
			</header>
			<ul class="posts brand-lists cf">
				<?php while ( have_posts() ) : the_post();
					$imageID = get_post_thumbnail_id($post->ID);
					$image = wp_get_attachment_image_src($imageID, 'index-thumb');
					$voucher_code_end_date = get_post_meta($post->ID, 'voucher_code_end_date', true);
					$voucher_code_start_date = get_post_meta($post->ID, 'voucher_code_start_date', true);
					$voucher_code_terms = get_post_meta($post->ID, 'voucher_code_terms', true);
					$voucher_code_url = get_post_meta($post->ID, 'voucher_code_url', true); ?>
				<li>
					<? the_content(); ?>
					<small><a href="<?php the_permalink(); ?>">View code&nbsp;&raquo;</a></small>
				</li>
			<?php endwhile; ?>
			</ul>
		</section>
		<?php endif; ?>
		<?php query_posts($query_string.'&posts_per_page=1&post_type=shop'); ?>
		<?php if ( have_posts() ) : ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4><a href="/shop/<?= get_query_var('brand'); ?>">Shop <? single_cat_title(); ?></a></h4>
			</header>
			<ul class="posts brand-lists cf">
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
				<li>
					<p><?= $shop_name; ?><br/><?= $shop_address; ?><br/>
					<small><a href="<?php the_permalink(); ?>">Learn more&nbsp;&raquo;</a></small></p>
				</li>
			<?php endwhile; ?>
			</ul>
		</section>
		<?php endif; ?>
<!-- 		<section class="partition brand_news cf">
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
		</section> -->
	</section>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>