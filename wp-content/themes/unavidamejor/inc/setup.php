<?php
/**
 * Configuración y soportes del tema
 */

function unavidamejor_setup(): void {
    load_theme_textdomain('unavidamejor', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ]);

    add_theme_support('custom-logo', [
        'height'      => 64,
        'width'       => 64,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    add_theme_support('align-wide');

    register_nav_menus([
        'primary' => __('Menú principal', 'unavidamejor'),
        'footer'  => __('Menú pie', 'unavidamejor'),
    ]);
}
add_action('after_setup_theme', 'unavidamejor_setup');

function unavidamejor_set_content_width(): void {
    $GLOBALS['content_width'] = apply_filters('unavidamejor_content_width', 800);
}
add_action('after_setup_theme', 'unavidamejor_set_content_width', 0);

// Opciones ACF: página de opciones (si ACF Pro está activo)
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => __('Opciones del Home', 'unavidamejor'),
        'menu_title' => __('Home', 'unavidamejor'),
        'menu_slug'  => 'unavidamejor-home-options',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'position'   => 61,
        'icon_url'   => 'dashicons-welcome-view-site',
    ]);
}

