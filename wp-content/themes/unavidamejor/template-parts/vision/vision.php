<section class="vision-text-section">
    <div class="vision-content">
        <div class="container">
            <div class="row align-items-center container-vision">
                <!-- Columna de imagen -->
                <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                    <div class="vision-container position-relative">
                        <!-- Imagen que sostiene el cartel - arriba de la imagen principal -->
                        <?php if ($img1 = get_field('1era_imagen_deco_vision')): ?>
                            <div class="cartel-holder">
                                <img src="<?php echo esc_url($img1['url']); ?>" alt="<?php echo esc_attr($img1['alt']); ?>" />
                            </div>
                        <?php endif; ?>

                        <?php if ($img2 = get_field('2da_imagen_deco_vision')): ?>
                            <div class="cartel-holder-dos">
                                <img src="<?php echo esc_url($img2['url']); ?>" alt="<?php echo esc_attr($img2['alt']); ?>" />
                            </div>
                        <?php endif; ?>

                        <div class="vision-wrapper position-relative overflow-hidden">
                            <?php if ($img_principal = get_field('imagen_principal_vision')): ?>
                                <img class="vision-img-player w-100 h-100" src="<?php echo esc_url($img_principal['url']); ?>" alt="<?php echo esc_attr($img_principal['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Columna de texto -->
                <div class="col-12 col-lg-6 position-relative">
                    <?php if ($deco_desc = get_field('decoracion_descripcion_vision')): ?>
                        <img src="<?php echo esc_url($deco_desc['url']); ?>" alt="<?php echo esc_attr($deco_desc['alt']); ?>" class="vision-text-bg-img position-absolute" />
                    <?php endif; ?>

                    <div class="vision-text-content position-relative">
                        <?php if ($descripcion = get_field('descripcion_vision')): ?>
                            <?php echo wp_kses_post($descripcion); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
