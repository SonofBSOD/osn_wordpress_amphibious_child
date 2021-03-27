<?php/*
    articleId
    text
*/ ?>

<div class="post-wrapper-hentry">
    <article id="post-<?php echo $args['articleId'] ?>" class="status-publish hentry">
        <div class="post-content-wrapper post-content-wrapper-archive">
            <div class="entry-data-wrapper">
                <?php echo $args['text'] ?>
            </div><!-- .entry-data-wrapper -->

        </div><!-- .post-content-wrapper -->
    </article><!-- #post-## -->
</div><!-- .post-wrapper-hentry -->