<!DOCTYPE html>
<html>
    <head <?php language_attributes(); ?>>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_bootstrap_title(); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/bootstrap.min.js"></script>
        <?php wp_head(); ?>
    </head>
    <body>
        <div id="navbar" class="navbar navbar-default">
            <div class="container">
                <nav class="navbar-left" role="navigation">
                    <ul class="nav navbar-nav"> 
                        <li<?php if (is_home()): ?> class="active"<?php endif; ?>>
                            <a href="<?php echo home_url(); ?>">Accueil</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php
                                $categoryItems = get_categories(array('parent' => NULL));
                                foreach ($categoryItems as $categoryItem):
                                    ?>
                                    <li>
                                        <a href="<?php echo get_category_link($categoryItem->cat_ID); ?>"><?php echo $categoryItem->name; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <?php
                        $pageItems = get_pages(array(
                            'sort_order'  => 'ASC',
                            'sort_column' => 'menu_order',
                            'post_status' => 'publish',
                        ));
                        foreach ($pageItems as $pageItem):
                            ?>
                            <li>
                                <a href="<?php echo $pageItem->guid; ?>"><?php echo $pageItem->post_title; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </div>
        <header id="header-page">
            <div class="container">
                <h1 id="site-title" class="col-md-9">
                    <a href="<?php echo home_url(); ?>/">
                        <img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
                        <img src="<?php echo get_template_directory_uri() ?>/images/title.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
                    </a>
                </h1>
                <div class="col-md-3">
                    <form method="get" id="form" action="<?php bloginfo('url'); ?>/">
                        <div class="form-group">
                            <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="form-control" placeholder="Recherche" />
                        </div>
                    </form>
                </div>
            </div>
        </header>

        <div id="wrap" class="container">
            <section id="main" class="col-md-12" role="main">
