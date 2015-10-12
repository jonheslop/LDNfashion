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
				$image = wp_get_attachment_image_src($imageID, 'index-thumb');
				$streetstyle = wp_get_attachment_image_src($imageID, 'streetstyle-portrait'); ?>
			<li class="post-thumb wrapper cf">
			<a href="<?php the_permalink(); ?>">
				<?php if ( $image ) : ?>
					<figure class="post-image">
						<? if ( is_category(array(9717,11707) ) : ?>
						<img src="<?php echo $streetstyle[0]; ?>">
						<? else : ?>
						<img src="<?php echo $image[0]; ?>">
						<? endif; ?>
					</figure>
				<?php endif; ?>
					<header class="section_header post-thumb-header">
						<h4><?php the_title(); ?></h4>
					</header>
				</a>
			</li>
		<?php endwhile; ?>
		</ul>

		<nav id="postNav" class="cf">
			<? if (get_next_posts_link()) : ?>
			<div class="prev-post wrapper">
				<?php next_posts_link('&laquo; Older Entries'); ?></div>
			<? else : ?>
			<div class="prev-post wrapper">&nbsp;</div>
			<? endif; ?>
			<? if (get_previous_posts_link()) : ?>
			<div class="next-post wrapper">
				<?php previous_posts_link('Newer Entries »', 0); ?>
			</div>
			<? endif; ?>
		</nav>

	</section>
	<?php endif; ?>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>
	<? wp_reset_query(); ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>