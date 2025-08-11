<?php
/**
 * Sección: Hero (home)
 */

// Obtener URL del video desde ACF: primero Options, si no existe usa la página de inicio
$video_url = null;
if (function_exists('get_field')) {
  $video_url = get_field('home_hero_video_url', 'option');
  if (empty($video_url)) {
    $front_id = (int) get_option('page_on_front');
    if (!$front_id) {
      $front_id = function_exists('get_queried_object_id') ? get_queried_object_id() : 0;
    }
    if ($front_id) {
      $video_url = get_field('home_hero_video_url', $front_id);
    }
  }
}
$video_id  = function_exists('unavidamejor_extract_youtube_id') ? unavidamejor_extract_youtube_id($video_url) : null;
$embed_url = function_exists('unavidamejor_youtube_embed_url') ? unavidamejor_youtube_embed_url($video_id) : null;
?>

<section class="hero-container position-relative overflow-hidden">
  <?php if ($embed_url): ?>
  <div class="hero-video position-absolute top-0 start-0 w-100 h-100">
    <iframe
      class="w-100 h-100"
      src="<?php echo esc_url($embed_url); ?>"
      title="YouTube video"
      frameborder="0"
      allow="autoplay; encrypted-media; picture-in-picture"
      allowfullscreen
      style="pointer-events:none"
    ></iframe>
  </div>
  <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100" style="background:rgba(0,0,0,.35);"></div>
  <?php endif; ?>

  <div class="container-fluid position-relative p-0 h-100" style="z-index:2;">
    <div class="row align-items-center justify-content-center gx-0 h-100">
      <div class="col-lg-8 col-xl-7 text-white flex-container">
        <h2 class="hero-title fw-bold mb-0"><?php echo esc_html(get_field('home_hero_title')); ?></h2>
      </div>
    </div>
  </div>
</section>


