<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
	<?php if ( have_posts() ) : ?>
	<section id="content" class="cf">
		<ul class="posts">
			<?php while ( have_posts() ) : the_post();
				$imageID = get_post_thumbnail_id($post->ID);
				$image = wp_get_attachment_image_src($imageID, 'large'); ?>
			<li class="post cf">
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
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>">Read on &raquo;</a>
					</div>
				</div>
			</li>
		<?php endwhile; ?>
		</ul>
	</section>
	<?php endif; ?>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>