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
      ☰
    </button>

    <nav class="main-nav">
      <ul>
        <li>QUIENES SOMOS</li>
        <li>EVENTOS</li>
        <li>EN VIVO</li>
        <li>CONTACTO</li>
      </ul>
    </nav>

    <div class="header-button">
      <button class="main-button">CONTACTANOS!</button>
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
        <li>QUIENES SOMOS</li>
        <li>EVENTOS</li>
        <li>EN VIVO</li>
        <li>CONTACTO</li>
      </ul>
    </nav>
    <div class="mobile-contact">
      <button class="main-button">CONTACTANOS!</button>
    </div>
  </aside>
</header>


<div id="content" class="site-content">


