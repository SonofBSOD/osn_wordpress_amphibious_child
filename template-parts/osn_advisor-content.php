<?php
/**
 * The default template for displaying content
 *
 * @package Amphibious
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
                        $email = get_field('advisor-email');
                        $website = get_field('advisor-website');
                        echo(
                        sprintf( '<h2 class="entry-title"><a href="%1$s" rel="bookmark">%2$s</a></h2>', esc_url( get_permalink() ), get_field('advisor-first-name') . " " . get_field('advisor-last-name'))
                        );
                        ?>
                        <span>Email: <?php echo (empty($email) ? 'None': antispambot($email)) ?> | Website: <?php echo (empty($website) ? 'None': sprintf('<a href="%1$s">%2$s</a>', $website, $website)) ?></span>
                    </header><!-- .entry-header -->
                </div><!-- .entry-header-wrapper -->

                <div>
                    <?php
                    $image = get_field('advisor-portrait');
                    if (!empty($image)) { ?>
                        <img style="object-fit: cover; float: left; width: 350px; height: 350px; margin-right: 25px; margin-bottom: 35px; border: 1px solid black" src="<?php echo(esc_url($image['url'])) ?>" alt="">
                    <?php }
                    ?>
                    <?php the_field('advisor-bio'); ?>
                </div>
            </div><!-- .entry-data-wrapper -->

        </div><!-- .post-content-wrapper -->
    </article><!-- #post-## -->
</div><!-- .post-wrapper-hentry -->
