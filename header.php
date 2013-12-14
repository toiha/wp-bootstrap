<!DOCTYPE html>
<html>
    <head <?php language_attributes(); ?>>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_bootstrap_title(); ?> | <?php bloginfo('name'); ?></title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/wp-bootstrap.js"></script>
        <?php wp_head(); ?>
    </head>
    <body>
        <nav id="navigation" class="navbar navbar-top navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
                </div>

                <div role="navigation" class="collapse navbar-collapse">
                    <form method="get" id="form" action="<?php bloginfo('url'); ?>/" class="navbar-form navbar-right" role="form">
                        <div class="form-group">
                            <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="form-control" placeholder="Recherche" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </form>
                    <ul  class="nav navbar-nav navbar-right"> 
                        <li>
                            <a href="<?php echo home_url(); ?>">Accueil</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catégories <b class="caret"></b></a>
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
                            'post_status' => (in_array('administrator', wp_get_current_user()->roles) ? 'publish,private' : 'publish'),
                        ));
                        foreach ($pageItems as $pageItem):
                            ?>
                            <li>
                                <a href="<?php echo $pageItem->guid; ?>"><?php echo $pageItem->post_title; ?></a>
                            </li>
                        <?php endforeach; ?>
                        <li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        global $wp_page_title, $wp_page_description;
        ?>
        <?php if (!empty($wp_page_title)): ?>
            <header id="page-header" class="jumbotron">
                <div class="container">
                    <h1><?php echo $wp_page_title; ?></h1>
                    <?php if (!empty($wp_page_description)): ?>
                        <p class="lead"><?php echo $wp_page_description; ?></p>
                    <?php endif; ?>
                </div>
            </header>
        <?php endif; ?>

        <div id="wrap" class="container">
            <section id="main" class="col-md-12" role="main">
