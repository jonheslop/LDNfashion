<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package   WordPress
 * @subpackage  Starkers
 * @since     Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section role="main" class="container">
  <section id="content" class="cf">
    <div class="wrapper partition page_headline">
      <header class="section_header post-header">
        <h2>Browse by brand</h2>
      </header>
    </div>
    <ul class="cf wrapper brands-alpha">
    <?php $args = array(
        'hide_empty' => false,
        'parent' => 0
    );
      $letter=' ';
      $brands = get_terms( 'brand', $args ); ?>
      <?php foreach ($brands as $brand) :
        $name = $brand->name;
        $initial = strtoupper(substr($name, 0,1)); ?>
        <li>
        <? if($initial!=$letter) {
          echo '<header class="section_header"><h3>' . $initial . '</h3></header>';
          $letter=$initial;
        } ?>
          <p><a href="/brands/<?= $brand->slug; ?>"><?= $brand->name; ?></a></p>
        </li>
      <? endforeach; ?>
  </section>
  <?php get_template_part( 'parts/_sidebar' ); ?>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>