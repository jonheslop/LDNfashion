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
<?php
	$posts = query_posts($query_string . '&orderby=title&order=asc&posts_per_page=-1');
	$letter=' '; ?>
<section role="main" class="container">
	<section id="content" class="cf">
    <div class="wrapper partition page_headline">
      <header class="section_header post-header">
        <h2>Find sample sales by brand</h2>
      </header>
        <p class="letter-list">Jump to:
		<?php
		if ( have_posts() ) while ( have_posts() ) : the_post();
		  $brand = wp_get_post_terms($post->ID,'brand');
      if ( ! empty($brand) ) :
		  $brandname = $brand[0]->name;
          $initial = strtoupper(substr($brandname, 0,1));
          if($initial!=$letter) : ?>
            <a href="#<?= $initial; ?>"><?= $initial; ?></a>
          <? $letter=$initial; 
      endif;
      endif;
		endwhile; ?>
        </p>
    </div>
    <ul class="cf wrapper brands-alpha">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post();
		$brand = wp_get_post_terms($post->ID,'brand');
    if ( ! empty($brand) ) :
		// Starkers_Utilities::print_a($brand);
        $brandname = $brand[0]->name;
        $initial = strtoupper(substr($brandname, 0,1)); ?>
        <? if($initial!=$letter) {
          echo '<li id="' . $initial . '">';
          echo '<header class="section_header"><h3>' . $initial . '</h3></header>';
          $letter=$initial;
        } ?>
          <p><a href="<? the_permalink(); ?>"><?= $brandname; ?></a></p>
        <? if($initial!=$letter) {
        echo '</li>';
      } ?>
  <?php endif; ?>
	<?php endwhile; ?>
	</ul>
	</section>
	<?php get_template_part( 'parts/_sidebar' ); ?>
	
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>