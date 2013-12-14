<article id="post-<?php the_ID(); ?>" class="post panel panel-developathe">
    <?php if (!is_single()): ?>
        <header class="panel-heading">
            <hgroup>
                <h2 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            </hgroup>
        </header>
    <?php endif; ?>
    <section class="content panel-body">
        <?php the_content(); ?>
    </section>

    <?php if (!is_page()): ?>
        <aside class="panel-footer">
            <span class="glyphicon glyphicon-info-sign"></span>
            Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
        </aside>
    <?php endif; ?>
</article>

<?php if (is_single()): ?>
    <?php comments_template('/includes/comments.php'); ?>
<?php endif; ?>