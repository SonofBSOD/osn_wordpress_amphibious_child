<div class="post-wrapper-hentry">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-content-wrapper post-content-wrapper-archive">

            <?php amphibious_post_thumbnail(); ?>

            <div class="entry-data-wrapper">
                <div class="entry-header-wrapper">
                    <header class="entry-header">
                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%1$s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    </header><!-- .entry-header -->
                </div><!-- .entry-header-wrapper -->

                <div class="entry-summary" style="overflow: hidden">
                    <?php
                    $image = get_field('advisor-portrait');
                    if (!empty($image)) { ?>
                        <img style="float: left; max-width: 120px; max-height: 120px; margin-right: 25px; margin-bottom: 35px; border:1px solid black" src="<?php echo(esc_url($image['url'])) ?>" alt="">
                    <?php }
                    ?>
                    <?php echo wp_trim_words(get_field('advisor-bio'), 40, '...'); ?>
                </div>

                <?php
                if ( amphibious_has_read_more_label() ) {
                    amphibious_read_more_link();
                }
                ?>
            </div><!-- .entry-data-wrapper -->

        </div><!-- .post-content-wrapper -->
    </article><!-- #post-## -->
</div><!-- .post-wrapper-hentry -->