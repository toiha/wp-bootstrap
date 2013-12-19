<?php
if (is_front_page()) {
    $wp_page_title = get_bloginfo('name');
    $wp_page_description = get_bloginfo('description');
}
elseif(is_single()) {
    $wp_page_title = get_the_title();
    $wp_page_description = get_the_excerpt();
}
?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('includes/post'); ?>
    <?php endwhile; ?>
    <div>
        <?php previous_posts_link(__('<button type="button" title="Page précédente" class="btn btn-default btn-lg nav-previous"><span class="glyphicon glyphicon-arrow-left"></button></div>')); ?>
        <?php next_posts_link(__('<button type="button" title="Page suivante" class="btn btn-default btn-lg nav-next"><span class="glyphicon glyphicon-arrow-right"></span></button>')); ?>
    </div>
<?php else : ?>
<?php endif; ?>
<?php
get_footer();
