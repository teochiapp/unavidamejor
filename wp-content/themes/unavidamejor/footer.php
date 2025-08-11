<?php
/**
 * Pie del sitio
 */
?>
    </div><!-- #content -->

    <footer class="site-footer">
        <nav class="footer-navigation" aria-label="<?php esc_attr_e('Menú pie', 'unavidamejor'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'menu_class'     => 'menu',
                'container'      => false,
                'fallback_cb'    => false,
            ]);
            ?>
        </nav>
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>

