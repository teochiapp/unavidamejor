<section class="mision-content-section">
    <div class="container-fluid">
        <div class="mision-path-container">
            <!-- SVG Línea de tiempo vertical -->
            <svg class="mision-timeline-svg" viewBox="0 0 400 800" preserveAspectRatio="xMidYMid meet">
                <line x1="200" y1="50" x2="200" y2="750" stroke="#800020" stroke-width="4" opacity="0.8" class="mision-timeline-line"/>
                <circle class="mision-timeline-arrow" cx="200" cy="50" r="8" fill="#FFD700">
                    <animate attributeName="cy" values="50;750;50" dur="8s" repeatCount="indefinite"/>
                </circle>
            </svg>

            <?php 
            // Debug: Verificar si ACF está activo
            if (!function_exists('have_rows')) {
                echo '<div class="alert alert-warning">ACF no está activo. Los campos personalizados no están disponibles.</div>';
            }
            
            // Verificar si tenemos datos en el campo mision_repetidor
            if (have_rows('mision_repetidor')): 
                $delay = 200; 
                $i = 1; 
            ?>
                <?php while (have_rows('mision_repetidor')): the_row();
                    $titulo = get_sub_field('titulo_repetidor_mision');
                    $descripcion = get_sub_field('descripcion_repetidor_mision');
                    $icono = get_sub_field('icono_repetidor_mision');
                    $icono_url = $icono ? esc_url($icono['url']) : 'https://via.placeholder.com/80';
                ?>
                    <div class="mision-item mision-item-<?php echo $i; ?>" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="mision-icon-container">
                            <img src="<?php echo $icono_url; ?>" class="mision-icon" alt="<?php echo esc_attr($titulo); ?>">
                        </div>
                        <div class="mision-text-container">
                            <h3 class="mision-item-title"><?php echo esc_html($titulo); ?></h3>
                            <p class="mision-item-description"><?php echo esc_html($descripcion); ?></p>
                        </div>
                    </div>
                    <?php $delay += 200; $i++; ?>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Fallback: Contenido por defecto cuando no hay datos ACF -->
                <div class="mision-item mision-item-1" data-aos="fade-up" data-aos-delay="200">
                    <div class="mision-icon-container">
                        <img src="https://via.placeholder.com/80" class="mision-icon" alt="Misión 1">
                    </div>
                    <div class="mision-text-container">
                        <h3 class="mision-item-title">Nuestra Misión</h3>
                        <p class="mision-item-description">Transformar vidas a través de la educación y el desarrollo personal.</p>
                    </div>
                </div>
                
                <div class="mision-item mision-item-2" data-aos="fade-up" data-aos-delay="400">
                    <div class="mision-icon-container">
                        <img src="https://via.placeholder.com/80" class="mision-icon" alt="Misión 2">
                    </div>
                    <div class="mision-text-container">
                        <h3 class="mision-item-title">Valores Fundamentales</h3>
                        <p class="mision-item-description">Integridad, excelencia y compromiso con el crecimiento personal.</p>
                    </div>
                </div>
                
                <div class="mision-item mision-item-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="mision-icon-container">
                        <img src="https://via.placeholder.com/80" class="mision-icon" alt="Misión 3">
                    </div>
                    <div class="mision-text-container">
                        <h3 class="mision-item-title">Impacto Social</h3>
                        <p class="mision-item-description">Crear un impacto positivo en la comunidad y en las generaciones futuras.</p>
                    </div>
                </div>
                
                <div class="mision-item mision-item-4" data-aos="fade-up" data-aos-delay="800">
                    <div class="mision-icon-container">
                        <img src="https://via.placeholder.com/80" class="mision-icon" alt="Misión 4">
                    </div>
                    <div class="mision-text-container">
                        <h3 class="mision-item-title">Innovación Continua</h3>
                        <p class="mision-item-description">Mantenernos a la vanguardia en metodologías y tecnologías educativas.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
// Fallback para AOS - si AOS no funciona, mostrar elementos después de 1 segundo
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        const misionItems = document.querySelectorAll('.mision-item');
        misionItems.forEach(function(item) {
            if (!item.classList.contains('aos-animate')) {
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }
        });
    }, 1000);
});
</script>
