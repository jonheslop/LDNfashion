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
			$video = get_post_meta($post->ID, 'video_embed', true);
			$gallery = get_post_meta($post->ID, 'gallery', true); ?>
		<article class="post cf">
		<? if ( $gallery ) : ?>
			<? 	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$galleryoffset = get_query_var('offset');
			if ( !$galleryoffset ) { $galleryoffset = 0; }
			$galleryImages = new WP_Query( array(
			    'post_parent' => get_the_ID(),
			    'post_status' => 'inherit',
			    'post_type' => 'attachment',
			    'post_mime_type' => 'image',
			    'order' => 'ASC',
			    'orderby' => 'menu_order ID',
			    'update_post_term_cache' => false,
			    'posts_per_page' => 1,
			    'offset' => $galleryoffset
			  ) ); ?>
			<? if ( count($galleryImages->posts) > 0 ) : ?>
			  <? foreach ($galleryImages->posts as $galleryImage) {
			  	$galleryCount = $galleryImages->max_num_pages;
			  	$galleryCount = $galleryCount -1;
			    $cellImage = wp_get_attachment_image_src( $galleryImage->ID, 'small' );
			    $image_title = $galleryImage->post_title;
			    $image_caption = $galleryImage->post_excerpt;
			    if ( $galleryoffset < $galleryCount ) {
			    	$gallerynext = $galleryoffset + 1;
			    } else {
			    	$gallerynext = 0;
			    }
			    if ( $galleryoffset > 0 ) {
				    $galleryprevious = $galleryoffset - 1;
				} else {
				    $galleryprevious = $galleryCount;
				} ?>
			    <figure id="gallery" class="post-image wrapper">
				    <div class="cf">
					    <a class="arrow prev" href="?offset=<?= $galleryprevious; ?>#gallery">&lang;</a>
					    <img src="<?= $cellImage[0]; ?>" />
					    <a class="arrow next" href="?offset=<?= $gallerynext; ?>#gallery">&rang;</a>
						<? if ($image_title || $image_caption ) : ?>
					    <figcaption class="cf">
					    	<h2><?= $image_title; ?></h2>
					    	<p><?= $image_caption; ?></p>
					    </figcaption>
						<? endif; ?>
				    </div>
			    </figure>
			<?php  }?>
			<? endif; ?>
		<? elseif ( is_numeric($video) ) : ?>
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
			<section class="wrapper author_meta">
				<header class="section_header sidebar_header">
					<h4>Posted by</h4>
				</header>
					<figure class="wrapper">
						<a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>"><?= get_avatar(get_the_author_meta('ID')); ?></a>
					</figure>
					<h3><? the_author_posts_link(); ?></h3>
					<p><?= the_author_meta('user_description'); ?></p>
			</section>
			<section class="post-comments wrapper">
				<?php comments_template( '', true ); ?>
			</section>
		</article>
		<?php include(locate_template('parts/_post-prev-next.php')); ?>
		<?php // include(locate_template('parts/_related-posts.php')); ?>
	</section>
	<?php endwhile; ?>
	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>