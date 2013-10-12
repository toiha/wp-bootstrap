<!DOCTYPE html>
<html>
    <head <?php language_attributes(); ?>>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php the_title(); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
        <?php wp_head(); ?>
    </head>
    <body>
        <header id="header-page">
            <div class="container">
                <?php if (is_home()): ?>
                    <h1 id="site-title" class="col-md-9">
                        <span><?php bloginfo('name'); ?></span>
                    </h1>
                <?php else: ?>
                    <div id="site-title" class="col-md-9">
                        <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
                    </div>
                <?php endif; ?>
                <div class="col-md-3">
                    <form method="get" id="form" action="<?php bloginfo('url'); ?>/">
                        <div class="form-group">
                            <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="form-control" placeholder="Recherche" />
                        </div>
                    </form>
                </div>
            </div>
        </header>
        <div id="navbar" class="navbar navbar-inverse">
            <div class="container">
                <nav class="navbar-left" role="navigation">
                    <ul class="nav navbar-nav"> 
                        <li<?php if (is_home()): ?> class="active"<?php endif; ?>>
                            <a href="<?php echo home_url(); ?>">Accueil</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="wrap" class="container">
            <section id="main" class="col-md-12" role="main">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('includes/post'); ?>
                    <?php endwhile; ?>
                <?php else : ?>
                <?php endif; ?>
            </section>
        </div>
        <footer id="footer" class="navbar navbar-fixed-bottom">
            <div class="container">
                <p>Propulsé par <a href="http://wordpress.org">WordPress</a> - The <em>Dévelopathe</em> Project  - alK13</p>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>