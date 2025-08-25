<?php
/**
 * Funciones del tema Unavida Mejor
 */

// Define versión del tema para cache busting
if (!defined('UNAVIDAMEJOR_VERSION')) {
    $theme = function_exists('wp_get_theme') ? wp_get_theme() : null;
    define('UNAVIDAMEJOR_VERSION', $theme ? $theme->get('Version') : '0.1.0');
}

// Carga archivos organizados en la carpeta inc/
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/template-tags.php';
