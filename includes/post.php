<article id="post-<?php the_ID(); ?>" class="post">
    <header>
        <hgroup>
            <?php if (is_single()): ?>
                <h1><?php the_title(); ?></h1>
            <?php else: ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php endif; ?>
        </hgroup>
    </header>
    <?php if (!is_page()): ?>
        <aside class="post-info">
            Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
        </aside>
    <?php endif; ?>
    <section class="content">
        <?php the_content(); ?>
    </section>

    <?php if (is_single()): ?>
    <?php comments_template(); ?>
    <?php endif; ?>
</article>