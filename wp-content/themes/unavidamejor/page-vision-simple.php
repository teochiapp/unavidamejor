<?php
/**
 * Template Name: Visión Simple
 * Página de Visión con heroes simples
 */

get_header();
?>

<main class="vision-page">

<?php
// 1. CULTURA
get_template_part('template-parts/vision/vision-section', null, [
    'section_id' => 'cultura',
    'title' => 'NUESTRA CULTURA',
    'background_img' => get_template_directory_uri() . '/assets/images/cultura-bg.jpg',
    'content' => '<p class="lead">Los valores que nos definen como comunidad de fe</p>'
]);

// 2. PROPÓSITO (usa estilos específicos de proposito-hero)
get_template_part('template-parts/vision/vision-section', null, [
    'section_id' => 'proposito',
    'title' => 'Propósito',
    'background_img' => 'http://localhost/unavidamejor/wp-content/uploads/2025/08/proposito.jpg',
    'content' => 'Comunicar el mensaje de Jesucristo.<br>Que el evangelio y la Gloria de Dios llegue hasta lo último de la tierra'
]);

// 3. MISIÓN
get_template_part('template-parts/vision/vision-section', null, [
    'section_id' => 'mision',
    'title' => 'NUESTRA MISIÓN',
    'background_img' => get_template_directory_uri() . '/assets/images/mision-bg.jpg',
    'content' => '<p class="lead">Formar discípulos comprometidos con Cristo, equipándolos para servir y transformar sus comunidades a través del amor de Dios.</p>'
]);

// 4. VISIÓN
get_template_part('template-parts/vision/vision-section', null, [
    'section_id' => 'vision',
    'title' => 'NUESTRA VISIÓN',
    'background_img' => get_template_directory_uri() . '/assets/images/vision-bg.jpg',
    'content' => '<h2>Ser una iglesia que impacte</h2><p>Ser una comunidad de fe vibrante y creciente que transforma vidas a través del poder del Evangelio.</p>'
]);

// 5. GESTIÓN
get_template_part('template-parts/vision/vision-section', null, [
    'section_id' => 'gestion',
    'title' => 'NUESTRA GESTIÓN',
    'background_img' => get_template_directory_uri() . '/assets/images/gestion-bg.jpg',
    'content' => '<p class="lead">Administración transparente y eficiente de los recursos que Dios nos ha confiado.</p>'
]);
?>

</main>

<style>
/* Importar estilos específicos de visión */
@import url('<?php echo get_template_directory_uri(); ?>/assets/css/vision-sections.css');

/* Estilos específicos para la versión simple */
.vision-page {
    min-height: 100vh;
}

/* Asegurar que cada sección tenga altura completa */
.vision-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Animación suave entre secciones */
.vision-section-title {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 1s ease-out 0.3s forwards;
}

.vision-section-subtitle {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 1s ease-out 0.6s forwards;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .vision-section {
        min-height: 80vh;
    }
}
</style>

<?php get_footer(); ?>
