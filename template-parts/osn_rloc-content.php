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
                        <img style="float: left; width: 350px; height: 350px; margin-right: 25px; margin-bottom: 35px; filter: drop-shadow(5px 5px 7px gray)" src="<?php echo(esc_url($image['url'])) ?>" alt="">
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
            </div><!-- .entry-data-wrapper -->

        </div><!-- .post-content-wrapper -->
    </article><!-- #post-## -->
</div><!-- .post-wrapper-hentry -->
