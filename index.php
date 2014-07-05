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
		  'tag' => 'slider'
		);
		$featured = new WP_Query($featuredargs); 
		if ( $featured->have_posts() ): ?>
		<section class="featured cf">
			<ul class="slides">
			<?php while ( $featured->have_posts() ) : $featured->the_post();
				$imageID = get_post_thumbnail_id($post->ID);
				$image = wp_get_attachment_image_src($imageID, 'gallery-crop'); ?>
				<li class="slide wrapper">
					<a href="<?php the_permalink(); ?>">
						<figure>
							<img src="<?php echo $image[0]; ?>">
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
	<?php if ( have_posts() ) :
	$count = 0; ?>
	<?php query_posts($query_string.'&tag=-3072&cat=-9717'); ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Latest News</h4>
			</header>
		</section>
		<ul class="posts cf equalHeights">
			<?php while ( have_posts() ) : the_post();
				$count++;
				$imageID = get_post_thumbnail_id($post->ID);
				$image = wp_get_attachment_image_src($imageID, 'index-thumb'); 
			if ( $count == 6 ) : ?>
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
			<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Index Ad High')); ?>
			<? else : ?>
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
		<?php endif; ?>
		<?php endwhile; ?>
		</ul>
	<?php $streetstyleargs = array(
		  'posts_per_page' => 12,
		  'paged' => $paged,
		  'cat' => 9717
		);
		$streetstyle = new WP_Query($streetstyleargs); 
		if ( $streetstyle->have_posts() ): ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Street Style</h4>
			</header>
		</section>
		<ul class="streetstyle-thumbs">
		<?php while ( $streetstyle->have_posts() ) : $streetstyle->the_post();
			$imageID = get_post_thumbnail_id($post->ID);
			$image = wp_get_attachment_image_src($imageID, 'streetstyle-thumb'); ?>
			<li class="wrapper">
				<a href="<?php the_permalink(); ?>">
					<figure>
						<img src="<?php echo $image[0]; ?>">
					</figure>
				</a>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php endif; ?>
	<?php if ( have_posts() ) : ?>
	<?php query_posts($query_string.'&cat=4960'); ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Shopping News</h4>
			</header>
		</section>
		<ul class="posts cf equalHeights">
			<?php while ( have_posts() ) : the_post();
				$imageID = get_post_thumbnail_id($post->ID);
				$image = wp_get_attachment_image_src($imageID, 'index-thumb');?>
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
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Index Ad Low')); ?>
	</section>
	<?php endif; ?>
	<?php endif; ?>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>