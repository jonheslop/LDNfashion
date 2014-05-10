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
			$video = get_post_meta($post->ID, 'video_embed', true); ?>
		<article class="post cf">
		<? if ( is_numeric($video) ) : ?>
			<figure class="post-image video wrapper">
				<iframe id="vimeo" src="http://player.vimeo.com/video/<?= $video;?>?api=1&amp;title=0&amp;byline=0&amp;portrait=0&amp;color=DBE3E6" width="600" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			</figure>
		<? elseif ($video) : ?>
			<figure class="post-image video wrapper">
				<iframe width="560" height="315" src="//www.youtube.com/embed/<?= $video;?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>
			</figure>
		<?php elseif ( $image ) : ?>
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