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

                <div style="display: flex; flex-direction: row; justify-content: flex-start;">
                    <?php
                    $image = get_field('retreat-location-image');
                    if (!empty($image)) { ?>
                        <img style="float: left; width: 350px; height: 350px; margin-right: 25px; margin-bottom: 35px; border: 1px solid black" src="<?php echo(esc_url($image['url'])) ?>" alt="">
                    <?php }
                    ?>
                    <div>
                        <p style="margin-bottom: 5px;">Address: <?php the_field('retreat-location-address')?></p>
                        <p style="margin-bottom: 5px;">Email: <?php the_field('retreat-location-email') ?></p>
                        <p style="margin-bottom: 5px;">Website: <?php the_field('retreat-location-website') ?></p>
                        <p style="margin-bottom: 5px;">Telephone: <?php the_field('retreat-location-telephone') ?></p>
                    </div>
                </div>

                <?php the_field('retreat-location-description'); ?>

                <h3 style="margin-top: 10px">Hosting Retreats: </h3>
                <?php
                $retreat_events = get_posts(array(
                    'post_type' => HOSTED_RETREAT_POST_TYPE,
                    meta_query_args(get_the_ID(), 'retreat-event-retreat-locations')
                ));

                if ($retreat_events) { ?>
                    <ul>
                        <?php
                        foreach ($retreat_events as $retreat_event) {
                            $permalink = get_permalink($retreat_event->ID);
                            $retreat_event_title = get_the_title($retreat_event->ID);
                            ?>

                            <li><a href="<?php echo $permalink ?>"><?php echo $retreat_event_title ?></a></li>
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
