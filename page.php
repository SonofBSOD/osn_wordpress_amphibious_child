<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Amphibious
 */

get_header(); ?>

<?php
$image = get_field('banner');
get_template_part('template-parts/image-banner', null, array(
        'image_url' => empty($image) ? null : $image['url'],
        'text' => the_title(null, null, false)
))?>

<div class="site-content-inside">
    <div class="container">
        <div class="row">

            <div id="primary" class="content-area <?php amphibious_layout_class( 'content' ); ?>">
                <main id="main" class="site-main">

                    <div id="post-wrapper" class="post-wrapper post-wrapper-single post-wrapper-single-page">
                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php get_template_part( 'template-parts/content', 'page' , array(
                                    'hideTitle' => true
                            )); ?>

                            <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() ) :
                                comments_template();
                            endif;
                            ?>

                        <?php endwhile; // end of the loop. ?>
                    </div><!-- .post-wrapper -->

                </main><!-- #main -->
            </div><!-- #primary -->

            <?php get_sidebar(); ?>

        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .site-content-inside -->

<?php get_footer(); ?>
