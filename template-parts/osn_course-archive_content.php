<div class="post-wrapper-hentry">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-content-wrapper post-content-wrapper-archive">

            <?php amphibious_post_thumbnail(); ?>

            <div class="entry-data-wrapper">
                <div class="entry-header-wrapper">
                    <header class="entry-header">
                        <?php
                        get_template_part('template-parts/osn_host_r-content-title')
                        ?>
                        <span><?php
                            $start_date = get_field('course-start-time');
                            $end_date = get_field('course-end-time');

                            echo "$start_date - $end_date"
                            ?></span>
                    </header><!-- .entry-header -->
                </div><!-- .entry-header-wrapper -->

                <?php echo wp_trim_words(get_field('course-description'), 40, '...'); ?>

                <?php
                if ( amphibious_has_read_more_label() ) {
                    amphibious_read_more_link();
                }
                ?>
            </div><!-- .entry-data-wrapper -->

        </div><!-- .post-content-wrapper -->
    </article><!-- #post-## -->
</div><!-- .post-wrapper-hentry -->