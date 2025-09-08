<?php
/**
 * Template Name: Visión (Nueva Estructura)
 * Página de Visión con template parts reutilizables
 */

get_header();
?>

<main class="vision-page">

<?php
// 1. CULTURA - Sección con tarjetas VIDA
get_template_part('template-parts/vision/vision-section', null, [
    'section_id' => 'cultura',
    'title' => 'NUESTRA CULTURA',
    'layout' => 'cards',
    'content' => 'Los valores que nos definen como comunidad de fe',
    'cards' => [
        [
            'letter' => 'V',
            'title' => 'Vivimos en Santidad, honestidad e integridad',
            'class' => 'vision-card-v'
        ],
        [
            'letter' => 'I',
            'title' => 'Inofendibles, perdonadores, puntuales, ordenados, y nos cuidamos en amor',
            'class' => 'vision-card-i'
        ],
        [
            'letter' => 'D',
            'title' => 'Desarrollamos crecimiento espiritual, personal y congregacional',
            'class' => 'vision-card-d'
        ],
        [
            'letter' => 'A',
            'title' => 'Aprendemos como equipo y apuntamos a la excelencia',
            'class' => 'vision-card-a'
        ]
    ]
]);

// 2. PROPÓSITO - Sección hero con imagen de fondo
get_template_part('template-parts/vision/vision-section', null, [
    'section_id' => 'proposito',
    'title' => 'NUESTRO PROPÓSITO',
    'layout' => 'hero',
    'background_img' => get_template_directory_uri() . '/assets/images/proposito-bg.jpg',
    'content' => '<h2>Comunicar el mensaje de Jesucristo.</h2><p>Que el evangelio y la Gloria de Dios llegue hasta lo último de la tierra</p>'
]);

// 3. MISIÓN - Sección hero con texto
get_template_part('template-parts/vision/vision-section', null, [
    'section_id' => 'mision',
    'title' => 'NUESTRA MISIÓN',
    'layout' => 'hero-text',
    'background_img' => get_template_directory_uri() . '/assets/images/mision-bg.jpg',
    'content' => '<p class="lead">Formar discípulos comprometidos con Cristo, equipándolos para servir y transformar sus comunidades a través del amor de Dios.</p>'
]);

// 4. VISIÓN - Sección solo texto
get_template_part('template-parts/vision/vision-section', null, [
    'section_id' => 'vision',
    'title' => 'NUESTRA VISIÓN',
    'layout' => 'text',
    'content' => '
        <h2>Ser una iglesia que impacte</h2>
        <p>Ser una comunidad de fe vibrante y creciente que transforma vidas a través del poder del Evangelio, desarrollando líderes íntegros que extiendan el Reino de Dios en cada esfera de la sociedad.</p>
        
        <h3>Nuestros Objetivos:</h3>
        <ul style="text-align: left; max-width: 600px; margin: 0 auto;">
            <li>Formar discípulos maduros en la fe</li>
            <li>Desarrollar líderes con carácter cristiano</li>
            <li>Impactar nuestra comunidad local</li>
            <li>Expandir el Reino de Dios globalmente</li>
        </ul>
    '
]);

// 5. GESTIÓN - Sección con tarjetas de áreas
get_template_part('template-parts/vision/vision-section', null, [
    'section_id' => 'gestion',
    'title' => 'NUESTRA GESTIÓN',
    'layout' => 'cards',
    'content' => 'Las áreas clave de nuestro ministerio',
    'cards' => [
        [
            'letter' => 'L',
            'title' => 'Liderazgo',
            'description' => 'Formación y desarrollo de líderes íntegros',
            'class' => 'vision-card-1'
        ],
        [
            'letter' => 'E',
            'title' => 'Evangelismo',
            'description' => 'Compartir el amor de Cristo con nuestra comunidad',
            'class' => 'vision-card-2'
        ],
        [
            'letter' => 'D',
            'title' => 'Discipulado',
            'description' => 'Crecimiento espiritual y madurez en la fe',
            'class' => 'vision-card-3'
        ],
        [
            'letter' => 'S',
            'title' => 'Servicio',
            'description' => 'Ministerios que transforman vidas',
            'class' => 'vision-card-4'
        ],
        [
            'letter' => 'A',
            'title' => 'Adoración',
            'description' => 'Experiencias auténticas de encuentro con Dios',
            'class' => 'vision-card-5'
        ]
    ]
]);
?>

</main>

<style>
/* Importar estilos específicos de visión */
@import url('<?php echo get_template_directory_uri(); ?>/assets/css/vision-sections.css');

/* Estilos adicionales específicos de esta página */
.vision-page {
    min-height: 100vh;
}

/* Espaciado entre secciones */
.vision-section + .vision-text-section,
.vision-text-section + .vision-section,
.vision-cards-section + .vision-section {
    margin-top: 0;
}

/* Animaciones de entrada */
.vision-card {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.6s ease-out forwards;
}

.vision-card:nth-child(1) { animation-delay: 0.1s; }
.vision-card:nth-child(2) { animation-delay: 0.2s; }
.vision-card:nth-child(3) { animation-delay: 0.3s; }
.vision-card:nth-child(4) { animation-delay: 0.4s; }
.vision-card:nth-child(5) { animation-delay: 0.5s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<?php get_footer(); ?>
