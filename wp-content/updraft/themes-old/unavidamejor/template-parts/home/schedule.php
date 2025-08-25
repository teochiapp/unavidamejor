<?php
$get = function_exists('get_field') ? 'get_field' : null;

// Campos de texto
$title  = $get ? (string) $get('schedule_title')  : '';
$header = $get ? (string) $get('schedule_header') : '';
$hours  = $get ? (string) $get('schedule_hours')  : '';

// Campo link (array en ACF)
$button = $get ? $get('schedule_button') : '';

// Campos imagen (arrays en ACF)
$left_image  = $get ? $get('schedule_left_image')  : '';
$right_image = $get ? $get('schedule_right_image') : '';
?>

<section class="schedule-container position-relative">
  
  <?php if (!empty($left_image['url'])) : ?>
    <img class="schedule-left-img" 
         src="<?php echo esc_url($left_image['url']); ?>" 
         alt="<?php echo esc_attr($left_image['alt'] ?? ''); ?>">
  <?php endif; ?>

  <?php if (!empty($right_image['url'])) : ?>
    <img class="schedule-right-img" 
         src="<?php echo esc_url($right_image['url']); ?>" 
         alt="<?php echo esc_attr($right_image['alt'] ?? ''); ?>">
  <?php endif; ?>

  <div class="container py-4 py-md-5">
    <div class="row align-items-center justify-content-between g-4">
      <div class="col-lg-6">
        <?php if (!empty($title)) : ?>
          <h2 class="schedule-title mb-0"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
      </div>

      <div class="col-lg-5">
        <div class="schedule-box">
          <?php if (!empty($header)) : ?>
            <h3 class="schedule-subtitle h5 mb-2"><?php echo esc_html($header); ?></h3>
          <?php endif; ?>

          <?php if (!empty($hours)) : ?>
            <?php
              $hours_clean = function_exists('unavidamejor_clean_wysiwyg')
                ? unavidamejor_clean_wysiwyg($hours)
                : wp_kses_post($hours);
            ?>
            <div class="schedule-hours mb-2"><?php echo $hours_clean; ?></div>
          <?php endif; ?>

          <?php if (!empty($button) && isset($button['url'])) : ?>
            <a class="main-button"
               href="<?php echo esc_url($button['url']); ?>"
               target="<?php echo !empty($button['target']) ? esc_attr($button['target']) : '_self'; ?>">
               <?php echo esc_html($button['title']); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
