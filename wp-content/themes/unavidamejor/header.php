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
        <li><a href="#about" class="nav-link" data-scroll>QUIENES SOMOS</a></li>
        <li><a href="#events" class="nav-link" data-scroll>EVENTOS</a></li>
        <li><a href="#live" class="nav-link" data-scroll>EN VIVO</a></li>
        <li><a href="#contact" class="nav-link" data-scroll>CONTACTO</a></li>
      </ul>
    </nav>

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
    <div class="mobile-contact">
      <button class="main-button" ><a href="#contact"  data-scroll >CONTACTANOS!</a></button>
    </div>
  </aside>
</header>


<div id="content" class="site-content">


