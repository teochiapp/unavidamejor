<?php
/**
 * Plantilla para páginas no encontradas (404)
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="error-404 not-found py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center">
                    <!-- Icono de error -->
                    <div class="error-icon mb-4">
                        <i class="fas fa-exclamation-triangle text-warning" style="font-size: 4rem;"></i>
                    </div>

                    <!-- Título principal -->
                    <header class="page-header mb-4">
                        <h1 class="page-title display-4 fw-bold mb-3">
                            <?php esc_html_e('¡Ups! Página no encontrada', 'unavidamejor'); ?>
                        </h1>
                        <h2 class="h4 fw-normal">
                            <?php esc_html_e('Error 404', 'unavidamejor'); ?>
                        </h2>
                    </header>

                    <!-- Mensaje descriptivo -->
                    <div class="page-content mb-5">
                        <p class="lead mb-4">
                            <?php esc_html_e('Lo sentimos, la página que buscas no existe o ha sido movida. Te ayudamos a encontrar lo que necesitas:', 'unavidamejor'); ?>
                        </p>

                        <!-- Botones de navegación -->
                        <div class="error-navigation mb-4">
                            <div class="row g-3 justify-content-center">
                                <div class="col-auto">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg">
                                        <i class="fas fa-home me-2"></i>
                                        <?php esc_html_e('Ir al Inicio', 'unavidamejor'); ?>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="<?php echo esc_url(home_url('/#about')); ?>" class="btn btn-outline-primary btn-lg">
                                        <i class="fas fa-users me-2"></i>
                                        <?php esc_html_e('Quienes Somos', 'unavidamejor'); ?>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="<?php echo esc_url(home_url('/#events')); ?>" class="btn btn-outline-primary btn-lg">
                                        <i class="fas fa-calendar me-2"></i>
                                        <?php esc_html_e('Eventos', 'unavidamejor'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Enlaces útiles -->
                        <div class="useful-links">
                            <h3 class="h5 mb-3"><?php esc_html_e('Enlaces útiles:', 'unavidamejor'); ?></h3>
                            <div class="row g-3 justify-content-center">
                                <div class="col-auto">
                                    <a href="<?php echo esc_url(home_url('/#live')); ?>" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-video me-1"></i>
                                        <?php esc_html_e('En Vivo', 'unavidamejor'); ?>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-envelope me-1"></i>
                                        <?php esc_html_e('Contacto', 'unavidamejor'); ?>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="<?php echo esc_url(home_url('/#events')); ?>" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        <?php esc_html_e('Próximos Eventos', 'unavidamejor'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mensaje de ayuda adicional -->
                    <div class="error-help">
                        <p class="small">
                            <?php esc_html_e('Si crees que esto es un error, por favor contacta con nuestro equipo de soporte.', 'unavidamejor'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.error-404 {
    min-height: 70vh;
    display: flex;
    align-items: center;
    background: var(--background-white);
    color: var(--background-black);
}

.error-icon {
    animation: bounce 2s infinite;
    color: var(--primary-color);
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

.error-navigation .btn {
    transition: all 0.3s ease;
}

.error-navigation .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.useful-links .btn {
    transition: all 0.3s ease;
}

.useful-links .btn:hover {
    transform: scale(1.05);
}

.error-search {
    background: rgba(128, 0, 32, 0.05);
    padding: 2rem;
    border-radius: 10px;
    border: 1px solid rgba(128, 0, 32, 0.1);
}

.page-title {
    color: var(--primary-color);
    font-family: var(--font-heading);
}

.page-header h2 {
    color: var(--background-black);
}

.page-content .lead {
    color: var(--background-black);
}

.error-help {
    color: var(--background-black);
}

/* Estilos para botones usando colores del tema */
.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: var(--background-white);
}

.btn-primary:hover {
    background-color: #4d0013;
    border-color: #4d0013;
    color: var(--background-white);
}

.btn-outline-primary {
    color: var(--primary-color);
    border-color: var(--primary-color);
    background-color: transparent;
}

.btn-outline-primary:hover {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: var(--background-white);
}

.btn-outline-secondary {
    color: var(--background-black);
    border-color: var(--background-black);
    background-color: transparent;
}

.btn-outline-secondary:hover {
    background-color: var(--background-black);
    border-color: var(--background-black);
    color: var(--background-white);
}

@media (max-width: 768px) {
    .error-navigation .row {
        flex-direction: column;
        align-items: center;
    }
    
    .error-navigation .col-auto {
        width: 100%;
        max-width: 300px;
    }
    
    .useful-links .row {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<?php get_footer(); ?>