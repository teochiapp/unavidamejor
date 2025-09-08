<section class="vida-section">
    <div class="container">
        <div class="row g-4">
            <div class="section-intro text-center py-3 mb-4 header-vida">
                <p class="mb-0"><?php the_field("titulo_vida"); ?></p>
            </div>

            <?php if( have_rows('repetidor_vida') ): ?>
                <?php 
                    // Contador para asignar clases de color según la letra
                    $counter = 0; 
                    $colors = ['v' => 'vision-card-v', 'i' => 'vision-card-i', 'd' => 'vision-card-d', 'a' => 'vision-card-a'];
                ?>
                <?php while( have_rows('repetidor_vida') ): the_row(); 
                    $letra = get_sub_field('letra_vida_repetidor');
                    $descripcion = get_sub_field('descripcion_vida_repetidor');

                    // Elegir clase según letra, por defecto una genérica
                    $class = isset($colors[strtolower($letra)]) ? $colors[strtolower($letra)] : 'vision-card-default';
                ?>
                    <div class="col-cultura col-12 col-md-6 col-lg-3">
                        <div class="vision-card <?php echo esc_attr($class); ?>">
                            <div class="vision-card-header">
                                <span class="vision-letter"><?php echo esc_html($letra); ?></span>
                            </div>
                            <div class="vision-card-body">
                                <h3 class="vision-card-title"><?php echo esc_html($descripcion); ?></h3>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
