<?php
$title = $args['title'] ?? '';
$background_img = $args['background_img'] ?? '';
$style = $background_img
    ? "background-image: url('{$background_img}'); background-size: cover; background-position: center;"
    : " background: radial-gradient(circle, var(--primary-color) 20%, var(--background-black)) 75%;";
$position = $args["position"] ?? "center";

// Determinar la clase de alineación basada en la posición
$text_align_class = '';
switch($position) {
    case 'left':
        $text_align_class = 'text-start';
        break;
    case 'right':
        $text_align_class = 'text-end';
        break;
    case 'center':
    default:
        $text_align_class = 'text-center';
        break;
}
?>

<section class="mision-hero">
    <div class="mision-gradient-bg" style="<?php echo $style; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 <?php echo $text_align_class; ?>">
                    <h1 class="mision-title"><?php echo $title; ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
