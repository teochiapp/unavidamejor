<?php
/**
 * Sidebar del sitio
 */
?>
<?php if (is_active_sidebar('sidebar-1')) : ?>
    <aside id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </aside>
<?php endif; ?>

