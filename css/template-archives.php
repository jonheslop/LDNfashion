<?php
/**
 * Template Name: Archives Template
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
				<h2>Archives</h2>
			</header>
			<div class="brand-description">Search the LDNfashion.com archives by month, subject or look at posts from the last 30 days.</div>
		</div>

		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>LDNfashion Categories</h4>
			</header>
			<ul class="archive-categories-list">
			<? $catArgs = array(
					'title_li' => '',
				);
			wp_list_categories( $catArgs ); ?> 
			</ul>
		</section>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>LDNfashion Categories</h4>
			</header>
			<ul class="archive-categories-list">
			<? $archiveArgs = array(
					'limit' => '12',
				);
			wp_get_archives( $archiveArgs ); ?> 
			</ul>
		</section>
		<?php $archiveArgs = array(
			'posts_per_page' => -30,
			'date_query' => array(
				array(
					'before'    => array(
						'year'  => date( 'Y' ),
						'month' => date( 'n' ),
						'day'   => date( 'j' ),
					),
					'inclusive' => true,
				),
			),
		);
		$archives = new WP_Query($archiveArgs); 
		if ( $archives->have_posts() ): ?>
		<section class="partition wrapper cf">
			<header class="section_header sidebar_header">
				<h4>LDNfashion posts from the 30 days</h4>
			</header>
			<ul class="posts cf equalHeights">
			<?php while ( $archives->have_posts() ) : $archives->the_post();
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
	</section>

	<?php get_template_part( 'parts/_sidebar' ); ?>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>