<?php
/**
 * Registro de sidebars/widgets
 */

function unavidamejor_widgets_init(): void {
    register_sidebar([
        'name'          => __('Sidebar', 'unavidamejor'),
        'id'            => 'sidebar-1',
        'description'   => __('Agrega widgets aquí.', 'unavidamejor'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);
}
add_action('widgets_init', 'unavidamejor_widgets_init');

