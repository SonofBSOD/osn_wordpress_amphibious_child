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
                        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%1$s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    </header><!-- .entry-header -->
                </div><!-- .entry-header-wrapper -->

                <?php the_field('retreat-event-description'); ?>
                <h3>Retreat Locations: </h3>

                <?php
                $retreat_locations = get_field('retreat-event-retreat-location');
                if ($retreat_locations) { ?>
                    <ul>
                        <?php
                        foreach ($retreat_locations as $location) {
                            $permalink = get_permalink($location->ID);
                            $title = get_the_title($location->ID); ?>

                            <li><a href="<?php echo $permalink ?>"><?php echo $title ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                <?php }
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
