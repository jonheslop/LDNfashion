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

<?php $args = array(
  'hide_empty' => false,
  'parent' => 0
  );
  $letter=' ';
  $brands = get_terms( 'brand', $args ); ?>
<section role="main" class="container">
  <section id="content" class="cf">
    <div class="wrapper partition page_headline">
      <header class="section_header post-header">
        <h2>Find voucher codes by brand</h2>
      </header>
        <p class="letter-list">Jump to:
          <?php foreach ($brands as $brand) :
          $name = $brand->name;
          $initial = strtoupper(substr($name, 0,1));
          if($initial!=$letter) : ?>
            <a href="#<?= $initial; ?>"><?= $initial; ?></a>
          <? $letter=$initial; 
          endif;
          endforeach; ?>
        </p>
    </div>
    <ul class="cf wrapper brands-alpha">
      <?php foreach ($brands as $brand) :
        $name = $brand->name;
        $initial = strtoupper(substr($name, 0,1));
        $saved_data = get_tax_meta($brand->term_id,'ba_exclude_from_voucher_codes');
        if ( $saved_data != 'on' ) : ?> 
        <? if($initial!=$letter) {
          echo '<li id="' . $initial . '">';
          echo '<header class="section_header"><h3>' . $initial . '</h3></header>';
          $letter=$initial;
        } ?>
          <p><a href="/vouchercodes/<?= $brand->slug; ?>"><?= $brand->name; ?></a></p>
        <? if($initial!=$letter) {
        echo '</li>';
      }
      endif;
      endforeach; ?>
  </section>
  <?php get_template_part( 'parts/_sidebar' ); ?>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>