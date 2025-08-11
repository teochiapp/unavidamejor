<?php
/**
 * Template tags y helpers de salida
 */

function unavidamejor_logo_html(): string {
    if (function_exists('the_custom_logo') && has_custom_logo()) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        if ($logo && !empty($logo[0])) {
            $home_url = esc_url(home_url('/'));
            $site_name = esc_attr(get_bloginfo('name'));
            $logo_url = esc_url($logo[0]);
            return '<a class="site-logo d-inline-flex align-items-center" href="' . $home_url . '" aria-label="' . $site_name . '">' .
                   '<img src="' . $logo_url . '" alt="' . $site_name . '" class="img-fluid" />' .
                   '</a>';
        }
    }
    // Fallback al título del sitio
    return '<a class="site-title-link" href="' . esc_url(home_url('/')) . '">' . esc_html(get_bloginfo('name')) . '</a>';
}

/**
 * Extrae el ID de un video de YouTube desde URL normal o corta
 */
function unavidamejor_extract_youtube_id(?string $url): ?string {
    if (empty($url)) return null;
    // Soporte para: watch?v=, youtu.be, embed/, shorts/, live/
    $pattern = '#(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/|live\/)|youtu\.be\/)([A-Za-z0-9_-]{11})#i';
    if (preg_match($pattern, $url, $matches)) {
        return $matches[1];
    }
    // fallback para query param v
    $parts = wp_parse_url($url);
    if (!empty($parts['query'])) {
        parse_str($parts['query'], $query);
        if (!empty($query['v']) && preg_match('#^[A-Za-z0-9_-]{11}$#', $query['v'])) {
            return $query['v'];
        }
    }
    return null;
}

/**
 * Genera URL de embed con autoplay, mute y loop
 */
function unavidamejor_youtube_embed_url(?string $video_id): ?string {
    if (empty($video_id)) return null;
    $params = [
        'autoplay' => 1,
        'mute'     => 1,
        'controls' => 0,
        'fs'       => 0,
        'disablekb'=> 1,
        'playsinline' => 1,
        'loop'     => 1,
        'modestbranding' => 1,
        'rel'      => 0,
        'showinfo' => 0,
        'iv_load_policy' => 3,
        'enablejsapi' => 1,
        'playlist' => $video_id, // necesario para loop
    ];
    return 'https://www.youtube.com/embed/' . rawurlencode($video_id) . '?' . http_build_query($params, '', '&', PHP_QUERY_RFC3986);
}

/**
 * Limpia WYSIWYG: elimina <p> vacíos y convierte párrafos en <br> simples
 */
function unavidamejor_clean_wysiwyg(string $html): string {
    $clean = trim($html);
    if ($clean === '') {
        return '';
    }
    // Eliminar <p> vacíos o con solo espacios/nbsp
    $clean = preg_replace('#<p>(?:\s|&nbsp;)*</p>#i', '', $clean);
    if ($clean === null) {
        $clean = $html;
    }
    // Reemplazar cierre-apertura de p por <br>
    $clean = preg_replace('#</p>\s*<p>#i', '<br>', $clean);
    // Quitar <p> envolventes al inicio/fin
    $clean = preg_replace('#^\s*<p>|</p>\s*$#i', '', $clean);
    // Permitir solo br y formatos inline básicos
    $allowed = [
        'br' => [],
        'strong' => [], 'b' => [], 'em' => [], 'i' => [], 'u' => [], 'span' => ['class' => true, 'style' => true],
    ];
    return wp_kses($clean, $allowed);
}


