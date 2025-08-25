<?php
/**
 * Template part cuando no hay contenido
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nada por aquí todavía', 'unavidamejor'); ?></h1>
    </header>

    <div class="page-content">
        <p><?php esc_html_e('Quizás una búsqueda ayude:', 'unavidamejor'); ?></p>
        <?php get_search_form(); ?>
    </div>
</section>

