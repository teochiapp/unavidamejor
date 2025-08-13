<?php
/**
 * Cabecera del sitio
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="header-container container d-flex align-items-center justify-content-between">
    <div class="site-branding">
      <?php echo unavidamejor_logo_html(); ?>
    </div>

    <!-- Botón toggle solo visible en mobile -->
    <button class="menu-toggle" aria-label="Abrir menú">
      <i class="fas fa-bars" aria-hidden="true"></i>
    </button>

    <nav class="main-nav">
      <ul>
        <li><a href="#about" class="nav-link" data-scroll>QUIENES SOMOS</a></li>
        <li><a href="#events" class="nav-link" data-scroll>EVENTOS</a></li>
        <li><a href="#live" class="nav-link" data-scroll>EN VIVO</a></li>
        <li><a href="#contact" class="nav-link" data-scroll>CONTACTO</a></li>
      </ul>
    </nav>

    <?php
    // Traer ID del post 'footer' para usar sus campos sociales
    $header_footer_ref_id = 0;
    $header_footer_q = new WP_Query([
      'post_type'      => 'footer',
      'post_status'    => 'publish',
      'posts_per_page' => 1,
      'no_found_rows'  => true,
    ]);
    if ($header_footer_q->have_posts()) {
      $header_footer_q->the_post();
      $header_footer_ref_id = get_the_ID();
      wp_reset_postdata();
    }
    ?>
    <?php /* Íconos sociales removidos del header desktop por pedido del cliente */ ?>

    <div class="header-button">
      <button class="main-button" ><a href="#contact"  data-scroll >CONTACTANOS!</a></button>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <aside class="mobile-menu">
    <div class="mobile-menu-header">
      <?php echo unavidamejor_logo_html(); ?>
      <button class="close-menu" aria-label="Cerrar menú">✕</button>
    </div>
    <nav class="mobile-nav">
      <ul>
        <li><a href="#about" data-scroll>QUIENES SOMOS</a></li>
        <li><a href="#events" data-scroll>EVENTOS</a></li>
        <li><a href="#live" data-scroll>EN VIVO</a></li>
        <li><a href="#contact" data-scroll>CONTACTO</a></li>
      </ul>
    </nav>
    <?php if ($header_footer_ref_id && function_exists('get_field')): ?>
      <div class="mobile-social">
        <?php if ($wa = get_field('whatsapp', $header_footer_ref_id)):
          $wa_digits = preg_replace('/\D+/', '', (string) $wa);
          $wa_url = (strpos($wa, 'http') === 0) ? $wa : ('https://wa.me/' . $wa_digits);
        ?>
          <a class="mobile-social-link" href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <?php endif; ?>

        <?php if ($ig = get_field('instagram', $header_footer_ref_id)):
          $ig_url    = is_array($ig) ? ($ig['url'] ?? '') : (string) $ig;
          $ig_title  = is_array($ig) ? trim((string) ($ig['title'] ?? '')) : '';
          $ig_target = is_array($ig) ? trim((string) ($ig['target'] ?? '')) : '';
          if ($ig_url): ?>
            <a class="mobile-social-link" href="<?php echo esc_url($ig_url); ?>"<?php echo $ig_target ? ' target="' . esc_attr($ig_target) . '" rel="noopener"' : ''; ?> aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($yt = get_field('youtube', $header_footer_ref_id)):
          $yt_url    = is_array($yt) ? ($yt['url'] ?? '') : (string) $yt;
          $yt_title  = is_array($yt) ? trim((string) ($yt['title'] ?? '')) : '';
          $yt_target = is_array($yt) ? trim((string) ($yt['target'] ?? '')) : '';
          if ($yt_url): ?>
            <a class="mobile-social-link" href="<?php echo esc_url($yt_url); ?>"<?php echo $yt_target ? ' target="' . esc_attr($yt_target) . '" rel="noopener"' : ''; ?> aria-label="YouTube"><i class="fab fa-youtube"></i></a>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($fb = get_field('facebook', $header_footer_ref_id)):
          $fb_url    = is_array($fb) ? ($fb['url'] ?? '') : (string) $fb;
          $fb_title  = is_array($fb) ? trim((string) ($fb['title'] ?? '')) : '';
          $fb_target = is_array($fb) ? trim((string) ($fb['target'] ?? '')) : '';
          if ($fb_url): ?>
            <a class="mobile-social-link" href="<?php echo esc_url($fb_url); ?>"<?php echo $fb_target ? ' target="' . esc_attr($fb_target) . '" rel="noopener"' : ''; ?> aria-label="Facebook"><i class="fab fa-facebook"></i></a>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($mail = get_field('mail', $header_footer_ref_id)):
          $raw_mail    = is_array($mail) ? ($mail['url'] ?? '') : (string) $mail;
          $mail_target = is_array($mail) ? trim((string) ($mail['target'] ?? '')) : '';
          $is_plain_email = (bool) filter_var($raw_mail, FILTER_VALIDATE_EMAIL);
          $href = $is_plain_email ? ('mailto:' . antispambot($raw_mail)) : $raw_mail;
          if ($href): ?>
            <a class="mobile-social-link" href="<?php echo esc_url($href); ?>"<?php echo $mail_target && stripos($href, 'http') === 0 ? ' target="' . esc_attr($mail_target) . '" rel="noopener"' : ''; ?> aria-label="Email"><i class="fas fa-envelope"></i></a>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    
  </aside>
  <!-- Backdrop para el menú móvil -->
  <div class="menu-backdrop" aria-hidden="true"></div>
</header>


<div id="content" class="site-content">


