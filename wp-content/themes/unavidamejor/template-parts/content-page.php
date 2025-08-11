<?php
/**
 * Template part para páginas
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    </div>

    <footer class="entry-footer">
        <?php edit_post_link(__('Editar', 'unavidamejor'), '<span class="edit-link">', '</span>'); ?>
    </footer>
</article>

