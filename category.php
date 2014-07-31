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
	<?php if ( have_posts() ) : ?>
	<section id="content" class="cf">
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
	</section>
	<?php endif; ?>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>