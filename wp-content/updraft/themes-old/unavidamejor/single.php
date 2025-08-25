<?php
/**
 * Plantilla de entradas individuales
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content', get_post_type()); ?>

        <nav class="post-navigation" role="navigation">
            <div class="nav-links">
                <div class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></div>
                <div class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></div>
            </div>
        </nav>

        <?php
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>

