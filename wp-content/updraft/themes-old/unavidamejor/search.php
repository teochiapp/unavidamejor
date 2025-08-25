<?php
/**
 * Plantilla de resultados de búsqueda
 */

get_header();
?>

<main id="primary" class="site-main">
    <header class="page-header">
        <h1 class="page-title">
            <?php printf(esc_html__('Resultados para: %s', 'unavidamejor'), '<span>' . get_search_query() . '</span>'); ?>
        </h1>
    </header>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', get_post_type()); ?>
        <?php endwhile; ?>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>

