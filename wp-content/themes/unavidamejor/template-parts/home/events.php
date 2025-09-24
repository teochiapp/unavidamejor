<section class="eventos-destacados container py-5 position-relative">
  <div class="container">

    <!-- Imagen decorativa izquierda -->
    <img 
      class="events-background-left position-absolute" 
      src="<?php echo esc_url( get_field('events_left_image') ); ?>" 
      alt="Decoración izquierda">

    <!-- Título -->
    <div class="text-center mb-5">
      <h2 class="section-title heading-font fw-bold d-inline-block pb-2">
        Nuestros Eventos
      </h2>
    </div>

    <!-- Imagen decorativa derecha -->
    <img 
      class="events-background-right position-absolute" 
      src="<?php echo esc_url( get_field('events_right_image') ); ?>" 
      alt="Decoración derecha">

    <!-- Fila de eventos -->
    <div class="row g-4 justify-content-center">
      <?php
      $args = array(
        'post_type'      => 'evento', // Slug del CPT
        'posts_per_page' => -1,        // Número máximo de eventos a mostrar
        'orderby'        => 'date',
        'order'          => 'DESC',
      );
      $eventos = new WP_Query( $args );

      if ( $eventos->have_posts() ) :
        while ( $eventos->have_posts() ) : $eventos->the_post();
          $descripcion = get_field('descripcion');
          $imagen = get_field('imagen'); // URL string
          $fecha = get_field('fecha');
          $icono = get_field('icono'); // URL string
          $ubicacion = get_field('ubicacion'); // Campo de ubicación
      ?>
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="evento-card h-100 shadow-sm">
              <div class="evento-img-container rounded-top overflow-hidden">
                <?php if ( has_post_thumbnail() ) : ?>
                  <img 
                    class="evento-img w-100 evento-clickable" 
                    src="<?php the_post_thumbnail_url('medium'); ?>" 
                    alt="<?php the_title_attribute(); ?>"
                    data-event-id="<?php echo get_the_ID(); ?>">
                <?php elseif ( $imagen ) : ?>
                  <img class="evento-img w-100 evento-clickable" 
                       src="<?php echo esc_url($imagen); ?>" 
                       alt="<?php the_title_attribute(); ?>"
                       data-event-id="<?php echo get_the_ID(); ?>">
                <?php else : ?>
                  <img class="evento-img w-100 evento-clickable" 
                       src="" 
                       alt="Sin imagen"
                       data-event-id="<?php echo get_the_ID(); ?>">
                <?php endif; ?>
              </div>

              <div class="evento-content bg-white rounded-bottom">
                <div class="text-content">
                    <h3 class="evento-title heading-font h6 mb-1 fw-bold evento-clickable" 
                        data-event-id="<?php echo get_the_ID(); ?>"><?php the_title(); ?></h3>
                <?php if ( $fecha ) : ?>
                  <p class="evento-fecha heading-font mb-2 small"><?php echo esc_html( $fecha ); ?></p>
                <?php endif; ?>
                <?php if ( $descripcion ) : ?>
                  <div class="evento-desc mb-0 small"><?php echo wp_trim_words( $descripcion, 15 ); ?></div>
                <?php else : ?>
                  <div class="evento-desc mb-0 small"><?php echo wp_trim_words( get_the_content(), 15 ); ?></div>
                <?php endif; ?>
                </div>

                   <?php if ( $icono ) : ?>
                  <img class="evento-icono w-100" src="<?php echo esc_url($icono); ?>" alt="<?php the_title_attribute(); ?>">
                <?php endif; ?>

              </div>
            </div>
          </div>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo '<p class="text-center">No hay eventos disponibles en este momento.</p>';
      endif;
      ?>
    </div>

    <!-- Más eventos -->
   <?php 
    $link_mas_eventos = get_field('link_mas_eventos'); 
    if( $link_mas_eventos ): ?>
      <div class="text-center mt-5">
        <div class="mas-eventos d-inline-flex align-items-center gap-3 fs-5 text-danger fw-bold">
          <img class="icon-mas-eventos-left" src="<?php echo esc_url( get_field('left_arrow') ); ?>" alt="Flecha izquierda">
          <a href="<?php echo esc_url($link_mas_eventos['url']); ?>" 
            target="<?php echo esc_attr($link_mas_eventos['target'] ? $link_mas_eventos['target'] : '_self'); ?>" 
            class="mas-eventos-link heading-font fw-bold">
            <?php echo esc_html($link_mas_eventos['title'] ? $link_mas_eventos['title'] : 'Más eventos'); ?>
          </a>
          <img class="icon-mas-eventos-right" src="<?php echo esc_url( get_field('right_arrow') ); ?>" alt="Flecha derecha">
        </div>
      </div>
    <?php endif; ?>

  </div>

</section>

<style>
.evento-clickable {
  cursor: pointer;
  transition: all 0.3s ease;
}

.evento-clickable:hover {
  transform: scale(1.02);
  opacity: 0.9;
}

/* Padding específico solo para la fila de eventos principal */
.eventos-destacados .row:not(.modal .row) {
  padding: 0;
}

/* Asegurar que el modal mantenga su padding interno */
#eventoModal .row {
  padding: inherit;
}
</style>
