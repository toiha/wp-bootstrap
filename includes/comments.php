<?php
if (post_password_required()) {
    return;
};
?>
<div id="comments">

    <?php if (have_comments()) : ?>
        <div clas="lis-"><h3 class="comments-title">Commentaires</h3></div>

        <ol class="list-group">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'callback'   => 'wp_bootstrap_comment'
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'twentythirteen'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'twentythirteen')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'twentythirteen')); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'twentythirteen'); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php if ('open' == $post->comment_status) : ?>

        <div id="respond" class="panel panel-developathe">
            <header class="panel-heading">
                <h3 class="panel-title">Répondre</h3>
            </header>
            <div class="panel-body">
                <div class="cancel-comment-reply">
                    <?php cancel_comment_reply_link(); ?>
                </div>


                <?php $user = wp_get_current_user()->data; ?>
                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

                    <?php if ($user->ID) : ?>

                        <div class="form-group">
                            Connecté en tant que <?php echo $user->display_name; ?>. 
                            <a href="<?php echo wp_logout_url(get_permalink()); ?>"> Se déconnecter »</a>
                        </div>

                    <?php else : ?>

                        <div class="form-group">
                            <label for="author">Nom</label>
                            <div class="input-group">
                                <input id="author" name="author" type="text" value="<?php echo $comment_author; ?>" class="form-control" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email (ne sera pas publié) </label>

                            <div class="input-group">
                                <input id="email" name="email" type="text" value="<?php echo $comment_author_email; ?>" class="form-control" />
                                <span class="input-group-addon">@</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="url">Site Web</label><div class="input-group">
                                <input name="url" id="url" value="" size="22" class="form-control" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                            </div>
                        </div>

                    <?php endif; ?>

                    <div class="form-group">
                        <label for="url">Commentaire</label>
                        <div class="input-group">
                            <textarea name="comment" id="comment" rows="10" class="form-control"></textarea>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-comment"></span></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <input name="submit" type="submit" id="submit" value="Soummettre le commentaire" class="btn btn-primary" />
                        <?php comment_id_fields(); ?>
                    </div>

                    <?php do_action('comment_form', $post->ID); ?>

                </form>

            <?php endif; ?>
        </div>
    </div>

</div>
