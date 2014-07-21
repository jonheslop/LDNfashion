	<?php if ( have_posts() ) :
	$count = 0; ?>
	<?php query_posts($query_string.'&cat=-9717'); ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>Categories</h4>
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