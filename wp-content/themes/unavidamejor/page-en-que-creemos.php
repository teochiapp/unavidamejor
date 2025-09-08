<?php
/**
 * Template para la página "En que creemos"
 * Libro interactivo con páginas que se pueden voltear
 */

get_header(); ?>
<main class="beliefs-page">
  <!-- Hero Section -->
  <section class="beliefs-hero" <?php if(get_field('fondo_cabecera')): ?>style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo esc_url(get_field('fondo_cabecera')); ?>'); background-size: cover; background-position: center; background-attachment: fixed;"<?php endif; ?>>
    <div class="container">
      <div class="hero-content">
        <h1 class="hero-title heading-font"><?php the_field('cabecera_title'); ?></h1>
      </div>
    </div>
  </section>

<div class="libro">
<?php get_template_part('template-parts/en-que-creemos/libro'); ?>
</div>

<div class="visor">
<?php get_template_part('template-parts/en-que-creemos/visor'); ?>
</div>
</main>

<?php get_footer(); ?>

<style>
  .site-header {
    position: absolute !important;
  }
</style>
