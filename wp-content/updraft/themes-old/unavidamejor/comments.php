<?php
/**
 * Template de comentarios
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                printf(esc_html__('Un comentario en “%1$s”', 'unavidamejor'), '<span>' . get_the_title() . '</span>');
            } else {
                printf(esc_html__('%1$s comentarios en “%2$s”', 'unavidamejor'), number_format_i18n($comments_number), '<span>' . get_the_title() . '</span>');
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments([
                'style'      => 'ol',
                'short_ping' => true,
            ]);
            ?>
        </ol>

        <?php the_comments_pagination(); ?>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php esc_html_e('Los comentarios están cerrados.', 'unavidamejor'); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>
</div>

