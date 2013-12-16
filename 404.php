            <?php get_header(); ?>
                <article id="post-<?php the_ID(); ?>" class="post">
                    <header>
                        <hgroup>
                                <h1 id="page-title">Erreur 404</h1>
                        </hgroup>
                    </header>
                    <section class="content center">
                        <p>La page demandée n'existe pas ou n'existe plus.</p>
                    </section>
                </article>
            <?php get_footer();