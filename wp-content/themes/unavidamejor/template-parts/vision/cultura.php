<section class="vision-hero py-5">
  <div class="container cultura-container">
    <div class="grid-left">
      <?php if( have_rows('repetidor_cultura') ): ?>
        <?php $counter = 1; ?>
        <?php while( have_rows('repetidor_cultura') ): the_row(); 
          $imagen = get_sub_field('imagen_repetidor_cultura');
          $descripcion = get_sub_field('descripcion_repetidor_cultura');

          // Alternar fondo amarillo para cada segundo item
          $yellow_class = ($counter % 2 == 0) ? 'yellow-color' : '';
          // Alternar flex direction para pares (imagen y texto al revés)
          $reverse_class = ($counter % 2 == 0) ? 'reverse' : '';
        ?>
          <div class="grid-item <?php echo esc_attr($yellow_class . ' ' . $reverse_class); ?>">
            <div class="badge"><?php echo $counter; ?></div>
            <div class="item-content">
              <?php if($imagen): ?>
                <img src="<?php echo esc_url($imagen); ?>">
              <?php endif; ?>
              <p><?php echo esc_html($descripcion); ?></p>
            </div>
          </div>
        <?php $counter++; endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<style>
</style>
