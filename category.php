            <?php get_header(); ?>
                <?php if (have_posts()) : ?>
                    <h1 id="page-title">Catégorie : <?php echo single_cat_title( '', false ); ?></h1>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('includes/post'); ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <h1 id="page-title">Aucun contenu pour : <strong><?php echo get_search_query() ?></strong></h1>
                <?php endif; ?>
            <?php get_footer();