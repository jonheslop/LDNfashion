<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
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
	<?php $featuredargs = array(
		  'posts_per_page' => 6,
		//  'paged' => $paged,
		  'tag' => 'slider',
		);
		$featured = new WP_Query($featuredargs); 
		if ( $featured->have_posts() ): ?>
		<section class="featured cf">
			<ul class="slides">
			<?php while ( $featured->have_posts() ) : $featured->the_post();
				$imageID = get_post_thumbnail_id($post->ID);
				$imageLarge = wp_get_attachment_image_src($imageID, 'gallery-crop-large');
				$imageMedium = wp_get_attachment_image_src($imageID, 'gallery-crop-medium'); ?>
				<li class="slide wrapper">
					<a href="<?php the_permalink(); ?>">
						<figure>
							<? if ( $imageLarge[2] == 1024 ) : ?>
							<img src="<?php echo $imageLarge[0]; ?>">
							<? else : ?>
							<img src="<?php echo $imageMedium[0]; ?>">
							<? endif; ?>
							<figcaption>
								<h3><?php the_title(); ?></h3>
							</figcaption>
						</figure>
					</a>
				</li>
			<?php endwhile; ?>
			</ul>
		</section>
		<?php endif; ?>
	<? if ( is_active_sidebar( 'category_grid' ) ) : ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Categories</h4>
			</header>
			<ul class="posts cf equalHeights">
				<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Homepage Categories')); ?>
			</ul>
		</section>
	<?php endif; ?>
	<?php if ( have_posts() ) : ?>
	<?php // CHANGE cat=XXX IN LINE BELOW TO CHANGE THE CATEGORY
	query_posts($query_string.'&cat=10890&posts_per_page=12'); ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>News</h4>
			</header>
			<ul class="posts cf equalHeights">
				<?php while ( have_posts() ) : the_post();
					$imageID = get_post_thumbnail_id($post->ID);
					$image = wp_get_attachment_image_src($imageID, 'index-thumb');?>
				<li class="post-thumb wrapper cf">
				<a href="<?php the_permalink(); ?>">
					<?php if ( $image ) : ?>
						<figure class="post-image">
							<img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php echo $image[0]; ?>">
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
	<?php endif; ?>
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Index Ad High')); ?>
	<?php if ( have_posts() ) :
	$count = 0; ?>
	<?php $featuresargs = array(
		  'posts_per_page' => 12,
		  'paged' => $paged,
		  // CHANGE LINE BELOW TO CHANGE THE CATEGORY
		  'cat' => 11151
		);
		$features = new WP_Query($featuresargs); 
		if ( $features->have_posts() ): ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Features</h4>
			</header>
			<ul class="posts cf equalHeights">
			<?php while ( $features->have_posts() ) : $features->the_post();
					$imageID = get_post_thumbnail_id($post->ID);
					$image = wp_get_attachment_image_src($imageID, 'index-thumb');?>
				<li class="post-thumb wrapper cf">
				<a href="<?php the_permalink(); ?>">
					<?php if ( $image ) : ?>
						<figure class="post-image">
							<img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php echo $image[0]; ?>">
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
	<?php endif; ?>
	<?php endif; ?>
<!-- 	<?php if ( have_posts() ) :
	$count = 0; ?>
	<?php $streetstyleargs = array(
		  'posts_per_page' => 18,
		  'paged' => $paged,
		  // CHANGE LINE BELOW TO CHANGE THE CATEGORY
		  'cat' => 9717
		);
		$streetstyle = new WP_Query($streetstyleargs); 
		if ( $streetstyle->have_posts() ): ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Street Style</h4>
			</header>
			<ul class="streetstyle-thumbs">
			<?php while ( $streetstyle->have_posts() ) : $streetstyle->the_post();
				$imageID = get_post_thumbnail_id($post->ID);
				$image = wp_get_attachment_image_src($imageID, 'streetstyle-portrait'); ?>
				<li class="wrapper">
					<a href="<?php the_permalink(); ?>">
						<figure>
							<img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php echo $image[0]; ?>">
						</figure>
					</a>
				</li>
			<?php endwhile; ?>
				</ul>
		</section>
	<?php endif; ?> -->
	<?php if ( have_posts() ) : ?>
	<?php query_posts($query_string.'&cat=11154&posts_per_page=12'); ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>London Guides</h4>
			</header>
			<ul class="posts cf equalHeights">
				<?php while ( have_posts() ) : the_post();
					$imageID = get_post_thumbnail_id($post->ID);
					$image = wp_get_attachment_image_src($imageID, 'index-thumb');?>
				<li class="post-thumb wrapper cf">
				<a href="<?php the_permalink(); ?>">
					<?php if ( $image ) : ?>
						<figure class="post-image">
							<img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php echo $image[0]; ?>">
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
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Index Ad Low')); ?>
		<?php endif; ?>
	<?php endif; ?>
	<? wp_reset_query(); ?>
	<?php $sampleSaleArgs = array(
		  'post_type' => 'sample-sale',
		  'posts_per_page' => -1,
		);
		$sampleSales = new WP_Query($sampleSaleArgs);
		// Starkers_Utilities::print_a($sampleSales);
		if ( $sampleSales->have_posts() ): ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Sample Sales</h4>
			</header>
			<ul class="posts cf equalHeights">
			<?php while ( $sampleSales->have_posts() ) : $sampleSales->the_post();
					$imageID = get_post_thumbnail_id($post->ID);
					$image = wp_get_attachment_image_src($imageID, 'index-thumb');
					$sample_sale_expiry = strtotime(get_post_meta($post->ID, 'sample_sale_expiry', true)); ?>
				<? if ( $sample_sale_expiry > time() ) : ?>
				<li class="post-thumb wrapper cf">
				<a href="<?php the_permalink(); ?>">
					<?php if ( $image ) : ?>
						<figure class="post-image">
							<img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php echo $image[0]; ?>">
						</figure>
					<?php endif; ?>
						<header class="section_header post-thumb-header">
							<h4><?php the_title(); ?></h4>
						</header>
					</a>
				</li>
				<?php endif; ?>
			<?php endwhile; ?>
			</ul>
		</section>
	<?php endif; ?>
	<?php $interviewArgs = array(
		  'posts_per_page' => 12,
		  'paged' => $paged,
		  'cat' => 11586
		);
		$interviews = new WP_Query($interviewArgs); 
		if ( $interviews->have_posts() ): ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Interviews</h4>
			</header>
			<ul class="posts cf equalHeights">
			<?php while ( $interviews->have_posts() ) : $interviews->the_post();
					$imageID = get_post_thumbnail_id($post->ID);
					$image = wp_get_attachment_image_src($imageID, 'index-thumb'); ?>
				<li class="post-thumb wrapper cf">
				<a href="<?php the_permalink(); ?>">
					<?php if ( $image ) : ?>
						<figure class="post-image">
							<img class="b-lazy" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php echo $image[0]; ?>">
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
	<?php endif; ?>
	</section>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>