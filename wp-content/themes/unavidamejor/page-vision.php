<?php get_header(); ?>

<?php get_template_part('template-parts/vision/vision-section', null, [
    'title' => get_field('titulo_cabecera_cultura'),
    'background_img' => get_field('imagen_cabecera_cultura'),
]); ?>

<?php get_template_part('template-parts/vision/cultura'); ?>

<?php get_template_part('template-parts/vision/vida'); ?>

<?php get_template_part('template-parts/vision/vision-section', null, [
    'title' => get_field('titulo_cabecera_proposito'),
    'background_img' => get_field('imagen_cabecera_proposito'),
]); ?>

<?php get_template_part('template-parts/vision/proposito'); ?>

<?php get_template_part('template-parts/vision/vision-section', null, [
    'title' => get_field('titulo_cabecera_mision'),
    'background_img' => get_field('imagen_cabecera_mision'),
]); ?>

<?php get_template_part('template-parts/vision/mision'); ?>

<?php get_template_part('template-parts/vision/vision-section', null, [
    'title' => get_field('titulo_cabecera_vision'),
    'background_img' => get_field('imagen_cabecera_vision'),
]); ?>

<?php get_template_part('template-parts/vision/vision'); ?>

<?php get_template_part('template-parts/vision/vision-section', null, [
    'title' => get_field('titulo_cabecera_gestion'),
    'background_img' => get_field('imagen_cabecera_gestion'),
]); ?>

<?php get_template_part('template-parts/vision/gestion'); ?>

<?php get_footer(); ?>
