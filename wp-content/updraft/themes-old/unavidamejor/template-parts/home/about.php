<?php
/**
 * Sección: About (home)
 */
?>
<div class="about-us py-5 px-4">
  <div class="row justify-content-center about-us-container">     
      <div class="col-12 col-sm-8  col-xl-4 about-us-container-text">
        <h2><?php the_field("about_title"); ?></h2>
        <?php the_field("about_descripcion"); ?>
      </div>
        <div class="col-12 col-xl-4 about-us-img">
        <img src="<?php the_field("about_image"); ?>">
      </div>
  </div>
</div>


