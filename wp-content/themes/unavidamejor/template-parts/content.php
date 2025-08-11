<?php
/**
 * Template part para contenido genérico de entradas
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if (is_singular()) : ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php else : ?>
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h2>
        <?php endif; ?>
    </header>

    <div class="entry-content">
        <?php if (is_singular()) : ?>
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
        <?php else : ?>
            <?php the_excerpt(); ?>
        <?php endif; ?>
    </div>

    <footer class="entry-footer">
        <?php edit_post_link(__('Editar', 'unavidamejor'), '<span class="edit-link">', '</span>'); ?>
    </footer>
</article>

