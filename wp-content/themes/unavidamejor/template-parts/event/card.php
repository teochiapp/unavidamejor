<?php
/**
 * Tarjeta de Evento (reutilizable)
 * Requiere CPT slug: evento
 * Campos ACF opcionales: imagen (URL), fecha (string), descripcion (text), event_address (string)
 */

$descripcion = function_exists('get_field') ? get_field('descripcion') : '';
$imagen      = function_exists('get_field') ? get_field('imagen') : '';
$fecha       = function_exists('get_field') ? get_field('fecha') : '';
$direccion   = function_exists('get_field') ? get_field('event_address') : '';

?>
<div class="evento-card h-100 shadow-sm rounded">
  <div class="evento-img-container rounded-top overflow-hidden">
    <?php if (has_post_thumbnail()) : ?>
      <img class="evento-img w-100" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>">
    <?php elseif (!empty($imagen)) : ?>
      <img class="evento-img w-100" src="<?php echo esc_url($imagen); ?>" alt="<?php the_title_attribute(); ?>">
    <?php else : ?>
      <div class="evento-img placeholder"></div>
    <?php endif; ?>
  </div>

  <div class="evento-content p-0 bg-white rounded-bottom">
    <div class="evento-content-inner p-3">
      <h3 class="evento-title h6 mb-1 fw-bold"><?php the_title(); ?></h3>
      <?php if (!empty($fecha)) : ?>
        <p class="evento-fecha mb-1 small text-muted"><?php echo esc_html($fecha); ?></p>
      <?php endif; ?>
      <?php if (!empty($direccion)) : ?>
        <p class="evento-direccion mb-2 small">📍 <?php echo esc_html($direccion); ?></p>
      <?php endif; ?>
      <p class="evento-desc mb-0 small">
        <?php
        if (!empty($descripcion)) {
          echo esc_html(wp_trim_words($descripcion, 15));
        } else {
          echo esc_html(wp_trim_words(get_the_content(), 15));
        }
        ?>
      </p>
    </div>
    <div class="evento-brand p-2 d-flex align-items-center justify-content-end">
      <?php if (function_exists('has_custom_logo') && has_custom_logo()) : ?>
        <?php $custom_logo_id = get_theme_mod('custom_logo'); $logo = wp_get_attachment_image_src($custom_logo_id, 'thumbnail'); ?>
        <?php if (!empty($logo[0])) : ?>
          <img class="evento-brand-logo" src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
        <?php endif; ?>
      <?php else : ?>
        <span class="small text-muted"><?php bloginfo('name'); ?></span>
      <?php endif; ?>
    </div>
  </div>
</div>


