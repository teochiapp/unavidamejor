<?php 
// ACF File puede devolver array o string; normalizar a URL string
$home_hero_video_raw = function_exists('get_field') ? get_field('home_hero_video_url') : '';
$home_hero_video_url = is_array($home_hero_video_raw) ? ($home_hero_video_raw['url'] ?? '') : (string) $home_hero_video_raw;
?>

<section class="hero-container position-relative overflow-hidden">
  <div class="hero-video position-absolute top-0 start-0 w-100 h-100">
    <?php if (!empty($home_hero_video_url)) : ?>
      <video class="w-100 h-100" muted autoplay loop playsinline src="<?php echo esc_url($home_hero_video_url); ?>"></video>
    <?php endif; ?>
    <div class="capa"></div>
  </div>
  <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100" style="background:rgba(0,0,0,.35);"></div>

  <div class="container-fluid position-relative p-0 h-100" style="z-index:2;">
    <div class="row align-items-center justify-content-center gx-0 h-100">
      <div class="col-lg-8 col-xl-7 text-white flex-container">
        <h2 class="hero-title fw-bold mb-0">
          <?php echo esc_html(get_field('home_hero_title')); ?>
        </h2>
      </div>
    </div>
  </div>
</section>


