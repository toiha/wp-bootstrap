            <?php get_header(); ?>
                <?php if (have_posts()) : ?>
                    <h1 id="page-title">Résultats pour : <strong><?php echo get_search_query() ?></strong></h1>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('includes/post'); ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <h1 id="page-title">Aucun résultat pour : <strong><?php echo get_search_query() ?></strong></h1>
                <?php endif; ?>
            <?php get_footer();