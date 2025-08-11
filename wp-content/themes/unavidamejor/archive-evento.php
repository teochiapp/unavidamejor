<?php
/**
 * Archivo del CPT Evento
 */

get_header();
?>

<main id="primary" class="site-main">
  <section class="eventos-archivo py-5 position-relative">
    <div class="container">
      <div class="text-center mb-5">
        <h1 class="section-title heading-font fw-bold d-inline-block pb-2"><?php post_type_archive_title(); ?></h1>
      </div>

      <div class="row g-4 justify-content-center">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <div class="col-12 col-sm-6 col-lg-4">
              <?php get_template_part('template-parts/event/card'); ?>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <p class="text-center"><?php esc_html_e('No hay eventos disponibles en este momento.', 'unavidamejor'); ?></p>
        <?php endif; ?>
      </div>

      <div class="mt-5">
        <?php the_posts_pagination(); ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>


