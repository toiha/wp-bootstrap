<!DOCTYPE html>
<html>
    <head <?php language_attributes(); ?>>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_bootstrap_title(); ?> | <?php bloginfo( 'description' ); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/wp-bootstrap.js"></script>
        <?php wp_head(); ?>
    </head>
    <body>
        <header id="header-page">
            <div class="container">
                <h1 id="site-title" class="col-md-5">
                    <a href="<?php echo home_url(); ?>/">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>

                <nav id="navbar" role="navigation" class="col-md-7">
                    <ul> 
                        <li class="level-1">
                            <a href="<?php echo home_url(); ?>">Accueil</a>
                        </li>
                        <li class="dropdown level-1">
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
                            'post_status' => 'publish,private',
                        ));
                        foreach ($pageItems as $pageItem):
                            ?>
                            <li class="level-1">
                                <a href="<?php echo $pageItem->guid; ?>"><?php echo $pageItem->post_title; ?></a>
                            </li>
                        <?php endforeach; ?>
                        <li id="navbar-search-item" class="dropdown level-1">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id="search-icon" class="glyphicon glyphicon-search"></span><b class="caret"></b></a>
                            <div class="dropdown-menu pull-right">
                                <form method="get" id="form" action="<?php bloginfo('url'); ?>/">
                                    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="form-control" placeholder="Recherche" />
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <?php if (get_bloginfo('description')): ?>
                <div id="slogan">
                    <div class="container"><?php bloginfo('description'); ?></div>
                </div>
            <?php endif; ?>
        </header>

        <div id="wrap" class="container">
            <section id="main" class="col-md-12" role="main">
