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

// Función AJAX para obtener datos del evento
function get_evento_data_ajax() {
    // Verificar nonce
    if (!wp_verify_nonce($_POST['nonce'], 'unavidamejor_nonce')) {
        wp_die('Error de seguridad');
    }
    
    $evento_id = intval($_POST['evento_id']);
    
    if (!$evento_id) {
        wp_send_json_error('ID de evento inválido');
        return;
    }
    
    // Obtener el post del evento
    $evento = get_post($evento_id);
    
    if (!$evento || $evento->post_type !== 'evento') {
        wp_send_json_error('Evento no encontrado');
        return;
    }
    
    // Obtener campos ACF
    $descripcion = get_field('descripcion', $evento_id);
    $imagen = get_field('imagen', $evento_id);
    $fecha = get_field('fecha', $evento_id);
    $icono = get_field('icono', $evento_id);
    $ubicacion = get_field('ubicacion', $evento_id);
    
    // Preparar datos de respuesta
    $evento_data = array(
        'id' => $evento_id,
        'title' => esc_html($evento->post_title),
        'fecha' => esc_html($fecha),
        'desc' => $descripcion ? wp_kses_post($descripcion) : wp_kses_post($evento->post_content),
        'imagen' => $imagen ? esc_url($imagen) : get_the_post_thumbnail_url($evento_id, 'large'),
        'icono' => esc_url($icono),
        'ubicacion' => esc_html($ubicacion)
    );
    
    wp_send_json_success($evento_data);
}

// Hook para AJAX
add_action('wp_ajax_get_evento_data', 'get_evento_data_ajax');
add_action('wp_ajax_nopriv_get_evento_data', 'get_evento_data_ajax');
