<?php
/**
 * Encolado de estilos y scripts
 */

function unavidamejor_enqueue_assets(): void {
    // Base absoluta (ngrok) para servir assets del tema temporalmente
    $base_home_url = defined('WP_HOME') ? WP_HOME : home_url();
    $base_home_url = rtrim($base_home_url, '/');
    $theme_slug     = basename(get_template_directory());
    $theme_base_url = $base_home_url . '/wp-content/themes/' . $theme_slug;

    // Bootstrap 5 via CDN
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3'
    );
    // Font Awesome CSS
wp_enqueue_style(
    'fontawesome-css',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
    [],
    '6.4.0'
);
    // Google Fonts: Domine + Lato (completas)
    wp_enqueue_style(
        'unavidamejor-fonts',   
        'https://fonts.googleapis.com/css2?family=Domine:wght@400;500;600;700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap',
        [],
        null
    );
    
    // Fuentes específicas para la página "En que creemos"
    if (is_page('en-que-creemos')) {
        wp_enqueue_style(
            'unavidamejor-beliefs-fonts',
            'https://fonts.googleapis.com/css2?family=Slabo+27px&family=Story+Script:wght@400&family=DM+Serif+Text:ital@0;1&display=swap',
            [],
            null
        );
    }
    // AOS CSS
    wp_enqueue_style(
        'aos-css',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css',
        [],
        '2.3.4'
    );
    // CSS principal del tema (style.css) forzado a dominio público (ngrok)
    wp_enqueue_style(
        'unavidamejor-style',
        $theme_base_url . '/style.css',
        ['bootstrap-css', 'unavidamejor-fonts'],
        UNAVIDAMEJOR_VERSION
    );

    // CSS adicional organizado en assets/
    wp_enqueue_style(
        'unavidamejor-main',
        $theme_base_url . '/assets/css/main.css',
        ['bootstrap-css', 'unavidamejor-style'],
        UNAVIDAMEJOR_VERSION
    );

    // CSS responsive (carga después de main.css)
    wp_enqueue_style(
        'unavidamejor-responsive',
        $theme_base_url . '/assets/css/responsive.css',
        ['bootstrap-css', 'unavidamejor-style', 'unavidamejor-main'],
        UNAVIDAMEJOR_VERSION
    );
    
    // Bootstrap JS (bundle con Popper)
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.3',
        true
    );

    // AOS JS
    wp_enqueue_script(
        'aos-js',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js',
        [],
        '2.3.4',
        true
    );

    // JS del tema
    wp_enqueue_script(
        'unavidamejor-main',
        $theme_base_url . '/assets/js/main.js',
        ['bootstrap-js', 'aos-js'],
        UNAVIDAMEJOR_VERSION,
        true
    );

    // JS del modal de eventos
    wp_enqueue_script(
        'unavidamejor-event-modal',
        $theme_base_url . '/assets/js/event-modal.js',
        ['bootstrap-js', 'unavidamejor-main'],
        UNAVIDAMEJOR_VERSION,
        true
    );
    
    // Localizar script con variables AJAX
    wp_localize_script('unavidamejor-event-modal', 'unavidamejor_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('unavidamejor_nonce')
    ));

    // Hilo de comentarios en singular
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    // Assets específicos para la página "En que creemos"
    if (is_page('en-que-creemos')) {
        wp_enqueue_style(
            'unavidamejor-beliefs-page',
            $theme_base_url . '/assets/css/beliefs-page.css',
            ['bootstrap-css', 'unavidamejor-style'],
            UNAVIDAMEJOR_VERSION
        );
        
        wp_enqueue_script(
            'unavidamejor-beliefs-page',
            $theme_base_url . '/assets/js/beliefs-page.js',
            ['bootstrap-js'],
            UNAVIDAMEJOR_VERSION,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'unavidamejor_enqueue_assets');

