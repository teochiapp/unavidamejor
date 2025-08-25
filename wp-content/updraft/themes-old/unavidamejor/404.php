<?php
/**
 * Plantilla para páginas no encontradas (404)
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Página no encontrada', 'unavidamejor'); ?></h1>
        </header>

        <div class="page-content">
            <p><?php esc_html_e('No encontramos lo que buscabas. Prueba con el buscador:', 'unavidamejor'); ?></p>
            <?php get_search_form(); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>

