<?php

function wp_bootstrap_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    ?>
    <li class="comment-item list-group-item" id="comment-<?php comment_ID() ?>">

        <div class="comment-info">
            <?php echo get_avatar($comment, 40); ?>
            <?php echo get_comment_author(); ?> <br />
            Le <?php echo get_comment_date(); ?> à <?php echo get_comment_time(); ?>
            <?php echo edit_comment_link('Modifier', ' - '); ?>
        </div>

        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation">Votre commentaire est en cours de modération.</em>
        <?php endif; ?>

        <div class="content">
            <?php comment_text() ?>
        </div>

    </li>
    <?php
}

function wp_bootstrap_title() {
    if (is_category()) {
        single_cat_title( '');
    }
    elseif (is_search()) {
        echo 'Recherche : ' . get_search_query();
    }
    elseif (is_home()) {
        bloginfo('name');
    }
    elseif(is_404()) {
        echo 'Erreur 404';
    }
    elseif(is_single()) {
        echo the_title();
    }
}
