    </div>
    <footer class="site-footer bg-dark text-light">
      <div class="container">
        <?php
        // Obtener post del CPT "footer" para campos sociales
        $footer_id = 0;
        $footer_q = new WP_Query([
          'post_type'      => 'footer',
          'post_status'    => 'publish',
          'posts_per_page' => 1,
          'no_found_rows'  => true,
        ]);
        if ($footer_q->have_posts()) {
          $footer_q->the_post();
          $footer_id = get_the_ID();
          wp_reset_postdata();
        }
        ?>
        <div class="row">
          <div class="footer-logo-col col-12 col-lg-3 d-flex flex-column gap-2">
            <div class="d-flex gap-2 logo-footer">
              <?php if (function_exists('the_custom_logo') && has_custom_logo()) { the_custom_logo(); } else { ?>
                <span class="h5 m-0"><?php bloginfo('name'); ?></span>
              <?php } ?>
            </div>
            <?php if ($footer_id && function_exists('get_field')): ?>
              <?php if ($desc = get_field('descripcion', $footer_id)): ?>
                <p class="mb-1 text-start heading-font"><?php echo esc_html($desc); ?></p>
              <?php endif; ?>
              <?php if ($ubic = get_field('ubicacion', $footer_id)): ?>
                <p class="mb-1 text-start heading-font"><?php echo esc_html($ubic); ?></p>
              <?php endif; ?>
            <?php endif; ?>
          </div>

          <!-- Col: Menu -->
           <div class="col-6 col-lg-3">
            <h6 class="footer-title text-uppercase fw-bold mb-3 heading-font">Menú</h6>
            <nav class="footer-nav">
              <ul class="list-unstyled d-grid gap-2">
                <li><a href="#about" class="link-light text-decoration-none" data-scroll>QUIENES SOMOS</a></li>
                <li><a href="#events" class="link-light text-decoration-none" data-scroll>EVENTOS</a></li>
                <li><a href="#live" class="link-light text-decoration-none" data-scroll>EN VIVO</a></li>
                <li><a href="#contact" class="link-light text-decoration-none" data-scroll>CONTACTO</a></li>
              </ul>
            </nav>
          </div>

          <!-- Col: Eventos (últimos del CPT) -->
          <div class="col-6 col-lg-3">
            <h6 class="footer-title text-uppercase fw-bold mb-3 heading-font">Eventos</h6>
            <ul class="nav text-uppercase flex-column gap-2 small">
              <?php
              // Traer eventos desde el CPT (soporta slugs: evento / eventos / event)
              $ev = new WP_Query([
                'post_type'      => ['evento', 'eventos', 'event'],
                'posts_per_page' => 6,
                'orderby'        => 'date',
                'order'          => 'DESC',
                'no_found_rows'  => true,
              ]);
              if ($ev->have_posts()):
                while ($ev->have_posts()): $ev->the_post(); ?>
                  <li><a class="link-light text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; wp_reset_postdata(); else: ?>
                  <li class="text-muted">Sin eventos</li>
              <?php endif; ?>
            </ul>
          </div>

          <!-- Col: Social -->
          <div class="col-12 col-lg-3">
            <h6 class="footer-title text-uppercase fw-bold mb-3 heading-font">Redes sociales</h6>
            <ul class="social-list list-unstyled small d-grid gap-2">
              <?php if ($footer_id && function_exists('get_field')): ?>
                <?php if ($wa = get_field('whatsapp', $footer_id)):
                  $wa_digits = preg_replace('/\D+/', '', (string) $wa);
                  $wa_url = (strpos($wa, 'http') === 0) ? $wa : ('https://wa.me/' . $wa_digits);
                ?>
                  <li>
                    <i class="fab fa-whatsapp me-2"></i>
                    <a class="link-light text-decoration-none" href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener"><?php echo esc_html($wa); ?></a>
                  </li>
                <?php endif; ?>

                <?php if ($ig = get_field('instagram', $footer_id)):
                  $ig_url    = is_array($ig) ? ($ig['url'] ?? '') : (string) $ig;
                  $ig_title  = is_array($ig) ? trim((string) ($ig['title'] ?? '')) : '';
                  $ig_target = is_array($ig) ? trim((string) ($ig['target'] ?? '')) : '';
                  if ($ig_url): ?>
                    <li>
                      <i class="fab fa-instagram me-2"></i>
                      <a class="link-light text-decoration-none" href="<?php echo esc_url($ig_url); ?>"<?php echo $ig_target ? ' target="' . esc_attr($ig_target) . '" rel="noopener"' : ''; ?>><?php echo $ig_title !== '' ? esc_html($ig_title) : 'Instagram'; ?></a>
                    </li>
                  <?php endif; ?>
                <?php endif; ?>

                <?php if ($yt = get_field('youtube', $footer_id)):
                  $yt_url    = is_array($yt) ? ($yt['url'] ?? '') : (string) $yt;
                  $yt_title  = is_array($yt) ? trim((string) ($yt['title'] ?? '')) : '';
                  $yt_target = is_array($yt) ? trim((string) ($yt['target'] ?? '')) : '';
                  if ($yt_url): ?>
                    <li>
                      <i class="fab fa-youtube me-2"></i>
                      <a class="link-light text-decoration-none" href="<?php echo esc_url($yt_url); ?>"<?php echo $yt_target ? ' target="' . esc_attr($yt_target) . '" rel="noopener"' : ''; ?>><?php echo $yt_title !== '' ? esc_html($yt_title) : 'YouTube'; ?></a>
                    </li>
                  <?php endif; ?>
                <?php endif; ?>

                <?php if ($fb = get_field('facebook', $footer_id)):
                  $fb_url    = is_array($fb) ? ($fb['url'] ?? '') : (string) $fb;
                  $fb_title  = is_array($fb) ? trim((string) ($fb['title'] ?? '')) : '';
                  $fb_target = is_array($fb) ? trim((string) ($fb['target'] ?? '')) : '';
                  if ($fb_url): ?>
                    <li>
                      <i class="fab fa-facebook me-2"></i>
                      <a class="link-light text-decoration-none" href="<?php echo esc_url($fb_url); ?>"<?php echo $fb_target ? ' target="' . esc_attr($fb_target) . '" rel="noopener"' : ''; ?>><?php echo $fb_title !== '' ? esc_html($fb_title) : 'Facebook'; ?></a>
                    </li>
                  <?php endif; ?>
                <?php endif; ?>

                <?php if ($mail = get_field('mail', $footer_id)):
                  $raw_mail    = is_array($mail) ? ($mail['url'] ?? '') : (string) $mail;
                  $mail_title  = is_array($mail) ? trim((string) ($mail['title'] ?? '')) : '';
                  $mail_target = is_array($mail) ? trim((string) ($mail['target'] ?? '')) : '';
                  // Normalizar: si es un email sin esquema, convertir a mailto:
                  $is_plain_email = (bool) filter_var($raw_mail, FILTER_VALIDATE_EMAIL);
                  $href = $is_plain_email ? ('mailto:' . antispambot($raw_mail)) : $raw_mail;
                  if ($href): ?>
                    <li>
                      <i class="fas fa-envelope me-2"></i>
                      <a class="link-light text-decoration-none" href="<?php echo esc_url($href); ?>"<?php echo $mail_target && stripos($href, 'http') === 0 ? ' target="' . esc_attr($mail_target) . '" rel="noopener"' : ''; ?>>
                        <?php echo $mail_title !== '' ? esc_html($mail_title) : esc_html($is_plain_email ? antispambot($raw_mail) : $href); ?>
                      </a>
                    </li>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>

        <hr class="border-secondary my-4" />
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small">
          <div>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> — Todos los derechos reservados</div>
          <?php if (function_exists('get_field') && ($dev = get_field('footer_developed_by', 'option'))): ?>
            <div>Desarrollado por <a class="link-light text-decoration-none" href="<?php echo esc_url($dev['url'] ?? '#'); ?>" target="_blank" rel="noopener"><?php echo esc_html($dev['title'] ?? ''); ?></a></div>
          <?php else: ?>
            <div>Desarrollado por <a class="link-light text-decoration-underline" href="https://sur-code.com">SurCode</a></div>
          <?php endif; ?>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>

