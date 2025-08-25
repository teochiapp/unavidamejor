<div class="live-container py-5">
  <div class="container">
    <div class="row text-lg-start p-4">
      
      <!-- Título -->
      <div class="col-12 mb-4">
        <h3 class="live-title heading-font text-center"><?php the_field("live_title"); ?></h3>
      </div>

      <!-- Video -->
      <div class="col-lg-7">
        <div class="ratio ratio-16x9 rounded overflow-hidden">
          <iframe class="live-yt" src="<?php the_field("live_embed"); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>  
          </div>
      </div>

      <!-- Texto y botón -->
      <div class="col-text-live col-lg-5 mt-4 mt-lg-0 align-self-center">
        <h2 class="live-subtitle h3 heading-font mt-3"><?php the_field("live_subtitle"); ?></h2>
        <p class="live-description mt-3">
          <?php the_field("live_description"); ?>
        </p>
        <?php 
        $link = get_field('live_button'); 
        if( $link ): ?>
            <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ?: '_self'); ?>" class="btn main-button mt-3">
              <?php echo esc_html($link['title']); ?> <i class="fab fa-youtube ms-2"></i>
            </a>
        <?php endif; ?>


      </div>

    </div>
  </div>
</div>
