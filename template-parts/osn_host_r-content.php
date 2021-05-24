<?php
/**
 * The default template for displaying content
 *
 * @package Amphibious-Child
 */
?>

<div class="post-wrapper-hentry">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="post-content-wrapper post-content-wrapper-archive" style="overflow: hidden">

            <?php amphibious_post_thumbnail(); ?>

            <div class="entry-data-wrapper">
                <div class="entry-header-wrapper">
                    <header class="entry-header">
                        <?php
                        get_template_part('template-parts/osn_host_r-content-title')
                        ?>
                        <span><?php
                            $start_date = get_field('retreat-event-start-time');
                            $end_date = get_field('retreat-event-end-time');

                            echo "$start_date - $end_date"
                            ?></span>
                    </header><!-- .entry-header -->
                </div><!-- .entry-header-wrapper -->

                <?php the_field('retreat-event-description'); ?>
                <?php
                    $enroll_url = get_field('retreat-event-external-enroll-link');
                    if ($enroll_url) {
                ?>
                    <div class="more-link-wrapper" style="margin: 0.9375rem 0 0.9375rem">
                        <a href="<?php echo $enroll_url ?>" class="more-link" style="font-size: 1.5rem">Click here to enroll</a>
                    </div>
                <?php
                    }
                ?>
                <h3>Teachers: </h3>
                <?php
                $teachers = get_field('retreat-event-hosting-teachers');
                if ($teachers) { ?>
                    <ul>
                        <?php
                        foreach ($teachers as $teacher) {
                            $permalink = get_permalink($teacher->ID);
                            $first_name = get_field('teacher-first-name', $teacher->ID);
                            $last_name = get_field('teacher-last-name', $teacher->ID);
                            ?>

                            <li><a href="<?php echo $permalink ?>"><?php echo $first_name . " " . $last_name ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                <?php }
                ?>
            </div><!-- .entry-data-wrapper -->

        </div><!-- .post-content-wrapper -->
    </article><!-- #post-## -->
</div><!-- .post-wrapper-hentry -->
