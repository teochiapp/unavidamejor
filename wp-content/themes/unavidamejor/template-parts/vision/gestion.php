<section class="gestion-content-section">
  <div class="container">
    <?php if( have_rows('gestion_repetidor') ): ?>
      <?php $index = 0; ?>
      <?php while( have_rows('gestion_repetidor') ): the_row(); 
        $texto = get_sub_field('texto_repetidor_gestion');
        $imagen = get_sub_field('imagen_repetidor_gestion'); 
        $imagen_url = $imagen['url'] ?? '';
        $imagen_alt = $imagen['alt'] ?? '';
        $reverse_class = ($index % 2 !== 0) ? ' reverse' : '';
      ?>
        <div class="gestion-row<?php echo $reverse_class; ?>">
          <div class="gestion-image">
            <img src="<?php echo esc_url($imagen_url); ?>" alt="<?php echo esc_attr($imagen_alt ?: 'Imagen gestión'); ?>">
          </div>
          <div class="gestion-text<?php echo ($reverse_class) ? ' end-text-align' : ''; ?>">
            <p><?php echo esc_html($texto); ?></p>
          </div>
        </div>
      <?php $index++; endwhile; ?>
    <?php endif; ?>
  </div>
</section>
